<?php
/**
 * キューコントローラー
 *
 * @package LClutch\Controller
 */

namespace LClutch\Controller;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * キューコントローラー
 */
class Que_Controller {

	use \LClutch\Utils\Singleton_Trait;

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		add_action( 'init', array( __CLASS__, 'init' ) );
	}

	/**
	 * 初期化処理
	 */
	public static function init() {
		add_action( 'l-clutch_que', self::class . '::run', 10, 1 );
	}

	/**
	 * キューを実行
	 *
	 * @param string|array $callback コールバック.
	 */
	public static function run( $callback ) {
		call_user_func( $callback );
	}

	/**
	 * キューに追加
	 *
	 * @param int          $time タイムスタンプ.
	 * @param string|array $callback コールバック.
	 */
	public function add( $time, $callback ) {
		if ( ! wp_next_scheduled( 'l-clutch_que', $callback ) ) {
			wp_schedule_single_event( $time, 'l-clutch_que', array( $callback ) );
			spawn_cron();
		}
	}
}
