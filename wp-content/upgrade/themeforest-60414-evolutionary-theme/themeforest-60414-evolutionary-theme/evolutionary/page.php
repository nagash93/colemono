<?php
/**
 * @package WordPress
 * @subpackage Evolutionary
 */

get_header(); ?>

<?php if (get_option('ev_secondary_nav') === FALSE) { ev_submenu(); } ?>

	<div id="main">
			<div id="content">
			
	<?php 
		/* Featured Posts */
		global $options;
		if ((get_option('ev_features_front') === FALSE) || (is_front_page() && $paged <= "1"))
		{
			$cid = get_cat_id('featured');
			if ($cid > 0)
			{		
				$my_query = new WP_Query('category_name=featured&showposts=15');
				if ($my_query->have_posts()) : ?>
	
					<div id="featured">
					<ul id="featuredimages">
					<?php
	  				while ($my_query->have_posts()) : $my_query->the_post(); 
	  					$postimage = get_post_meta($post->ID, "featuredpicture", true);
	  					if (!$postimage) $postimage = get_bloginfo('template_url').'/images/featuredimage.jpg';
	  					?>
						<li><img src="<?=$postimage;?>" alt="Featured" /></li>
					<?php endwhile; ?>  
					</ul>
					<ul id="featuredexcerpts">
					<?php
					$i=0;
	  				while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<li id="excerpt<?php echo $i; ?>">
							<div class="excerpt">
								<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink() ?>" title="Read Article" class="readfeatured">Read Article</a>
							</div>
						</li>
					<?php $i++; endwhile; ?>  
					</ul>
					</div>
				<?php endif;
				wp_reset_postdata();
			}
		} ?>
		
		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php
			if ($p = get_post_meta($post->ID, "alt_title", true)) {
				$title = $p;
			} else {
				$title = get_the_title($post->ID);
			}
			?> 
				<h2 class="pagetitle"><?php echo $title; ?></h2>
				
				<div class="entry">
				<?php the_content('more'); ?>
				</div>
				
			</div>

		<?php endwhile; ?>

		<ul class="pagenavigation">
			<li><?php previous_posts_link('Newer Entries') ?></li>
			<li><?php next_posts_link('Older Entries') ?></li>
		</ul>
		
	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<div id="search"><?php get_search_form(); ?></div>
	<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

	</div>
<?php get_footer(); ?>