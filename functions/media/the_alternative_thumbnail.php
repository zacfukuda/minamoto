<?php
/**
 * Display alternative thumbnail.
 * Modify srcset image value according to the design.
 */
function the_alternative_thumbnail() {

	global $stylesheet_directory_uri;
	$thumbnail_name = 'no-thumbnail';

	printf(
		"<img src='%1\$s/img/common/%2\$s.png' srcset='%1\$s/img/common/%2\$s@444w.png 444w, %1\$s/img/common/%2\$s@666w.png 666w'>",
		$stylesheet_directory_uri,
		$thumbnail_name
	);
}