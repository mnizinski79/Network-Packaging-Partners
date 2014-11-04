<?php get_header(); ?>
<article>
                <div id="home-intro" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/img-hero-1.jpg);">
                    <div class="abs-content">
                        <h1>More than just the fancy wrapping</h1>
                        <p>
                            We bring a fresh perspective to packaging, with unparalleled expertise and a network of experienced resources. 
                        </p>
                        <a href="#" class="btn dark accent">What is Packaging</a>
                    </div>
                </div>
                
                <div id="find-positions">
                    <div class="col-container">
                        <form id="form-search-positions">
                            <h2>Find Positions</h2>
                            <fieldset>
                                <label for="input-search-positions">Search Positions</label>
                                <input id="input-search-positions" name="input-search-positions" type="text">
                                <button type="submit" value="Search" id="btn-search" class="btn search" name="btn-search"><span>Search</span></button>
                                <em class="tip-text"><strong>TIP:</strong> Use keywords such as “Package Design”</em>
                            </fieldset>
                        </form>

                        <div class="link-box col-container">
                            <div class="col-2">
                                <h3>For Candidates</h3>
                                <ul>
                                    <li><a href="#">View the jobs</a></li>
                                    <li><a href="#">Submit your resume</a></li>
                                    <li><a href="#">Get help &amp; info</a></li>
                                </ul>
                            </div>

                            <div class="col-2">
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
                
                <div id="positioning-message" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/img-hero-2.jpg);">
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
                        <div class="container-feed-positions col-3">
                            <h3>Positions <a href="#" class="btn primary">View all</a></h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        <h4 class="position-location">New York City: <strong>10017</strong></h4>
                                        <h3>Packaging Engineer</h3>
                                        <p>Lorium ipsum dolar sit amet tis fact.</p>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <h4 class="position-location">New York City: <strong>10017</strong></h4>
                                        <h3>Packaging Engineer</h3>
                                        <p>Lorium ipsum dolar sit amet tis fact.</p>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <h4 class="position-location">New York City: <strong>10017</strong></h4>
                                        <h3>Packaging Engineer</h3>
                                        <p>Lorium ipsum dolar sit amet tis fact.</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="container-feed-events col-3">
                            <h3>Upcoming <a href="#" class="btn primary">View all</a></h3>
                            
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/img-upcoming.jpg">
                                        <h3>Join Us at Health Pack</h3>
                                        <p>Mar. 3-5, 2015 — Norfolk, Virginia</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="container-feed-news col-3">
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
                                        //var_dump($recent); die(); 
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
                                        //echo '<h4 class="position-location">'.$recent['post_date'].'</h4>';  //the_date('Y-m-d', '<h4 class="position-location">', '</h4>');
                                        
                                        echo '<h3>'.$recent["post_title"].'</h3>';
                                        echo '<p>'.substr($recent["post_content"], 0,50).' ...</p>';
                                        echo '</div>';
                                        echo '</a>';
                                        echo '</li>';
                                       // echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
                                    }
                                ?>                                
                            </ul>
                        </div>
                    </div>                    
                </div>
            </article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>