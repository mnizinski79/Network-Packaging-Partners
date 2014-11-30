<?php

 get_header('category'); ?> 
 <article>
    <div class="intro-container"> 
        <div class="col-container">
            <div class="main-content col-8">               
                   <?php $term_description = term_description();
                    if ( ! empty( $term_description ) ) :
                        printf( '<h2 class="taxonomy-description">%s</h2>', $term_description );
                    endif;
                    ?>                 
                <div class="results-list">
                    <ul>     

                    <?php if ( have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <li>
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="position-location">                               
                                <?php echo get_the_date(); ?><br>
                                <strong><?php the_author(); ?></strong>
                            </h4>
                            <div class="list-content">
                                <?php if ( has_post_thumbnail() ) {
                                    echo "<p>".the_post_thumbnail('thumbnail')."</p>"; 
                                } ?>
                                <h3><?php the_title(); ?></h3>
                                <p>
                                    <?php echo strip_tags(substr($post->post_content, 0, 200)); ?>...
                                </p>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <?php else: 

                            get_template_part( 'content', 'none' );

                     endif; ?>

                    </ul>
                </div>
            <?php echo paginate_links( $args ); ?>
            </div>
            <aside class="sidebar col-3">
                <?php dynamic_sidebar('category_sidebar'); ?>
            </aside>
        </div>
    </div> 

</article>
            
          
               
         


<?php get_footer(); ?>