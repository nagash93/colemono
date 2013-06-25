<?php get_header(); ?>

	<?php
	$slider_number = get_option('lp_slides_number');
	$args = array( 'post_type' => 'slider', 'showposts' => $slider_number );
	$slider_loop = new WP_Query( $args );
	if ($slider_loop->have_posts()) : ?>
	<!-- BEGIN SLIDER -->
	<div class="slider">
	
		<div class="sliderContent">
		
		<?php while ( $slider_loop->have_posts() ) : $slider_loop->the_post(); $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' ); ?>
			<div class="featured-item" style="background:<?php echo get_post_meta($post->ID, 'feature_bg', true); ?> url(<?php echo $src[0]; ?>) no-repeat center; height:280px;">
				
				<div class="featured-inner">
					
					<div class="featured-inner">
					
						<div class="featured-arrows"></div>
						<h1><a href="<?php echo get_post_meta($post->ID, 'feature_url', true); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
						<p class="featured-meta">By <?php the_author(); ?>, <?php the_time( get_option('date_format') ); ?></p>
						
					</div>
						
				</div>
				
			</div>
		<?php endwhile;
		wp_reset_query(); ?>
		
		</div>
		
		<div class="top-overlay"></div>
		<div class="bottom-overlay"></div>
		
	</div>
	<!-- END SLIDER -->
	<?php endif; ?>
	
	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
	
		<!-- BEGIN MAIN -->
		<div id="main">
			
			<!-- BEGIN NEWS WRAPPER -->
			<div id="news-wrapper">
			
				<h3 class="section-title">Lo más nuevo en Colemono</h3>
				
				<!-- BEGIN NEWS ITEMS -->
				<?php
				
				if(get_option('lp_include_reviews') == "true") { $include_reviews = "'reviews',"; }
				if(get_option('lp_include_videos') == "true") { $include_videos = "'videos',"; }
				if(get_option('lp_include_screenshots') == "true") { $include_screenshots = "'screenshots',"; }
				
				query_posts( array(
				'post_type' => array(
							'post',
							$include_reviews,
							$include_screenshots,
							$include_videos
						),
						'paged' => $paged )
					);
				?>
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				
					<?php
		
					if ( get_post_type() == 'reviews' ) : ?>
					
						<?php include( TEMPLATEPATH . '/includes/show-reviews-frontpage.php' ); ?>
						
					<?php elseif ( get_post_type() == 'videos' & has_tag('mini') ) : ?>						

						<?php include( TEMPLATEPATH . '/includes/show-videos-frontpage-mini.php' ); ?>

						
					<?php elseif ( get_post_type() == 'videos') : ?>
						<?php include( TEMPLATEPATH . '/includes/show-videos-frontpage.php' ); ?>					
					
						
					<?php elseif ( get_post_type() == 'screenshots' ) : ?>
			
						<?php include( TEMPLATEPATH . '/includes/show-screenshots-frontpage.php' ); ?>

					<?php elseif ( in_category('mini')): ?>
			
						<?php include( TEMPLATEPATH . '/includes/show-mini.php' ); ?>
					<?php elseif ( in_category('E3 2013')): ?>
			
						<?php include( TEMPLATEPATH . '/includes/show-e3.php' ); ?>
					
					<?php else:	?>
					
						<?php include( TEMPLATEPATH . '/includes/show-posts.php' ); ?>
					
					<?php endif; ?>
				
				<?php endwhile; ?>
				<?php kriesi_pagination(); ?>
				<?php wp_reset_query(); ?>
				
				<?php endif; ?>
				<!-- END NEWS ITEMS -->
			
			</div>
			<!-- END NEWS WRAPPER -->
			
		</div>
		<!-- END MAIN -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>