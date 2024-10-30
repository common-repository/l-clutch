<?php
/**
 * LINEログアウトボタン
 *
 * @package LClutch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

( function () use ( $content ) {
	if ( ! is_user_logged_in() ) {
		return;
	}

	$redirect_url = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_url( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : home_url();
	$logout_url   = wp_logout_url( $redirect_url );

	$content = str_replace( 'href="#logout"', "href=\"$logout_url\"", $content );

	$html                 = wp_kses_allowed_html( 'post' );
	$html['a']['onclick'] = true;
	echo wp_kses( $content, $html );
} )();
