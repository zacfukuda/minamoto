<?php

global $theme_textdomain;

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();
$context['pagination'] = get_the_posts_pagination([
	'mid_size' => 3,
	'prev_text' => __( '&larr;', $theme_textdomain ),
	'next_text' => __( '&rarr;', $theme_textdomain ),
	'screen_reader_text' => ' ',
]);

Timber::render( 'index.twig', $context );
