<?php

$post = Timber::query_post();
$context = Timber::get_context();
$context['post'] = $post;

Timber::render([
	'single-' . $post->ID . '.twig',
	'single-' . $post->post_type . '.twig',
	'single.twig'
], $context);
