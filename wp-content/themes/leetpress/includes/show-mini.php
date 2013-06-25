				<div class="news-item" id="post-<?php the_ID(); ?>">
					
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
					<div class="post-entry" >

					<div class="news-thumb-wrapper-mini">
						<div class="titulo">
						
							<h1><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
						</div>
							<div class="news-meta-wrapper-mini" >
						<span class="news-meta-mini">By <?php the_author(); ?>, <?php the_time( get_option('date_format') ); ?></span>
						<span class="news-comment-mini"><?php comments_popup_link(__('0'), __('1'), __('%')); ?></span>
						<span class="news-cats-mini"><?php the_category(', ') ?></span>
					</div>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						
					</div>
					<?php } else { /* if post doesn't have a thumbnail */ ?>
					<h1 class="news-heading-mini"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<?php }  ?>
							
					
							
					
					<?php the_content(__('Seguir leyendo »')); ?>

					

					</div>
				</div>