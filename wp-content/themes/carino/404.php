<?php 
/**
* 
* The template for displaying 404 pages (Not Found).
* 
* @author : VanThemes ( http://www.vanthemes.com )
* 
*/

get_header();

$van_page_type = van_page_type(); 
?>

<?php van_breadcrumb(); ?>	

<div id="main-content" class="<?php echo $van_page_type['type'] . ' ' . $van_page_type['container']; ?> error404" style="margin-bottom:-27px;">
	
	<div id="single-outer">

		

			<a href="http://www.colemono.com"><img src="http://colemono.com/imagenes/404.png"/></a>

	</div><!-- #single-outer -->

</div><!-- #main-content -->

<?php get_footer(); ?>