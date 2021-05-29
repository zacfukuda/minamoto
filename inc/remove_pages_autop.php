<?php
/**
 * Remove wpautop on Pages.
 */
add_action('wp_head', function() {
	if (is_page()) {
		remove_filter('the_content', 'wpautop');
		remove_filter('the_excerpt', 'wpautop');
	}
});
