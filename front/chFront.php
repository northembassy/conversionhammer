<?php
if (!class_exists('chFront')) {

    class chFront
    {

        function __construct()
        {
            add_filter('wp_head', array($this, 'chGenerator'), 10); // location general @since 1.5.1
            add_action('wp_footer', array($this, 'chOutput'), 4);
        }

        public function chStrings($position = 'top')
        {
            switch ($position) {
                case 'top':
                    $positioncontent = '<!-- ConversionHammer -->';
                    break;

                default:
                    $positioncontent = '<!-- // ConversionHammer -->';
                    break;
            }
            return $positioncontent;
        }

        public static function chGenerator()
        {
            $chprefix = 'conversionhammer_';
            $conversionhammer_bgcolor = get_option($chprefix . 'bgcolor', '#006aff');
            $conversionhammer_btnbg = get_option($chprefix . 'btnbg', '#ffffff');
            $conversionhammer_btntext = get_option($chprefix . 'btntext', '#006aff');
            $conversionhammer_btnbgh = get_option($chprefix . 'btnbgh', '#3388ff');
            $conversionhammer_btntexth = get_option($chprefix . 'btntexth', '#ffffff');
            $conversionhammer_sbmobilebg = get_option($chprefix . 'sbmobilebg', '#006aff');
            $conversionhammer_sbmobiletext = get_option($chprefix . 'sbmobiletext', '#ffffff');

            echo "\n" . '<meta name="generator" content="ConversionHammer" />' . "\n";
            $chbgcolor = '';
            $chbgcolor .='<style type="text/css">';
            $chbgcolor .='#igsidebar{ background: ' . $conversionhammer_bgcolor . ';} ';
            $chbgcolor .='#igsidebar_content_sub_callme button{ background: ' . $conversionhammer_btnbg . '; color:' . $conversionhammer_btntext . ';} ';
            $chbgcolor .='#igsidebar_content_sub_callme button:hover, #igsidebar_content_sub_callme button:focus{color: ' . $conversionhammer_btntexth . ';background:' . $conversionhammer_btnbgh . ';}';

            $chbgcolor .='#call_igsidebar_mobile a{ background:' . $conversionhammer_sbmobilebg . ';} ';
            $chbgcolor .='#call_igsidebar_mobile h1{ color: ' . $conversionhammer_sbmobiletext . ';} ';

            $chbgcolor .='</style>' . "\n";
            echo $chbgcolor;
        }

        public function chOutput()
        {
            $chprefix = 'conversionhammer_';
            $conversionhammer_contactbuttontext = get_option($chprefix . 'contactbuttontext');
            $conversionhammer_phone = get_option($chprefix . 'phone');
            $conversionhammer_content_title = get_option($chprefix . 'content_title');
            $conversionhammer_content_title2 = get_option($chprefix . 'content_title2');
            $conversionhammer_welcometitle = get_option($chprefix . 'welcometitle');
            $conversionhammer_welcometext = get_option($chprefix . 'welcometext');
            $conversionhammer_sbmobilectatext1 = get_option($chprefix . 'sbmobilectatext1');
            $conversionhammer_sbmobilectatext2 = get_option($chprefix . 'sbmobilectatext2');
            $conversionhammer_besttimecalltext = get_option($chprefix . 'besttimecalltext');
            $conversionhammer_orgivemailtext = get_option($chprefix . 'orgivemailtext');
            $conversionhammer_callmectatext = get_option($chprefix . 'callmectatext', __('Call Me Now', 'conversionhammer'));
            $conversionhammer_choosecalltimetext = get_option($chprefix . 'choosecalltimetext');
            ?>

            <div id="call_igsidebar">
              <a href="javascript:;" title="<?php _e('Open contact panel', 'conversionhammer'); ?>"><?php echo $conversionhammer_contactbuttontext; ?></a>
            </div>
            <div id="call_igsidebar_mobile">
              <a href="tel:<?php echo $conversionhammer_phone; ?>" title="<?php esc_attr_e('Open contact panel', 'conversionhammer'); ?>">
                <h1><?php
                    echo $conversionhammer_sbmobilectatext1;
                    echo isset($conversionhammer_sbmobilectatext2) ? '<small>' . $conversionhammer_sbmobilectatext2 . '</small>' : '';
                    ?></h1>
              </a>
            </div>
            <div id="igsidebar">
              <div id="igsidebar_content">
                <div id="igsidebar_content_close">
                  <a class="icon-cancel" href="javascript:;" title="<?php esc_attr_e('Close Call Me Now sidebar', 'conversionhammer'); ?>"></a>
                </div>
                <div id="igsidebar_content_title">
                  <h3><?php
                      echo $conversionhammer_content_title;
                      echo isset($conversionhammer_content_title2) ? '<small>' . $conversionhammer_content_title2 . '</small>' : '';
                      ?></h3>
                </div>
                <div id="igsidebar_content_thanks">
                  <h1><?php _e('Thank you', 'conversionhammer'); ?></h1>
                </div>
                <div id="igsidebar_content_welcome">
                  <h1><?php echo $conversionhammer_welcometitle; ?></h1>
                  <?php echo isset($conversionhammer_welcometext) ? '<p>' . $conversionhammer_welcometext . '</p>' : ''; ?>
                </div>
                <form id="igsidebar_content_sub">
                  <div id="igsidebar_content_sub_schedule">
                    <h1><?php echo $conversionhammer_besttimecalltext; ?></h1>
                    <div id="igsidebar_content_sub_schedule_block">
                      <div id="igsidebar_content_sub_schedule_block_day">
                        <select name="block_day" id="block_day">
                          <option value="<?php esc_attr_e('today', 'conversionhammer'); ?>"><?php _e('today', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('tomorrow', 'conversionhammer'); ?>"><?php _e('tomorrow', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('Monday', 'conversionhammer'); ?>"><?php _e('Monday', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('Tuesday', 'conversionhammer'); ?>"><?php _e('Tuesday', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('Wednesday', 'conversionhammer'); ?>"><?php _e('Wednesday', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('Thursday', 'conversionhammer'); ?>"><?php _e('Thursday', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('Friday', 'conversionhammer'); ?>"><?php _e('Friday', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('Saturday', 'conversionhammer'); ?>"><?php _e('Saturday', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('Sunday', 'conversionhammer'); ?>"><?php _e('Sunday', 'conversionhammer'); ?></option>
                        </select>
                      </div>
                      <p>at</p>
                      <div id="igsidebar_content_sub_schedule_block_time">
                        <select name="block_time" id="block_time">
                          <option value="<?php esc_attr_e('1 AM', 'conversionhammer'); ?>"><?php _e('1 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('2 AM', 'conversionhammer'); ?>"><?php _e('2 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('3 AM', 'conversionhammer'); ?>"><?php _e('3 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('4 AM', 'conversionhammer'); ?>"><?php _e('4 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('5 AM', 'conversionhammer'); ?>"><?php _e('5 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('6 AM', 'conversionhammer'); ?>"><?php _e('6 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('7 AM', 'conversionhammer'); ?>"><?php _e('7 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('8 AM', 'conversionhammer'); ?>"><?php _e('8 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('9 AM', 'conversionhammer'); ?>"><?php _e('9 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('10 AM', 'conversionhammer'); ?>"><?php _e('10 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('11 AM', 'conversionhammer'); ?>"><?php _e('11 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('12 AM', 'conversionhammer'); ?>"><?php _e('12 AM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('1 PM', 'conversionhammer'); ?>"><?php _e('1 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('2 PM', 'conversionhammer'); ?>"><?php _e('2 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('3 PM', 'conversionhammer'); ?>"><?php _e('3 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('4 PM', 'conversionhammer'); ?>"><?php _e('4 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('5 PM', 'conversionhammer'); ?>"><?php _e('5 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('6 PM', 'conversionhammer'); ?>"><?php _e('6 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('7 PM', 'conversionhammer'); ?>"><?php _e('7 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('8 PM', 'conversionhammer'); ?>"><?php _e('8 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('9 PM', 'conversionhammer'); ?>"><?php _e('9 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('10 PM', 'conversionhammer'); ?>"><?php _e('10 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('11 PM', 'conversionhammer'); ?>"><?php _e('11 PM', 'conversionhammer'); ?></option>
                          <option value="<?php esc_attr_e('12 PM', 'conversionhammer'); ?>"><?php _e('12 PM', 'conversionhammer'); ?></option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div id="igsidebar_content_sub_mail">
                    <span>
                      <label for="igsidebar_content_sub_mail_email"><?php echo $conversionhammer_orgivemailtext; ?></label>
                      <input id="igsidebar_content_sub_mail_email" type="email" value="">
                    </span>
                  </div>
                  <div id="igsidebar_content_sub_callme">
                    <input type="tel" value="+1">
                    <button type="submit"><?php echo $conversionhammer_callmectatext; ?></button>
                    <a href="#igsidebar_content_welcome" title="<?php echo esc_attr($conversionhammer_choosecalltimetext); ?>"><?php
                        echo $conversionhammer_choosecalltimetext;
                        ?></a>
                  </div>
                </form>
              </div>
            </div>

            <?php
        }

    }

}


try {

    /**
     * Do chFront
     * @since 0.0.1
     */
    new chFront();
} catch (Exception $e) {

    /**
     * Do Errors and debug
     * @since 0.0.1
     */
    $chfront_debug = 'Caught exception: chFront ' . $e->getMessage() . "\n";

    if (apply_filters('chfront_debug_log', defined('WP_DEBUG_LOG') && WP_DEBUG_LOG)) {
        error_log(print_r(compact('chfront_debug'), true));
    }
}
