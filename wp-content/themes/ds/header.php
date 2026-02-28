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
                            <div class="breadcrumb">
                                 <?php if(is_singular("events")) : ?>
                                    <a href="<?php echo home_url(); ?>">Beaujolais in Motion</a> > <span>Event: <?php the_title(); ?></span>
                                <?php else : ?>
                                    <a href="<?php echo home_url(); ?>">Beaujolais in Motion</a> > <span><?php the_title(); ?></span>
                                 <?php endif; ?>
                            </div>
                        </div>
                   
                    <div class="site-header__nav-right">
                        <?php
                        wp_nav_menu(
                            array(
                                'container' => 'nav',
                                'menu_id' => 'menu-navigation',
                                'menu_class'      => 'flex items-center',
                                'theme_location'  => 'main-menu',
                                'li_class'        => 'px-6 lg:ps-16'
                            )
                        );
                        ?>
                        <?php //get_template_part("template-parts/mobile-menu"); 
                        ?>
                    </div>
                </div>
            </div>
        </header>

        <main class="site-content">