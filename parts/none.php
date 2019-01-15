<?php // parts/none ?>

<div class="col-12">
	<h1><?php _e( 'Nothing Found', 'minamoto' ); ?></h1>

	<?php if ( is_search() ) : ?>
		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'minamoto' ); ?></p>
	<?php else : ?>
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'minamoto' ); ?></p>
	<?php endif; ?>

	<?php get_search_form(); ?>
</div><!-- .col-12 -->