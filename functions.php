<?php

$paths = require_once 'config/paths.php';

$package_json = file_get_contents($paths->template . '/package.json');
$package_json = json_decode($package_json);

$theme_textdomain = $package_json->name;
$theme_version = $package_json->version;

$theme_config = require_once 'config/theme.php';
$classes = require_once 'config/classes.php';
$functions = require_once 'config/functions.php';

foreach ($classes as $c) require_once $paths->classes . '/' . $c . '.php';

if (class_exists('MinamotoTimber')) new MinamotoTimber();
if (class_exists('MinamotoSetup')) new MinamotoSetup();
if (class_exists('MinamotoFactory')) new MinamotoFactory($theme_config);

foreach ($functions as $f) require_once $paths->functions . '/' . $f . '.php';
