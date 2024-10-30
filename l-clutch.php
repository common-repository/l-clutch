<?php
/**
 * L-Clutch
 *
 * @package           LClutch
 * @author            onrise-web
 * @copyright         2023 onrise-web
 * @license           GPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:       L-Clutch
 * Plugin URI:        https://l-clutch.com/
 * Description:       WordPressとLINE公式アカウントの連携を行うプラグインです。
 * Version:           1.0.4
 * Requires at least: 6.2
 * Requires PHP:      7.4
 * Author:            onrise-web
 * License:           GPL-3.0
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       l-clutch
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';

new LClutch();
