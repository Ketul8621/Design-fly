<?php

/**
 * Blog file
 *
 * @package Design-fly
 */

get_header();
?>

<div id="post<?php the_ID(); ?>" <?php post_class(); ?>>
	<main id="main-blog" class="site-main" role="main">
		<div class="blog-body">
			<div class="row">
				<div class="col-6 blog-column">
					<p class="title-phrase">LET'S BLOG</p>
				</div>
			</div>

			<div class="short-line"></div>

			<?php
			$paged_blog = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			$args = array(
				'post_type' => 'post',
				'paged'     => $paged_blog,
			);


			$post_query = new WP_Query( $args );

			if ( $post_query->have_posts() ) :
				while ( $post_query->have_posts() ) :
					$post_query->the_post();
					get_template_part( 'template-parts/content', 'blog' );
				endwhile;
			endif;

			wp_reset_postdata();

			$big = 999999999; // need an unlikely integer.

			$page_args = array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $post_query->max_num_pages,
				'prev_next' => true,
				'show_all'  => false,
				'prev_text' => __( '<span class="dashicons dashicons-arrow-left"></span>' ),
				'next_text' => __( '<span class="dashicons dashicons-arrow-right"></span>' ),
			);
			?>

			<div class="blog-pagination">
				<?php
				echo paginate_links( $page_args );
				?>
			</div>
		</div>

		<div class="sidebar-widget">
			<?php
			if ( is_active_sidebar( 'yohe-1' ) ) :
				dynamic_sidebar( 'yohe-1' );
			endif;
			?>
		</div>

	</main>
</div>

<?php

get_footer();
