<?php
    /*
    Template Name: News Listing
    */
    get_header(); the_post();
?>

<div id="pg-title" style="background-image:url(<?php bloginfo('url'); ?>/ui/images/interior-banner.jpg)">
    <h2><?php the_title(); ?></h2>
</div>

<section id="media-overview">
    <div class="container">
        <div class="container-inner">
            <?php query_posts('post_type=news-article&posts_per_page=6&paged=' . $paged .'&orderby=date&order=DESC'); ?>

            <ul id="related-post" class="clearfix scroll-content">

                 <?php while ( have_posts() ) : the_post(); ?>

                 <li class="post-content">
                     <div class="text-wrap clearfix">
                         <div class="date-wrap pull-left">
                             <span><?php the_time('M'); ?></span>
                             <h6><?php the_time('j'); ?></h6>
                             <span><?php the_time('Y'); ?></span>
                         </div><!--date-wrap-->

                         <div class="text pull-right">
                             <h5><?php echo (get_field('news_external_link') ? '<a href="' . get_field('news_external_link') . '" target="_blank">' . get_the_title() . '</a>' : '<a href="' . get_permalink() . '">' . get_the_title() . '</a>'); ?></h5>
                             <p><?php the_excerpt(); ?></p>
                             <?php echo (get_field('news_external_link') ? '<a href="' . get_field('news_external_link') . '" class="link more" target="_blank">read more</a>' : '<a href="' . get_permalink() . '" class="link more">read more</a>'); ?>
                             
                         </div>
                     </div>
                 </li>

             <?php endwhile; ?>
            </ul>
                 <div class="loader">
                     <span>LOADING</span>
                 </div>
                 <div class="load-more">
                 	<?php next_posts_link('&nbsp;'); ?>
                 </div>
             <?php wp_reset_query(); ?>

        </div>
    </div>
</section><!--related-post-wrap/-->




<?php get_footer(); ?>
