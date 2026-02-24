<?php

/* `Customize the login logo url. By default, it goes to wordpress.org
----------------------------------------------------------------------------------------------------*/

add_filter('login_headerurl', function ($url) {
    return get_site_url();
});

/* `Customize the login logo
----------------------------------------------------------------------------------------------------*/

add_action('login_head', function () {
    echo '<style type="text/css">
    body.login {
        background-color: #072437 !important;
    }

     #login h1 a {
	   background-image:url(' . get_bloginfo('stylesheet_directory') . '/images/logo.svg) !important;
	   background-size: 319px 82px !important; height: 82px !important; width: 319px !important;
     }

     .login #backtoblog a, .login #nav a, .language-switcher label .dashicons {
        color: #fff !important;
     }
 </style>';
});