<?php
$logo = get_field("logo", "option");
$rich_text = get_field("rich_text", "option");
$social_network = get_field("social_network", "option");
$down_text = get_field("down_text", "option");
?>

</main>

<footer class="site-footer">
    <div class="container">
        <div class="site-footer__row">
            <div class="site-footer__col">
                <?php if($logo) : ?>
                    <a href="<?php echo home_url(); ?>" class="site-footer__logo">
                        <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" width="<?php echo $logo['width'] ?>" height="<?php echo $logo['height'] ?>" />
                    </a>
                <?php endif; ?>
                <?php if($rich_text) : ?>
                    <div class="site-footer__rich-text"><?php echo $rich_text ?></div>
                <?php endif; ?>
                <?php if($social_network) : ?>
                    <div class="site-footer__social-network">
                        <?php foreach($social_network as $item) : ?>
                            <a href="<?php echo $item['url'] ?>" class="site-footer__social-network-link" target="_blank" rel="noopener">
                                <?php if($item["choice_social"] === "facebook") : ?>
                                    <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/facebook.svg" alt="icon-facebook" />
                                <?php elseif($item["choice_social"] === "instagram") : ?>
                                    <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/instagram.svg" alt="icon-instagram" />
                                <?php elseif($item["choice_social"] === "linkedin") : ?>
                                    <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/linkedin.svg" alt="icon-linkedin" />
                                <?php elseif($item["choice_social"] === "youtube") : ?>
                                    <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/youtube.svg" alt="icon-youtube" />
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="site-footer__col">
 <?php
                        wp_nav_menu(
                            array(
                                'container' => 'nav',
                                'menu_id' => 'footer-1',
                                'menu_class'      => 'flex flex-col',
                                'theme_location'  => 'footer-1-menu',
                                'li_class'        => ''
                            )
                        );
                        ?>

                        <?php
                        wp_nav_menu(
                            array(
                                'container' => 'nav',
                                'menu_id' => 'footer-2',
                                'menu_class'      => 'flex flex-col',
                                'theme_location'  => 'footer-2-menu',
                                'li_class'        => ''
                            )
                        );
                        ?>
            </div>
        </div>
        <div class="site-footer__row">
            <div class="site-footer__down-text"><?php echo $down_text ?></div>
        </div>
    </div>
</footer>

</div>

<?php wp_footer(); ?>
</body>

</html>