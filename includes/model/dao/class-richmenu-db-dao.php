<?php
/**
 * リッチメニューDAO
 *
 * @package LClutch\API\Common
 */

namespace LClutch\Model\DAO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Model\DTO\RichMenu\RichMenu_DTO;
use LClutch\Model\Exception\DB_Exception;

/**
 * リッチメニューDAO
 */
class RichMenu_DB_DAO extends DB_DAO {

	use \LClutch\Utils\Singleton_Trait;

	/** エンティティ名(拡張先で定義する) */
	protected const ENTITY_NAME = 'rich_menu';

	/** DBバージョン */
	protected const DB_VERSION = 1.0;

	/**
	 * DTOクラス名
	 *
	 * @var string
	 */
	protected static $dto_class_name = RichMenu_DTO::class;

	/**
	 * コンストラクタ
	 */
	protected function __construct() {
		parent::__construct();
	}

	/**
	 * 作成
	 *
	 * @param RichMenu_DTO $dto DTO.
	 * @return RichMenu_DTO $dto
	 * @throws DB_Exception 作成失敗例外.
	 */
	public function create( $dto ): RichMenu_DTO {
		return parent::create( $dto );
	}

	/**
	 * 複数作成
	 *
	 * @param RichMenu_DTO[] $dtos DTO.
	 * @return RichMenu_DTO[] $dtos
	 */
	public function create_items( array $dtos ): array {
		return parent::create_items( $dtos );
	}

	/**
	 * 取得
	 *
	 * @param int $id ID.
	 * @return RichMenu_DTO|null $dto
	 */
	public function get( int $id ): ?RichMenu_DTO {
		return parent::get( $id );
	}

	/**
	 * 複数取得
	 *
	 * @param array{ limit?: int, offset?: int, [key: string]: mixed } $params パラメータ.
	 * @return RichMenu_DTO[]
	 */
	public function get_items( array $params = array() ): array {
		return parent::get_items( $params );
	}

	/**
	 * 保存
	 *
	 * @param RichMenu_DTO $dto DTO.
	 * @return RichMenu_DTO $dto
	 * @throws DB_Exception 更新失敗例外.
	 */
	public function update( $dto ): RichMenu_DTO {
		return parent::update( $dto );
	}

	/**
	 * 複数更新
	 *
	 * @param RichMenu_DTO[] $dtos DTO.
	 * @return bool true:成功 false:失敗
	 */
	public function update_items( array $dtos ): bool {
		return parent::update_items( $dtos );
	}

	/**
	 * 削除
	 *
	 * @param RichMenu_DTO $dto DTO.
	 * @return bool true:成功
	 * @throws DB_Exception 削除失敗例外.
	 */
	public function delete( $dto ): bool {
		return parent::delete( $dto );
	}

	/**
	 * ParamsをSQLのWHERE句に変換
	 *
	 * @param array { rich_menu_ids?: string[], except_ids?: int[], status?: bool } $params パラメータ.
	 * @return string WHERE句
	 */
	protected function sanitized_where_clause( array $params = array() ) {
		global $wpdb;
		$clauses = array();
		if ( isset( $params['rich_menu_ids'] ) ) {
			$clauses[] = $wpdb->prepare(
				'rich_menu_id IN (' .
				implode( ', ', array_fill( 0, count( $params['rich_menu_ids'] ), '%s' ) ) .
				')',
				$params['rich_menu_ids']
			);
		}
		if ( isset( $params['except_ids'] ) ) {
			$clauses[] = $wpdb->prepare(
				'id NOT IN (' .
				implode( ', ', array_fill( 0, count( $params['except_ids'] ), '%d' ) ) .
				')',
				$params['except_ids']
			);
		}
		if ( isset( $params['status'] ) ) {
			$clauses[] = $wpdb->prepare( 'status = %s', $params['status'] );
		}

		if ( count( $clauses ) > 0 ) {
			return ' WHERE ' . implode( ' AND ', $clauses );
		} else {
			return '';
		}
	}

	/**
	 * テーブルを作成
	 */
	protected static function get_create_table_sql() {
		global $wpdb;
		$table_name = self::get_table_name();
		return "CREATE TABLE {$table_name} (
      id int unsigned NOT NULL AUTO_INCREMENT,
      status varchar(255) NOT NULL DEFAULT 'draft',
      rich_menu_id varchar(255) DEFAULT NULL,
      rich_menu_alias_id varchar(255) DEFAULT NULL,
      selected tinyint(1) NOT NULL DEFAULT 0,
      name varchar(255) DEFAULT NULL,
      chat_bar_text varchar(255) DEFAULT NULL,
      areas longtext DEFAULT NULL,
      background varchar(255) DEFAULT NULL,
      uploaded_background_hash varchar(255) DEFAULT NULL,
      created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
      updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      INDEX rich_menu_id (rich_menu_id),
      PRIMARY KEY (id)
    ) {$wpdb->get_charset_collate()};";
	}
}
