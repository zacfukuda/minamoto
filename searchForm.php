<?php // searchForm

global $theme_textdomain; ?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="screen-reader-text"><?php _e('Search for:', $theme_textdomain); ?></label>
	<input type="search" name="s" value="<?php echo get_search_query(); ?>" title="<?php echo esc_attr_x( 'Search for:', 'label', $theme_textdomain ); ?>"/>
	<button type="submit" id="searchsubmit" ><?php _e('Search', $theme_textdomain); ?></button>
</form>