<?php
/* 
Plugin Name: Map Pin
Plugin URI: http://www.wearecondiment.com
Description: For pinpointing something on Google Maps
Version: 1.0 
Author: Chris Waters
Author URI: http://www.wearecondiment.com
*/

function Map_Pin() {

	$map_pin_mb = new WPAlchemy_MetaBox(array
	(
		'id' => '_map_pin_meta',
		'title' => 'Map Pin',
		'template' => dirname(__FILE__) . '/map_pin_meta.php',
		'types' => array('post'),
	));
	
	global $pagenow, $typenow;
	
	if (is_admin() && $pagenow=='post-new.php' OR $pagenow=='post.php') {
		wp_enqueue_script('admin-map-pin', plugins_url('/map_pin.js',__FILE__), 'jquery-ui-core');
	}
	
	include_once dirname(__FILE__) . '/helpers.php';
	
}

add_action('init','Map_Pin');