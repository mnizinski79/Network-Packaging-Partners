<?php
/*
Plugin Name: NPP Posts Slider
Description: Creates a JS slider to house related posts for a page
Version: 1.0
Author: Amy Lashley
Author URI: http://www.amylashley.net
*/


//tell wordpress to register the demolistposts shortcode
add_shortcode("npp-related-posts-slider", "npp_postsslider_handler");

function npp_postsslider_handler($atts) {
  //run function that actually does the work of the plugin
  $slider_output = npp_postsslider_function($atts);
  //send back text to replace shortcode in post
  return $slider_output;
}

function npp_postsslider_function($atts) {
  //process plugin
  extract( shortcode_atts( array(    
        'custom_title' => '',
  ), $atts) );
  
  include('carousel.php');
  //send back text to calling function
  return $my_content;
}

function npp_postsslider_scripts() {

	wp_register_script('npp_easing_script', plugin_dir_url(__FILE__).'js/jquery.easing.1.3.js', array('jquery'));
	wp_enqueue_script('npp_easing_script');
}

add_action( 'wp_enqueue_scripts', 'npp_postsslider_scripts' );
?>