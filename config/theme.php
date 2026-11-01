<?php

/** @link https://developer.wordpress.org/reference/functions/register_post_type/ */
$post_types = [
	'book' => [
		'labels' => [
			'name' => 'Books',
			'singular_name' => 'Book',
		],
		'description' => 'Database of books',
		'public' => true,
		// 'hierarchical' => false,
		'show_in_nav_menus' => true,
		'show_in_rest' => true,
		'taxonomies' => ['genre'],
		'has_archive' => true,
		'rewrite' => [
			'slug' => 'book',
			'with_front' => false,
		],
		'menu_position' => 6,
		'menu_icon' => 'dashicons-format-aside',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
	],
];

/** @link https://developer.wordpress.org/reference/functions/register_taxonomy/ */
$taxonomies = [
	// Genre for book
	'genre' => [
		'object_type' => 'book',
		'args' => [
			'labels' => [
				'name' => 'Book Genre',
				'singular_name' => 'Book Genre',
			],
			'public' => true,
			'hierarchical' => true,
			'rewrite' => [
				'slug' => 'genre',
				'with_front' => true,
			],
		],
	],
];

/** @link https://developer.wordpress.org/reference/functions/register_sidebar/ */
$widgets = [
	[
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => 'Widgets in the sidebar.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	],
];

return [
	'post_types' => $post_types,
	'taxonomies' => $taxonomies,
	'widgets' => $widgets,
];
