<?php // parts/header ?>

<!-- Header -->
<header id="header" class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
	<div class="container">
		
		<!-- Logo -->
		<h1 class="logo">
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/header/logo.svg" alt="<?php bloginfo('name'); ?>">
			</a>
		</h1>

		<!-- Toggle Button -->
		<div id="navToggleBtn">
			<span></span><span></span><span></span>
		</div>

		<!-- Global Navigation -->
		<nav id="global-nav" class="global" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php the_global_navigation(); ?>
		</nav>
	</div><!-- .container -->
</header>

<!-- Spacer -->
<div class="header-spacer"></div>