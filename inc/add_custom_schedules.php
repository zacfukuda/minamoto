<?php
/**
 * Custom Schedule Interval
 * @return array
 */

add_filter('cron_schedules', function($schedules) {

	global $theme_textdomain;
	
	$schedules['thricedaily'] = array(
		'interval' => 3 * 24 * 60 * 60, // 3d * 24h * 60m * 60s
		'display' => __('Every 3-day', $theme_textdomain)
	);

	$schedules['weekly'] = array(
		'interval' => 7 * 24 * 60 * 60, // 7d * 24h * 60m * 60s
		'display' => __('Once a Week', $theme_textdomain)
	);

	return $schedules;
});
