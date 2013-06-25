
	<!-- BEGIN FOOTER TOP -->
	<div id="footer-top-wrapper">
	
		<div id="footer-top">
		
			<ul id="footer-navigation">
				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'footer-menu' ) ); ?>
			</ul>
			
			<div id="back-top">
				<a href="#">Back to top</a>
			</div>
			
		</div>
	
	</div>
	<!-- END FOOTER TOP -->
	
	<!-- BEGIN FOOTER -->
	<div id="footer-wrapper">
	
		<div id="footer">
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 1') ) ?>
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 2') ) ?>
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 3') ) ?>
			
			<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer 4') ) ?>
			
		</div>
	
	</div>
	<!-- END FOOTER -->
	
	<!-- BEGIN FOOTER BOTTOM WRAPPER -->
	<div id="footer-bottom-wrapper">
	
		<!-- BEGIN FOOTER BOTTOM -->
		<div id="footer-bottom">
		
			<span class="footer-bottom-left"><?php echo get_option('lp_footer-text-left'); ?></span>			
			<span class="footer-bottom-right">Estructura  &nbsp <a href="http://www.ultimazeta.cl" >UltimaZeta.cl</a></span>
			<span class="footer-bottom-right"><?php echo get_option('lp_footer-text-right').' &nbsp'; ?></span>
		
		</div>
		<!-- END FOOTER BOTTOM -->
	
	</div>
	<!-- END FOOTER BOTTOM WRAPPER -->
	
	<?php wp_footer(); ?>
	
	<?php $google_analytics = get_option('lp_google_analytics'); if ($google_analytics) { echo stripslashes($google_analytics); } ?>
			

</body>

</html>