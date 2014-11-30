<?php
 global $wpdb;
 $querystr = "select DISTINCT meta_value FROM ".$wpdb->postmeta." WHERE meta_key = '_job_location' ORDER BY meta_value ASC";           
 $cities =  $wpdb->get_results($querystr, OBJECT);

?>     
<div class="secondary-content col-container">
                    <div class="col-container">
                        <div class="col-3 sidebar">
                            <h3>Find a Position</h3>
                            <form id="search-jobs" action="<?php echo get_site_url(); ?>">
                                <input type="hidden" name="post_type" value="job_listing" />
                                <input type="hidden" name="s" value="" /> 
                                <fieldset>
                                    <label for="input-search-positions">Jobs interested in</label>
                                    <select name="position-name" id="select-jobs-interested">
                                        <option selected value="null">Jobs interested in...</option>
                                        <?php $recent_posts = wp_get_recent_posts(array(                                                                                                           
                                                        'orderby' => 'post_title',
                                                        'order' => 'ASC',                                                        
                                                        'post_type' => 'job_listing',
                                                        'post_status' => 'publish'));
                                            foreach( $recent_posts as $recent ){  
                                                echo '<option value="'.$recent["post_title"].'">'.$recent["post_title"].'</option>';                                                
                                            }
                                        ?>                                         
                                    </select>
                                </fieldset>

                                <fieldset>
                                    <label for="input-search-positions">Location</label>
                                    <select name="position-location" id="select-jobs-location">
                                        <option selected value="null">Location...</option>
                                       <?php foreach( $cities as $city){ 
                                        if ($city->meta_value != ''){
                                            echo '<option value="'.$city->meta_value.'">'.$city->meta_value.'</option>';
                                        }                                         
                                       }
                                       ?> 
                                    </select>
                                </fieldset>

                                <fieldset class="btn-row">
                                    <button type="submit" value="Search" id="btn-search" class="btn primary accent-search" name="btn-search"><span>Search</span></button>
                                </fieldset>
                            </form>
                        </div>

                        <div class="col-8">
                            <h3>Recent Position <a href="#" class="btn primary">View all</a></h3>

                            <div class="container-feed-positions">
                                <ul class="col-container">
                                  <?php $recent_posts = wp_get_recent_posts(array(
                                                        'numberposts' => 6,                                                        
                                                        'orderby' => 'post_date',
                                                        'order' => 'DESC',                                                        
                                                        'post_type' => 'job_listing',
                                                        'post_status' => 'publish'));
                                    foreach( $recent_posts as $recent ){  
                                        $position_city = get_post_meta($recent["ID"], '_job_location', true );
                                        $position_zipcode = get_post_meta($recent["ID"], 'position_zipcode', true );
                                        echo '<li class="col-6">';
                                        echo '<a href="'.get_permalink($recent["ID"]).'">';
                                        echo '<h4 class="position-location">';
                                        if ($position_city !='' ){echo $position_city; }
                                        if (($position_city !='') && ($position_zipcode!='')) {echo ' : ';}
                                        if ($position_zipcode!=''){echo  '<strong>'.$position_zipcode.'</strong>';}
                                        if (($position_city =='') && ($position_zipcode=='')) {echo '&nbsp;';}
                                        echo '</h4>';
                                       
                                        echo '<h3>'.$recent["post_title"].'</h3>';
                                        echo '<p>'.substr($recent["post_content"], 0,50).' ...</p>';
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                ?>   
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>