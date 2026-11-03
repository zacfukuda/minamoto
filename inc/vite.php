<?php
/**
 * Helpers for the assets that are built by Vite.
 * While the dev server is running, `.vite-hot` holds its origin and
 * the assets are served from there. Otherwise they come from `build`,
 * whose file names (with content hashes) are listed in Vite's manifest.
 */

/**
 * @return string|null Origin of the dev server, or null if it is not running.
 */
function minamoto_vite_origin() {
	$hot_file = get_template_directory() . '/.vite-hot';

	if (!file_exists($hot_file) || wp_get_environment_type() === 'production') {
		return null;
	}

	return rtrim(trim(file_get_contents($hot_file)), '/');
}

/**
 * @return array Entries of `build/.vite/manifest.json`, keyed by source path.
 */
function minamoto_vite_manifest() {
	static $manifest;

	if ($manifest === null) {
		$file = get_template_directory() . '/build/.vite/manifest.json';
		$manifest = file_exists($file)
			? json_decode(file_get_contents($file), true)
			: [];
	}

	return $manifest;
}

/**
 * Get the URLs of the global assets: the script and the stylesheets
 * that are loaded on every page.
 * @return array
 */
function minamoto_vite_assets() {
	$origin = minamoto_vite_origin();
	$media = [
		'globals' => 'all',
		'globals@md' => '(min-width: 768px)',
		'globals@lg' => '(min-width: 1024px)',
	];

	if ($origin) {
		return [
			'client' => "$origin/@vite/client",
			'script' => "$origin/src/ts/index.ts",
			'styles' => [], // Stylesheets are imported from JS in dev to get HMR.
		];
	}

	$base = wp_make_link_relative(get_template_directory_uri()) . '/build';
	$manifest = minamoto_vite_manifest();
	$styles = [];

	foreach ($media as $name => $query) {
		$entry = $manifest["src/css/globals/$name.css"] ?? null;

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

/**
 * Get the tag that loads the stylesheet of a page.
 * Used in Twig as `vite_page_css('home')` for `src/css/pages/home/index.css`.
 * @param string $name Name of the directory under `src/css/pages`.
 * @return string
 */
function minamoto_vite_page_css($name) {
	$origin = minamoto_vite_origin();
	$source = "src/css/pages/$name/index.css";

	// In dev the stylesheet is imported as a module to get HMR.
	if ($origin) {
		return '<script type="module" src="' . esc_url("$origin/$source") . '"></script>';
	}

	$file = minamoto_vite_manifest()[$source]['file'] ?? null;

	// An empty stylesheet is not emitted by the build.
	if (!$file) {
		return '';
	}

	$base = wp_make_link_relative(get_template_directory_uri()) . '/build';

	return '<link rel="stylesheet" href="' . esc_url("$base/$file") . '">';
}
