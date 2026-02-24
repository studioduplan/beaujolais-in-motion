<?php
/*
  Template Name: Plan du site
*/
get_header();

$args = array(
  'post_type' => 'page',
  'posts_per_page' => -1,
  'orderby' => 'title',
  'order'   => 'ASC',
  'post_status' => 'publish',
  'exclude' => array(get_queried_object_id())
);
$pages = get_posts($args);

$args = array(
  'post_type' => 'post',
  'posts_per_page' => -1,
  'orderby' => 'title',
  'order'   => 'ASC',
  'post_status' => 'publish'
);
$posts = get_posts($args);
?>

<div class="template-sitemap">
  <div class="container">
    <div class="template-sitemap__pages">
      <h2 class="template-sitemap__title">Pages</h2>
      <ul><?php foreach ($pages as $item) : ?>
          <li>
            <a href="<?= get_permalink($item->ID) ?>" title="<?= $item->post_title; ?>"><?= $item->post_title; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="template-sitemap__blog">
      <h2 class="template-sitemap__title">Articles de blog</h2>
      <ul><?php foreach ($posts as $item) : ?>
          <li>
            <a href="<?= get_permalink($item->ID) ?>" title="<?= $item->post_title; ?>"><?= $item->post_title; ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<?php
//get_template_part("template-parts/pre-footer");
get_footer();
