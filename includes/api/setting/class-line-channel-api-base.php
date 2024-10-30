<?php
/**
 * LINEチャネルAPIのベースクラス
 *
 * @package LClutch\API\Setting
 */

namespace LClutch\API\Setting;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use InvalidArgumentException;
use LClutch\API\API_Error;
use LClutch\API\LC_REST_Controller;
use LClutch\API\OpenAPI\OpenAPI_Schemas;
use LClutch\Model\DTO\Channel_Setting_DTO;
use LClutch\Model\Line_Channel\Line_Channel_Base;
use LClutch\Utils\Array_Key_Converter;
use WP_REST_Response;
use WP_REST_Request;

/**
 * LINEチャネルAPIのベースクラス
 */
abstract class Line_Channel_API_Base extends LC_REST_Controller {

	/**
	 * チャネルのインスタンスを取得
	 *
	 * @return Line_Channel_Base
	 */
	abstract protected function get_channel_instance();

	/**
	 * ルート設定
	 */
	protected function get_route_setting() {
		return array(
			'GET'  => array(
				'callback'            => array( $this, 'get_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'setting/channel-status.json',
				),
			),
			'POST' => array(
				'callback'            => array( $this, 'update_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'request_body' => 'setting/channel-setting.json',
					'response'     => 'setting/channel-status.json',
				),
			),
		);
	}

	/**
	 * APIの設定を取得
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function get_item( $request ) {
		$channel = $this->get_channel_instance();
		$status  = $channel->get_status();
		$result  = $this->prepare_item_for_response( $status, $request );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * APIの設定を更新
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function update_item( $request ) {
		$params  = json_decode( $request->get_body(), true );
		$setting = new Channel_Setting_DTO(
			Array_Key_Converter::camel_to_snake( $params )
		);

		$channel = $this->get_channel_instance();

		try {
			$channel->update_channel( $setting );
		} catch ( InvalidArgumentException $e ) {
			$error = new API_Error( API_Error::CODE_INVALID_PARAMETER, $e->getMessage() );
			return $error->to_response();
		}

		$status = $channel->get_status();
		$result = $this->prepare_item_for_response( $status, $request );
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * Open APIのスキーマを生成
	 */
	public function get_openapi_schema() {
		return array(
			'get'  =>
				array(
					'summary'     => 'チャネルのステータスを取得',
					'description' => 'チャネルのステータスを取得します。',
					'responses'   => array(
						'200' => array(
							'description' => 'チャネルのステータス',
							'content'     => OpenAPI_Schemas::get_json_reference( 'setting/channel-status.json' ),
						),
					),
				),
			'post' =>
				array(
					'summary'     => 'チャネルの設定を更新',
					'description' => 'チャネルの設定を更新します。',
					'requestBody' => array(
						'description' => 'チャネルの設定',
						'required'    => true,
						'content'     => OpenAPI_Schemas::get_json_reference( 'setting/channel-setting.json' ),
					),
					'responses'   => array(
						'200' => array(
							'description' => 'チャネルのステータス',
							'content'     => OpenAPI_Schemas::get_json_reference( 'setting/channel-status.json' ),
						),
						'400' => array(
							'description' => '不正なリクエスト',
							'content'     => OpenAPI_Schemas::get_json_reference( 'api/error-response.json' ),
						),
					),
				),
		);
	}
}
