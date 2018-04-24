<?php
/**
 * parts/slick.php
 * @link https://github.com/kenwheeler/slick
 * @link http://kenwheeler.github.io/slick/
 */
?>

<!-- Slick (Carousel) -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
<section class="slick">
	<div id="slick">
		<div><img src="" alt=""></div>
		<div><img src="" alt=""></div>
		<div><img src="" alt=""></div>
	</div><!-- #slick -->
</section>

<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<script>
	(function ($) {
		$slick = $('#front-slick');

		$slick.slick({
			autoplay: true,
			autoplaySpeed: 4000,
			dots: true,
			infinite: true,
			speed: 1000,
		});
	})(jQuery3);
</script>