<?php
/**
 * ユーザーのアバター変更トレイト
 *
 * @package LClutch\Model\Entity\User
 */

namespace LClutch\Model\Entity\User;

use LClutch\Model\Entity\User;
use WP_User;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Avatar_Trait {

	/**
	 * LINEのプロフィール画像をアバターとして取得
	 *
	 * @param string $avatar アバター.
	 * @param mixed  $id_or_email ユーザーID.
	 * @param array  $args アバターの引数.
	 */
	public static function get_line_picture_avatar( $avatar, $id_or_email, $args ) {
		$user = self::get_user_from_id_or_email( $id_or_email );
		if ( $user === false || ! $user->is_line_user() ) {
			return $avatar;
		}

		$src = $user->get_line_picture_url();
		if ( empty( $src ) ) {
			return $avatar;
		}
		$alt  = 'プロフィール画像';
		$size = $args['size'];
		return "<img alt='{$alt}' src='{$src}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
	}

	/**
	 * LINEのプロフィール画像をアバターデータとして取得
	 *
	 * @param array $args アバターの引数.
	 * @param mixed $id_or_email ユーザーID.
	 */
	public static function get_line_picture_avatar_data( $args, $id_or_email ) {
		$user = self::get_user_from_id_or_email( $id_or_email );
		if ( $user === false || ! $user->is_line_user() ) {
			return $args;
		}

		$url = $user->get_line_picture_url();
		if ( empty( $url ) ) {
			return $args;
		}
		$args['url'] = $url;
		return $args;
	}

	/**
	 * Id_or_emailからユーザーを取得
	 *
	 * @param mixed $id_or_email ユーザーID.
	 */
	private static function get_user_from_id_or_email( $id_or_email ) {
		$user = false;

		if ( is_numeric( $id_or_email ) ) {
			$user = new User( $id_or_email );
		} elseif ( is_string( $id_or_email ) && filter_var( $id_or_email, FILTER_VALIDATE_EMAIL ) ) {
			$user = new User( get_user_by( 'email', $id_or_email ) );
		} elseif ( is_object( $id_or_email ) && $id_or_email instanceof WP_User ) {
			$user = new User( $id_or_email );
		}

		return $user;
	}
}
