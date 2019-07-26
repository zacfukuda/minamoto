<?php // functions

// Import path values
require_once 'functions/paths.php';

/**
 * Load theme configuration from package.json
 */
$package_json = file_get_contents($paths->template . '/package.json');
$package_json = json_decode($package_json);

$theme_textdomain = $package_json->name; // Text domain
$theme_version = $package_json->version; // Theme version

/* ----------------------------------------
 * Timber setup
 * -------------------------------------- */
require_once $paths->functions . '/timber.php';

/* ----------------------------------------
 * Sets up theme defaults and registers
 * support for various WordPress features.
 * -------------------------------------- */
require_once $paths->functions . '/setup.php';

/* ----------------------------------------
 * Post & Page,
 * Taxonomies also come in here.
 * -------------------------------------- */
require_once $paths->functions . '/post/is_first_page.php';
require_once $paths->functions . '/post/remove_pages_autop.php';
require_once $paths->functions . '/post/get_the_html_content.php';
require_once $paths->functions . '/post/the_posts_pagination_without_screen_reader.php';
require_once $paths->functions . '/post/wpdocs_excerpt_more.php';

// Custom Post & Taxnomy
require_once $paths->functions . '/post/register_post_type_book.php';
require_once $paths->functions . '/post/register_taxonomy_genre.php';

/* ----------------------------------------
 * Media
 * -------------------------------------- */
require_once $paths->functions . '/media/filter_medium_large.php';
require_once $paths->functions . '/media/half_image_resize.php';
require_once $paths->functions . '/media/the_alternative_thumbnail.php';

/* ----------------------------------------
 * Navigation Menu
 * -------------------------------------- */
require_once $paths->functions . '/nav_menu/Custom_Walker_Nav_Menu.php';
require_once $paths->functions . '/nav_menu/register_nav_menu_locations.php';
require_once $paths->functions . '/nav_menu/the_global_navigation.php';
require_once $paths->functions . '/nav_menu/the_footer_navigation.php';

/* ----------------------------------------
 * Widget
 * -------------------------------------- */
require_once $paths->functions . '/widget/widgets_init.php';
require_once $paths->functions . '/widget/Hello_World_Widget.php';

/* ----------------------------------------
 * Options & Setting API
 * -------------------------------------- */
require_once $paths->functions . '/option/posts_on_front.php';

/* ----------------------------------------
 * Shortcode
 * -------------------------------------- */
require_once $paths->functions . '/shortcode/shortcode_hello.php';

/* ----------------------------------------
 * Cron
 * -------------------------------------- */
require_once $paths->functions . '/cron/add_custom_schedules.php';

/* ----------------------------------------
 * Other
 * -------------------------------------- */
require_once $paths->functions . '/other/cf7_email_validation_filter.php';
require_once $paths->functions . '/other/wps_deregister_styles.php';