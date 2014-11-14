<?php
   /*
   Plugin Name: NPP Theme Options   
   Description: a plugin to create a place to put a custom post type for the hero images
   Version: 1.2
   Author: Amy Lashley
   Author URI: http://amylashley.net
   License: GPL2
   */


/** Step 2 (from text above). */
//add_action( 'admin_menu', 'npp_admin_menu' );

/** Step 1. */
/*function npp_admin_menu() {
	add_options_page( 'NPP Theme Options', 'NPP Theme', 'manage_options', 'npp-theme-options', 'npp_theme_options' );
}*/

/** Step 3. */
/*function npp_theme_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}*/
?>