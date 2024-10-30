<?php
/**
 * Messaging APIチャネルのAPI
 *
 * @package LClutch\API\Setting
 */

namespace LClutch\API\Setting;

use LClutch\Model\Line_Channel\Messaging_Channel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Messaging APIチャネルのAPI
 */
class Messaging_Channel_API extends Line_Channel_API_Base {

	const PATH = 'setting/messaging-channel';

	/**
	 * チャネルのインスタンスを取得
	 */
	protected function get_channel_instance() {
		return Messaging_Channel::get_instance();
	}
}
