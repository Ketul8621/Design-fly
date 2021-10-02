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

				$page_portfolio = get_page_by_path('portfolio');
				$gallery        = get_post_block_galleries_images( $page_portfolio->ID );

				foreach ( $gallery as $key => $value ) {
					$current          = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$per_page_gallery = 15;
					$offset           = ( $current - 1 ) * $per_page_gallery;
					$big              = 999999999;
					$total            = count( $value );
					$total_pages      = round( $total / $per_page_gallery );
					if ( $total_pages < ( $total / $per_page_gallery ) ) {
						$total_pages = $total_pages + 1;
					}

					$counter = 0;
					$pos     = 0;

					foreach ( $value as $keys => $source ) {
						$pos++;

						if ( ( $counter < $per_page_gallery ) && ( $pos > $offset ) ) {
							$counter++;
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

					$args = array(
						'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format'    => '?paged=%#%',
						'current'   => $current,
						'total'     => $total_pages,
						'prev_next' => true,
						'show_all'  => false,
						'prev_text' => __( '<span class="dashicons dashicons-arrow-left"></span>' ),
						'next_text' => __( '<span class="dashicons dashicons-arrow-right"></span>' ),
					);

					?>
					<div class="blog-pagination gallery-pagination">
						<?php
						echo paginate_links( $args );
						?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
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
