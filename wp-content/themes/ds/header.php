<?php
//global $post;
//$post_id = $post->ID;
//$phone = get_field("phone", "option");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri() ?>/favicon/favicon.svg" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/favicon/apple-touch-icon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="preload" as="style" onload="this.rel='stylesheet'">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="min-h-screen">
        <header class="site-header">
            <div class="container">
                <div class="site-header__nav">
                    <div class="site-header__nav-left">
                        <a href="<?= get_site_url() ?>" class="site-header__logo">
                            <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" width="300" height="45" alt="logo-duplan-studio" fetchpriority="high" />
                        </a>
                    </div>
                    <div class="site-header__nav-right">
                        <?php
                        wp_nav_menu(
                            array(
                                'container' => 'nav',
                                'menu_id' => 'menu-navigation',
                                'menu_class'      => 'flex items-center',
                                'theme_location'  => 'main-menu',
                                'li_class'        => 'ps-4 lg:ps-6'
                            )
                        );
                        ?>
                        <?php //get_template_part("template-parts/mobile-menu"); 
                        ?>
                    </div>
                </div>
                <?php //get_template_part("template-parts/hero"); 
                ?>
            </div>
        </header>

        <main class="site-content">