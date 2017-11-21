<?php
/**
 * functions.php
 */
// Text Domain
$theme_textdomain = 'minamoto';

// Returns such as "/home/user/public_html/wp-content/themes/my_theme".
$template_directory = get_template_directory();

// Returns such as "http://example.com/wp-content/themes/my_theme"
$theme_uri = get_stylesheet_directory_uri();

// Returns such as "/wp-content/themes/my_theme"
$theme_relative_path_from_webroot = wp_make_link_relative($theme_uri);

/* ----------------------------------------
 * Sets up theme defaults and registers
 * support for various WordPress features.
 * -------------------------------------- */
require $template_directory.'/functions/setup.php';

/* ----------------------------------------
 * Regarding "post" & "page" post types,
 * category and ta also come in here.
 * -------------------------------------- */
require $template_directory.'/functions/post-page.php';

/* ----------------------------------------
 * Regarding "images."
 * -------------------------------------- */
require $template_directory.'/functions/image.php';

/* ----------------------------------------
 * Navigation Menu
 * -------------------------------------- */
require $template_directory.'/functions/nav_menu.php';

/* ----------------------------------------
 * Register widgets.
 * -------------------------------------- */
require $template_directory.'/functions/widget.php';

/* ----------------------------------------
 * Options & Setting API
 * -------------------------------------- */
require $template_directory.'/functions/options.php';

/* ----------------------------------------
 * Custom Post Types
 * -------------------------------------- */
require $template_directory.'/functions/custom-post.php';

/* ----------------------------------------
 * Custom Taxnomy
 * -------------------------------------- */
require $template_directory.'/functions/custom-taxonomy.php';

/* ----------------------------------------
 * Cron Event
 * -------------------------------------- */
require $template_directory.'/functions/cron.php';

/* ----------------------------------------
 * Other
 * Put any functions into this file.
 * -------------------------------------- */
require $template_directory.'/functions/other.php';