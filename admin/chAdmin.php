<?php
if (!class_exists('chAdmin')) {

    class chAdmin
    {

        public $fileversa = '1.0.0';
        function __construct()
        {
            add_action('admin_enqueue_scripts', array($this, 'chAdmincp'), 10);
            add_action('admin_menu', array($this, 'chAdminmenu'));
        }

        public function chAdmincp()
        {
            if (is_admin()){
            wp_enqueue_style('wp-color-picker');
            wp_register_script('chcolorpicker', CHAMMER_JSU . '/chcolorpicker.js', array('wp-color-picker'), $this->fileversa, true);
            wp_enqueue_script('chcolorpicker');
            }
        }

        public function chAdminmenu()
        {
            //create new top-level menu
            add_menu_page(__('ConversionHammer', 'conversionhammer'), __('ConversionHammer', 'conversionhammer'), 'activate_plugins', 'conversionhammer', array($this, 'chAdminsettings'));
            register_setting('ch-settings', 'conversionhammer_phone');
            $chprefix = 'conversionhammer_';
            register_setting('ch-settings', $chprefix . 'contactbuttontext');
            register_setting('ch-settings', $chprefix . 'phone');
            register_setting('ch-settings', $chprefix . 'besttimecalltext');
            register_setting('ch-settings', $chprefix . 'orgivemailtext');
            register_setting('ch-settings', $chprefix . 'content_title');
            register_setting('ch-settings', $chprefix . 'content_title2');
            register_setting('ch-settings', $chprefix . 'welcometitle');
            register_setting('ch-settings', $chprefix . 'welcometext');
            register_setting('ch-settings', $chprefix . 'toemail');
            register_setting('ch-settings', $chprefix . 'bgcolor');
            register_setting('ch-settings', $chprefix . 'btnbg');
            register_setting('ch-settings', $chprefix . 'btntext');
            register_setting('ch-settings', $chprefix . 'btnbgh');
            register_setting('ch-settings', $chprefix . 'btntexth');
            register_setting('ch-settings', $chprefix . 'callmectatext');
            register_setting('ch-settings', $chprefix . 'choosecalltimetext');
            register_setting('ch-settings', $chprefix . 'sbmobilectatext1');
            register_setting('ch-settings', $chprefix . 'sbmobilectatext2');
            register_setting('ch-settings', $chprefix . 'sbmobilebg');
            register_setting('ch-settings', $chprefix . 'sbmobiletext'); 
   
        }

        public function chAdminsettings()
        {
            ?><div class="wrap">
              <h2><?php _e('Settings'); ?></h2>
              <form method="post" action="options.php">
                  <?php
                  settings_fields('ch-settings');
                  $chprefix = 'conversionhammer_';
                  $conversionhammer_contactbuttontext = get_option($chprefix . 'contactbuttontext', __('contact button', 'conversionhammer'));
                  $conversionhammer_phone = get_option($chprefix . 'phone', '+1');

                  $conversionhammer_besttimecalltext = get_option($chprefix . 'besttimecalltext', __('What’s the best time to call you?', 'conversionhammer'));
                  $conversionhammer_orgivemailtext = get_option($chprefix . 'orgivemailtext', __('or give us your e-mail', 'conversionhammer'));

                  $conversionhammer_content_title = get_option($chprefix . 'content_title');
                  $conversionhammer_content_title2 = get_option($chprefix . 'content_title2');
                  $conversionhammer_welcometitle = get_option($chprefix . 'welcometitle');
                  $conversionhammer_welcometext = get_option($chprefix . 'welcometext');
                  $conversionhammer_toemail = get_option($chprefix . 'toemail');
                  $conversionhammer_bgcolor = get_option($chprefix . 'bgcolor', '#006aff');

                  $conversionhammer_btnbg = get_option($chprefix . 'btnbg', '#ffffff');
                  $conversionhammer_btntext = get_option($chprefix . 'btntext', '#006aff');
                  $conversionhammer_btnbgh = get_option($chprefix . 'btnbgh', '#3388ff');
                  $conversionhammer_btntexth = get_option($chprefix . 'btntexth', '#ffffff');

                  $conversionhammer_callmectatext = get_option($chprefix . 'callmectatext', __('Call Me Now', 'conversionhammer'));
                  $conversionhammer_choosecalltimetext = get_option($chprefix . 'choosecalltimetext', __('Choose a time for the call', 'conversionhammer'));


                  $conversionhammer_sbmobilectatext1 = get_option($chprefix . 'sbmobilectatext1', __('Call now', 'conversionhammer'));
                  $conversionhammer_sbmobilectatext2 = get_option($chprefix . 'sbmobilectatext2', __('To consult with a specialist', 'conversionhammer'));
                  $conversionhammer_sbmobilebg = get_option($chprefix . 'sbmobilebg', '#006aff');
                  $conversionhammer_sbmobiletext = get_option($chprefix . 'sbmobiletext', '#ffffff');
                  ?> 
                <table class="form-table table">

                  <tr>
                    <th valign="top"><?php _e('Email address where to send emails', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_toemail" name="conversionhammer_toemail" value="<?php echo $conversionhammer_toemail; ?>"/>
                    </td> 
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('Contact button text', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_contactbuttontext" name="conversionhammer_contactbuttontext" value="<?php echo $conversionhammer_contactbuttontext; ?>"/>
                      <br /> (<?php _e('What’s the best time to call you?', 'conversionhammer'); ?>)
                    </td> 
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('Phone number', 'conversionhammer'); ?></th>
                    <td valign="top"><input type="text" id="conversionhammer_phone" name="conversionhammer_phone" value="<?php echo $conversionhammer_phone; ?>"/></td> 
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('Content title', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_content_title" name="conversionhammer_content_title" value="<?php echo $conversionhammer_content_title; ?>"/>
                    </td> 
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('Content title 2nd line', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_content_title2" name="conversionhammer_content_title2" value="<?php echo $conversionhammer_content_title2; ?>"/>
                    </td> 
                  </tr>

                  <tr>
                    <th valign="top"><?php _e('Welcome title', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_welcometitle" name="conversionhammer_welcometitle" value="<?php echo $conversionhammer_welcometitle; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('Welcome text', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_welcometext" name="conversionhammer_welcometext" value="<?php echo $conversionhammer_welcometext; ?>"/>
                    </td>
                  </tr> 
                  <tr>
                    <th valign="top"><?php _e('Call Me Now text', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_callmectatext" name="conversionhammer_callmectatext" value="<?php echo $conversionhammer_callmectatext; ?>"/>
                      <br />(<?php _e('Call Me Now', 'conversionhammer'); ?>)
                    </td>
                  </tr> 

                  <tr>
                    <th valign="top"><?php _e('Best time to call text', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_besttimecalltext" name="conversionhammer_besttimecalltext" value="<?php echo $conversionhammer_besttimecalltext; ?>"/>
                      <br />(<?php _e('What’s the best time to call you?', 'conversionhammer'); ?>)
                    </td> 
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('or give us your e-mail text', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_orgivemailtext" name="conversionhammer_orgivemailtext" value="<?php echo $conversionhammer_orgivemailtext; ?>"/>
                      <br />(<?php _e('or give us your e-mail', 'conversionhammer'); ?>)
                    </td> 
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('Choose a time for the calltext', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" id="conversionhammer_choosecalltimetext" name="conversionhammer_choosecalltimetext" value="<?php echo $conversionhammer_choosecalltimetext; ?>"/>
                      <br />(<?php _e('Choose a time for the call', 'conversionhammer'); ?>)
                    </td> 
                  </tr> 


                  <tr>
                    <th valign="top"><?php _e('Colors (sidebar)', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <input type="text" 
                             value="<?php echo $conversionhammer_bgcolor; ?>" 
                             id="conversionhammer_bgcolor" 
                             name="conversionhammer_bgcolor" 
                             data-default-color="#006aff" 
                             class="ch_colorpicker" />
                    </td>
                  </tr> 
                  <tr>
                    <th valign="top"><?php _e('Colors button', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <div style="float: left; width: 42%">
                        <h3><?php _e('Normal', 'conversionhammer'); ?></h3>
                        <p><?php _e('Button background', 'conversionhammer'); ?><br />
                          <input type="text" 
                                 value="<?php echo $conversionhammer_btnbg; ?>" 
                                 id="conversionhammer_btnbg" 
                                 name="conversionhammer_btnbg" 
                                 data-default-color="#ffffff" 
                                 class="ch_colorpicker" />
                        </p>
                        <p><?php _e('Button text', 'conversionhammer'); ?><br />
                          <input type="text" 
                                 value="<?php echo $conversionhammer_btntext; ?>"
                                 id="conversionhammer_btntext" 
                                 name="conversionhammer_btntext" 
                                 data-default-color="#006aff"
                                 class="ch_colorpicker" />
                        </p>
                      </div>
                      <div style="float: left; width: 42%">
                        <h3><?php _e('Hover', 'conversionhammer'); ?></h3>
                        <p><?php _e('Button background', 'conversionhammer'); ?><br />
                          <input type="text" 
                                 value="<?php echo $conversionhammer_btnbgh; ?>" 
                                 id="conversionhammer_btnbgh" 
                                 name="conversionhammer_btnbgh" 
                                 data-default-color="#3388ff" 
                                 class="ch_colorpicker" />
                        </p>
                        <p><?php _e('Button text', 'conversionhammer'); ?><br />
                          <input type="text" 
                                 value="<?php echo $conversionhammer_btntexth; ?>"
                                 id="conversionhammer_btntexth" 
                                 name="conversionhammer_btntexth" 
                                 data-default-color="#ffffff"
                                 class="ch_colorpicker" />
                        </p></div>


                    </td>
                  <tr>
                    <th valign="top"><?php _e('Mobile', 'conversionhammer'); ?></th>
                    <td valign="top">
                      <p><?php _e('CTA text', 'conversionhammer'); ?><br />
                        <input type="text" 
                               value="<?php echo $conversionhammer_sbmobilectatext1; ?>" 
                               id="conversionhammer_sbmobilectatext1" 
                               name="conversionhammer_sbmobilectatext1" /> (<?php _e('Call now', 'conversionhammer'); ?>)
                      </p>
                      <p><?php _e('CTA text 2nd line', 'conversionhammer'); ?><br />
                        <input type="text" 
                               value="<?php echo $conversionhammer_sbmobilectatext2; ?>" 
                               id="conversionhammer_sbmobilectatext2" 
                               name="conversionhammer_sbmobilectatext2" /> (<?php _e('To consult with a specialist', 'conversionhammer'); ?>)
                      </p>

                      <p><?php _e('Background', 'conversionhammer'); ?><br />
                        <input type="text" 
                               value="<?php echo $conversionhammer_sbmobilebg; ?>" 
                               id="conversionhammer_sbmobilebg" 
                               name="conversionhammer_sbmobilebg" 
                               data-default-color="#006aff" 
                               class="ch_colorpicker" />
                      </p>
                      <p><?php _e('Text', 'conversionhammer'); ?><br />
                        <input type="text" 
                               value="<?php echo $conversionhammer_sbmobiletext; ?>"
                               id="conversionhammer_sbmobiletext" 
                               name="conversionhammer_sbmobiletext" 
                               data-default-color="#ffffff"
                               class="ch_colorpicker" />
                      </p> 

                    </td>
                  </tr> 

                </table>
                <p class="submit">
                  <input type="submit" class="button-primary" value="<?php _e('Save Changes', 'conversionhammer') ?>" />
                </p>
              </form>

              <hr />

            </div><?php
        }

    }

}


try {

    /**
     * Do chAdmin
     * @since 0.0.1
     */
    new chAdmin();
} catch (Exception $e) {

    /**
     * Do Errors and debug
     * @since 0.0.1
     */
    $chadmin_debug = 'Caught exception: ConversionHammer chAdmin ' . $e->getMessage() . "\n";

    if (apply_filters('chadmin_debug_log', defined('WP_DEBUG_LOG') && WP_DEBUG_LOG)) {
        error_log(print_r(compact('chadmin_debug'), true));
    }
}
