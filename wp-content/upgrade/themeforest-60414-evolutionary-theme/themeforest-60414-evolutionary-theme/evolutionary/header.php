<?php
/**
 * @package WordPress
 * @subpackage Evolutionary
 */

$bodyclass = get_option('ev_theme_color');
if ($bodyclass == '') $bodyclass='blue';
switch ($bodyclass)
{
	case 'green':
	$imgdir = '/images/green/';
	break;
	case 'red':
	$imgdir = '/images/red/';
	break;
	case 'black':
	$imgdir = '/images/black/';
	break;
	case 'blue':
	default:
	$imgdir = '/images/';
	break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>

<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url'); ?>/ie7.css" />
<![endif]-->
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php echo get_bloginfo('template_url'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript">
  DD_belatedPNG.fix('img, #header #blogdescrip, #header li a, ul.pagenavigation li, ul.pagenavigation li a, a.more-link, #featuredexcerpts .excerpt, #featurednav li a, .entry a.external, ul#subnav li, ul#subnav2 li');
</script>
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url'); ?>/ie6.css" />
<![endif]-->
</head>
<body <?php body_class('nojs '.$bodyclass); ?>>
<div id="wrapper">
<div id="header">
	<div id="logo">
		<h1><a href="<?php echo get_option('home'); ?>/" class="logolink"><img src="<?php echo get_bloginfo('template_url').$imgdir; ?>/logos/logo.png" alt="<?php bloginfo('name'); ?>" /></a></h1>
		<?php 
			$descrip = get_settings('blogdescription'); 
			if ($descrip) echo '<p id="blogdescrip">'.$descrip.'</p>';
		?>
	</div>
			<?php
			if (function_exists(wp_nav_menu)) {
			// 3.0 menu
				wp_nav_menu(array('menu' => 'Main Nav', 'id' => '', 'menu_class' => '', 'container' => false, 'container_id' => '', 'fallback_cb' => 'tg_nav_menu', "link_before" => "<span>", "link_after" => "</span>"));
			} 
			else {
			// fallback menu
				tg_nav_menu();
			}
	?>
</div>
