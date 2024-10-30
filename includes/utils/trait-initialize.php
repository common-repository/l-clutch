<?php
/**
 * 初期化処理として、クラスのインスタンスを生成するトレイト
 *
 * @package LClutch\Utils
 */

namespace LClutch\Utils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Initialize_Trait {

	/**
	 * 初期化処理
	 *
	 * @return self
	 */
	public static function initialize() {
		return new static();
	}
}
