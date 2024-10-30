<?php
/**
 * ボット情報のAPI
 *
 * @package LClutch\API\Setting\Messaging_Channel
 */

namespace LClutch\API\Setting\Messaging_Channel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\API\LC_REST_Controller;
use LClutch\API\OpenAPI\OpenAPI_Schemas;
use LClutch\Model\Line_Channel\Messaging_Channel;
use WP_REST_Response;

/**
 * ボット情報のAPI
 */
class Bot_Info_API extends LC_REST_Controller {

	const PATH = 'setting/messaging-channel/bot-info';

	/**
	 * ルートの設定
	 */
	public function get_route_setting() {
		return array(
			'GET'  => array(
				'callback'            => array( $this, 'get_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'setting/bot-info.json',
				),
			),
			'POST' => array(
				'callback'            => array( $this, 'update_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'setting/bot-info.json',
				),
			),
		);
	}

	/**
	 * ボット情報を取得
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function get_item( $request ) {
		$channel  = Messaging_Channel::get_instance();
		$info_dto = $channel->get_bot_info();
		$result   = $this->prepare_item_for_response( $info_dto, $request );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * ボット情報を更新
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function update_item( $request ) {
		$channel  = Messaging_Channel::get_instance();
		$info_dto = $channel->fetch_bot_info();
		$result   = $this->prepare_item_for_response( $info_dto, $request );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * Open APIのスキーマを生成
	 */
	public function get_openapi_schema() {
		return array(
			'get'  => array(
				'summary'     => 'ボット情報の取得',
				'description' => '保存されているボット情報を取得します。',
				'responses'   => array(
					'200' => array(
						'description' => 'ボット情報',
						'content'     => OpenAPI_Schemas::get_json_reference( 'setting/bot-info.json' ),
					),
				),
			),
			'post' => array(
				'summary'     => 'ボット情報の更新',
				'description' => 'Messaging APIからボット情報を取得し、更新します。',
				'responses'   => array(
					'200' => array(
						'description' => 'ボット情報',
						'content'     => OpenAPI_Schemas::get_json_reference( 'setting/bot-info.json' ),
					),
				),
			),
		);
	}
}
