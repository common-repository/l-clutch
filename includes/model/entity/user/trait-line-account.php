<?php
/**
 * ユーザーのメタデータを管理するトレイト
 *
 * @package LClutch\Model\Entity\User
 */

namespace LClutch\Model\Entity\User;

use LClutch\Model\DTO\Line_Account\Access_Token_DTO;
use LClutch\Model\DTO\Line_Account\Line_Account_DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Line_Account_Trait {

	use Meta_Trait;

	/**
	 * 初期化時の処理
	 */
	public static function initialize() {
		$definitions = array(
			'l-clutch_line_access_token'   => array(
				'type'        => 'object',
				'description' => 'LINEアカウントのアクセストークン',
				'single'      => true,
			),
			'l-clutch_line_user_id'        => array(
				'type'        => 'string',
				'description' => 'LINEアカウントのユーザーID',
				'single'      => true,
			),
			'l-clutch_line_display_name'   => array(
				'type'        => 'string',
				'description' => 'LINEアカウントの表示名',
				'single'      => true,
			),
			'l-clutch_line_picture_url'    => array(
				'type'        => 'string',
				'description' => 'LINEアカウントのプロフィール画像のURL',
				'single'      => true,
			),
			'l-clutch_line_status_message' => array(
				'type'        => 'string',
				'description' => 'LINEアカウントのステータスメッセージ',
				'single'      => true,
			),
			'l-clutch_line_language'       => array(
				'type'        => 'string',
				'description' => 'LINEアカウントの言語',
				'single'      => true,
			),
			'l-clutch_line_email'          => array(
				'type'        => 'string',
				'description' => 'LINEアカウントのメールアドレス',
				'single'      => true,
			),
			'l-clutch_line_friend_flag'    => array(
				'type'        => 'boolean',
				'description' => 'LINEアカウントが友達かどうか',
				'single'      => true,
			),
			'l-clutch_line_is_blocked'     => array(
				'type'        => 'boolean',
				'description' => 'LINEアカウントがブロックされているかどうか',
				'single'      => true,
			),
			'l-clutch_line_last_login_at'  => array(
				'type'        => 'integer',
				'description' => 'LINEで最後にログインした日時',
				'single'      => true,
			),
		);
		foreach ( $definitions as $key => $definition ) {
			self::register_meta( $key, $definition );
		}
	}

	/**
	 * LINEアカウントのアクセストークンのゲッター
	 *
	 * @return ?Access_Token_DTO
	 */
	protected function get_line_access_token() {
		return $this->get_meta( 'l-clutch_line_access_token' );
	}

	/**
	 * LINEアカウントのアクセストークンのセッター
	 *
	 * @param Access_Token_DTO $value アクセストークン.
	 */
	private function set_line_access_token( Access_Token_DTO $value ) {
		$this->set_meta( 'l-clutch_line_access_token', $value );
	}

	/**
	 * LINEアカウントのユーザーIDのゲッター
	 *
	 * @return ?string
	 */
	public function get_line_user_id() {
		return $this->get_meta( 'l-clutch_line_user_id' );
	}

	/**
	 * LINEアカウントのユーザーIDのセッター
	 *
	 * @param string $value ユーザーID.
	 */
	private function set_line_user_id( $value ) {
		$this->set_meta( 'l-clutch_line_user_id', $value );
	}

	/**
	 * LINEアカウントの表示名のゲッター
	 *
	 * @return ?string
	 */
	public function get_line_display_name() {
		return $this->get_meta( 'l-clutch_line_display_name' );
	}

	/**
	 * LINEアカウントの表示名のセッター
	 *
	 * @param string $value 表示名.
	 */
	private function set_line_display_name( $value ) {
		$this->set_meta( 'l-clutch_line_display_name', $value );
	}

	/**
	 * LINEアカウントのプロフィール画像のURLのゲッター
	 *
	 * @return ?string
	 */
	public function get_line_picture_url() {
		return $this->get_meta( 'l-clutch_line_picture_url' );
	}

	/**
	 * LINEアカウントのプロフィール画像のURLのセッター
	 *
	 * @param string $value プロフィール画像のURL.
	 */
	private function set_line_picture_url( $value ) {
		$this->set_meta( 'l-clutch_line_picture_url', $value );
	}

	/**
	 * LINEアカウントのステータスメッセージのゲッター
	 *
	 * @return ?string
	 */
	public function get_line_status_message() {
		return $this->get_meta( 'l-clutch_line_status_message' );
	}

	/**
	 * LINEアカウントのステータスメッセージのセッター
	 *
	 * @param string $value ステータスメッセージ.
	 */
	private function set_line_status_message( $value ) {
		$this->set_meta( 'l-clutch_line_status_message', $value );
	}

	/**
	 * LINEアカウントの言語のゲッター
	 *
	 * @return ?string
	 */
	public function get_line_language() {
		return $this->get_meta( 'l-clutch_line_language' );
	}

	/**
	 * LINEアカウントの言語のセッター
	 *
	 * @param string $value 言語.
	 */
	private function set_line_language( $value ) {
		$this->set_meta( 'l-clutch_line_language', $value );
	}

	/**
	 * LINEアカウントのメールアドレスのゲッター
	 *
	 * @return ?string
	 */
	public function get_line_email() {
		return $this->get_meta( 'l-clutch_line_email' );
	}

	/**
	 * LINEアカウントのメールアドレスのセッター
	 *
	 * @param string $value メールアドレス.
	 */
	private function set_line_email( $value ) {
		$this->set_meta( 'l-clutch_line_email', $value );
	}

	/**
	 * LINEアカウントが友達かどうかのゲッター
	 *
	 * @return ?bool
	 */
	public function get_line_friend_flag() {
		return $this->get_meta( 'l-clutch_line_friend_flag' );
	}

	/**
	 * LINEアカウントが友達かどうかのセッター
	 *
	 * @param bool $value 友達かどうか.
	 */
	public function set_line_friend_flag( $value ) {
		$this->set_meta( 'l-clutch_line_friend_flag', $value );
	}

	/**
	 * LINEアカウントがブロックされているかどうかのゲッター
	 *
	 * @return ?bool
	 */
	public function get_line_is_blocked() {
		return $this->get_meta( 'l-clutch_line_is_blocked' );
	}

	/**
	 * LINEアカウントがブロックされているかどうかのセッター
	 *
	 * @param bool $value ブロックされているかどうか.
	 */
	public function set_line_is_blocked( $value ) {
		$this->set_meta( 'l-clutch_line_is_blocked', $value );
	}

	/**
	 * LINEで最後にログインした日時のゲッター
	 *
	 * @return ?int
	 */
	public function get_line_last_login_at() {
		return $this->get_meta( 'l-clutch_line_last_login_at' );
	}

	/**
	 * LINEで最後にログインした日時のセッター
	 */
	private function set_line_last_login_at_now() {
		$this->set_meta( 'l-clutch_line_last_login_at', time() );
	}

	/**
	 * ユーザーメタの更新
	 *
	 * @param Line_Account_DTO $line_account LINEアカウント.
	 */
	public function update_line_account_meta( Line_Account_DTO $line_account ) {
		$this->set_line_user_id( $line_account->get_user_id() );
		$this->set_line_display_name( $line_account->get_display_name() );
		if ( $line_account->get_picture_url() !== null ) {
			$this->set_line_picture_url( $line_account->get_picture_url() );
		}
		if ( $line_account->get_status_message() !== null ) {
			$this->set_line_status_message( $line_account->get_status_message() );
		}
		if ( $line_account->get_language() !== null ) {
			$this->set_line_language( $line_account->get_language() );
		}
		if ( $line_account->get_email() !== null ) {
			$this->set_line_email( $line_account->get_email() );
		}
		if ( $line_account->get_friend_flag() !== null ) {
			$this->set_line_friend_flag( $line_account->get_friend_flag() );
		}
	}
}
