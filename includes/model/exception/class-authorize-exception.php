<?php
/**
 * 認証例外
 *
 * @package LClutch\Model\Exception
 */

namespace LClutch\Model\Exception;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 認証例外
 */
class Authorize_Exception extends \Exception {

	const MESSAGING_CHANNEL = 1;
}
