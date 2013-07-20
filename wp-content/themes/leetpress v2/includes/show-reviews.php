				<?php if($i%2 == 0) : ?>

				<div class="review-item second">
					<div class="review-item-thumb"><?php the_post_thumbnail('review-thumb-small'); ?></div>
					<div class="archive-score <?php $send_rate = get_post_meta($post->ID, "leetpress_overallscore", true); rating_color($send_rate); ?>"><?php echo get_post_meta($post->ID, "leetpress_overallscore", true); ?></div>
					<h5><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a> <small>(<?php echo get_the_term_list( $post->ID, 'review_category', '',', ' ) ?>)</small></h5>
					<span class="review-item-date"><?php the_time( get_option('date_format') ); ?> - </span><?php the_excerpt(); ?>
				</div>

				<?php else : ?>

				<div class="review-item">
					<div class="review-item-thumb"><?php the_post_thumbnail('review-thumb-small'); ?></div>
					<div class="archive-score <?php $send_rate = get_post_meta($post->ID, "leetpress_overallscore", true); rating_color($send_rate); ?>"><?php echo get_post_meta($post->ID, "leetpress_overallscore", true); ?></div>
					<h5><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a> <small>(<?php echo get_the_term_list( $post->ID, 'review_category', '',', ' ) ?>)</small></h5>
					<span class="review-item-date"><?php the_time( get_option('date_format') ); ?> - </span><?php the_excerpt(); ?>
				</div>

				<?php endif; ?>

				<?php $i++; ?>