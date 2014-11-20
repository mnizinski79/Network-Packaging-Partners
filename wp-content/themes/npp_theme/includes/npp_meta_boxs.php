<?php

function npp_post_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'npp_add_post_meta_boxes' );

  add_action( 'save_post', 'npp_save_show_related_posts_meta', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function npp_add_post_meta_boxes() {

 //option to show related posts slider
  add_meta_box(
    'npp-related-posts',      // Unique ID
    esc_html__( 'Show Related Posts Slider', 'example' ),    // Title
    'npp_post_class_meta_box',   // Callback function
    'page',         // Admin page (or post type)
    'normal',         // Context
    'default'         // Priority
  );

  //option to show child pages
  add_meta_box(
    'npp-child-pages',      // Unique ID
    esc_html__( 'Show Child Pages Widget', 'example' ),    // Title
    'npp_child_pages_meta_box',   // Callback function
    'page',         // Admin page (or post type)
    'normal',         // Context
    'default'         // Priority
  );

  //option to show child pages
  add_meta_box(
    'npp-find-positions',      // Unique ID
    esc_html__( 'Show Find Positions Widget', 'example' ),    // Title
    'npp_find_positions_meta_box',   // Callback function
    'page',         // Admin page (or post type)
    'normal',         // Context
    'default'         // Priority
  );

    //option to show the 'become a partner' option
  add_meta_box(
    'npp-become-a-partner',      // Unique ID
    esc_html__( 'Show Become A Partner Widget', 'example' ),    // Title
    'npp_become_a_partner_meta_box',   // Callback function
    'page',         // Admin page (or post type)
    'normal',         // Context
    'default'         // Priority
  );
}

function npp_become_a_partner_meta_box( $object, $box ) { ?>

  <?php 
  wp_nonce_field( basename( __FILE__ ), 'npp_become_a_partner_nonce' ); 
  // wp_nonce_field( basename( __FILE__ ), 'npp_select_categories_nonce' ); 

    global $post;
    $custom = get_post_custom($post->ID);
    $npp_become_a_partner = $custom["npp-become-a-partner"][0]; 
  ?>

  <p>
    <!--<?php //echo esc_attr( get_post_meta( $object->ID, 'npp-related-posts', true ) ); ?>-->
    <input type="checkbox" name="npp-become-a-partner" id="npp-become-a-partner" <?php if( $npp_become_a_partner == true ) { ?>checked="checked"<?php } ?> />
    <label for="npp-become-a-partner">Show Become A Partner Widget</label>
    <p><i>Please note that the emails from this widget will be sent to the administrator email that you have configured in your Wordpress admin.</i></p>
    
  </p>

<?php }

function npp_child_pages_meta_box( $object, $box ) { ?>

  <?php 
  wp_nonce_field( basename( __FILE__ ), 'npp_child_pages_nonce' ); 
  // wp_nonce_field( basename( __FILE__ ), 'npp_select_categories_nonce' ); 

    global $post;
    $custom = get_post_custom($post->ID);
    $npp_child_pages = $custom["npp-child-pages"][0]; 
  ?>

  <p>
    <!--<?php //echo esc_attr( get_post_meta( $object->ID, 'npp-related-posts', true ) ); ?>-->
    <input type="checkbox" name="npp-child-pages" id="npp-child-pages" <?php if( $npp_child_pages == true ) { ?>checked="checked"<?php } ?> />
    <label for="npp-child-pages">Show Child Pages</label>
    
  </p>

<?php }

function npp_find_positions_meta_box( $object, $box ) { ?>

  <?php 
  wp_nonce_field( basename( __FILE__ ), 'npp_find_positions_nonce' ); 
  // wp_nonce_field( basename( __FILE__ ), 'npp_select_categories_nonce' ); 

    global $post;
    $custom = get_post_custom($post->ID);
    $npp_find_positions = $custom["npp-find-positions"][0]; 
  ?>

  <p>
    <!--<?php //echo esc_attr( get_post_meta( $object->ID, 'npp-related-posts', true ) ); ?>-->
    <input type="checkbox" name="npp-find-positions" id="npp-find-positions" <?php if( $npp_find_positions == true ) { ?>checked="checked"<?php } ?> />
    <label for="npp-find-positions">Show Find Positions</label>
    
  </p>

<?php }



function npp_post_class_meta_box( $object, $box ) { ?>

  <?php 
  wp_nonce_field( basename( __FILE__ ), 'npp_related_posts_nonce' ); 
  // wp_nonce_field( basename( __FILE__ ), 'npp_select_categories_nonce' ); 

    global $post;
    $custom = get_post_custom($post->ID);
    $npp_related_posts = $custom["npp-related-posts"][0]; 
  ?>

  <p>
    <!--<?php //echo esc_attr( get_post_meta( $object->ID, 'npp-related-posts', true ) ); ?>-->
    <input type="checkbox" name="npp-related-posts" id="npp-related-posts" <?php if( $npp_related_posts == true ) { ?>checked="checked"<?php } ?> />
    <label for="npp-related-posts">Show Related Posts</label>
    <!--<label>Select Categories: </label><input type="text" name="tnpp-select-categories" value="<?php //echo $npp_select_categories; ?>" /><br/>-->

  </p>

<?php }

/* Save the meta box's post metadata. */
function npp_save_show_related_posts_meta( $post_id, $post ) {

  /* Verify the related posts nonce before proceeding. */
  if ( !isset( $_POST['npp_related_posts_nonce'] ) || !wp_verify_nonce( $_POST['npp_related_posts_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Verify the child pages nonce before proceeding. */
  if ( !isset( $_POST['npp_child_pages_nonce'] ) || !wp_verify_nonce( $_POST['npp_child_pages_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Verify the find positions nonce before proceeding. */
  if ( !isset( $_POST['npp_find_positions_nonce'] ) || !wp_verify_nonce( $_POST['npp_find_positions_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Verify the become a partner nonce before proceeding. */
  if ( !isset( $_POST['npp_become_a_partner_nonce'] ) || !wp_verify_nonce( $_POST['npp_become_a_partner_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

 
   processValue('npp-related-posts', $_POST['npp-related-posts'], $post_id);
   processValue('npp-child-pages', $_POST['npp-child-pages'], $post_id);
   processValue('npp-find-positions', $_POST['npp-find-positions'], $post_id);
   processValue('npp-become-a-partner', $_POST['npp-become-a-partner'], $post_id);

}

function processValue($key, $post_value, $post_id){
  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $post_value ) ? sanitize_html_class( $post_value ) : '' );

  //die($slider_meta_value." , ".$slider_key);

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $key, $meta_value );
}

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'npp_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'npp_post_meta_boxes_setup' );