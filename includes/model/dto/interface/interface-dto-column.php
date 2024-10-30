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

interface DTO_Column_Interface extends DTO_Interface {

	/**
	 * データベースのカラムから作成
	 *
	 * @param string $column データベースの行.
	 * @return self
	 */
	public static function from_column( string $column );

	/**
	 * データベースのカラムに変換
	 *
	 * @return string
	 */
	public function to_column();
}
