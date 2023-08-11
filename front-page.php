<?php

remove_filter('the_content', 'wpautop');

$context = Timber::get_context();
$context['post'] = new TimberPost();
// $context['html'] = get_the_html_content();

Timber::render('front-page.twig', $context);
