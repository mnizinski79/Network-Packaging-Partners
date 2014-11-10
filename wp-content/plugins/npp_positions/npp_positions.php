<?php
   /*
   Plugin Name: NPP Custom Positions Post   
   Description: a plugin to create a custom post type called "positions"
   Version: 1.2
   Author: Amy Lashley
   Author URI: http://amylashley.net
   License: GPL2
   */

function my_custom_post_position() {
  $args = array();

  $labels = array(
    'name'               => _x( 'Positions', 'post type general name' ),
    'singular_name'      => _x( 'Position', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'position' ),
    'add_new_item'       => __( 'Add New Position' ),
    'edit_item'          => __( 'Edit Position' ),
    'new_item'           => __( 'New Position' ),
    'all_items'          => __( 'All Positions' ),
    'view_item'          => __( 'View Position' ),
    'search_items'       => __( 'Search Positions' ),
    'not_found'          => __( 'No positions found' ),
    'not_found_in_trash' => __( 'No positions found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Positions'
  );

  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our positions and position specific data',
    'public'        => true,
    'menu_position' => 6,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );

  register_post_type( 'position', $args ); 
}

add_action( 'init', 'my_custom_post_position' );


/*
Add all custom meta boxes
Location (ZIP Code and City)
Job Name (Title)
Description
Full Time/Contract
Start Date
Duration
Job Number
*/


add_action( 'add_meta_boxes', 'position_details_box' );

function position_details_box() {
    
    add_meta_box( 
        'position_date_box',
        __( 'Start Date', 'myplugin_textdomain' ),
        'position_date_box_content',
        'position',
        'normal',
        'high'
    );

    add_meta_box( 
        'position_location_box',
        __( 'Location', 'myplugin_textdomain' ),
        'position_location_box_content',
        'position',
        'normal',
        'high'
    );

    /*Full time or Contract*/
    add_meta_box( 
        'position_terms_box',
        __( 'Terms', 'myplugin_textdomain' ),
        'position_terms_box_content',
        'position',
        'normal',
        'high'
    );

    add_meta_box( 
        'position_duration_box',
        __( 'Duration', 'myplugin_textdomain' ),
        'position_duration_box_content',
        'position',
        'normal',
        'high'
    );

    add_meta_box( 
        'position_number_box',
        __( 'Job Number', 'myplugin_textdomain' ),
        'position_number_box_content',
        'position',
        'normal',
        'high'
    );
}

/*All functions to define content for the meta boxes*/
function position_date_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'position_date_box_content_nonce' );
  $value = get_post_meta( $post->ID, 'position_date', true );
  echo '<label for="position_date">Position Date</label>';
  echo '&nbsp;<input type="text" id="position_date" name="position_date" placeholder="Enter a Date " value="'.$value.'"/>';
}

function position_location_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'position_zipcode_box_content_nonce' );
  $value_zipcode = get_post_meta( $post->ID, 'position_zipcode', true );
  echo '<label for="position_zipcode">Position Zipcode</label>';
  echo '&nbsp;<input type="text" id="position_zipcode" name="position_zipcode" placeholder="Enter a Zipcode " value="'.$value_zipcode.'"/>';

  wp_nonce_field( plugin_basename( __FILE__ ), 'position_city_box_content_nonce' );
  $value_city = get_post_meta( $post->ID, 'position_city', true );
  echo '<label for="position_city">Position City</label>';
  echo '&nbsp;<input type="text" id="position_city" name="position_city" placeholder="Enter a City " value="'.$value_city.'"/>';
}

function position_terms_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'position_terms_box_content_nonce' );
  $value = get_post_meta( $post->ID, 'position_terms', true );
  echo '<label for="position_terms">Position Terms (Full-Time or Contract)</label>';
  echo '&nbsp;<input type="text" id="position_terms" name="position_terms" placeholder="Is this position fulltime or contract? " value="'.$value.'"/>';
}

function position_duration_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'position_duration_box_content_nonce' );
  $value = get_post_meta( $post->ID, 'position_duration', true );
  echo '<label for="position_duration">Position Duration</label>';
  echo '&nbsp;<input type="text" id="position_duration" name="position_duration" placeholder="How long will this position last? " value="'.$value.'"/>';
}

function position_number_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'position_number_box_content_nonce' );
  $value = get_post_meta( $post->ID, 'position_number', true );
  echo '<label for="position_number">Job Number</label>';
  echo '&nbsp;<input type="text" id="position_number" name="position_number" placeholder="Enter Job Number " value="'.$value.'"/>';
}



add_action( 'save_post', 'position_details_box_save' );
function position_details_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

	/*Check all nonces*/
  if ( !wp_verify_nonce( $_POST['position_date_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;
	if ( !wp_verify_nonce( $_POST['position_zipcode_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;
	if ( !wp_verify_nonce( $_POST['position_city_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;
	if ( !wp_verify_nonce( $_POST['position_terms_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;
	if ( !wp_verify_nonce( $_POST['position_duration_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;
	if ( !wp_verify_nonce( $_POST['position_number_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $position_date = $_POST['position_date'];
  update_post_meta( $post_id, 'position_date', $position_date );

  $position_zipcode = $_POST['position_zipcode'];
  update_post_meta( $post_id, 'position_zipcode', $position_zipcode );

  $position_city = $_POST['position_city'];
  update_post_meta( $post_id, 'position_city', $position_city );

  $position_terms = $_POST['position_terms'];
  update_post_meta( $post_id, 'position_terms', $position_terms );

  $position_duration = $_POST['position_duration'];
  update_post_meta( $post_id, 'position_duration', $position_duration );

  $position_number = $_POST['position_number'];
  update_post_meta( $post_id, 'position_number', $position_number );
}
?>