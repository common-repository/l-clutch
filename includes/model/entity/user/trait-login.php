<?php
/**
 * ユーザーのログインに関する処理
 *
 * @package LClutch\Model\Entity\User
 */

namespace LClutch\Model\Entity\User;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Model\DTO\Line_Account\Access_Token_DTO;
use LClutch\Model\DTO\Line_Account\Line_Account_DTO;
use LClutch\Model\Entity\User;
use LClutch\Model\Line_Channel\Login_Channel;

trait Login_Trait {

	use Line_Account_Trait;

	/**
	 * ログインの有効期限
	 *
	 * @var int
	 */
	private $login_expires_in = null;

	/**
	 * ログイン
	 *
	 * @param int $expires_in 有効期限.
	 */
	private function login( int $expires_in ) {
		$this->login_expires_in = $expires_in;
		add_filter( 'auth_cookie_expiration', array( $this, 'change_auth_cookie_expiration' ), 10, 3 );
		add_filter( 'authenticate', array( $this, 'authenticate_without_password' ), 10, 2 );

		$credentials = array(
			'user_login' => $this->data->user_login,
			'remember'   => true,
		);

		wp_signon( $credentials );
		wp_set_current_user( $this->ID );
		$this->set_line_last_login_at_now();
	}

	/**
	 * 新規ユーザーの作成
	 *
	 * @param Line_Account_DTO $line_account LINEアカウント.
	 */
	public static function create( Line_Account_DTO $line_account ) {
		if ( $line_account === null ) {
			return;
		}

		$user_id = wp_create_user( $line_account->get_user_id(), wp_generate_password(), $line_account->get_email() );
		$user    = new self( $user_id );
		$user->set_role( User::LINE_USER_ROLE );
		$user->data->display_name = $line_account->get_display_name();
		wp_update_user( $user );
		$user->update_line_account_meta( $line_account );
		do_action( 'lclutch_create_user', $user, $line_account );
		return $user;
	}

	/**
	 * LINEのアクセストークンでログイン
	 *
	 * @param Access_Token_DTO $line_access_token アクセストークン.
	 */
	public static function login_with_line_access_token( Access_Token_DTO $line_access_token ) {
		$user = User::get_current();

		// ログイン済みの場合かつ、直前のアクセストークンと一致する場合は終了.
		if ( $user->ID !== 0 && $line_access_token === $user->get_line_access_token() ) {
			return;
		}

		// LINEアカウントを取得.
		$channel           = Login_Channel::get_instance();
		$line_access_token = $channel->verify( $line_access_token );
		$line_account      = $channel->get_line_account( $line_access_token );

		$user = new User( get_user_by( 'login', $line_account->get_user_id() ) );

		if ( $user->ID === 0 ) {
			$user = self::create( $line_account );
		} else {
			$user->update_line_account_meta( $line_account );
		}

		$user->set_line_access_token( $line_access_token );
		$user->login( $line_access_token->get_expires_in() );
	}

	/**
	 * ログイン状態を維持する期間を変更する
	 *
	 * @param int $expiration 期限.
	 * @param int $user_id ユーザーID.
	 * @param int $remember ログイン状態を維持するか.
	 */
	public function change_auth_cookie_expiration( $expiration, $user_id, $remember ) {
		if ( $this->login_expires_in === null ) {
			return $expiration;
		} elseif ( $this->ID === $user_id && $remember ) {
			return $this->login_expires_in;
		} elseif ( $this->login_expires_in < $expiration ) {
			return $this->login_expires_in;
		} else {
			return $expiration;
		}
	}

	/**
	 * パスワード無しで認証する
	 *
	 * @param null|WP_User|WP_Error $user ユーザー.
	 * @param string                $username ユーザー名.
	 */
	public function authenticate_without_password( $user, $username ) {
		if ( $this->data->user_login === $username ) {
			return $this;
		} else {
			return $user;
		}
	}
}
