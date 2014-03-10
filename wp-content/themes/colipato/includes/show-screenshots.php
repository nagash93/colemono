				<?php if($i%2 == 0) : ?>

				<div class="media-item last">
				
					<div class="media-thumb">
						<div class="screenshot-icon"></div>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('media-thumb-small'); ?></a>
						<div class="media-arrows"></div>
						<h4><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<div class="media-meta-wrapper">
							<span class="media-meta"><?php the_time( get_option('date_format') ); ?></span>
							<span class="media-cats"><?php echo get_the_term_list( $post->ID, 'screenshots_category', '',', ' ) ?></span>
						</div>
					</div>
				
				</div>

				<?php else : ?>

				<div class="media-item">
				
					<div class="media-thumb">
						<div class="screenshot-icon"></div>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail('media-thumb-small'); ?></a>
						<div class="media-arrows"></div>
						<h4><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h4>
						<div class="media-meta-wrapper">
							<span class="media-meta"><?php the_time( get_option('date_format') ); ?></span>
							<span class="media-cats"><?php echo get_the_term_list( $post->ID, 'screenshots_category', '',', ' ) ?></span>
						</div>
					</div>
				
				</div>

				<?php endif; ?>

				<?php $i++; ?>