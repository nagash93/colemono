<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<div id="footer" class="sidebar">	
	<ul>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
	<?php endif; ?>
	</ul>
</div>
<div id="subfooter">
	<ul id="footernav">
		<?php if (get_option('ev_hide_homepage') === FALSE) { ?><li><a href="<?php echo get_settings('home'); ?>" title="Home">Home</a></li><?php }?>
		<?php if (get_option('ev_footer_multi') === FALSE) { $depth = 1; } else { $depth = 0; } wp_list_pages('title_li=&depth='.$depth); ?>
		<li class="last"><a href="<?php bloginfo('rss_url'); ?>" title="Subscribe" class="rss">RSS Feed</a></li>
	</ul>
	<p>&copy; Copyright <?php echo get_option('ev_copyright'); ?>. All Rights Reserved.</p>
</div>
</div>
		<?php ev_scripts(); ?>
		<?php wp_footer(); ?>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6933427-4");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
