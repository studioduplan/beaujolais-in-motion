<?php

/* `Restore Classic Editor in the admin (replaces Gutenberg)
----------------------------------------------------------------------------------------------------*/
add_filter('use_block_editor_for_post', '__return_false', 10);

add_action('after_setup_theme', 'mm_remove_patterns');
function mm_remove_patterns()
{
    remove_theme_support('core-block-patterns');
}

function remove_menus_appearance_patterns()
{
    // Appearance > Patterns  
    remove_submenu_page('themes.php', 'site-editor.php?path=/patterns');
}
add_action('admin_menu', 'remove_menus_appearance_patterns');

add_filter('allowed_block_types_all', 'ds_disable_blocks_by_categories', 10, 2);

function ds_disable_blocks_by_categories($allowed_blocks, $editor_context)
{
    // Get all registered blocks
    $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

    // Specify the categories to disable
    $categories_to_disable = array('widgets', 'embed', 'theme');

    // Initialize an array to hold allowed block names
    $allowed_block_names = array();

    $blocks_to_disable = [
        "rank-math/faq-block",
        "rank-math/howto-block",
        "rank-math/toc-block",
        "rank-math/rich-snippet",
        "core/freeform",
        "core/code",
        "core/details",
        "core/preformatted",
        "core/pullquote",
        "core/rss",
        "core/search",
        "core/file",
        "core/more",
        "core/nextpage",
        "core/archives",
        "core/calendar",
        "core/navigation",
        "core/embed",
        "core/verse",
        "core/social-links",
        "core/social-link"
    ];

    // Loop through registered blocks
    foreach ($registered_blocks as $block_name => $block_type) {


        // Check if the block has categories defined
        if (isset($block_type->category)) {
            // If the block's category is NOT in the disabled list, allow it
            if (!in_array($block_type->category, $categories_to_disable, true)) {
                if (!in_array($block_name, $blocks_to_disable, true)) {
                    $allowed_block_names[] = $block_name;
                }
            }
        }
    }
    return $allowed_block_names;
}

/**
 * Filter to remove `rank-math-link` class from the frontend content links
 */
add_filter('rank_math/link/remove_class', '__return_true');
