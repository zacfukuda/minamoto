<?php
/**
 * Register theme navigation locations.
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
function add_theme_nav_location () {

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'global' => __( 'Global Navigation', 'minamoto' ),
		'footer'  => __( 'Footer Navigation', 'minamoto' ),
	));
}
add_action('after_setup_theme', 'add_theme_nav_location');

/**
 * Custom function to display the Global Navigation
 * and the Footer Menu
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 * 
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

function the_footer_navigation ($location = 'footer') {
	$args = array(
		// 'menu' => 'footer-menu',
		'menu_class' =>  'footer',
		'menu_id' => '',
		'container' => '',
		'theme_location' => $location,
	);
	wp_nav_menu( $args );
}

/**
 * Add menu description in the global nav <a>.
 * @link http://kachibito.net/wordpress/show-the-description-of-the-menu.html
 */
/*function description_in_global_nav_menu($item_output, $item, $depth, $args){
	if ( $args->menu == 'global-nav' ) {
		return preg_replace('/(<a.*?>[^<]*?)</', '$1'.'<br><small class="global-nav-a-en">'.$item->description.'</small><', $item_output);
	} else {
		return $item_output;
	}
}
add_filter('walker_nav_menu_start_el', 'description_in_global_nav_menu', 10, 4);*/