<?php
/**
 * Schemaクラスのインターフェース
 *
 * @package LClutch\API\Common
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

interface Schema_Interface {

	/**
	 * JSONスキーマを取得
	 */
	public static function get_schema();
}
