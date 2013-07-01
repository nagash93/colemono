<?php
/**
 * @package WordPress
 * @subpackage Evolutionary
 */

automatic_feed_links();

$templateurl = get_bloginfo('template_url');
$my_widget_num = 0;

$themename = "Evolutionary Theme";
$shortname = "ev";
$options = array (

array(    "name" => "Welcome to the Evolutionary Theme Admin Panel",
        "type" => "title"),

array(    "type" => "open"),

array(    "name" => "Copyright Name",
        "desc" => "Enter your name or company name to be included in copyright.",
        "id" => $shortname."_copyright",
        "std" => "",
        "type" => "text"),

array("name" => "Theme Color",
"desc" => "Select your theme color.",
"id" => $shortname."_theme_color",
"options" => array('blue', 'green', 'red', 'black'),
"std" => "blue",
"type" => "select"),

array(    "type" => "close"),

array(    "name" => "Navigation",
        "type" => "title"),

array(    "type" => "open"),

array(  "name" => "Don't add Home page link to Nav?",
        "desc" => "If you are using a static home page, you will want to check this.",
        "id" => $shortname."_hide_homepage",
        "type" => "checkbox",
        "std" => "false"),

array(  "name" => "Disable secondary navigation?",
        "desc" => "If you don't want sub navigation to show on your pages check this.",
        "id" => $shortname."_secondary_nav",
        "type" => "checkbox",
        "std" => "false"),

array(  "name" => "Show multiple levels in footer?",
        "desc" => "This does not look pretty without custom styling.",
        "id" => $shortname."_footer_multi",
        "type" => "checkbox",
        "std" => "false"),

array(    "type" => "close"),

array(    "name" => "Featured Posts",
        "type" => "title"),

array(    "type" => "open"),

array(  "name" => "Features only on front page?",
        "desc" => "Check this box if you only want to display Featured Posts on the front page. Unchecking will show featured posts when viewing 'Older Entries' as well.",
        "id" => $shortname."_features_front",
        "type" => "checkbox",
        "std" => "false"),
        
array(  "name" => "Don't pause Features on mouseover?",
        "desc" => "Check this box if you DON'T want the Featured Posts to halt when a user mouses over them.",
        "id" => $shortname."_features_pause",
        "type" => "checkbox",
        "std" => "false"),

array(    "name" => "Featured Speed",
        "desc" => "Enter the delay (in seconds) between rotations of the Featured Posts section.",
        "id" => $shortname."_features_speed",
        "std" => "5",
        "type" => "text"),

array(    "type" => "close"),

array(    "name" => "Advertisements",
        "type" => "title"),

array(    "type" => "open"),

array(    "name" => "AD #1 Link",
        "desc" => "Enter the link for AD #1",
        "id" => $shortname."_ad1_link",
        "std" => "",
        "type" => "text"),

array(    "name" => "AD #1 Image",
        "desc" => "Enter the full url to the image for AD #1",
        "id" => $shortname."_ad1_image",
        "std" => "",
        "type" => "text"),

array(    "name" => "AD #2 Link",
        "desc" => "Enter the link for AD #1",
        "id" => $shortname."_ad2_link",
        "std" => "",
        "type" => "text"),

array(    "name" => "AD #2 Image",
        "desc" => "Enter the full url to the image for AD #1",
        "id" => $shortname."_ad2_image",
        "std" => "",
        "type" => "text"),

array(    "name" => "AD #3 Link",
        "desc" => "Enter the link for AD #1",
        "id" => $shortname."_ad3_link",
        "std" => "",
        "type" => "text"),

array(    "name" => "AD #3 Image",
        "desc" => "Enter the full url to the image for AD #1",
        "id" => $shortname."_ad3_image",
        "std" => "",
        "type" => "text"),

array(    "name" => "AD #4 Link",
        "desc" => "Enter the link for AD #1",
        "id" => $shortname."_ad4_link",
        "std" => "",
        "type" => "text"),

array(    "name" => "AD #4 Image",
        "desc" => "Enter the full url to the image for AD #1",
        "id" => $shortname."_ad4_image",
        "std" => "",
        "type" => "text"),
        
array(    "type" => "close")

);

function ev_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'ev_admin');

}

function ev_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">

<?php break;

case "close":
?>

</table><br />

<?php break;

case "title":
?>
<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
    <td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php break;

case 'text':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
    <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
    <tr>
    <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
        <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                </td>
    </tr>

    <tr>
        <td><small><?php echo $value['desc']; ?></small></td>
   </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php         break;

}
}
?>
<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

/* Register Sidebars */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Footer',
    	'before_widget' => '<li id="%1$s" class="widget %2$smy_widget_class_to_replace">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

function tg_nav_menu() {
?>
		<ul id="main-menu-nav">
	<?php
			if (get_option('ev_hide_homepage', FALSE) == FALSE) { ?><li<?php if (is_front_page()) { echo ' class="current_page_item"'; } ?>><a href="<?php echo get_option('home'); ?>" title="Home"><span>Home</span></a></li><?php }
			
			wp_list_pages("depth=1&title_li=&link_before=<span>&link_after=</span>"); ?>
			
			<li class="last"><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe" class="rss"><span><img src="<?php echo get_bloginfo('template_url'); ?>/images/icons/rss.png" alt="RSS Feed" /></span></a></li>
		</ul>
	<?php
}

/* add actions and filters */
add_action('admin_menu', 'ev_add_admin');
add_action('wp_enqueue_scripts', 'ev_scripts');
add_filter('the_content_more_link', 'ev_morelink');
add_filter('dynamic_sidebar_params','ev_widget_counter');

function ev_widget_counter($params) {

	global $my_widget_num, $templateurl;
	
	$class = '';
	if ($params[0]['name'] == 'Footer')
	{
		$my_widget_num++;
		if ($my_widget_num == 3) 
		{
			$class = ' widget-last';
			$my_widget_num = 0;
		}
		elseif ($my_widget_num == 1)
		{
			$class = ' widget-first';
		}
	}

	$params[0]['before_widget'] = str_replace('my_widget_class_to_replace', $class, $params[0]['before_widget']);	
	
	if (strtolower($params['0']['widget_name']) == 'twitter' || strtolower($params['0']['widget_name']) == 'twitter tools')
	{
		$params[0]['before_title'] .= '<img src="'.$templateurl.'/images/icons/twitter.png" alt="" />';
	}

	return $params;
}

function ev_scripts()
{
	global $templateurl;
	
	// get some settings to pass to javascript.
	
	$secs = intval(get_option('ev_features_speed'));
	if ($secs <= 0) { $secs = 5; }
	$secs = $secs * 1000;	
	
	if (get_option('ev_features_pause') === FALSE) { $pause = "false"; } else {	$pause = "true"; }
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('cufon', $templateurl . '/js/cufon.js', array('jquery'));
	wp_enqueue_script('adventpro', $templateurl . '/js/adventpro-bd1_400-adventpro-bd1_400.font.js', array('cufon'));
	wp_enqueue_script('headscripts', $templateurl . '/js/headscripts.js', array('adventpro'));
	wp_enqueue_script('scrollto', $templateurl . '/js/jquery.scrollTo-min.js', array(), false, true);
	wp_enqueue_script('localscroll', $templateurl . '/js/jquery.localscroll-min.js', array('scrollto'), false, true);
	wp_enqueue_script('scripts', $templateurl . '/js/scripts.js', array('jquery'), false, true);
	wp_localize_script('scripts', 'scsettings', array('speed' => $secs, 'dontpause' => $pause));
}

function ev_submenu() {
    global $post;  
    
  	$menu = '';
    // Get post ancestors   
    $post_ancestors = get_post_ancestors($post);  
  
    // Check if a page has any parent pages  
    if ($post_ancestors) {  
        //get the top page id  
        $top_page = $post_ancestors ? end($post_ancestors) : $post->ID;  
		
        // How many ancestors does this page have? Counts the array adds one.  
        $n = count($post_ancestors) + 1;  

		if (count($post_ancestors) >= 2) 
		{ 
			$top_page = $post_ancestors[0];
		}
        // Get the pages children, if it has any  
        $pages = get_pages();  
        $page_children = get_page_children($post->ID, $pages);  
  
        // Checks if a page has children  
        if (!empty($page_children)) 
        {  
            $children = wp_list_pages("title_li=&child_of=". $top_page ."&echo=0&depth=1");
            $children2 = wp_list_pages("title_li=&child_of=". $post->ID ."&echo=0&depth=1");   
        } else { 
        	// If the page doesn't have children
        	if (count($post_ancestors) >= 2)
        	{
	            $children = wp_list_pages("title_li=&child_of=". $post_ancestors[1] ."&echo=0&depth=1");
    	        $children2 = wp_list_pages("title_li=&child_of=". $top_page ."&echo=0&depth=1"); 
    	    }
    	    else
    	    {
				$children = wp_list_pages("title_li=&child_of=". $top_page ."&echo=0&depth=" . ($n - 1));  
    	    }
        }  
  
    } else {
    
        $children = wp_list_pages("title_li=&child_of=". $post->ID ."&echo=0&sort_column=menu_order&depth=1");  
    }  
  
    // Only show child navigation if there are children  
    if ( $children ) {  
        $menu .= '<ul id="subnav">';  
        $menu .= $children;  
        $menu .= '</ul>';  
    }
    if ( $children2 ) {  
        $menu .= '<ul id="subnav2">';  
        $menu .= $children2;  
        $menu .= '</ul>';  
    }  
    print $menu;  
} 

function ev_morelink($link)
{
	return '<p class="readmore">'.$link.'</p>';
}

function ev_comment($comment, $args, $depth) {
   global $templateurl;
   $GLOBALS['comment'] = $comment; ?>
   <li <?php $class = comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
      <div class="comment_author">
         <?php echo get_avatar($comment,$size='80'); ?>

         <?php printf(__('<p><cite>%s</cite>'), get_comment_author_link()) ?></p>
      </div>
      <img src="<?php echo $templateurl; ?>/images/misc/comment.png" alt="" class="commentimg" />
      <div class="comment_text_container">
      	<div class="comment_text">
	  	<?php if ($comment->comment_approved == '0') : ?>
      		<p><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
      		<?php endif; ?>
      		<?php comment_text() ?>
    	  </div>
	      <p class="metadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" class="comment_date"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('Edit'),'','') ?><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'Reply'))) ?></p>
      </div>
<?php
}

function ev_advertisements()
{

	for ($i=1;$i<=4;$i++)
	{
		$url = get_option('ev_ad'.$i.'_link');
		$image = get_option('ev_ad'.$i.'_image');
		
		if ($url != '' && $image != '') { $ads[] = array('url' => $url, 'image' => $image); }
	}
	
	return $ads;
}

function ev_popular_posts($args) {
   global $wpdb;
   
   extract($args);
   $strbuidler = '';

   $data = get_option('whos_talking');
   if ($data['whos_talking_number'] > 15) $data['whos_talking_number'] = 15;
   elseif ($data['whos_talking_number'] <= 0) $data['whos_talking_number'] = 5;
   $limit = $data['whos_talking_number'];
	  
    // popular posts
    $result = $wpdb->get_results("SELECT comment_count, ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' ORDER BY comment_count DESC LIMIT 0 , ".$limit);
    foreach ($result as $post) {
	    setup_postdata($post);
	    $postId = $post->ID;
	    $title = $post->post_title;
	    $commentCount = $post->comment_count;
	         
	    if ($commentCount != 0) {
	        $strbuidler .= '<li>';
	        $strbuidler .= '<a href="' . get_permalink($postId) . '" title="' . $title . '">' . $title . ' ';
	        $strbuidler .= '(' . $commentCount . ')</a>';
	        $strbuidler .= '</li>';
	    }
    }
    
    if ($strbuidler == '') 
    { 
    	$strbuidler = '<li>No one has said anything yet.</li>'; 
    }

    // recent comments
    $strbuidler2 = '';
    $result = $wpdb->get_results("SELECT c.comment_author, c.comment_content, c.comment_post_ID, p.post_title, p.ID FROM $wpdb->comments as c INNER JOIN $wpdb->posts as p ON (p.ID=c.comment_post_ID) WHERE c.comment_approved = 1 ORDER BY comment_date DESC LIMIT 0 , ".$limit);
    foreach ($result as $comment) {
	    setup_postdata($comment);
	    $postId = $comment->ID;
	    $title = $comment->post_title;
	    $author = $comment->comment_author;
	    $content = strip_tags($comment->comment_content);
	    if (strlen($content) > 70) $content = substr($content, 0, 70).'&#8230;';
	    
	    $strbuidler2 .= '<li>';
	    $strbuidler2 .= '<a href="' . get_permalink($postId) . '" title="' . $title . '">' . $author.' on ' . $title;
	    $strbuidler2 .= '<span>&ldquo;'.$content.'&rdquo;</span></a>';
	    $strbuidler2 .= '</li>';

    }
    
    if ($strbuidler2 == '') 
    { 
    	$strbuidler2 = '<li>No one has said anything yet.</li>'; 
    }
	
  	switch ($data['whos_talking_order'])
    {
      	case "popular_posts":
  		$nav1 = '<a href="#widget_popular">Popular Posts</a>';
	  	$nav2 = '<a href="#widget_comments">Recent Comments</a>';
  		$ul1 = '<ul id="widget_popular">'.$strbuidler.'</ul>';
		$ul2 = '<ul id="widget_comments">'.$strbuidler2.'</ul>';
  		break;
  		
	  	case "recent_comments":
  		default:
	  	$nav1 = '<a href="#widget_comments">Recent Comments</a>';
  		$nav2 = '<a href="#widget_popular">Popular Posts</a>';
		$ul1 = '<ul id="widget_comments">'.$strbuidler2.'</ul>';
  		$ul2 = '<ul id="widget_popular">'.$strbuidler.'</ul>';
		break;
    }
    
    echo $before_widget;
    echo $before_title . stripslashes($data['whos_talking_title']) . $after_title;
    echo '<ul class="widgetnav"><li class="current">'.$nav1.'</li><li class="last">'.$nav2.'</li></ul>';
    echo $ul1;
    echo $ul2;
    echo $after_widget;
    
}
function ev_popular_posts_control(){
  $data = get_option('whos_talking');
  switch ($data['whos_talking_order'])
  {
  	case "popular_posts":
  	$select = "";
  	$select2 = " SELECTED";
  	break;
  	case "recent_comments":
  	default:
  	$select = " SELECTED";
  	$select2 = "";
  	break;
  }
  ?>
  <p><label>Title: </label><input name="whos_talking_title" type="text" value="<?php echo stripslashes($data['whos_talking_title']); ?>" /></p>
  <p><label>Number to Show (max 15): </label><input name="whos_talking_number" type="text" value="<?php echo $data['whos_talking_number']; ?>" /></p>
  <p><label>Default (which shows first?):</label> 
  <select name="whos_talking_order">
  	  <option value="recent_comments"<?php echo $select; ?>>Recent Comments</option>
  	  <option value="popular_posts"<?php echo $select2; ?>>Popular Posts</option>
  	  </select></p>
  <?php
   if (isset($_POST['whos_talking_order'])){
    $data['whos_talking_number'] = intval($_POST['whos_talking_number']);
    if ($data['whos_talking_number'] > 15) $data['whos_talking_number'] = 15;
    elseif ($data['whos_talking_number'] <= 0) $data['whos_talking_number'] = 5;
    $data['whos_talking_title'] = attribute_escape($_POST['whos_talking_title']);
    $data['whos_talking_order'] = attribute_escape($_POST['whos_talking_order']);
    update_option('whos_talking', $data);
  }
}

register_sidebar_widget('Who\'s Talking', ev_popular_posts);
register_widget_control('Who\'s Talking', ev_popular_posts_control);
