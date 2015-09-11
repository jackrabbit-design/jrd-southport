

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
<!-- 
                                    +        
                                  ++++       
                                 ++++++      
                                ++++++++     
                               ++++++++++    
                              ++++++++++++   
                              ++++++++++++,  
                             ++++++++++++++  
                             ++++++++++++++, 
                            ,+++++++++++++++ 
            +??????????????333++++++++++++++ 
        +++++++++++++I3333333333++++++++++++ 
      ++++++++++++733333333333333+++++++++++ 
     +++++++++++333333333333333333++++++++++ 
     +++++++++   333333333333333333+++++++++ 
     ++++++++     33333333333333333+++++++++ 
     ++++++        33333333333333333+++++++  
     +++++          3333333333333333+++++++  
     ++++             33333333333333++++++   
     +++                3333333333333++++    
      ++                  33333333333+++     
                            333333337++      
                               33333++       
                                  33+        

-->
    <meta name="MSSmartTagsPreventParsing" content="true" /><!--[if lte IE 9]><meta http-equiv="X-UA-Compatible" content="IE=Edge"/><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <?php if (is_front_page()) { ?><title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <?php } else { ?><title><?php wp_title(''); ?> | <?php bloginfo('name'); ?></title><?php }; ?>
    <link type="text/css" rel="stylesheet" media="all" href="<?php bloginfo('url'); ?>/ui/css/style.css" />
    <link type="text/plain" rel="author" href="<?php bloginfo('url'); ?>/authors.txt" />
    <link type="image/x-icon" rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico" />
    <script src="<?php bloginfo('url'); ?>/ui/js/modernizr.js"></script>
    <script src="<?php bloginfo('url'); ?>/ui/js/jquery.js" type="text/javascript"></script>
</head>
<body <?php body_class(); ?>>
    <!--[if lte IE 7]><iframe src="<?php bloginfo('url'); ?>/unsupported.html" frameborder="0" scrolling="no" id="no_ie6"></iframe><![endif]-->

    <header id="header" <?php if(!is_front_page()) { echo 'class="inner-pg"';} ?>>
        <div class="container">
            <div class="container-inner clearfix">
                <h1 id="logo" class="pull-left">
                    <a href="<?php bloginfo('url'); ?>">
                        <img src="<?php bloginfo('url'); ?>/ui/images/logo.png" class="def-logo" width="220" height="66" alt="" />
                        <img src="<?php bloginfo('url'); ?>/ui/images/black-logo.png" class="hover-logo" width="220" height="66" alt="" />
                    </a>
                </h1>
                
                <div class="header-right-desktop pull-right hidden-s">
                    <div class="top-wrap clearfix">
                        <div class="pull-left top-left">
                            <div class="clearfix">
                                <div class="top-nav pull-left ">
                                    <?php wp_nav_menu('menu=Utility Menu&container=&menu_id=&link_before=&link_after='); ?>                    
                                </div>
                                
                            </div>
                        </div><!--top-left-->
                        
                        <div class="pull-right top-right top-social-icon">
                            <?php echo (get_field('linkedin_link', 'options') ? '<a href="' . get_field('linkedin_link', 'options') . '" target="_blank"><i class="social-linkedin"></i></a>' : ''); ?>
                            <?php echo (get_field('twitter_link', 'options') ? '<a href="' . get_field('twitter_link', 'options') . '"> target="_blank"<i class="social-twitter"></i></a>' : ''); ?>
                            <?php echo (get_field('facebook_link', 'options') ? '<a href="' . get_field('facebook_link', 'options') . '" target="_blank"><i class="social-facebook"></i></a>' : ''); ?>
                        </div><!--top-right-->
                    </div><!--top-wrap-->
                    <nav id="main-nav">
                        <?php wp_nav_menu('menu=Main Menu&container=&menu_id=&link_before=&link_after='); ?>                    
                    </nav>
                </div>
      
                
                <div id="toggle_menu_btn" class="visible-s pull-right"> <span></span></div>
                <div id="mobile-menu" class="pull-right">
                    <nav id="mobile-nav">
                        <?php wp_nav_menu('menu=Main Menu&container=&menu_id='); ?>                    
                    </nav>
                    
                    <div class="sec-nav">
                        <?php wp_nav_menu('menu=Utility Menu&container=&menu_id=&link_before=&link_after='); ?>  
                    </div>                    
                    
                    <div class="social-icon">
                        <?php echo (get_field('linkedin_link', 'options') ? '<a href="' . get_field('linkedin_link', 'options') . '" target="_blank"><i class="social-linkedin"></i></a>' : ''); ?>
                        <?php echo (get_field('twitter_link', 'options') ? '<a href="' . get_field('twitter_link', 'options') . '"> target="_blank"<i class="social-twitter"></i></a>' : ''); ?>
                        <?php echo (get_field('facebook_link', 'options') ? '<a href="' . get_field('facebook_link', 'options') . '" target="_blank"><i class="social-facebook"></i></a>' : ''); ?>
                    </div>
                    
                </div><!--mobile-menu-->
            </div>
        </div>
    </header>
