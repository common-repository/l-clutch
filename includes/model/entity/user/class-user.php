<?php
/**
 * ユーザー
 *
 * @package LClutch\Model\Entity
 */

namespace LClutch\Model\Entity;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Model\Entity\User\{Login_Trait, Avatar_Trait};
use LClutch\Model\Line_Channel\Messaging_Channel;
use LClutch\Utils;
use WP_User;

/**
 * ユーザー
 */
class User extends WP_User {

	use Login_Trait {
		Login_Trait::initialize as login_initialize;
	}
	use Avatar_Trait;

	/** LINEユーザーのロール名 */
	public const LINE_USER_ROLE = 'l-clutch_line-user';

	/**
	 * 現在のユーザー
	 *
	 * @var User
	 */
	private static $current = null;

	/**
	 * 初期化時の処理
	 */
	public static function initialize() {
		self::login_initialize();
		add_action( 'wp', array( __CLASS__, 'setup_frontend' ) );
		add_filter( 'pre_get_avatar', array( __CLASS__, 'get_line_picture_avatar' ), 1, 5 );
		add_filter( 'pre_get_avatar_data', array( __CLASS__, 'get_line_picture_avatar_data' ), 1, 2 );
	}

	/**
	 * 現在のユーザーを取得
	 *
	 * @return User
	 */
	public static function get_current() {
		if ( self::$current !== null ) {
			return self::$current;
		}
		$user = new User( wp_get_current_user() );
		return $user;
	}

	/**
	 * ユーザーを取得
	 *
	 * @param string $user_id ユーザーID.
	 * @param bool   $should_create 存在しない場合に作成するかどうか.
	 */
	public static function get_from_line_user_id( string $user_id, bool $should_create = false ) {
		$id = username_exists( $user_id );
		if ( $id !== false ) {
			return new User( $id );
		} elseif ( $should_create ) {
			$channel = Messaging_Channel::get_instance();
			$account = $channel->get_user_profile( $user_id );
			return self::create( $account );
		} else {
			return null;
		}
	}

	/**
	 * LINEユーザーかどうか検証
	 */
	public function is_line_user() {
		return in_array( self::LINE_USER_ROLE, $this->roles, true );
	}

	/**
	 * ただのLINEユーザーかどうか検証
	 */
	public function is_just_line_user() {
		return $this->roles === array( self::LINE_USER_ROLE );
	}

	/**
	 * LINEユーザーの場合、admin_barを非表示にする
	 */
	public function hide_admin_bar_if_is_line_user() {
		if ( $this->is_just_line_user() ) {
			show_admin_bar( false );
		}
	}

	/**
	 * Frontendの初期化
	 */
	public static function setup_frontend() {
		$user = self::get_current();
		$user->hide_admin_bar_if_is_line_user();

		self::redirect_author_page_if_is_line_user();
	}

	/**
	 * Authorページをリダイレクト
	 */
	public static function redirect_author_page_if_is_line_user() {
		if ( ! is_author() ) {
			return;
		}
		$user = get_queried_object();
		if ( ! $user instanceof WP_User ) {
			return;
		}
		$user = new User( $user );
		if ( $user->is_line_user() ) {
			Utils::redirect( home_url() );
			exit;
		}
	}

	/**
	 * Activate時に実行する処理
	 */
	public static function activate() {
		// LINEユーザーのロールを追加.
		add_role( self::LINE_USER_ROLE, 'LINEユーザー' );
	}
}
