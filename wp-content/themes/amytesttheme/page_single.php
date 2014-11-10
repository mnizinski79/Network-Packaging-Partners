<?php
/*
 * Template Name: NPP Single Page
 * Description: A Page Template with no sidebar
 */

 get_header(); ?>
            
            <div id="page-header" style="background-image:url(img/template-img-header.jpg);">
                <div class="abs-content">
                    <p class="breadcrumbs">Oct. 15, 2014</p>
                    <h1>New Package Material</h1>
                </div>

                <div class="share-box">
                    <h3>Share:</h3>
                    <ul>
                        <li class="social-linkedin"><a href="#"><span>Linked In</span></a></li>
                        <li class="social-twitter"><a href="#"><span>Twitter</span></a></li>
                        <li class="social-googleplus"><a href="#"><span>Google Plus</span></a></li>
                    </ul>
                </div>
            </div>
            
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
                    
                    <?php the_title('<h2 class="hdr-detail">','</h2>'); ?>
                
                    <ul class="tag-list">
                        <li><a href="#">Package</a></li>
                        <li><a href="#">Network</a></li>
                        <li><a href="#">Work Place</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                    
                    <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
                
                <div class="comments-container">
                    Comments here if needed
                </div>
                
            </article>
<?php get_footer(); ?>