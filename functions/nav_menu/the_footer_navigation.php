<?php
/**
 * Custom function to display the Footer Navigation
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function the_footer_navigation ($location = 'footer') {
	$args = array(
		// 'menu' => 'footer-menu',
		'menu_class' => 'footer',
		'menu_id' => '',
		'container' => '',
		// 'container_class' => 'global-nav',
		// 'container_id' => '',
		// 'fallback_cb' => '',
		// 'before' => 'Text',
		// 'after' => 'Text',
		// 'link_before' => 'Text',
		// 'link_after' => 'Text',
		// 'echo' => true,
		// 'depth' => 0,
		'theme_location' => $location,
		// 'items_wrap' = '<ul id="%1$s" class="%2$s">%3$s</ul>'
	);
	wp_nav_menu( $args );
}