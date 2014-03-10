<?php
/*
Plugin Name: Twitch lide
Plugin URI: http://ruta donde colocar las nuevas actualizaciones
Description: WIdget que muestra tu canal de twitch
Author: @nagash93
Version: 0.1
Author URI: http://www.ultimazeta.cl/
*/

class seguidores_en_redes extends WP_Widget {
 
    /** constructor */
    function seguidores_en_redes() {
        parent::WP_Widget(false, $name = 'Seguidores en redes');
    }
 
    function widget($args, $instance) {
        extract( $args );
        global $wpdb;
 
        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['twitchoff'];
        $twitter = $instance['twitchon'];
 
        if(!$size)
            $size = 40;
 
        ?>
              <?php echo $before_widget; ?>
                 
 
              <?php echo $after_widget; ?>
        <?php
    }
 
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['twitchon'] = strip_tags($new_instance['twitchon']);
        $instance['twitchoff'] = strip_tags($new_instance['twitchoff']);
        return $instance;
    }
 
    function form($instance) {
 
        $title = esc_attr($instance['title']);
        $twitter = esc_attr($instance['twitchon']);
        $facebook = esc_attr($instance['twitchoff']);
 
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('twitchon'); ?>"><?php _e('link imagen ON'); ?></label>
            <input id="<?php echo $this->get_field_id('twitchon'); ?>" name="<?php echo $this->get_field_name('twitchon'); ?>" type="text" value="<?php echo $twitchon?>" />
        </p>
 
        <p>
            <label for="<?php echo $this->get_field_id('twitchoff'); ?>"><?php _e('Facebook username'); ?></label>
            <input id="<?php echo $this->get_field_id('twitchoff'); ?>" name="<?php echo $this->get_field_name('twitchoff'); ?>" type="text" value="<?php echo $twitchoff ?>" />
        </p>
 
        <?php
    }
 
}
add_action('widgets_init', create_function('', 'return register_widget("seguidores_en_redes");'));
 
?>