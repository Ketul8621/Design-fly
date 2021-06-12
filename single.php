<?php
/**
 * Single post file
 *
 * @package Design-fly
 */

echo get_the_author();
get_header();
?>

<?php if( have_posts() ): the_post(); ?>
<div id="single-page" class="single-class" >
	<main id="main-single" class="site-main" role="main">
		<div class="blog-body">

			<!--<div class="title-part">
				<div class="blog-title-col">
					<p class="title-phrase">LET'S BLOG</p>
				</div>
			</div>-->

			<div class="row">
				<div class="col-12 blog-column">
					<p class="single-blog-title"><?php the_title(); ?></p>
					<div class="meta-info-box">
						<div class="author-date">by <a href="#"> <?php the_author(); ?></a> on <?php echo get_the_date( "d M Y" ); ?></div>
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

		</div>

	</main>
</div>
<?php endif; ?>

<?php
get_footer();
