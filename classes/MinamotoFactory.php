<?php
/**
 * Factory to make Wordpress objects
 */
class MinamotoFactory {

	protected $post_types;
	protected $taxonomies;
	protected $nav_menus;
	protected $widgets;

	public function __construct($args) {
		extract($args);

		$this->post_types = $post_types;
		$this->taxonomies = $taxonomies;
		$this->nav_menus = $nav_menus;
		$this->widgets = $widgets;

		add_action('init', [$this, 'make_post_types']);
		add_action('init', [$this, 'make_taxonomies']);
		add_action('after_setup_theme', [$this, 'make_nav_menus']);
		add_action('widgets_init', [$this, 'make_widgets']);
	}

	/**
	 * @link https://developer.wordpress.org/reference/functions/register_post_type/
	 */
	public function make_post_types($post_types) {
		if (empty($post_types) || count($post_types) < 1) $post_types = $this->post_types;
		foreach ($post_types as $slug => $args) register_post_type($slug, $args);
	}

	/**
	 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
	 */
	public function make_taxonomies($taxonomies) {
		if (empty($taxonomies) || count($taxonomies) < 1) $taxonomies = $this->taxonomies;
		foreach ($taxonomies as $slug => $tax) register_taxonomy($slug, $tax['object_type'], $tax['args']);
	}

	/**
	 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
	 */
	public function make_nav_menus($nav_menus) {
		if (empty($nav_menus) || count($nav_menus) < 1) $nav_menus = $this->nav_menus;
		register_nav_menus($nav_menus);
	}

	/**
	 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
	 */
	public function make_widgets($widgets) {
		if (empty($widgets) || count($widgets) < 1) $widgets = $this->widgets;
		foreach ($widgets as $widget) register_sidebar($widget);
	}
}
