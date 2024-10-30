<?php
/**
 * プロフィール画像ブロックのレンダリング
 *
 * @package LClutch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Model\Entity\User;

( function () use ( $content ) {
	$user    = User::get_current();
	$url     = get_avatar_url( $user );
	$content = str_replace( '%src%', $url, $content );

	echo wp_kses_post( $content );
} )();
