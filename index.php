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
 
// ConversionHammer WP plugin.
require_once( dirname(__FILE__) . '/conversionHammer.php' );
