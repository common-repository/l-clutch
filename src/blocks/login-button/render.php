<?php
/**
 * LINEログインボタン
 *
 * @package LClutch
 */

use LClutch\Model\Entity\Guest;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

( function () use ( $content ) {
	if ( is_user_logged_in() ) {
		return;
	}

	if ( ! session_id() ) {
		session_start();
	}

	$user = Guest::create_or_get_from_session();

	session_write_close();
	$url     = preg_match( '|href="([^"]+)"|', $content, $matches ) ? $matches[1] : '';
	$url     = $user->add_nonce_to_url( $url, 'l-clutch_url-action' );
	$content = preg_replace( '|href="([^"]+)"|', 'href="' . esc_url( $url ) . '"', $content );

	echo wp_kses_post( $content );
} )();
