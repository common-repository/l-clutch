<?php
/**
 * スキーマオブジェクトの抽象クラス
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * DTOの抽象クラス
 */
abstract class Schema_Base implements Schema_Interface {

	/**
	 * JSONスキーマの生成
	 */
	abstract protected static function generate_schema(): array;
}
