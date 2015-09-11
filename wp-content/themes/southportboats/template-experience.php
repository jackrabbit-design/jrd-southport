<?php
    /*
    Template Name: Testimonials
    */
    get_header(); the_post(); ?>
    
    <div id="pg-title" style="background-image:url(<?php bloginfo('url');?>/ui/images/interior-banner.jpg)">
        <h2><?php the_title(); ?></h2>
    </div>
    
    
    <div id="main-content" class="testimonial-content">
        <div class="container">                
                

<?php query_posts('post_type=testimonial&order=DESC&orderby=date&posts_per_page=-1');
    while ( have_posts() ) : the_post(); ?>

            <div class="testimonial">
                <blockquote><?php the_field('quote'); ?></blockquote>
                <cite><strong><?php the_title(); ?></strong><br />
                    <?php the_field('author_location'); ?></cite>
            </div>
    

<?php endwhile; wp_reset_query();?> 
   


                

        </div>
    </div><!--main-content-->
    
<?php get_sidebar('full-modules'); ?>
<?php get_footer(); ?>