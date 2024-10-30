<?php
/**
 * 友だち追加ボタン
 *
 * @package LClutch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use LClutch\Model\Entity\User;
use LClutch\Model\Line_Channel\Messaging_Channel;

( function () use ( $content ) {
	$user = User::get_current();

	if ( $user->get_line_friend_flag() === true ) {
		return;
	}

	$channel  = Messaging_Channel::get_instance();
	$basic_id = $channel->get_basic_id();

	if ( $basic_id ) {
		$content = str_replace( 'href="#addFriendUrl"', "href=\"https://line.me/R/ti/p/$basic_id\"", $content );
	} elseif ( current_user_can( 'manage_options' ) ) {
		$url = admin_url( 'admin.php?page=l-clutch&path=%2Fsetting' );

		$content  = str_replace( 'href="#addFriendUrl"', '', $content );
		$content .= "<p>LINEアカウントの基本IDが設定されていません。<br/><a href='$url' >設定画面</a>から設定を行ってください。</p>";
	} else {
		return;
	}

	echo wp_kses_post( $content );
} )();
