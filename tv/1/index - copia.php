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

require('../../wp-blog-header.php');

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

	<title>Colemono TV</title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if(get_option('lp_custom_favicon')) { ?><link rel="shortcut icon" href="<?php echo get_option('lp_custom_favicon'); ?>" /><?php } ?>	
	<!-- BEGIN STYLESHEETS -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="../../wp-content/themes/leetpress/styletv.css" type="text/css"  />
	<?php $theme_color = get_option('lp_theme_color'); leetpress_theme_color($theme_color); ?>
	
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
<body <?php body_class(); ?> <?php if((in_category('E3 2013')&is_singular())||is_category('E3 2013')){  echo  'id="e3"';}?>>

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
				<a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to our feed"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="RSS" /></a>
			</div>
			<!-- END SOCIAL MEDIA -->
			<!-- BEGIN SEARCH -->
				<div id="search">
					<?php get_search_form(); ?>
				</div>
				<!-- END SEARCH -->
			
			<!-- BEGIN LOGO -->
			<div id="logo">
			<?php if(get_option('lp_logo')) { ?>
				<a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('lp_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php } else { ?>
				<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php } ?>
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

	<div id="main-wrapper">

	

		<!-- BEGIN MAIN -->

		<div id="main">

		

		

		<div id="stream">

			<img src="../../wp-content/themes/leetpress/images/banner-twitch1.png"><br/>

			<a href="https://twitter.com/cole_mono" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @twitterapi</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FColemono&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=151435254924604" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px; float:left;" allowTransparency="true"   ></iframe>

			<object type="application/x-shockwave-flash" height="378" width="620" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=colemonotv" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=www.twitch.tv&channel=colemonotv&auto_play=true&start_volume=25" /></object>
		<div id="compartir">
						<img src="<?php echo get_template_directory_uri(); ?>/images/compartir.png" />
						<div id="botones">
						<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fcolemono.com%2Ftv%2F1%2Findex.php&amp;width=100&amp;height=65&amp;colorscheme=light&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;send=false&amp;appId=173339252747096" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:65px;" allowTransparency="true"></iframe>
						<?php dd_twitter_generate('Normal','Cole_mono') ?>						
						<?php dd_google1_generate('Normal') ?>	
						</div>
						
					</div>
		

<a class="twitter-timeline" href="https://twitter.com/search?q=RockandGames" data-widget-id="343986568664596480">Tweets sobre "RockandGames"</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>





</div>



	<div id="chat">

		<img src="../../wp-content/themes/leetpress/images/banner-twitch2.png">

		<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=colemonotv&amp;popout_chat=true" height="500" width="315"></iframe>

	</div>













			

		</div>

		<!-- END MAIN -->



</div>



<?php get_footer(); ?>