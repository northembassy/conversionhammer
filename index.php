<?php

/**
 * Plugin Name: ConversionHammer
 * Plugin URI: http://conversionhammer.com/
 * Description: WordPress plugin of ConversionHammer
 * Version: 0.0.1
 * Stable tag: 0.0.1
 * Requires at least: 4.0
 * Tested up to: 4.7.2
 * Author: ConversionHammer
 * Author URI: http://conversionhammer.com
 * License: GPL
 * License URI: https://simplemediacode.com/license/gpl/
 */
if (!function_exists('add_filter')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}
if (!defined('CHAMMER_FILE')) {
    define('CHAMMER_FILE', __FILE__);
}
if (!defined('CHAMMER_PATH')) {
    define('CHAMMER_PATH', dirname(CHAMMER_FILE));
}
if (!defined('CHAMMER_URL')) {
    define('CHAMMER_URL', plugin_dir_url(CHAMMER_FILE));
}
if (!defined('CHAMMER_CSSU')) {
    define('CHAMMER_CSSU', CHAMMER_URL . '/assets/css');
}
if (!defined('CHAMMER_JSU')) {
    define('CHAMMER_JSU', CHAMMER_URL . '/assets/js');
}

// ConversionHammer WP plugin.
require_once( CHAMMER_PATH . '/conversionHammer.php' );
require_once( CHAMMER_PATH . '/admin/chAdmin.php');
require_once( CHAMMER_PATH . '/front/chFront.php');
