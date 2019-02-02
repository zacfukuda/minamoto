<?php
/**
 * Timber setup
 */

// Show error if Timber is not activated
if (!class_exists('Timber')) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
	});

	return; 
}

// Sets the directories (inside your theme) to find .twig files
Timber::$dirname = array( 'templates', 'views' );

// Autoescape setting
// Set "true" if you want to enable escaping
Timber::$autoescape = false;

// Subclass of Timber\Site
class MinamotoSite extends Timber\Site {

	public function __construct() {
		add_filter('timber_context', array($this, 'add_to_context'));
		add_filter('timber/twig', array($this, 'add_functions'));
		parent::__construct();
	}

	/**
	 * Add some context
	 *
	 * @param string $context
	 */
	public function add_to_context( $context ) {
		global $paths, $theme_version;

		$context['paths'] = $paths;
		$context['version'] = $theme_version;
		$context['global_nav'] = new Timber\Menu('global');
		$context['footer_nav'] = new Timber\Menu('footer');
		$context['site'] = $this;
		return $context;
	}

	/**
	 * Add custom Twig functionality
	 * Add functions you want to use inside Twig template.
	 *
	 * @link https://timber.github.io/docs/guides/functions/
	 * @param Twig_Environment $twig
	 * @return $twig
	 */
	public function add_functions( $twig ) {
		// Wordpress default function to display thumbnail <img>
		$twig->addFunction(new Timber\Twig_Function('the_post_thumbnail', 'the_post_thumbnail'));

		return $twig;
	}
}

new MinamotoSite();
