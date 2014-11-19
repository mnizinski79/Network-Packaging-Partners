<?php


function getPostsByTitle($position_name){
	global $wpdb;
	$querystr.= "select * FROM wp_posts WHERE post_type = 'position' and post_title ='".$position_name."'";
    $custom_query = true;
    return  $wpdb->get_results($querystr, OBJECT);   
}

function getPostsByLocation($location){
	global $wpdb;

	$meta_key1      = 'position_city';
    $meta_key1_value    =$location;
    $querystr="
        SELECT      * FROM wp_posts
        INNER JOIN  wp_postmeta 
                    ON wp_posts.ID = wp_postmeta.post_id
                    
        WHERE       wp_postmeta.meta_key = '".$meta_key1."'
                    AND wp_postmeta.meta_value = '".$meta_key1_value."'";
                        
    return $wpdb->get_results($querystr, OBJECT);
}

function getPostsByLocationAndTitle($location, $position_name){
	global $wpdb;

	$meta_key1      = 'position_city';
    $meta_key1_value    =$location;
    $querystr="
        SELECT      * FROM wp_posts
        INNER JOIN  wp_postmeta 
                    ON wp_posts.ID = wp_postmeta.post_id
                    
        WHERE       wp_postmeta.meta_key = '".$meta_key1."'
                    AND wp_postmeta.meta_value = '".$meta_key1_value."'
        AND         wp_posts.post_title = '".$position_name."'";
                        
    return $wpdb->get_results($querystr, OBJECT);
	
}
?>