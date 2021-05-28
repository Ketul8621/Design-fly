<?php
/**
 * Footbar widgets
 *
 * @package Design-fly
 */

/**
 * Register the widgets for footbar
 *
 * @return void
 */
function df_footbar_widgets() {
	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'universal-search-field',
		'before_widget' => '<div class="chw-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-1-title">',
		'after_title'   => '</div>',
	) );

		register_sidebar( array(
			'name'          => 'Footer 2',
			'id'            => 'universal-search-field-1',
			'before_widget' => '<div class="df-contact-us">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="contact-title">',
			'after_title'   => '</div>',
		) );
}
add_action( 'widgets_init', 'df_footbar_widgets' );
