<?php

$context = Timber::get_context();
$context['page'] = new TimberPost();

// Retrieve latest posts
$args = [
	'post_type' => 'post'
];
$context['posts'] = Timber::get_posts($args);

Timber::render('front-page.twig', $context);
