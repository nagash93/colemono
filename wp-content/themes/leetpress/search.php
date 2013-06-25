<?php get_header(); ?>
	
	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
	
		<!-- BEGIN MAIN -->
		<div id="main">
		
			<?php if (have_posts()) : ?>
			<div id="search-wrapper">
				<h3 class="section-title">Search Results</h3>
				<?php while (have_posts()) : the_post();
					
				if ( get_post_type() == 'reviews' ) : ?>
				
					<div class="search-item">
					
						<h4><span>REVIEWS:</span> <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<p class="search-date"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></p>
						<div class="search-text"><?php the_excerpt(); ?></div>
					
					</div>
					
				<?php elseif ( get_post_type() == 'videos' ) : ?>
				
					<div class="search-item">
					
						<h4><span>VIDEOS:</span> <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<p class="search-date"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></p>
						<div class="search-text"><?php the_excerpt(); ?></div>
					
					</div>
					
				<?php elseif ( get_post_type() == 'screenshots' ) : ?>
				
					<div class="search-item">
					
						<h4><span>SCREENSHOTS:</span> <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<p class="search-date"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></p>
						<div class="search-text"><?php the_excerpt(); ?></div>
					
					</div>
				
				<?php else:	?>
				
					<div class="search-item">
					
						<h4><span>NEWS:</span> <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<p class="search-date"><?php the_time( get_option('date_format') ); ?> - <?php comments_popup_link(__('0 comments'), __('1 Comment'), __('% Comments')); ?></p>
						<div class="search-text"><?php the_excerpt(); ?></div>
					
					</div>
				
				<?php endif; ?>
				
				<?php endwhile; ?>
				
				</div>
				
				<?php kriesi_pagination(); ?>
				
			<?php else : ?>
			<div id="search-wrapper">
				
				<h3 class="section-title">Search Results</h3>
				
				<p>Your search did not return any results. Please try using a different search term.</p>
				
			</div>
			<?php endif; ?>
			

			
		</div>
		<!-- END MAIN -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>