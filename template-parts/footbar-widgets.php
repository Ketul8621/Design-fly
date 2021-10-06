<?php
/**
 * Footbar widgets
 *
 * @package Design-fly
 */

/**
 * Register the footbars for widgets.
 *
 * @return void
 */
function df_footbar_widgets() {
	register_sidebar(
		array(
			'name'          => 'Footer 1',
			'id'            => 'universal-search-field',
			'before_widget' => '<div class="chw-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="footer-1-title">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer 2',
			'id'            => 'universal-search-field-1',
			'before_widget' => '<div class="df-contact-us">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="contact-title">',
			'after_title'   => '</div>',
		)
	);
}
// Register df_footbar_widgets with widgets_init hook.
add_action( 'widgets_init', 'df_footbar_widgets' );

/**
 * Register Portfolio widget to display recent portfolio images.
 *
 * @return void
 */
class Display_Portfolio_Images extends WP_Widget {

	/**
	 * Register the widget with WordPress.
	 */
	public function __construct() {

		parent::__construct(
			'display_portfolio_images_widget',
			esc_html__( 'Display the recent 8 portfolio images', 'design-fly' ),
			array( 'description' => esc_html__( 'Display Portfolio Images', 'design-fly' ) )
		);
	}

	/**
	 * Frontend display of widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

			?>

			<div class="portfolio-line"></div>

			<?php
			$page = get_page_by_path( 'portfolio' );

			$gallery = get_post_block_galleries_images( $page->ID );
			$i = 0;
			foreach ( $gallery as $key => $value ) {
				?>
				<div class="eg-test">
					<?php
					foreach ( $value as $keys => $source ) {
						if ( $i == 8) {
							break;
						}
						?>

						<div class="widget-portfolio">
							<img src="<?php echo $source; ?>" alt="">
						</div>

						<?php
						$i = $i + 1;
					}
					?>
				</div>
				<?php
			}
		}

		echo $args['after_widget'];
	}

	/**
	 * Backend widget
	 *
	 * @param array $instance Previously saves values from database.
	 * @return void
	 */
	public function form( $instance ) {

		$title   = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html_e( 'Custom Text', 'design-fly' );
		$titleID = esc_attr( $this->get_field_ID( 'title' ) );
		?>

		<p>
			<label for="<?php echo $titleID; ?>">Title</label>
			<input type="text" id="<?php echo $titleID; ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values to be saved.
	 * @param array $old_instance Previously saves values from database.
	 * @return array Updated safe values.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance          = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

}

/**
 * Register custom widget Display_Portfolio_images to display the recent portfolio images.
 *
 * @return void
 */
function register_portfolio_widget() {
	register_widget( 'Display_Portfolio_images' );
}

// Register register_portfolio_widget using widgets_init hook.
add_action( 'widgets_init', 'register_portfolio_widget' );


/**
 * Count the number of views of a post.
 *
 * @param interger $postID The id of the post.
 * @return void
 */
function df_count_post_views( $postID ) {

	$meta_key = 'df_post_views';
	$views    = get_post_meta( $postID, $meta_key, true );
	$count    = ( empty( $views ) ? '0' : $views );
	$count++;

	update_post_meta( $postID, $meta_key, $count );
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


/**
 * Register Popular posts widget to display the popular posts.
 *
 * @return void
 */
class Display_Popular_Posts extends WP_Widget {

	/**
	 * Register the widget with WordPress
	 */
	public function __construct() {

		parent::__construct(
			'display_popular_posts_widget',
			esc_html__( 'Display the most popular posts', 'design-fly' ),
			array( 'description' => esc_html__( 'Display Popular Posts', 'design-fly' ), )
		);
	}

	/**
	 * Frontend display of widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$tot = absint( $instance['tot'] );

		$posts_arg = array(
			'post_type'      => 'post',
			'posts_per_page' => $tot,
			'meta_key'       => 'df_post_views',
			'orderby'        => 'meta_value_num',
			'order'          => 'DESC',
		);

		$post_query = new WP_Query( $posts_arg );

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

			?>
			<div class="portfolio-line"></div>

			<?php
			if ( $post_query->have_posts() ) :

				?>
				<div class="sidebar-most-viewed-posts">
					<?php
					while ( $post_query->have_posts() ) :
						$post_query->the_post();
						?>

						<div class="sidebar-popular-posts">
							<div class="popular-posts-images">
								<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_query->ID ) ); ?>
								<img src="<?php echo $thumbnail[0]; ?>" alt="">
							</div>

							<div class="popular-posts-info">
								<a href="<?php echo get_permalink(); ?>">
									<div class="popular-posts-title">
										<?php the_title(); ?>
									</div>
								</a>

								<p class="popular-posts-meta">
									by <a href="#"> <?php the_author(); ?></a> on <?php echo get_the_date( 'dM Y' ); ?>
								</p>
							</div>
						</div>

						<?php
					endwhile;
					?>
				</div>
				<?php
			endif;
			wp_reset_postdata();
			?>
			<?php
		}

		echo $args['after_widget'];
	}

	/**
	 * Backend widget
	 *
	 * @param array $instance Previously saves values from database.
	 * @return void
	 */
	public function form( $instance ) {

		$title    = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html_e( 'Popular Posts', 'design-fly' );
		$tot      = ( ! empty( $instance['tot'] ) ) ? absint( $instance['tot'] ) : 5;
		$title_id = esc_attr( $this->get_field_ID( 'title' ) );
		$tot_id   = esc_attr( $this->get_field_ID( 'tot' ) );
		?>

		<p>
			<label for="<?php echo $title_id; ?>">Title</label>
			<input type="text" id="<?php echo $title_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $tot_id; ?>">Total</label>
			<input type="number" id="<?php echo $tot_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'tot' ) ); ?>"
			value="<?php echo esc_attr( $tot ); ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values to be saved.
	 * @param array $old_instance Previously saves values from database.
	 * @return array Updated safe values.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance          = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['tot']   = ( ! empty( $new_instance['tot'] ) ) ? sanitize_text_field( absint( $new_instance['tot'] ) ) : '0';

		return $instance;
	}

}

/**
 * Register custom widget Display_Popular_Posts to display popular posts.
 *
 * @return void
 */
function register_popular_posts_widget() {
	register_widget( 'Display_Popular_Posts' );
}

// Register register_popular_posts_widget using widgets_init hook.
add_action( 'widgets_init', 'register_popular_posts_widget' );

/**
 * Register Latest Tweet widget to display the latest tweet.
 *
 * @return void
 */
class Display_Latest_Tweet extends WP_Widget {

	/**
	 * Register the widget with WordPress
	 */
	public function __construct() {

		parent::__construct(
			'display_latest_tweet',
			esc_html__( 'Display Latest Tweet', 'design-fly' ),
			array( 'description' => esc_html__( 'Display Latest Tweet', 'design-fly' ), )
		);
	}

	/**
	 * Frontend display of widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$link = $instance['link'];

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

			?>
			<div class="portfolio-line"></div>

			<a class="twitter-timeline" href="<?php echo $link; ?>" data-tweet-limit="1" data-width="270"></a>
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

			<?php

		}

		echo $args['after_widget'];
	}

	/**
	 * Backend widget
	 *
	 * @param array $instance Previously saves values from database.
	 * @return void
	 */
	public function form( $instance ) {

		$title    = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html_e( 'Latest Tweet', 'design-fly' );
		$link     = ( ! empty( $instance['link'] ) ) ? $instance['link'] : '';
		$title_id = esc_attr( $this->get_field_ID( 'title' ) );
		$link_id  = esc_attr( $this->get_field_ID( 'link' ) );
		?>

		<p>
			<label for="<?php echo $title_id; ?>">Title</label>
			<input type="text" id="<?php echo $title_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $link_id; ?>">Link</label>
			<input type="url" id="<?php echo $link_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>"
			value="<?php echo esc_attr( $link ); ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values to be saved.
	 * @param array $old_instance Previously saves values from database.
	 * @return array Updated safe values.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance          = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['link']  = ( ! empty( $new_instance['link'] ) ) ? sanitize_text_field( $new_instance['link'] ) : '0';

		return $instance;
	}

}

/**
 * Register custom widget Display_Latest_Tweet
 *
 * @return void
 */
function register_latest_tweet_widget() {
	register_widget( 'Display_Latest_Tweet' );
}

// Register register_latest_tweet_widget using widgets_init hook.
add_action( 'widgets_init', 'register_latest_tweet_widget' );

/**
 * Register Facebook widget to display the FB page.
 *
 * @return void
 */
class Display_FB_Page extends WP_Widget {

	/**
	 * Register the widget with WordPress
	 */
	public function __construct() {

		parent::__construct(
			'display_fb_page',
			esc_html__( 'Display Facebook Page', 'design-fly' ),
			array( 'description' => esc_html__( 'Display Facebook Page', 'design-fly' ), )
		);
	}

	/**
	 * Frontend display of widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$link = $instance['link'];

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

			?>
			<div class="portfolio-line"></div>

			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/gu_IN/sdk.js#xfbml=1&version=v11.0" nonce="NeH8hnzP"></script>

			<div class="fb-page" data-href="<?php echo $link; ?>" data-tabs="timeline" data-width="270" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
				<blockquote cite="https://www.facebook.com/rtCamp.solutions" class="fb-xfbml-parse-ignore">
					<a href="https://www.facebook.com/rtCamp.solutions">rtCamp</a>
				</blockquote>
			</div>
			<?php

		}

		echo $args['after_widget'];
	}

	/**
	 * Backend widget
	 *
	 * @param array $instance Previously saves values from database.
	 * @return void
	 */
	public function form( $instance ) {

		$title    = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html_e( 'Popular Posts', 'design-fly' );
		$link     = ( ! empty( $instance['link'] ) ) ? $instance['link'] : '';
		$title_id = esc_attr( $this->get_field_ID( 'title' ) );
		$link_id  = esc_attr( $this->get_field_ID( 'link' ) );
		?>

		<p>
			<label for="<?php echo $title_id; ?>">Title</label>
			<input type="text" id="<?php echo $title_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $link_id; ?>">Link</label>
			<input type="url" id="<?php echo $link_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>"
			value="<?php echo esc_attr( $link ); ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values to be saved.
	 * @param array $old_instance Previously saves values from database.
	 * @return array Updated safe values.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance          = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['link']  = ( ! empty( $new_instance['link'] ) ) ? sanitize_text_field( $new_instance['link'] ) : '0';

		return $instance;
	}

}

/**
 * Register custom widget Display_FB_Page
 *
 * @return void
 */
function register_fb_page_widget() {
	register_widget( 'Display_FB_Page' );
}

// Register register_fb_page_widget using widgets_init hook.
add_action( 'widgets_init', 'register_fb_page_widget' );

/**
 * Register Monthly archive widget to display the archived posts accroding to months.
 *
 * @return void
 */
class Display_Monthly_Archive extends WP_Widget {

	/**
	 * Register the widget with WordPress
	 */
	public function __construct() {

		parent::__construct(
			'display_monthly_archive',
			esc_html__( 'Display Monthly Archive', 'design-fly' ),
			array( 'description' => esc_html__( 'Display Monthly Archive', 'design-fly' ), )
		);
	}

	/**
	 * Frontend display of widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$df_month = $instance['df_month'];
		$count    = $instance['df_count'];

		$df_date = explode( '-', $df_month );
		$year    = $df_date[0];
		$month   = $df_date[1];

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

			?>
			<div class="portfolio-line"></div>

			<div class="date-archive">
				<?php
				$arg = array(
					'type' => 'monthly',
					'limit' => $count,
					'order' => 'ASC',
					'year' => $year,
					'monthnum' => $month,
				);
				wp_get_archives( $arg );
				?>
			</div>
			<?php

		}

		echo $args['after_widget'];
	}

	/**
	 * Backend widget
	 *
	 * @param array $instance Previously saves values from database.
	 * @return void
	 */
	public function form( $instance ) {

		$title       = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html_e( 'Monthly Archive', 'design-fly' );
		$df_month    = ( ! empty( $instance['df_month'] ) ) ? $instance['df_month'] : '';
		$df_count    = ( ! empty( $instance['df_count'] ) ) ? absint( $instance['df_count'] ) : 2;
		$title_id    = esc_attr( $this->get_field_ID( 'title' ) );
		$df_month_id = esc_attr( $this->get_field_ID( 'df_month' ) );
		$df_count_id = esc_attr( $this->get_field_ID( 'df_count' ) );
		?>

		<p>
			<label for="<?php echo $title_id; ?>">Title</label>
			<input type="text" id="<?php echo $title_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $df_month_id; ?>">Month</label>
			<input type="month" id="<?php echo $df_month_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'df_month' ) ); ?>"
			value="<?php echo esc_attr( $df_month ); ?>" />
		</p>

		<p>
			<label for="<?php echo $df_count_id; ?>">Count</label>
			<input type="number" id="<?php echo $df_count_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'df_count' ) ); ?>"
			value="<?php echo esc_attr( $df_count ); ?>" />
		</p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values to be saved.
	 * @param array $old_instance Previously saves values from database.
	 * @return array Updated safe values.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance             = $old_instance;
		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['df_month'] = ( ! empty( $new_instance['df_month'] ) ) ? sanitize_text_field( $new_instance['df_month'] ) : '';
		$instance['df_count'] = ( ! empty( $new_instance['df_count'] ) ) ? sanitize_text_field( absint( $new_instance['df_count'] ) ) : '0';
		return $instance;
	}

}

/**
 * Register custom widget Display_Monthly_Archive
 *
 * @return void
 */
function register_monthly_archive_widget() {
	register_widget( 'Display_Monthly_Archive' );
}

// Register register_monthly_archive_widget using widgets_init hook.
add_action( 'widgets_init', 'register_monthly_archive_widget' );

/**
 * Register Recent Posts widget to display the recent posts.
 *
 * @return void
 */
class Display_Recent_Posts extends WP_Widget {

	/**
	 * Register the widget with WordPress
	 */
	public function __construct() {

		parent::__construct(
			'display_recent_posts_widget',
			esc_html__( 'Display the most Recent posts', 'design-fly' ),
			array( 'description' => esc_html__( 'Display Recent Posts', 'design-fly' ), )
		);
	}

	/**
	 * Frontend display of widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$tot = absint( $instance['tot'] );

		$posts_arg = array(
			'post_type'     => 'post',
			'posts_per_page' => $tot,
		);

		$post_query = new WP_Query( $posts_arg );

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];

			?>
			<div class="portfolio-line"></div>

			<?php
			if ( $post_query->have_posts() ) :

				?>
				<div class="sidebar-most-viewed-posts">
					<?php

					while ( $post_query->have_posts() ) :
						$post_query->the_post();
						?>

						<div class="sidebar-popular-posts">
							<div class="popular-posts-images">
								<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post_query->ID ) ); ?>
								<img src="<?php echo $thumbnail[0]; ?>" alt="">
							</div>

							<div class="popular-posts-info">
								<a href="<?php echo get_permalink(); ?>">
									<div class="popular-posts-title">
										<?php the_title(); ?>
									</div>
								</a>

								<p class="popular-posts-meta">
									by <a href="#"> <?php the_author(); ?></a> on <?php echo get_the_date( 'dM Y' ); ?>
								</p>
							</div>
						</div>

						<?php
					endwhile;
					?>
				</div>
				<?php
			endif;
			wp_reset_postdata();
			?>
			<?php
		}

		echo $args['after_widget'];
	}

	/**
	 * Backend widget
	 *
	 * @param array $instance Previously saves values from database.
	 * @return void
	 */
	public function form( $instance ) {

		$title    = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html_e( 'Recent Posts', 'design-fly' );
		$tot      = ( ! empty( $instance['tot'] ) ) ? absint( $instance['tot'] ) : 5;
		$title_id = esc_attr( $this->get_field_ID( 'title' ) );
		$tot_id   = esc_attr( $this->get_field_ID( 'tot' ) );
		?>

		<p>
			<label for="<?php echo $title_id; ?>">Title</label>
			<input type="text" id="<?php echo $title_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $tot_id; ?>">Total</label>
			<input type="number" id="<?php echo $tot_id; ?>" name="<?php echo esc_attr( $this->get_field_name( 'tot' ) ); ?>"
			value="<?php echo esc_attr( $tot ); ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values to be saved.
	 * @param array $old_instance Previously saves values from database.
	 * @return array Updated safe values.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance          = $old_instance;
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['tot']   = ( ! empty( $new_instance['tot'] ) ) ? sanitize_text_field( absint( $new_instance['tot'] ) ) : '0';

		return $instance;
	}

}

/**
 * Register custom widget Display_Recent_Posts
 *
 * @return void
 */
function register_recent_posts_widget() {
	register_widget( 'Display_Recent_Posts' );
}

// Register register_recent_posts_widget using widgets_init hook.
add_action( 'widgets_init', 'register_recent_posts_widget' );
