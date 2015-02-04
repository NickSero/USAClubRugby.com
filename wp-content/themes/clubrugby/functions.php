<?php
/**
 * USA Club Rugby functions and definitions
 *
 * @package USA Club Rugby
 */

if ( ! function_exists( 'usacr_setup' ) ) :
function usacr_setup() {

	load_theme_textdomain( 'usacr', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ));
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', ));
	
	// Thumbnails ----------------------------------------------------------------------------
	add_theme_support( 'post-thumbnails' );

	// Menus Locations ----------------------------------------------------------------------------
	register_nav_menus( array(
		'main'			=> __( 'Main Menu', 'usacr' ),
	));

}
endif; // usacr_setup
add_action( 'after_setup_theme', 'usacr_setup' );

// Sidebars & Modules ------------------------------------------------------------------------
function usacr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Hero', 'usacr' ),
		'id'            => 'hero',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'usacr' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));
}
add_action( 'widgets_init', 'usacr_widgets_init' );

// Enqueue scripts and styles ------------------------------------------------------------------------
function usacr_scripts() {
	wp_enqueue_style( 'usacr-style', get_template_directory_uri() . '/css/style.css', false, '1.0.0.1' );
}
add_action( 'wp_enqueue_scripts', 'usacr_scripts' );

// Custom Tags ------------------------------------------------------------------------
require get_template_directory() . '/inc/template-tags.php';

// Add Image Sizes ---------------------------------------------------------------------------------------------------------------
add_image_size( 'hero', 1030, 571, true );

// Selects Custom Post Type Templates for single and archive pages ---------------------------------------------------------------
add_filter('template_include', 'custom_template_include');

function custom_template_include($template) {
	$custom_template_location = '/views/';
    if ( get_post_type () ) {
    	if ( is_archive() ) :
        	if(file_exists(get_stylesheet_directory() . $custom_template_location . 'archive-' . get_post_type() . '.php'))
            	return get_stylesheet_directory() . $custom_template_location . 'archive-' . get_post_type() . '.php';
        endif;
        if ( is_single() ) :
        	if(file_exists(get_stylesheet_directory() . $custom_template_location . 'single-' . get_post_type() . '.php'))
            	return get_stylesheet_directory() . $custom_template_location . 'single-' . get_post_type() . '.php';
        endif;
        if ( is_page() ) :
        	if(file_exists(get_stylesheet_directory() . $custom_template_location . 'page-' . get_post_type() . '.php'))
            	return get_stylesheet_directory() . $custom_template_location . 'page-' . get_post_type() . '.php';
        endif;
    }
    return $template;
}

// Read More text ---------------------------------------------------------------------------------------------------------------
function new_content_more($more) {
       global $post;
       return ' <a href="' . get_permalink() . ' " class="more-link ajax">Read More...</a> ';
}   
add_filter( 'the_content_more_link', 'new_content_more' );

// Exerpt Filter ----------------------------------------------------------------------------------------------------------------
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = $excerpt.'... <a href="'.$permalink.'">more</a>';
  return $excerpt;
}

// Using Categories as Classes --------------------------------------------------------------------------------------------------
function category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category)
    	$classes[] = $category->category_nicename;
    	return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');
