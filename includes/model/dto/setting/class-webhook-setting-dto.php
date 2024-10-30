<?php
/**
 * Webhook設定
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Webhook設定
 */
class Webhook_Setting_DTO extends DTO_Base {

	const SCHEMA_FILE = 'setting/webhook-setting.json';

	/**
	 * エンドポイントのゲッター
	 *
	 * @return ?string
	 */
	public function get_endpoint() {
		return $this->get_container( 'endpoint' );
	}

	/**
	 * URLが有効かどうかのゲッター
	 *
	 * @return ?bool
	 */
	public function get_is_valid() {
		return $this->get_container( 'is_valid' );
	}

	/**
	 * Webhookの有効状態のゲッター
	 *
	 * @return ?bool
	 */
	public function get_active() {
		return $this->get_container( 'active' );
	}
}
