<?php

$absolute_paths = [
	'theme_root' => get_theme_root(),
	'template_directory' => get_template_directory(),
	'stylesheet_directory' => get_stylesheet_directory(),
	'template_directory_uri' => get_template_directory_uri(),
	'stylesheet_directory_uri' => get_stylesheet_directory_uri()
];

$relative_paths = [
	'relative_template_directory_uri' => wp_make_link_relative($absolute_paths['template_directory_uri']),
	'relative_stylesheet_directory_uri' => wp_make_link_relative($absolute_paths['stylesheet_directory_uri'])
];

$functions_paths = [
	'classes' => $absolute_paths['template_directory'] . '/classes',
	'functions' => $absolute_paths['template_directory'] . '/inc'
];

return (object) array_merge($absolute_paths, $relative_paths, $functions_paths);
