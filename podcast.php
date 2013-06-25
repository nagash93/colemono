<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */


/** Loads the WordPress Environment and Template */
require('../wp-blog-header.php');
  get_header(); ?>
	
	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
	
		<!-- BEGIN MAIN -->
		<div id="main">

			<?php 
			
				 query_posts("cat=268&showposts=-1");
				if (have_posts()) : while (have_posts()) : the_post() ?>
				
			<!-- BEGIN POST -->
			<div id="post">
							
		<?php include( TEMPLATEPATH . '/includes/show-posts.php' ); ?>
			</div>
			<!-- EMD POST -->
			<?php  endwhile; endif; ?>

		</div>
		<!-- END MAIN -->
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>