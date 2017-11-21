<?php

function minamoto_widgets_init() {
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