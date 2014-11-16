<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function npp_widgets_init() {

  register_sidebar( array(
    'name' => 'Default Right Sidebar',
    'id' => 'default_right_1',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );

  register_sidebar( array(
    'name' => 'Search Sidebar',
    'id' => 'search_sidebar',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );
}
add_action( 'widgets_init', 'npp_widgets_init' );


//**********Add Meta Boxes to "pages" in admin*************************//
/*
 *
 *
 *
//**********************************************************************/
function npp_post_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'npp_add_post_meta_boxes' );

  add_action( 'save_post', 'npp_save_show_related_posts_meta', 10, 2 );
}

/* Create one or more meta boxes to be displayed on the post editor screen. */
function npp_add_post_meta_boxes() {

  add_meta_box(
    'npp-related-posts',      // Unique ID
    esc_html__( 'Show Related Posts Slider', 'example' ),    // Title
    'npp_post_class_meta_box',   // Callback function
    'page',         // Admin page (or post type)
    'normal',         // Context
    'default'         // Priority
  );
}

/* Display the post meta box. */
function npp_post_class_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'npp_related_posts_nonce' ); 

    global $post;
    $custom = get_post_custom($post->ID);
    $npp_related_posts = $custom["npp-related-posts"][0]; 
  ?>

  <p>
    <!--<?php //echo esc_attr( get_post_meta( $object->ID, 'npp-related-posts', true ) ); ?>-->
    <input type="checkbox" name="npp-related-posts" id="npp-related-posts" <?php if( $npp_related_posts == true ) { ?>checked="checked"<?php } ?> />
    <label for="npp-related-posts">Show Related Posts</label>
  </p>

<?php }

/* Save the meta box's post metadata. */
function npp_save_show_related_posts_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['npp_related_posts_nonce'] ) || !wp_verify_nonce( $_POST['npp_related_posts_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  //var_dump($_REQUEST);
  //die("GOOD HERE ");

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['npp-related-posts'] ) ? sanitize_html_class( $_POST['npp-related-posts'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'npp-related-posts';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'npp_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'npp_post_meta_boxes_setup' );