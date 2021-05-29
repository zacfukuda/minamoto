<?php
/**
 * Shortcode to display 'Hello, {name}'
 * @return string
 * @link https://codex.wordpress.org/Shortcode_API
 */

add_shortcode('hello', function($atts) {
	$a = shortcode_atts([
		'name' => 'world'
	], $atts);

	return 'Hello, ' . $a . '!';
});
