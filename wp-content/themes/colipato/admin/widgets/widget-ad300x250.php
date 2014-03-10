<?php
/**
 * Plugin Name: News Widget
 */

add_action( 'widgets_init', 'lp_ad300_load_widgets' );

function lp_ad300_load_widgets() {
	register_widget( 'LP_Ad300_Widget' );
}

class LP_Ad300_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function LP_Ad300_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'lp_ad300_widget', 'description' => __('A widget that displays a banner (300x250px)', 'lp_ad300_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'lp_ad300_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'lp_ad300_widget', __('LeetPress: 300x250 banner', 'lp_ad300_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$banner_img = $instance['banner_img'];
		$banner_url = $instance['banner_url'];
		
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
			
			<div class="widget-banner">
									
				<a href="<?php echo $banner_url; ?>"><img src="<?php echo $banner_img; ?>" alt="" width="300" height="250" /></a>
								
			</div>
			
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
		$instance['banner_url'] = $new_instance['banner_url'];
		$instance['banner_img'] = $new_instance['banner_img'];

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __(''));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
		</p>

		<!-- Banner img -->
		<p>
			<label for="<?php echo $this->get_field_id( 'banner_img' ); ?>"><?php _e('Banner image url:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'banner_img' ); ?>" name="<?php echo $this->get_field_name( 'banner_img' ); ?>" value="<?php echo $instance['banner_img']; ?>" style="width:90%;" />
		</p>
		
		<!-- Banner img -->
		<p>
			<label for="<?php echo $this->get_field_id( 'banner_url' ); ?>"><?php _e('Banner link url:'); ?></label>
			<input id="<?php echo $this->get_field_id( 'banner_url' ); ?>" name="<?php echo $this->get_field_name( 'banner_url' ); ?>" value="<?php echo $instance['banner_url']; ?>" style="width:90%;" />
		</p>


	<?php
	}
}

?>