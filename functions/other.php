<?php

/**
 * Assets in <head>
 */
function head_assets() {
	$href_base = $theme_relative_path_from_webroot . '/build/css';

	$format = sprintf('<link media="all" href="%s/FILE">', $href_base);
	$format .= sprintf('<link media="(min-width:720px)" href="%s/FILE">', $href_base);
	$format .= sprintf('<link media="(min-width:1024px)" href="%s/FILE">', $href_base);

	$format = preg_replace('FILE', '%s', $format);

	$file = $template_directory . '/build/asset-manifest.json';
	if( file_exists($file) ) {
		$string = file_get_contents($file);
		$assets = json_decode($string, true);

		printf($format, $assets['style.css'], $assets['tablet.css'], $assets['desktop.css']);
	} else {
		printf($format, 'style.css', 'tablet.css', 'desktop.css');
	}
}

/**
 * Assets in/after <footer>
 */
function footer_assets() {
	$src_base = $theme_relative_path_from_webroot . '/build/js';
	
	$format = sprintf('<script src="%s/js/FILE"></script>', $src_base);
	$format = preg_replace('FILE', '%s', $format);

	$file = $template_directory . '/build/asset-manifest.json';
	if( file_exists($file) ) {
		$string = file_get_contents($file);
		$assets = json_decode($string, true);

		printf($format, $assets['app.js']);
	} else {
		printf($format, 'app.js');
		printf($format, 'style.js');
		printf($format, 'tablet.js');
		printf($format, 'desktop.js');
	}
}

/**
 * Contact Form 7 email validation.
 * @link https://contactform7.com/2015/03/28/custom-validation/
 */
 
function cf7_email_validation_filter( $result, $tag ) {
	$validatee = 'email';
	$validator = 'email-validate';

	if ( $validator == $tag->name ) {
		$your_email = isset( $_POST[$validatee] ) ? trim( $_POST[$validatee] ) : '';
		$your_email_confirm = isset( $_POST[$validator] ) ? trim( $_POST[$validator] ) : '';

		if ( $your_email != $your_email_confirm ) {
			$result->invalidate( $tag, "Are you sure this is the correct address?" );
		}
	}

	return $result;
}
add_filter( 'wpcf7_validate_email*', 'cf7_email_validation_filter', 20, 2 );