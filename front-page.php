<?php
 /**
  * front-page.php
  */

get_header();
remove_filter( 'the_content', 'wpautop' );
?>

<?php
	while ( have_post() ) {
		the_post();
		get_template_part( 'parts/page');
	}
?>

<!-- Latest News -->
<section>
	<div class="container">
		<div class="archive row">
			<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => get_option('num_posts_on_front')
				);

				$the_query = new WP_Query($args);
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						get_template_part( 'parts/index');
					}
					wp_reset_postdata();
				} // END if 
			?>
		</div><!-- .row -->
		<a class="btn" href="/news/" title="News">View All</a>
	</div><!-- .container -->
</section>

<?php
// get_sidebar();
get_footer();