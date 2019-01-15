<?php // parts/page ?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<header>
		<h1 class=""><?php the_title(); ?></h1>
	</header>
	<?php
		// Production
		// the_content();
		// Development
		the_html_content();
	?>
</article>