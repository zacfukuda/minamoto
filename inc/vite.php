<?php
/**
 * Get the URLs of the assets that are built by Vite.
 * While the dev server is running, `.vite-hot` holds its origin and
 * the assets are served from there. Otherwise they come from `dist`.
 * @return array
 */
function minamoto_vite_assets() {
	global $theme_version;

	$hot_file = get_template_directory() . '/.vite-hot';
	$is_dev =
		file_exists($hot_file) && wp_get_environment_type() !== 'production';
	$media = [
		'style' => 'all',
		'medium' => '(min-width: 768px)',
		'large' => '(min-width: 1024px)',
	];
	$styles = [];

	if ($is_dev) {
		$origin = rtrim(trim(file_get_contents($hot_file)), '/');

		// `?direct` makes the dev server respond with plain CSS so that
		// the `media` attribute of <link> still applies.
		foreach ($media as $name => $query) {
			$styles[] = [
				'href' => "$origin/src/stylus/$name.styl?direct",
				'media' => $query,
			];
		}

		return [
			'client' => "$origin/@vite/client",
			'script' => "$origin/src/ts/index.ts",
			'styles' => $styles,
		];
	}

	$base = wp_make_link_relative(get_template_directory_uri()) . '/dist';

	foreach ($media as $name => $query) {
		$styles[] = [
			'href' => "$base/css/$name.min.css?v=$theme_version",
			'media' => $query,
		];
	}

	return [
		'client' => null,
		'script' => "$base/js/app.min.js?v=$theme_version",
		'styles' => $styles,
	];
}
