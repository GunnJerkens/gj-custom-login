jQuery(document).ready(function($){

  var custom_uploader;

  $('#upload_image_button').click(function(e) {

    e.preventDefault();

    //If the uploader object has already been created, reopen the dialog
    if (custom_uploader) {
      custom_uploader.open();
      return;
    }

    //Extend the wp.media object
    custom_uploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });

    //When a file is selected, grab the URL and set it as the text field's value
    custom_uploader.on('select', function() {
      attachment = custom_uploader.state().get('selection').first().toJSON();
      $('#upload_image').val(attachment.url);
    });

    //Open the uploader dialog
    custom_uploader.open();

  });


  var url, mail;

  url = $('#gj_login_url_type');
  mail = $('#gj_login_mail_from_type');

  $('select').change(function() {
    disableURL();
  });

  function enableURL() {
    $('input').prop('disabled', false);
  }

  function disableURL() {
    enableURL();

    if(url.val() === 'default') {
      $('#gj_login_url').prop('disabled', true);
      $('#gj_login_url_title').prop('disabled', true);
    } else if (url.val() === 'home') {
      $('#gj_login_url').prop('disabled', true);
    }

    if(mail.val() === 'default') {
      $('#gj_login_mail_from').prop('disabled', true);
      $('#gj_login_mail_from_name').prop('disabled', true);
    }

  }

  disableURL();


});