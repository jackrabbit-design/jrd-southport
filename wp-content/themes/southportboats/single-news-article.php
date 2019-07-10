<?php get_header(); the_post(); ?>
    

    <div id="pg-title" style="background-image:url(<?php bloginfo('url');?>/ui/images/interior-banner.jpg)">
        <h2>News</h2>
    </div>
    
    
    <div id="main-content">
        <div class="container">
            <div class="container-inner clearfix">
            <?php $videoUse = get_field('use_large_video_template'); ?>
            <?php $video = get_field('youtube_video_id'); ?>

    <?php if($videoUse) { ?>
                <div class="youtube-container">
                    <iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $video; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>

                <article id="article" class="pg-content main-left pull-left">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </article>
                
                
                <aside id="aside" class="main-right pull-right">

                    <div class="side-bar-box">
                    </div>

                    <?php get_sidebar('modules'); ?>
                </aside>

<?php } else { ?>

                <article id="article" class="pg-content main-left pull-left">
                    <h3><?php the_title(); ?></h3>
                    <?php if($video) { ?> 
                        <div class="youtube-container">
                            <iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $video; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    <?php } ?>
                    <?php the_content(); ?>
                </article>


                <aside id="aside" class="main-right pull-right">

                <div class="side-bar-box">
                    <?php $newsImage = get_field('news_teaser_image'); ?>
                    <img src="<?php echo $newsImage['sizes']['sidebar-image']; ?>" alt="<?php echo $newsImage['alt']; ?>" />
                </div>

                    <?php get_sidebar('modules'); ?>
                </aside>



<?php } ?>

            </div>
        </div>
    </div><!--main-content-->
    


<?php get_sidebar('full-modules'); ?>
<?php get_footer(); ?>