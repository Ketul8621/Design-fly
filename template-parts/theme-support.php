<?php
/**
 * Theme support options
 *
 * @package Design-fly
 */

/**
 * Create a navigation menu
 *
 * @return void
 */
function df_register_nav_menu() {

	register_nav_menu( 'Header_menu', 'Header Navigation Menu' );
}

// Register df_register_nav_menu with after_setup_theme hook.
add_action( 'after_setup_theme', 'df_register_nav_menu' );

/**
 * Option to add custom logo
 *
 * @return void
 */
function df_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 200,
		'flex-height'          => true,
		'flex-width'           => true,
		'unlink-homepage-logo' => true,
	);

	add_theme_support( 'custom-logo', $defaults );
}

// Register df_custom_logo_setup with after_setup_theme hook.
add_action( 'after_setup_theme', 'df_custom_logo_setup' );
