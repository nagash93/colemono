				<div class="news-item" id="post-<?php the_ID(); ?>">
					
					<?php if (  get_post_meta($post->ID, "leetpress_review_thumb", true)  ) { /* if post has a thumbnail */ ?>
					<div class="news-thumb-wrapper">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><img src="<?php echo aq_resize(get_post_meta($post->ID, "leetpress_review_thumb", true), 600, 300, true)  ?>" alt=""/></a>
						<div class="news-arrows"></div>
						<h1><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">Review: <?php the_title(); ?></a></h1>
					</div>
					<?php } else { /* if post doesn't have a thumbnail */ ?>
					<h1 class="news-heading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">Review: <?php the_title(); ?></a></h1>
					<?php }  ?>
							
					<div class="news-meta-wrapper">
						<span class="news-meta">By <?php the_author(); ?>, <?php the_time( get_option('date_format') ); ?></span>
						<span class="news-comment"><?php comments_popup_link(__('0'), __('1'), __('%')); ?></span>
						<span class="news-cats"><?php echo get_the_term_list( $post->ID, 'review_category', ' ',', ' ) ?></span>
					</div>
						<div class="post-entry">
					<?php the_excerpt(); ?>
					</div>
				</div>