<?php

$paths = [
	'theme_root' => get_theme_root(),
	'template' => get_template_directory(),
	'stylesheet' => get_stylesheet_directory(),
	'template_uri' => get_template_directory_uri(),
	'stylesheet_uri' => get_stylesheet_directory_uri()
];

$rel_paths = [
	'rel_template' => wp_make_link_relative($paths['template_uri']),
	'rel_stylesheet' => wp_make_link_relative($paths['stylesheet_uri'])
];

$functions_paths = [
	'classes' => $paths['template'] . '/classes',
	'functions' => $paths['template'] . '/inc'
];

$paths = (object) array_merge($paths, $rel_paths, $functions_paths);
unset($rel_paths, $functions_paths);
