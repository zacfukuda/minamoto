<?php
/**
 * Disable default image resizing.
 * @link https://wordpress.stackexchange.com/questions/251789/
 */
function filter_medium_large($sizes) {
	return array_filter( $sizes, function( $val ) {
		return 'medium_large' !== $val; // Filter out 'medium_large'
	});
};
add_filter( 'intermediate_image_sizes', 'filter_medium_large');