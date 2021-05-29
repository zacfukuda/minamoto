<?php
/**
 * Resize Image into half of its original size
 * @link http://stackoverflow.com/questions/9952360/php-wordpress-dynamic-custom-image-sizes
 */

add_image_size('half', 50, 50);
add_filter('image_resize_dimensions', function($payload, $ow, $oh, $dw, $dh, $crop) {
	if ($dw === 50) {
		$w = $ow/2;
		$h = $oh/2;
		return [0, 0, 0, 0, $w, $h, $ow, $oh];
	} else {
		return $payload;
	}
}, 10, 6);
