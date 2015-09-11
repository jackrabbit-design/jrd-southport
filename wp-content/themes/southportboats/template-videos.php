<?php
    /*
    Template Name: Video Listing
    */
    get_header(); the_post();
?>

<div id="pg-title" style="background-image:url(<?php bloginfo('url'); ?>/ui/images/interior-banner.jpg)">
    <h2><?php the_title(); ?></h2>
</div>

<section id="video-box-main">
    <div class="container">
        <div class="container-inner">
            <?php query_posts('post_type=video&posts_per_page=6&paged=' . $paged .'&orderby=date&order=DESC'); ?>

            <div class="clearfix two-colomn" id="video-box-wrap">

                 <?php while ( have_posts() ) : the_post(); ?>

                    <div class="video clearfix">
                        <div class="video-column video-right mobile clearfix">
                            <div class="video-thumbnail" style="background-image:url(http://img.youtube.com/vi/<?php the_field('youtube_video_id'); ?>/0.jpg)">
                                <a class="video-link" href="http://www.youtube.com/watch?v=<?php the_field('youtube_video_id'); ?>?autoplay=0">
                                    <div class="play-btn"></div>
                                </a>
                            </div><!--right-box-->
                        </div>
                        <div class="video-column video-left">
                            <h3><?php the_title(); ?></h3>
                            <?php the_field('video_description'); ?>
                        </div><!--left-box-->
                        <div class="video-column video-right desktop">
                            <div class="video-thumbnail" style="background-image:url(http://img.youtube.com/vi/<?php the_field('youtube_video_id'); ?>/0.jpg)">
                                <a class="video-link" href="http://www.youtube.com/watch?v=<?php the_field('youtube_video_id'); ?>?autoplay=0">
                                    <div class="play-btn"></div>
                                </a>
                            </div><!--right-box-->
                        </div>
                    </div>



             <?php endwhile; ?>
            </div>
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
