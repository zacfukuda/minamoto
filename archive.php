<?php

global $theme_textdomain;

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();

$templates = array('archive.twig', 'index.twig');

$context['title'] = 'Archive';

if ( is_day() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'D M Y' );
} else if ( is_month() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'M Y' );
} else if ( is_year() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'Y' );
} else if ( is_tag() ) {
	$context['title'] = single_tag_title( '', false );
} else if ( is_category() ) {
	$context['title'] = single_cat_title( '', false );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} else if ( is_post_type_archive() ) {
	$context['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}

$context['pagination'] = get_the_posts_pagination([
	'mid_size' => 3,
	'prev_text' => __( '&larr;', $theme_textdomain ),
	'next_text' => __( '&rarr;', $theme_textdomain ),
	'screen_reader_text' => ' ',
]);

Timber::render( $templates, $context );
