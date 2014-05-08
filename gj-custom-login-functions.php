<?php

// TODO
// Create admin panel to upload image
// Allow upload of custom CSS


function gjLoginLogo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url('/content/themes/gj-boilerplate/img/logo-dark.png');
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'gjLoginLogo' );