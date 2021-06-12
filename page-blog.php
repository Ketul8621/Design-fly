<?php

/**
 * Blog file
 *
 * @package Design-fly
 */

get_header();
?>

<div id="post<?php the_ID(); ?>" <?php post_class(); ?> >
	<main id="main-blog" class="site-main" role="main">
		<div class="blog-body">

			<!--<div class="title-part">
				<div class="blog-title-col">
					<p class="title-phrase">LET'S BLOG</p>
				</div>
			</div>-->

			<div class="row">
				<div class="col-6 blog-column">
					<p class="title-phrase">LET'S BLOG</p>
				</div>
			</div>

			<div class="short-line"></div>

			<?php

			$args = array(
				'post_type' => 'post',
			);

			$post_query = new WP_Query( $args );

			if ( $post_query->have_posts() ) :

				while ( $post_query->have_posts() ) :
					$post_query->the_post();
					//echo get_the_title();
					get_template_part( 'template-parts/content', 'blog' );
				endwhile;
				the_posts_pagination();
			endif;
			//the_posts_pagination();
			?>
		</div>

	</main>
</div>

<?php

get_footer();
