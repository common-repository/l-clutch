<?php
/**
 * LINEアカウント アクセストークンのDTO
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO\Line_Account;

use LClutch\Model\DTO\DTO_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LINEアカウント
 */
class Access_Token_DTO extends DTO_Base {

	const SCHEMA_FILE = 'line-account/access-token.json';

	/**
	 * アクセストークンのゲッター
	 *
	 * @return string
	 */
	public function get_access_token() {
		return $this->get_container( 'access_token' );
	}

	/**
	 * クライアントIDのゲッター
	 *
	 * @return string|null
	 */
	public function get_client_id() {
		return $this->get_container( 'client_id' );
	}

	/**
	 * 有効期限のゲッター
	 *
	 * @return int|null
	 */
	public function get_expires_in() {
		return $this->get_container( 'expires_in' );
	}

	/**
	 * 有効かどうか
	 *
	 * @return bool
	 */
	public function is_valid() {
		return $this->get_expires_in() !== null && $this->get_expires_in() > 0;
	}
}
