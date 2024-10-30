<?php
/**
 * OpenAPIのパラメータ
 *
 * @package LClutch\API\OpenAPI
 */

namespace LClutch\API\OpenAPI;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * OpenAPIのパラメータ
 */
class OpenAPI_Parameters {

	/**
	 * Componentsを取得
	 */
	public static function get_components() {
		return array(
			'ID'      => array(
				'name'        => 'id',
				'in'          => 'path',
				'description' => 'ID',
				'required'    => true,
				'schema'      => array(
					'type' => 'integer',
				),
			),
			'Page'    => array(
				'name'        => 'page',
				'in'          => 'query',
				'description' => 'ページ番号',
				'schema'      => array(
					'type' => 'integer',
				),
			),
			'PerPage' => array(
				'name'        => 'per_page',
				'in'          => 'query',
				'description' => '1ページあたりのアイテム数',
				'schema'      => array(
					'type' => 'integer',
				),
			),
			'Status'  => array(
				'name'        => 'status',
				'in'          => 'query',
				'description' => 'ステータス',
				'schema'      => OpenAPI_Schemas::get_schema_reference( 'status.json' ),
			),
		);
	}

	/**
	 * Pageパラメータの参照を取得
	 */
	public static function get_page_reference() {
		return array( '$ref' => '#/components/parameters/Page' );
	}

	/**
	 * PerPageパラメータの参照を取得
	 */
	public static function get_per_page_reference() {
		return array( '$ref' => '#/components/parameters/PerPage' );
	}

	/**
	 * IDパスパラメータの参照を取得
	 */
	public static function get_id_reference() {
		return array( '$ref' => '#/components/parameters/ID' );
	}

	/**
	 * Statusパラメータの参照を取得
	 */
	public static function get_status_reference() {
		return array( '$ref' => '#/components/parameters/Status' );
	}
}
