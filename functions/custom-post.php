<?php
/**
 * @link https://codex.wordpress.org/Post_Types
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */

function create_post_type() {
	// Book as an example
	register_post_type( 'book',
		array(
			'labels' => array(
				'name' => __( 'Books' ),
				'singular_name' => __( 'Book' )
			),
			'description' => 'Books that are published',
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
		)
	);

}
add_action('init', 'create_post_type');