<?php
/**
 * Regsiter "book" custom post
 * @link https://codex.wordpress.org/Post_Types
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 */

function register_post_type_book() {
	// Book as an example
	$args = array(
		'labels' => array(
			'name' => __( 'Books' ),
			'singular_name' => __( 'Book' )
		),
		'description' => 'Books published',
		'public' => true,
		'show_in_nav_menus' => true,
		'taxonomies' => array('genre'),
		'has_archive' => true,
		'rewrite' => array(
			'slug' => 'book',
			'with_front' => false
		),
		'menu_position' => 6,
		'menu_icon' => 'dashicons-format-aside',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
	);
	
	register_post_type('book', $args);

}
add_action('init', 'register_post_type_book');