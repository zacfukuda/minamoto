<?php global $relative_template_directory; ?>

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

<?php wp_footer(); ?>
<script src="<?php echo $relative_template_directory; ?>/js/app.min.js"></script>
<!-- Pace -->
<script>
	var paceOptions = {
		ajax: false,
		document: true,
		eventLag: false,
	}
</script>
<script src="<?php echo $relative_template_directory ?>/js/pace.min.js"></script>
<script>
	// Event when the loading done.
	function doneLoading ($) {
		var $progressUI = $('#progressUI');

		$progressUI.css('opacity', 0);
		setTimeout( function () {
			$progressUI.css('display', 'none');
			$('html').removeClass('overflow-hidden');
		}, 750);
	}

	Pace.on('done', function() {
		appInit(jQuery3);
		doneLoading(jQuery3);
	}, false);
</script>
</body>
</html>