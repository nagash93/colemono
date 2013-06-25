<?php get_header(); ?>

	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
	
	<?php if(is_category('E3 2013')){  echo  '<img src="http://colemono.com/imagenes/horarios.png" style="margin-bottom: 20px;"/>';}?>
		<!-- BEGIN MAIN -->
		<div id="main">
		
			<div id="archive-wrapper">

	<?php if (have_posts()) : ?>
	
	<?php /* Get author data */
	if(get_query_var('author_name')) :
	$curauth = get_userdatabylogin(get_query_var('author_name'));
	else :
	$curauth = get_userdata(get_query_var('author'));
	endif;
	?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
	<h3 class="section-title">Category: &nbsp;<?php single_cat_title(); ?></h3>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
	<h3 class="section-title">Tagged: &nbsp;<?php single_tag_title(); ?></h3>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	<h3 class="section-title">Archive: &nbsp;<?php the_time('F jS, Y'); ?></h3>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h3 class="section-title">Archive: &nbsp;<?php the_time('F, Y'); ?></h3>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h3 class="section-title">Archive: &nbsp;<?php the_time('Y'); ?></h3>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	<h3 class="section-title">All Posts by: <?php echo $curauth->display_name; ?></h3>
	
	<?php } ?>
	

	<?php $i = 1; ?>
	
	<?php while (have_posts()) : the_post(); ?>
	
		<?php
		
			if ( get_post_type() == 'reviews' ) : ?>
			
				<?php include( TEMPLATEPATH . '/includes/show-reviews-frontpage.php' ); ?>
				
			<?php elseif ( get_post_type() == 'videos' ) : ?>
			
				<?php include( TEMPLATEPATH . '/includes/show-videos-frontpage.php' ); ?>
				
			<?php elseif ( get_post_type() == 'screenshots' ) : ?>
			
				<?php include( TEMPLATEPATH . '/includes/show-screenshots-frontpage.php' ); ?>
			
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
