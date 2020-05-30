<?php
/**
 * Resize Image into half of its original size
 * @link http://stackoverflow.com/questions/9952360/php-wordpress-dynamic-custom-image-sizes
 */

add_image_size('half', 50, 50);

function half_image_resize( $payload, $orig_w, $orig_h, $dest_w, $dest_h, $crop ){
	if($dest_w === 50){ //if half image size
		$width = $orig_w/2;
		$height = $orig_h/2;
		return array( 0, 0, 0, 0, $width, $height, $orig_w, $orig_h );
	} else { //do not use the filter
		return $payload;
	}
}
add_filter( 'image_resize_dimensions', 'half_image_resize', 10, 6 );