<?php
/**
 * archive.php
 */

get_header();
?>

<section>
	<div class="container">
		<?php
			the_archive_title( '<h1 class="page-ttl">', '</h1>' );
			the_archive_description( '<h6 class="">', '</h6>' );
		?>

		<div class="archive row">
			<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						$format = get_post_format() ? get_post_format() : 'index';
						get_template_part( 'parts/' . $format );
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
// get_sidebar();
get_footer();