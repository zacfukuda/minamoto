<?php

/**
 * Custom setting API for indexing posts on front page
 * Register this when you want to display different
 * number of post from the default.
 * @link https://codex.wordpress.org/Settings_API
 */
function num_posts_on_front_option() {

	// Add setting section
	add_settings_section(
		'custom_setting_section',
		'Custome Setting Section',
		'custom_setting_section_callback',
		'reading'
	);

	// Add setting sield
	add_settings_field(
		'num_posts_on_front', // $id
		'Number of News to show on Front Page', // $title
		'num_posts_on_front_callback', // $callback
		'reading', // $page
		'custom_setting_section', // $section, or use 'default'
		array() //$args
	);

	// Register fields
	register_setting('reading', 'num_posts_on_front');

}

// Callback for Custom section
function custom_setting_section_callback() {
	echo '<p>Custom Section</p>';
}

// callback for displaying field of "num_posts_on_front."
function num_posts_on_front_callback() {
	$number = get_option('num_posts_on_front') ? get_option('num_posts_on_front') : get_option('posts_per_page');
	printf('<input type="number" name="num_posts_on_front" style="width:65px;" value="%d" /> posts', $number);
}
add_action('admin_init', 'num_posts_on_front_option');