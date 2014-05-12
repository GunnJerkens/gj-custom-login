<?php

add_action('login_enqueue_scripts', 'gjLoginLogo');
add_action('login_enqueue_scripts', 'gjLoginCSS');
add_filter( 'login_headerurl', 'gjLoginURL' );
add_filter( 'login_headertitle', 'gjLoginURLTitle' );
add_filter ("wp_mail_from", "gjLoginMailFrom");
add_filter ("wp_mail_from_name", "gjLoginMailFromName");

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

function gjLoginURL() {

  $gj_login_url_type = get_option('gj_login_url_type');
  $gj_login_url = get_option('gj_login_url');

  if ($gj_login_url_type === 'home') {
    $gj_login_url = home_url();
  } else if ($gj_login_url_type === 'default') {
    $gj_login_url = 'http://wordpress.org';
  }

  return $gj_login_url;

}

function gjLoginURLTitle() {

  $gj_login_url_type = get_option('gj_login_url_type');
  $gj_login_url_title = get_option('gj_login_url_title');

  if ($gj_login_url_type === 'default') {
    $gj_login_url_title = 'Powered by WordPress';
  }

  return $gj_login_url_title;

}

function gjLoginMailFrom() {

  $gj_login_mail_from = get_option('gj_login_mail_from');
  $gj_login_mail_from_type = get_option('gj_login_mail_from_type');

  if($gj_login_mail_from_type === 'default') {
    $gj_login_mail_from = "no-reply";
  }

  return $gj_login_mail_from;
}

function gjLoginMailFromName() {

  $gj_login_mail_from_type = get_option('gj_login_mail_from_type');
  $gj_login_mail_from_name = get_option('gj_login_mail_from_name');

  if($gj_login_mail_from_type === 'default') {
    $gj_login_mail_from_name = "WordPress";
  }

  return $gj_login_mail_from_name;

}
