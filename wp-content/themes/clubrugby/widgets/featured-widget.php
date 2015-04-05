<?php
/**
 * Plugin Name: Featured Widgets
 * Description: Widget that displays featured images below the hero.
 * Version: 0.1
 * Author: Bradley Ryan
 * Author URI: http://bradryandev.com
 */


add_action( 'widgets_init', 'featured_widget' );


function featured_widget() {
	register_widget( 'featured_widget' );
}

class featured_widget extends WP_Widget {

	function featured_widget() {
		$widget_ops = array( 'classname' => 'example', 'description' => __('Widget that displays featured images below the hero.', 'example') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'featured-widget' );
		
		$this->WP_Widget( 'featured-widget', __('Featured Widget', 'example'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

		echo $before_widget;

		$viewsource = 'views/featured.php';
		include $viewsource;
		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['show_info'] = $new_instance['show_info'];

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('Example', 'example'), 'name' => __('Bilal Shaheen', 'example'), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		//Widget Title: Text Input.
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'example'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>


	<?php
	}
}

?>