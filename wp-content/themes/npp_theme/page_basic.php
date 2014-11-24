<?php
/*
 * Template Name: NPP Basic Page
 * Description: A Page Template with a small sidebar
 */

 get_header('single'); ?>   

            <article>
                <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <div class="intro-container">
                    <div class="col-container">
                        <div class="main-content col-8">
                        	<?php the_content(); ?>
                    		<?php endwhile; endif; ?>
                        </div>
	
                 <aside class="sidebar col-3">
                           <?php dynamic_sidebar('Default Right Sidebar'); ?>
                        </aside>
                    </div>
                </div>
                 
                <?php include('custom_content_blocks.php'); ?>                   
                
            </article>
<?php get_footer(); ?>