<?php
/**
 * Excerpt trim functions
 *
 * @package Design-fly
 */

/**
 * Trim the excerpt.
 *
 * @param integer $trim_count the number to trim.
 * @package Design-fly
 */
function df_excerpt_trim( $trim_count = 0 ) {

	if ( 0 === $trim_count ) {
		the_excerpt();
		return;
	}

	$excerpt = wp_strip_all_tags( get_the_excerpt() );
	$excerpt = substr( $excerpt, 0, $trim_count );
	$excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );

	echo $excerpt;
}

/**
 * Add Read more link.
 *
 * @param string
 * @package Design-fly
 */
function df_excerpt_more( $more = '' ) {

	if ( ! is_single() ) {
		$more = sprintf( '<button class="read-more-button"><a class="read-more-link" href="%1$s">%2$s</a></button>',
			get_permalink( get_the_ID(), ),
			__( 'READ MORE', 'design-fly' ),
		);
	}

	return $more;
}
