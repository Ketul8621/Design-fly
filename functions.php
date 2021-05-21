<?php
/**
 * Theme functions
 *
 * @package Design-fly
 */

require get_template_directory() . '/template-parts/enqueue.php';
require get_template_directory() . '/template-parts/theme-support.php';
require get_template_directory() . '/include/walker.php';

/**
 * Add active class to the current menu item
 *
 * @param array  $classes Applied classes of an element.
 * @param object $item
 * @return void
 */
function special_nav_class( $classes, $item ) {

	if ( in_array( 'current-menu-item', $classes ) ) {

		$classes[] = 'active';
	}
	return $classes;
}

// Register the special_nav_class with nav_menu_css_class hook.
add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 2 );
