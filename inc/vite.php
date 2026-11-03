<?php
/**
 * Get the URLs of the assets that are built by Vite.
 * While the dev server is running, `.vite-hot` holds its origin and
 * the assets are served from there. Otherwise they come from `build`,
 * whose file names (with content hashes) are listed in Vite's manifest.
 * @return array
 */
function minamoto_vite_assets() {
	$hot_file = get_template_directory() . '/.vite-hot';
	$is_dev =
		file_exists($hot_file) && wp_get_environment_type() !== 'production';
	$media = [
		'style' => 'all',
		'medium' => '(min-width: 768px)',
		'large' => '(min-width: 1024px)',
	];

	if ($is_dev) {
		$origin = rtrim(trim(file_get_contents($hot_file)), '/');

		return [
			'client' => "$origin/@vite/client",
			'script' => "$origin/src/ts/index.ts",
			'styles' => [], // Stylesheets are imported from JS in dev to get HMR.
		];
	}

	$base = wp_make_link_relative(get_template_directory_uri()) . '/build';
	$manifest_file = get_template_directory() . '/build/.vite/manifest.json';
	$manifest = file_exists($manifest_file)
		? json_decode(file_get_contents($manifest_file), true)
		: [];
	$styles = [];

	foreach ($media as $name => $query) {
		$entry = $manifest["src/css/$name.css"] ?? null;

		if ($entry) {
			$styles[] = ['href' => "$base/{$entry['file']}", 'media' => $query];
		}
	}

	$script = $manifest['src/ts/index.ts']['file'] ?? null;

	return [
		'client' => null,
		'script' => $script ? "$base/$script" : null,
		'styles' => $styles,
	];
}
