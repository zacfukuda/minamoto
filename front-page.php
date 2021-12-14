<?php

remove_filter('the_content', 'wpautop');

$context = Timber::get_context();
$context['page'] = new TimberPost();
$context['posts'] = Timber::get_posts([
	'post_type' => 'post'
]);
// $context['html'] = get_the_html_content();

Timber::render('front-page.twig', $context);
