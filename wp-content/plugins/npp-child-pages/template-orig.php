<?php
$my_content;
// Set up the objects needed
$my_wp_query = new WP_Query();
$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

// Filter through all pages and find Portfolio's children
$my_children = get_page_children( get_queried_object_id(), $all_wp_pages );

if ($my_children && sizeof($my_children)>0){
  $my_content .= '<div class="secondary-content">
                    <div class="col-container">';

  foreach ($my_children as $child) {

    $my_content .= '<a href="'.$child->guid.'" class="col-4 page-lead" data-title="'.$child->post_title.'" data-content="'.substr($child->post_content, 0,200).'">
                            <figure><img src="'.plugins_url( "img/svgs/img-ico-design.svg", __FILE__ ).'"></figure>
                            <h3>'.$child->post_title.'</h3>
                            <p>'.date('M. d, Y',strtotime($child->post_date)).'</p>
                        </a>';
  }

  $my_content .='</div></div>';
}

?>