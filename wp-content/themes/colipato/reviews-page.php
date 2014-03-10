<?php

	/* Template Name: Reviews Page */

	get_header(); 

?>

	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
	
		<!-- BEGIN MAIN -->
		<div id="main">
			
			<!-- BEGIN REVIEW ARCHIVE -->
			<div id="review-archive">
			
				<h3 class="section-title">Latest Reviews</h3>
				
				<?php
				$args = array( 'post_type' => 'reviews', 'paged'=>$paged );
				$loop = new WP_Query( $args );
				$i = 1;
				
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
					<?php include( TEMPLATEPATH . '/includes/show-reviews.php' ); ?>
					
				<?php endwhile; ?>
				
			</div>
			<?php kriesi_pagination($loop->max_num_pages); ?>
			
		</div>
		<!-- END MAIN -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>