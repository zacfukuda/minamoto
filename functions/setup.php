<?php
function theme_init_setup() {

	global $theme_textdomain;

	// Make theme available for translation.
	load_theme_textdomain( $theme_textdomain );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	// set_post_thumbnail_size( 1200, 9999 );
	// add_image_size('mini_featured-image', 1200, 630, true);	

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	/**
	 * Enable support for Post Formats.
	 * @link https://codex.wordpress.org/Post_Formats
	 */
	/* add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote',
		'link', 'gallery', 'audio',
	)); */

	// Disable showing admin bar
	show_admin_bar(false);

	// Add Excerpt to Pages
	add_post_type_support( 'page', 'excerpt' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	// add_editor_style('css/editor-style.css');

}
add_action( 'after_setup_theme', 'theme_init_setup' );