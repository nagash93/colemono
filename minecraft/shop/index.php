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
	<link rel="stylesheet" href="../style.css" type="text/css"  />
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

		<div id="main" style="width:100%;">




				<h1 style="font-size:30px;">Comprar Rangos</h1>
				<div id="pagos">


<div class="datagrid"><table>
<thead><tr><th>Vip</th><th>Vip+</th><th>Elite</th></tr></thead>

<tbody><tr><td>/nick</td><td>/nick</td><td>/nick</td></tr>
<tr class="alt"><td>/fix</td><td>/fix</td><td>/fix</td></tr>
<tr><td>/tpahere</td><td>/tpahere</td><td>/tpahere</td></tr>
<tr class="alt"><td>/afk</td><td>/afk</td><td>/afk</td></tr>
<tr><td>/hat</td><td>/hat</td><td>/hat</td></tr>
<tr class="alt"><td>/enderchest</td><td>/enderchest</td><td>/enderchest</td></tr>
<tr><td>4 Sethome</td><td>6 Sethome</td><td>8 Sethome</td></tr>
<tr class="alt"><td>50.000 Dinero</td><td>100.000 Dinero</td><td>200.000 Dinero</td></tr>
<tr><td>1 Kit de diamante proteccion III</td><td>2 Kit de diamante proteccion IV</td><td>4 Kits de diamante Proteccion 4 </td></tr>
<tr class="alt"><td>1 Espada filo III</td><td>2 Espadas filo IV</td><td>4 Espadas filo V</td></tr>
<tr><td>1 Stack de diamantes</td><td>2 Stack de diamantes</td><td>3 Stack de diamantes</td></tr>
<tr class="alt"><td>15 Manzanas encantadas</td><td>32 Manzanas encantadas</td><td>64 Manzanas encantadas</td></tr>
<tr><td>2 pico de diamante irrompible 4 eficiencia 4</td><td>4 Picos de diamante Irrompible 3, eficiencia 4</td><td>6 Picos de diamante FULL encantados. (3 Con fortuna III, 3 con Toque de seda I)</td></tr>
<tr class="alt"><td>2 Libros encantados: Fortuna III, Toque de seda I</td><td>4 Libros encantados: 2 Fortuna III, 2 Toque de seda I</td><td>6 Libros encantados a eleccion.</td></tr>
<tr><td>5 Boost de power de faction para el jugador</td><td>10 Boost de power de faction para el jugador</td><td>15 Boost de power de faction para el jugador</td></tr>
<tr class="alt"><td>3 Stack de botellas de XP</td><td>6 Stack de botellas de XP</td><td>10 Stacks de botellas de XP</td></tr>
<tr><td>16 Posiones de fuerza II (Stackeadas)</td><td>32 Posiones de fuerza II (Stackeadas)</td><td>64 Posiones de fuerza II (Stackeadas)</td></tr>
<tr class="alt"><td>-Acceso a tienda VIP-</td><td>-Acceso a tienda VIP-</td><td>-Acceso a tienda Elite-</td></tr>

<tr><td>X</td><td>comando /feed</td><td>comando /feed</td></tr>
<tr class="alt"><td>x</td><td>comando /sell</td><td>comando /sell</td></tr>
<tr><td>x</td><td>comando /near</td><td>comando /near</td></tr>
<tr class="alt"><td>x</td><td>comando /broadcast</td><td>comando /broadcast</td></tr>
<tr><td>x</td><td>x</td><td>comando /heal (Costo de 1.000 por uso)</td></tr>
<tr class="alt"><td>x</td><td>x</td><td>comando /workbench</td></tr>
<tr><td>x</td><td>x</td><td>comando /invsee</td></tr>
<tr class="alt"><td>x</td><td>x</td><td>comando /top</td></tr>
<tr><td>x</td><td>Mantiene inventario al morir.</td><td>Mantiene inventario al morir.</td></tr>
<tr class="alt"><td>x</td><td>Escribir con colores en el chat.</td><td>Escribir con colores en el chat.</td></tr>
<tr><td></td><td></td><td></td></tr>
<tr class="alt"><td>VALOR</td><td>VALOR</td><td>VALOR</td></tr>

<tr><td>USD 6</td><td>USD 12</td><td>USD 20</td></tr>

<tr class="alt"><td></td><td></td><td></td></tr>
<tr ><td>Pagar:</td><td>Pagar:</td><td>Pagar:</td></tr>
<tr class="alt"><td>PAYPAL :<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="JMHU53YWXJQGN">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form></td><td>PAYPAL :<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="L4FE2YFLPKK2L">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
</td><td>PAYPAL :<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="E8EW4587KPZJU">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
</td></tr>
<tr><td></td><td></td><td></td></tr>
<tr class="alt"><td><form action='https://chile.dineromail.com/Shop/Shop_Ingreso.asp' method='post'> <input type='hidden' name='NombreItem' value='Colemono Vip'> <input type='hidden' name='TipoMoneda' value='2'> <input type='hidden' name='PrecioItem' value='6.00'> <input type='hidden' name='E_Comercio' value='112421'> <input type='hidden' name='NroItem' value='-'> <input type='hidden' name='DireccionExito' value='http://colemono.com/minecraft/exito'> <input type='hidden' name='DireccionFracaso' value='http://colemono.com/minecraft/cancel'> <input type='hidden' name='DireccionEnvio' value='0'> <input type='hidden' name='Mensaje' value='1'> <input type='hidden' name='MediosPago' value='4,5,6,21,23,2,7'> <input type='image' src='https://chile.dineromail.com/import/img/payment-button-cl.gif' border='0' name='submit' alt='Pagar con DineroMail'> </form>
</td><td><form action='https://chile.dineromail.com/Shop/Shop_Ingreso.asp' method='post'> <input type='hidden' name='NombreItem' value='Colemono Vip+'> <input type='hidden' name='TipoMoneda' value='2'> <input type='hidden' name='PrecioItem' value='12.00'> <input type='hidden' name='E_Comercio' value='112421'> <input type='hidden' name='NroItem' value='2'> <input type='hidden' name='DireccionExito' value='http://www.colemono.com/minecraft/exito'> <input type='hidden' name='DireccionFracaso' value='http://www.colemono.com/minecraft/cancel'> <input type='hidden' name='DireccionEnvio' value='1'> <input type='hidden' name='Mensaje' value='1'> <input type='hidden' name='MediosPago' value='4,5,6,21,23,2,7'> <input type='image' src='https://chile.dineromail.com/import/img/payment-button-cl.gif' border='0' name='submit' alt='Pagar con DineroMail'> </form></td>
<td><form action='https://chile.dineromail.com/Shop/Shop_Ingreso.asp' method='post'> <input type='hidden' name='NombreItem' value='Colemono Elite'> <input type='hidden' name='TipoMoneda' value='2'> <input type='hidden' name='PrecioItem' value='20.00'> <input type='hidden' name='E_Comercio' value='112421'> <input type='hidden' name='NroItem' value='3'> <input type='hidden' name='DireccionExito' value='http://colemono.com/minecraft/exito'> <input type='hidden' name='DireccionFracaso' value='http://colemono.com/minecraft/cancel'> <input type='hidden' name='DireccionEnvio' value='1'> <input type='hidden' name='Mensaje' value='1'> <input type='hidden' name='MediosPago' value='4,5,6,21,23,2,7'> <input type='image' src='https://chile.dineromail.com/import/img/payment-button-cl.gif' border='0' name='submit' alt='Pagar con DineroMail'> </form></td></tr>

</tbody>
</table></div>



<br/><br/>
<p id="com">Uso de los comandos:<br/><br/>

/nick : Cambia tu nickname en el servidor.<br/>
/fix  : Repara tu item que tienes en mano.<br/>
/tpahere: Envias una solicitud para que alguien vaya hacia ti.<br/>
/afk  : Te pone ausente.<br/>
/hat  : Usas de sombrero el bloque que tengas en tu mano.<br/>
/enderchest: Puedes usar tu enderchest donde sea que estes.<br/>
/feed : Te alimenta al 100%<br/>
/sell : Te vende el item que selecciones. Puedes vender lo que tengas en la mano o inventario entero.<br/>
/near : Te dice que jugador esta cerca tuyo.<br/>
/bc   : (/broadcast) Envias un mensaje masivo a todo el servidor.<br/>
/heal : Te regenera toda la vida. El uso de este comando tiene un costo de 1.000.<br/>
/wb   : (/workbench) Puedes abrir una mesa de crafteo donde quiera que estes.<br/>
/invsee: Ves el inventario de otro jugador. (No tengan miedo, solo lo podrán ver, no sacar cosas de el)<br/>
/top : Te lleva al bloque mas alto que se encuentre arriba tuyo.</p>




</div>
		<!-- END MAIN -->



</div>



