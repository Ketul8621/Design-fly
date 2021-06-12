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
		</div>

		<div class="col-4 footer-col-1">
			<?php
			if ( is_active_sidebar( 'universal-search-field-1' ) ) :
				dynamic_sidebar( 'universal-search-field-1' );
			endif;
			?>
		</div>
	</div>

	<!--<div>displaying...</div>-->
</footer>

<?php wp_footer(); ?>
<!--</div>-->
</body>
</html>
