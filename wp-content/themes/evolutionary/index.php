<?php
/**
 * @package WordPress
 * @subpackage Evolutionary
 */
 
get_header(); ?>

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
		}
		$addclass = 'firstpost';
		if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			
			<div <?php post_class($addclass); $addclass=''; ?> id="post-<?php the_ID(); ?>">
				<div class="entry-info">
					<div class="date"><span class="month"><?php the_time('F');?></span><span class="day"><?php the_time('j');?></span></div>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<p class="author"><span>By: <strong><?php the_author() ?></strong></span> <?php edit_post_link('Edit', '<span class="edit">', '</span>'); ?></p>
				</div>
				
				<div class="entry">
				<?php the_content('Continue Reading'); ?>
				</div>
			<p class="postmetadata"><span>Posted in: <?php the_category(', ') ?></span><span class="comments"><?php comments_popup_link('0', '1', '%', 'commentlink'); ?> comments</span></p>
	</div>
				<?php endwhile; ?>

		<ul class="pagenavigation">
			<li id="prevnav"><?php previous_posts_link('Newer Entries') ?></li>
			<li id="nextnav"><?php next_posts_link('Older Entries') ?></li>
		</ul>
		
	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

	</div>
<?php get_footer(); ?>