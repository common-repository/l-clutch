<?php
/**
 * ユーザーのメタデータを管理するトレイト
 *
 * @package LClutch\Model\Entity\User
 */

namespace LClutch\Model\Entity\User;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Meta_Trait {

	/**
	 * メタキーと型
	 *
	 * @var array{string: string}
	 */
	private static $definitions = array();

	/**
	 * ユーザーのメタデータを登録
	 *
	 * @param string $key メタキー.
	 * @param array  $args     引数.
	 */
	protected static function register_meta( $key, $args = array() ) {
		self::$definitions[ $key ] = $args['type'];
		register_meta( 'user', $key, $args );
	}

	/**
	 * メタ
	 *
	 * @var mixed[]
	 */
	private $meta = array();

	/**
	 * メタのゲッター
	 *
	 * @param string $key キー.
	 * @throws \InvalidArgumentException 引数が不正な場合.
	 */
	public function get_meta( string $key ) {
		if ( ! array_key_exists( $key, self::$definitions ) ) {
			throw new \InvalidArgumentException( esc_html( 'Invalid meta key: ' . $key ) );
		}

		if ( array_key_exists( $key, $this->meta ) ) {
			return $this->meta[ $key ];
		} else {
			if ( ! metadata_exists( 'user', $this->ID, $key ) ) {
				return null;
			}

			$value = get_user_meta( $this->ID, $key, true );
			switch ( self::$definitions[ $key ] ) {
				case 'boolean':
					$value = (bool) $value;
					break;
				case 'integer':
					$value = (int) $value;
					break;
				case 'number':
					$value = (float) $value;
					break;
			}

			$this->meta[ $key ] = $value;
			return $value;
		}
	}

	/**
	 * メタのセッター
	 *
	 * @param string $key   キー.
	 * @param mixed  $value 値.
	 * @throws \InvalidArgumentException 引数が不正な場合.
	 */
	public function set_meta( string $key, $value ) {
		if ( ! array_key_exists( $key, self::$definitions ) ) {
			throw new \InvalidArgumentException( esc_html( 'Invalid meta key: ' . $key ) );
		}

		if ( array_key_exists( $key, $this->meta ) && $this->meta[ $key ] === $value ) {
			return;
		}
		$this->meta[ $key ] = $value;
		update_user_meta( $this->ID, $key, $value );
	}

	/**
	 * メタの削除
	 *
	 * @param string $key キー.
	 * @throws \InvalidArgumentException 引数が不正な場合.
	 */
	public function delete_meta( string $key ) {
		if ( ! array_key_exists( $key, self::$definitions ) ) {
			throw new \InvalidArgumentException( esc_html( 'Invalid meta key: ' . $key ) );
		}

		if ( array_key_exists( $key, $this->meta ) ) {
			unset( $this->meta[ $key ] );
		}
		delete_user_meta( $this->ID, $key );
	}
}
