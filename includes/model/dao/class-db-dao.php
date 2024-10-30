<?php
/**
 * DAOの抽象クラス
 *
 * @package LClutch\API\Common
 */

namespace LClutch\Model\DAO;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch;
use LClutch\Model\DTO\DTO_Row_Interface;
use LClutch\Model\Exception\DB_Exception;

/**
 * DAOの抽象クラス
 */
abstract class DB_DAO implements DAO_Interface {

	/** エンティティ名(拡張先で定義する) */
	protected const ENTITY_NAME = '';

	/** DBバージョン(拡張先で定義する) */
	protected const DB_VERSION = 0.0;

	/**
	 * DTOクラス名(拡張先で定義する)
	 *
	 * @var DTO_Row_Interface
	 */
	protected static $dto_class_name;

	/**
	 * テーブル名
	 *
	 * @var string
	 */
	public $table_name;

	/**
	 * コンストラクタ
	 */
	protected function __construct() {
		$this->table_name = self::get_table_name();
	}

	/**
	 * テーブル名の取得
	 */
	public static function get_table_name(): string {
		global $wpdb;
		return $wpdb->prefix . LClutch::DB_PREFIX . static::ENTITY_NAME;
	}

	/**
	 * 作成
	 *
	 * @param DTO_Row_Interface $dto DTO.
	 * @return DTO_Row_Interface $dto
	 * @throws DB_Exception 作成失敗例外.
	 */
	public function create( DTO_Row_Interface $dto ): DTO_Row_Interface {
		global $wpdb;
		$row    = $dto->to_row();
		$result = $wpdb->insert( $this->table_name, $row );

		if ( $result === false ) {
			throw new DB_Exception( '作成に失敗しました。' );
		}

		// idの更新.
		return $dto->with( array( 'id' => $wpdb->insert_id ) );
	}

	/**
	 * 複数作成
	 *
	 * @param DTO_Row_Interface[] $dtos DTO.
	 * @return DTO_Row_Interface[] $dtos
	 */
	public function create_items( array $dtos ): array {
		// OPTIMIZE: 一括で作成するようにしたい.
		$new_dtos = array();
		foreach ( $dtos as $dto ) {
			$new_dtos[] = $this->create( $dto );
		}
		return $new_dtos;
	}

	/**
	 * 取得
	 *
	 * @param int $id ID.
	 * @return DTO_Row_Interface|null $dto
	 */
	public function get( int $id ): ?DTO_Row_Interface {
		global $wpdb;
		$row = wp_cache_get( $id, $this->table_name );

		if ( $row === false ) {
			$row = $wpdb->get_row(
				$wpdb->prepare( 'SELECT * FROM %i WHERE id = %d', $this->table_name, $id ),
				ARRAY_A
			);

			if ( $row === null ) {
				return null;
			}

			wp_cache_set( $id, $row, $this->table_name );
		}

		$dto = static::$dto_class_name::from_row( $row );

		return $dto;
	}

	/**
	 * 複数取得
	 *
	 * @param array{ limit?: int, offset?: int, [key: string]: mixed } $params パラメータ.
	 * @return DTO_Row_Interface[]
	 */
	public function get_items( array $params = array() ): array {
		global $wpdb;

		$dtos = wp_cache_get( 'items_' . $this->create_cache_key( $params ), $this->table_name );

		if ( $dtos !== false ) {
			return $dtos;
		}

		$sanitized_where_clause        = $this->sanitized_where_clause( $params );
		$sanitized_limit_offset_clause = $this->sanitized_limit_offset_clause( $params );

		// OPTIMIZE: 一括で取得するようにしたい.
		$rows = $wpdb->get_results(
			$wpdb->prepare(
				'SELECT * 
				FROM %i' .
				$sanitized_where_clause . // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				' ORDER BY id DESC' .
				$sanitized_limit_offset_clause, // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				$this->table_name,
			),
			ARRAY_A
		);

		if ( $rows === null ) {
			return null;
		}

		$dtos = array();
		foreach ( $rows as $row ) {
			$dtos[] = static::$dto_class_name::from_row( $row );
		}

		wp_cache_set( 'items_' . $this->create_cache_key( $params ), $dtos, $this->table_name );

		return $dtos;
	}

	/**
	 * 件数取得
	 *
	 * @param array $params パラメータ.
	 * @return int
	 */
	public function get_count( array $params = array() ): int {
		global $wpdb;

		$count = wp_cache_get( 'count_' . $this->create_cache_key( $params ), $this->table_name );

		if ( $count !== false ) {
			return $count;
		}

		$sanitized_where_clause = $this->sanitized_where_clause( $params );

		$count = $wpdb->get_var(
			$wpdb->prepare(
				'SELECT COUNT(*)
				FROM %i' .
				$sanitized_where_clause, // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
				$this->table_name
			)
		);

		wp_cache_set( 'count_' . $this->create_cache_key( $params ), $count, $this->table_name );

		return $count;
	}

	/**
	 * 保存
	 *
	 * @param DTO_Row_Interface $dto DTO.
	 * @return DTO_Row_Interface $dto
	 * @throws DB_Exception 更新失敗例外.
	 */
	public function update( DTO_Row_Interface $dto ): DTO_Row_Interface {
		global $wpdb;
		$row    = $dto->to_row();
		$result = $wpdb->replace( $this->table_name, $row ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching

		if ( $result === false ) {
			throw new DB_Exception( '更新に失敗しました。' );
		}

		return $dto;
	}

	/**
	 * 複数更新
	 *
	 * @param DTO_Row_Interface[] $dtos DTO.
	 * @return bool true:成功 false:失敗
	 */
	public function update_items( array $dtos ): bool {
		$results = array();
		// OPTIMIZE: 一括で更新するようにしたい.
		foreach ( $dtos as $dto ) {
			$resuluts[] = $this->update( $dto );
		}
		return ! in_array( false, $results, true );
	}


	/**
	 * 削除
	 *
	 * @param DTO_Row_Interface $dto DTO.
	 * @return bool true:成功
	 * @throws DB_Exception 削除失敗例外.
	 */
	public function delete( DTO_Row_Interface $dto ): bool {
		global $wpdb;
		$result = $wpdb->delete( $this->table_name, array( 'id' => $dto->get_id() ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching

		if ( $result === false ) {
			throw new DB_Exception( '削除に失敗しました。' );
		}

		return true;
	}

	/**
	 * 全件削除
	 *
	 * @return int 削除件数
	 * @throws DB_Exception 削除失敗例外.
	 */
	public function delete_all(): int {
		global $wpdb;

		$result = $wpdb->query(
			$wpdb->prepare( 'TRUNCATE TABLE %i', $this->table_name )
		);

		if ( $result === false ) {
			throw new DB_Exception( '全件削除に失敗しました。' );
		}

		return $result;
	}

	/**
	 * SQLのWHERE句を作成
	 *
	 * @param array { [key: string]: mixed } $params パラメータ.
	 * @return string WHERE句
	 */
	abstract protected function sanitized_where_clause( array $params );

	/**
	 * SQLのLIMIT句, OFFSET句を作成
	 *
	 * @param array { limit?: int, offset?: int, [key: string]: mixed } $params パラメータ.
	 * @return string LIMIT句, OFFSET句
	 */
	protected function sanitized_limit_offset_clause( array $params ) {
		global $wpdb;

		if ( isset( $params['limit'] ) && isset( $params['offset'] ) ) {
			return $wpdb->prepare( ' LIMIT %d OFFSET %d', $params['limit'], $params['offset'] );
		} elseif ( isset( $params['limit'] ) ) {
			return $wpdb->prepare( ' LIMIT %d', $params['limit'] );
		} elseif ( isset( $params['offset'] ) ) {
			return $wpdb->prepare( ' OFFSET %d', $params['offset'] );
		} else {
			return '';
		}
	}

	/**
	 * キャッシュのキーを作成
	 *
	 * @param array $params パラメータ.
	 */
	protected function create_cache_key( array $params ) {
		ksort( $params );
		$cache_key = wp_json_encode( $params );
		return $cache_key;
	}

	/**
	 * テーブルを作成
	 */
	abstract protected static function get_create_table_sql();

	/**
	 * アクティベート時の処理
	 */
	public static function activate() {
		$sql = static::get_create_table_sql();
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );

		// バージョンを保存.
		add_option( LClutch::DB_PREFIX . static::ENTITY_NAME . '_db_version', static::DB_VERSION );
	}

	/**
	 * アンインストール時の処理
	 *
	 * @throws DB_Exception 削除失敗例外.
	 */
	public static function uninstall() {
		global $wpdb;

		$table_name = self::get_table_name();
		$result     = $wpdb->query( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.NoCaching
			$wpdb->prepare( 'DROP TABLE IF EXISTS %i', $table_name ) // phpcs:ignore WordPress.DB.DirectDatabaseQuery.SchemaChange
		);

		if ( $result === false ) {
			throw new DB_Exception( 'テーブルの削除に失敗しました。' );
		}

		// バージョンを削除.
		delete_option( LClutch::DB_PREFIX . static::ENTITY_NAME . '_db_version' );
	}
}
