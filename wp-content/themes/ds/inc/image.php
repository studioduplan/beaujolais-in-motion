<?php

//enable upload for webp image files.
function webp_upload_mimes($existing_mimes)
{
    $existing_mimes['webp'] = 'image/webp';

    return $existing_mimes;
}

add_filter('mime_types', 'webp_upload_mimes');

//enable preview / thumbnail for webp image files.
function webp_is_displayable($result, $path)
{
    if ($result === false) {
        $displayable_image_types = array(IMAGETYPE_WEBP);
        $info = @getimagesize($path);

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}

add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

add_filter('jpeg_quality', function () {
    return 100;
});

function namespace_disable_image_sizes($sizes)
{
    unset($sizes['thumbnail']);    // disable thumbnail size
    unset($sizes['medium']);       // disable medium size
    unset($sizes['large']);        // disable large size
    unset($sizes['medium_large']); // disable medium-large size
    unset($sizes['1536x1536']);    // disable 2x medium-large size
    unset($sizes['2048x2048']);    // disable 2x large size

    return $sizes;
}

add_action('intermediate_image_sizes_advanced', 'namespace_disable_image_sizes');

// disable scaled image size
add_filter('big_image_size_threshold', '__return_false');

// disable rotated image size
add_filter('wp_image_maybe_exif_rotate', '__return_false');

// disable other image sizes
function namespace_disable_other_image_sizes()
{
    remove_image_size('post-thumbnail'); // disable images added via set_post_thumbnail_size()
    remove_image_size('another-size');   // disable any other added image sizes
}

add_action('init', 'namespace_disable_other_image_sizes');
