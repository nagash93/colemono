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

require('../wp-blog-header.php');

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="ColemomoCraft servidor oficial de colemono.com"/>
    <link rel="apple-touch-icon" href="touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="touch-icon-ipad-retina.png" />

	<title>ColemonoCraft</title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if(get_option('lp_custom_favicon')) { ?><link rel="shortcut icon" href="<?php echo get_option('lp_custom_favicon'); ?>" /><?php } ?>	
	<!-- BEGIN STYLESHEETS -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css" type="text/css"  />
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
<body >

	<!-- BEGIN HEADER WRAPPER -->
	<div id="header-wrapper">
	
		<!-- BEGIN HEADER -->
		<div id="header">
	
			<!-- BEGIN TOP NAVIGATION -->
			<ul id="top-navigation">
				<li id="menu-item-86" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-86"><a href="http://colemono.com/mimecraft">Home</a></li>
			</ul>
			<!-- END TOP NAVIGATION -->	
			

			<!-- BEGIN SOCIAL MEDIA -->
			<div id="social-media">

				<a href="http://www.facebook.com/colemonocraft>"><img src="<?php echo get_template_directory_uri(); ?>/images/minecraft/facebook.png" alt="Facebook" /></a>
				<a href="http://www.twitter.com/colemonocraft"><img src="<?php echo get_template_directory_uri(); ?>/images/minecraft/twitter.png" alt="Twitter" /></a>
				
			</div>
			<!-- END SOCIAL MEDIA -->
			<!-- BEGIN SEARCH -->
				
				<!-- END SEARCH -->
			
			<!-- BEGIN LOGO -->
			<div id="logo">
			
				<a href="http://www.colemono.com/minecraft"><img src="<?php echo get_template_directory_uri(); ?>/images/minecraft/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
			
			</div>
			<!-- END LOGO -->
			
			
			<!-- BEGIN HEADER BANNER -->
			<div id="header-banner">
				

				<img src="<?php echo get_template_directory_uri(); ?>/images/minecraft/ip.png" alt="Colemonocraft" />
			</div>
			<!-- END HEADER BANNER -->
		
			
			<!-- BEGIN NAVIGATION-WRAPPER -->
			<div class="navigation-wrapper">
			
				<!-- BEGIN NAVIGATION -->
				<ul id="navigation">
					<li id="menu-item-86" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-86"><a href="http://colemono.com/minecraft">Home</a></li>
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


			<h1>Tu compra se ha realizado exitosamente! , Muchas gracias!</h1>
			<h2>Los iteam y comandos se te entregaran en un rango de 24hrs.<br/>
				Si tienes dudas contactate con minecraft@colemono.com</h2>


</div>
		<!-- END MAIN -->



</div>



