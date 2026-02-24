<?php
$footer = get_field("footer", "option");
$phone = get_field("phone", "option");
?>

</main>

<footer class="site-footer">
    <div class="container">
        <div class="site-footer__row">
            <a href="<?= get_site_url() ?>" class="site-footer__logo">
                <img src="<?php echo get_template_directory_uri() ?>/images/logo.svg" width="300" height="45" alt="logo-duplan-studio" />
            </a>
        </div>
        <div class="site-footer__row site-footer__row-copyright">
            
        </div>
    </div>
</footer>

</div>

<?php wp_footer(); ?>
</body>

</html>