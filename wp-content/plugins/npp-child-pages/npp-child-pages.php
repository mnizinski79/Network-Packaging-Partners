<?php
/*
Plugin Name: NPP Display Child Pages
Description: Creates a widget that displays child pages for a page
Version: 1.0
Author: Amy Lashley
Author URI: http://www.amylashley.net
*/


//tell wordpress to register the demolistposts shortcode
add_shortcode("npp-child-pages", "npp_childpages_handler");

function npp_childpages_handler() {
  //run function that actually does the work of the plugin
  $my_output = npp_childpages_function();
  //send back text to replace shortcode in post
  return $my_output;
}

function npp_childpages_function() {
  //process plugin
  include('template.php');
  //send back text to calling function
  return $my_content;
}

/*function npp_postsslider_scripts() {

	wp_register_script('npp_easing_script', plugin_dir_url(__FILE__).'js/jquery.easing.1.3.js', array('jquery'));
	wp_enqueue_script('npp_easing_script');
}

add_action( 'wp_enqueue_scripts', 'npp_postsslider_scripts' ); */
?>