<?php
    /*
    Template Name: Contact Page
    */

    get_header(); the_post(); ?>
    
    <div id="pg-title" style="background-image:url(<?php bloginfo('url');?>/ui/images/interior-banner.jpg)">
        <h2><?php the_title(); ?></h2>
    </div>
    
    
    <div id="main-content">
        <div class="container">
            <div class="container-inner clearfix contact">
                <article id="article" class="pg-content main-left pull-left">
                    <?php the_content(); ?>
                </article>
                
                <div class="content-sub">
                    <?php gravity_form(3, false, false, false, '', false); ?>
                </div>

            </div>
        </div>
    </div><!--main-content-->
    
<?php get_sidebar('full-modules'); ?>
<?php get_footer(); ?>