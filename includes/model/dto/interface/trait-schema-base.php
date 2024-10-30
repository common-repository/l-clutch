<?php
/**
 * DTOのスキーマトレイト
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Schema_Base_Trait {
	/**
	 * JSONスキーマのキャッシュ
	 *
	 * @var array
	 */
	protected static $schema;

	/**
	 * JSONスキーマの取得
	 *
	 * @return array
	 */
	public static function get_schema() {
		if ( ! isset( static::$schema ) ) {
			self::$schema = self::generate_schema();
		}
		return self::$schema;
	}

	/**
	 * JSONスキーマの生成
	 *
	 * @throws \Exception 未実装の場合.
	 */
	protected static function generate_schema(): array {
		throw new \Exception( 'generate_schema() is not implemented.' );
	}
}
