<?php
/**
 * データベースの例外
 *
 * @package LClutch\Model\Exception
 */

namespace LClutch\Model\Exception;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Exception;

/**
 * データベースの例外
 */
class DB_Exception extends Exception {
}
