<?php
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