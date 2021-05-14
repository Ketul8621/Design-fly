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
