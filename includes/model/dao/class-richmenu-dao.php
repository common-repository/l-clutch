<?php
/**
 * リッチメニュー管理クラス
 *
 * @package LClutch\Model
 */

namespace LClutch\Model\DAO;

use InvalidArgumentException;
use LClutch\Model\DAO\DAO_Interface;
use LClutch\Model\Line_Channel\Messaging_Channel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Model\Entity\RichMenu;
use LClutch\Model\DAO\RichMenu_DB_DAO;
use LClutch\Model\DTO\RichMenu\RichMenu_DTO;
use LClutch\Model\Exception\Code;
use LClutch\Model\Line_Channel\Messaging_Channel\Channel_RichMenu_Manager;
use RuntimeException;

/**
 * リッチメニュー管理クラス
 */
class RichMenu_DAO implements DAO_Interface {

	use \LClutch\Utils\Singleton_Trait;

	/** オプションのキー */
	const OPTION_KEYS = array(
		'default_id' => 'l-clutch_rich-menu-default-id',
	);

	/**
	 * リッチメニュー DB DAO
	 *
	 * @var RichMenu_DB_DAO
	 */
	protected RichMenu_DB_DAO $db_dao;

	/**
	 * Messaging APIチャネル
	 *
	 * @var Messaging_Channel
	 */
	protected Messaging_Channel $channel;

	/**
	 * チャネルのリッチメニュー管理クラス
	 *
	 * @var Channel_RichMenu_Manager
	 */
	protected Channel_RichMenu_Manager $manager;

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		$this->db_dao  = RichMenu_DB_DAO::get_instance();
		$this->channel = Messaging_Channel::get_instance();
		$this->manager = Channel_RichMenu_Manager::get_instance();
	}

	/**
	 * アンインストール時の処理
	 */
	public static function uninstall() {
		delete_option( self::OPTION_KEYS['default_id'] );
	}

	/**
	 * リッチメニューを作成
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @return RichMenu_DTO
	 * @throws InvalidArgumentException リクエストエラー.
	 * @throws RuntimeException エラーが発生した場合.
	 */
	public function create( $dto ): RichMenu_DTO {
		$dto = $this->db_dao->create( $dto );

		if ( $dto->get_status() === 'draft' ) {
			return $dto;
		}

		try {
			$dto = $this->manager->upsert( $dto );
		} catch ( InvalidArgumentException | RuntimeException $e ) {
			$this->db_dao->delete( $dto );
			throw $e;
		}

		$dto = $this->db_dao->update( $dto ); // 更新後のデータを保存.

		return $dto;
	}

	/**
	 * リッチメニューを取得
	 *
	 * @param int $id ID.
	 * @return RichMenu_DTO
	 */
	public function get( int $id ): ?RichMenu_DTO {
		return $this->db_dao->get( $id );
	}

	/**
	 * リッチメニューを一覧取得
	 *
	 * @param array { limit?: int, offset?: int, status?: 'draft' | 'publish' } $params パラメータ.
	 * @return RichMenu[]
	 */
	public function get_items( array $params = array() ): array {
		return $this->db_dao->get_items( $params );
	}

	/**
	 * リッチメニューの数を取得
	 *
	 * @param array { draft?: bool } $params パラメータ.
	 * @return int
	 */
	public function get_count( array $params = array() ): int {
		return $this->db_dao->get_count( $params );
	}

	/**
	 * リッチメニューを更新
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @return RichMenu_DTO リッチメニューDTO.
	 * @throws InvalidArgumentException リクエストエラー.
	 * @throws RuntimeException エラーが発生した場合.
	 */
	public function update( $dto ): RichMenu_DTO {
		if ( $dto->get_status() === 'publish' ) {
			$changed = $this->manager->check_changed( $dto );

			if ( $changed ) {
				try {
					$dto = $this->manager->upsert( $dto );
				} catch ( InvalidArgumentException $e ) {
					throw $e;
				} catch ( RuntimeException $e ) {
					$dto = $dto->with( array( 'status' => 'draft' ) );
					$this->db_dao->update( $dto );
					throw $e;
				}

				if ( $dto->get_id() === $this->get_default_id() ) {
					$this->set_default( $dto );
				}
			}
		} elseif ( $dto->get_status() === 'draft' ) {
			$dto = $this->manager->delete( $dto );

			if ( $dto->get_id() === $this->get_default_id() ) {
				$this->delete_default_id();
			}
		}

		$dto = $this->db_dao->update( $dto );

		return $dto;
	}

	/**
	 * リッチメニューを削除
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 */
	public function delete( $dto ): bool {
		$dto = $this->manager->delete( $dto );
		return $this->db_dao->delete( $dto );
	}

	/**
	 * すべてのリッチメニューを削除
	 *
	 * @return int 削除した件数
	 */
	public function delete_all(): int {
		$dtos = $this->db_dao->get_items();
		foreach ( $dtos as $dto ) {
			$this->delete( $dto );
		}
		return count( $dtos );
	}

	/**
	 * デフォルトのリッチメニューidを取得
	 */
	public function get_default_id() {
		$id = get_option( self::OPTION_KEYS['default_id'], null );
		return $id ? (int) $id : null;
	}

	/**
	 * リッチメニューをデフォルトに設定
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @throws InvalidArgumentException リクエストエラー.
	 */
	public function set_default( $dto ) {
		if ( $dto->get_status() === 'draft' ) {
			throw new InvalidArgumentException( '下書きのリッチメニューはデフォルトに設定できません。', Code::INVALID_STATUS );
		}
		$this->channel->set_default_richmenu( $dto );
		update_option( self::OPTION_KEYS['default_id'], $dto->get_id(), false );
	}

	/**
	 * デフォルトのリッチメニューIDを削除
	 */
	public function delete_default_id() {
		delete_option( self::OPTION_KEYS['default_id'] );
	}
}
