<?php

/**

 * Front to the WordPress application. This file doesn't do anything, but loads

 * wp-blog-header.php which does and tells WordPress to load the theme.

 *

 * @package WordPress

 */



/**

 * Tells WordPress to load the WordPress theme and output it.

 *

 * @var bool

 */





/** Loads the WordPress Environment and Template */

require('wp-blog-header.php');

 ?>

 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="En Colemono encontrarás noticias de videojuegos, reviews, programas en vivo, podcast, radio, notas y más!"/>
    <link rel="apple-touch-icon" href="touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="touch-icon-ipad-retina.png" />

	<title>Premios Colemono</title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if(get_option('lp_custom_favicon')) { ?><link rel="shortcut icon" href="<?php echo get_option('lp_custom_favicon'); ?>" /><?php } ?>	
	<!-- BEGIN STYLESHEETS -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<?php $theme_color = get_option('lp_theme_color'); leetpress_theme_color($theme_color); ?>
	<link rel="stylesheet" href="../wp-content/themes/leetpress/premios.css" type="text/css"  />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
	<!-- BEGIN JS -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollTo.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.tools.min.js"></script>
	
<?php if ( is_home() ) { ?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mobilyslider.js"></script>
	<script type="text/javascript">
	$(function(){
	
	$('.slider').mobilyslider({
		content: '.sliderContent',
		children: 'div',
		transition: 'fade',
		animationSpeed: 700,
		autoplay: true,
		autoplaySpeed: <?php if(get_option('lp_slider_transition')) { echo get_option('lp_slider_transition'); } else { echo '5000'; } ?>,
		pauseOnHover: true,
		bullets: false,
		arrows: true,
		animationStart: function(){},
		animationComplete: function(){}
	});
	
	});
	</script>
	<?php } ?>
	 
	
	
	<?php wp_head(); ?>
	
</head>
<body >

	<!-- BEGIN HEADER WRAPPER -->
	<div id="header-wrapper">
	
		<!-- BEGIN HEADER -->
		<div id="header">
	
			<!-- BEGIN TOP NAVIGATION -->
			<ul id="top-navigation">
				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'top-menu' ) ); ?>
			</ul>
			<!-- END TOP NAVIGATION -->	
			

			<!-- BEGIN SOCIAL MEDIA -->
			<div id="social-media">

				<?php if(get_option('lp_disable_facebook') == 'false') { ?><a href="http://www.facebook.com/<?php echo get_option('lp_facebook'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook" /></a><?php } ?>
				<?php if(get_option('lp_disable_twitter') == 'false') { ?><a href="http://www.twitter.com/<?php echo get_option('lp_twitter'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter" /></a><?php } ?>
				<a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to our feed"><img src="<?php echo get_template_directory_uri(); ?>/images/premios/rss-premios.png" alt="RSS" /></a>
			</div>
			<!-- END SOCIAL MEDIA -->
			<!-- BEGIN SEARCH -->
				<div id="search">
					<?php get_search_form(); ?>
				</div>
				<!-- END SEARCH -->
			
			<!-- BEGIN LOGO -->
			<div id="logo">
			
				<a href="http://colemono.com/premioscolemono"><img src="<?php echo get_template_directory_uri(); ?>/images/premios/logo-top.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
			
			</div>
			<!-- END LOGO -->
			
			<?php if(get_option('lp_header_banner')) { ?>
			<!-- BEGIN HEADER BANNER -->
			<div id="header-banner">
				<a href="<?php echo get_option('lp_header_banner_link'); ?>" target="_blank"><img src="<?php echo get_option('lp_header_banner'); ?>" alt="" /></a>
			</div>
			<!-- END HEADER BANNER -->
			<?php } ?>
			
			<!-- BEGIN NAVIGATION-WRAPPER -->
			<div class="navigation-wrapper">
			
				<!-- BEGIN NAVIGATION -->
				<ul id="navigation">
					<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary-menu' ) ); ?>
				</ul>
				<!-- END NAVIGATION -->
				
				
				
			</div>
			<!-- END NAVIGATION-WRAPPER -->
	
		</div>
		<!-- END HEADER -->
	
	</div>
	<!-- END HEADER-WRAPPER -->

	
	<!-- BEGIN MAIN WRAPPER -->
	<div id="main-wrapper" >
	
		<!-- BEGIN MAIN -->
		<div id="main"  >
		
			<!-- BEGIN POST -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post">
				<br/>
				<br/>
				<br/>
				
				<h1 class="post-header"><?php the_title(); ?></h1>
				
				<p class="post-meta">Published on <?php the_time( get_option('date_format') ); ?>, by <?php the_author_posts_link(); ?> - Posted in <?php the_category(', ') ?> <span class="meta-comment"><a href="#respond"><?php comments_number('0', '1', '%' );?></a></span></p>
				
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
				<div class="post-thumb">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php } ?>
				
				
					<div id="compartir">
						<img src="<?php echo get_template_directory_uri(); ?>/images/compartir.png" />
						<div id="botones">
						<?php dd_fblike_generate('Like Box Count') ?>
						<?php dd_twitter_generate('Normal','Cole_mono') ?>						
						<?php dd_google1_generate('Normal') ?>	
						</div>
						
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

</div>
<?php get_footer(); ?>