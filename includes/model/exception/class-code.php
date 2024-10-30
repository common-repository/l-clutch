<?php
/**
 * エラーコード一覧
 *
 * @package LClutch\Model\Exception\Code
 */

namespace LClutch\Model\Exception;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * エラーコード一覧
 */
class Code {
	// 共通エラー.
	const UNKNOWN_ERROR  = 0;
	const NOT_FOUND      = 1;
	const INVALID_URL    = 2;
	const CONFLICT_ID    = 3;
	const INVALID_ID     = 4;
	const INVALID_STATUS = 5;

	// 型のエラー.
	const INVALID_CHANNEL_SETTING = 100;
	const INVALID_RICH_MENU       = 101;
	const INVALID_WEBHOOK_URL     = 102;
	const INVALID_ACCESS_TOKEN    = 103;
	const INVALID_USER_ID         = 104;
	const INVALID_IMAGE           = 105;

	// LINE APIエラー.
	const CHANNEL_ACCESS_TOKEN_API_ERROR = 200;
	const MESSAGING_API_ERROR            = 201;
	const MESSAGING_API_BLOB_ERROR       = 202;
	const LOGIN_API_ERROR                = 203;
}
