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

add_action('admin_menu', 'gj_admin_actions');

function gj_custom_login_admin_actions() {
  add_menu_page( "GJ Custom Login", "GJ Custom Login", 'administrator', "gj_custom_login", "gj_custom_login_admin_options" );
}

function gj_custom_login_admin_options() {
  include ('admin/gj-user-approve-options.php');
}