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


                <!--the stuff after this is what we need to widgetize-->
                <div class="branding-box" style="background-image:url(img/img-bg-2.jpg);">
                    <div class="abs-content">
                        <h2>Our people</h2>
                        <p>
                            Our network of talent is second to none. We pride ourselves not only 
                            on our collective depth of expertise, but also on hiring intuitive 
                            people who think creatively and work efficiently.
                        </p>
                        <a href="#" class="btn primary">Join our team</a>
                    </div>
                </div>
                
                <div class="secondary-content">
                    <div class="col-container">
                        <div class="col-6">
                            <h2>Principles &amp; Process</h2>

                            <p>
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>

                            <p>
                                Quisque pellentesque lectus eu nisi congue tempus. Integer ut porta leo. Aliquam a ex luctus nibh 
                                finibus porttitor. Nulla turpis nibh, commodo ut rhoncus vel, tempor vitae odio. Nunc non dictum 
                                nisl. Vivamus imperdiet sem vel congue ultricies. Donec accumsan libero vehicula, rutrum enim 
                                suscipit, viverra magna. Sed non consectetur dui. Etiam ac bibendum libero. Vivamus in libero et 
                                dui condimentum maximus id nec eros. Aliquam in elementum arcu. Nunc vel gravida nibh, non 
                                hendrerit tellus. Quisque vel est nec nulla viverra molestie. Duis eleifend odio nibh, id 
                                facilisis tellus cursus ut.
                            </p>

                            <ul class="arrow-accent-list">
                                <li>Nunc ut eros mollis, molestie sem ac, interdum odio.</li>
                                <li>Nullam vel urna dapibus, eleifend neque quis, luctus sem.</li>
                                <li>Mauris vel nulla vel augue dignissim elementum eget quis est.</li>
                                <li>Curabitur eget enim quis nulla mollis mollis.</li>
                            </ul>
                        </div>

                        <div class="col-6">
                            <figure>
                                <img src="img/img-process-graphic.png">
                                <figcaption>Network Packaging Process Chart</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <!--conditionally include related posts slider-->
                <?php
                 if( get_post_meta($post->ID, 'npp-related-posts', true )){
                ?>
                    <?php echo do_shortcode('[npp-related-posts-slider]'); 
                }
                ?>
                <!--conditionally include child pages widget-->
                 <?php
                 if( get_post_meta($post->ID, 'npp-child-pages', true )){
                ?>
                    <?php echo do_shortcode('[npp-child-pages]'); 
                }
                ?>
                
            </article>
<?php get_footer(); ?>