<?php
/**
 * データベースへ保存可能なDTOのインターフェース
 *
 * @package LClutch\API\Common
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

interface DTO_Row_Interface extends DTO_Interface {

	/**
	 * IDのゲッター
	 *
	 * @return ?
	 * int
	 */
	public function get_id();

	/**
	 * データベースの行から作成
	 *
	 * @param array $row データベースの行.
	 * @return self
	 */
	public static function from_row( array $row );

	/**
	 * データベースの行に変換
	 *
	 * @return array
	 */
	public function to_row();
}
