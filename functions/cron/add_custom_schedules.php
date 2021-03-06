<?php

/**
 * Custom Schedule Interval
 * @return array
 */
function add_custom_schedules($schedules) {

	global $theme_textdomain;
	
	$schedules['thricedaily'] = array(
		'interval' => 3 * 24 * 60 * 60, // 7 days * 24 hours * 60 minutes * 60 seconds
		'display' => __( 'Every 3-day', $theme_textdomain )
	);

	$schedules['weekly'] = array(
		'interval' => 7 * 24 * 60 * 60, // 7 days * 24 hours * 60 minutes * 60 seconds
		'display' => __( 'Once a Week', $theme_textdomain )
	);

	return $schedules;
}
add_filter( 'cron_schedules', 'add_custom_schedules' );