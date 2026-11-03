<?php

use Timber\Site;

class MinamotoTimber extends Site {

	public function __construct() {
		add_filter('timber/context', [$this, 'add_to_context']);
		add_filter('timber/twig', [$this, 'add_to_twig']);

		parent::__construct();
	}

	/**
	 * @param array $context
	 */
	public function add_to_context($context) {
		global $__paths;

		$context['paths'] = $__paths;
		$context['vite'] = minamoto_vite_assets();
		$context['global_header_navigation_menu'] = Timber::get_menu('global-header-navigation-menu');
		$context['global_footer_navigation_menu'] = Timber::get_menu('global-footer-navigation-menu');
		$context['site'] = $this;

		return $context;
	}

	/**
	 * @param Twig\Environment $twig
	 */
	public function add_to_twig($twig) {
		$twig->addFunction(
			new \Twig\TwigFunction('vite_css', 'minamoto_vite_css', [
				'is_safe' => ['html'],
			])
		);

		return $twig;
	}
}
