<?php // functions

// Import path values
require_once 'config/paths.php';

/**
 * Import theme configuration from package.json
 */
$package_json = file_get_contents($paths->template . '/package.json');
$package_json = json_decode($package_json);

$theme_textdomain = $package_json->name; // Text domain
$theme_version = $package_json->version; // Theme version

require_once 'config/theme.php'; // Must be included after $theme_textdomain is defined
require_once 'config/includes.php';

// Import classes
foreach ($classes as $key => $boolean) {
	if ($boolean) {
		require_once $paths->classes . '/' . $key . '.php';
	}
}

// Make Timber\Site instance
new MinamotoTimber();
// Setup theme
new MinamotoSetup();
// Make Wordpress’ objects
new MinamotoFactory($theme_config);

// Import functions
foreach ($functions as $key => $boolean) {
	if ($boolean) {
		require_once $paths->functions . '/' . $key . '.php';
	}
}
