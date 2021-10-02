<?php

/**
 * Main template file
 *
 * @package Design-fly
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if ( is_home() ) : ?>
		<div class="row main-title-row">
			<div class="col-8 offset-2 main-title-col">
				<div class="title-phrase box-height">
					<p class="">D'SIGN THE SOUL</p>
				</div>

				<div class="view-all">
					<a href="https://ketul.test/?page_id=126&photography_id=13" class="">view all</a>
				</div>
			</div>
		</div>

		<div class="line"></div>

		<div class="row">
			<div class="col offset-2" id="home-display-photo">
				<?php
				$page_path = get_page_by_path( 'portfolio' );
				$gallery   = get_post_block_galleries_images( $page_path->ID );

				foreach ( $gallery as $key => $value ) {
					$i = 0;
					foreach ( $value as $keys => $source ) {
						$i++;
						if ( $i < 7 ) {
							?>
							<div class="image-container">
								<a href="#">
									<img class="photo-gallery" src="<?php echo $source; ?>" alt="">
									<div class="middle">
										<img src="<?php echo get_template_directory_uri() . '/assets/src/library/images/favicon.ico'; ?>" alt="">
										<div class="text">View Image</div>
									</div>
								</a>
							</div>
							<?php
						}
					}
				}
				?>
			</div>
		</div>
		<?php endif; ?>
	</main>
</div>


<div class="zoom-photo">
	<div class="image-box">
		<div class="close-photo">
			<b class="close-x">X</b>
		</div>

		<?php
		foreach ( $gallery as $key => $value ) {
			foreach ( $value as $keys => $source ) {
				?>
				<div class="show-image">
					<img class="final-image" src="<?php echo $source; ?>" alt="">
				</div>

				<div class="caption-part">
					<div class="prev-image"><-</div>
					<div class="captions">Lorem ipsum dolor sit amet</div>
					<div class="next-image">-></div>
				</div>

				<?php
			}
		}
		?>
	</div>
</div>
<?php

get_footer();
