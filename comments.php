<?php

/**
 * Comments file
 *
 * @package Design-fly
 */

?>

<div id="comments" class="comments-area">

	<?php
		if ( have_comments() ):
	?>

	<ol class="comment-list">
		<?php
			$args = array(
				'max_depth'         => 3,
				'style'             => 'ol',
				'type'              => 'all',
				'reply_text'        => 'reply',
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 32,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5',
				'echo'              => true,

			);

			wp_list_comments( $args );
		?>
	</ol>

	<div class="comment-line"></div>

	<?php
		if ( !comments_open() && get_comments_number() ):
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed', 'design-fly' ); ?></p>
	<?php
		endif;
	?>

	<?php
		endif;
	?>

	<?php

		//$fields = array(
		//	'author' => '<p class="comment-form-author"><br /><input id="author" name="author" aria-required="true" "></input></p>',
		//	'email' => '<p class="comment-form-email"><br /><input id="email" name="email" "></input></p>',
		//	'url' => '<p class="comment-form-url"><br /><input id="url" name="url" "></input></p>',
		//);

		$fields = array(
			'author' => '<div class="comment-fields"><div class="author-field"><label for="author">Name</label><br /><input id="author" name="author" aria-required="true" "></input></div>',
			'email' => '<div class="email-field"><label for="email">Email</label><br /><input id="email" name="email" "></input></div>',
			'url' => '<div class="url-field"><label for="url">URL</label><br /><input id="url" name="url" "></input></div></div>',
		);

		$arg = array(
			'title_reply' => 'Post your comment',
			'label_submit' => __('Submit'),
			'comment_notes_before' => '',
			'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" "></textarea></p>',
			'fields' => apply_filters( 'commet_form_default_fields', $fields ),
		);
		comment_form( $arg );

	?>
</div>
