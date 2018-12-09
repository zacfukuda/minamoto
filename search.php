<?php // search

get_header(); ?>

<section>
	<div class="container">
		<p><?php _e( 'Search Results for: ', 'minamoto' ); ?> <?php echo esc_html(get_search_query()); ?></p>
		
		<div class="archive row">
			<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'parts/index' );
					}
				} else {
					get_template_part( 'parts/none');
				}
			?>
		</div><!-- .row -->
		<?php get_template_part('parts/pagination'); ?>
	</div><!-- .container -->
</section>