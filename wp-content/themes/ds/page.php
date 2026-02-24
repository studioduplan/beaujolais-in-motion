<?php
get_header();
global $post;
?>

<div class="template-pages">
    <div class="container">
        <div class="template-pages__content style-rich-text">
            <?php echo apply_filters('the_content', $post->post_content); ?>
        </div>
    </div>
</div>

<?php
//get_template_part("template-parts/pre-footer");
get_footer();
