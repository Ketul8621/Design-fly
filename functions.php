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
require get_template_directory() . '/include/photograph.php';
require get_template_directory() . '/include/multimedia.php';
require get_template_directory() . '/include/adver.php';

add_theme_support( 'post-thumbnails' );

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

function get_post_block_galleries_images( $post_id ) {
    $content = get_post_field( 'post_content', $post_id );
    $srcs = [];

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
