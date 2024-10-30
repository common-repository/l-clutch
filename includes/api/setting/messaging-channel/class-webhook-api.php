<?php
/**
 * WebhookのAPI
 *
 * @package LClutch\API\Setting\Messaging_Channel
 */

namespace LClutch\API\Setting\Messaging_Channel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use InvalidArgumentException;
use LClutch\API\API_Error;
use LClutch\API\LC_REST_Controller;
use LClutch\API\OpenAPI\OpenAPI_Schemas;
use LClutch\Model\Line_Channel\Messaging_Channel;
use WP_REST_Response;

/**
 * WebhookのAPI
 */
class Webhook_API extends LC_REST_Controller {

	const PATH = 'setting/messaging-channel/webhook';

	/**
	 * ルートの設定
	 */
	public function get_route_setting() {
		return array(
			'GET'  => array(
				'callback'            => array( $this, 'get_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'setting/webhook-setting.json',
				),
			),
			'POST' => array(
				'callback'            => array( $this, 'update_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'setting/webhook-setting.json',
				),
			),
		);
	}

	/**
	 * Webhookのエンドポイントを取得
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function get_item( $request ) {
		$channel = Messaging_Channel::get_instance();

		try {
			$setting = $channel->check_webhook_endpoint();
		} catch ( InvalidArgumentException $e ) {
			$error = new API_Error( API_Error::CODE_NOT_PREPARED, $e->getMessage() );
			return $error->to_response();
		}

		$result = $this->prepare_item_for_response( $setting, $request );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * Webhookのエンドポイントを更新
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function update_item( $request ) {
		$channel = Messaging_Channel::get_instance();

		$channel->register_webhook_endpoint();
		$setting = $channel->check_webhook_endpoint();

		$result = $this->prepare_item_for_response( $setting, $request );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * Open APIのスキーマを生成
	 */
	public function get_openapi_schema() {
		return array(
			'get'  =>
				array(
					'summary'     => 'Webhookのエンドポイントを取得',
					'description' => '保存されているWebhookのエンドポイントを取得します。',
					'responses'   => array(
						'200' => array(
							'description' => 'Webhookのエンドポイント',
							'content'     => OpenAPI_Schemas::get_json_reference( 'setting/webhook-setting.json' ),
						),
					),
				),
			'post' =>
				array(
					'summary'     => 'Webhookのエンドポイントを更新',
					'description' => 'Messaging APIから、Webhookのエンドポイントを取得し、データを更新します。',
					'responses'   => array(
						'200' => array(
							'description' => 'Webhookのエンドポイント',
							'content'     => OpenAPI_Schemas::get_json_reference( 'setting/webhook-setting.json' ),
						),
					),
				),
		);
	}
}
