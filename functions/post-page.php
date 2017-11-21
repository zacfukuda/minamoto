<?php
/**
 * Remove wpautop on Pages.
 */
function remove_pages_autop() {
	if ( is_page() ) {
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'the_excerpt', 'wpautop' );
	}
}
add_action( 'wp_head', 'remove_pages_autop' );

/**
 * Custom Pagination function removing the screen reader.
 * @link https://developer.wordpress.org/reference/functions/get_the_posts_pagination/
 */
function the_posts_pagination_without_screen_reader( $args = array() ) {
	$links = '';

	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
		$args = wp_parse_args( $args, array(
			'mid_size' => 1,
			'prev_text' => _x( 'Previous', 'previous set of posts' ),
			'next_text' => _x( 'Next', 'next set of posts' ),
			'screen_reader_text' => __( 'Posts navigation' ),
		) );

		// Make sure we get a string back. Plain is the next best thing.
		if ( isset( $args['type'] ) && 'array' == $args['type'] ) {
			$args['type'] = 'plain';
		}

		// Set up paginated links.
		$links = paginate_links( $args );

		if ($links) {
			$template =
				'<nav class="navigation %1$s" role="navigation">
					<div class="nav-links">%2$s</div>
				</nav>';
			printf($template, 'pagination', $links);
		}
	}
}

/**
 * Filter the excerpt "read more" string.
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
/* function wpdocs_excerpt_more( $more ) {
	return '…';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' ); */

/**
 * Check if on the first page of archives. If not paged, set it 1.
 * Recommended to use only in post-indexing templates.
 * @return boolean
 */
function is_first_page() {
	$var = is_page() ? 'page' : 'paged';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if(1 == $paged) return true;
	else return false;
}