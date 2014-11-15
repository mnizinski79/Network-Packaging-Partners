<?php
$this_cat_id; $my_content='';
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
     $my_content .= '<div class="secondary-content">
                    <div class="col-container"><ul class="carousel">'; 
    foreach ($results as $result) {
       // var_dump($result);
        $my_content .= '<li class="carousel-item"><a href="'.$result->guid.'">';
        $feat_img = wp_get_attachment_url( get_post_thumbnail_id($result->ID));

        if (($feat_img) && ($feat_img !='')){
            $my_content .= '<img src="'.$feat_img.'">';
        }else {
             $my_content .= '<img src="img/img-upcoming.jpg">';
        }
        $my_content .='<h3>'.$result->post_title.'</h3>
                <p>'.date('M. d, Y',strtotime($result->post_date)).'</p>
            </a></li>';         

    }
  $my_content .= '</ul></div>
                </div>';
}
?>