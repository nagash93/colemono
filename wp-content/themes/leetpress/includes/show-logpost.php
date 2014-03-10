				<div class="news-item" id="post-<?php the_ID(); ?>">
					
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
					<div class="news-thumb-wrapper">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
						<div class="news-arrows<?php 

						if ( in_category('rockygames')){echo'-rock';}
						
						elseif ( in_category('nota')){echo'-nota';} 
						elseif ( in_category('podcast-sin-hogar')){echo'-pod';} 
						elseif ( in_category('premios-colemono')){echo'-pre';} 
						elseif ( in_category('primera-impresion-programas')){echo'-primera';} 
						elseif ( in_category('ranking')){echo'-top';} 
						elseif ( in_category('resumen-semanal-programas')){echo'-resum';} 
						elseif ( in_category('columnas')){echo'-colum';} 
						elseif ( in_category('colemono-tv')){echo'-tv';} 
						elseif ( in_category('cuarto-de-maquinas')){echo'-cuarto';} 	
						elseif ( in_category('unboxing')){echo'-box';} 						
						elseif ( in_category('vs')){echo'-vs';} 
						






						?>">





						</div>
						<h1><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					</div>
					<?php } else { /* if post doesn't have a thumbnail */ ?>
					<h1 class="news-heading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					<?php }  ?>
							
					<div class="news-meta-wrapper">
						<span class="news-meta">By <?php the_author(); ?>, <?php the_time( get_option('date_format') ); ?></span>
						<span class="news-comment"><?php comments_popup_link(__('0'), __('1'), __('%')); ?></span>
						<span class="news-cats"><?php the_category(', ') ?></span>
					</div>
							
					<div class="post-entry">
					<?php the_content(__('Seguir leyendo »')); ?>

				
					</div>
				</div>