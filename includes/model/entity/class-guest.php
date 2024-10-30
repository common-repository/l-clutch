<?php
/**
 * ゲストユーザー
 *
 * @package LClutch\Model\Entity
 */

namespace LClutch\Model\Entity;

use LClutch\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * ゲストユーザー
 */
class Guest {

	/**
	 * ゲストユーザーのID
	 *
	 * @var string
	 */
	public string $id;

	/**
	 * Nonceアクション配列
	 *
	 * @var array
	 */
	private array $nonce_actions = array();

	/**
	 * コンストラクタ
	 *
	 * @param string $id ゲストユーザーID.
	 */
	private function __construct( $id ) {
		$this->id = $id;
	}

	/**
	 * セッションからインスタンスを生成
	 */
	public static function get_from_session() {
		$id = self::get_id_from_session();
		if ( empty( $id ) ) {
			return null;
		}
		return new self( $id );
	}

	/**
	 * セッションからインスタンスを生成。セッションになければ新規作成
	 */
	public static function create_or_get_from_session() {
		$id = self::get_id_from_session();
		if ( empty( $id ) ) {
			$id = self::generate_id();
		}
		$user = new self( $id );
		$user->set_id_to_session();
		return $user;
	}

	/**
	 * セッションからゲストユーザーIDを取得する
	 */
	private static function get_id_from_session() {
		return isset( $_SESSION['l-clutch_guest-user-id'] ) ? sanitize_key( $_SESSION['l-clutch_guest-user-id'] ) : '';
	}

	/**
	 * セッションにゲストユーザーIDを設定する
	 */
	public function set_id_to_session() {
		$_SESSION['l-clutch_guest-user-id'] = $this->id;
	}

	/**
	 * ゲストユーザーのIDを生成する
	 *
	 * @return string
	 */
	private static function generate_id() {
		return 'guest_' . Utils::generate_random_string( 16 );
	}

	/**
	 * ゲストユーザーを削除する
	 */
	public function delete() {
		unset( $_SESSION['l-clutch_guest-user-id'] );
	}

	/**
	 * Nonce用にユーザーIDを設定する
	 *
	 * @param int    $user_id ユーザーID.
	 * @param string $action アクション.
	 */
	public function set_nonce_user_id( $user_id, $action ) {
		if ( in_array( $action, $this->nonce_actions, true ) ) {
			return $this->id;
		} else {
			return $user_id;
		}
	}

	/**
	 * Nonceを生成する
	 *
	 * @param string $action アクション.
	 */
	public function create_nonce( $action = -1 ) {
		$this->nonce_actions[] = $action;
		add_filter( 'nonce_user_logged_out', array( $this, 'set_nonce_user_id' ), 10, 2 );
		return wp_create_nonce( $action );
	}

	/**
	 * UrlにNonceを追加する
	 *
	 * @param string $url URL.
	 * @param string $action アクション.
	 * @param string $name パラメータ名.
	 */
	public function add_nonce_to_url( $url, $action = -1, $name = '_wpnonce' ) {
		$this->nonce_actions[] = $action;
		add_filter( 'nonce_user_logged_out', array( $this, 'set_nonce_user_id' ), 10, 2 );
		return wp_nonce_url( $url, $action, $name );
	}

	/**
	 * Nonceを検証する
	 *
	 * @param string $nonce ノンス.
	 * @param string $action アクション.
	 */
	public function verify_nonce( $nonce, $action = -1 ) {
		$this->nonce_actions[] = $action;
		add_filter( 'nonce_user_logged_out', array( $this, 'set_nonce_user_id' ), 10, 2 );
		return wp_verify_nonce( $nonce, $action );
	}
}
