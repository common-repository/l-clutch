<?php
/**
 * DTOのインターフェース
 *
 * @package LClutch\API\Common
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

interface DTO_Interface {

	/**
	 * プロパティを変更した新しいインスタンスを返す
	 *
	 * @param array $args 引数.
	 * @return static
	 */
	public function with( array $args );

	/**
	 * 連想配列に変換
	 *
	 * @return array
	 */
	public function to_array();
}
