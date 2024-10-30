<?php
/**
 * 管理画面のメニューを追加するクラス
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
 * 管理画面のメニューを追加するクラス
 */
class Admin_Menu_Controller {

	use \LClutch\Utils\Singleton_Trait;

	/** メニューのスラッグ */
	private const MENU_SLUG = 'l-clutch';

	/** メニューの名前 */
	private const MENU_NAME = 'L-Clutch';

	/**
	 * メニューの項目
	 *
	 * @var array
	 */
	private $menu_items = array(
		array(
			'title' => 'L-Clutch',
			'path'  => '/',
		),
		array(
			'title' => 'ユーザー一覧',
			'path'  => '/user',
		),
		array(
			'title' => 'リッチメニュー',
			'path'  => '/rich-menu',
		),
		array(
			'title' => 'LINE Official Account Manager',
			'href'  => 'https://manager.line.biz/account/%s',
		),
		array(
			'title' => 'チャット',
			'href'  => 'https://chat.line.biz/account/%s',
		),
		array(
			'title' => '設定',
			'path'  => '/setting',
		),
	);

	/**
	 * 外部リンクのアイコン
	 *
	 * @var string
	 */
	private static $external_icon = '<span class="dashicons dashicons-external l-clutch-external-icon" data-external></span>';

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}

	/**
	 * 管理画面にメニューを追加
	 */
	public function add_admin_menu() {
		global $submenu;
		$channel  = Messaging_Channel::get_instance();
		$basic_id = $channel->get_basic_id();

		// メインメニューの追加.
		add_menu_page(
			'L-Clutch',
			self::MENU_NAME,
			'manage_options',
			self::MENU_SLUG,
			function () {
				echo '<div class="wrap"><div id="app-root"></div></div>';
			},
			plugins_url( LClutch::PLUGIN_DIR_NAME . '/dist/assets/images/l-clutch-icon_20x20.webp' ),
			50
		);

		// サブメニューの追加.
		foreach ( $this->menu_items as $index => $item ) {
			if ( $index === 0 ) {
				continue;
			}
			$title = $item['title'];

			if ( array_key_exists( 'path', $item ) ) {
				$path = $item['path'];
				add_submenu_page(
					self::MENU_SLUG,
					$title,
					$title,
					'manage_options',
					self::MENU_SLUG . "&path={$path}",
					function () {
					}
				);
			} elseif ( ! empty( $basic_id ) && array_key_exists( 'href', $item ) ) {
				$title_html = $title . self::$external_icon;
				$href       = sprintf( $item['href'], $basic_id );

				// phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$submenu[ self::MENU_SLUG ][] = array( $title_html, 'manage_options', $href );
			}
		}
	}

	/**
	 * 管理画面のスクリプトを読み込む
	 *
	 * @param string $hook フック名.
	 */
	public function admin_enqueue_scripts( $hook ) {
		if ( $hook === 'toplevel_page_' . self::MENU_SLUG ) {
			remove_all_actions( 'admin_notices' ); // 管理画面の通知を削除.

			$assets = apply_filters(
				'lclutch_admin_page_assets',
				array(
					'l-clutch-admin-page' => array(
						'asset' => include LClutch::ROOT_DIR . '/dist/admin/page.asset.php',
						'js'    => plugins_url( '/dist/admin/page.js', LClutch::PLUGIN_FILE ),
						'css'   => plugins_url( '/dist/admin/page.css', LClutch::PLUGIN_FILE ),
					),
				)
			);

			add_filter(
				'lclutch_core_js_settings',
				function ( $settings ) {
					$settings['menuItems'] = $this->menu_items;
					return $settings;
				}
			);
		} else {
			$assets = apply_filters(
				'lclutch_admin_outside_page_assets',
				array(
					'l-clutch-admin-outside-page' => array(
						'asset' => include LClutch::ROOT_DIR . '/dist/admin/outside-page.asset.php',
						'js'    => plugins_url( '/dist/admin/outside-page.js', LClutch::PLUGIN_FILE ),
					),
				)
			);
		}

		foreach ( $assets as $handle => $asset ) {
			Utils::register_asset( $handle, $asset['js'] ?? false, $asset['css'] ?? false, $asset['asset'], true );
		}

		wp_enqueue_style(
			'l-clutch-admin',
			plugins_url( LClutch::PLUGIN_DIR_NAME . '/dist/assets/css/admin.css' ),
			array(),
			filemtime( LClutch::ROOT_DIR . '/dist/assets/css/admin.css' )
		);
	}
}
