<?php
/**
 * リッチメニューAPI
 *
 * @package LClutch\API\RichMenu
 */

namespace LClutch\API\RichMenu;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\API\Entity_API_Base;
use LClutch\API\OpenAPI\OpenAPI_Headers;
use LClutch\API\OpenAPI\OpenAPI_Parameters;
use LClutch\API\OpenAPI\OpenAPI_Schemas;
use LClutch\Model\DAO\DAO_Interface;
use LClutch\Model\DTO\RichMenu\RichMenu_DTO;
use LClutch\Model\DAO\RichMenu_DAO;

/**
 * リッチメニューAPI
 */
class RichMenu_API extends Entity_API_Base {

	const PATH = 'rich-menu';

	/**
	 * DAOのインスタンスを取得
	 */
	protected function get_dao(): DAO_Interface {
		return RichMenu_DAO::get_instance();
	}

	/**
	 * DTOクラス名を取得
	 */
	protected function get_dto_class_name(): string {
		return RichMenu_DTO::class;
	}

	/**
	 * ルートの設定
	 */
	public function get_route_setting() {
		return array(
			'GET'  => array(
				'callback'            => array( $this, 'get_items' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'api/rich-menu-response.json',
				),
			),
			'POST' => array(
				'callback'            => array( $this, 'create_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'request_body' => 'api/rich-menu-request.json',
					'response'     => 'api/rich-menu-response.json',
				),
			),
		);
	}

	/**
	 * Open APIのスキーマを生成
	 */
	public function get_openapi_schema() {
		return array(
			'get'  => array(
				'summary'     => 'リッチメニューの一覧',
				'description' => 'リッチメニューの一覧を取得します。',
				'parameters'  => array(
					OpenAPI_Parameters::get_page_reference(),
					OpenAPI_Parameters::get_per_page_reference(),
					OpenAPI_Parameters::get_status_reference(),
				),
				'responses'   => array(
					'200' => array(
						'description' => 'リッチメニューの一覧',
						'headers'     => OpenAPI_Headers::get_list_reference(),
						'content'     => OpenAPI_Schemas::get_list_content_reference( 'api/rich-menu-response.json' ),
					),
				),
			),
			'post' => array(
				'summary'     => 'リッチメニューの作成',
				'description' => 'リッチメニューを作成します。',
				'requestBody' => array(
					'required' => true,
					'content'  => OpenAPI_Schemas::get_json_reference( 'api/rich-menu-request.json' ),
				),
				'responses'   => array(
					'200' => array(
						'description' => '作成したリッチメニューの情報',
						'content'     => OpenAPI_Schemas::get_json_reference( 'api/rich-menu-response.json' ),
					),
				),
			),
		);
	}
}
