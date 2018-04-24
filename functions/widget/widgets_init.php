<?php
/**
 * Register Widget Areas
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 */
function minamoto_widgets_init() {

	global $theme_textdomain;
	
	register_sidebar( array(
		'name' => __( 'Sidebar', $theme_textdomain ),
		'id' => 'sidebar',
		'description' => __( 'Widgets in the sidebar.', $theme_textdomain ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'minamoto_widgets_init' );