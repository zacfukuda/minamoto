<?php // sidebar

if ( is_active_sidebar('sidebar') ) : ?>

<aside role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</aside>

<?php endif; ?>