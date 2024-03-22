<?php

use Timber\Site;

class MinamotoTimber extends Site {

	public function __construct() {
		add_filter('timber/context', [$this, 'add_to_context']);
		add_filter('timber/twig', [$this, 'add_to_twig']);

		parent::__construct();
	}

	/**
	 * @param string $context
	 */
	public function add_to_context($context) {
		global $paths, $theme_version;

		$context['paths'] = $paths;
		$context['version'] = $theme_version;
		$context['gnav'] = Timber::get_menu('gnav');
		$context['fnav'] = Timber::get_menu('fnav');
		$context['site'] = $this;

		return $context;
	}

	/**
	 * @param Twig\Environment $twig
	 */
	public function add_to_twig($twig) {
		return $twig;
	}
}
