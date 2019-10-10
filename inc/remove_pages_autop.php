<?php
/**
 * Remove wpautop on Pages.
 */
function remove_pages_autop() {
	if ( is_page() ) {
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_excerpt', 'wpautop' );
	}
}
add_action( 'wp_head', 'remove_pages_autop' );