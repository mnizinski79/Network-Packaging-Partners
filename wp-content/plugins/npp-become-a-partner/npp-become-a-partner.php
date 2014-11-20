<?php
/*
Plugin Name: NPP Become A Partner
Description: Creates a Become A Partner widget for a page
Version: 1.0
Author: Amy Lashley
Author URI: http://www.amylashley.net
*/


//tell wordpress to register the demolistposts shortcode
add_shortcode("npp-become-a-partner", "npp_becomeapartner_handler");

function npp_becomeapartner_handler() {
  //run function that actually does the work of the plugin
  $my_output = npp_becomeapartner_function();
  //send back text to replace shortcode in post
  return $my_output;
}

function npp_becomeapartner_function() {
  //process plugin
  include('template.php');
  //send back text to calling function
  return $my_content;
}

/**
 * Proper way to enqueue scripts and styles
 */
function npp_becomeapartner_scripts() {
  wp_register_script( 'npp-becomeapartner-main-script', plugins_url( '/js/main.js', __FILE__ ), array( 'jquery' ) );
  wp_enqueue_script( 'npp-becomeapartner-main-script' );

// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
wp_localize_script( 'npp-becomeapartner-main-script', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}

add_action( 'wp_enqueue_scripts', 'npp_becomeapartner_scripts' );

?>