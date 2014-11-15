
<?php get_header(); 

?>
<article>
               
                <?php
                $post_id = get_the_ID();
                $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post_id) );

                $thumbnail_id    = get_post_thumbnail_id($post_id);
                $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

                

                ?>
                <div id="home-intro" style="background-image:url(<?php echo $feat_image; ?>);">
                    <div class="abs-content">
                        <h1><?php echo $thumbnail_image[0]->post_title; ?></h1>
                        <?php cc_featured_image_caption(); ?>                       
                    </div>
                </div>
                
                <div id="find-positions">
                    <div class="col-container">
                        <form id="form-search-positions">
                            <input type="hidden" name="post_type" value="position" />
                            <h2>Find Positions</h2>
                            <fieldset>
                                <label for="input-search-positions">Search Positions</label>
                                <input id="input-search-positions" name="s" type="text">
                                <button type="submit" value="Search" id="btn-search" class="btn search" name="btn-search"><span>Search</span></button>
                                <em class="tip-text"><strong>TIP:</strong> Use keywords such as “Package Design”</em>
                            </fieldset>
                        </form>

                        <div class="link-box col-container">
                            <div class="col-6">
                                <h3>For Candidates</h3>
                                <ul>
                                    <li><a href="#">View the jobs</a></li>
                                    <li><a href="#">Submit your resume</a></li>
                                    <li><a href="#">Get help &amp; info</a></li>
                                </ul>
                            </div>

                            <div class="col-6">
                                <h3>For Companies</h3>
                                <ul>
                                    <li><a href="#">Become a partner</a></li>
                                    <li><a href="#">Submit a position</a></li>
                                    <li><a href="#">Fill a position</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
                
               
                <div id="positioning-message" class="branding-box" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/img-hero-2.jpg);">
                    <div class="abs-content">
                        <h2>Our business is built on trust.</h2>
                        <p>
                            We create lasting relationships with everyone we work with — client partners and candidates alike.
                        </p>
                        <a href="#" class="btn primary">See how we're different</a>
                    </div>
                </div>

                
                
                <div id="content-feeds">
                    <div class="col-container">
                        <div class="container-feed-positions col-4">
                            <h3>Positions <a href="#" class="btn primary">View all</a></h3>
                            <ul>
                                <?php $recent_posts = wp_get_recent_posts(array(
                                                        'numberposts' => 3,                                                        
                                                        'orderby' => 'post_date',
                                                        'order' => 'DESC',                                                        
                                                        'post_type' => 'position',
                                                        'post_status' => 'publish'));
                                    foreach( $recent_posts as $recent ){  
                                        //var_dump($recent); die();
                                        $position_city = get_post_meta($recent["ID"], 'position_city', true );
                                        $position_zipcode = get_post_meta($recent["ID"], 'position_zipcode', true );
                                        echo '<li>';
                                        echo '<a href="'.get_permalink($recent["ID"]).'">';
                                        echo '<h4 class="position-location">'.$position_city.': <strong>'.$position_zipcode.'</strong></h4>';
                                        echo '<h3>'.$recent["post_title"].'</h3>';
                                        echo '<p>'.substr($recent["post_content"], 0,50).' ...</p>';
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                ?>                               
                            </ul>
                        </div>
                        
                
                        <div class="container-feed-events col-4">
                            <h3>Upcoming <a href="#" class="btn primary">View all</a></h3>
                            
                            <ul>
                                 <?php $recent_posts = wp_get_recent_posts(array(
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
                                ?>
                                
                            </ul>
                        </div>
                        
                        <div class="container-feed-news col-4">
                            <h3>News <a href="#" class="btn primary">View all</a></h3>
                            
                            <ul>
                                <?php
                                    $recent_posts = wp_get_recent_posts(array(
                                                        'numberposts' => 3,                                                        
                                                        'orderby' => 'post_date',
                                                        'order' => 'DESC',                                                        
                                                        'post_type' => 'post',
                                                        'post_status' => 'publish'));
                                    foreach( $recent_posts as $recent ){  
                                        echo '<li>';                                    
                                        echo '<a href="' . get_permalink($recent["ID"]) . '">';
                                        $image = wp_get_attachment_url(get_post_thumbnail_id($recent["ID"]));
                                        
                                        if ($image!='' && $image){
                                            echo '<div class="img-thumb"><img src="'.$image.'"></div>';
                                        }else {
                                            echo '<div class="img-thumb"><img src="'.get_template_directory_uri().'/img/img-news-1.jpg"></div>';
                                        }
                            
                                        echo '<div class="news-excerpt">';
                                        echo '<h4 class="position-location">'.date('M. d, Y',strtotime($recent['post_date'])).'</h4>';  //the_date('Y-m-d', '<h4 class="position-location">', '</h4>');
                                        echo '<h3>'.$recent["post_title"].'</h3>';
                                        echo '<p>'.substr($recent["post_content"], 0,50).' ...</p>';
                                        echo '</div>';
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                ?>                                
                            </ul>
                        </div>
                    </div>                    
                </div>
            </article>
<?php get_footer(); ?>