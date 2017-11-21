<?php
/**
 * parts/pagination.php
 */

// Pagination
$pagination_args = array(
	'mid_size' => 3,
	'prev_text' => __( '&larr;', 'minamoto' ),
	'next_text' => __( '&rarr;', 'minamoto' ),
	'screen_reader_text' => '',
);

// Choose one that is preferable for you.
the_posts_pagination($pagination_args);
the_posts_pagination_without_screen_reader($pagination_args);

// Reset Post Data
wp_reset_postdata();