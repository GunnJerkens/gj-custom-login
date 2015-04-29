<?php
/*
Plugin Name: GJ Custom Login
Plugin URI: https://github.com/GunnJerkens/gj-custom-login
Description: Allows customization and override of default WordPress login pages
Version: 0.1
Author: Gunn/Jerkens
Author URI: http://gunnjerkens.com
*/

require_once('gj-custom-login-functions.php');

class gj_custom_login {

  function __construct() {
    add_action('admin_menu', array(&$this,'gj_custom_login_admin_actions'));
    add_action('admin_enqueue_scripts', array(&$this,'gj_custom_login_scripts'));
    $this->gj_custom_login_disable_notifications();
  }

  function gj_custom_login_admin_actions() {
    add_options_page( 'GJ Custom Login', 'GJ Custom Login', 'administrator', 'gj_custom_login', array(&$this,'gj_custom_login_admin_options'));
  }

  function gj_custom_login_admin_options() {
    include ('admin/gj-custom-login-options.php');
  }

  function gj_custom_login_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'gj_custom_login') {
      wp_enqueue_media();
      wp_register_script('gj-custom-login-js', WP_PLUGIN_URL.'/gj-custom-login/js/gj-custom-login.js', array('jquery'));
      wp_enqueue_script('gj-custom-login-js');
    }
  }

  private function gj_custom_login_disable_notifications() {
    if(get_option('gj_login_disable_notifications')) {
      if (!function_exists('wp_password_change_notification')) {
        function wp_password_change_notification() {}
      }
    }
  }

}

new gj_custom_login();