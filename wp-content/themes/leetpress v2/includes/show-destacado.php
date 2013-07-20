				<div class="news-item-destacado" id="post-<?php the_ID(); ?>">
					
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
					<div class="news-thumb-wrapper-destacado">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						
						<a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>
					</div>
					<?php } else { /* if post doesn't have a thumbnail */ ?>
					<h1 class="news-heading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<?php }  ?>
							
				
				</div>