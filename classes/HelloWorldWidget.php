<?php
/**
 * @link https://codex.wordpress.org/Widgets_API
 * @link https://developer.wordpress.org/reference/classes/wp_widget/
 */

class HelloWorldWidget extends WP_Widget {

	function __construct() {
		global $theme_textdomain;
		$id = 'hello_world';
		$name = esc_html__('Hello World', $theme_textdomain);
		$option = [
			'classname' => 'hello-world',
			'description' => esc_html__('Say hello to the world.', $theme_textdomain)
		];
		parent::__construct($id, $name, $option);
	}

	/**
	 * Front-end display of widget.
	 * @see WP_Widget::widget()
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance) {
		global $theme_textdomain;

		echo $args['before_widget'];

		if (!empty($instance['title'])) {
			echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
		}
		
		echo esc_html__('Hello, World!', $theme_textdomain);
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 * @see WP_Widget::form()
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		global $theme_textdomain;
		$title = !empty($instance['title']) ? $instance['title'] : esc_html__('New title', $theme_textdomain);
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', $theme_textdomain); ?></label> 
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 * @see WP_Widget::update()
	 * @param array $new Values just sent to be saved.
	 * @param array $old Previously saved values from database.
	 * @return array Updated safe values to be saved.
	 */
	public function update($new, $old) {
		$instance = [];
		$instance['title'] = (!empty($new['title'])) ? strip_tags($new['title']) : '';

		return $instance;
	}
}
add_action('widgets_init', function() {
	register_widget('HelloWorldWidget');
});
