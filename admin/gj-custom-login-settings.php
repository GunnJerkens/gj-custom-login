<?php

if(isset($_POST['gj_hidden']) && $_POST['gj_hidden'] == 'gj_form_update_options') {

  $gj_login_logo = $_POST['gj_login_logo'];
  update_option('gj_login_logo', $gj_login_logo);

  $gj_login_css = $_POST['gj_login_css'];
  update_option('gj_login_css', $gj_login_css);
  $gj_login_css_str = stripslashes($gj_login_css);

  $gj_login_url = $_POST['gj_login_url'];
  update_option('gj_login_url', $gj_login_url);

  $gj_login_url_type = $_POST['gj_login_url_type'];
  update_option('gj_login_url_type', $gj_login_url_type);

  $gj_login_url_title = $_POST['gj_login_url_title'];
  update_option('gj_login_url_title', $gj_login_url_title);

  $gj_login_mail_from = $_POST['gj_login_mail_from'];
  update_option('gj_login_mail_from', $gj_login_mail_from);

  $gj_login_mail_from_type = $_POST['gj_login_mail_from_type'];
  update_option('gj_login_mail_from_type', $gj_login_mail_from_type);

  $gj_login_mail_from_name = $_POST['gj_login_mail_from_name'];
  update_option('gj_login_mail_from_name', $gj_login_mail_from_name);

  $gj_login_disable_notifications = isset($_POST['gj_login_disable_notifications']) ? true : false;
  update_option('gj_login_disable_notifications', $gj_login_disable_notifications); ?>

  <div class="updated"><p><strong>Options saved.</strong></p></div><?php

} else {

  $gj_login_logo                  = get_option('gj_login_logo');
  $gj_login_css                   = get_option('gj_login_css');
  $gj_login_css_str               = stripslashes($gj_login_css);
  $gj_login_url                   = get_option('gj_login_url');
  $gj_login_url_type              = get_option('gj_login_url_type');
  $gj_login_url_title             = get_option('gj_login_url_title');
  $gj_login_mail_from             = get_option('gj_login_mail_from');
  $gj_login_mail_from_type        = get_option('gj_login_mail_from_type');
  $gj_login_mail_from_name        = get_option('gj_login_mail_from_name');
  $gj_login_disable_notifications = get_option('gj_login_disable_notifications');

} ?>

  <style>
    input.btn {
      width: auto;
      margin-top: 15px;
    }
    input, textarea, select {
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
        <th><label for="gj_login_url">URL</label></th>
        <td><input id="gj_login_url" type="text" name="gj_login_url" value="<?php echo $gj_login_url ? $gj_login_url : 'https://wordpress.org'; ?>" /></td>
        <td>
          <select id="gj_login_url_type" name="gj_login_url_type">
            <option value="default" <?php echo $gj_login_url_type === 'default' ? 'selected="selected"' : ''; ?>>WordPress Default</option>
            <option value="home" <?php echo $gj_login_url_type === 'home' ? 'selected="selected"' : ''; ?>>Home URL</option>
            <option value="custom" <?php echo $gj_login_url_type === 'custom' ? 'selected="selected"' : ''; ?>>Custom URL</option>
          </select> 
        </td>
      </tr>
      <tr>
        <th><label for="gj_login_url_title">URL Title</label></th>
        <td><input id="gj_login_url_title" type="text" name="gj_login_url_title" value="<?php echo $gj_login_url_title ? $gj_login_url_title : 'Powered by WordPress'; ?>" /></td>
      </tr>
      <tr>
        <th><label for="gj_login_css">CSS</label></th>
        <td><textarea type="textarea" name="gj_login_css"><?php echo $gj_login_css_str; ?></textarea></td>
      </tr>
      <tr>
        <th><label for="gj_login_mail_from">Forgotten Password From</label></th>
        <td><input id="gj_login_mail_from" type="text" name="gj_login_mail_from" value="<?php echo $gj_login_mail_from ? $gj_login_mail_from : get_bloginfo('admin_email'); ?>" /></td>
        <td>
          <select id="gj_login_mail_from_type" name="gj_login_mail_from_type">
            <option value="default" <?php echo $gj_login_mail_from_type === 'default' ? 'selected="selected"' : ''; ?>>WordPress Default</option>
            <option value="custom" <?php echo $gj_login_mail_from_type === 'custom' ? 'selected="selected"' : ''; ?>>Custom Email</option>
          </select> 
        </td>
      </tr>
      <tr>
        <th><label for="gj_login_mail_from_name">Forgotten Password From</label></th>
        <td><input id="gj_login_mail_from_name" type="text" name="gj_login_mail_from_name" value="<?php echo $gj_login_mail_from_name ? $gj_login_mail_from_name : get_bloginfo('name'); ?>" /></td>
      </tr>
      <tr>
        <th><label for="gj_login_disable_notifications">Disable Forgotten Password Notifications</label></th>
        <td><input id="gj_login_disable_notifications" type="checkbox" name="gj_login_disable_notifications"<?php echo $gj_login_disable_notifications ? " checked" : ""; ?>/></td>
      </tr>
    </table>

    <input class="btn button" type="submit" name="Submit" value="Update Settings" />

  </form>
