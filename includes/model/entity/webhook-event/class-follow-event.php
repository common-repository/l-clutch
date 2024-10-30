<?php
/**
 * Webhookのフォローイベント
 *
 * @package LClutch\Model\Entity\Webhook_Event
 */

namespace LClutch\Model\Entity\Webhook_Event;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Webhookのフォローイベント
 */
class Follow_Event extends Webhook_Event {

	/** イベントタイプ */
	public const TYPE = 'follow';

	/**
	 * リプライトークン
	 *
	 * @var string
	 */
	public string $reply_token;

	/**
	 * コンストラクタ
	 *
	 * @param array $event_input イベント入力.
	 */
	public function __construct( $event_input ) {
		parent::__construct( $event_input );
		$this->reply_token = $event_input['replyToken'];
	}

	/**
	 * 処理を実行
	 */
	public function process() {
		$this->update_user();
	}

	/**
	 * ユーザーの情報を更新
	 */
	private function update_user() {
		$user = $this->get_source_user( true );
		if ( ! $user ) {
			return;
		}
		$user->set_line_friend_flag( true );
		if ( $user->get_line_is_blocked() ) {
			$user->set_line_is_blocked( false );
		}
	}
}
