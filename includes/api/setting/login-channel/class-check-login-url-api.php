<?php
/**
 * ログインURLの確認API
 *
 * @package LClutch\API\Setting\Login_Channel
 */

namespace LClutch\API\Setting\Login_Channel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\API\LC_REST_Controller;
use LClutch\API\OpenAPI\OpenAPI_Schemas;
use LClutch\Model\Line_Channel\Login_Channel;
use WP_REST_Response;

/**
 * ログインURLの確認のAPI
 */
class Check_Login_URL_API extends LC_REST_Controller {

	const PATH = 'setting/login-channel/check-login-url';

	/**
	 * ルートの設定
	 */
	public function get_route_setting() {
		return array(
			'GET'  => array(
				'callback'            => array( $this, 'get_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'setting/check-login-url.json',
				),
			),
			'POST' => array(
				'callback'            => array( $this, 'update_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'setting/check-login-url.json',
				),
			),
		);
	}

	/**
	 * ログインURLにアクセスできるかどうか（設定値の取得）
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function get_item( $request ) {
		$channel    = Login_Channel::get_instance();
		$can_access = $channel->get_can_access_login_url();
		$result     = array(
			'can_access' => $can_access,
		);
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * ログインURLにアクセスできるかどうか（設定値の更新）
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function update_item( $request ) {
		$channel    = Login_Channel::get_instance();
		$can_access = $channel->check_can_access_login_url();
		$result     = array(
			'can_access' => $can_access,
		);
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * Open APIのスキーマを生成
	 */
	public function get_openapi_schema() {
		return array(
			'get'  =>
				array(
					'summary'     => 'ログインURLの確認結果の取得',
					'description' => 'ログインURLにアクセスできるかどうかを取得します。',
					'responses'   => array(
						'200' => array(
							'description' => 'ログインURLにアクセスできるかどうか',
							'content'     => OpenAPI_Schemas::get_json_reference( 'setting/check-login-url.json' ),
						),
					),
				),
			'post' =>
				array(
					'summary'     => 'ログインURLの確認',
					'description' => 'ログインURLにアクセスできるかどうかを確認します。',
					'responses'   => array(
						'200' => array(
							'description' => 'ログインURLにアクセスできるかどうか',
							'content'     => OpenAPI_Schemas::get_json_reference( 'setting/check-login-url.json' ),
						),
					),
				),
		);
	}
}
