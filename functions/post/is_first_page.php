<?php
/**
 * Check if on the first page of archives. If not paged, set it 1.
 * Recommended to use only in post-indexing templates.
 * @return boolean
 */
function is_first_page() {
	$var = is_page() ? 'page' : 'paged';
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if(1 == $paged) return true;
	else return false;
}