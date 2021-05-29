<?php
/**
 * If it is on the first page of archives.
 * Recommended to use only in post-indexing templates.
 * @return boolean
 */
function is_first_page() {
	$var = is_page() ? 'page' : 'paged';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if ($paged == 1) return true;
	else return false;
}
