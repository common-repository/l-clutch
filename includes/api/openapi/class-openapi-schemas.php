<?php
/**
 * OpenAPIのスキーマ
 *
 * @package LClutch\API\OpenAPI
 */

namespace LClutch\API\OpenAPI;

use LClutch;
use LClutch\Model\DTO\Status_Schema_Trait;
use LClutch\Utils\String_Converter;
use LClutch\Utils\Validator;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * OpenAPIのスキーマ
 */
class OpenAPI_Schemas {

	const ADDITIONAL_SCHEMA_FILES = array(
		'image.json',
		'status.json',
		'line-action/line-action.json',
		'line-action/message-action.json',
		'line-action/postback-action.json',
		'line-action/rich-menu-switch-action.json',
		'line-action/uri-action.json',
		'rich-menu/rich-menu-bounds.json',
	);

	/**
	 * 使用したスキーマ
	 *
	 * @var array
	 */
	private static $schemas = array();

	/**
	 * Componentsのschemasを取得
	 */
	public static function get_components() {

		foreach ( self::ADDITIONAL_SCHEMA_FILES as $schema_file ) {
			$schema = Validator::get_schema( $schema_file );
			$name   = self::get_component_name( $schema );
			self::add_schema( $name, $schema_file );
		}

		return self::$schemas;
	}

	/**
	 * Schemaリファレンスを取得
	 *
	 * @param string $schema_file スキーマファイル.
	 */
	public static function get_schema_reference( $schema_file ) {
		$schema = Validator::get_schema( $schema_file );
		$name   = self::get_component_name( $schema );
		self::add_schema( $name, $schema_file );

		return array(
			'$ref' => '#/components/schemas/' . $name,
		);
	}

	/**
	 * スキーマを追加
	 *
	 * @param string $name        スキーマ名.
	 * @param string $schema_file スキーマファイル.
	 */
	public static function add_schema( $name, $schema_file ) {
		self::$schemas[ $name ] = array( '$ref' => plugins_url( 'schemas/' . $schema_file, LClutch::PLUGIN_FILE ) );
	}

	/**
	 * JSONコンテンツのスキーマを取得
	 *
	 * @param string|callable $schema スキーマクラス名、またはスキーマ取得関数.
	 */
	public static function get_json_reference( $schema ) {
		return array(
			'application/json' => array(
				'schema' => self::get_schema_reference( $schema ),
			),
		);
	}

	/**
	 * リストのコンテントスキーマを取得
	 *
	 * @param string|callable $schema スキーマクラス名、またはスキーマ取得関数.
	 */
	public static function get_list_content_reference( $schema ) {
		return array(
			'application/json' => array(
				'schema' => array(
					'type'  => 'array',
					'items' => self::get_schema_reference( $schema ),
				),
			),
		);
	}

	/**
	 * スキーマのコンポーネント名を取得
	 *
	 * @param object $schema スキーマ.
	 */
	public static function get_component_name( $schema ) {
		return String_Converter::space_to_camel( $schema->title, true );
	}
}
