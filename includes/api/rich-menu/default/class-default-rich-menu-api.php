<?php
/**
 * デフォルトのリッチメニューAPI
 * /l-clutch/v1/rich-menu/default
 *
 * @package LClutch\API\RichMenu
 */

namespace LClutch\API\RichMenu;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use InvalidArgumentException;
use LClutch\API\LC_REST_Controller;
use LClutch\API\OpenAPI\OpenAPI_Schemas;
use LClutch\Model\DAO\RichMenu_DAO;
use WP_REST_Response;

/**
 * デフォルトのリッチメニューAPI
 */
class Default_Rich_Menu_API extends LC_REST_Controller {

	const PATH = 'rich-menu/default';

	/**
	 * ルートの登録
	 */
	public function get_route_setting() {
		return array(
			'GET'  => array(
				'callback'            => array( $this, 'get_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'id-object.json',
				),
			),
			'POST' => array(
				'callback'            => array( $this, 'update_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'id-object.json',
				),
			),
		);
	}

	/**
	 *  デフォルトのリッチメニューのidを取得
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function get_item( $request ) {
		$dao        = RichMenu_DAO::get_instance();
		$default_id = $dao->get_default_id();

		if ( $default_id ) {
			$rich_menu = array( 'id' => (int) $default_id );
		} else {
			$rich_menu = array();
		}

		return new WP_REST_Response( $rich_menu, 200 );
	}

	/**
	 *  デフォルトのリッチメニューのidを更新
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function update_item( $request ) {
		$rich_menu = json_decode( $request->get_body(), true );

		if ( ! isset( $rich_menu['id'] ) ) {
			return new WP_REST_Response( 'リッチメニューIDが指定されていません。', 400 );
		}
		$dao = RichMenu_DAO::get_instance();
		$dto = $dao->get( $rich_menu['id'] );
		if ( $dto === null ) {
			return new WP_REST_Response( 'リッチメニューが存在しません。', 400 );
		}
		try {
			$dao->set_default( $dto );
		} catch ( InvalidArgumentException $e ) {
			return new WP_REST_Response( $e->getMessage(), 400 );
		}

		return new WP_REST_Response( array( 'id' => (int) $rich_menu['id'] ), 200 );
	}

	/**
	 * Open APIのスキーマを生成
	 */
	public function get_openapi_schema() {
		return array(
			'get'  => array(
				'summary'     => 'デフォルトのリッチメニューのIDを取得',
				'description' => 'デフォルトのリッチメニューのIDを取得します。',
				'responses'   => array(
					'200' => array(
						'description' => 'デフォルトのリッチメニューのIDオブジェクト',
						'content'     => array(
							'application/json' => array(
								'schema' => array(
									'oneOf' => array(
										OpenAPI_Schemas::get_schema_reference( 'id-object.json' ),
										array( 'type' => 'object' ),
									),
								),
							),
						),
					),
				),
			),
			'post' => array(
				'summary'     => 'デフォルトのリッチメニューのIDを更新',
				'description' => 'デフォルトのリッチメニューのIDを更新します。',
				'requestBody' => array(
					'description' => 'デフォルトのリッチメニューのID',
					'required'    => true,
					'content'     => OpenAPI_Schemas::get_json_reference( 'id-object.json' ),
				),
				'responses'   => array(
					'200' => array(
						'description' => 'デフォルトのリッチメニューのIDオブジェクト',
						'content'     => OpenAPI_Schemas::get_json_reference( 'id-object.json' ),
					),
					'400' => array(
						'description' => 'エラーメッセージ',
						'content'     => OpenAPI_Schemas::get_schema_reference( 'api/error-response.json' ),
					),
				),
			),
		);
	}
}
