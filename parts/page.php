<?php
/**
 * parts/page.php
 */
?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<header>
		<h1 class=""><?php the_title(); ?></h1>
	</header>
	<?php
		/**
		 * For production.
		 */
		the_content();

		/**
		 * For develoment. Get the HTML content.
		 * http://blog2.k05.biz/2013/06/allow_url_fopen-curl.html
		 */
		$file =  get_template_directory() . '/html/' . $post->post_name . '.html';
		if( file_exists($file) ) {
			$content = file_get_contents($file);
			$content = apply_filters( 'the_content', $content );
			$content = str_replace( ']]>', ']]&gt;', $content );
			echo $content;
		} else {
			echo "No html file found." . $file;
		}
	?>
</article>