<?php

remove_filter('the_content', 'wpautop');

$context = Timber::context();
$context['post'] = Timber::get_post();
// $context['html'] = get_the_html_content();

Timber::render(['page-' . $post->post_name . '.twig', 'page.twig'], $context);
