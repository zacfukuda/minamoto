<?php
/**
 * parts/index.php
 */

$categories = get_the_category();
$category = $categories[0];
$category_url = esc_url( get_term_link($category) );
?>

<article id="post-<?php the_ID(); ?>" class="" role="article">
	<!-- Thumbnail -->
	<?php if ( has_post_thumbnail() ) : ?>
		<picture class="">
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
				<?php the_post_thumbnail('thumbnail') ?>
			</a>
		</picture>
	<?php else : ?>
		<picture>
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
				<?php the_alternative_thumbnail() ?>
			</a>
		</picture>
	<?php endif; ?>
	<!-- Title -->
	<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a></h3>
	<!-- Published Date -->
	<p><time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y-m-d'); ?></time></p>
	<!-- Category -->
	<p><a href="<?php echo $category_url ?>" title="Category: <?php echo $category->name ?>"><?php echo $category->name ?></a></p>
	<!-- Other -->
	<?php the_excerpt() ?>
	<?php the_category() ?>
	<p><?php the_tags() ?></p>
</article>

<?php
// Limit number of letters to display in Japanese
// echo mb_strimwidth(get_the_title(), 0, 64, "…", "UTF-8");
// echo mb_strimwidth(get_the_excerpt(), 0, 64, "…", "UTF-8");
?>