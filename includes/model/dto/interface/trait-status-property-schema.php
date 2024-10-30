<?php
/**
 * エンティティのステータスのスキーマを定義するトレイト
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * エンティティのステータスのスキーマを定義するトレイト
 */
trait Status_Schema_Trait {

	/**
	 * ステータスプロパティスキーマのキャッシュ
	 *
	 * @var ?array
	 */
	private static $status_schema = null;

	/**
	 * ステータスのスキーマの生成
	 */
	public static function get_status_schema(): array {
		if ( self::$status_schema === null ) {
			self::$status_schema = array(
				'title'       => 'status',
				'description' => 'ステータス',
				'type'        => 'string',
				'enum'        => array( 'draft', 'publish' ),
			);
		}
		return self::$status_schema;
	}
}
