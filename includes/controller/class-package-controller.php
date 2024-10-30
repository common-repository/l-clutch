<?php
/**
 * パッケージコントローラー
 *
 * @package LClutch\Controller
 */

namespace LClutch\Controller;

use LClutch;
use LClutch\Model\Line_Channel\Messaging_Channel;
use LClutch\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * パッケージコントローラー
 */
class Package_Controller {

	/**
	 * コンストラクタ
	 */
	public static function initialize() {
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'register_package' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'register_localize_script' ), 1000 );
	}

	/**
	 * パッケージの登録
	 */
	public static function register_package() {
		$assets = include LClutch::ROOT_DIR . '/dist/packages/assets.php';

		foreach ( $assets as $js => $asset ) {
			$handle = 'l-clutch-' . str_replace( '.js', '', $js );
			$css    = str_replace( '.js', '.css', $js );
			$js     = plugins_url( '/dist/packages/' . $js, LClutch::PLUGIN_FILE );
			if ( file_exists( LClutch::ROOT_DIR . '/dist/packages/' . $css ) ) {
				$css = plugins_url( '/dist/packages/' . $css, LClutch::PLUGIN_FILE );
			} else {
				$css = false;
			}

			Utils::register_asset( $handle, $js, $css, $asset );
		}

		// ブロック用に設定を読み込むスクリプトを登録する.
		wp_register_script( 'l-clutch-block-settings', false ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters
	}

	/**
	 * ローカライズスクリプトの登録
	 */
	public static function register_localize_script() {
		$channel = Messaging_Channel::get_instance();

		$settings = apply_filters(
			'lclutch_core_js_settings',
			array(
				'siteUrl'             => esc_url_raw( site_url() ),
				'assetUrl'            => esc_url_raw( plugins_url( 'dist/assets', LClutch::PLUGIN_FILE ) ),
				'apiBase'             => esc_url_raw( rest_url() ),
				'basicId'             => $channel->get_basic_id(),
				'nonce'               => wp_create_nonce( 'wp_rest' ),
				'adminUrlActionNonce' => wp_create_nonce( 'l-clutch_admin-url-action' ),
			)
		);

		wp_localize_script( 'l-clutch-core', 'lClutchCoreSettings', $settings );
		wp_localize_script( 'l-clutch-block-settings', 'lClutchCoreSettings', $settings );
	}
}
