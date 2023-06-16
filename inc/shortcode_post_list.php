<?php
add_shortcode('post_list', function ($atts) {
	$context['posts'] = Timber::get_posts($atts);
	return Timber::compile('component/post-list.twig', $context);
});
