<?php
/*
 * Template Name: NPP Single Page
 * Description: A Page Template with no sidebar
 */
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
                <form id="form-primary-search-results">
                    <fieldset class="icon-ico-magnifing-glass">
                        <label>Search Results</label>
                        <input type="text" name="input-search-results" id="input-search-results" value="<?php echo "$s"; ?>">
                     </fieldset>
                </form>
                <div class="results-list">
                    <ul>
                    <?php if (have_posts()) : while (have_posts()) : the_post();
                        $position_city = get_post_meta($post->ID, 'position_city', true );
                        $position_zipcode = get_post_meta($post->ID, 'position_zipcode', true );
                    ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="position-location">
                                <strong>Location</strong><br>
                                <?php echo $position_city; ?>: 
                                <strong><?php echo $position_zipcode; ?></strong>
                            </h4>
                            <div class="list-content">
                                <h3><?php the_title(); ?></h3>
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; else : ?>
                        <li><?php _e( '<h3>Sorry, there were no results matching your search.</h3> ' ); ?></li>
                    <?php endif; ?>
                    </ul>
                </div>
            <?php echo paginate_links( $args ); ?>
            </div>
            <aside class="sidebar col-3">
                <?php dynamic_sidebar('search_sidebar'); ?>
            </aside>
        </div>
    </div> 
    <div class="comments-container">
                    <p>Comments here if needed</p>
    </div>  
</article>
            
          
               
         


<?php get_footer(); ?>