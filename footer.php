<?php
/**
 * footer.php
 */

// Since Wordpress can only generate the host URL stored
// in the database, using Wordpress function can cause problem
// when used with Webpack Dev Server.
$theme_dir = '/wp-content/themes/minamoto';
?>
	</main>
	<!-- Footer -->
	<footer id="footer" class="footer" itemscope itemtype="http://schema.org/WPFooter" role="contentinfo">
		<div class="container">
			<!-- Footer Navigation -->
			<nav id="footer-navigation" class="footer" role="navigation">
				<?php the_footer_navigation(); ?>
			</nav>

			<!-- Copyright -->
			<p class="copright">© 2017 Company, Inc. All rights reserved.</p>
		</div>
	</footer>
<div><!-- root -->

<?php
footer_assets();
wp_footer();
?>
</body>
</html>