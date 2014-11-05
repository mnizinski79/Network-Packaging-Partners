<footer>
                <div class="sub-footer" style="background-image:url(img/img-bg-1.jpg);">
                    <a href="#">
                        <strong>Got an Emergency?</strong>
                        <span>We can help</span>
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
        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main-min.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
