<?php
/**
 * 制限エリアブロックのレンダリング
 *
 * @package LClutch\Controller
 */

use LClutch\Model\Entity\User;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

( function () use ( $attributes, $content ) {
	$is_display     = false; // 表示フラグ.
	$user_roles     = is_user_logged_in() ? wp_get_current_user()->roles : array( 'not_logged_in' );
	$readable_roles = array_diff( $attributes['readableRoles'], array( 'l-clutch_line-user' ) );

	// ユーザーロールで判定(LINEユーザー以外).
	foreach ( $user_roles as $role ) {
		if ( in_array( $role, $readable_roles, true ) ) {
			$is_display = true;
			break;
		}
	}

	// LINEユーザーの情報で判定.
	if (
	$is_display === false &&
	in_array( 'l-clutch_line-user', $attributes['readableRoles'], true )
	) {
		$user = User::get_current();
		if ( $user->is_line_user() ) {
			switch ( $attributes['readableLineUser']['addedFriend'] ) {
				case 'all':
					$is_display = true;
					break;
				case 'added':
					if ( $user->get_line_friend_flag() ) {
						$is_display = true;
					}
					break;
				case 'not_added':
					if ( ! $user->get_line_friend_flag() ) {
						$is_display = true;
					}
					break;
			}
		}
	}

	// 対象ユーザーに対して非表示にする場合は、反転する.
	if ( ! $attributes['readable'] ) {
		$is_display = ! $is_display;
	}

	if ( $is_display ) {
		echo wp_kses_post( $content );
	}
} )();
