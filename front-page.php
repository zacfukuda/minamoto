<?php

$context = Timber::get_context();
$context['page'] = new TimberPost();

// Get the content from "html" directory in the theme.
// $html = get_the_html_content();
// $context['html'] = $html;

// Retrieve latest posts
$args = [
	'post_type' => 'post'
];
$context['posts'] = Timber::get_posts($args);

Timber::render('front-page.twig', $context);
