<?php

$post = Timber::get_post();
$context = Timber::context();
$context['post'] = $post;

Timber::render([
	'single-' . $post->ID . '.twig',
	'single-' . $post->post_type . '.twig',
	'single.twig'
], $context);
