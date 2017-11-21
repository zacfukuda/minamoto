<?php

/**
 * single.php
 */

get_header();

while ( have_posts() ) {
	the_post();
	get_template_part( 'parts/single');

	/*
	 * Previous/next post navigation.
	 * https://developer.wordpress.org/reference/functions/the_post_navigation/
	 */
	$args = array(
		'prev_text' => '%title',
		'next_text' => '%title',
		'in_same_term' => false,
		// 'excluded_terms' => array or string,
		'taxonomy' => 'category',
		'screen_reader_text' => ' ',
	);
	the_post_navigation( $args );
}

// get_sidebar();
get_footer();
?>