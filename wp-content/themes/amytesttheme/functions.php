<?php


/*function my_wp_nav_menu_args( $args = '' ) {
	var_dump($args); die();
	$args['container'] = false;
	$args['menu_id'] = 'primary-nav';
	return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );  */



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
