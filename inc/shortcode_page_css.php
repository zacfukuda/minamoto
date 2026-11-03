<?php
/**
 * Shortcode to get the URL of the stylesheet of a page, to be used in the content.
 * Returns only the URL, so write it into a tag by hand:
 * `<link rel="stylesheet" href="[page_css name=about]">`
 * `[page_css 'about']` works as well.
 * @return string
 */

add_shortcode('page_css', function ($atts) {
	$atts = (array) $atts;
	$name = $atts['name'] ?? $atts[0] ?? '';

	return minamoto_vite_page_css_url($name);
});

/**
 * WordPress sanitizes the output of a shortcode that is inside an attribute
 * against the allowed HTML of posts, which has no `<link>`; without it the
 * shortcode in `<link href="...">` is left as it is. Allow it only while the
 * content is being displayed, so what users can save does not change.
 */
add_filter('wp_kses_allowed_html', function ($tags, $context) {
	if ($context === 'post' && doing_filter('the_content')) {
		$tags['link'] = ['href' => true];
	}

	return $tags;
}, 10, 2);
