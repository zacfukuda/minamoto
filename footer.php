<?php // footer

global $theme_version;
global $paths; ?>

	</main>
	<!-- Footer -->
	<footer id="footer" class="footer" itemscope itemtype="http://schema.org/WPFooter" role="contentinfo">
		<div class="container">
			<!-- Footer Navigation -->
			<nav id="footer-navigation" class="footer" role="navigation">
				<?php the_footer_navigation(); ?>
			</nav>

			<!-- Copyright -->
			<p class="copright">© <?php echo date('Y'); ?> Company, Inc. All rights reserved.</p>
		</div>
	</footer>
<div><!-- root -->

<?php wp_footer(); ?>
<?php
/**
 * Pace - Progress Bar
 * @link http://github.hubspot.com/pace/docs/welcome/
 */
?>
<script>
	var paceOptions = {
		ajax: false,
		document: true,
		eventLag: false,
	}
</script>
<script src="<?php echo $paths->rel_template ?>/assets/pace/pace.min.js"></script>
<script src="<?php echo $paths->rel_template; ?>/dist/js/app.min.js?v=<?php echo $theme_version; ?>"></script>
</body>
</html>