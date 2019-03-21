<?php
/**
 * The Template for displaying all single posts
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

Timber::render(
	[
		'single-' . $post->ID . '.twig',
		'single-' . $post->post_type . '.twig',
		'single.twig'
	],
	$context
);
