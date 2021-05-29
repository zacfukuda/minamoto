<?php
/**
 * Get the HTML content from files under the theme,
 * based on the request URI.
 */
function get_the_html_content() {

	function get_possible_paths() {
		$paths = [];
		$base_path = get_template_directory() . '/html';
		$uri = ($_SERVER["REQUEST_URI"] == '') ? '/' : $_SERVER["REQUEST_URI"];

		array_push($paths, $base_path . $uri . 'index.html');

		$uri = preg_replace('/\/$/', '', $uri);
		$terms = explode('/', $uri);
		
		$filename = end($terms) . '.html';
		array_pop($terms);

		while ( !empty($terms) ) {
			$path = $base_path . implode('/', $terms) . '/' . $filename;
			array_pop($terms);
			array_push($paths, $path);
		}

		return $paths;
	}

	function get_path_file_exists($paths) {
		foreach ($paths as $path) {
			if ( file_exists($path) ) { return $path; }
		}
		return '';
	}

	function get_error_message($paths) {
		return 'No HTML file found at:<br>' . implode('<br>', $paths);
	}

	function get_contents($path) {
		$content = file_get_contents($path);
		$content = sprintf('<!-- wp:html -->%s<!-- /wp:html -->', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}

	$paths = get_possible_paths();
	$path = get_path_file_exists($paths);

	if (empty($path)) return get_error_message($paths);
	else return get_contents($path);
}
