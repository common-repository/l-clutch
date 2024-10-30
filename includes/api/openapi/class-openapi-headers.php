<?php
/**
 * OpenAPIのヘッダー
 *
 * @package LClutch\API\OpenAPI
 */

namespace LClutch\API\OpenAPI;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * OpenAPIのヘッダー
 */
class OpenAPI_Headers {

	/**
	 * Componentsを取得
	 */
	public static function get_components() {
		return array(
			'TotalPages' => array(
				'description' => '利用可能なページ数',
				'schema'      => array(
					'type' => 'integer',
				),
			),
			'Total'      => array(
				'description' => '合計アイテム数',
				'schema'      => array(
					'type' => 'integer',
				),
			),
		);
	}

	/**
	 * リストのヘッダー参照を取得
	 */
	public static function get_list_reference() {
		return array(
			'X-WP-TotalPages' => array( '$ref' => '#/components/headers/TotalPages' ),
			'X-WP-Total'      => array( '$ref' => '#/components/headers/Total' ),
		);
	}
}
