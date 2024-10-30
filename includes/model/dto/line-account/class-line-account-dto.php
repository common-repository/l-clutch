<?php
/**
 * LINEアクションのベースクラス
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO\Line_Account;

use LClutch\Model\DTO\DTO_Base;
use LClutch\LineApi\MessagingApi\Model\UserProfileResponse;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LINEアカウント
 */
class Line_Account_DTO extends DTO_Base {

	const SCHEMA_FILE = 'line-account/line-account.json';

	/**
	 * ユーザーIDのゲッター
	 *
	 * @return string
	 */
	public function get_user_id() {
		return $this->get_container( 'user_id' );
	}

	/**
	 * 表示名のゲッター
	 *
	 * @return string
	 */
	public function get_display_name() {
		return $this->get_container( 'display_name' );
	}

	/**
	 * プロフィール画像のURLのゲッター
	 *
	 * @return string|null
	 */
	public function get_picture_url() {
		return $this->get_container( 'picture_url' );
	}

	/**
	 * ステータスメッセージのゲッター
	 *
	 * @return string|null
	 */
	public function get_status_message() {
		return $this->get_container( 'status_message' );
	}

	/**
	 * 言語のゲッター
	 *
	 * @return string|null
	 */
	public function get_language() {
		return $this->get_container( 'language' );
	}

	/**
	 * メールアドレスのゲッター
	 *
	 * @return string|null
	 */
	public function get_email() {
		return $this->get_container( 'email' );
	}

	/**
	 * 友達かどうかのゲッター
	 *
	 * @return bool|null
	 */
	public function get_friend_flag() {
		return $this->get_container( 'friend_flag' );
	}

	/**
	 * Messaging APIのProfileレスポンスからDTOを作成する
	 *
	 * @param UserProfileResponse $response レスポンス.
	 */
	public static function from_profile_response( UserProfileResponse $response ): self {
		return new self(
			array(
				'user_id'        => $response->getUserId(),
				'display_name'   => $response->getDisplayName(),
				'picture_url'    => $response->getPictureUrl(),
				'status_message' => $response->getStatusMessage(),
				'language'       => $response->getLanguage(),
			)
		);
	}
}
