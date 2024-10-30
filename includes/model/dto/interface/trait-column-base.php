<?php
/**
 * カラムの基本処理
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Column_Base_Trait {

	/**
	 * データベースのカラムに変換する
	 */
	public function to_column() {
		$array = $this->to_array();
		return wp_json_encode( $array );
	}

	/**
	 * データベースのカラムから作成する
	 *
	 * @param string $column データベースのカラム.
	 * @return self
	 */
	public static function from_column( string $column ) {
		$array = json_decode( $column, true );
		return new self( $array );
	}
}
