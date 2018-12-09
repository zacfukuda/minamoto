<?php // 404

get_header(); ?>

<section>
	<div class="container">
		<h1 class=""><?php _e( 'Oops! That page can&rsquo;t be found.', 'minamoto' ); ?></h1>
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'minamoto' ); ?></p>
	</div><!-- .container -->
</section>

<?php
// get_sidebar();
get_footer();