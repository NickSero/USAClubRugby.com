<?php
/**
 * Plugin Name: Match Widget
 * Description: A widget that displays the iframe of matches.
 * Version: 0.1
 * Author: Davey Jacobson
 * Author URI: http://about.me/daveyjacobson
 */


add_action( 'widgets_init', 'match_widget' );


function match_widget() {
	register_widget( 'Matches' );
}

class match_Widget extends WP_Widget {

	function Matches() {
		$widget_ops = array( 'classname' => 'match_posts', 'description' => __('A widget that displays the iframe of matches ', 'match_widget') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'match_widget' );
		
		$this->WP_Widget( 'match_widget', __('Matches', 'example'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$match = $instance['match'];
		
		echo $before_widget;

// get the view

		$viewsource = 'views/match_widget.php';
		
		include $viewsource;

		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['match'] = strip_tags( $new_instance['match'] );
		return $instance;
	}


// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $match = esc_attr($instance['match']);

} else {
     $title = ''; 
     $match = ''; 
} 

$matches = get_posts('post_type=matches');

?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'match_plugin'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('event'); ?>"><?php _e('Event', 'match_plugin'); ?></label>
			<select name="<?php echo $this->get_field_name('event'); ?>" id="<?php echo $this->get_field_id('event'); ?>" class="widefat">
			<?php foreach ($events as $single) {
				echo '<option value="' . $single->ID . '" id="' . $single->post_name . '"', $event == $single->ID ? ' selected="selected"' : '', '>', $single->post_title, '</option>'; }?>
			</select>
		</p>

	<?php
	}
}
?>