<?php
/**
 * Single post file
 *
 * @package Design-fly
 */

echo get_the_author();
get_header();
?>

<?php
if ( have_posts() ) :
	the_post();
	df_count_post_views( get_the_ID() );
	?>

	<div id="single-post" class="single-class" >
		<main id="main-single" class="site-main" role="main">
			<div class="blog-body">
				<div class="row">
					<div class="col-12 blog-column">
						<p class="single-blog-title"><?php the_title(); ?></p>
						<div class="meta-info-box">
							<div class="author-date">by <?php the_author_posts_link(); ?> on <?php echo get_the_date( "d M Y" ); ?></div>
							<div class="tot-comments"><a href="#">12 comments</a></div>
						</div>
					</div>
				</div>

				<div class="short-line"></div>

				<div class="row single-row-content">
					<div class="col-12 single-col-content">
						<?php the_content(); ?>
						<div class="show-tags"><?php the_tags(); ?></div>
					</div>
				</div>

				<div class="short-line"></div>

				<div class="row comment-title-row">
					<div class="col-12 comment-title-col">
						Comments
					</div>
				</div>

				<div class="short-line"></div>

				<div class="row comments-row">
					<div class="col-12 comments-col">
						<?php
						if ( comments_open() ) :
							comments_template();
						endif;
						?>
					</div>
				</div>


			</div>

			<div class="sidebar-widget">
				<?php
				if ( is_active_sidebar( 'yohe-2' ) ) :
					dynamic_sidebar( 'yohe-2' );
				endif;
				?>
			</div>

		</main>
	</div>
<?php endif; ?>

<?php
get_footer();
