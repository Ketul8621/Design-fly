<?php
/**
 * Extend Walker_Nav_menu
 *
 * @package Design-fly
 */

/**
 * Extend Walker_Nav_menu
 */
class Walker_Nav_Primary extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = NULL ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent\n";
	}

	//function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

	//	$li_attributes = '';
	//	$class_names = $values = '';

	//	$classes[] = ($item->current) ? 'active' : '';
	//	$classes[] = 'menu-item-' . $item->ID;

	//	$class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ));
	//	$class_names = ' class="' . esc_attr( $class_names ) . '"';

	//	$id = apply_filters( 'nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args );
	//	$id = strlen( $id ) ? 'id="' . esc_attr( $id ) . '"' : '';

	//	$output .= '<li' . $id . $values . $class_names . $li_attributes . '>';
	//}


}
