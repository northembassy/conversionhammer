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

        protected $config = array();
        protected $data;

        function __construct(
//                $config = array()
                )
        {
//            $this->config['cache_dir'] = CHAMMER_PATH;
//            if (is_array($config)) {
//                $this->config = $config + $this->config;
//            }
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


