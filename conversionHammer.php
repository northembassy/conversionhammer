<?php

/**
 * Exit if accessed directly (security)
 * @since 1.0.0
 */
if (!defined('ABSPATH'))
    exit;

/**
 * Double check. 
 * Are we in WordPress enabled site?
 * @since 1.0.0
 * @release 1.0.0
 */
if (!function_exists('add_action')) {
    echo "Hi! I'm nice WordPress plugin from ConversionHammer.com, but I am more useful if You are using WordPress.";
    exit;
}
/**
 * Main class conversionHammer
 * @since 0.0.1
 */
if (!class_exists('conversionHammer')) {

    class conversionHammer
    {

        public $filevers = '1.0.0';

        function __construct()
        {
            add_action('wp_enqueue_scripts', array($this, 'scripts'), 10);
        }

        public function scripts()
        {
            if (!is_admin()) {
 
                /**
                 * Styles
                 */
                wp_register_style('select2ch', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css', false, $this->filevers );
                wp_enqueue_style('select2ch');
                wp_register_style('conversionhammer', CHAMMER_CSSU . '/ch.css', array('select2ch'), $this->filevers);
                wp_enqueue_style('conversionhammer');

                /**
                 * Scripts
                 */
                wp_enqueue_script('jquery');
                wp_register_script('select2ch', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js', array('jquery'), $this->filevers, true);
                wp_enqueue_script('select2ch');
                wp_register_script('conversionhammer', CHAMMER_JSU . '/ch.js', array('select2ch'), $this->filevers, true);
                wp_enqueue_script('conversionhammer');
            }
        }

    }

}
try {

    /**
     * Do conversionHammer
     * @since 0.0.1
     */
    new conversionHammer();
} catch (Exception $e) {

    /**
     * Do Errors and debug
     * @since 0.0.1
     */
    $conversionhammer_debug = 'Caught exception: conversionHammer ' . $e->getMessage() . "\n";

    if (apply_filters('conversionhammer_debug_log', defined('WP_DEBUG_LOG') && WP_DEBUG_LOG)) {
        error_log(print_r(compact('conversionhammer_debug'), true));
    }
}


