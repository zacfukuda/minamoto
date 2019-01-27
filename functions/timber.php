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
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		parent::__construct();
	}

	/**
	 * Add some context
	 * @param string $context
	 */
	public function add_to_context( $context ) {
		global $paths;

		$context['paths'] = $paths;
		$context['nav'] = new Timber\Menu('global');
		$context['site'] = $this;
		return $context;
	}
}

new MinamotoSite();
