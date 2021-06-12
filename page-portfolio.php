<?php

/**
 * Blog file
 *
 * @package Design-fly
 */

get_header();

?>

<div id="primary" class="content-area portfolio-content">
	<main id="main" class="site-main" role="main">
		<!--<div class="container-fluid">-->
			<div class="row main-title-row">
				<div class="col-4 offset-2 portfolio-title-col">
					<p class="title-phrase">DESIGN THE SOUL</p>
				</div>

				<div class="col-4 portfolio-title-col portfolio-buttons">
					<div class="button-area">
					<button type="button" id="ad-button">Advertising</button>
					<button type="button" id="mm-button">Multimedia</button>
					<button type="button" id="photo-button">Photography</button>
					</div>
				</div>
			</div>

			<div class="line"></div>

			<div class="row">
				<div class="col" id="display-ad"><?php df_ad(); ?></div>
				<div class="col" id="display-mm"><?php df_mm(); ?></div>
				<div class="col offset-2" id="display-photo">
					<?php
					$gallery = get_post_block_galleries_images( get_the_ID() );
					//print_r ($gallery);
					foreach ($gallery as $key => $value) {
						foreach ($value as $keys => $source) {
							?>
							<div class="image-container">
							<a href="#">
								<img class="photo-gallery" src="<?php echo $source; ?>" alt="">
								<div class="middle">
									<!--<div class="qwe">-->
									<img src="<?php echo get_template_directory_uri(). '/assets/src/library/images/favicon.ico'; ?>" alt="">
									<div class="text">View Image</div>
									<!--</div>-->
								</div>
							</a>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		<!--</div>-->


	</main>
</div>
<div class="zoom-photo">

	<div class="image-box">
		<div class="close-photo">
			<b class="close-x">X</b>
		</div>
		<?php
		foreach ($gallery as $key => $value) {
			foreach ($value as $keys => $source) {
		?>
		<div class="show-image">
			<!--<img class="final-image" src="http://Ketul.test/wp-content/uploads/2021/06/image-2-1.png" alt="">-->
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
		<!--<div class="close-photo">X</div>-->
	</div>

	<!--<div class="close-photo">X</div>-->
</div>
<?php

get_footer();
