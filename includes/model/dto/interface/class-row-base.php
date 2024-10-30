<?php
/**
 * データベースへ保存できるDTOのベーストレイト
 *
 * @package LClutch\Model\DTO
 */

namespace LClutch\Model\DTO;

use LClutch\Model\Exception\Validation_Exception;
use LClutch\Utils\Validator;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * データベースへ保存できるDTOのベーストレイト
 */
abstract class Row_Base extends DTO_Base implements DTO_Row_Interface {

	const SCHEMA_FILE = 'row-base.json';

	/**
	 * IDのゲッター
	 *
	 * @return ?int ID.
	 */
	public function get_id() {
		return $this->get_container( 'id' );
	}

	/**
	 * ステータスのゲッター
	 */
	public function get_status() {
		return $this->get_container( 'status' );
	}

	/**
	 * 作成日時のゲッター
	 */
	public function get_created_at() {
		return $this->get_container( 'created_at' );
	}

	/**
	 * 更新日時のゲッター
	 */
	public function get_updated_at() {
		return $this->get_container( 'updated_at' );
	}

	/**
	 * プロパティを変更した新しいインスタンスを返す
	 *
	 * @param array $args 引数.
	 * @return self 新しいインスタンス.
	 * @throws Validation_Exception プロパティが不正な場合.
	 */
	public function with( array $args ) {
		if ( isset( $args['id'] ) && $this->get_id() !== null ) {
			throw new Validation_Exception(
				Validator::create_custom_error( self::SCHEMA_FILE, 'id', 'IDは変更できません。' )
			);
		}
		return parent::with( $args );
	}

	/**
	 * 連想配列に変換する
	 */
	public function to_row_base_array(): array {
		$array           = parent::to_array();
		$array['status'] = $this->get_status();
		return $array;
	}

	/**
	 * データベースの行に変換する
	 */
	public function to_row_base() {
		$row = $this->to_array();

		if ( array_key_exists( 'created_at', $row ) ) {
			unset( $row['created_at'] );
		}

		if ( array_key_exists( 'updated_at', $row ) ) {
			unset( $row['updated_at'] );
		}

		return $row;
	}

	/**
	 * データベースの行から変換する
	 *
	 * @param array $row データベースの行.
	 */
	public static function from_row( array $row ) {
		$row['id'] = (int) $row['id'];
		return new static( $row );
	}
}
