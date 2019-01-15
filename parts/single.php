<?php // parts/single

// Retrieve a first category
$categories = get_the_category();
$category = $categories[0];
$category_url = esc_url( get_term_link($category) );
// echo $category->name;
// echo $category->slug; ?>

<article id="post-<?php the_ID() ?>" <?php post_class() ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<header class="">
		<p><time itemprop="datePublished" datetime="<?php the_date('Y-m-d') ?>"><?php the_date('Y-m-d') ?></time></p>
		<h1 class=""><?php the_title() ?></h1>
	</header>

	<?php
	the_post_thumbnail();
	the_excerpt();
	the_category();
	the_tags(); ?>

	<section class="the_content">
		<?php the_content() ?>
	</section>

	<?php
	/**
	 * Displays page-links for paginated posts
	 * https://codex.wordpress.org/Function_Reference/wp_link_pages
	 */
	$args = array(
		'before'           => '<p>' . __( 'Pages:' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( 'Next page' ),
		'previouspagelink' => __( 'Previous page' ),
		'pagelink'         => '%',
		'echo'             => 1
	);
	wp_link_pages( $args ); ?>
</article>