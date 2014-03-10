<?php
/**
* 
* The template for displaying the header.
* 
* @author : VanThemes ( http://www.vanthemes.com )
* 
*/
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	    <link rel="apple-touch-icon" href="touch-icon-iphone.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="touch-icon-ipad-retina.png" />
    <meta property="og:image" content="http://colemono.com/wp-content/uploads/2013/12/logo-enl.png" />     
     <meta property="og:title" content="Premios Colemono" /> 
    <meta property="og:url" content="http://colemono.com/premioscolemono" /> 
 	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:creator" content="@El_gr">
	<meta name="twitter:site" content="@cole_mono">
	<meta name="twitter:title" content="Participa y gana con los Premios Colemono 2013 ">
	<meta name="twitter:description" content="Ya llegó la premiación más esperada por los usuarios de Colemono, nos referimos a la primera edición de los Premios Colemono en su edición 2013 donde junto a nuestra comunidad de usuarios seleccionaremos a lo mejor que ha aparecido este año.
">
	<meta name="twitter:domain" content="Colemono.com"/>
	<meta name="twitter:image" content="http://colemono.com/wp-content/uploads/2013/04/juego-ano1.jpg">
	<title>Premios Colemono</title>



	<?php wp_head(); ?>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/premios.css" type="text/css"  />
	<style type="text/css">
		a{text-decoration: none;}
	</style>
</head>

<body <?php body_class();?>>
	<!-- Full Screen Background -->
	<div class="full-screen-bg"><div class="screen-inner"></div></div>
	
	<!-- HEADER -->
	<div class="header-nav">
					<div id="headernav" class="container">

						<?php wp_nav_menu( array('theme_location' => 'HeaderNav', 'menu_class'  => 'clearfix','fallback_cb' => 'van_nav_alert') ); ?>
					</div>	
				</div>


	<header id="main-header">
			

		<div id="top-bar">
			<div id="wlogo" class="container clearfix">

				<?php van_logo();?>
				
				<?php if ( van_get_option("header_social") ): ?>
					<div id="header-social">
						<?php van_social_networks(); ?>
					</div><!-- #header-social -->						
				<?php endif; ?>

			</div><!-- .container -->
		</div><!-- #top-bar -->

		<div id="main-nav-wrap" class="container content clearfix <?php echo !van_get_option("sticky_nav") ? 'disabled-sticky' : ''; ?>" >

			<nav id="main-navigation" role="navigation">

				<div class="mobile-nav">
					<?php van_menu_select(array( 'menu_name' => 'PrimaryNav', 'id' => 'PrimaryNav' )); ?>
				</div>
				
				<div class="main-nav">

					<?php wp_nav_menu( array('theme_location' => 'PrimaryNav', 'menu_class'  => 'clearfix','fallback_cb' => 'van_nav_alert') ); ?>

				</div>

			</nav><!-- #main-navigation -->

			<?php if ( van_get_option("nav_search") ): ?>
				<div id="header-search">
					<form method="get" class="searchform clearfix" action="<?php echo esc_url( home_url() ); ?>/" role="search">
						<a href="#" class="search-icn icon icon-search"></a>
						<input type="text" name="s" placeholder="<?php _e('Type and hit enter to search...','van') ?>">
					</form>            	
				</div><!-- #header-search -->					
			<?php endif; ?>

		</div><!-- #main-nav-wrap -->

	</header><!-- #main-header -->

	<!-- MAIN -->

<div id="main-wrap" class="container <?php echo van_sidebar_layout(); ?>">
	<?php
if (is_home()){ 
echo do_shortcode('[cycloneslider id="1"]');
}
?>
		