<?php
/**
 * searchForm.php
 */
?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="screen-reader-text"><?php _e('Search for:','minamoto'); ?></label>
	<input type="search" name="s" value="<?php echo get_search_query(); ?>" title="<?php echo esc_attr_x( 'Search for:', 'label', 'minamoto' ); ?>"/>
	<button type="submit" id="searchsubmit" ><?php _e('Search','minamoto'); ?></button>
</form>