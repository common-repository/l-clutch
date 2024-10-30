<?php
/**
 * ブロックコントローラー
 *
 * @package LClutch\Controller
 */

namespace LClutch\Controller;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch;

/**
 * ブロックコントローラー
 */
class Block_Controller {

	use \LClutch\Utils\Singleton_Trait;

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_filter( 'block_categories_all', array( $this, 'add_block_category' ) );
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * 初期化
	 */
	public function init() {
		register_block_type( LClutch::ROOT_DIR . '/dist/blocks/login-button' );
		register_block_type( LClutch::ROOT_DIR . '/dist/blocks/logout-button' );
		register_block_type( LClutch::ROOT_DIR . '/dist/blocks/add-friend-button' );
		register_block_type( LClutch::ROOT_DIR . '/dist/blocks/restricted-area' );
		register_block_type( LClutch::ROOT_DIR . '/dist/blocks/profile-picture' );
	}

	/**
	 * ブロックカテゴリーの追加
	 *
	 * @param array $categories カテゴリー.
	 * @return array
	 */
	public function add_block_category( $categories ) {
		array_splice(
			$categories,
			3,
			0,
			array(
				array(
					'slug'  => 'l-clutch',
					'title' => __( 'L-Clutch', 'l-clutch' ),
					'icon'  => 'l-clutch',
				),
			),
		);
		return $categories;
	}
}
