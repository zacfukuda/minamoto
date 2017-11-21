<?php
/**
 * page.php
 */

get_header();

while( have_posts() ) {
	the_post();
	get_template_part( 'parts/page');
}

// get_sidebar();
get_footer();
?>