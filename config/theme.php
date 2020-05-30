<?php
/**
 * Configuration for this theme
 *
 * Tables of configuration:
 * 1. Post Type
 * 2. Taxonomy
 * 3. Navigation Menu
 * 4. Widget
 */

/**
 * Post Type
 * @link https://codex.wordpress.org/Post_Types
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * 
 */
$post_types = [
	// Book
	'book' => [
		'labels' => [
			'name' => __( 'Books' ),
			'singular_name' => __( 'Book' )
		],
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
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt']
	]
];

/**
 * Taxonomy
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
$taxonomies = [
	// Genre for book
	'genre' => [
		'object_type' => 'book',
		'args' => [
			'labels' => [
				'name' => _x( 'Book Genre', $theme_textdomain ),
				'singular_name' => _x( 'Book Genre', $theme_textdomain )
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
 * Navigation Menu
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
$nav_menus = [
	'global' => __( 'Global Navigation', $theme_textdomain ),
	'footer'  => __( 'Footer Navigation', $theme_textdomain ),
];

/**
 * Widget
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 */
$widgets = [
	[
		'name' => __( 'Sidebar', $theme_textdomain ),
		'id' => 'sidebar',
		'description' => __( 'Widgets in the sidebar.', $theme_textdomain ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	],
];


// Combine configurations
$theme_config = [
	'post_types' => $post_types,
	'taxonomies' => $taxonomies,
	'nav_menus' => $nav_menus,
	'widgets' => $widgets
];

// Destroy variables no longer needed
unset($post_types, $taxonomies, $nav_menus, $widgets);
