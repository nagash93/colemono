<?php

add_action('init','of_options');

if (!function_exists('of_options')) {
function of_options(){
	
// VARIABLES
$themename = get_theme_data(STYLESHEETPATH . '/style.css');
$themename = $themename['Name'];
$shortname = "lp";

// Populate OptionsFramework option in array for use in theme
global $of_options;
$of_options = get_option('of_options');

$GLOBALS['template_path'] = OF_DIRECTORY;

//Access the WordPress Categories via an Array
$of_categories = array();  
$of_categories_obj = get_categories('hide_empty=0');
foreach ($of_categories_obj as $of_cat) {
    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
$categories_tmp = array_unshift($of_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$of_pages = array();
$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($of_pages_obj as $of_page) {
    $of_pages[$of_page->ID] = $of_page->post_name; }
$of_pages_tmp = array_unshift($of_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 

//Stylesheets Reader
$alt_stylesheet_path = OF_FILEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$uploads_arr = wp_upload_dir();
$all_uploads_path = $uploads_arr['path'];
$all_uploads = get_option('of_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// Set the Options Array
$options = array();

$options[] = array( "name" => "General Settings",
                    "type" => "heading");

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");
				
$options[] = array( "name" => "Theme Color",
					"desc" => "Select a theme color (blue by default)",
					"id" => $shortname."_theme_color",
					"std" => "blue",
					"type" => "select",
					"options" => array("blue","red","green","orange"));   
					
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");
				
$options[] = array( "name" => "Header Banner",
					"desc" => "Upload or enter an url to your 468px x 60px banner",
					"id" => $shortname."_header_banner",
					"std" => "",
					"type" => "upload");
				
$options[] = array( "name" => "Header Banner Link",
					"desc" => "Enter the full destination URL for your banner",
					"id" => $shortname."_header_banner_link",
					"std" => "",
					"type" => "text");
				
$options[] = array( "name" => "Homepage Settings",
                    "type" => "heading");
				
$options[] = array( "name" => "Include Reviews",
					"desc" => "Check to include reviews on the homepage",
					"id" => $shortname."_include_reviews",
					"std" => "false",
					"type" => "checkbox");
				
$options[] = array( "name" => "Include Videos",
					"desc" => "Check to include videos on the homepage",
					"id" => $shortname."_include_videos",
					"std" => "false",
					"type" => "checkbox");
				
$options[] = array( "name" => "Include Screenshots",
					"desc" => "Check to include screenshots on the homepage",
					"id" => $shortname."_include_screenshots",
					"std" => "false",
					"type" => "checkbox");
				
$options[] = array( "name" => "Featured Slider Options",
					"type" => "heading");
				
$options[] = array( "name" => "Number of Slides",
					"desc" => "Choose how many slides should be in the featured slider",
					"id" => $shortname."_slides_number",
					"std" => "5",
					"type" => "select",
					"options" => array("3","4","5","6","7","8","9","10"));   
				
$options[] = array( "name" => "Slider Transition Speed",
					"desc" => "Enter transition time for slider in milliseconds (default 5000)",
					"id" => $shortname."_slider_transition",
					"std" => "",
					"type" => "text");
    
$options[] = array( "name" => "Footer Options",
					"type" => "heading");
					
$options[] = array( "name" => "Footer Text Left",
					"desc" => "Here you can enter any text you want (eg. copyright text)",
					"id" => $shortname."_footer-text-left",
					"std" => "Copyright &copy; 2011 - LeetPress. All rights reserved.",
					"type" => "text");
				
$options[] = array( "name" => "Footer Text Right",
					"desc" => "Here you can enter any text you want",
					"id" => $shortname."_footer-text-right",
					"std" => "Web design by Sebastian Rosenkvist",
					"type" => "text");
				
$options[] = array( "name" => "Post Options",
					"type" => "heading");
				
$options[] = array( "name" => "Disable Author Box",
					"desc" => "Check to disable the author box",
					"id" => $shortname."_author_box",
					"std" => "false",
					"type" => "checkbox");
		
$options[] = array( "name" => "Disable Share Post",
					"desc" => "Check to disable the Share Post box on news, reviews, videos and screenshots",
					"id" => $shortname."_share_post",
					"std" => "false",
					"type" => "checkbox");
				
$options[] = array( "name" => "Share Facebook",
					"desc" => "Uncheck to disable Facebook in the Share Post box",
					"id" => $shortname."_share_post_facebook",
					"std" => "true",
					"type" => "checkbox"); 
				
$options[] = array( "name" => "Share Twitter",
					"desc" => "Uncheck to disable Twitter in the Share Post box",
					"id" => $shortname."_share_post_twitter",
					"std" => "true",
					"type" => "checkbox");
				
$options[] = array( "name" => "Share Myspace",
					"desc" => "Uncheck to disable Myspace in the Share Post box",
					"id" => $shortname."_share_post_myspace",
					"std" => "true",
					"type" => "checkbox");
				
$options[] = array( "name" => "Share Google",
					"desc" => "Uncheck to disable Google in the Share Post box",
					"id" => $shortname."_share_post_google",
					"std" => "true",
					"type" => "checkbox");
				
$options[] = array( "name" => "Share Reddit",
					"desc" => "Uncheck to disable Reddit in the Share Post box",
					"id" => $shortname."_share_post_reddit",
					"std" => "true",
					"type" => "checkbox");
				
$options[] = array( "name" => "Share Stumbleupon",
					"desc" => "Uncheck to disable Stumbleupon in the Share Post box",
					"id" => $shortname."_share_post_stumbleupon",
					"std" => "true",
					"type" => "checkbox");
				
$options[] = array( "name" => "Share Delicious",
					"desc" => "Uncheck to disable Delicious in the Share Post box",
					"id" => $shortname."_share_post_delicious",
					"std" => "true",
					"type" => "checkbox");
				
$options[] = array( "name" => "Share Digg",
					"desc" => "Uncheck to disable Digg in the Share Post box",
					"id" => $shortname."_share_post_digg",
					"std" => "true",
					"type" => "checkbox");
				
$options[] = array( "name" => "Share Technorati",
					"desc" => "Uncheck to disable Technorati in the Share Post box",
					"id" => $shortname."_share_post_technorati",
					"std" => "true",
					"type" => "checkbox");
				
$options[] = array( "name" => "Share Email",
					"desc" => "Uncheck to disable Email in the Share Post box",
					"id" => $shortname."_share_post_email",
					"std" => "true",
					"type" => "checkbox");
					
$options[] = array( "name" => "Social Media Options",
					"type" => "heading");      

$options[] = array( "name" => "Twitter",
					"desc" => "Enter your Twitter username here.",
					"id" => $shortname."_twitter",
					"std" => "",
					"type" => "text");
				
$options[] = array( "name" => "Disable Twitter icon",
					"desc" => "Check to disable the Twitter icon.",
					"id" => $shortname."_disable_twitter",
					"std" => "false",
					"type" => "checkbox");  

$options[] = array( "name" => "Facebook",
					"desc" => "Enter your Facebook username here.",
					"id" => $shortname."_facebook",
					"std" => "",
					"type" => "text");
				
$options[] = array( "name" => "Disable Facebook icon",
					"desc" => "Check to disable the Facebook icon.",
					"id" => $shortname."_disable_facebook",
					"std" => "false",
					"type" => "checkbox");

update_option('of_template',$options); 					  
update_option('of_themename',$themename);   
update_option('of_shortname',$shortname);

}
}
?>
