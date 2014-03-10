<?php 

$list1 = preg_split( '/[\s,]+/', $include, -1, PREG_SPLIT_NO_EMPTY );

if ( count( $list )>0 || count( $list1 ) > 0 ){
?>

<div class="widget-slider">
	<div class="yaslider carousel slide style2" id="<?php echo $widget_id; ?>" data-interval="<?php echo $interval; ?>">
		<!-- If select post ID -->
		<?php if( count( $list1 ) > 0  ) {?>        
		<div class="carousel-inner">
			<?php foreach ( $list1 as $i => $post ){?>
			<div class="item <?php if ( $i==0 )echo "active";?>">
				<a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'large'); ?></a>
				<div class="slider-caption">
					<h3><?php echo $post -> post_title; ?></h3>
					<div class="caption-desc">
						<?php 
						if ( preg_match('/<!--more(.*?)?-->/', $post->post_content, $matches) ) {
							$content = explode($matches[0], $post->post_content, 2);
							$content = $content[0];
						} else {
							$content = self::ya_trim_words($post->post_content, $length, ' ');
						}
						echo $content;
						?>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
		<!-- End select Post ID -->
		
		<!-- select Category -->
		<?php } else{ ?>
			<div class="carousel-inner">
				<?php foreach ( $list as $i => $post ){?>
				<div class="item <?php if ( $i==0 )echo "active";?>">
					<a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?></a>
					<div class="slider-caption">
						<span><?php echo $post -> post_title; ?></span>
						<div class="caption-desc">
							<?php 			
								$content = self::ya_trim_words($post->post_content, $length, ' ');
								echo $content;
							?>
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		<?php } ?>
			<div class="carousel-nav">
				<a href="#<?php echo $widget_id;?>" data-slide="prev" class="carousel-control left"><?php echo '<img src="'.plugins_url( 'img/bt-left.png' , __FILE__ ) . '" > ';?></a>
				<a href="#<?php echo $widget_id;?>" data-slide="next" class="carousel-control right"><?php echo '<img src="'.plugins_url( 'img/bt-right.png' , __FILE__ ) . '" > ';?></a>
			</div>
	</div>
</div>
<?php } ?>
<script>
	jQuery(function() {
		jQuery('#<?php echo $widget_id; ?>').carousel({
			interval: <?php echo $interval; ?>,
			pause : '<?php echo $hover; ?>'
		});
	});
</script>