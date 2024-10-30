<?php
/**
 * ショートコードコントローラー
 *
 * @package LClutch\Controller
 */

namespace LClutch\Controller;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Utils\Singleton_Trait;
use LClutch\Model\Entity\User;

/**
 * ショートコードコントローラー
 */
class Shortcode_Controller {

	use Singleton_Trait;

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * 初期化処理
	 */
	public function init() {
		// ブロック.
		add_shortcode( 'l-clutch-login-button', $this->create_blocks( 'l-clutch/login-button' ) );
		add_shortcode( 'l-clutch-logout-button', $this->create_blocks( 'l-clutch/logout-button' ) );
		add_shortcode( 'l-clutch-add-friend-button', $this->create_blocks( 'l-clutch/add-friend-button' ) );
		add_shortcode( 'l-clutch-restricted-area', $this->create_blocks( 'l-clutch/restricted-area' ) );
		add_shortcode( 'l-clutch-profile-picture', $this->create_blocks( 'l-clutch/profile-picture' ) );

		// ショートコード専用.
		add_shortcode( 'l-clutch-user-name', array( $this, 'line_display_name' ) );
	}

	/**
	 * ブロックを作成
	 *
	 * @param string $name ブロック名.
	 * @return callable
	 */
	public function create_blocks( string $name ) {
		return function ( $attributes, $content ) use ( $name ) {
			$attribute = $attributes['attribute'] ?? '';
			if ( $attribute ) {
				$attribute = str_replace( '(|', '[', $attribute );
				$attribute = str_replace( '|)', ']', $attribute );
			}
			if ( $content ) {
				$block  = "<!-- wp:$name $attribute -->";
				$block .= do_shortcode( $content );
				$block .= "<!-- /wp:$name -->";
			} else {
				$block = "<!-- wp:$name $attribute /-->";
			}
			return do_blocks( $block );
		};
	}

	/**
	 * ユーザー名を取得
	 *
	 * @return ?string
	 */
	public function line_display_name() {
		$user = User::get_current();
		return $user->get_line_display_name();
	}
}
