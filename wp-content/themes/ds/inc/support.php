<?php

add_action('wp_dashboard_setup', 'custom_dashboard_widgets');
/**
 * Add a custom dashboard metabox
 *
 * @source https://codex.wordpress.org/Plugin_API/Action_Reference/wp_dashboard_setup
 */
function custom_dashboard_widgets()
{
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'Support client', 'custom_dashboard_help');
}

/**
 * Add data to metabox
 */
function custom_dashboard_help()
{
	echo '<p>Vous avez besoin d\'aide ? Contactez le développeur freelance par mail "<a href="mailto:contact@duplan.studio">contact@duplan.studio</a>".</p>';
}
