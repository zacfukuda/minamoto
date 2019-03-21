<?php
/**
 * Display content of HTML file loaded from theme.
 * @param boolean $echo
 * @return string
 * @link http://blog2.k05.biz/2013/06/allow_url_fopen-curl.html
 */
function get_the_html_content($gutenberg = true) {

	global $post;

	$content;

	// Path to the HTML file
	$path = get_template_directory() . '/html/' . $post->post_name . '.html';

	// If no matched file is found
	if ( !file_exists($path) ) {
		return "No HTML file found at " . $path;
	}

	// Get the content of HTML file
	$content = file_get_contents($path);

	// Gutenberg compatibiligy: wrap content with HTML block
	if ($gutenberg) {
		$content = sprintf('<!-- wp:html -->%s<!-- /wp:html -->', $content);
	}

	/**
	 * Apply filter (Execute shorcodes)
	 * @link https://developer.wordpress.org/reference/functions/the_content/
	 */
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );

	return $content;
}
