<?php
/**
 * @package WordPress
 * @subpackage Evolutionary
 */
?>
<div id="searchcontainer">
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>">
	<p><input type="text" value="<?php echo (get_search_query() ? get_search_query() : 'Search this site...' ); ?>" name="s" id="s" /><input type="submit" value="Search" id="sbtn" /></p>
</form>
</div>
