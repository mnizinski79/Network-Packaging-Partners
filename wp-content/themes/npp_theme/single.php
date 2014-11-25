<?php
/*
 * Template Name: NPP Custom Single Page
 * Description: A Page Template with no sidebar
 */

 get_header('single'); ?>   

            
            <article>
                <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <div class="default-container">
                    <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

                    if ($feat_image){
                    ?>
                    <div class="detail-img">
                        <img src="<?php echo $feat_image; ?>" />
                    </div>
                    <?php
                    }
                    ?>
                    <?php the_content(); ?>

                    <?php
                    if(get_the_tag_list()) {
                        echo get_the_tag_list('<ul class="tag-list"><li>','</li><li>','</li></ul>');
                    }
                    ?>                    
                <?php endwhile; endif; ?>
                </div>
                
            </article>
<?php get_footer(); ?>