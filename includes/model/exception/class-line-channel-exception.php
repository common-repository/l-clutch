<?php
/**
 * LINEチャネルの例外
 *
 * @package LClutch\Model\Exception
 */

namespace LClutch\Model\Exception;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * LINEチャネルの例外
 */
class Line_Channel_Exception extends \Exception {

	const MESSAGING_CHANNEL = 1;
}
