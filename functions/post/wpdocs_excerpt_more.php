<?php
/**
 * Filter the excerpt "read more" string.
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
	return '…';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
