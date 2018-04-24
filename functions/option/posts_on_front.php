<?php
/**
 * Example but practical use of Options API and Settings API.
 * Custom options for indexing certain number of posts on front page,
 * other than the default posts-per-page setting.
 * @link https://codex.wordpress.org/Options_API
 * @link https://codex.wordpress.org/Settings_API
 */
function posts_on_front() {

	// Add setting section
	add_settings_section(
		'custom_setting_section',
		'Custome Setting Section',
		'custom_setting_section_callback',
		'reading'
	);

	// Add setting field
	add_settings_field(
		'posts_on_front', // $id
		'Number of Posts to show on Front Page', // $title
		'posts_on_front_callback', // $callback
		'reading', // $page
		'custom_setting_section', // $section, or use 'default'
		array() //$args
	);

	// Register fields
	register_setting('reading', 'posts_on_front');

}

// Callback for Custom section
function custom_setting_section_callback() {
	echo '<p>Custom Section</p>';
}

// callback for displaying field of "posts_on_front."
function posts_on_front_callback() {
	$number = get_option('posts_on_front') ? get_option('posts_on_front') : get_option('posts_per_page');
	printf('<input type="number" name="posts_on_front" style="width:65px;" value="%d" /> posts', $number);
}

add_action('admin_init', 'posts_on_front');