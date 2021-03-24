<?php

$context = Timber::get_context();
$context['posts'] = new Timber\PostQuery();
$context['found_posts'] = $context['posts']->found_posts;
$context['s'] = get_search_query();

Timber::render('search.twig', $context);
