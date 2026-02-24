<?php
get_header();

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'post_status' => 'publish',
    'post__in'  => get_option('sticky_posts')
);
$sticky_post = get_posts($args);

$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'post_status' => 'publish',
    'post__not_in'  => get_option('sticky_posts')
);
$posts_array = get_posts($args);
?>

<div class="template-blog">
    <div class="container">
        <?php if ($sticky_post) : foreach ($sticky_post as $item) :
                $id = $item->ID;
                $title = $item->post_title;
                $short_text = get_field("short_text", $id);
                $image = get_field("short_text", $id);
                $link = get_permalink($id);
        ?>
                <a href="<?= $link ?>" class="template-blog__sticky-post">
                    <div class="template-blog__sticky-post-left">
                        <?php if ($id) : ?>
                            <div class="template-blog__sticky-post-image">
                                <?php get_template_part(slug: 'components/image', args: [
                                    'id' => $id,
                                    'size' => 'thumb-square',
                                    'class' => 'object-fit-cover',
                                    'is_thumbnail' => true
                                ]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="template-blog__sticky-post-right">
                        <div class="template-blog__sticky-post-title"><?= $title ?></div>
                        <?php if ($short_text) : ?>
                            <div class="template-blog__sticky-post-short-text style-rich-text"><?= $short_text ?></div>
                        <?php endif; ?>
                        <button type="button" class="template-blog__sticky-post-button cta">Lire la suite</button>
                    </div>
                </a>
        <?php endforeach;
        endif; ?>
        <?php if ($posts_array) : ?>
            <div class="template-blog__posts">
                <?php foreach ($posts_array as $item) :
                    $id = $item->ID;
                    $title = $item->post_title;
                    $image = get_field("short_text", $id);
                    $link = get_permalink($id);
                ?>
                    <a href="<?= $link ?>" class="template-blog__post">
                        <?php if ($id) : ?>
                            <div class="template-blog__post-image">
                                <?php get_template_part(slug: 'components/image', args: [
                                    'id' => $id,
                                    'size' => 'thumb-square',
                                    'class' => 'object-fit-cover',
                                    'is_thumbnail' => true
                                ]); ?>
                            </div>
                        <?php endif; ?>
                        <div class="template-blog__post-content">
                            <div class="template-blog__post-title"><?= $title ?></div>
                            <button type="button" class="template-blog__post-button cta">Lire la suite</button>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
