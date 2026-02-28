<?php
/*
  Template Name: Custom Registration
  Template Post Type: page
*/
get_header();

if (isset($_GET['event'])) {
  $event_id = $_GET['event'];
  $title = get_the_title($event_id);
  $place = get_field("place", $event_id);
  $date = get_field("date", $event_id);
  $thumbnail_images = get_field("thumbnail_images", $event_id);
}
?>

<div class="template-registration">
  <div class="container-small">
    <h1 class="template-registration__title style-title anim-title">Registration</h1>
    <div class="template-registration__event-item">
      <div class="template-registration__event-item-col">
<?php if($thumbnail_images[0]["image"]) : ?>
                                                <div class="template-registration__event-item-thumbnails">
                                            <img class="template-registration__event-item-thumbnail-image" src="<?= $thumbnail_images[0]["image"]['url'] ?>" alt="<?= $title ?>" />
                                                </div>
                                            <?php endif; ?>
      </div>
      <div class="template-registration__event-item-col">
          <div class="template-registration__event-item-title anim-title"><?= $title ?></div>
          <div class="template-registration__event-item-place">
              <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/pin.svg" alt="icon-pin" width="28" height="28" />Venue: <?= $place ?>
          </div>
          <div class="template-registration__event-item-date">
              <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/cal.svg" alt="icon-cal" width="31" height="31" />Date: <?= $date ?>
          </div>
      </div>
    </div>
    <div class="template-registration__form-wrapper">
      <div class="container-small">
        <?php echo do_shortcode('[contact-form-7 id="6145ded" title="Registration"]'); ?>
      </div>
    </div>
  </div>
</div>

<?php
get_template_part("template-parts/pre-footer");
get_footer();
