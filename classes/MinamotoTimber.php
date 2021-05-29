<?php
/**
 * Timber setup
 * @link https://timber.github.io/docs/guides/functions/
 */
if (!class_exists('Timber')) {
	add_action('admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
	});
	return;
}

Timber::$dirname = ['templates', 'views'];
Timber::$autoescape = false;

class MinamotoTimber extends Timber\Site {

	public function __construct() {
		add_filter('timber_context', [$this, 'add_to_context']);
		add_filter('timber/twig', [$this, 'add_functions']);
		parent::__construct();
	}

	public function add_to_context($context) {
		global $paths, $theme_version;

		$context['paths'] = $paths;
		$context['version'] = $theme_version;
		$context['gnav'] = new Timber\Menu('gnav');
		$context['fnav'] = new Timber\Menu('fnav');
		$context['site'] = $this;
		return $context;
	}

	public function add_functions($twig) {
		// $twig->addFunction(new Timber\Twig_Function('the_post_thumbnail', 'the_post_thumbnail'));
		return $twig;
	}
}
