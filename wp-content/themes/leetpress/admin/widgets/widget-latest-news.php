<?php
/**
 * Plugin Name: News Widget
 */

add_action( 'widgets_init', 'lp_news_load_widgets' );

function lp_news_load_widgets() {
	register_widget( 'LP_News_Widget' );
}

class LP_News_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function LP_News_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'lp_news_widget', 'description' => __('A widget that displays your latest news', 'lp_news_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'lp_news_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'lp_news_widget', __('LeetPress: Latest News', 'lp_news_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];

		$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1);
		$loop = new WP_Query($query);
		if ($loop->have_posts()) :
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			
			<?php  while ($loop->have_posts()) : $loop->the_post(); ?>
			
			<div class="side-item">
									
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('news-thumb-small', array('class' => 'side-item-thumb')); ?></a><?php } ?>
				<h4><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
				<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></span>
								
			</div>
			
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<?php endif; ?>
			
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest News'), 'number' => __('5'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<!-- Number of posts -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />
		</p>


	<?php
	}
}

?>