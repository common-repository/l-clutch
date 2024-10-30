<?php
/**
 * LINEアクションのベースクラス
 *
 * @package LClutch\Model\DTO\Line_Action
 */

namespace LClutch\Model\DTO\Line_Action;

use LClutch\Model\DTO\DTO_Base;
use LClutch\Model\DTO\OpenAPI_DTO_Trait;
use LClutch\Model\Exception\Validation_Exception;
use LClutch\LineApi\MessagingApi\Model\Action;
use LClutch\Utils\Validator;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LINEアクションのベースクラス
 */
abstract class Line_Action_DTO_Base extends DTO_Base {

	use OpenAPI_DTO_Trait;

	const SCHEMA_FILE = 'line-action/line-action.json';

	/**
	 * LINE アクションのリスト
	 *
	 * @var string[]
	 */
	public static $type_map = array(
		'postback'       => Postback_Action_DTO::class,
		'message'        => Message_Action_DTO::class,
		'richmenuswitch' => Rich_Menu_Switch_Action_DTO::class,
		'uri'            => URI_Action_DTO::class,
	);

	/**
	 * アクションの種類を取得する
	 */
	abstract public function get_type(): string;

	/**
	 * ラベルを取得する
	 */
	public function get_label() {
		return $this->get_container( 'label' );
	}

	/**
	 * ビルドする
	 *
	 * @param array $args 引数.
	 * @throws Validation_Exception 無効なタイプの場合.
	 */
	public static function build( $args ) {
		if ( ! array_key_exists( 'type', $args ) ) {
			throw new Validation_Exception(
				Validator::create_custom_error( self::SCHEMA_FILE, 'type', 'type is required' )
			);
		}
		$type = $args['type'];
		if ( ! array_key_exists( $type, self::$type_map ) ) {
			throw new Validation_Exception(
				Validator::create_custom_error( self::SCHEMA_FILE, 'type', 'Invalid type' )
			);
		}

		$new_args = $args;
		unset( $new_args['type'] );
		$class = self::$type_map[ $type ];
		return new $class( $args );
	}

	/**
	 * OpenAPIからビルドする
	 *
	 * @param Action $action LINEアクション.
	 * @throws Validation_Exception 無効なタイプの場合.
	 */
	public static function build_from_openapi( $action ) {
			$type = $action->getType();
		if ( ! array_key_exists( $type, self::$type_map ) ) {
			throw new Validation_Exception(
				Validator::create_custom_error( self::SCHEMA_FILE, 'type', 'Invalid type' )
			);
		}

		$class = self::$type_map[ $type ];
		return $class::from_openapi( $action );
	}
}
