<?php
/**
 * Custom function to display the Global Navigation
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function the_global_navigation ($location = 'global') {
	$args = array(
		// 'menu' => 'global-navigation',
		'menu_class' =>  'global',
		'menu_id' => '',
		'container' => '',
		// 'container_class' => 'global-nav',
		// 'container_id' => '',
		// 'fallback_cb' => '',
		// 'before' => '<span>',
		// 'after' => '</span>',
		// 'link_before' => '<b>',
		// 'link_after' => '</b>',
		// 'echo' => true,
		// 'depth' => 0,
		'theme_location' => $location,
		// 'items_wrap' = '<ul id="%1$s" class="%2$s">%3$s</ul>',
		// 'walker' => new Custom_Walker_Nav_Menu()
	);
	wp_nav_menu( $args );
}