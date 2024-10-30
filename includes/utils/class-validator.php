<?php
/**
 * 値のバリデーション
 *
 * @package LClutch\Utils
 */

namespace LClutch\Utils;

use LClutch;
use Opis\JsonSchema\Errors\ValidationError;
use Opis\JsonSchema\Info\DataInfo;
use Opis\JsonSchema\Uri;
use Opis\JsonSchema\Validator as JsonSchema_Validator;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 値のバリデーション
 */
class Validator {

	/**
	 * バリデーター
	 *
	 * @var JsonSchema_Validator
	 */
	private static $validator;

	/**
	 * バリデーターの取得
	 */
	private static function get_validator() {
		if ( ! isset( self::$validator ) ) {
			self::$validator = new JsonSchema_Validator();
			self::register_schemas();
		}
		return self::$validator;
	}

	/**
	 * スキーマの登録
	 */
	private static function register_schemas() {
		$loader = self::get_validator()->loader();
		$loader->setBaseUri( Uri::create( plugins_url( 'schemas', LClutch::PLUGIN_FILE ) ) );
		$resolver = $loader->resolver();
		$resolver->registerPrefix( plugins_url( 'schemas', LClutch::PLUGIN_FILE ), LClutch::ROOT_DIR . '/schemas' );
	}

	/**
	 * スキーマの取得
	 *
	 * @param string $schema_file JSONスキーマファイル.
	 */
	public static function get_schema( $schema_file ) {
		$validator = self::get_validator();
		$schema    = Uri::create( plugins_url( 'schemas/' . $schema_file, LClutch::PLUGIN_FILE ) );
		return $validator->resolver()->resolve( $schema );
	}

	/**
	 * バリデーション
	 *
	 * @param mixed $value 値.
	 * @param array $schema_file JSONスキーマファイル.
	 * @return [bool, ValidationError] [バリデーション結果, バリデーションエラー].
	 */
	public static function validate( $value, $schema_file ) {
		$validator = self::get_validator();
		$schema    = Uri::create( plugins_url( 'schemas/' . $schema_file, LClutch::PLUGIN_FILE ) );
		$result    = $validator->validate( $value, $schema );

		if ( ! $result->isValid() ) {
			return array( false, $result->error() );
		}
		return array( true, '' );
	}

	/**
	 * カスタムエラーを作成する
	 *
	 * @param string $schema_file スキーマファイル.
	 * @param string $key         キー.
	 * @param string $message     エラーメッセージ.
	 */
	public static function create_custom_error( $schema_file, $key, $message ) {
		$schema    = self::get_validator()->loader()->loadSchemaById(
			Uri::create( plugins_url( 'schemas/' . $schema_file, LClutch::PLUGIN_FILE ) )
		);
		$data_info = new DataInfo( null, null, null, array( $key ) );
		return new ValidationError( 'properties', $schema, $data_info, $message );
	}
}
