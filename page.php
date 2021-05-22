<?php

remove_filter( 'the_content', 'wpautop' );
$post =  new TimberPost();

$context = Timber::get_context();
$context['post'] = $post;
// $context['html'] = get_the_html_content();

Timber::render([
	'page-' . $post->post_name . '.twig',
	'page.twig'
], $context);
