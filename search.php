<?php

$posts = Timber::get_posts();
$n = $posts->found_posts;
$result = "$n result" . ($n > 1 ? 's' : '');

$context = Timber::context();
$context['posts'] = $posts;
$context['result'] = $result;
$context['s'] = get_search_query();

Timber::render('search.twig', $context);
