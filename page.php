<?php

remove_filter( 'the_content', 'wpautop' );

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

// $html = get_the_html_content();
// $context['html'] = $html;

Timber::render(
	[
		'page-' . $post->post_name . '.twig',
		'page.twig'
	],
	$context
);
