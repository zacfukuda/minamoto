<?php

remove_filter( 'the_content', 'wpautop' );

$context = Timber::get_context();
$context['page'] = new TimberPost();

// $html = get_the_html_content();
// $context['html'] = $html;

$args = [
	'post_type' => 'post'
];
$context['posts'] = Timber::get_posts($args);

Timber::render('front-page.twig', $context);
