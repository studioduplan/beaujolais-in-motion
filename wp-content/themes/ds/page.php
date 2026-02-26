<?php
get_header();
global $post;
$post_id = $post->ID;
$hero = get_field("hero", $post_id);
$blue_block = get_field("blue_block", $post_id);
$last_event = get_field("last_event", $post_id);
?>

<div class="template-pages">
   
        <?php if($hero) : ?>
            <div class="template-pages__hero">
                <img class="template-pages__hero-bg" src="<?php echo $hero["bg"]['url'] ?>" alt="<?php echo $hero["bg"]['alt'] ?>" width="<?php echo $hero["bg"]['width'] ?>" height="<?php echo $hero["bg"]['height'] ?>" />
                <div class="container">    
                    <img class="template-pages__hero-logo svg-icon" src="<?php echo $hero["logo"]['url'] ?>" alt="<?php echo $hero["logo"]['alt'] ?>" width="<?php echo $hero["logo"]['width'] ?>" height="<?php echo $hero["logo"]['height'] ?>" />
                    <?php if($hero["intro"]) : 
                        $on_title = $hero["intro"]["on_title"];
                        $title = $hero["intro"]["title"];
                        $rich_text = $hero["intro"]["rich_text"];
                        ?>
                        <div class="template-pages__hero-intro">
                             <?php if($on_title) : ?>
                                    <div class="template-pages__hero-on-title"><?php echo $on_title ?></div>
                                <?php endif; ?>
                            <h1 class="template-pages__hero-title anim-title"><?php echo $title ?></h1>
                            <div class="template-pages__hero-rich-text">
                                <?php echo $rich_text ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

            <?php if($blue_block) : 
                $title = $blue_block["title"];
                $items = $blue_block["item"];
                ?>
                <div id="events" class="template-pages__blue-block" data-bg-color>
                    <div class="container-small">
                        <h2 class="template-pages__blue-block-title anim-title"><?php echo $title ?></h2>
                        <?php if($items) : ?>
                            <div class="template-pages__blue-block-items">
                                <?php foreach($items as $item) : 
                                    $event_id = $item["event"]->ID;
                                    $thumbnail_text = get_field("thumbnail_text", $event_id);
                                    $place = get_field("place", $event_id);
                                    $date = get_field("date", $event_id);
                                    $link = get_permalink($event_id);
                                    $form_registration_link = wp_ds_get_page("templates/registration.php") . "&event=" . $event_id;
                                    $thumbnail_images = get_field("thumbnail_images", $event_id);
                                    ?>
                                    <div class="template-pages__blue-block-item">
                                        <div class="template-pages__blue-block-item-col">
                                            <h3 class="template-pages__blue-block-item-title anim-title"><?= get_the_title($event_id) ?></h3>
                                            <div class="template-pages__blue-block-item-content">
                                                <div class="template-pages__blue-block-item-text"><?= $thumbnail_text ?></div>
                                                <div class="template-pages__blue-block-item-place">
                                                    <img src="<?php echo get_template_directory_uri() ?>/images/pin.svg" alt="icon-pin" width="28" height="28" />Venue: <?= $place ?>
                                                </div>
                                                <div class="template-pages__blue-block-item-date">
                                                    <img src="<?php echo get_template_directory_uri() ?>/images/cal.svg" alt="icon-cal" width="31" height="31" />Date: <?= $date ?>
                                                </div>
                                                <div class="template-pages__blue-block-item-buttons">
                                                    <a class="template-pages__blue-block-item-link cta cta-dotted" href="<?= $link ?>">More infos</a>
                                                    <a class="template-pages__blue-block-item-form-registration-link cta" href="<?= $form_registration_link ?>">Register</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="template-pages__blue-block-item-col">
                                            <?php if($thumbnail_images) : ?>
                                                <div class="template-pages__blue-block-item-thumbnails<?php if(count($thumbnail_images) > 1) echo ' template-pages__blue-block-item-thumbnails--multiple' ?>">
                                                    <?php foreach($thumbnail_images as $thumbnail_image) : 
                                                        $image = $thumbnail_image["image"]['url'];
                                                        ?>
                                            <img class="template-pages__blue-block-item-image" src="<?= $image ?>" alt="<?= get_the_title($event_id) ?>" />
                                                        <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                     </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($last_event) : 
                $event_id = $last_event->ID;
                                    $thumbnail_text = get_field("thumbnail_text", $event_id);
                                    $place = get_field("place", $event_id);
                                    $date = get_field("date", $event_id);
                                    $link = get_permalink($event_id);
                                    $form_registration_link = wp_ds_get_page("templates/registration.php") . "&event=" . $event_id;
                                    $thumbnail_images = get_field("thumbnail_images", $event_id);
                ?>
                <div class="template-pages__last-event">
                    <div class="container-small">
                         <div class="template-pages__last-event-item">
                                        <div class="template-pages__last-event-item-col">
                                            <h3 class="template-pages__last-event-item-title anim-title"><?= get_the_title($event_id) ?></h3>
                                            <div class="template-pages__last-event-item-text"><?= $thumbnail_text ?></div>
                                            <div class="template-pages__last-event-item-place">
                                                <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/pin.svg" alt="icon-pin" width="28" height="28" />Venue: <?= $place ?>
                                            </div>
                                            <div class="template-pages__last-event-item-date">
                                                <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/cal.svg" alt="icon-cal" width="31" height="31" />Date: <?= $date ?>
                                            </div>
                                        <div class="template-pages__last-event-item-buttons">
                                                    <a class="template-pages__last-event-item-link cta cta-dotted" href="<?= $link ?>">More infos</a>
                                                    <a class="template-pages__last-event-item-form-registration-link cta" href="<?= $form_registration_link ?>">Register</a>
                                                </div>
                                        </div>
                                        <div class="template-pages__last-event-item-col">
                                            <?php if($thumbnail_images) : ?>
                                                <div class="template-pages__last-event-item-thumbnails">
                                                    <?php foreach($thumbnail_images as $thumbnail_image) : 
                                                        $image = $thumbnail_image["image"]['url'];
                                                        ?>
                                            <img class="template-pages__last-event-item-image" src="<?= $image ?>" alt="<?= get_the_title($event_id) ?>" />
                                                        <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                     </div
                    </div>
                </div>
            <?php endif; ?>

           <div class="container">
             <img class="template-pages__last-event-item-deco-3" src="<?php echo get_template_directory_uri() ?>/images/deco-3.svg" alt="deco-3" width="572" height="86" />
           </div>

</div>

<?php
get_template_part("template-parts/pre-footer");
get_footer();
