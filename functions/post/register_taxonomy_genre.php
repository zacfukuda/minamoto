<?php
/**
 * Register "genre" custom taxonomy for "book".
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */

function register_taxonomy_genre() {

	global $theme_textdomain;

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
add_action( 'init', 'register_taxonomy_genre');