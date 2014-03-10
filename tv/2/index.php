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


get_header(tv); 


?>



<div id="main-content" class="<?php echo $van_page_type['type'] . ' ' . $van_page_type['container']; ?>">
		

		

		<div id="stream">

			<img src="<?php echo get_template_directory_uri(); ?>/images/banner-ustream1.png"><br/>

			<a href="https://twitter.com/cole_mono" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @twitterapi</a>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FColemono&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=151435254924604" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px; float:left;" allowTransparency="true"   ></iframe>

			<object type="application/x-shockwave-flash" height="378" width="620" id="live_embed_player_flash" data="http://www.twitch.tv/widgets/live_embed_player.swf?channel=colemonotv" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=www.twitch.tv&channel=colemonotv&auto_play=true&start_volume=25" /></object>

		
<a class="twitter-timeline" href="https://twitter.com/search?q=%23ColemonoTV" data-widget-id="343956809607950336">Tweets sobre "#ColemonoTV"</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>





</div>



	<div id="chat">

		<img src="<?php echo get_template_directory_uri(); ?>/images/banner-ustream2.png">

		<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel=colemonotv&amp;popout_chat=true" height="500" width="315"></iframe>

	</div>
















</div>



<?php get_footer(); ?>