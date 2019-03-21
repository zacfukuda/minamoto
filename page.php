<?php

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

// Get the content from "html" directory in the theme.
// $html = get_the_html_content();
// $context['html'] = $html;

Timber::render(
	[
		'page-' . $post->post_name . '.twig',
		'page.twig'
	],
	$context
);
