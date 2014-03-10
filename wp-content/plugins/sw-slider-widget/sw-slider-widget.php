<?php
/**
 * Plugin Name: SW Slider Widget
 * Plugin URI: http://smartaddons.com
 * Description: This slideshow support 3 themes and beautyful effects.
 * Version: 1.0
 * Author: smartaddons.com
 * Author URI: http://smartaddons.com
 *
 * This Widget help you to show images of content as a beauty reponsive slideshow
 */

add_action( 'widgets_init', 'sw_slider_load_widgets' );
add_action('init', load_slide_script);
/**
 * Register our widget.
 * 'Slider_Widget' is the widget class used below.
 */
function sw_slider_load_widgets() {
	register_widget( 'sw_slider_Widget' );
}

/**
 * Load script (css, js).
 * 
 */
 
function load_slide_script(){
        if (!is_admin() && !defined('sw_slider')) {      
            define('sw_slider', 'ASSETS SW SLIDER');
			wp_register_style( 'default-style', plugins_url('css/bootstrap.css', __FILE__) );
			wp_register_style( 'reponsive', plugins_url('css/bootstrap-responsive.min.css', __FILE__) );
			if (!wp_style_is('default-style')) {
				wp_enqueue_style('default-style');
			}
			if (!wp_style_is('reponsive')) {
				wp_enqueue_style('reponsive');
			}
			wp_register_style( 'slide-style', plugins_url('css/style.css', __FILE__) );
			wp_enqueue_style('slide-style');
			
            wp_register_script( 'slide-js', plugins_url( '/js/bootstrap.js', __FILE__ ) );			
            if (!wp_script_is('slide-js')) {
				wp_enqueue_script('slide-js');
			}  
			wp_register_script( 'script-js', plugins_url( '/js/script.js', __FILE__ ), array(), null, true );
			wp_enqueue_script('script-js');
             
        }
    }

/**
 * ya slider Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, display, and update.  Nice!
 */
class sw_slider_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function sw_slider_Widget() {
			/* Widget settings. */
		$widget_ops = array( 'classname' => 'slider', 'description' => __('A simple widget slider responsive', 'slider') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sw-slider-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'sw-slider-widget', __('Sw slider widget', 'sw-slider'), $widget_ops, $control_ops );
	
		
	}
	/**
	 * Display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract($args);
		
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
		
		if (!isset($instance['category'])){
			$instance['category'] = 0;
		}
		
		extract($instance);
		       
        $default = array(
			'category' => $category,
			'orderby' => $orderby,
			'order' => $order,
			'post_status' => 'publish',
			'numberposts' => $numberposts
		);
		
		$list = get_posts($default);

		if ( !array_key_exists('widget_template', $instance) ){
			$instance['widget_template'] = 'default';
		}
		
		if ( $tpl = $this->getTemplatePath( $instance['widget_template'] ) ){ 
			$link_img = plugins_url('images/', __FILE__);
			$widget_id = $args['widget_id'];		
			include $tpl;
		}
				
		/* After widget (defined by themes). */
		echo $after_widget;
	}    

	public function ya_trim_words( $text, $num_words = 30, $more = null ) {
		$text = strip_shortcodes( $text);
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		return wp_trim_words($text, $num_words, $more);
	}
	
	protected function getTemplatePath($tpl='default', $type=''){
		$file = '/'.$tpl.$type.'.php';
		$dir =realpath(dirname(__FILE__)).'/themes';
		
		if ( file_exists( $dir.$file ) ){
			return $dir.$file;
		}
		
		return $tpl=='default' ? false : $this->getTemplatePath('default', $type);
	}
	
	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// strip tag on text field
		$instance['title'] = strip_tags( $new_instance['title'] );

		// int or array
		if ( array_key_exists('category', $new_instance) ){
			if ( is_array($new_instance['category']) ){
				$instance['category'] = array_map( 'intval', $new_instance['category'] );
			} else {
				$instance['category'] = intval($new_instance['category']);
			}
		}
		
		if ( array_key_exists('include', $new_instance) ){
			$instance['include'] = strip_tags( $new_instance['include'] );
		}
		
		if ( array_key_exists('orderby', $new_instance) ){
			$instance['orderby'] = strip_tags( $new_instance['orderby'] );
		}

		if ( array_key_exists('order', $new_instance) ){
			$instance['order'] = strip_tags( $new_instance['order'] );
		}

		if ( array_key_exists('numberposts', $new_instance) ){
			$instance['numberposts'] = intval( $new_instance['numberposts'] );
		}

		if ( array_key_exists('length', $new_instance) ){
			$instance['length'] = intval( $new_instance['length'] );
		}
		
		if ( array_key_exists('interval', $new_instance) ){
			$instance['interval'] = intval( $new_instance['interval'] );
		}
		
		if ( array_key_exists('hover', $new_instance) ){
			$instance['hover'] = $new_instance['hover'];
		}

        $instance['widget_template'] = strip_tags( $new_instance['widget_template'] );
        
					
        
		return $instance;
	}

	function category_select( $field_name, $opts = array(), $field_value = null ){
		$default_options = array(
				'multiple' => false,
				'disabled' => false,
				'size' => 5,
				'class' => 'widefat',
				'required' => false,
				'autofocus' => false,
				'form' => false,
		);
		$opts = wp_parse_args($opts, $default_options);
	
		if ( (is_string($opts['multiple']) && strtolower($opts['multiple'])=='multiple') || (is_bool($opts['multiple']) && $opts['multiple']) ){
			$opts['multiple'] = 'multiple';
			if ( !is_numeric($opts['size']) ){
				if ( intval($opts['size']) ){
					$opts['size'] = intval($opts['size']);
				} else {
					$opts['size'] = 5;
				}
			}
		} else {
			// is not multiple
			unset($opts['multiple']);
			unset($opts['size']);
			if (is_array($field_value)){
				$field_value = array_shift($field_value);
			}
			if (array_key_exists('allow_select_all', $opts) && $opts['allow_select_all']){
				unset($opts['allow_select_all']);
				$allow_select_all = '<option value="0">All Categories</option>';
			}
		}
	
		if ( (is_string($opts['disabled']) && strtolower($opts['disabled'])=='disabled') || is_bool($opts['disabled']) && $opts['disabled'] ){
			$opts['disabled'] = 'disabled';
		} else {
			unset($opts['disabled']);
		}
	
		if ( (is_string($opts['required']) && strtolower($opts['required'])=='required') || (is_bool($opts['required']) && $opts['required']) ){
			$opts['required'] = 'required';
		} else {
			unset($opts['required']);
		}
	
		if ( !is_string($opts['form']) ) unset($opts['form']);
	
		if ( !isset($opts['autofocus']) || !$opts['autofocus'] ) unset($opts['autofocus']);
	
		$opts['id'] = $this->get_field_id($field_name);
	
		$opts['name'] = $this->get_field_name($field_name);
		if ( isset($opts['multiple']) ){
			$opts['name'] .= '[]';
		}
		$select_attributes = '';
		foreach ( $opts as $an => $av){
			$select_attributes .= "{$an}=\"{$av}\" ";
		}
		
		$categories = get_categories();
		// if (!$templates) return '';
		$all_category_ids = array();
		foreach ($categories as $cat) $all_category_ids[] = (int)$cat->cat_ID;
		
		$is_valid_field_value = is_numeric($field_value) && in_array($field_value, $all_category_ids);
		if (!$is_valid_field_value && is_array($field_value)){
			$intersect_values = array_intersect($field_value, $all_category_ids);
			$is_valid_field_value = count($intersect_values) > 0;
		}
		if (!$is_valid_field_value){
			$field_value = '0';
		}
	
		$select_html = '<select ' . $select_attributes . '>';
		if (isset($allow_select_all)) $select_html .= $allow_select_all;
		foreach ($categories as $cat){
			$select_html .= '<option value="' . $cat->cat_ID . '"';
			if ($cat->cat_ID == $field_value || (is_array($field_value)&&in_array($cat->cat_ID, $field_value))){ $select_html .= ' selected="selected"';}
			$select_html .=  '>'.$cat->name.'</option>';
		}
		$select_html .= '</select>';
		return $select_html;
	}
	

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array();
		$instance = wp_parse_args( (array) $instance, $defaults ); 		
		         
		$categoryid = isset( $instance['category'] )    ? $instance['category'] : 0;
		$include = isset( $instance['include'] )    ? $instance['include'] : '';
		$orderby    = isset( $instance['orderby'] )     ? strip_tags($instance['orderby']) : 'ID';
		$order      = isset( $instance['order'] )       ? strip_tags($instance['order']) : 'ASC';
		$number     = isset( $instance['numberposts'] ) ? intval($instance['numberposts']) : 5;
        $length     = isset( $instance['length'] )      ? intval($instance['length']) : 25;
		$interval     = isset( $instance['interval'] )      ? intval($instance['interval']) : 0;
		$hover     = isset( $instance['hover'] )      ? $instance['hover'] : 'hover';
		$widget_template     = isset( $instance['widget_template'] ) ? strip_tags($instance['widget_template']) : 'default';
                   
                 
		?>
        </p> 
          <div style="background: Blue; color: white; font-weight: bold; text-align:center; padding: 3px"> * Data Config * </div>
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category ID', 'smartaddons')?></label>
			<br />
			<?php echo $this->category_select('category', array('allow_select_all' => true), $categoryid); ?>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('include'); ?>"><?php _e('Include Posts ID', 'yatheme')?></label>
			<br />
			<input class="widefat"
				id="<?php echo $this->get_field_id('include'); ?>"
				name="<?php echo $this->get_field_name('include'); ?>" type="text"
				value="<?php echo esc_attr($include); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Orderby', 'smartaddons')?></label>
			<br />
			<?php $allowed_keys = array('name' => 'Name', 'author' => 'Author', 'date' => 'Date', 'title' => 'Title', 'modified' => 'Modified', 'parent' => 'Parent', 'ID' => 'ID', 'rand' =>'Rand', 'comment_count' => 'Comment Count'); ?>
			<select class="widefat"
				id="<?php echo $this->get_field_id('orderby'); ?>"
				name="<?php echo $this->get_field_name('orderby'); ?>">
				<?php
				$option ='';
				foreach ($allowed_keys as $value => $key) :
					$option .= '<option value="' . $value . '" ';
					if ($value == $orderby){
						$option .= 'selected="selected"';
					}
					$option .=  '>'.$key.'</option>';
				endforeach;
				echo $option;
				?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order', 'smartaddons')?></label>
			<br />
			<select class="widefat"
				id="<?php echo $this->get_field_id('order'); ?>"
				name="<?php echo $this->get_field_name('order'); ?>">
				<option value="DESC" <?php if ($order=='DESC'){?> selected="selected"
				<?php } ?>>
					<?php _e('Descending', 'smartaddons')?>
				</option>
				<option value="ASC" <?php if ($order=='ASC'){?> selected="selected"
				<?php } ?>>
					<?php _e('Ascending', 'smartaddons')?>
				</option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('numberposts'); ?>"><?php _e('Number of Posts', 'smartaddons')?></label>
			<br />
			<input class="widefat"
				id="<?php echo $this->get_field_id('numberposts'); ?>"	name="<?php echo $this->get_field_name('numberposts'); ?>" type="text"
				value="<?php echo esc_attr($number); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('length'); ?>"><?php _e('Excerpt length (in words): ', 'smartaddons')?></label>
			<br />
			<input class="widefat"
				id="<?php echo $this->get_field_id('length'); ?>"
				name="<?php echo $this->get_field_name('length'); ?>" type="text"
				value="<?php echo esc_attr($length); ?>" />
		</p>  
		
		<p>
			<label for="<?php echo $this->get_field_id('interval'); ?>"><?php _e('Time Interval: ', 'smartaddons')?></label>
			<br />
			<input class="widefat"
				id="<?php echo $this->get_field_id('interval'); ?>"
				name="<?php echo $this->get_field_name('interval'); ?>" type="text"
				value="<?php echo esc_attr($interval); ?>" />
		</p>  
		
		<p>
			<label for="<?php echo $this->get_field_id('hover'); ?>"><?php _e('Stop When Hover: ', 'smartaddons')?></label>
			<br />
			<select class="widefat"
				id="<?php echo $this->get_field_id('hover'); ?>"
				name="<?php echo $this->get_field_name('hover'); ?>" >
				<option value="hover" <?php if ($hover=='hover'){?> selected="selected"
				<?php } ?>>
					<?php _e('Yes', 'smartaddons')?>
				</option>
				<option value="no" <?php if ($hover=='no'){?> selected="selected"
				<?php } ?>>
					<?php _e('No', 'smartaddons')?>
				</option>				
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('widget_template'); ?>"><?php _e("Template", 'smartaddons')?></label>
			<br/>
			
			<select class="widefat"
				id="<?php echo $this->get_field_id('widget_template'); ?>"
				name="<?php echo $this->get_field_name('widget_template'); ?>">
				<option value="default" <?php if ($widget_template=='default'){?> selected="selected"
				<?php } ?>>
					<?php _e('Theme1', 'smartaddons')?>
				</option>
				<option value="theme1" <?php if ($widget_template=='theme1'){?> selected="selected"
				<?php } ?>>
					<?php _e('Theme2', 'smartaddons')?>
				</option>
				<option value="theme2" <?php if ($widget_template=='theme2'){?> selected="selected"
				<?php } ?>>
					<?php _e('Theme3', 'smartaddons')?>
				</option>
			</select>
		</p>           
	<?php
	}	
}
?>