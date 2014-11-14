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
                       <h3>Search Results for : <?php echo "$s"; ?> </h3>  
              
                <?php if (have_posts()) : while (have_posts()) : the_post();
                    $position_city = get_post_meta($post->ID, 'position_city', true );
                    $position_zipcode = get_post_meta($post->ID, 'position_zipcode', true );
                ?>
              
            <div class="secondary-content">
                <div class="col-container">
                    <div class="col-3">
                        <p><?php echo $position_zipcode; ?><BR><?php echo $position_city; ?></p>  
                    </div>
                    <div class="col-9">
                        <h4><a href="<?php the_permalink(); ?>" title="<?php the_title();     ?>"><?php the_title(); ?></a></h4>    
                    <p><?php the_excerpt(); ?></p>                 
                    </div>
                </div>
            </div>
                <?php endwhile; else : ?>
                    <p><?php _e( '<h4>Sorry, there were no results matching your search.</h4> ' ); ?></p>
                <?php endif; ?>
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