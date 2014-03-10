<?php

	/* Template Name: Videos Page */

	get_header(); 

?>

	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
	
		<!-- BEGIN MAIN -->
		<div id="main">
			
			<!-- BEGIN MEDIA WRAPPER -->
			<div id="media-wrapper">
			
				<h3 class="section-title">Latest Videos</h3>
				
				<?php
				$args = array( 'post_type' => 'videos', 'paged'=>$paged );
				$loop = new WP_Query( $args );
				$i = 1;
				
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
					<?php include( TEMPLATEPATH . '/includes/show-videos.php' ); ?>
					
				<?php endwhile; ?>
				
			</div>
			<!-- END MEDIA WRAPPER -->
			
			<?php kriesi_pagination($loop->max_num_pages); ?>
			
		</div>
		<!-- END MAIN -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>