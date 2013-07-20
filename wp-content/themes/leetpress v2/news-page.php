<?php

	/* Template Name: News/Blog Page */

	get_header(); 

?>

	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
	
		<!-- BEGIN MAIN -->
		<div id="main">
			
			<!-- BEGIN MEDIA WRAPPER -->
			<div id="media-wrapper">
			
				<h3 class="section-title"><?php the_title(); ?></h3>
				
				<?php
				$args = array( 'post_type' => 'post', 'paged'=>$paged );
				$loop = new WP_Query( $args );
				
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
					<?php include( TEMPLATEPATH . '/includes/show-posts.php' ); ?>
					
				<?php endwhile; ?>
				
			</div>
			<!-- END MEDIA WRAPPER -->
			
			<?php kriesi_pagination($loop->20); ?>
			
		</div>
		<!-- END MAIN -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>