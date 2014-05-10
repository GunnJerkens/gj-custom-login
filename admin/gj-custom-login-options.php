<?php
/*
* Options page for gj-custom-login.
*/

if ('gj-custom-login-options.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
  die();
}



$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'gj_custom_login_settings';

?>

<h2 class="nav-tab-wrapper">
  <a href="?page=gj_custom_login&tab=gj_custom_login_settings" class="nav-tab <?php echo $active_tab == 'gj_custom_login_settings' ? 'nav-tab-active' : ''; ?>">Settings</a>
</h2>

<div class="wrap"><?php

  if( $active_tab == 'gj_user_approve_settings' ) {
    if (file_exists(__DIR__. '/gj-custom-login-settings.php')) {
      include_once(__DIR__. '/gj-custom-login-settings.php');
    }
    else {
      echo 'Settings file is missing';
    }
  } ?>

</div>
