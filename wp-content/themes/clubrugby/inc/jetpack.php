<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package USA Club Rugby
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function usacr_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type'				=> 	'scroll',
		'footer_widgets'	=>	false,
		'container'			=>	'freewall',
		'render'			=>	'clubrugby_infinite_scroll_init',
		'wrapper'			=>	'brick',
		'posts_per_page'	=>	false,
		'footer'			=>	'freewall',
	));
}
add_action( 'after_setup_theme', 'usacr_jetpack_setup' );