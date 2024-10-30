<?php
/**
 * シングルトンのトレイト
 *
 * @package LClutch\Utils
 */

namespace LClutch\Utils;

use BadMethodCallException;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Singleton_Trait {

	/**
	 * インスタンス
	 *
	 * @var self
	 */
	private static $instance = null;

	/**
	 * インスタンスを取得する
	 *
	 * @return self
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * 初期化する
	 *
	 * @return self
	 * @throws BadMethodCallException 既に初期化済みの場合.
	 */
	public static function initialize() {
		if ( self::$instance !== null ) {
			throw new BadMethodCallException( 'Singleton_Trait::initialize() can only be called once.' );
		}
		self::$instance = new self();
		return self::$instance;
	}

	/**
	 * コンストラクタ
	 */
	private function __construct() {
	}

	/**
	 * クローンできないようにする
	 */
	private function __clone() {
	}
}
