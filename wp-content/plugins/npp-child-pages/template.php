


<?php
$my_content;$title = ''; $caption = ''; $description = ''; 
// Set up the objects needed
$my_wp_query = new WP_Query();
$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

// Filter through all pages and find Portfolio's children
$my_children = get_page_children( get_queried_object_id(), $all_wp_pages );

if ($my_children && sizeof($my_children)>0){
  $my_content .= '<div class="secondary-content">';
  if ($custom_title!=''){
           $my_content .= '<h2 class="module-header">'.$custom_title.'</h2>';
  }   
  $my_content .= '<div class="col-container">';

  foreach ($my_children as $child) {
     if ( has_post_thumbnail( $child->ID ) ) :
      $image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $child->ID ), 'full' );
      $image = $image_array[0];
      $title = get_post(get_post_thumbnail_id($child->ID))->post_title; //The Title
      $caption = get_post(get_post_thumbnail_id($child->ID))->post_excerpt; //The Caption
      $description = get_post(get_post_thumbnail_id($child->ID))->post_content; // The Descriptio
    else :
        $image = plugins_url( "img/svgs/img-ico-design.svg", __FILE__ );
        $title = $child->post_title; 
        $caption = substr($child->post_content, 0, 300); //The Caption
      endif;
    
    if ($caption == ''){
      $caption = substr($child->post_content, 0,300);
    }

    $my_content .= '<a href="'.$child->guid.'" class="col-4 page-lead" data-title="'.$title.'" data-content="'.$caption.'">
                            <figure><img src="'.$image.'"></figure>
                            <h3>'.$child->post_title.'</h3>
                            <p>'.$description.'</p>
                        </a>';
  }

  $my_content .='</div></div>';
}

?>