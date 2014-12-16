<?php
$this_cat_id; $my_content='';
$my_id = get_the_ID();
if (get_the_category($post->ID )) {
  $cat = get_the_category($post->ID );
  //var_dump($cat);
  foreach ($cat[0] as $key => $value) {
        //echo $key." , ".$value."<BR>";
      if ($key=='cat_ID'){
        $this_cat_id = $value;
      }
  }
}

$my_query = new WP_Query();
$results = $my_query->query( 'showposts=-1&cat='.$this_cat_id );

if ($results){

     $count = 0;
     $my_content .= '<div class="secondary-content">
                    <div class="col-container">';
      if ($custom_title!=''){
           $my_content .= '<h2 class="module-header">'.$custom_title.'</h2>';
        } 
      $my_content .= '<ul class="carousel">'; 
    foreach ($results as $result) {
        if (($result->ID != $my_id) && ($result->post_type=='post')){
          
           $count++;
           $my_content .= '<li class="carousel-item"><a href="'.$result->guid.'">';
          $feat_img = wp_get_attachment_url( get_post_thumbnail_id($result->ID));

          if (($feat_img) && ($feat_img !='')){
              $my_content .= '<img src="'.$feat_img.'">';
          }else {
               $my_content .= '<img src="img/img-upcoming.jpg">';
          }
          $my_content .='<h3>'.$result->post_title.'</h3>

                       <p>'.$result->post_excerpt.'</p></a></li>';  
        }
              

    }
  $my_content .= '</ul></div>
                </div>';
  if ($count==0){$my_content=null;}
}
?>