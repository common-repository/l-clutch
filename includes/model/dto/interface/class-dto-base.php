<?php
/**
 * DTOの抽象クラス
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
 * DTOの抽象クラス
 */
abstract class DTO_Base implements DTO_Interface {

	const SCHEMA_FILE = '';

	/**
	 * プロパティコンテナ
	 *
	 * @var mixed[]
	 */
	private $container;

	/**
	 * コンテナのゲッター
	 *
	 * @param ?string $key キー.
	 */
	public function get_container( $key = null ) {
		if ( $key === null ) {
			$container = $this->container;
			return $container;
		} elseif ( array_key_exists( $key, $this->container ) ) {
			return $this->container[ $key ];
		} else {
			return null;
		}
	}

	/**
	 * コンストラクタ
	 *
	 * @param array $args パラメータ.
	 * @throws Validation_Exception プロパティが不正な場合.
	 */
	public function __construct( array $args = array() ) {
		$args = array_filter(
			$args,
			function ( $value ) {
				return $value !== null;
			}
		);

		$this->container = $args;
		$this->validate();
	}

	/**
	 * プロパティが有効かどうか
	 *
	 * @throws Validation_Exception プロパティが不正な場合.
	 */
	protected function validate() {
		$validate_result = Validator::validate( (object) $this->get_container(), static::SCHEMA_FILE );
		if ( ! $validate_result[0] ) {
			throw new Validation_Exception( $validate_result[1] );
		}
	}

	/**
	 * プロパティを変更した新しいインスタンスを返す
	 *
	 * @param array $args 引数.
	 * @return static
	 */
	public function with( array $args ) {
		$new_args = array_merge( $this->get_container(), $args );
		return new static( $new_args );
	}

	/**
	 * 連想配列に変換する
	 */
	public function to_array(): array {
		return $this->get_container();
	}

	/**
	 * プロパティが同じかどうか
	 *
	 * @param self $obj 比較対象のオブジェクト.
	 * @param bool $check_all すべてのプロパティを比較するかどうか.
	 */
	public function equals( self $obj, $check_all = false ): bool {
		if ( $check_all ) {
		  return $this->get_container() == $obj->get_container(); // phpcs:ignore
		} else {
		  return $this->to_array() == $obj->to_array(); // phpcs:ignore
		}
	}
}
