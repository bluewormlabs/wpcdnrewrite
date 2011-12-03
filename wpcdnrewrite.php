<?php
/*
Plugin Name: WP CDN Rewrite
Plugin URI: http://github.com/bluewormlabs
Version: 1.0
Description: 
Author: Blue Worm Labs, LLC
Author URI: http://bluewormlabs.com
*/

class WP_CDN_Rewrite_Widget extends WP_Widget {
	function WP_CDN_Rewrite_Widget() {
	}
	
	function form($instance) {
	}
	
	function update($newInstance, $oldInstance) {
	}
	
	function widget($args, $instance) {
	}
}

add_action('widgets_init', create_function('', 'return register_widget("WP_CDN_Rewrite_Widget");'));

?>