<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	


        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    
        
        <script src="//use.typekit.net/qwu3lkd.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>

        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>   

        <?php wp_head(); ?>     
        
</head>
<body>
    
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <div id="container">
            <?php get_search_form(); ?>
            <header>
                <a href="/"><h1 id="logo">Network Packaging Partners</h1></a>
                <a href="#" class="mobile nav-trigger">mobile trigger</a>
                <nav id="nav-container">
                    <!--<ul id="primary-nav">
                        <li id="lnk-why-us"><a href="#">Why Us</a></li>
                        <li id="lnk-capabilities"><a href="#">Capabilities</a></li>
                        <li id="lnk-expertise"><a href="#">Expertise</a></li>
                        
                    </ul>-->
                    <?php 
                    	wp_nav_menu( array(
						    'theme_location' => 'primary-menu',
						    'container' => false,
						    'menu_id' =>'primary-nav',
						    // etc.
						) ); 
					?>
                    
                    <!--<ul id="secondary-nav">
                        <li><a href="#">Candidates</a></li>
                        <li><a href="#">Companies</a></li>
                        <li class="btn-search"><a href="#"><span>Search</span></a></li>
                    </ul>-->
                    <?php 
                    	wp_nav_menu( array(
						    'theme_location' => 'secondary-menu',
						    'container' => false,
						    'menu_id' =>'secondary-nav',
						    // etc.
						) ); 
					?>
                    
                   <!-- <ul id="ancilary-nav">
                        <li><a href="#">Become a Partner</a></li>
                        <li><a href="#">Upload Resume</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>-->
                     <?php 
                    	wp_nav_menu( array(
						    'theme_location' => 'ancilary-menu',
						    'container' => false,
						    'menu_id' =>'ancilary-nav',
						    // etc.
						) ); 
					?>
                </nav>


            </header>