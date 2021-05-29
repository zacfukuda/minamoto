<?php

/**
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 */
$post_types = [
	'book' => [
		'labels' => [
			'name' => __('Books'),
			'singular_name' => __('Book')
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
			'with_front' => false
		],
		'menu_position' => 6,
		'menu_icon' => 'dashicons-format-aside',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt']
	]
];

/**
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
$taxonomies = [
	// Genre for book
	'genre' => [
		'object_type' => 'book',
		'args' => [
			'labels' => [
				'name' => _x('Book Genre', $theme_textdomain),
				'singular_name' => _x('Book Genre', $theme_textdomain)
			],
			'public' => true,
			'hierarchical' => true,
			'rewrite' => [
				'slug' => 'genre',
				'with_front' => true
			]
		]
	]
];

/**
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
$nav_menus = [
	'gnav' => __('Global Navigation', $theme_textdomain),
	'fnav'  => __('Footer Navigation', $theme_textdomain)
];

/**
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 */
$widgets = [[
	'name' => __('Sidebar', $theme_textdomain),
	'id' => 'sidebar',
	'description' => __('Widgets in the sidebar.', $theme_textdomain),
	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	'after_widget' => '</section>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
]];

return [
	'post_types' => $post_types,
	'taxonomies' => $taxonomies,
	'nav_menus' => $nav_menus,
	'widgets' => $widgets
];
