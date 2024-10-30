<?php
/**
 * ログインチャネルのAPI
 *
 * @package LClutch\API\Setting
 */

namespace LClutch\API\Setting;

use LClutch\Model\Line_Channel\Login_Channel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * ログインチャネルのAPI
 */
class Login_Channel_API extends Line_Channel_API_Base {

	const PATH = 'setting/login-channel';

	/**
	 * チャネルのインスタンスを取得
	 */
	protected function get_channel_instance() {
		return Login_Channel::get_instance();
	}
}
