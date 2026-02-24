<?php

//    get_template_part(slug: 'components/image', args: [
//        'id' => 123,
//        'size' => 'full',
//        'class' => '',
//        'is_thumbnail' => false,
//        'fetchpriority' => ''
//    ]);
$classes = 'aspect-square';

$args['class'] = implode(' ', array_merge(explode(' ', $classes), explode(' ', $args['class'])));

if ($args["is_thumbnail"] === true) :
    echo get_the_post_thumbnail($args["id"], $args["size"], ["class" => $args["class"], "fetchpriority" => $args["fetchpriority"]]);
else :
    echo wp_get_attachment_image($args["id"], $args["size"], "", ["class" => $args["class"], "fetchpriority" => $args["fetchpriority"]]);
endif;
