<?php
/**
 * Messaging チャネルのリッチメニュー管理クラス
 *
 * @package LClutch\Model\Line_Channel
 */

namespace LClutch\Model\Line_Channel\Messaging_Channel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Exception;
use InvalidArgumentException;
use RuntimeException;
use LClutch\Model\Line_Channel\Messaging_Channel;
use LClutch\Model\DTO\RichMenu\RichMenu_DTO;
use LClutch\Model\Exception\Code;

/**
 * チャネルリッチメニュー管理クラス
 */
class Channel_RichMenu_Manager {

	use \LClutch\Utils\Singleton_Trait;

	/**
	 * Messaging APIチャネル
	 *
	 * @var Messaging_Channel
	 */
	public Messaging_Channel $channel;

	/**
	 * コンストラクタ
	 */
	public function __construct() {
		$this->channel = Messaging_Channel::get_instance();
	}

	/**
	 * チャネルにリッチメニューを保存
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @return RichMenu_DTO リッチメニューDTO.
	 * @throws InvalidArgumentException リクエストエラー.
	 * @throws RuntimeException リッチメニューの保存に失敗.
	 */
	public function upsert( RichMenu_DTO $dto ) {

		try {
			$this->channel->validate_richmenu( $dto );
		} catch ( InvalidArgumentException $e ) {
			throw $e;
		}

		try {
			$created = $this->channel->create_richmenu( $dto );

			if ( $created->get_background() !== null ) {
				$created = $this->channel->upload_richmenu_image( $created );
			}

			$created = $this->update_richmenu_alias( $created );

			if ( ! is_null( $dto->get_rich_menu_id() ) ) {
				$this->channel->delete_richmenu( $dto );
			}

			return $created;
		} catch ( Exception $e ) {
			if ( isset( $created ) ) {
				$created = $this->delete( $created );
			}

			throw new RuntimeException( 'チャンネルへのリッチメニューの保存に失敗しました。', Code::UNKNOWN_ERROR, $e );
		}
	}

	/**
	 * リッチメニューエイリアスの更新
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @return RichMenu_DTO リッチメニューDTO.
	 * @throws InvalidArgumentException リクエストエラー.
	 */
	private function update_richmenu_alias( RichMenu_DTO $dto ): RichMenu_DTO {
		if ( is_null( $dto->get_rich_menu_alias_id() ) ) {
			try {
				$dto = $this->channel->create_richmenu_alias( $dto );
			} catch ( InvalidArgumentException $e ) {
				if ( $e->getCode() !== Code::CONFLICT_ID ) {
					throw $e;
				}
				$dto = $this->channel->update_richmenu_alias( $dto );
			}
		} else {
			try {
				$dto = $this->channel->update_richmenu_alias( $dto );
			} catch ( InvalidArgumentException $e ) {
				if ( $e->getCode() !== Code::NOT_FOUND ) {
					throw $e;
				}
				$dto = $this->channel->create_richmenu_alias( $dto );
			}
		}
		return $dto;
	}

	/**
	 * チャンネルのリッチメニューから変化があるかチェック
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @return bool
	 */
	public function check_changed( RichMenu_DTO $dto ) {
		if ( is_null( $dto->get_rich_menu_id() ) ) {
			return true;
		}
		if ( $dto->has_changed_background() ) {
			return true;
		}

		$channel_rich_menu = $this->channel->get_richmenu( $dto->get_rich_menu_id() );

		if ( is_null( $channel_rich_menu ) ) {
			return true;
		}

		$result = $dto->has_changed( $channel_rich_menu );
		return $result;
	}

	/**
	 * リッチメニューを削除
	 *
	 * @param RichMenu_DTO $dto リッチメニューDTO.
	 * @return RichMenu_DTO リッチメニューDTO.
	 */
	public function delete( $dto ) {
		// チャンネルから削除.
		if ( ! is_null( $dto->get_rich_menu_alias_id() ) ) {
			$dto = $this->channel->delete_richmenu_alias( $dto );
		}
		if ( ! is_null( $dto->get_rich_menu_id() ) ) {
			$dto = $this->channel->delete_richmenu( $dto );
		}

		return $dto;
	}
}
