<?php
/**
 * Filter the excerpt "read more" string.
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
add_filter('excerpt_more', function($more) {
	return '…';
});
