<?php
/**
 * Setup class
 * @link https://codex.wordpress.org/Post_Formats
 */
class MinamotoSetup {
	public function __construct() {
		add_action('after_setup_theme', [$this, 'setup']);
	}

	public function setup() {
		global $theme_textdomain;

		$html5 = ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption'];
		$formats = ['aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio'];

		load_theme_textdomain($theme_textdomain);
		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		add_theme_support('html5', $html5);
		add_theme_support('post-formats', $formats);
		show_admin_bar(false);
		add_post_type_support('page', 'excerpt');
		// set_post_thumbnail_size(1200, 9999);
		// add_image_size('mini_featured-image', 1200, 630, true);	
		// add_editor_style('css/editor-style.css');
	} 
}
