<?php
/**
 * Main template file
 *
 * @package Design-fly
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main-blog" class="site-main" role="main">
		<div class="blog-body">

			<div class="row">
				<div class="col-6 blog-column">
					<p class="title-phrase"><?php the_archive_title(); ?></p>
				</div>
			</div>

			<div class="short-line"></div>

			<?php

			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'blog' );
				endwhile;
			endif;

			wp_reset_postdata();

			global $wp_query;
			$big = 999999999; // need an unlikely integer.

			$page_args = array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
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
