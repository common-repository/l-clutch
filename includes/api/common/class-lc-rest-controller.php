<?php
/**
 * LClutchのREST APIのベースクラス
 *
 * @package LClutch\API
 */

namespace LClutch\API;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Exception;
use LClutch\Model\DTO\DTO_Base;
use LClutch\Model\Exception\Authorize_Exception;
use LClutch\Utils\Initialize_Trait;
use LClutch\Utils\String_Converter;
use LClutch\Utils\Validator;
use WP_Error;
use WP_REST_Controller;
use WP_REST_Request;
use WP_REST_Response;

/**
 * LClutchのREST APIのベースクラス
 */
abstract class LC_REST_Controller extends WP_REST_Controller {

	use Initialize_Trait;

	/**
	 * 名前空間
	 */
	const NAMESPACE = 'l-clutch/v1';

	/**
	 * パス(継承先で定義)
	 */
	const PATH                    = '';
	const ADDITIONAL_PATH         = '';
	const OPENAPI_ADDITIONAL_PATH = '';

	/**
	 * パススキーマ
	 *
	 * @var array
	 */
	protected static $path_schemas = array();

	/**
	 * パススキーマの取得
	 */
	public static function get_path_schemas() {
		$schemas = array();
		foreach ( self::$path_schemas as $path => $schema_callback ) {
			$schema = call_user_func( $schema_callback );
			if ( ! empty( $schema ) ) {
				$schemas[ $path ] = $schema;
			}
		}

		return $schemas;
	}

	/**
	 * パススキーマの追加
	 *
	 * @param string   $path     パス.
	 * @param callable $callback コールバック.
	 */
	public static function add_path_schema( $path, $callback ) {
		self::$path_schemas[ $path ] = $callback;
	}


	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	/**
	 * ルート設定のキャッシュ
	 *
	 * @var array
	 */
	private $route_setting;

	/**
	 * ルート設定
	 */
	abstract protected function get_route_setting();

	/**
	 * ルートの登録
	 */
	public function register_routes() {
		$setting    = $this->get_route_setting();
		$route_args = array();
		foreach ( $setting as $method => $args ) {
			$args['methods'] = $method;
			unset( $args['schema'] );
			$route_args[] = $args;
		}
		$this->register_route( $route_args );
	}

	/**
	 * ルートの登録
	 *
	 * @param array $args 引数.
	 */
	protected function register_route( $args ) {
		if ( empty( static::ADDITIONAL_PATH ) ) {
			$route = '/' . static::PATH;
		} else {
			$route         = '/' . static::PATH . '/' . static::ADDITIONAL_PATH;
			$openapi_route = '/' . static::PATH . '/' . static::OPENAPI_ADDITIONAL_PATH;
		}

		$new_args = $this->change_register_route_args_callback( $args );
		register_rest_route( self::NAMESPACE, $route, $new_args );
		self::$path_schemas[ $openapi_route ?? $route ] = array( $this, 'get_openapi_schema' );
	}

	/**
	 * ルート登録の引数をregister_rest_routeに合わせて変更
	 *
	 * @param array $args 引数.
	 */
	private function change_register_route_args_callback( $args ) {
		$new_args = $args;
		foreach ( $args as $key => $arg ) {
			if ( isset( $arg['callback'] ) ) {
				$new_args[ $key ]['callback'] = $this->generate_callback_wrapper( $arg['callback'] );
			}
			if ( isset( $arg['args'] ) ) {
				unset( $new_args[ $key ]['args'] );
			}
		}
		return $new_args;
	}

	/**
	 * APIのコールバックのラッパー
	 *
	 * @param callable $callback コールバック.
	 */
	public function generate_callback_wrapper( $callback ) {
		return function ( $request ) use ( $callback ) {
			$result = $this->validate_request( $request );
			if ( is_wp_error( $result ) ) {
				return $result->to_response();
			}

			try {
				return call_user_func( $callback, $request );
			} catch ( Authorize_Exception $e ) {
				if ( $e->getCode() === Authorize_Exception::MESSAGING_CHANNEL ) {
					$error = new API_Error(
						API_Error::CODE_MESSAGING_CHANNEL_NOT_AUTHORIZED,
						'メッセージングチャンネルの認証エラー'
					);
				} else {
					$error = new API_Error( API_Error::CODE_UNKNOWN_ERROR, 'エラーが発生しました。' );
				}
				return $error->to_response();
			} catch ( Exception $e ) {
				if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
					return new WP_Error(
						'error',
						$e->getMessage() . "\n" . $e->getFile() . ':' . $e->getLine() . "\n" .
						$e->getTraceAsString(),
						array( 'status' => 500 )
					);
				} else {
					$error = new API_Error( API_Error::CODE_UNKNOWN_ERROR, 'エラーが発生しました。' );
				}
				return $error->to_response();
			}
		};
	}

	/**
	 * リクエストのバリデーション
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	private function validate_request( $request ) {
		$method  = $request->get_method();
		$schemas = $this->get_route_setting()[ $method ]['schema'];

		if ( array_key_exists( 'request_body', $schemas ) ) {
			$request_body_schema = $schemas['request_body'];
			$request_body        = json_decode( $request->get_body() );
			[$result, $error]    = Validator::validate( $request_body, $request_body_schema );
			if ( $result ) {
				return true;
			} else {
				return new API_Validation_Error(
					API_Validation_Error::CODE_INVALID_BODY,
					'リクエストボディが不正です',
					$error
				);
			}
		}
	}

	/**
	 * アイテムをレスポンスに変換
	 *
	 * @param DTO_Base        $dto     DTO.
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function prepare_item_for_response( $dto, $request ) {
		$item = $dto->to_array();

		$schema_file = $this->get_route_setting()[ $request->get_method() ]['schema']['response'];
		$item        = $this->filter_item_by_schema( $item, $schema_file );

		return $item;
	}

	/**
	 * アイテムをスキーマでフィルターする
	 *
	 * @param array $item   アイテム.
	 * @param array $schema_file スキーマファイル.
	 */
	public function filter_item_by_schema( $item, $schema_file ) {
		$schema = Validator::get_schema( $schema_file );
		if ( ! isset( $schema->additionalProperties ) || $schema->additionalProperties !== false // phpcs:ignore
			|| ! isset( $schema->properties ) ) {
			return $item;
		}

		foreach ( $item as $key => $value ) {
			if ( ! isset( $schema->properties->$key ) ) {
				unset( $item[ $key ] );
			}
		}

		return $item;
	}

	/**
	 * コレクションのパラメータースキーマを取得
	 */
	public function get_collection_params() {
		$params = parent::get_collection_params();
		unset( $params['search'] );
		return $params;
	}

	/**
	 * オプション変更の権限チェック
	 */
	public function manage_option_permission_check() {
		$check = current_user_can( 'manage_options' );
		if ( $check ) {
			return true;
		}

		$status = 401;

		if ( is_user_logged_in() ) {
			$status = 403;
		}

		return new WP_Error( 'error', '権限がありません', array( 'status' => $status ) );
	}

	/**
	 * OPEN APIのスキーマを生成
	 */
	abstract protected function get_openapi_schema();

	/**
	 * DTOのスキーマをAPIのスキーマに変換
	 *
	 * @param array $schema DTOのスキーマ.
	 * @param array $args   引数.
	 */
	public function convert_dto_schema_to_api_schema( $schema, $args = array() ) {
		if ( isset( $schema['properties'] ) ) {
			foreach ( $schema['properties'] as $key => $value ) {
				$camel_key = String_Converter::snake_to_camel( $key );
				$this_args = isset( $args['properties'] ) && array_key_exists( $key, $args['properties'] )
												? $args['properties'][ $key ] : array();

				$schema['properties'][ $camel_key ] = $this->convert_dto_schema_to_api_schema( $value, $this_args );
				if ( $camel_key !== $key ) {
					unset( $schema['properties'][ $key ] );
				}
			}
		} elseif ( isset( $schema['items'] ) ) {
			$this_args       = array_key_exists( 'items', $args ) ? $args['items'] : array();
			$schema['items'] = $this->convert_dto_schema_to_api_schema( $schema['items'], $this_args );
		}

		foreach ( $args as $key => $value ) {
			if ( $key !== 'properties' && $key !== 'items' ) {
				$schema[ $key ] = $value;
			}
		}

		if ( ! array_key_exists( 'context', $schema ) ) {
			$schema['context'] = array( 'view', 'edit', 'embed' );
		}

		return $schema;
	}
}
