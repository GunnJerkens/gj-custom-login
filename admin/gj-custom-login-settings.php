<?php


if(isset($_POST['gj_hidden']) && $_POST['gj_hidden'] == 'gj_form_update_options') {

  $gj_login_logo = $_POST['gj_login_logo'];
  update_option('gj_login_logo', $gj_login_logo); 

  $gj_login_css = $_POST['gj_login_css'];
  update_option('gj_login_css', $gj_login_css);
  $gj_login_css_str = stripslashes($gj_login_css); ?>

  <div class="updated"><p><strong>Options saved.</strong></p></div><?php

} else {

  $gj_login_logo = get_option('gj_login_logo');
  $gj_login_css = get_option('gj_login_css');
  $gj_login_css_str = stripslashes($gj_login_css);

} ?>

  <style>
    input.btn {
      width: auto;
      margin-top: 15px;
    }
    input, textarea {
      width: 100%;
    }
    textarea {
      min-height: 250px;
    }
  </style>

  <form name="gj_form_update_options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <input type="hidden" name="gj_hidden" value="gj_form_update_options">
    <table class="form-table">
      <tr>
        <th><label for="gj_login_logo">Logo</label></th>
        <td><input id="upload_image" type="text" size="36" name="gj_login_logo" value="<?php echo $gj_login_logo ? $gj_login_logo : 'http://'; ?>" /></td>
        <td><input id="upload_image_button" class="button" type="button" value="Upload Image" /></td>
      </tr>
      <tr>
        <th><label for="gj_login_css">CSS</label></th>
        <td><textarea type="textarea" name="gj_login_css"><?php echo $gj_login_css_str; ?></textarea></td>
      </tr>
    </table>

    <input class="btn button" type="submit" name="Submit" value="Update Settings" />

  </form>
