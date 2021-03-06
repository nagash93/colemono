<?php get_header(); ?>
	
	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper">
	
		<!-- BEGIN MAIN -->
		<div id="main">
		
			<!-- BEGIN POST -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post">
			
				<h1 class="post-header"><?php the_title(); ?></h1>
				
				<p class="post-meta">Published on <?php the_time( get_option('date_format') ); ?>, by <?php the_author(); ?> - Posted in <?php echo get_the_term_list( $post->ID, 'screenshots_category', ' ',', ' ) ?> <span class="meta-comment"><a href="#respond"><?php comments_number('0', '1', '%' );?></a></span></p>
				
				<div class="post-screenshot">
					
					<ul>
						<?php
						// BEGIN SCREENSHOTS GALLERY
						$attachment_args = array(
							 'post_type' => 'attachment',
							 'numberposts' => -1,          // one attachement image per post
							 'post_status' => null,
							 'post_parent' =>$post->ID,
							 'orderby' => 'menu_order ID'
						);
						$attachments = get_posts($attachment_args);
						if ($attachments) {
						  foreach($attachments as $gall_image )                                                                 
						  {
							$att_img =  wp_get_attachment_url( $gall_image->ID);
							echo '<li>';
							echo '<a class="grouped_elements" rel="group1" href="'.$att_img.'" title="'.$gall_image->post_title.'">';
							echo  '<img src="'. aq_resize($att_img, 140, 100, true) .'" alt=""/>';
							echo '</a>';
							echo '</li>';
						  }
						}
						
						?>
					</ul>
					
					<div class="line-bottom"></div>
					
				</div>
				
				<div class="post-entry">
					<?php the_content(); ?>
					<?php wp_link_pages('before=<span class="page-links"><strong>Pages:</strong> &after=</span>'); ?>
				</div>
				
				<?php if(get_option('lp_share_post') == "false" || get_option('lp_share_post') == "") { ?>
				<div class="post-share">
					<p>SHARE THIS POST</p>
					<ul>
						<li><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to our feed"><img src="<?php echo get_template_directory_uri(); ?>/images/rss-big.png" alt="" /></a></li>
						<?php if (get_option('lp_share_post_facebook') == "true") { ?>
						<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>?t=<?php the_title(); ?>" title="Post to Facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-big.png" alt="Facebook" /></a></li>
						<?php } ?>
						<?php if (get_option('lp_share_post_twitter') == "true") { ?>
						<li><a href="http://twitter.com/home/?status=<?php the_title(); ?>&nbsp;-&nbsp;<?php the_permalink(); ?>" title="Post to Twitter"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter-big.png" alt="Twitter" /></a></li>
						<?php } ?>
						<?php if (get_option('lp_share_post_myspace') == "true") { ?>
						<li><a href="http://www.myspace.com/index.cfm?fuseaction=postto&t=<?php the_title(); ?>&c=Check this out&u=<?php the_permalink(); ?>&l=>" title="Post to Myspace"><img src="<?php echo get_template_directory_uri(); ?>/images/myspace.png" alt="Myspace" /></a></li>
						<?php } ?>
						<?php if (get_option('lp_share_post_google') == "true") { ?>
						<li><a href="http://www.google.com/reader/link?title=<?php the_title();?>&amp;url=<?php the_permalink();?>" title="Google Buzz"><img src="<?php echo get_template_directory_uri(); ?>/images/google.png" alt="Google Buzz" /></a></li>
						<?php } ?>
						<?php if (get_option('lp_share_post_reddit') == "true") { ?>
						<li><a href="http://www.reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Share on Reddit"><img src="<?php echo get_template_directory_uri(); ?>/images/reddit.png" alt="Reddit" /></a></li>
						<?php } ?>
						<?php if (get_option('lp_share_post_stumbleupon') == "true") { ?>
						<li><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Stumble this"><img src="<?php echo get_template_directory_uri(); ?>/images/stumbleupon.png" alt="Stumnleupon" /></a></li>
						<?php } ?>
						<?php if (get_option('lp_share_post_delicious') == "true") { ?>
						<li><a href="http://del.icio.us/post?url=<?php the_permalink();?>&amp;title=<?php the_title(); ?>" title="Add To Delicious"><img src="<?php echo get_template_directory_uri(); ?>/images/delicious.png" alt="Delicious" /></a></li>
						<?php } ?>
						<?php if (get_option('lp_share_post_digg') == "true") { ?>
						<li><a href="http://digg.com/submit?url=<?php the_permalink();?>&amp;title=<?php the_title(); ?>&amp;thumbnails=1" title="Digg this!"><img src="<?php echo get_template_directory_uri(); ?>/images/digg.png" alt="Digg" /></a></li>
						<?php } ?>
						<?php if (get_option('lp_share_post_technorati') == "true") { ?>
						<li><a href="http://technorati.com/signup/?f=favorites&amp;Url=<?php the_permalink(); ?>" title="Post to Technorati"><img src="<?php echo get_template_directory_uri(); ?>/images/technorati.png" alt="Technorati" /></a></li>
						<?php } ?>
						<?php if (get_option('lp_share_post_email') == "true") { ?>
						<li class="email"><a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" title="Email a Friend"><img src="<?php echo get_template_directory_uri(); ?>/images/email.png" alt="Email" /></a></li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>
				
				<?php if(get_option('lp_author_box') == "false" || get_option('lp_author_box') == "") { ?>
				<div id="about-author">
				
					<?php echo get_avatar( get_the_author_email(), '75' ); ?>
					<h5><strong>Author:</strong> <?php the_author(); ?> <small>View all posts by <?php the_author_posts_link(); ?></small></h5>
					<div class="author-descrip"><?php the_author_meta("description"); ?></div>
				
				</div>
				<?php } ?>
				
				<!-- BEGIN COMMENTS -->
				<div id="comments">
				
					<?php comments_template(); ?>
				
				</div>
				<!-- END COMMENTS -->
			
			</div>
			<!-- END POST -->
			<?php endwhile; endif; ?>
			
		</div>
		<!-- END MAIN -->
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>