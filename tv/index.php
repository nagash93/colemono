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


get_header(tv); 


?>



<div id="main-content" class="<?php echo $van_page_type['type'] . ' ' . $van_page_type['container']; ?>">

	

		<!-- BEGIN MAIN -->

	

				<div id="banner">

					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-colemono.png">

				</div>

				<div id="cont">

				<div id="twitch" onclick="location.href='http://colemono.com/tv/1';" ></div>



				<div id="ustream" onclick="location.href='http://colemono.com/tv/2';" ></div>

				</div>








</div>



<?php get_footer(); ?>