<?php

//    get_template_part(slug: 'components/button', args: [
//        'text' => 'My Button',
//        'href' => 'https://www.google.co.uk',
//        'target' => '_blank',
//        'class' => '',
//        'is_icon' => false
//    ]);


$classes = 'cta';

$args['class'] = implode(' ', array_merge(explode(' ', $classes), explode(' ', $args['class'])));

?>
<a href="<?php echo $args['href']; ?>" class="<?php echo $args['class']; ?>" target="<?php echo $args['target']; ?>">
    <?php echo $args['text']; ?>
    <?php if ($args['is_icon'] === true) : ?>
        <span class="icon">
            <img class="svg-icon" src="<?php echo get_template_directory_uri() ?>/images/link.svg" width="18" height="18" alt="link" />
        </span>
    <?php endif; ?>
</a>