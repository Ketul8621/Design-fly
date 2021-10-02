<?php
/**
 * Theme header file
 *
 * @package Design-fly
 */

?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php

// Check if the function exists for the backward compatibility.
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

	<div id="top-header" class="container-fluid">
		<header class="header-container">
			<div class="nav-container nav-container-df">
				<div class="df-logo">
					<?php
					if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					}
					?>
				</div>

				<nav class="navbar navbar-default navbar-df">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'Header_menu',
							'container'      => false,
							'menu_class'     => 'nav navbar-nav df-nav',
						)
					);
					?>
				</nav>

				<div class="search">
					<form action="#">
						<input type="text" name="search">
						<button><img src="<?php echo get_template_directory_uri() . '/assets/src/library/images/search-icon.png'; ?>" alt="s"></button>
					</form>
				</div>
			</div>
			<?php if ( is_home() ) : ?>
				<div id="carousel1" class="carousel carousel-dark slide df-carousal" data-bs-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active df" data-bs-interval="10000">
							<img src="<?php echo get_template_directory_uri() . '/assets/src/library/images/home/slider-image.png'; ?>" class="d-block w-100" alt="...">

							<div class="carousel-caption d-none d-md-block">
								<p class="df-heading">Gearing up the ideas</p>
								<p class="df-one-liner">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
							</div>
						</div>
					</div>
					<!--<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>-->
				</div>
			<?php endif; ?>
		</header>

		<div class="row feature-section">
			<div class="col-2 offset-2 feature">
				<div class="ad">
					<img src="<?php echo get_template_directory_uri() . '/assets/src/library/images/home/ad-icon.png'; ?>" alt="">
				</div>

				<div class="feature-text">
					<a class="adver-area" href="https://ketul.test/?page_id=126&advertisement_id=11">Advertisement</a>
					<p>Neque porro quisquam est, dolorem ipsum quia dolor sit amet</p>
				</div>
			</div>

			<div class="col-2 feature-multi multi">
				<div class="ad">
					<img src="<?php echo get_template_directory_uri() . '/assets/src/library/images/home/multimedia-icon.png'; ?>" alt="">
				</div>

				<div class="feature-text">
					<a href="https://ketul.test/?page_id=126&multimedia_id=12">Multimedia</a>
					<p>Neque porro quisquam est, dolorem ipsum quia dolor sit amet</p>
				</div>
			</div>

			<div class="col-2 feature-multi phtograph">
				<div class="ad">
					<img src="<?php echo get_template_directory_uri() . '/assets/src/library/images/home/photography-icon.png'; ?>" alt="">
				</div>

				<div class="feature-text">
					<a href="https://ketul.test/?page_id=126&photography_id=13">Photography</a>
					<p>Neque porro quisquam est, dolorem ipsum quia dolor sit amet</p>
				</div>
			</div>
		</div>
	</div>


	<?php
