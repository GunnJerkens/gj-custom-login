<?php
/*
Plugin Name: GJ Custom Login
Plugin URI: https://github.com/GunnJerkens/gj-custom-login
Description: Allows customization and override of default WordPress login pages
Version: 0.1
Author: Gunn|Jerkens
Author URI: http://gunnjerkens.com
*/

require_once('gj-custom-login-functions.php');


class gj_custom_login {

  function __construct() {
   add_action('admin_menu', array(&$this,'gj_custom_login_admin_actions'));
  }

  function gj_custom_login_admin_actions() {
    add_options_page( 'GJ Custom Login', 'GJ Custom Login', 'administrator', 'gj_custom_login', array(&$this,'gj_custom_login_admin_options'));
  }

  function gj_custom_login_admin_options() {
    include ('admin/gj-custom-login-options.php');
  }


}

new gj_custom_login();