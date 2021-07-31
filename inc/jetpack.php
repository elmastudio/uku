<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Uku
 * @since Uku 1.0
 * @version 1.0.1
 */

function uku_jetpack_setup() {

	/**
		* Add theme support for Infinite Scroll.
	 */
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'click',
		'container'	=> 'primary',
		'render'    => 'uku_infinite_scroll_render',
	) );

}
add_action( 'after_setup_theme', 'uku_jetpack_setup' );


// Custom render function for Infinite Scroll.
function uku_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( 'classic' == get_theme_mod( 'uku_bloglayout') ) {
			get_template_part( 'content-classic' );
		} elseif ( 'threecolumns' == get_theme_mod( 'uku_bloglayout' ) || 'fourcolumns' == get_theme_mod( 'uku_bloglayout' ) ) {
			get_template_part( 'content-grid' );
		}
		else {
		 get_template_part( 'content' );
	 }
	}
} // end function nikau_infinite_scroll_render
