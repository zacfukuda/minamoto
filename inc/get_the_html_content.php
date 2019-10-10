<?php
/**
 * Display content of HTML file loaded from theme.
 * @param boolean $echo
 * @return string
 * @link http://blog2.k05.biz/2013/06/allow_url_fopen-curl.html
 */
function get_the_html_content() {

	global $post;
	$failed_paths = [];
	$base_path = get_template_directory() . '/html';
	$uri = filter_input(INPUT_SERVER, 'REQUEST_URI');

	/**
	 * Function to return formatted html
	 */
	function format_content($path) {
		global $post;

		// Get the content of HTML file
		$content = file_get_contents($path);

		// Gutenberg compatibiligy: wrap content with HTML block
		if ( has_blocks( $post->post_content ) ) {
			$blocks = parse_blocks( $post->post_content );
			if ( $blocks[0]['blockName'] === 'core/html' ) {
				$content = sprintf('<!-- wp:html -->%s<!-- /wp:html -->', $content);
			}
		}

		/**
		 * Apply filter (Execute shorcodes)
		 * @link https://developer.wordpress.org/reference/functions/the_content/
		 */
		$content = apply_filters( 'the_content', $content );
		$content = str_replace( ']]>', ']]&gt;', $content );

		return $content;
	}

	// BEGIN main code
	$path = $base_path . $uri . 'index.html';

	if ( file_exists($path) ) { return format_content($path); }

	// Add not-found-path
	array_push($failed_paths, $path);

	// Remove '/' at the end of URI
	$uri = preg_replace('/\/$/', '', $uri);

	// Set URI terms and file name to look for
	$uriTerms = explode('/', $uri);
	$filename = end($uriTerms) . '.html';
	array_pop($uriTerms);

	// Try Combination
	for ($i = 0, $terms = $uriTerms; $i < count($uriTerms); $i++) {
		$path = $base_path . implode('/', $terms) . '/' . $filename;

		// Return content with the path
		if ( file_exists($path) ) { return format_content($path); }

		// Add not-found-path and go to the next
		array_push($failed_paths, $path);
		array_pop($terms);
	}

	// Couldn’t find a file
	return "No HTML file found at:<br>" . implode('<br>', $failed_paths);
}
