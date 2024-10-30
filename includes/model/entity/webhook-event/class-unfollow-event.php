<?php
/**
 * Webhookのフォロー解除イベント
 *
 * @package LClutch\Model\Entity\Webhook_Event
 */

namespace LClutch\Model\Entity\Webhook_Event;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Webhookのフォロー解除イベント
 */
class Unfollow_Event extends Webhook_Event {

	/** イベントタイプ */
	public const TYPE = 'unfollow';

	/**
	 * コンストラクタ
	 *
	 * @param array $event_input イベント入力.
	 * @throws No_User_Exception ユーザーが存在しない場合.
	 */
	public function __construct( $event_input ) {
		parent::__construct( $event_input );
	}

	/**
	 * 処理を実行
	 */
	public function process() {
		$this->update_user_friend_flag();
	}

	/**
	 * ユーザーの友達フラグを更新
	 */
	private function update_user_friend_flag() {
		$user = $this->get_source_user();
		if ( ! $user ) {
			return;
		}
		$user->set_line_is_blocked( true );
		if ( $user->get_line_friend_flag() ) {
			$user->set_line_friend_flag( false );
		}
	}
}
