<?php

$custom_query = false; $positions;
require_once('includes/db.php');


$querystr; $has_results=false;
if (isset($_REQUEST['position-name']) && $_REQUEST['position-name']!='null'){
 
    $positions = getPostsByTitle($_REQUEST['position-name']);
    $custom_query=true;
    
}
if (isset($_REQUEST['position-location']) && $_REQUEST['position-location']!=null && $_REQUEST['position-location']!='null'){   
    if (isset($_REQUEST['position-name']) && $_REQUEST['position-name']!='null'){
       $positions = getPostsByLocationAndTitle($_REQUEST['position-location'],$_REQUEST['position-name']);
    }else {        
        $positions = getPostsByLocation($_REQUEST['position-location']);
    }
    $custom_query = true;
}

if (sizeof($positions)>0){
    $has_results=true;
}

$args = array(
    'base'         => '%_%',
    'format'       => '?page=%#%',
    'total'        => 1,
    'current'      => 0,
    'show_all'     => False,
    'end_size'     => 1,
    'mid_size'     => 2,
    'prev_next'    => True,
    'prev_text'    => __('« Prev'),
    'next_text'    => __('Next »'),
    'type'         => 'plain',
    'add_args'     => False,
    'add_fragment' => '',
    'before_page_number' => '',
    'after_page_number' => ''
); 

 get_header('search'); ?> 
 <article>
    <div class="intro-container"> 
        <div class="col-container">
            <div class="main-content col-8">
                <!--
                <form id="form-primary-search-results" action="<?php bloginfo('url'); ?>/">
                    <fieldset class="icon-ico-magnifing-glass">
                       
                        <label>All Jobs</label>
                        <input type="text" name="s" id="input-search-results" value="<?php echo $s." ".($_REQUEST['position-name']!='null' ? $_REQUEST['position-name'] : '')." ".($_REQUEST['position-location']!='null' ? $_REQUEST['position-location'] : ''); ?>">

                     </fieldset>
                </form>
                -->
                
                <div class="results-list">
                    <ul>     

                    <?php if ( have_posts() && !$custom_query) : $has_results=true; ?>
                    <?php while (have_posts()) : the_post(); 
                        //if (get_the_title($post->ID)==''){continue;}
                         if (get_the_company_name($post->ID)==''){continue;}
                         $position_city = get_post_meta($post->ID, '_job_location', true );
                         $position_zipcode = get_post_meta($post->ID, 'position_zipcode', true );
                    ?>
                        <li>
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="position-location">
                                <strong>Location</strong><br>
                                <?php echo $position_city; ?> 
                                <strong><?php echo $position_zipcode; ?></strong>
                            </h4>
                            <div class="list-content">
                                <h3><?php the_title(); ?></h3>
                                <p>
                                    <?php echo substr($post->post_content, 0, 200); ?>...
                                </p>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    <?php  if (sizeof($positions)>0){ ?>
                    <?php foreach ($positions as $position) {
                        $position_city = get_post_meta($position->ID, '_job_location', true );
                        $position_zipcode = get_post_meta($position->ID, 'position_zipcode', true );
                   
                    ?>
                         <li>
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="position-location">
                                <strong>Location</strong><br>
                                <?php echo $position_city; ?>: 
                                <strong><?php echo $position_zipcode; ?></strong>
                            </h4>
                            <div class="list-content">
                                <h3><?php echo $position->post_title; ?></h3>
                                <p>
                                     <?php echo substr($position->post_content, 0, 200); ?>...
                                </p>
                            </div>
                        </a>
                    </li>
                    <?php  }
                    } 
                    if (!$has_results){ ?>
                        <li><?php _e( '<h3>Sorry, there were no results matching your search.</h3> ' ); ?></li>
                    <?php } ?>            


                    </ul>
                </div>
            <?php echo paginate_links( $args ); ?>
            </div>
            <aside class="sidebar col-3">
                <?php dynamic_sidebar('search_sidebar'); ?>
            </aside>
        </div>
    </div> 

</article>
            
          
               
         


<?php get_footer(); ?>