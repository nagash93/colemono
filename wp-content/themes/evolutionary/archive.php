<?php
/**
 * @package WordPress
 * @subpackage Evolutionary
 */

get_header();
?>

	<div id="main">
			<div id="content">
			
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>

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
		
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
?><div id="search"><?php get_search_form(); ?></div><?php
	endif;
?>

	</div>

<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
</div>