<?php

/**
 * Blog file
 *
 * @package Design-fly
 */

?>

<div class="row blog-row">
	<a href="<?php echo get_permalink(); ?>">
		<div class="col blog-post-col">
			<div class="date-customize"><span class="day-publish"><?php echo get_the_date( 'd' ); ?></span><br><span class="month-publish"><?php echo strtoupper( get_the_date( 'M' ) ); ?></span></div>
			<div class="title-customize"><?php the_title(); ?></div>
		</div>
	</a>
</div>

<div class="row blog-content-row">
	<div class="col blog-content-col">
		<div class="blog-content-image">
			<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) ); ?>
			<img src="<?php echo $thumbnail[0]; ?>" alt="">
		</div>

		<div class="blog-content-content">
			<p class="blog-content-meta">
				by <?php the_author_posts_link(); ?> on <?php echo get_the_date( 'dM Y' ); ?>
			</p>
			<div class="blog-content-line"></div>
			<div class="post-content">
				<?php
				df_excerpt_trim( 210 );
				echo '<br>';
				echo df_excerpt_more();
				?>
			</div>
		</div>
	</div>

</div>
