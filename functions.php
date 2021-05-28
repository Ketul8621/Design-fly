<?php
/**
 * Theme functions
 *
 * @package Design-fly
 */

require get_template_directory() . '/template-parts/enqueue.php';
require get_template_directory() . '/template-parts/theme-support.php';
require get_template_directory() . '/include/walker.php';
require get_template_directory() . '/template-parts/footbar-widgets.php';

/**
 * Add active class to the current menu item
 *
 * @param array  $classes Applied classes of an element.
 * @param object $item
 * @return void
 */
function df_special_nav_class( $classes, $item ) {

	if ( in_array( 'current-menu-item', $classes ) ) {

		$classes[] = 'active';
	}
	return $classes;
}

// Register the special_nav_class with nav_menu_css_class hook.
add_filter( 'nav_menu_css_class', 'df_special_nav_class', 10, 2 );

function df_my_widget() {

	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'yohe-1',
		'before_widget' => '<div class="chw-widget">',
        'after_widget'  => '</div>',
	) );
}

add_action( 'widgets_init', 'df_my_widget' );

function universalSearch() {
	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'universal-search-field',
		'before_widget' => '<div class="chw-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-1-title">',
		'after_title'   => '</div>',
	) );

		//register_sidebar( array(
		//	'name'          => 'Universal Search1',
		//	'id'            => 'universal-search-field-1',
		//	'before_widget' => '<div class="chw-newsletter">',
		//	'after_widget'  => '</div>',
		//	'before_title'  => '<h2 class="chw-newsletter_title">',
		//	'after_title'   => '</h2>',
		//) );
}
add_action( 'widgets_init', 'universalSearch' );
