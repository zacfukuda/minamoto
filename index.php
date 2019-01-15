<?php // index.php

get_header(); ?>

<section class="">
	<div class="container">
		
		<div class="archive row">
			<?php 
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'parts/index');
					}
				} else {
					get_template_part( 'parts/none');
				}
			?>
		</div><!-- .row -->
		<?php get_template_part('parts/pagination'); ?>
	</div><!-- .container -->
</section>

<?php
get_sidebar();
get_footer();