<?php
/**
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function create_custom_taxonomy() {

	// Custom Taxnomy for "book"
	register_taxonomy( 'genre', 'book',
		array(
			'labels' => array(
				'name' => _x( 'Book Genre', $theme_textdomain ),
				'singular_name' => _x( 'Book Genre', $theme_textdomain )
			),
			'public' => true,
			'hierarchical' => true,
			'rewrite' => array(
				'slug' => 'genre',
				'with_front' => true
			)
		)
	);
}
add_action( 'init', 'create_custom_taxonomy');