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
		'main'				=> __( 'Main Menu', 'usacr' ),
		'news'				=> __( 'News Menu', 'usacr' ),
		'clubs'				=> __( 'Clubs Menu', 'usacr' ),
		'schedules'			=> __( 'Schedules Menu', 'usacr' ),
		'standings'			=> __( 'Standings Menu', 'usacr' ),
		'statistics'		=> __( 'Statistics Menu', 'usacr' ),
		'championships'		=> __( 'Championships Menu', 'usacr'),
		'social'			=> __( 'Social Hub Menu', 'usacr'),
		'administration'	=> __( 'Administration Menu', 'usacr'),
		'resources'			=> __( 'Resources Menu', 'usacr' ),
		'about'				=> __( 'About Menu', 'usacr')
	));

}
endif; // usacr_setup
add_action( 'after_setup_theme', 'usacr_setup' );

// Make WP menus play nice with Foundation 5 ------------------------------------------------------------------------------
class GC_walker_nav_menu extends Walker_Nav_Menu {
  // add classes to ul sub-menus
  function start_lvl(&$output, $depth) {
    // depth dependent classes
    $indent = ( $depth > 0 ? str_repeat("\t", $depth) : '' ); // code indent
    // build html
    $output .= "\n" . $indent . '<ul class="dropdown">' . "\n";
  }
}

if (!function_exists('GC_menu_set_dropdown')) :
function GC_menu_set_dropdown($sorted_menu_items, $args) {
  $last_top = 0;
  foreach ($sorted_menu_items as $key => $obj) {
    // it is a top lv item?
    if (0 == $obj->menu_item_parent) {
      // set the key of the parent
      $last_top = $key;
    } else {
      $sorted_menu_items[$last_top]->classes['dropdown'] = 'has-dropdown';
    }
  }
  return $sorted_menu_items;
}
endif; // GC_menu_set_dropdown
add_filter('wp_nav_menu_objects', 'GC_menu_set_dropdown', 10, 3);


// Sidebars & Modules ------------------------------------------------------------------------
function usacr_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'News Menu', 'usacr' ),
		'id'            => 'news-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Club Menu', 'usacr' ),
		'id'            => 'clubs-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Resources Menu', 'usacr' ),
		'id'            => 'resources-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Schedule Menu', 'usacr' ),
		'id'            => 'schedules-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Standings Menu', 'usacr' ),
		'id'            => 'standings-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Stats Menu', 'usacr' ),
		'id'            => 'stats-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Championships Menu', 'usacr' ),
		'id'            => 'championships-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

	register_sidebar( array(
		'name'          => __( 'Social Menu', 'usacr' ),
		'id'            => 'social-menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

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

	register_sidebar( array(
		'name'          => __( 'Featured Matches', 'usacr' ),
		'id'            => 'featured-matches',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="hide">',
		'after_title'   => '</h1>',
	));

}
add_action( 'widgets_init', 'usacr_widgets_init' );

// Enqueue scripts and styles ------------------------------------------------------------------------
function usacr_scripts() {
	wp_enqueue_style( 'usacr-style', get_template_directory_uri() . '/css/style.css', false );
}
add_action( 'wp_enqueue_scripts', 'usacr_scripts' );

// Custom & Infinite Scroll ------------------------------------------------------------------------
require get_template_directory() . '/inc/template-tags.php';

function clubrugby_infinite_scroll_init() {
	get_template_part('content',get_post_format());
}

// Add Image Sizes ---------------------------------------------------------------------------------------------------------------
add_image_size( 'hero', 2060, 1160, true );

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


// Adjust Match Post Title ------------------------------------------------------------------------------------------------------
function change_default_title($title){
     $screen = get_current_screen();
     if  ( $screen->post_type == 'match' ) {
          return 'Enter Date of First Featured Match (ex: 2015-04-24)';
     }
}
add_filter( 'enter_title_here', 'change_default_title' );

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


// Custom Config for Admin Area --------------------------------------------------------------------------------------------------
function custom_admin_js() {
    $url = esc_url(home_url('/')).'wp-content/themes/clubrugby/js/custom-admin.js';
    echo '"<script type="text/javascript" src="'. $url . '"></script>"';
}
add_action('admin_footer', 'custom_admin_js');


