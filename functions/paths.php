<?php
/**
 * Define paths used throughout the theme.
 */
$paths = [
	/**
	 * System path to 'themes' directory
	 * @link https://developer.wordpress.org/reference/functions/get_theme_root/
	 */
	'theme_root' => get_theme_root(),

	/**
	 * System path to the template theme
	 * Returns path to the parent theme if child theme is active
	 * @link https://developer.wordpress.org/reference/functions/get_template_directory/
	 */
	'template' =>  get_template_directory(),

	/**
	 * System path to the current theme
	 * Returns path to the child theme if child theme is active
	 * @link https://developer.wordpress.org/reference/functions/get_stylesheet_directory/
	 */
	'stylesheet' => get_stylesheet_directory(),

	/**
	 * URI to the template theme
	 * Returns URI to the parent theme if child theme is active
	 * @link https://developer.wordpress.org/reference/functions/get_template_directory_uri/
	 */
	'template_uri' => get_template_directory_uri(),

	/**
	 * URI to the current theme
	 *  Returns URI to the child theme if child theme is active
	 * @link https://developer.wordpress.org/reference/functions/get_stylesheet_directory_uri/
	 */
	'stylesheet_uri' => get_stylesheet_directory_uri()
];

// Relative paths
$rel_paths = [
	/**
	 * Relative paths to the parent/child themes from the webroot
	 * @link https://developer.wordpress.org/reference/functions/wp_make_link_relative/
	 */
	'rel_template' => wp_make_link_relative($paths['template_uri']),
	'rel_stylesheet' => wp_make_link_relative($paths['stylesheet_uri'])
];

// Paths to 'functions' directory
$functions_paths = [
	'functions' => $paths['template'] . '/functions'
];

// Merge arrays
$paths = (object) array_merge($paths, $rel_paths, $functions_paths);

// Destroy variables no longer needed
unset($rel_paths, $functions_paths);