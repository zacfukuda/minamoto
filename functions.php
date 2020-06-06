<?php

$paths = require_once 'config/paths.php';

$package_json = file_get_contents($paths->template . '/package.json');
$package_json = json_decode($package_json);

$theme_textdomain = $package_json->name;
$theme_version = $package_json->version;

$theme_config = require_once 'config/theme.php';

$classes = require_once 'config/classes.php';
foreach ($classes as $key => $boolean) {
	if ($boolean) {
		require_once $paths->classes . '/' . $key . '.php';
	}
}

new MinamotoTimber();
new MinamotoSetup();
new MinamotoFactory($theme_config);

$functions = require_once 'config/functions.php';
foreach ($functions as $key => $boolean) {
	if ($boolean) {
		require_once $paths->functions . '/' . $key . '.php';
	}
}
