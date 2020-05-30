<?php
/**
 * Shortcode to display 'Hello, {name}'
 * @return string
 * @link https://codex.wordpress.org/Shortcode_API
 */

function shortcode_hello($atts) {
	$a = shortcode_atts(array(
		'name' => 'world'
	), $atts);

	return 'Hello, ' . $a . '!';
}
add_shortcode('hello', 'shortcode_hello');