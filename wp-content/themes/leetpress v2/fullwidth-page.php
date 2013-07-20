<?php

	/* Template Name: Full Width Page */

	get_header(); 

?>
	
	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<!-- BEGIN POST -->
			<div id="post">
			
				<h3 class="section-title"><?php the_title(); ?></h3>
				
				<div class="post-entry">
				
					<?php the_content(); ?>
					<?php wp_link_pages('before=<span class="page-links"><strong>Pages:</strong> &after=</span>'); ?>
					
				</div>
			
			</div>
			<!-- EMD POST -->
			<?php endwhile; endif; ?>
		
	</div>
	<!-- END MAIN WRAPPER -->
	
<?php get_footer(); ?>