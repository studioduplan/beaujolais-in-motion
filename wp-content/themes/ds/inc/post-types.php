<?php

//WordPress permalinks should be flushed when you register a post type or taxonomy.
//flush_rewrite_rules();

/* `Create custom post type
----------------------------------------------------------------------------------------------------*/

add_action('init', function () {
    // Example - Testimonials
    // Don't forget to create single-<post_type>.php and archive-<post_type>.php
    register_post_type(
        'events',
        // CPT Options
        array(
            'labels' => array(
                'name' => 'Événements',
                'singular_name' => 'Événement'
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'events'),
            'supports' => array('title', 'thumbnail')
        )
    );

    /* register_taxonomy(
        'tags',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'references',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Tags', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'tags',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    ); */
});
