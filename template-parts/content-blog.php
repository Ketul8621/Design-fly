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

		<!--<div class="date-customize"> <span class="day-publish">30</span><br>MAY</div>-->
		<div class="date-customize"><span class="day-publish">30</span><br><span class="month-publish">MAY</span></div>
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
				by <a href="#"> <?php the_author(); ?></a> on <?php echo get_the_date( 'dM Y' ); ?>
			</p>
			<div class="blog-content-line"></div>
			<div class="post-content"><?php the_content(); ?></div>
		</div>
	</div>

</div>

<?php
	//the_posts_pagination();
?>

<!--<div class="row">
	<div class="col-5 blog-title-col">
		<p class="title-phrase">LET'S BLOG</p>
	</div>
</div>-->
