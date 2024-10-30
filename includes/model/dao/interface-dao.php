<?php
/**
 * DAOのインターフェース
 *
 * @package LClutch\API\Common
 */

namespace LClutch\Model\DAO;

use InvalidArgumentException;
use LClutch\Model\DTO\DTO_Row_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

interface DAO_Interface {

	/**
	 * 作成
	 *
	 * @param DTO_Row_Interface $dto DTO.
	 * @return DTO_Row_Interface $dto
	 */
	public function create( DTO_Row_Interface $dto ): DTO_Row_Interface;

	/**
	 * 取得
	 *
	 * @param int $id ID.
	 * @return DTO_Row_Interface|null $dto
	 */
	public function get( int $id ): ?DTO_Row_Interface;

	/**
	 * 複数取得
	 *
	 * @param array $args 引数.
	 * @return DTO_Row_Interface[] $dtos
	 */
	public function get_items( array $args = array() ): array;

	/**
	 * 件数取得
	 *
	 * @param array $params パラメータ.
	 * @return int
	 */
	public function get_count( array $params = array() ): int;

	/**
	 * 保存
	 *
	 * @param DTO_Row_Interface $dto DTO.
	 * @return DTO_Row_Interface $dto
	 * @throws InvalidArgumentException リクエストエラー.
	 */
	public function update( DTO_Row_Interface $dto ): DTO_Row_Interface;

	/**
	 * 削除
	 *
	 * @param DTO_Row_Interface $dto DTO.
	 * @return bool true:成功 false:失敗
	 */
	public function delete( DTO_Row_Interface $dto ): bool;

	/**
	 * 全件削除
	 *
	 * @return int 削除件数
	 */
	public function delete_all(): int;
}
