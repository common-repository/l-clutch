<?php
/**
 * チャンネル設定のレスポンス
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * チャネルの状態
 */
class Channel_Status_DTO extends DTO_Base {

	const SCHEMA_FILE = 'setting/channel-status.json';

	/**
	 * チャンネルIDのゲッター
	 *
	 * @return ?string
	 */
	public function get_channel_id() {
		return $this->get_container( 'channel_id' );
	}

	/**
	 * チャンネル設定の有効性のゲッター
	 *
	 * @return bool
	 */
	public function get_is_valid() {
		return $this->get_container( 'is_valid' );
	}
}
