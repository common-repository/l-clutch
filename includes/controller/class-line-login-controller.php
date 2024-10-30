<?php
/**
 * LINEログインコントローラー
 *
 * @package LClutch\Controller
 */

namespace LClutch\Controller;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use InvalidArgumentException;
use LClutch\Model\Entity\Guest;
use LClutch\Utils;
use LClutch\Model\Entity\User;
use LClutch\Model\Line_Channel\Login_Channel;

/**
 * LINEログインコントローラー
 */
class Line_Login_Controller {

	use \LClutch\Utils\Singleton_Trait;

	/** セッションのキー */
	const SESSION_KEYS = array(
		'state'       => 'l-clutch_line-login-state',
		'redirect_to' => 'l-clutch_line-login-redirect-to',
	);


	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_filter( 'allowed_redirect_hosts', array( $this, 'add_allowed_redirect_hosts' ) );
	}

	/**
	 * 初期化
	 */
	public function init() {
		// phpcs:disable WordPress.Security.NonceVerification.Recommended -- リクエストの検証は個別のメソッドで行う
		if ( empty( $_GET['l-clutch_line-login'] ) ) {
			return;
		}

		if ( ! session_id() ) {
			session_start();
		}

		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput -- キーとして使用するため、サニタイズ不要
		$line_login = $_GET['l-clutch_line-login'];
		switch ( $line_login ) {
			case 'request':
				$this->start_line_login();
				break;
			case 'auth':
				$this->auth_line_login();
				break;
			case 'request-check-linked':
				$this->start_check_linked_line_account();
				break;
			case 'check-linked':
				$this->check_linked_line_account();
				break;
			default:
				break;
		}
		// phpcs:enable WordPress.Security.NonceVerification.Recommended

		session_write_close();
	}

	/**
	 * リダイレクト先のホストを追加
	 *
	 * @param array $hosts ホスト.
	 * @return array ホスト.
	 */
	public function add_allowed_redirect_hosts( array $hosts ) {
		$hosts[] = Login_Channel::AUTH_REQUEST_HOST;
		return $hosts;
	}

	/**
	 * LINEログインを開始する
	 */
	private function start_line_login() {
		// phpcs:disable WordPress.Security.NonceVerification.Recommended -- ゲストユーザーのverify_nonceで検証する

		if ( empty( $_GET['_wpnonce'] ) ) {
			Utils::redirect( home_url() );
			return;
		}

		$guest = Guest::get_from_session();

		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput -- Nonceの検証のため、サニタイズは不要
		if ( $guest === null || $guest->verify_nonce( $_GET['_wpnonce'], 'l-clutch_url-action' ) === false ) {
			Utils::redirect( home_url() );
			return;
		}
		$guest->delete();

		if ( isset( $_GET['redirect_to'] ) ) {
			$redirect_path = sanitize_url( wp_unslash( $_GET['redirect_to'] ) );
		} elseif ( isset( $_SERVER['HTTP_REFERER'] ) ) {
			$referer_url  = sanitize_url( wp_unslash( $_SERVER['HTTP_REFERER'] ) );
			$parsed_url   = wp_parse_url( $referer_url );
			$home_url     = wp_parse_url( home_url() );
			$is_same_host = $parsed_url['host'] === $home_url['host'];
			$is_same_port = isset( $parsed_url['port'] ) ? $parsed_url['port'] === $home_url['port'] : true;

			if ( $is_same_host && $is_same_port ) {
				$absolute_path = $parsed_url['path'] ?? '';
				$query         = isset( $parsed_url['query'] ) ? '?' . $parsed_url['query'] : '';
				$redirect_path = Utils::convert_relative_path( $absolute_path . $query );
			}
		}

		if ( empty( $redirect_path ) ) {
			$redirect_path = '/';
		}

		$state = Utils::generate_random_string();

		$_SESSION[ self::SESSION_KEYS['state'] ]       = $state;
		$_SESSION[ self::SESSION_KEYS['redirect_to'] ] = $redirect_path;

		// LINEログインのURLを生成してリダイレクト.
		$login_channel = Login_Channel::get_instance();
		$url           = $login_channel->generate_line_login_url( $state );
		Utils::redirect( $url );

		// phpcs:enable WordPress.Security.NonceVerification.Recommended
	}

	/**
	 * LINEログインを実行する
	 */
	private function auth_line_login() {
		$redirect_path = $this->get_session_value_and_remove( self::SESSION_KEYS['redirect_to'], 'url' ) ?? '/';
		$this->check_state_otherwise_redirect_to_home();
		// phpcs:disable WordPress.Security.NonceVerification.Recommended -- Stateでリクエストを検証済み

		$redirect_url = home_url( $redirect_path );
		$code         = isset( $_GET['code'] ) ? sanitize_text_field( wp_unslash( $_GET['code'] ) ) : '';
		$access_token = $this->get_line_access_token( $code, 'auth', $redirect_url );
		User::login_with_line_access_token( $access_token );
		Utils::redirect( $redirect_url );
		// phpcs:enable WordPress.Security.NonceVerification.Recommended
	}

	/**
	 * LINE公式アカウントがリンクされているかの確認フローを開始する
	 */
	public function start_check_linked_line_account() {
		// // phpcs:ignore WordPress.Security.ValidatedSanitizedInput -- Nonceの検証のため、サニタイズは不要
		if ( empty( $_GET['_wpnonce'] ) || wp_verify_nonce( $_GET['_wpnonce'], 'l-clutch_admin-url-action' ) === false ) {
			Utils::redirect( home_url() );
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			Utils::redirect( home_url() );
			return;
		}

		$state = Utils::generate_random_string();

		$_SESSION[ self::SESSION_KEYS['state'] ] = $state;

		// LINEログインのURLを生成してリダイレクト.
		$login_channel = Login_Channel::get_instance();
		$url           = $login_channel->generate_line_login_url( $state, 'check-linked' );
		Utils::redirect( $url );
	}

	/**
	 * LINE公式アカウントがリンクされているかを確認する
	 */
	public function check_linked_line_account() {
		if ( ! current_user_can( 'manage_options' ) ) {
			Utils::redirect( home_url() );
			return;
		}

		$this->check_state_otherwise_redirect_to_home();
		// phpcs:disable WordPress.Security.NonceVerification.Recommended -- Stateでリクエストを検証済み
		$redirect_url = admin_url( 'admin.php?page=l-clutch&path=/setting' );
		$code         = isset( $_GET['code'] ) ? sanitize_text_field( wp_unslash( $_GET['code'] ) ) : '';
		$access_token = $this->get_line_access_token( $code, 'check-linked', $redirect_url );

		$channel      = Login_Channel::get_instance();
		$access_token = $channel->verify( $access_token );
		$channel->update_linked_status( $access_token );

		Utils::redirect( $redirect_url );
		// phpcs:enable WordPress.Security.NonceVerification.Recommended
	}

	/**
	 * セッションから値を取得し、削除する
	 *
	 * @param string $key     キー.
	 * @param string $type    タイプ.
	 */
	private function get_session_value_and_remove( string $key, string $type = 'key' ) {
		if ( ! isset( $_SESSION[ $key ] ) ) {
			return null;
		}
		if ( $type === 'key' ) {
			$value = sanitize_key( $_SESSION[ $key ] );
		} elseif ( $type === 'url' ) {
			$value = sanitize_url( $_SESSION[ $key ] );
		}
		unset( $_SESSION[ $key ] );
		return $value;
	}

	/**
	 * Stateをチェックし、一致しない場合は、トップページへリダイレクトする
	 */
	private function check_state_otherwise_redirect_to_home() {
		$state = $this->get_session_value_and_remove( self::SESSION_KEYS['state'] );
		// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotValidated, WordPress.Security.NonceVerification.Recommended -- 一致のチェックのため、サニタイズは不要, リクエストの検証のため、Nonceの検証は不要
		if ( empty( $_GET['state'] ) || $_GET['state'] !== $state ) {
			Utils::redirect( home_url() );
		}
	}

	/**
	 * LINEアクセストークンを取得する
	 *
	 * @param string $code         認証コード.
	 * @param string $mode モード.
	 * @param string $fallback_url フォールバックURL.
	 */
	private function get_line_access_token( string $code, string $mode, string $fallback_url ) {
		$login_channel = Login_Channel::get_instance();
		$redirect_url  = home_url( '/?l-clutch_line-login=' . $mode );
		try {
			return $login_channel->get_user_access_token( $code, $redirect_url );
		} catch ( InvalidArgumentException $e ) {
			Utils::redirect( $fallback_url );
		}
	}
}
