<?php
/*
Plugin Name: mlPostSlider
Plugin URI: http://www.mlipinski.pl/plugins/mlPostSlider
Description: Display your slides (special post type) in widget slider.
Version: 1.3
Author: Michal Lipinski
Author URI: http://www.mlipinski.pl
License: GPLv2
*/
add_action( 'widgets_init', 'ml_post_slider_init');
add_action( 'init','ml_add_script_library');
add_action( 'init','ml_add_admin_slider_box');
add_action('admin_head', 'plugin_header');

add_filter( 'manage_ml_post_slider_posts_columns', 'ml_add_column',1,2 );
add_action('manage_ml_post_slider_posts_custom_column', 'ml_fill_custom_column', 10, 2);



function plugin_header() {
        global $post_type;
    ?>
    <style>
    <?php if (($_GET['post_type'] == 'ml_post_slider') || ($post_type == 'ml_post_slider')) : ?>
    #icon-edit { background:transparent url('<?php echo plugin_dir_url(__FILE__).'images/ico32.png';?>') no-repeat; }     
    <?php endif; ?>
        </style>
        <?php
}

// Here is new function in ver 1.1. Here we add own post category (ml_post_slide) and own taxonomy (something like categories in posts)
function ml_add_admin_slider_box(){
	$args=array('public'=>true,
				'hierarchical' => true,
				'query_var' => 'ml_post_slide',
				'exclude_from_search'=>false,
				'supports' => array('editor','title'),
				'menu_icon' => plugin_dir_url(__FILE__).'images/ico.png',
				'taxonomies' => array('ml_post_slider_categories'),
				'labels' => array( 	'name'=> 'ML Post Slider',
									'singular_name'=> 'Slide',
									'new_item' => 'Slides',
									'all_items' => 'Slides')
				);
	$args_tax=array('hierarchical' => true,
					'query_var' => 'ml_post_slider_categories',
					'public' => true,
					'rewrite' => array('hierarchical' =>true),
					'show_tagcloud' => true,
					'labels' => array(	'name'=> 'Slides categories',
										'singular_name' => 'Slides cateogries',
										'add_new_item' => 'Add new category'
										)
					);
	register_taxonomy('ml_post_slider_categories', array('ml_post_slider'), $args_tax);
	register_post_type ( 'ml_post_slider', $args);
}

//function add all important librares like jQuery or Cycle
function ml_add_script_library(){
wp_enqueue_script( 'jquery');
$plugin_dir= plugin_dir_url(__FILE__);
wp_enqueue_script( 'jquerycycle' , $plugin_dir.'js/jquery-cycle.js');
}

//Here add custom column in ML Post Slider page in adminbar
function ml_add_column($defaults) {
$cols = array(
    'cb'       => '<input type="checkbox" />',
    'title'      => __( 'Title',      'trans' ),
    'ml_post_slider_categories' => __( 'Slider category', 'trans' ),
    'date'     => __( 'Date', 'trans' ),
  );
  return $cols;
}
function ml_fill_custom_column($column_name, $post_id) {
    $taxonomy = $column_name;
    $post_type = get_post_type($post_id);
    $terms = get_the_terms($post_id, $taxonomy);
 
    if ( !empty($terms) ) {
        foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
        echo join( ', ', $post_terms );
    }
    else echo '<i>No terms.</i>';
}
//------------------------------------

//Here we initialize our widget
function ml_post_slider_init(){
	register_widget('ml_post_slider_widget' );
}

// Here we start created widget class
class ml_post_slider_widget extends WP_Widget{
	// Standart function which give some informations of widget
	function ml_post_slider_widget (){
		$widget_ops= array(
			'classname' => 'ml_post_slider_widget',
			'description' => 'With this widget you can create professional slider in your website.');
			$this->WP_Widget( 'ml_post_slider_widget' , 'ML Post Slider', $widget_ops );
	}
	
	// Standard function which display form in widget in admin-menu
	function form($instance){
		$defaults= array( 'ml_category' => '', 'ml_width' => 100, 'ml_height'=> 100, 'ml_delay' => 1000, 'ml_unique_id' => date('Ymdhis'), 'ml_effect' => 'fade');
		$instance = wp_parse_args( (array) $instance, $defaults);
		$ml_category = $instance['ml_category'];
		$ml_width= $instance['ml_width'];
		$ml_height= $instance['ml_height'];
		$ml_unique_id= $instance['ml_unique_id'];
		$ml_delay = $instance['ml_delay'];
		$ml_effect = $instance['ml_effect'];
		$ml_arrows= $instance['ml_arrows'];
		$ml_pager= $instance['ml_pager'];
		?>
		<input type="hidden" name="<?php echo $this->get_field_name('ml_unique_id'); ?>" value="<?php echo date('Ymdhis'); ?>" />
		<p>Slider Category: 
		<select name="<?php echo $this->get_field_name('ml_category'); ?>">
		<?php
		$categories = get_terms( 'ml_post_slider_categories', array(
			'orderby'    => 'count',
			
		) );
		foreach ($categories as $kategoria) {
		?>
			<option value="<?php echo $kategoria->name ?>" <?php selected($ml_category, $kategoria->name) ?>><?php echo $kategoria->name ?></option>
		<?php
		} 
		?>
		</select></p>
		<p>Slider width:
			<input type="text" name="<?php echo $this->get_field_name('ml_width'); ?>" value="<?php echo esc_attr( $ml_width); ?>" size="3" /> <i>[px]</i>
		</p>
		<p>Slider height:
			<input type="text" name="<?php echo $this->get_field_name('ml_height'); ?>" value="<?php echo esc_attr( $ml_height); ?>" size="3" /> <i>[px]</i>
		</p>
		<p>Delay:
			<input type="text" name="<?php echo $this->get_field_name('ml_delay'); ?>" value="<?php echo esc_attr( $ml_delay/1000); ?>" size="3" /> <i>[sec.]</i>
		</p>
		<p>Effect: 
		<select name="<?php echo $this->get_field_name('ml_effect'); ?>">
			<option value="fade" <?php selected($ml_effect, 'fade') ?>>fade</option>
			<option value="scrollHorz" <?php selected($ml_effect, 'scrollHorz') ?>>scroll horizontal</option>
			<option value="scrollVert" <?php selected($ml_effect, 'scrollVert') ?>>scroll vertical</option>
			<option value="none" <?php selected($ml_effect, 'none') ?>>none</option>
		</select></p>
		<p>Navigation arrows<i>[on/off]:</i>
			<input name="<?php echo $this->get_field_name( 'ml_arrows' ); ?>" type="checkbox" <?php checked( $ml_arrows, 'on'); ?> /></p>
		<p>Pager<i>[on/off]:</i>
			<input name="<?php echo $this->get_field_name( 'ml_pager' ); ?>" type="checkbox" <?php checked( $ml_pager, 'on'); ?> /></p>
		<?php
	}
	// Standard function to update all values
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		if (strlen(sanitize_text_field($new_instance['ml_category']))<255) $instance['ml_category']= sanitize_text_field($new_instance['ml_category']);
		if (sanitize_text_field(is_numeric($new_instance['ml_width'])) && (strlen($new_instance['ml_width'])<5)) $instance['ml_width']= abs(sanitize_text_field($new_instance['ml_width']));
		if (sanitize_text_field(is_numeric($new_instance['ml_height'])) && (strlen($new_instance['ml_width'])<5)) $instance['ml_height']= abs(sanitize_text_field($new_instance['ml_height']));
		if ((!isset($instance['ml_unique_id'])) && (is_numeric($new_instance['ml_unique_id'])) && (strlen($new_instance['ml_unique_id']) ==14)) $instance['ml_unique_id']= abs($new_instance['ml_unique_id']);
		if ((is_numeric($new_instance['ml_delay'])) && (strlen($new_instance['ml_delay'])<3)) $instance['ml_delay']= abs($new_instance['ml_delay']*1000);
		switch (sanitize_text_field($new_instance['ml_effect'])){
			case 'scrollHorz': $instance['ml_effect'] = 'scrollHorz'; break;
			case 'scrollVert': $instance['ml_effect'] = 'scrollVert'; break;
			case 'none': $instance['ml_effect'] = 'none'; break;
			default: $instance['ml_effect'] = 'fade';
		}
		$instance['ml_arrows'] = sanitize_text_field($new_instance['ml_arrows']);
		$instance['ml_pager'] = sanitize_text_field($new_instance['ml_pager']);
		return $instance;
	}

// Here is the most important function. This function displays Slider. If you want change something, please do it here;)
	function widget($args, $instance){
		wp_register_style( 'ml-post-slider-style', plugins_url('/css/style.css', __FILE__) );
		wp_enqueue_style( 'ml-post-slider-style' );
		$delay=$instance['ml_delay'];
		global $post;
		$args=array('post_type' => 'ml_post_slider', 'post_status' => 'publish', 'ml_post_slider_categories' => $instance['ml_category'], 'order' => 'ASC', 'numberposts'     => 100);
		$posts_array = get_posts( $args );
		//Insert Cycle plugin in to any copy of widget
		echo '<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery(".ml_post_slider'.$instance['ml_unique_id'].'").cycle({
						cleartype: true,
						cleartypeNoBg: true,
						fx: "'.$instance['ml_effect'].'", 
						timeout: '.$delay.',
						prev: "#prev'.$instance['ml_unique_id'].'",
						next: "#next'.$instance['ml_unique_id'].'",';
		// if pager is on display it:
		if (isset($instance['ml_pager']) && ($instance['ml_pager']=='on')) echo 'pager: "#nav'.$instance['ml_unique_id'].'"';
					echo '});';
		// Display navigation arrows if it is "on"
		if (isset($instance['ml_arrows']) && ($instance['ml_arrows']=='on'))
			echo ' 	jQuery(".parrent_ml_post_slider'.$instance['ml_unique_id'].'").hover(function() {
					jQuery("#next'.$instance['ml_unique_id'].'").fadeIn();
					jQuery("#prev'.$instance['ml_unique_id'].'").fadeIn();
					},
					function() {
						jQuery("#next'.$instance['ml_unique_id'].'").fadeOut();
						jQuery("#prev'.$instance['ml_unique_id'].'").fadeOut();
					});	';
		//------------------------------------------------
		// Here is start/stop slider when coursor is hover slider. If you don't want start/stop effect please cut this code
		echo 'jQuery(".parrent_ml_post_slider'.$instance['ml_unique_id'].'").hover(function() { 
				jQuery(".ml_post_slider'.$instance['ml_unique_id'].'").cycle("pause"); 
			},function() {
				jQuery(".ml_post_slider'.$instance['ml_unique_id'].'").cycle("resume");
			});	
		});</script>';
		//------------------------------------------------
		
		// Below is parrent div. Here you can add some frames, shaddows ect.
		echo '<div class="parrent_ml_post_slider'.$instance['ml_unique_id'].'" style="position:relative; display:block;width:'.($instance['ml_width']).'px; height:'.($instance['ml_height']).'px;">';
		// This div contains all slides without navigation arrows
		echo '<div class="ml_post_slider'.$instance['ml_unique_id'].'" style="overflow:hidden;background-colour:transparent;position:relative;">'; 
		foreach($posts_array as $post){
			echo '<div style="width:'.$instance['ml_width'].'px; height:'.$instance['ml_height'].'px; overflow:hidden;">'.do_shortcode($post->post_content).'</div>';
		}
		echo '</div><div id="nav'.$instance['ml_unique_id'].'" class="mlpspager"></div>
			<div id="prev'.$instance['ml_unique_id'].'" class="mlpsarrowprev" style="top:'.($instance['ml_height']/2-25).'px;"><a href="#">Prev</a></div>
			<div id="next'.$instance['ml_unique_id'].'" class="mlpsarrownext" style="top:'.($instance['ml_height']/2-25).'px; "><a href="#">Next</a></div>
		</div>
		';
	}
}

?>