<?php
/**
 * Webhookイベント
 *
 * @package LClutch\Model\Entity\Webhook_Event
 */

namespace LClutch\Model\Entity\Webhook_Event;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Model\Entity\User;

/**
 * Webhookイベント
 */
class Webhook_Event {

	/**
	 * チャンネルの状態
	 *
	 * @var string
	 */
	public string $mode;

	/**
	 * イベントの発生時刻（ミリ秒）。再送されたWebhookの場合でも、再送された時刻ではなく、イベントの発生時刻を表します。
	 *
	 * @var int
	 */
	public int $timestamp;

	/**
	 * イベントの送信元
	 *
	 * @var array
	 */
	public $source;

	/**
	 * WebhookイベントID。Webhookイベントを一意に識別するためのID。ULID形式の文字列になります。
	 *
	 * @var string
	 */
	public string $id;

	/**
	 * Webhookイベントが再送されたものかどうか。
	 *
	 * @var bool
	 */
	public bool $is_redelivery;

	/**
	 * インスタンスを生成
	 *
	 * @param array $event_input イベント入力.
	 */
	public static function create( $event_input ) {
		switch ( $event_input['type'] ) {
			case 'follow':
				return new Follow_Event( $event_input );
			case 'unfollow':
				return new Unfollow_Event( $event_input );
		}
	}

	/**
	 * コンストラクタ
	 *
	 * @param array $event_input イベント入力.
	 */
	public function __construct( $event_input ) {
		$this->mode      = $event_input['mode'];
		$this->timestamp = $event_input['timestamp'];
		if ( isset( $event_input['source'] ) ) {
			$this->source = $event_input['source'];
		}
		$this->is_redelivery = $event_input['deliveryContext']['isRedelivery'];
	}

	/**
	 * 送信元のユーザーを取得
	 *
	 * @param bool $should_create ユーザーが存在しない場合に作成するかどうか.
	 */
	protected function get_source_user( $should_create = false ) {
		if ( ! $this->source['type'] === 'user' ) {
			return null;
		}

		return User::get_from_line_user_id( $this->source['userId'], $should_create );
	}
}
