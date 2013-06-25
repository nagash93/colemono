<?php

//////////////////////////////////////////////////////////////////
// Register WordPress 3 menus
//////////////////////////////////////////////////////////////////
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'top-menu' => __( 'Top Menu' ),
			'footer-menu' => __( 'Footer Menu' )
		)
	);
}

//////////////////////////////////////////////////////////////////
// Register sidebar and footer widgets
//////////////////////////////////////////////////////////////////
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Main Sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Footer 1',
		'before_widget' => '<div class="footer-widget left">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer 2',
		'before_widget' => '<div class="footer-widget middle">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer 3',
		'before_widget' => '<div class="footer-widget middle">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer 4',
		'before_widget' => '<div class="footer-widget right">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

//////////////////////////////////////////////////////////////////
// Options Framework Functions
//////////////////////////////////////////////////////////////////

/* Set the file path based on whether the Options Framework is in a parent theme or child theme */

if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OF_FILEPATH', TEMPLATEPATH);
	define('OF_DIRECTORY', get_bloginfo('template_directory'));
} else {
	define('OF_FILEPATH', STYLESHEETPATH);
	define('OF_DIRECTORY', get_bloginfo('stylesheet_directory'));
}

/* These files build out the options interface.  Likely won't need to edit these. */

require_once (OF_FILEPATH . '/admin/admin-functions.php');		// Custom functions and plugins
require_once (OF_FILEPATH . '/admin/admin-interface.php');		// Admin Interfaces (options,framework, seo)

/* These files build out the theme specific options and associated functions. */

require_once (OF_FILEPATH . '/admin/theme-options.php'); 		// Options panel settings and custom settings
require_once (OF_FILEPATH . '/admin/theme-functions.php'); 	// Theme actions based on options settings


//////////////////////////////////////////////////////////////////
// Include function files
//////////////////////////////////////////////////////////////////
include("admin/widgets/widget-latest-news.php");
include("admin/widgets/widget-latest-reviews.php");
include("admin/widgets/widget-latest-media.php");
include("admin/widgets/widget-twitter.php");
include("admin/widgets/widget-ad300x250.php");
include("admin/widgets/widget-recent-comments.php");
include("admin/widgets/widget-highest-rated.php");
include("includes/pagination.php");
include("includes/aqua-resizer.php");
include("admin/custom_meta_box/featured-meta-box.php");

//////////////////////////////////////////////////////////////////
// Theme color
//////////////////////////////////////////////////////////////////
function leetpress_theme_color($lp_theme_color) {

	$blog_info = get_bloginfo('template_directory');
	
	if($lp_theme_color == 'blue' || $lp_theme_color == '') {
		return false;
	} elseif($lp_theme_color == 'red') {
		echo '<link rel="stylesheet" href="' . $blog_info . '/styles/red/red.css" type="text/css" media="screen" />';
	} elseif($lp_theme_color == 'green') {
		echo '<link rel="stylesheet" href="' . $blog_info . '/styles/green/green.css" type="text/css" media="screen" />';
	} elseif($lp_theme_color == 'orange') {
		echo '<link rel="stylesheet" href="' . $blog_info . '/styles/orange/orange.css" type="text/css" media="screen" />';
	}
	
}

//////////////////////////////////////////////////////////////////
// Removes ul class from wp_nav_menu
//////////////////////////////////////////////////////////////////
function remove_ul ( $menu ){
    return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );

//////////////////////////////////////////////////////////////////
// Post thumbnails
//////////////////////////////////////////////////////////////////
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 600, 300, true );
	add_image_size( 'review-thumb-small', 42, 60, true );
	add_image_size( 'review-thumb-big', 145, 204, true );
	add_image_size( 'media-thumb-small', 290, 140, true );
	add_image_size( 'screenshot-thumb', 140, 100, true );
	add_image_size( 'news-thumb-small', 60, 60, true );
	add_image_size( 'media-thumb-big', 300, 150, true );
	add_image_size( 'featured-slider' );
}

//////////////////////////////////////////////////////////////////
// Change excerpt from [...] to ...
//////////////////////////////////////////////////////////////////
function new_excerpt_more($more) {
       global $post;
	return '... <a href="'. get_permalink($post->ID) . '">Seguir leyendo &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//////////////////////////////////////////////////////////////////
// Change length of excerpt
//////////////////////////////////////////////////////////////////
function new_excerpt_length($length) {
	


	
global $post;
foreach((get_the_category()) as $category) {
      $foo = $foo.$category->cat_name . ',';
}
$arreglo = explode(',',$foo);

foreach($arreglo as $categoria){
    if($categoria=='novedades')
    return 160;
    else if ($categoria=='news')
    return 40;	
}

if ($post->post_type == 'post')
return 80;
else if ($post->post_type == 'reviews')
return 40;
else
return 80;
}
add_filter('excerpt_length', 'new_excerpt_length');

//////////////////////////////////////////////////////////////////
// How comments are displayed
//////////////////////////////////////////////////////////////////
function leetpress_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	
		<div class="the-comment">
		
			<?php echo get_avatar($comment,$size='60'); ?>
			
			<div class="comment-arrow"></div>
			
			<div class="comment-box">
			
				<div class="comment-author">
					<strong><?php echo get_comment_author_link() ?></strong>
					<small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('Edit'),'  ','') ?> - <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></small>
				</div>
			
				<div class="comment-text">
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
					<?php endif; ?>
					<?php comment_text() ?>
				</div>
			
			</div>
			
		</div>

<?php }

//////////////////////////////////////////////////////////////////
// Register reviews post type
//////////////////////////////////////////////////////////////////
add_action( 'init', 'register_reviews_post_type' );

function register_reviews_post_type() {
	register_post_type( 'reviews',
		array(
			'labels' => array(
				'name' => __( 'Reviews' ),
				'singular_name' => __( 'Review' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Review' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Review' ),
				'new_item' => __( 'New Review' ),
				'view' => __( 'View Review' ),
				'view_item' => __( 'View Review' ),
				'search_items' => __( 'Search Reviews' ),
				'not_found' => __( 'No reviews found' ),
				'not_found_in_trash' => __( 'No reviews found in Trash' ),
				'parent' => __( 'Parent Review' ),
			),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => false,
			'exclude_from_search' => false,
			'hierarchical' => false,
                        'rewrite' => array('slug'=>'review'),
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'author'),
			'taxonomies' => array('post_tag')
		)
	);
flush_rewrite_rules();
}

//////////////////////////////////////////////////////////////////
// Register reviews category taxonomy
//////////////////////////////////////////////////////////////////
add_action( 'init', 'create_review_category', 0 );

function create_review_category() 
{

  $labels = array(
    'name' => _x( 'Review Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Review Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Review Categories' ),
    'all_items' => __( 'All Review Categories' ),
    'parent_item' => __( 'Parent Review Category' ),
    'parent_item_colon' => __( 'Parent Review Category:' ),
    'edit_item' => __( 'Edit Review Category' ), 
    'update_item' => __( 'Update Review Category' ),
    'add_new_item' => __( 'Add New Review Category' ),
    'new_item_name' => __( 'New Review Category Name' ),
    'menu_name' => __( 'Categories' ),
  ); 	

  register_taxonomy('review_category',array('reviews'), array(
	'public' => true,
	'show_in_nav_menus' => true,
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
  ));

}

//////////////////////////////////////////////////////////////////
// Register videos post type
//////////////////////////////////////////////////////////////////
add_action( 'init', 'register_videos_post_type' );

function register_videos_post_type() {
	register_post_type( 'videos',
		array(
			'labels' => array(
				'name' => __( 'Videos' ),
				'singular_name' => __( 'Video' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Video' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Video' ),
				'new_item' => __( 'New Video' ),
				'view' => __( 'View Video' ),
				'view_item' => __( 'View Video' ),
				'search_items' => __( 'Search Videos' ),
				'not_found' => __( 'No videos found' ),
				'not_found_in_trash' => __( 'No videos found in Trash' ),
				'parent' => __( 'Parent Video' ),
			),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => false,
			'exclude_from_search' => false,
			'hierarchical' => false,
                        'rewrite' => array('slug'=>'video'),
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'author'),
			'taxonomies' => array('post_tag')
		)
	);
flush_rewrite_rules();
}

//////////////////////////////////////////////////////////////////
// Register videos category taxonomy
//////////////////////////////////////////////////////////////////
add_action( 'init', 'create_video_category', 0 );

function create_video_category() 
{

  $labels = array(
    'name' => _x( 'Video Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Video Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Video Categories' ),
    'all_items' => __( 'All Video Categories' ),
    'parent_item' => __( 'Parent Video Category' ),
    'parent_item_colon' => __( 'Parent Video Category:' ),
    'edit_item' => __( 'Edit Video Category' ), 
    'update_item' => __( 'Update Video Category' ),
    'add_new_item' => __( 'Add New Video Category' ),
    'new_item_name' => __( 'New Video Category Name' ),
    'menu_name' => __( 'Categories' ),
  ); 	

  register_taxonomy('video_category',array('videos'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
  ));
}

//////////////////////////////////////////////////////////////////
// Register screenshots post type
//////////////////////////////////////////////////////////////////
add_action( 'init', 'register_screenshots_post_type' );

function register_screenshots_post_type() {
	register_post_type( 'screenshots',
		array(
			'labels' => array(
				'name' => __( 'Screenshots' ),
				'singular_name' => __( 'Screenshots' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Screenshots' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Screenshots' ),
				'new_item' => __( 'New Screenshots' ),
				'view' => __( 'View Screenshots' ),
				'view_item' => __( 'View Screenshots' ),
				'search_items' => __( 'Search Screenshots' ),
				'not_found' => __( 'No screenshots found' ),
				'not_found_in_trash' => __( 'No screenshots found in Trash' ),
				'parent' => __( 'Parent Screenshots' ),
			),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => false,
			'exclude_from_search' => false,
			'hierarchical' => false,
                        'rewrite' => array('slug'=>'screenshot'),
			'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'author'),
			'taxonomies' => array('post_tag')
		)
	);
flush_rewrite_rules();
}

//////////////////////////////////////////////////////////////////
// Register videos category taxonomy
//////////////////////////////////////////////////////////////////
add_action( 'init', 'create_screenshots_category', 0 );

function create_screenshots_category() 
{

  $labels = array(
    'name' => _x( 'Screenshots Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Screenshots Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Screenshots Categories' ),
    'all_items' => __( 'All Screenshots Categories' ),
    'parent_item' => __( 'Parent Screenshots Category' ),
    'parent_item_colon' => __( 'Parent Screenshots Category:' ),
    'edit_item' => __( 'Edit Screenshots Category' ), 
    'update_item' => __( 'Update Screenshots Category' ),
    'add_new_item' => __( 'Add New Screenshots Category' ),
    'new_item_name' => __( 'New Screenshots Category Name' ),
    'menu_name' => __( 'Categories' ),
  ); 	

  register_taxonomy('screenshots_category',array('screenshots'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
  ));
}

//////////////////////////////////////////////////////////////////
// Register featured slider post type
//////////////////////////////////////////////////////////////////
add_action( 'init', 'register_slider_post_type' );

function register_slider_post_type() {
	register_post_type( 'slider',
		array(
			'labels' => array(
				'name' => __( 'Slider Items' ),
				'singular_name' => __( 'Slider Item' ),
				'add_new' => __( 'Add New' ),
				'add_new_item' => __( 'Add New Slider Item' ),
				'edit' => __( 'Edit' ),
				'edit_item' => __( 'Edit Slider Item' ),
				'new_item' => __( 'New Slider Item' ),
				'view' => __( 'View Slider Item' ),
				'view_item' => __( 'View Slider Item' ),
				'search_items' => __( 'Search Slider Items' ),
				'not_found' => __( 'No Slider Items found' ),
				'not_found_in_trash' => __( 'No Slider Items found in Trash' ),
				'parent' => __( 'Parent Slider Item' ),
			),
			'public' => true,
			'show_ui' => true,
			'publicly_queryable' => true,
			'show_in_nav_menus' => false,
			'exclude_from_search' => true,
			'hierarchical' => false,
			'supports' => array('title', 'thumbnail'),
		)
	);
}

//////////////////////////////////////////////////////////////////
// Register custom meta box for reviews
//////////////////////////////////////////////////////////////////
$prefix = 'leetpress_';

$meta_box = array(
    'id' => 'rating-meta-box',
    'title' => 'Review Info',
    'page' => 'reviews',
    'context' => 'normal',
    'priority' => 'high',
    'fields' => array(
		array(
            'name' => 'Review thumbnail',
            'desc' => 'Only insert a thumbnail for you review here if you are showing reviews on the homepage (thumbnail should be at least 600x300px). Insert full path to the image, eg. http://yoursite.com/thethumb.jpg',
            'id' => $prefix . 'review_thumb',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Overall Score',
            'desc' => 'Choose a number between 1-10 (eg. 9.7)',
            'id' => $prefix . 'overallscore',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'Criteria 1',
            'desc' => 'Enter a rating criteria (eg. Graphics)',
            'id' => $prefix . 'criteria1',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Criteria 1 Rating',
            'id' => $prefix . 'crit1_rating',
            'type' => 'select',
            'options' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10')
        ),
		array(
            'name' => 'Criteria 2',
            'desc' => '',
            'id' => $prefix . 'criteria2',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Criteria 2 Rating',
            'id' => $prefix . 'crit2_rating',
            'type' => 'select',
            'options' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10')
        ),
		array(
            'name' => 'Criteria 3',
            'desc' => '',
            'id' => $prefix . 'criteria3',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'name' => 'Criteria 3 Rating',
            'id' => $prefix . 'crit3_rating',
            'type' => 'select',
            'options' => array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10')
        ),
		array(
            'name' => 'The Good',
            'desc' => 'Enter the good things about the game and seperate them with "|". (eg. Great story | Outstanding soundtrack)',
            'id' => $prefix . 'good',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => 'The Bad',
            'desc' => 'Enter the bad things about the game and seperate them with "|". (eg. Buggy multiplayer | Very short campaign)',
            'id' => $prefix . 'bad',
            'type' => 'text',
            'std' => ''
        )
    )
);

add_action('admin_menu', 'mytheme_add_box');

// Add meta box
function mytheme_add_box() {
	global $meta_box;
	
	add_meta_box($meta_box['id'], $meta_box['title'], 'mytheme_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function mytheme_show_box() {
	global $meta_box, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="mytheme_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	
	echo '<table class="form-table">';

	foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		echo '<tr>',
				'<th style="width:20%"><label for="', $field['id'], '"><strong>', $field['name'], ':</strong></label></th>',
				'<td>';
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
					'<br /><small>', $field['desc'],'</small>';
				break;
			case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
					'<br />', $field['desc'];
				break;
			case 'select':
				echo '<select name="', $field['id'], '" id="', $field['id'], '">';
				foreach ($field['options'] as $option) {
					echo '<option', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
				}
				echo '</select>';
				break;
			case 'radio':
				foreach ($field['options'] as $option) {
					echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
				}
				break;
			case 'checkbox':
				echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
		}
		echo 	'<td>',
			'</tr>';
	}
	
	echo '</table>';
}

add_action('save_post', 'mytheme_save_data');

// Save data from meta box
function mytheme_save_data($post_id) {
	global $meta_box;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['mytheme_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($meta_box['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}
}


//////////////////////////////////////////////////////////////////
// Disable Automatic Formatting on Posts
//////////////////////////////////////////////////////////////////
function my_formatter($content) {
	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

add_filter('the_content', 'my_formatter', 99);


//////////////////////////////////////////////////////////////////
// Rating colors
//////////////////////////////////////////////////////////////////
function rating_color($the_overall_rating) {
	$tor = $the_overall_rating;
	if($tor >= '8') {
		echo 'green';
	} elseif($tor >= '6') {
		echo 'darkgreen';
	} elseif($tor >= '4') {
		echo 'yellow';
	} elseif($tor >= '2') {
		echo 'darkred';
	} elseif($tor >= '1') {
		echo 'red';
	}
	return;
}


//////////////////////////////////////////////////////////////////
// Youtube shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('youtube', 'shortcode_youtube');
	function shortcode_youtube($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<div class="video-shortcode"><iframe title="YouTube video player" width="' . $atts['width'] . '" height="' . $atts['height'] . '" src="http://www.youtube.com/embed/' . $atts['id'] . '" frameborder="0" allowfullscreen></iframe></div>';
	}
	
//////////////////////////////////////////////////////////////////
// Vimeo shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('vimeo', 'shortcode_vimeo');
	function shortcode_vimeo($atts) {
		$atts = shortcode_atts(
			array(
				'id' => '',
				'width' => 600,
				'height' => 360
			), $atts);
		
			return '<div class="video-shortcode"><iframe src="http://player.vimeo.com/video/' . $atts['id'] . '" width="' . $atts['width'] . '" height="' . $atts['height'] . '" frameborder="0"></iframe></div>';
	}
	
//////////////////////////////////////////////////////////////////
// Button shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('button', 'shortcode_button');
	function shortcode_button($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'color' => 'black',
				'link' => '#',
			), $atts);
		
			return '[raw]<span class="button ' . $atts['color'] . '"><a href="' . $atts['link'] . '" >' .do_shortcode($content). '</a></span>[/raw]';
	}
	
//////////////////////////////////////////////////////////////////
// Dropcap shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('dropcap', 'shortcode_dropcap');
	function shortcode_dropcap( $atts, $content = null ) {  
		
		return '<span class="dropcap">' .do_shortcode($content). '</span>';  
		
}
	
//////////////////////////////////////////////////////////////////
// Highlight shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('highlight', 'shortcode_highlight');
	function shortcode_highlight($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'color' => 'yellow',
			), $atts);
			
			if($atts['color'] == 'black') {
				return '<span class="highlight2">' .do_shortcode($content). '</span>';
			} else {
				return '<span class="highlight1">' .do_shortcode($content). '</span>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Check list shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('checklist', 'shortcode_checklist');
	function shortcode_checklist( $atts, $content = null ) {
	
	$content = str_replace('<ul>', '<ul class="checklist">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));
	
	return $content;
	
}

//////////////////////////////////////////////////////////////////
// Bad list shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('badlist', 'shortcode_badlist');
	function shortcode_badlist( $atts, $content = null ) {
	
	$content = str_replace('<ul>', '<ul class="badlist">', do_shortcode($content));
	$content = str_replace('<li>', '<li>', do_shortcode($content));
	
	return $content;
	
}

//////////////////////////////////////////////////////////////////
// Tabs shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('tabs', 'shortcode_tabs');
	function shortcode_tabs( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));

	$out .= '[raw]<div class="tabs-wrapper">[/raw]';
	
	$out .= '<ul class="tabs">';
	foreach ($atts as $tab) {
		$out .= '<li><a href="#">' .$tab. '</a></li>';
	}
	$out .= '</ul>';

	$out .= do_shortcode($content) .'[raw]</div>[/raw]';
	
	return $out;
}

add_shortcode('tab', 'shortcode_tab');
	function shortcode_tab( $atts, $content = null ) {
	extract(shortcode_atts(array(
    ), $atts));
	
	$out .= '[raw]<div class="tab-content">[/raw]' . do_shortcode($content) .'</div>';
	
	return $out;
}
	
//////////////////////////////////////////////////////////////////
// Toggle shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('toggle', 'shortcode_toggle');
	function shortcode_toggle( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title'      => '',
    ), $atts));
	
	$out .= '<h5 class="toggle"><a href="#">' .$title. '</a></h5>';
	$out .= '<div class="toggle-content">';
	$out .= '<div class="block">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	$out .= '</div>';
	
   return $out;
}
	
//////////////////////////////////////////////////////////////////
// Column one_half shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_half', 'shortcode_one_half');
	function shortcode_one_half($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="one_half last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="one_half">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column one_third shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_third', 'shortcode_one_third');
	function shortcode_one_third($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="one_third last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="one_third">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column two_third shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('two_third', 'shortcode_two_third');
	function shortcode_two_third($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="two_third last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="two_third">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column one_fourth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('one_fourth', 'shortcode_one_fourth');
	function shortcode_one_fourth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="one_fourth last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="one_fourth">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Column three_fourth shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('three_fourth', 'shortcode_three_fourth');
	function shortcode_three_fourth($atts, $content = null) {
		$atts = shortcode_atts(
			array(
				'last' => 'no',
			), $atts);
			
			if($atts['last'] == 'yes') {
				return '<div class="three_fourth last">' .do_shortcode($content). '</div><div class="clearboth"></div>';
			} else {
				return '<div class="three_fourth">' .do_shortcode($content). '</div>';
			}

	}
	
//////////////////////////////////////////////////////////////////
// Gameinfo shortcode
//////////////////////////////////////////////////////////////////
add_shortcode('gameinfo', 'shortcode_gameinfo');
	function shortcode_gameinfo( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title' => 'Game Info',
		'game_name' => '',
		'developers' => '',
		'publishers' => '',
		'platforms' => '',
		'genres' => '',
		'release_date' => '',
    ), $atts));
	
	$out .= '<h5 class="gameinfo"><a href="#">' .$title. '</a></h5>';
	$out .= '<div class="gameinfo-content">';
	$out .= '<div class="gameinfo-block">';
	if($game_name) { $out .= '<p class="gameinfo-item"><strong>GAME NAME:</strong> ' .$game_name. '</p>'; }
	if($developers) { $out .= '<p class="gameinfo-item"><strong>DEVELOPER(S):</strong> ' .$developers. '</p>'; }
	if($publishers) { $out .= '<p class="gameinfo-item"><strong>PUBLISHER(S):</strong> ' .$publishers. '</p>'; }
	if($platforms) { $out .= '<p class="gameinfo-item"><strong>PLATFORM(S):</strong> ' .$platforms. '</p>'; }
	if($genres) { $out .= '<p class="gameinfo-item"><strong>GENRE(S):</strong> ' .$genres. '</p>'; }
	if($release_date) { $out .= '<p class="gameinfo-item"><strong>RELEASE DATE(S):</strong> ' .$release_date. '</p>'; }
	$out .= '</div>';
	$out .= '</div>';
	
   return $out;
}
	
	
//////////////////////////////////////////////////////////////////
// Add buttons to tinyMCE
//////////////////////////////////////////////////////////////////
add_action('init', 'add_button');

function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
     add_filter('mce_external_plugins', 'add_plugin');  
     add_filter('mce_buttons_3', 'register_button');  
   }  
}  

function register_button($buttons) {  
   array_push($buttons, "youtube", "vimeo", "button", "dropcap", "highlight", "checklist", "badlist", "tabs", "toggle", "gameinfo", "one_half", "one_third", "two_third", "one_fourth", "three_fourth");  
   return $buttons;  
}  

function add_plugin($plugin_array) {  
   $plugin_array['youtube'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['vimeo'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['button'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['dropcap'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['highlight'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['checklist'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['badlist'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['tabs'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['toggle'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['gameinfo'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['one_half'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['one_third'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['two_third'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['one_fourth'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   $plugin_array['three_fourth'] = get_template_directory_uri().'/admin/tinymce/customcodes.js';
   return $plugin_array;  
}  


function custom_post_author_archive( &$query )
{
    if ( $query->is_author || $query->is_tag)
        $query->set( 'post_type', array('post','reviews','screenshots','videos') );
    remove_action( 'pre_get_posts', 'custom_post_author_archive' ); // run once!
}
add_action( 'pre_get_posts', 'custom_post_author_archive' );

/*-----------------------------------------------------------------------------------*/
/* Fixes
/*-----------------------------------------------------------------------------------*/
//set main query to include post types
function aq_fix_query( $query ) {
    if( $query->is_main_query() && $query->is_home() ) {
        $query->set( 'post_type', array( 'post', 'review', 'videos', 'screenshots' ) );
    }
}
add_action( 'pre_get_posts', 'aq_fix_query' );

/*---------------------------------------------------*/
/* Agregar campos adicionales al perfil de usuario
/*---------------------------------------------------*/

//Agregar nuevos campos
function extended_contact_info($user_contactmethods) {  
   $user_contactmethods = array(
      'twitter' => __('Twitter <span class="description">(Sin @)</span>')
      
   );  

   return $user_contactmethods;
}  
//Eliminar campos de usuarios
function remove_profil_info($removeInfo){
   unset($contactmethods['aim']);
   unset($contactmethods['jabber']);
   
        return $removeInfo;
}
add_filter('user_contactmethods', 'extended_contact_info');
add_filter('user_contactmethods', 'extended_contact_info');