<?php
/**
 * LINE ログインチャネルß
 *
 * @package LClutch\Model\Line_Channel
 */

namespace LClutch\Model\Line_Channel;

use LClutch\Model\Line_Channel\Login_Channel\Line_Login_Trait;
use LClutch\Model\Line_Channel\Login_Channel\Profile_Trait;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LINE ログインチャネル
 */
class Login_Channel extends Line_Channel_Base {

	use \LClutch\Utils\Singleton_Trait;
	use Line_Login_Trait;
	use Profile_Trait;

	/** 認証リクエスト先のホスト */
	public const AUTH_REQUEST_HOST = 'access.line.me';

	/** オプションのキー */
	protected const OPTION_KEYS = array(
		'client_id'                  => 'l-clutch_line-login-channel-client-id',
		'client_secret'              => 'l-clutch_line-login-channel-client-secret',
		'can_access_login_url'       => 'l-clutch_line-login-channel-can-access-login-url',
		'is_linked_official_account' => 'l-clutch_line-login-channel-is-linked-official-account',
	);

	/** トランジェントのキー */
	protected const TRANSIENT_KEYS = array(
		'access_token' => 'l-clutch_line-login-channel-access-token',
	);

	/**
	 * コンストラクタ
	 */
	public function __construct() {
	}

	/**
	 * ログインURLにアクセスできるかどうかの保存値を取得する
	 */
	public function get_can_access_login_url() {
		$result = get_option( self::OPTION_KEYS['can_access_login_url'], null );
		if ( is_null( $result ) ) {
			return null;
		} else {
			return (bool) $result;
		}
	}

	/**
	 * ログインURLにアクセスできるかどうかの保存値を保存する
	 *
	 * @param bool $can_access アクセスできるかどうか.
	 */
	public function set_can_access_login_url( bool $can_access ) {
		update_option( self::OPTION_KEYS['can_access_login_url'], (int) $can_access, false );
	}

	/**
	 * LINE公式アカウントがリンクされているかどうかを取得する
	 */
	public function get_is_linked_official_account() {
		$result = get_option( self::OPTION_KEYS['is_linked_official_account'], null );
		if ( is_null( $result ) ) {
			return null;
		} else {
			return (bool) $result;
		}
	}

	/**
	 * LINE公式アカウントがリンクされているかどうかを保存する
	 *
	 * @param bool $is_linked リンクされているかどうか.
	 */
	public function set_is_linked_official_account( bool $is_linked ) {
		update_option( self::OPTION_KEYS['is_linked_official_account'], (int) $is_linked, false );
	}

	/**
	 * ログインURLにアクセスできるかどうかを確認する
	 */
	public function check_can_access_login_url() {
		$state     = 'dummy';
		$login_url = $this->generate_line_login_url( $state );
		$response  = wp_remote_get( $login_url );
		if ( is_wp_error( $response ) ) {
			$this->set_can_access_login_url( false );
			return false;
		}
		$can_access = $response['response']['code'] === 200;
		$this->set_can_access_login_url( $can_access );
		return $can_access;
	}
}
