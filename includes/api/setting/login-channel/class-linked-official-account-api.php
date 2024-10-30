<?php
/**
 * ログインチャネルとLINE公式アカウントのリンク状況を確認するAPI
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
 * ログインチャネルとLINE公式アカウントのリンク状況を確認するAPI
 */
class Linked_Official_Account_API extends LC_REST_Controller {

	const PATH = 'setting/login-channel/linked-official-account';

	/**
	 * ルートの設定
	 */
	public function get_route_setting() {
		return array(
			'GET' => array(
				'callback'            => array( $this, 'get_item' ),
				'permission_callback' => array( $this, 'manage_option_permission_check' ),
				'schema'              => array(
					'response' => 'setting/linked-official-account.json',
				),
			),
		);
	}

	/**
	 * ログインチャネルとLINE公式アカウントがリンクしているかどうか
	 *
	 * @param WP_REST_Request $request リクエスト.
	 */
	public function get_item( $request ) {
		$channel   = Login_Channel::get_instance();
		$is_linked = $channel->get_is_linked_official_account();
		$result    = array(
			'is_linked' => $is_linked,
		);
		return new WP_REST_Response( $result, 200 );
	}

	/**
	 * Open APIのスキーマを生成
	 */
	public function get_openapi_schema() {
		return array(
			'get' =>
				array(
					'summary'     => 'ログインチャネルとLINE公式アカウントのリンク状況を確認',
					'description' => 'ログインチャネルとLINE公式アカウントのリンク状況を確認します。',
					'responses'   => array(
						'200' => array(
							'description' => 'リンク状況',
							'content'     => OpenAPI_Schemas::get_json_reference( 'setting/linked-official-account.json' ),
						),
					),
				),
		);
	}
}
