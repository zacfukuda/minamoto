<?php
/**
 * functions.php
 */

// Theme version
$package_json = file_get_contents(get_theme_root() . '/package.json');
$package_json = json_decode($package_json);
$theme_version = $package_json->version;

// Text Domain
$theme_textdomain = 'minamoto';

/**
 * Global variables regarding theme path
 * @link https://developer.wordpress.org/reference/functions/get_theme_root/ 
 * @link https://developer.wordpress.org/reference/functions/get_template_directory/
 * @link https://developer.wordpress.org/reference/functions/get_stylesheet_directory_uri/
 * @link https://developer.wordpress.org/reference/functions/get_template_directory_uri/
 * @link https://developer.wordpress.org/reference/functions/wp_make_link_relative/
 *
 * NOTE: "$theme_root" and "$stylesheet_directory_uri" return the path to the child theme when it is used.
 */

// Absolute Path (Server)
$theme_root = get_theme_root();
$template_directory = get_template_directory();

// Theme URI
$stylesheet_directory_uri = get_stylesheet_directory_uri();
$template_directory_uri = get_template_directory_uri();

// Relative path from webroot
$relative_stylesheet_directory = wp_make_link_relative($stylesheet_directory_uri);
$relative_template_directory = wp_make_link_relative($template_directory_uri);

// Path to "functions" directory
$functions_directory = $template_directory . '/functions';

/* ----------------------------------------
 * Sets up theme defaults and registers
 * support for various WordPress features.
 * -------------------------------------- */
require_once $functions_directory.'/setup.php';

/* ----------------------------------------
 * Post & Page,
 * Taxonomies also come in here.
 * -------------------------------------- */
require_once $functions_directory.'/post/is_first_page.php';
require_once $functions_directory.'/post/remove_pages_autop.php';
require_once $functions_directory.'/post/the_html_content.php';
require_once $functions_directory.'/post/the_posts_pagination_without_screen_reader.php';
require_once $functions_directory.'/post/wpdocs_excerpt_more.php';

// Custom Post & Taxnomy
require_once $functions_directory.'/post/register_post_type_book.php';
require_once $functions_directory.'/post/register_taxonomy_genre.php';

/* ----------------------------------------
 * Media
 * -------------------------------------- */
require_once $functions_directory.'/media/filter_medium_large.php';
require_once $functions_directory.'/media/half_image_resize.php';
require_once $functions_directory.'/media/the_alternative_thumbnail.php';

/* ----------------------------------------
 * Navigation Menu
 * -------------------------------------- */
require_once $functions_directory.'/nav_menu/Custom_Walker_Nav_Menu.php';
require_once $functions_directory.'/nav_menu/register_nav_menu_locations.php';
require_once $functions_directory.'/nav_menu/the_global_navigation.php';
require_once $functions_directory.'/nav_menu/the_footer_navigation.php';

/* ----------------------------------------
 * Widget
 * -------------------------------------- */
require_once $functions_directory.'/widget/widgets_init.php';
require_once $functions_directory.'/widget/Hello_World_Widget.php';

/* ----------------------------------------
 * Options & Setting API
 * -------------------------------------- */
require_once $functions_directory.'/option/posts_on_front.php';

/* ----------------------------------------
 * Shortcode
 * -------------------------------------- */
require_once $functions_directory.'/shortcode/shortcode_hello.php';

/* ----------------------------------------
 * Cron
 * -------------------------------------- */
require_once $functions_directory.'/cron/add_custom_schedules.php';

/* ----------------------------------------
 * Other
 * -------------------------------------- */
require_once $functions_directory.'/other/cf7_email_validation_filter.php';