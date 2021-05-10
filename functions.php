<?php
/**
 * Theme functions
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

	// Register scripts.
	wp_register_script( 'main-js', get_template_directory_uri() . '/assets/main.js', [], '1.0', true );

	// Enqueue styles.
	wp_enqueue_style( 'stylesheet' );

	// Enqueue scripts.
	wp_enqueue_script( 'main-js' );
}

// Register the df_enqueue_scripts with wp_enqueue_scripts hook.
add_action( 'wp_enqueue_scripts', 'df_enqueue_scripts' );
