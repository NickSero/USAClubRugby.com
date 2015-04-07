<?php
/**
 * Plugin Name: BDR's ACF Posts
 * Description: A widget that displays authors name.
 * Version: 1.0
 * Author: Bilal Shaheen
 * Author URI: http://gearaffiti.com/about
 */


add_action( 'widgets_init', 'my_widget' );


function my_widget() {
	register_widget( 'MY_Widget' );
}

class MY_Widget extends WP_Widget {

	function MY_Widget() {
		$widget_ops = array( 'classname' => 'usar_posts', 'description' => __('A widget that displays posts from Advanced Custom Fields', 'BDR ACF Posts') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'usar_posts-widget' );
		
		$this->WP_Widget( 'usar_posts-widget', __('BDR Posts Widget', 'usar_posts'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$postsNumber = $instance['postsNumber'];
		$linkClass = $instance['linkClass'];
		$postType = $instance['postType'];
		$postCat = $instance['postCat'];
		$widgetView = $instance['widgetView'];



		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;
			$title = apply_filters( 'widget_title', $instance['title'] );

//create views

?>




<?php

$args = array(
  'posts_per_page'=> $postsNumber,
  'post_type' => $postType,
  'category_name' => $postCat,
);

// get the view

$viewsource = 'views/'.$widgetView.'.php';
include $viewsource;


		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['postsNumber'] = strip_tags( $new_instance['postsNumber'] );
		$instance['linkClass'] = strip_tags( $new_instance['linkClass'] );
      	$instance['postType'] = strip_tags($new_instance['postType']);
      	$instance['postCat'] = strip_tags($new_instance['postCat']);
      	$instance['widgetView'] = strip_tags($new_instance['widgetView']);

		return $instance;
	}


// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $postsNumber = esc_attr($instance['postsNumber']);
     $linkClass = esc_attr($instance['linkClass']);
     $postType = esc_attr($instance['postType']);
     $postCat = esc_attr($instance['postCat']);
     $widgetView= esc_attr($instance['widgetView']);

} else {
     $title = ''; 
     $postsNumber = ''; 
     $linkClass = ''; 
     $postType = ''; 
     $postCat = ''; 
     $widgetView = '';
} 

//get post types & remove unused ones
$post_types = get_post_types( '', 'names' ); 
unset($post_types['attachment'], $post_types['acf'], $post_types['revision'], $post_types['nav_menu_item'], $post_types['page'] );

$views = array('List View' => 'post-list',
               'Featured Post'  => 'featured-post' );

//get categories
$categories = get_categories(); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'usar_posts'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('widgetView'); ?>"><?php _e('Widget View', 'wp_widget_plugin'); ?></label>
			<select name="<?php echo $this->get_field_name('widgetView'); ?>" id="<?php echo $this->get_field_id('widgetView'); ?>" class="widefat">
			<?php foreach ($views as $view) {
				echo '<option value="' . $view . '" id="' . $view . '"', $widgetView == $view ? ' selected="selected"' : '', '>', $view, '</option>'; }?>
			} ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'postsNumber' ); ?>"><?php _e('Number of posts: ', 'usar_posts'); ?></label>
			<input id="<?php echo $this->get_field_id( 'postsNumber' ); ?>" name="<?php echo $this->get_field_name( 'postsNumber' ); ?>" value="<?php echo $instance['postsNumber']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'linkClass' ); ?>"><?php _e('Link Class: ', 'usar_posts'); ?></label>
			<input id="<?php echo $this->get_field_id( 'linkClass' ); ?>" name="<?php echo $this->get_field_name( 'linkClass' ); ?>" value="<?php echo $instance['linkClass']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('postType'); ?>"><?php _e('Post Type', 'wp_widget_plugin'); ?></label>
			<select name="<?php echo $this->get_field_name('postType'); ?>" id="<?php echo $this->get_field_id('postType'); ?>" class="widefat">
			<?php foreach ($post_types as $post_type) {
				echo '<option value="' . $post_type . '" id="' . $post_type . '"', $postType == $post_type ? ' selected="selected"' : '', '>', $post_type, '</option>'; }?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('postCat'); ?>"><?php _e('Post Category', 'wp_widget_plugin'); ?></label>
			<select name="<?php echo $this->get_field_name('postCat'); ?>" id="<?php echo $this->get_field_id('postCat'); ?>" class="widefat">
			<?php foreach ($categories as $category) {
				echo '<option value="' . $category->name . '" id="' . $category->name . '"', $postCat == $category->name ? ' selected="selected"' : '', '>', $category->name, '</option>'; }?>
			</select>
		</p>

	<?php
	}
}
?>