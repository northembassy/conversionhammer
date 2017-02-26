<?php
if (!class_exists('chAdmin')) {

    class chAdmin
    {

        function __construct()
        {
            add_action('admin_menu', array($this, 'chAdminmenu'));
        }

        public function chAdminmenu()
        {
            //create new top-level menu
            add_menu_page(__('ConversionHammer', 'conversionhammer'), __('ConversionHammer', 'conversionhammer'), 'activate_plugins', 'conversionhammer', array($this, 'chAdminsettings'));
            register_setting('ch-settings', 'conversionhammer_phone');
        }

        public function chAdminsettings()
        {
            ?><div class="wrap">
              <h2><?php _e('Settings'); ?></h2>
              <form method="post" action="options.php">
                  <?php
                  settings_fields('ch-settings');
                  $conversionhammer_phone = get_option('conversionhammer_phone', '+1');
                  $conversionhammer_content_title = get_option('conversionhammer_content_title');
                  $conversionhammer_content_title2 = get_option('conversionhammer_content_title2');
                  $conversionhammer_welcometitle = get_option('conversionhammer_welcometitle');
                  $conversionhammer_welcometext = get_option('conversionhammer_welcometext');
                  ?>
                <table class="form-table table">
                  <tr>
                    <th valign="top"><?php _e('Phone number', 'conversionhammer'); ?></th>
                    <td valign="top"><input type="text" id="conversionhammer_phone" name="conversionhammer_phone" value="<?php echo $conversionhammer_phone; ?>"/></td> 
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('Content title', 'conversionhammer'); ?></th>
                    <td valign="top"><input type="text" id="conversionhammer_content_title" name="conversionhammer_content_title" value="<?php echo $conversionhammer_content_title; ?>"/></td> 
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('Content title 2nd line', 'conversionhammer'); ?></th>
                    <td valign="top"><input type="text" id="conversionhammer_content_title2" name="conversionhammer_content_title2" value="<?php echo $conversionhammer_content_title2; ?>"/></td> 
                  </tr>

                  <tr>
                    <th valign="top"><?php _e('Welcome title', 'conversionhammer'); ?></th>
                    <td valign="top"><input type="text" id="conversionhammer_welcometitle" name="conversionhammer_welcometitle" value="<?php echo $conversionhammer_welcometitle; ?>"/></td>
                  </tr>
                  <tr>
                    <th valign="top"><?php _e('Welcome text', 'conversionhammer'); ?></th>
                    <td valign="top"><input type="text" id="conversionhammer_welcometext" name="conversionhammer_welcometext" value="<?php echo $conversionhammer_welcometext; ?>"/></td>
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
    $chadmin_debug = 'Caught exception: chAdmin ' . $e->getMessage() . "\n";

    if (apply_filters('chadmin_debug_log', defined('WP_DEBUG_LOG') && WP_DEBUG_LOG)) {
        error_log(print_r(compact('chadmin_debug'), true));
    }
}
