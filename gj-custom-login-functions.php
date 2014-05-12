<?php

// TODO
// Create admin panel to upload image
// Allow upload of custom CSS


add_action('login_enqueue_scripts', 'gjLoginLogo');
add_action('login_enqueue_scripts', 'gjLoginCSS');

function gjLoginLogo() {
  $gj_login_logo = "url('".get_option('gj_login_logo')."');";

  echo '
    <style type="text/css">
        body.login div#login h1 a {
            background-image: '.$gj_login_logo.'
            padding-bottom: 30px;
        }
    </style>
  ';

}


function gjLoginCSS() {

  $gj_login_css = get_option('gj_login_css');

  echo '
    <style type="text/css">
      '.$gj_login_css.'
    </style>
  ';

}