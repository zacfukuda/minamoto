<?php
/**
 * Dequeue the Gutenberg style for audiences/users
 */
add_action('wp_print_styles', function() {
	wp_dequeue_style('wp-block-library');
}, 100);
