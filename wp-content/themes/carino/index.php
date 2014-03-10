<?php 
/**
* @author : 
*/
get_header(); $van_page_type = van_page_type(); ?>
<div id="main-content" class="<?php echo $van_page_type['type'] . ' ' . $van_page_type['container']; ?>">	
		<?php if ( have_posts() ) : ?>
			<div id="posts-outer">
				<?php if ( van_get_option("home_carousel") ) {
					get_template_part('templates/main-carousel');}?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'partials/content', get_post_format() );  ?>
				<?php endwhile;?>
			</div><!-- #posts-outer -->
			<?php van_get_pagination(); ?>
		<?php else: ?>
			<?php get_template_part( 'partials/content', 'none' ); ?>
		<?php endif; ?>
</div><!-- #main-content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>