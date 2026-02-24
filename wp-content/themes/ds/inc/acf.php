<?php

/* `Theme Settings Support - Buy ACF Pro - It's Amazing!
----------------------------------------------------------------------------------------------------*/

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Configuration du thème',
        'menu_title' => 'Options',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

/* `Hide ACF Menu for non-developer users
----------------------------------------------------------------------------------------------------*/

add_action('admin_menu', function () {

    // provide a list of usernames who can edit ACF
    $admins = [
        'ds'
    ];

    $current_user = wp_get_current_user();

    if (!in_array($current_user->user_login, $admins))
        remove_menu_page('edit.php?post_type=acf');
});
