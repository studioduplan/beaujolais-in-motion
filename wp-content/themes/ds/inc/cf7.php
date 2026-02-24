<?php

/*removing default submit tag*/
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
/*adding action with function which handles our button markup*/
add_action('wpcf7_init', 'orlo_button');
/*adding out submit button tag*/
if (! function_exists('orlo_button')) {
	function orlo_button()
	{
		wpcf7_add_form_tag('submit', 'orlo_button_handler');
	}
}
/*out button markup inside handler*/
if (! function_exists('orlo_button_handler')) {
	function orlo_button_handler($tag)
	{
		$tag              = new WPCF7_FormTag($tag);
		$class            = wpcf7_form_controls_class($tag->type);
		$atts             = array();
		$atts['class']    = $tag->get_class_option($class);
		$atts['class']    .= ' cta';
		$atts['id']       = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
		$value            = $tag->values[0] ?? '';
		if (empty($value)) {
			$value = esc_html__('Envoyer la demande', 'ds');
		}
		$atts['type'] = 'submit';
		$atts         = wpcf7_format_atts($atts);
		$html         = sprintf('<button type="submit" class="cta">%2$s</button>', $atts, $value);

		return $html;
	}
}
