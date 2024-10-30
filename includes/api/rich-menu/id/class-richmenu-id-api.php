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
use LClutch\API\OpenAPI\OpenAPI_Parameters;
use LClutch\API\OpenAPI\OpenAPI_Schemas;
use LClutch\Model\DAO\DAO_Interface;
use LClutch\Model\DTO\RichMenu\RichMenu_DTO;
use LClutch\Model\DAO\RichMenu_DAO;

/**
 * リッチメニューID API
 */
class RichMenu_ID_API extends Entity_API_Base {

	const PATH                    = 'rich-menu';
	const ADDITIONAL_PATH         = '(?P<id>[\d]+)';
	const OPENAPI_ADDITIONAL_PATH = '{id}';

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
			'GET'    => array(
				'callback'            => array( $this, 'get_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'api/rich-menu-response.json',
				),
			),
			'PUT'    => array(
				'callback'            => array( $this, 'update_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'request_body' => 'api/rich-menu-request.json',
					'response'     => 'api/rich-menu-response.json',
				),
			),
			'DELETE' => array(
				'callback'            => array( $this, 'delete_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'api/rich-menu-response.json',
				),
			),
		);
	}

	/**
	 * Open APIのスキーマを生成
	 */
	public function get_openapi_schema() {
		return array(
			'get'    => array(
				'summary'     => 'リッチメニューを取得',
				'description' => 'リッチメニューを取得します。',
				'parameters'  => array( OpenAPI_Parameters::get_id_reference() ),
				'responses'   => array(
					'200' => array(
						'description' => 'リッチメニュー',
						'content'     => OpenAPI_Schemas::get_json_reference( 'api/rich-menu-response.json' ),
					),
				),
			),
			'put'    => array(
				'summary'     => 'リッチメニューを更新',
				'description' => 'リッチメニューを更新します。',
				'parameters'  => array( OpenAPI_Parameters::get_id_reference() ),
				'requestBody' => array(
					'description' => '更新するリッチメニュー',
					'required'    => true,
					'content'     => OpenAPI_Schemas::get_json_reference( 'api/rich-menu-request.json' ),
				),
				'responses'   => array(
					'200' => array(
						'description' => '更新したリッチメニュー',
						'content'     => OpenAPI_Schemas::get_json_reference( 'api/rich-menu-response.json' ),
					),
				),
			),
			'delete' => array(
				'summary'     => 'リッチメニューを削除',
				'description' => 'リッチメニューを削除します。',
				'parameters'  => array( OpenAPI_Parameters::get_id_reference() ),
				'responses'   => array(
					'200' => array(
						'description' => '削除したリッチメニュー',
						'content'     => OpenAPI_Schemas::get_json_reference( 'api/rich-menu-response.json' ),
					),
				),
			),
		);
	}
}
