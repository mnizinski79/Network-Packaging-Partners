<footer>
                <div class="sub-footer" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/img/img-bg-1.jpg);">
                    <a href="/contact-us/">
                        <strong>Got an emergency?</strong>
                        <span>We can help.</span>
                    </a>
                </div>
                
                <div class="prim-footer">
                    <p class="copyright">Network Packaging Partners</p>
                    <!--<ul class="footer-links">
                        <li><a href="#">Become a Partner</a></li>
                        <li><a href="#">Upload Resume</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>-->
                    <?php 
                        wp_nav_menu( array(
                            'theme_location' => 'ancilary-menu',
                            'menu_class' => 'footer-links',
                            'container' => false,
                            'menu_id' =>'ancilary-nav',
                            // etc.
                        ) ); 
                    ?>
                </div>                    
            </footer>
            
        </div>     


        <?php wp_footer(); ?>
    </body>
</html>
