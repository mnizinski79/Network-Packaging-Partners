<?php

if (is_category( )) {
  $cat = get_query_var('cat');
  $yourcat = get_category ($cat);
  die 'the slug is '. $yourcat->slug;
 }


    query_posts(array(
                        'category_name' => 'my-category-slug',
                        'numberposts' => -1,                                                        
                        'orderby' => 'post_date',
                        'order' => 'DESC',                                                        
                        'post_type' => 'event',
                        'post_status' => 'publish'));
    while (have_posts()) : the_post();
    the_content();
    endwhile;

    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 1,                                                        
                        'orderby' => 'post_date',
                        'order' => 'DESC',                                                        
                        'post_type' => 'event',
                        'post_status' => 'publish'));
    foreach( $recent_posts as $recent ){  
        echo '<li>';
        echo '<a href="'.get_permalink($recent["ID"]).'">';
        $image = wp_get_attachment_url(get_post_thumbnail_id($recent["ID"]));
        if ($image!='' && $image){
            echo '<img src="'.$image.'">';
        }else {
            echo '<img src="'.get_template_directory_uri().'/img/img-news-1.jpg">';
        }
        echo '<h3>'.$recent['post_title'].'</h3>';
        $event_date = get_post_meta($recent["ID"], 'event_date', true );
        echo '<p>'.$event_date.'</p>';
        echo '</a>';
        echo '</li>';
    }

$my_content = '<div class="secondary-content">
                    <div class="col-container">
                        <ul class="carousel">
                            <li class="carousel-item">
                                <a href="#">
                                    <img src="img/img-upcoming.jpg">
                                    <h3>Join Us at Health Pack</h3>
                                    <p>Mar. 3-5, 2015 — Norfolk, Virginia</p>
                                </a>
                            </li>

                            <li class="carousel-item">
                                <a href="#">
                                    <img src="img/img-upcoming.jpg">
                                    <h3>Join Us at Health Pack</h3>
                                    <p>Mar. 3-5, 2015 — Norfolk, Virginia</p>
                                </a>
                            </li>

                            <li class="carousel-item">
                                <a href="#">
                                    <img src="img/img-upcoming.jpg">
                                    <h3>Join Us at Health Pack</h3>
                                    <p>Mar. 3-5, 2015 — Norfolk, Virginia</p>
                                </a>
                            </li>

                            <li class="carousel-item">
                                <a href="#">
                                    <img src="img/img-upcoming.jpg">
                                    <h3>Join Us at Health Pack</h3>
                                    <p>Mar. 3-5, 2015 — Norfolk, Virginia</p>
                                </a>
                            </li>

                            <li class="carousel-item">
                                <a href="#">
                                    <img src="img/img-upcoming.jpg">
                                    <h3>Join Us at Health Pack</h3>
                                    <p>Mar. 3-5, 2015 — Norfolk, Virginia</p>
                                </a>
                            </li>

                            <li class="carousel-item">
                                <a href="#">
                                    <img src="img/img-upcoming.jpg">
                                    <h3>Join Us at Health Pack</h3>
                                    <p>Mar. 3-5, 2015 — Norfolk, Virginia</p>
                                </a>
                            </li>
                        </ul> 
                    </div>
                </div>';

?>