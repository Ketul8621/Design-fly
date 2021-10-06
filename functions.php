<?php
/**
 * Theme functions
 *
 * @package Design-fly
 */

require get_template_directory() . '/template-parts/enqueue.php';
require get_template_directory() . '/template-parts/theme-support.php';
require get_template_directory() . '/template-parts/footbar-widgets.php';
require get_template_directory() . '/include/photograph.php';
require get_template_directory() . '/include/multimedia.php';
require get_template_directory() . '/include/adver.php';
require get_template_directory() . '/include/excerpt-trim.php';

/**
 * Add 'active' class to the current menu item
 *
 * @param array  $classes Applied classes of an element.
 * @param object $item
 * @return array $classes
 */
function df_special_nav_class( $classes, $item ) {

	if ( in_array( 'current-menu-item', $classes ) ) {

		$classes[] = 'active';
	}
	return $classes;
}

// Register the df_special_nav_class with nav_menu_css_class hook.
add_filter( 'nav_menu_css_class', 'df_special_nav_class', 10, 2 );

/**
 * Add 'active' class to the current menu item
 *
 * @param array  $classes Applied classes of an element.
 * @param object $item
 * @return array $classes
 */
function df_special_class( $classes, $item ) {

	global $wp;
	$current_url  = home_url( add_query_arg( $_GET,$wp->request ) );
	$current_post = url_to_postid( $current_url );

	$query = new WP_Query(
		array(
			'post_type' => 'post',
		),
	);

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) :
			$query->the_post();
			$id_array[] = get_the_ID();
		endwhile;
	endif;

	wp_reset_postdata();

	if ( in_array( 'menu-item-132', $classes ) && in_array( $current_post, $id_array ) ) {
		$classes[] = 'active';
	}

	return $classes;
}

// Register the df_special_class with nav_menu_css_class hook.
add_filter( 'nav_menu_css_class', 'df_special_class', 10, 2 );

/**
 * Get the gallery images
 *
 * @param object $post_id The post id.
 * @return array $srcs
 */
function get_post_block_galleries_images( $post_id ) {
	$content = get_post_field( 'post_content', $post_id );
	$srcs    = [];

	$i = -1;
	foreach ( parse_blocks( $content ) as $block ) {
		if ( 'core/gallery' === $block['blockName'] ) {
			$i++;
			$srcs[ $i ] = [];

			preg_match_all( '#src=([\'"])(.+?)\1#is', $block['innerHTML'], $src, PREG_SET_ORDER );
			if ( ! empty( $src ) ) {
				foreach ( $src as $s ) {
					$srcs[ $i ][] = $s[2];
				}
			}
		}
	}

	return $srcs;
}
