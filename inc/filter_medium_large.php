<?php
/**
 * Disable default image resizing.
 * @link https://wordpress.stackexchange.com/questions/251789/
 */
add_filter('intermediate_image_sizes', function($sizes) {
	return array_filter($sizes, function($val) {
		return 'medium_large' !== $val; // Filter out 'medium_large'
	});
});
