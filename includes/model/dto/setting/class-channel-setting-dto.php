<?php
/**
 * チャンネル設定のDTO
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * チャンネル設定のDTO
 */
class Channel_Setting_DTO extends DTO_Base {

	const SCHEMA_FILE = 'setting/channel-setting.json';

	/**
	 * チャンネルIDのゲッター
	 *
	 * @return string
	 */
	public function get_channel_id() {
		return $this->get_container( 'channel_id' );
	}

	/**
	 * チャンネルシークレットのゲッター
	 *
	 * @return string
	 */
	public function get_channel_secret() {
		return $this->get_container( 'channel_secret' );
	}
}
