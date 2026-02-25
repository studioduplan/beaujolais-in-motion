<?php
get_header();
global $post;
$post_id = $post->ID;

$on_title = get_field("on_title", $post_id);
$place = get_field("place", $post_id);
$date = get_field("date", $post_id);
$horaires = get_field("horaires", $post_id);
$cream_item = get_field("cream_item", $post_id);
$white_item = get_field("white_item", $post_id);
$form_registration_link = wp_ds_get_page("templates/registration.php") . "&event=" . $post_id;
$thumbnail_images = get_field("thumbnail_images", $post_id);

$args = array(
    'post_type' => 'events',
    'posts_per_page' => 1,
    'orderby' => 'rand',
    'post_status' => 'publish',
    'post__not_in'  => array(get_the_ID())
);
$more_event = get_posts($args);
?>

<div class="template-single-event">
   
        <?php if($on_title) : ?>
        <div class="template-single-event__hero">
             <div class="container">
                <div class="template-single-event__hero-wrapper">
            <div class="template-single-event__hero-content">
                <div class="template-single-event__hero-on-title"><?= $on_title ?></div>
                <h1 class="template-single-event__hero-title anim-title"><?= get_the_title($post_id) ?></h1>
                <div class="template-single-event__hero-place">
                    <img src="<?php echo get_template_directory_uri() ?>/images/pin.svg" alt="icon-pin" width="28" height="28" />Venue: <?= $place ?>
                </div>
                <div class="template-single-event__hero-date">
                    <img src="<?php echo get_template_directory_uri() ?>/images/cal.svg" alt="icon-cal" width="31" height="31" />Date: <?= $date ?>
                </div>
                <div class="template-single-event__hero-horaires">
                    <?php foreach ($horaires as $horaire): 
                        $title = $horaire["title"];
                        $text = $horaire["text"];
                        ?>
                        <div class="template-single-event__hero-horaire">
                            <img src="<?php echo get_template_directory_uri() ?>/images/arrow-right-line.svg" alt="icon-arrow-right-line" width="30" height="30" />
                            <div class="template-single-event__hero-horaire-content">
                                <h3><?= $title ?></h3>
                                <p><?= $text ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="template-single-event__hero-form-registration-link cta" href="<?= $form_registration_link ?>">Register</a>
            </div>
              <?php if($thumbnail_images[0]["image"]) : ?>
                                                <div class="template-single-event__hero-thumbnails">
                                            <img class="template-single-event__hero-thumbnail-image" src="<?= $thumbnail_images[0]["image"]['url'] ?>" alt="<?= get_the_title($post_id) ?>" />
                                                </div>
                                            <?php endif; ?>
                                        </div>
        
                                    </div>
        </div>
</div>
        <?php endif; ?>
        <?php if($cream_item) : ?>
        <div class="template-single-event__cream-items">
            <div class="container">
            <?php $counter = 1; foreach ($cream_item as $item) : 
                $images = $item["images"];
                $title = $item["title"];
                $rich_text = $item["rich_text"];
                ?>
                <div class="template-single-event__cream-item">
                        <div class="template-single-event__cream-item-images<?php if(count($images) > 1) echo ' template-single-event__cream-item-images--multiple' ?>">
                            <?php foreach ($images as $image) : 
                                $url = $image["image"]["url"];
                                $width = $image["image"]["width"];
                                $height = $image["image"]["height"];
                                ?>
                                <img src="<?= $url ?>" alt="<?= get_the_title($post_id) ?>" width="<?= $width ?>" height="<?= $height ?>" />
                            <?php endforeach; ?>
                        </div>
                        <div class="template-single-event__cream-item-content">
                            <?php if($counter === 1) : ?>
                                <img src="<?php echo get_template_directory_uri() ?>/images/bottle.svg" alt="icon-bottle" width="62" height="62" />
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri() ?>/images/arrow-right.svg" alt="icon-arrow-right" width="50" height="49" />
                            <?php endif; ?>
                            <div class="template-single-event__cream-item-content-wrapper">
                                <h3 class="template-single-event__cream-item-title anim-title"><?= $title ?></h3>
                                <div class="template-single-event__cream-item-text"><?= $rich_text ?></div>
                            </div>
                        </div>
                </div>
            <?php $counter++; endforeach; ?>
        </div>
        </div>
          <?php endif; ?>
          <?php if($white_item) : ?>
        <div class="template-single-event__white-items">
            <div class="container">
            <?php $counter = 1; foreach ($white_item as $item) : 
                $images = $item["images"];
                $title = $item["title"];
                $rich_text = $item["rich_text"];
                ?>
                <div class="template-single-event__white-item">
                        <div class="template-single-event__white-item-images<?php if(count($images) > 1) echo ' template-single-event__white-item-images--multiple' ?>">
                            <?php foreach ($images as $image) : 
                                $url = $image["image"]["url"];
                                $width = $image["image"]["width"];
                                $height = $image["image"]["height"];
                                ?>
                                <img src="<?= $url ?>" alt="<?= get_the_title($post_id) ?>" width="<?= $width ?>" height="<?= $height ?>" />
                            <?php endforeach; ?>
                        </div>
                        <div class="template-single-event__white-item-content">
                            <?php if($counter === 2) : ?>
                                <img src="<?php echo get_template_directory_uri() ?>/images/arrow-right.svg" alt="icon-arrow-right" width="50" height="49" />
                            <?php endif; ?>
                            <div class="template-single-event__white-item-content-wrapper">
                                <h3 class="template-single-event__white-item-title anim-title"><?= $title ?></h3>
                                <div class="template-single-event__white-item-text"><?= $rich_text ?></div>
                            </div>
                        </div>
                </div>
            <?php $counter++; endforeach; ?>
        </div>
        </div>
          <?php endif; ?>

        <?php if($more_event) : ?>
           <div class="template-single-event__more-event">
                <div class="container">
                    <img class="template-single-event__more-event-deco-4" src="<?php echo get_template_directory_uri() ?>/images/deco-4.svg" alt="deco-4" width="441" height="68" />
                </div>
                <div class="container-small">
                    <?php foreach ($more_event as $event) : 
                        $event_id = $event->ID;
                        $thumbnail_text = get_field("thumbnail_text", $event_id);
                        $place = get_field("place", $event_id);
                        $date = get_field("date", $event_id);
                        $link = get_permalink($event_id);
                        $thumbnail_images = get_field("thumbnail_images", $event_id);
                        ?>
                    <div class="template-single-event__more-event-item">
                                        <div class="template-single-event__more-event-item-col">
                                            <h3 class="template-single-event__more-event-item-title anim-title"><?= get_the_title($event_id) ?></h3>
                                            <div class="template-single-event__more-event-item-text"><?= $thumbnail_text ?></div>
                                            <div class="template-single-event__more-event-item-place">
                                                <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/pin.svg" alt="icon-pin" width="28" height="28" />Venue: <?= $place ?>
                                            </div>
                                            <div class="template-single-event__more-event-item-date">
                                                <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/cal.svg" alt="icon-cal" width="31" height="31" />Date: <?= $date ?>
                                            </div>
                                        <div class="template-single-event__more-event-item-buttons">
                                                    <a class="template-single-event__more-event-item-link cta cta-dotted" href="<?= $link ?>">More infos</a>
                                                </div>
                                        </div>
                                        <div class="template-single-event__more-event-item-col">
                                            <?php if($thumbnail_images) : ?>
                                                <div class="template-single-event__more-event-item-thumbnails<?php if(count($thumbnail_images) > 1) echo ' template-single-event__more-event-item-thumbnails--multiple' ?>">
                                                    <?php foreach($thumbnail_images as $thumbnail_image) : 
                                                        $image = $thumbnail_image["image"]['url'];
                                                        ?>
                                            <img class="template-single-event__more-event-item-image" src="<?= $image ?>" alt="<?= get_the_title($event_id) ?>" />
                                                        <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                     </div
                    </div>
                    <?php endforeach; ?>
                </div>
           </div>
        <?php endif; ?>
</div>

<?php
get_template_part("template-parts/pre-footer");
get_footer();
