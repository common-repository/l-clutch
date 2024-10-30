<?php
/**
 * WordPress APIのスキーマ
 *
 * @package LClutch\API\OpenAPI
 */

namespace LClutch\API\OpenAPI;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * WordPress APIのスキーマ
 */
class WP_Schema {

	/**
	 * パススキーマの取得
	 */
	public static function get_path_schemas() {
		return array_merge(
			self::get_search_schema()
		);
	}

	/**
	 * Search ルートのスキーマ
	 */
	private static function get_search_schema() {
		return array(
			'~/wp/v2/search' => array(
				'get' => array(
					'summary'     => '検索',
					'description' => '検索',
					'parameters'  => array(
						OpenAPI_Parameters::get_page_reference(),
						OpenAPI_Parameters::get_per_page_reference(),
						array(
							'name'        => 'search',
							'in'          => 'query',
							'description' => '検索クエリ',
							'required'    => true,
							'schema'      => array(
								'type' => 'string',
							),
						),
						array(
							'name'        => 'type',
							'in'          => 'query',
							'description' => '検索タイプ',
							'schema'      => OpenAPI_Schemas::get_schema_reference( 'api/wp-object-type.json' ),
						),
						array(
							'name'        => 'subtype',
							'in'          => 'query',
							'description' => '検索サブタイプ',
							'schema'      => array(
								'allOf' => array(
									OpenAPI_Schemas::get_schema_reference( 'api/wp-object-sub-type.json' ),
									array(
										'enum' => array( 'any' ),
									),
								),
							),
						),
					),
					'responses'   => array(
						'200' => array(
							'description' => '成功',
							'content'     => OpenAPI_Schemas::get_list_content_reference( 'api/wp-search-response.json' ),
						),
					),
				),
			),
		);
	}
}
