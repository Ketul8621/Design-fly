<?php

/**
 * Theme footer file
 *
 * @package Design-fly
 */

?>

<footer>
	<div class="line"></div>
	<div class="row footer-row">
		<div class="col-4 offset-2 footer-col">
			<?php
			if ( is_active_sidebar( 'universal-search-field' ) ) :
				dynamic_sidebar( 'universal-search-field' );
			endif;
			?>

			<div class="about">
				<a href="">Read more</a>
			</div>
		</div>

		<div class="col-4 footer-col-1">
			<?php
			if ( is_active_sidebar( 'universal-search-field-1' ) ) :
				dynamic_sidebar( 'universal-search-field-1' );
			endif;
			?>
		</div>
	</div>

	<div class="line"></div>

	<div class="copy-right">
		c 2012 - Designfly | Designed by <a href="">rt-camp</a>
	</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
