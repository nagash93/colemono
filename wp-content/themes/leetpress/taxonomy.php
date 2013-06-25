<?php get_header(); ?>

	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
	
		<!-- BEGIN MAIN -->
		<div id="main">
		
			<div id="archive-wrapper">

	<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a review archive */ if (is_tax('review_category')) { ?>
	<h3 class="section-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?> Reviews</h3>
	<?php /* If this is a video archive */ } elseif (is_tax('video_category')) { ?>
	<h3 class="section-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?> Videos</h3>
	<?php /* If this is a video archive */ } elseif (is_tax('screenshots_category')) { ?>
	<h3 class="section-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?> Screenshots</h3>
	<?php } ?>

	<?php $i = 1; ?>
	
	<?php while (have_posts()) : the_post(); ?>
	
		<?php
		
			if ( get_post_type() == 'reviews' ) : ?>
			
				<?php include( TEMPLATEPATH . '/includes/show-reviews.php' ); ?>
				
			<?php elseif ( get_post_type() == 'videos' ) : ?>
			
				<?php include( TEMPLATEPATH . '/includes/show-videos.php' ); ?>
				
			<?php elseif ( get_post_type() == 'screenshots' ) : ?>
			
				<?php include( TEMPLATEPATH . '/includes/show-screenshots.php' ); ?>
			
			<?php else:	?>
			
				<?php include( TEMPLATEPATH . '/includes/show-posts.php' ); ?>
			
			<?php endif; ?>

	<?php endwhile; ?>
	
			</div>
	
			<div class="pagination-fix"></div>
			<?php kriesi_pagination(); ?>

	<?php else :
	
		if ( is_category() ) { // If this is a category archive
				printf(__('<h3 class="section-title">No posts in the %s category yet</h3></div>'), single_cat_title('',false));
		} else {
			echo(__('<h3 class="section-title">No posts found</h3></div>'));
		}
	
	endif; ?>

		</div>
		<!-- END MAIN -->
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>
