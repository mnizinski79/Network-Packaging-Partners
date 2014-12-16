<?php


function getPostsByTitle($position_name){
	global $wpdb;
	$querystr.= "select * FROM $wpdb->posts WHERE post_type = 'job_listing' and post_title <> '' and post_title = '".$position_name."'";
    $custom_query = true;
    return  $wpdb->get_results($querystr, OBJECT);   
}

function getPostsByLocation($location){
	global $wpdb;

	$meta_key1      = '_job_location';
    $meta_key1_value    =$location;
    $querystr="
        SELECT      * FROM $wpdb->posts
        INNER JOIN  $wpdb->postmeta 
                    ON $wpdb->posts.ID = $wpdb->postmeta.post_id
                    
        WHERE       $wpdb->postmeta.meta_key = '".$meta_key1."'
                    AND $wpdb->posts.post_title <> ''
                    AND $wpdb->postmeta.meta_value LIKE '".$meta_key1_value."'";
    return $wpdb->get_results($querystr, OBJECT);
}

function getPostsByLocationAndTitle($location, $position_name){
	global $wpdb;

	$meta_key1      = '_job_location';
    $meta_key1_value    =$location;
    $querystr="
        SELECT      * FROM $wpdb->posts
        INNER JOIN  $wpdb->postmeta 
                    ON $wpdb->posts.ID = $wpdb->postmeta.post_id
                    
        WHERE       $wpdb->postmeta.meta_key = '".$meta_key1."'
                    AND $wpdb->postmeta.meta_value = '".$meta_key1_value."'
        AND         $wpdb->posts.post_title = '".$position_name."'";
                 
    return $wpdb->get_results($querystr, OBJECT);
	
}
?>