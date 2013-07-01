<?php
/**
 * @package WordPress
 * @subpackage Evolutionary
 */

get_header(); ?>


	<div id="main">
			<div id="content">
			
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<div class="entry-info">
							<div class="date"><span class="month"><?php the_time('F');?></span><span class="day"><?php the_time('j');?></span></div>
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<p class="author"><span>By: <strong><?php the_author() ?></strong></span></p>
						</div>
						
						<div class="entry">
						<?php the_content('Continue Reading'); ?>
						</div>
					<p class="postmetadata"><span>Posted in: <?php the_category(', ') ?></span><?php edit_post_link('Edit', '<span class="edit">', '</span>'); ?><span class="comments"><?php comments_popup_link('0', '1', '%', 'commentlink'); ?> comments</span></p>
					<?php the_tags('<p class="postmetadata"><span>Tags: ', ', ', '</span></p>'); ?>
			</div>


			<?php comments_template(); ?>
		
		<?php endwhile; ?>
		
	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<div id="search"><?php get_search_form(); ?></div>

	<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

	</div>
<?php get_footer(); ?>
