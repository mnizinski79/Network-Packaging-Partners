<?php


include('includes/related_posts_meta_box.php');

register_nav_menus(
    array(
    'primary-menu' => __( 'Primary Menu' ),
    'secondary-menu' => __( 'Secondary Menu' ),
    'ancilary-menu' => __( 'Ancilary Menu' )
    )
);


function custom_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


add_theme_support( 'post-thumbnails' );

/*
* Switch default core markup for search form, comment form, and comments
* to output valid HTML5.
*/
add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );

function get_my_header() {
	if( !is_front_page() ) {
         
        global $post;
        $post_type = get_post_type($post);
        
        if ($post_type!='post'){
            get_header($post_type);
        }else {
            get_header();
        }
        
    } else {
        get_header();
    }// ends isset()
   
} // ends get_myheader function

// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook 
//Making jQuery Google API
function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery');
 
add_action( 'wp_enqueue_scripts', 'npp_load_javascript_files' );
 
// Register some javascript files, because we love javascript files. Enqueue a couple as well 
 
function npp_load_javascript_files() {
   
        //<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        //<script src="js/plugins.js"></script>
 
  wp_register_script( 'npp-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'));
  wp_register_script( 'npp-datepicker', get_template_directory_uri() . '/js/datepicker.js', array('jquery'));
  wp_register_script( 'npp-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'));
  wp_register_script( 'npp-hammer', get_template_directory_uri() . '/js/jquery.hammer.js', array('jquery'));
    
  wp_register_script( 'npp-main', get_template_directory_uri() . '/js/src/main.js', array('jquery'));
    
  wp_enqueue_script('npp-plugins');
  wp_enqueue_script('npp-datepicker');
  wp_enqueue_script('npp-easing');
  wp_enqueue_script('npp-hammer');
  wp_enqueue_script('npp-main');
 
}

//Custom Search Functionality
function search_template_chooser($template)   
{    

  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'position' )   
  {
   
    return locate_template('search-position.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'search_template_chooser');  


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


