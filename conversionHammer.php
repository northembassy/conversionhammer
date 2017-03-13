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

        function __construct()
        {
            add_action('init', array($this, 'languages'), 10);

            add_action('wp_ajax_nopriv_conversionhammer_mail', array($this, 'conversionhammer_mail'));
            add_action('wp_ajax_conversionhammer_mail', array($this, 'conversionhammer_mail'));
        }

        public function languages()
        {
            load_plugin_textdomain('conversionhammer', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        }

        public function conversionhammer_mail()
        {
            $chprefix = 'conversionhammer_';
            $conversionhammer_toemail = get_option($chprefix . 'toemail');
            $customerphonenr = esc_attr($_POST['number']);
            $customerday = esc_attr($_POST['day']);
            $customertime = esc_attr($_POST['time']);
            $conversionhammer_emailsubject = get_option($chprefix . 'emailsubject', '[ConversionHammer]');

            $to = $conversionhammer_toemail;
            $subject = $conversionhammer_emailsubject." via ConversionHammer";
            $message = '';
            $message .= apply_filters('conversionhammer_emailintrotext', __('Hi, you’ve got a new sales lead!', 'conversionhammer')) . "\n";
            $message .=  apply_filters('conversionhammer_emailphonenr', __('Phone number', 'conversionhammer')) . ': ' .$customerphonenr . "\n";

            $message .= (isset($customerday) && !empty($customerday)) ? __('Day to call', 'conversionhammer') .': ' . $customerday . "\n" : '';
            $message .= (isset($customertime) && !empty($customertime)) ? __('Time to call', 'conversionhammer') .': ' . $customertime . "\n" : '';
            $message .= "\n" . __('With love, conversionhammer', 'conversionhammer')."\n" ;

            $returndata = '';
            if (wp_mail($to, $subject, $message)) {
                $returndata .= "ConversionHammer form email sent ";
            } else {
                $returndata .= "ConversionHammer form email not sent ";
            }
            echo $returndata;

            die(); // never forget to die() your AJAX reuqests
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


