<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);

// Main switch to get frontend assets from a Vite dev server OR from production built folder
// If you specify a DEVELOPMENT_IP constant, the frontend assets will be loaded from the Vite dev server only for the IP specified
// it is recommended to move it into wp-config.php
const IS_VITE_DEVELOPMENT = true;

require 'inc/vite.php';

require 'inc/acf.php';
require 'inc/cleanup.php';
require 'inc/general.php';
require 'inc/gutenberg.php';
require 'inc/login.php';
require 'inc/post-types.php';
require 'inc/svg.php';
require 'inc/useful.php';
require 'inc/widgets.php';
require 'inc/image.php';
require 'inc/support.php';
require 'inc/cf7.php';


add_action('after_setup_theme', function () {

    add_theme_support('title-tag');

    add_theme_support(
        'html5',
        array(
            'search-form',
            'gallery',
            'caption',
        )
    );

    /* `Add Support to change the logo */
    add_theme_support('post-thumbnails');

    /* `Add Support for Menus */
    add_theme_support('menus');
    register_nav_menu('main-menu', 'Navigation');
    register_nav_menu('footer-1-menu', 'Footer 1');
    register_nav_menu('footer-2-menu', 'Footer 2');

    /* `Custom image sizes */

    add_image_size('thumb-fullwidth', 1440);
    add_image_size('thumb-block', 550);
    add_image_size('thumb-square', 500, 500);
    add_image_size('thumb-landscape', 718, 532);
    add_image_size('thumb-post', 350, 200);
    //add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)

});
