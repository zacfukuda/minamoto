<?php

$posts = new Timber\PostQuery();
$n = $posts->found_posts;
$result = $n > 1 ? "$n results" : "$n result";

$context = Timber::get_context();
$context['posts'] = $posts;
$context['result'] = $result;
$context['s'] = get_search_query();

Timber::render('search.twig', $context);
