<?php
/**
 * Enqueue scripts and styles
 *
 * @package Design-fly
 */

/**
 * Register and enqueue the css and js
 *
 * @return void
 */
function df_enqueue_scripts() {

	// Register styles.
	wp_register_style( 'style-css', get_stylesheet_uri(), [], '1.0', 'all' );
	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/src/library/bootstrap.min.css', [], false, 'all' );

	// Register scripts.
	wp_register_script( 'main-js', get_template_directory_uri() . '/assets/main.js', [], '1.0', true );
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/src/library/bootstrap.min.js', [ 'jquery' ], false, true );

	// Enqueue styles.
	wp_enqueue_style( 'style-css' );
	wp_enqueue_style( 'bootstrap-css' );

	// Enqueue scripts.
	wp_enqueue_script( 'main-js' );
	wp_enqueue_script( 'bootstrap-js' );
}

// Register the df_enqueue_scripts with wp_enqueue_scripts hook.
add_action( 'wp_enqueue_scripts', 'df_enqueue_scripts' );
