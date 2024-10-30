<?php
/**
 * Enumの抽象クラス
 *
 * @package LClutch\Model
 */

namespace LClutch\Model;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enumの抽象クラス
 */
abstract class Enum_Base {

	/**
	 * 値
	 *
	 * @var mixed
	 */
	private $value;

	/**
	 * コンストラクタ
	 *
	 * @param mixed $value 値.
	 */
	public function __construct( $value ) {
		$this->value = $value;
	}

	/**
	 * 値のゲッター
	 *
	 * @return mixed
	 */
	public function get_value() {
		return $this->value;
	}

	/**
	 * 値が正しいかどうかをチェックする
	 */
	abstract public function is_valid(): bool;

	/**
	 * 文字列に変換
	 *
	 * @return string
	 */
	public function __toString() {
		return (string) $this->value;
	}
}
