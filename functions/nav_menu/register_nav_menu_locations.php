<?php
/**
 * Register theme navigation locations.
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
function register_nav_menu_locations () {
	global $theme_textdomain;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'global' => __( 'Global Navigation', $theme_textdomain ),
		'footer'  => __( 'Footer Navigation', $theme_textdomain ),
	));
}
add_action('after_setup_theme', 'register_nav_menu_locations');