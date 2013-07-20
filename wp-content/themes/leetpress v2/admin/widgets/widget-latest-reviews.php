<?php
/**
 * Plugin Name: Reviews Widget
 */

add_action( 'widgets_init', 'lp_reviews_load_widgets' );

function lp_reviews_load_widgets() {
	register_widget( 'LP_Reviews_Widget' );
}

class LP_Reviews_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function LP_Reviews_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'lp_reviews_widget', 'description' => __('A widget that displays your latest reviews', 'lp_reviews_widget') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'lp_reviews_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'lp_reviews_widget', __('LeetPress: Latest Reviews', 'lp_reviews_widget'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];
		$cat1 = $instance['cat1'];
		$cat2 = $instance['cat2'];
		$cat3 = $instance['cat3'];
		$cat4 = $instance['cat4'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo '<h4 class="widget-title tabs">' . $title . '</h4>';

		?>
			<div class="panel-wrapper">
				<a href="#panel-1" rel="panel" class="selected">All</a>
				<?php if($instance['cat1']) { ?><a href="#panel-2" rel="panel"><?php echo $instance['cat1']; ?></a><?php } ?>
				<?php if($instance['cat2']) { ?><a href="#panel-3" rel="panel"><?php echo $instance['cat2']; ?></a><?php } ?>
				<?php if($instance['cat3']) { ?><a href="#panel-4" rel="panel"><?php echo $instance['cat3']; ?></a><?php } ?>
				<?php if($instance['cat4']) { ?><a href="#panel-5" rel="panel"><?php echo $instance['cat4']; ?></a><?php } ?>
			</div>
			
			<div id="mask">
			
				<div id="panel">
					
					<div id="panel-1">
			
					<?php
					
					/** Get all reviews **/
					
					$query = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'post_type' => 'reviews');
					$loop = new WP_Query($query);
					if ($loop->have_posts()) :
						
					?>
						
					<?php  while ($loop->have_posts()) : $loop->the_post(); ?>
						
						<div class="side-item">
										
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('review-thumb-small', array('class' => 'side-item-thumb')); ?></a><?php } ?>
							<h4 class="side-review-heading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<span class="side-item-cat"><?php echo get_the_term_list( $post->ID, 'review_category', '',', ' ) ?></span>
							<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></span>
							<div class="side-score <?php $send_rate = get_post_meta(get_the_id(), "leetpress_overallscore", true); rating_color($send_rate); ?>"><?php echo get_post_meta(get_the_id(), "leetpress_overallscore", true); ?></div>
											
						</div>
						
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
						<?php endif; ?>
			
					</div>
					
					<?php if($instance['cat1']) { ?>
					<div id="panel-2">
					
					<?php
					
					/** Get reviews from cat1 **/
						
					$query2 = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'post_type' => 'reviews', 'review_category' => $instance['cat1']);
					$loop2 = new WP_Query($query2);
					if ($loop2->have_posts()) :
						
					?>
						
					<?php  while ($loop2->have_posts()) : $loop2->the_post(); ?>
							
						<div class="side-item">
										
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('review-thumb-small', array('class' => 'side-item-thumb')); ?></a><?php } ?>
							<h4 class="side-review-heading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<span class="side-item-cat"><?php echo get_the_term_list( $post->ID, 'review_category', '',', ' ) ?></span>
							<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></span>
							<div class="side-score <?php $send_rate = get_post_meta(get_the_id(), "leetpress_overallscore", true); rating_color($send_rate); ?>"><?php echo get_post_meta(get_the_id(), "leetpress_overallscore", true); ?></div>
											
						</div>
					
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
					<?php endif; ?>
					
					</div>
					<?php } ?>
					
					<?php if($instance['cat2']) { ?>
					<div id="panel-3">
					
					<?php
						
					/** Get reviews from cat2 **/
					
					$query3 = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'post_type' => 'reviews', 'review_category' => $instance['cat2']);
					$loop3 = new WP_Query($query3);
					if ($loop3->have_posts()) :
						
					?>
						
					<?php  while ($loop3->have_posts()) : $loop3->the_post(); ?>
							
						<div class="side-item">
										
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('review-thumb-small', array('class' => 'side-item-thumb')); ?></a><?php } ?>
							<h4 class="side-review-heading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<span class="side-item-cat"><?php echo get_the_term_list( $post->ID, 'review_category', '',', ' ) ?></span>
							<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></span>
							<div class="side-score <?php $send_rate = get_post_meta(get_the_id(), "leetpress_overallscore", true); rating_color($send_rate); ?>"><?php echo get_post_meta(get_the_id(), "leetpress_overallscore", true); ?></div>
											
						</div>
					
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
					<?php endif; ?>
					
					</div>
					<?php } ?>
					
					<?php if($instance['cat3']) { ?>
					<div id="panel-4">
					
					<?php
						
					/** Get reviews from cat3 **/
					
					$query4 = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'post_type' => 'reviews', 'review_category' => $instance['cat3']);
					$loop4 = new WP_Query($query4);
					if ($loop4->have_posts()) :
						
					?>
						
					<?php  while ($loop4->have_posts()) : $loop4->the_post(); ?>
							
						<div class="side-item">
										
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('review-thumb-small', array('class' => 'side-item-thumb')); ?></a><?php } ?>
							<h4 class="side-review-heading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<span class="side-item-cat"><?php echo get_the_term_list( $post->ID, 'review_category', '',', ' ) ?></span>
							<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></span>
							<div class="side-score <?php $send_rate = get_post_meta(get_the_id(), "leetpress_overallscore", true); rating_color($send_rate); ?>"><?php echo get_post_meta(get_the_id(), "leetpress_overallscore", true); ?></div>
											
						</div>
					
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
					<?php endif; ?>
					
					</div>
					<?php } ?>
					
					<?php if($instance['cat4']) { ?>
					<div id="panel-5">
					
					<?php
						
					/** Get reviews from cat4 **/
					
					$query5 = array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'post_type' => 'reviews', 'review_category' => $instance["cat4"] );
					$loop5 = new WP_Query($query5);
					if ($loop5->have_posts()) :
						
					?>
						
					<?php  while ($loop5->have_posts()) : $loop5->the_post(); ?>
							
						<div class="side-item">
										
							<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('review-thumb-small', array('class' => 'side-item-thumb')); ?></a><?php } ?>
							<h4 class="side-review-heading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<span class="side-item-cat"><?php echo get_the_term_list( $post->ID, 'review_category', '',', ' ) ?></span>
							<span class="side-item-meta"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></span>
							<div class="side-score <?php $send_rate = get_post_meta(get_the_id(), "leetpress_overallscore", true); rating_color($send_rate); ?>"><?php echo get_post_meta(get_the_id(), "leetpress_overallscore", true); ?></div>
											
						</div>
					
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
					<?php endif; ?>
					
					</div>
					<?php } ?>
					
				</div>
				
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
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['cat1'] = strip_tags( $new_instance['cat1'] );
		$instance['cat2'] = strip_tags( $new_instance['cat2'] );
		$instance['cat3'] = strip_tags( $new_instance['cat3'] );
		$instance['cat4'] = strip_tags( $new_instance['cat4'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Latest Reviews'), 'number' => __('5'));
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
		
		<!-- Category 1 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cat1' ); ?>"><?php _e('Tab 1:'); ?></label>
			<?php $tax_terms = get_terms('review_category'); ?>
			<select id="<?php echo $this->get_field_id( 'cat1' ); ?>" name="<?php echo $this->get_field_name( 'cat1' ); ?>">
				<option selected="selected"><?php echo $instance['cat1']; ?></option>
			<?php foreach ($tax_terms as $tax_term) { ?>
				<option><?php echo $tax_term->name; ?></option>
			<?php } ?>
			</select>
		</p>
		
		<!-- Category 2 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cat2' ); ?>"><?php _e('Tab 2:'); ?></label>
			<?php $tax_terms = get_terms('review_category'); ?>
			<select id="<?php echo $this->get_field_id( 'cat2' ); ?>" name="<?php echo $this->get_field_name( 'cat2' ); ?>">
				<option selected="selected"><?php echo $instance['cat2']; ?></option>
			<?php foreach ($tax_terms as $tax_term) { ?>
				<option><?php echo $tax_term->name; ?></option>
			<?php } ?>
			</select>
		</p>
		
		<!-- Category 3 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cat3' ); ?>"><?php _e('Tab 3:'); ?></label>
			<?php $tax_terms = get_terms('review_category'); ?>
			<select id="<?php echo $this->get_field_id( 'cat3' ); ?>" name="<?php echo $this->get_field_name( 'cat3' ); ?>">
				<option selected="selected"><?php echo $instance['cat3']; ?></option>
			<?php foreach ($tax_terms as $tax_term) { ?>
				<option><?php echo $tax_term->name; ?></option>
			<?php } ?>
			</select>
		</p>
		
		<!-- Category 4 -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cat4' ); ?>"><?php _e('Tab 4:'); ?></label>
			<?php $tax_terms = get_terms('review_category'); ?>
			<select id="<?php echo $this->get_field_id( 'cat4' ); ?>" name="<?php echo $this->get_field_name( 'cat4' ); ?>">
				<option selected="selected"><?php echo $instance['cat4']; ?></option>
			<?php foreach ($tax_terms as $tax_term) { ?>
				<option><?php echo $tax_term->name; ?></option>
			<?php } ?>
			</select>
		</p>


	<?php
	}
}

?>