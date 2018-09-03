<?php
/**
 * Display content of HTML file loaded from theme.
 * @return null
 * @link http://blog2.k05.biz/2013/06/allow_url_fopen-curl.html
 */
function the_html_content() {
	$content;
	$file = get_template_directory() . '/html/' . $post->post_name . '.html';

	if( file_exists($file) ) {
		$content = file_get_contents($file);
		$content = apply_filters( 'the_content', $content );
		$content = str_replace( ']]>', ']]&gt;', $content );
		
	} else {
		$content =  "No html file found at " . $file;
	}

	echo $content;
}