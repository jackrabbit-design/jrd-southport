<?php
    /*
    Template Name: Gallery
    */
    get_header(); the_post();
?>   
    
    <div id="pg-title" style="background-image:url(<?php bloginfo('url');?>/ui/images/interior-banner.jpg)">
        <h2><?php the_title(); ?></h2>
    </div>
    
    <div id="top-content">
        <div class="container">
            <div class="container-inner clearfix">
                <article id="article" class="pg-content main-left pull-left">
                    <?php the_content(); ?>
                </article>
                
                <aside id="aside" class="main-right pull-right">
                    <?php get_sidebar('modules'); ?>
                </aside>
            </div>
        </div>
    </div><!--top-content/-->
    
    <section id="gallery-landing">
        <div class="container">
            <div class="container-inner">
                <ul id="gallery-wrap">

                    <?php query_posts('post_type=gallery-item&posts_per_page=-1&orderby=date&order=DESC');
                        while ( have_posts() ) : the_post(); ?>

                        <li>
                            <div class="top-box clearfix">
                                <div class="box-one pull-left">
                                    <h4><?php the_title(); ?></h4>
                                </div>
                                <!-- <div class="box-two pull-right">
                                    <a href="<?php the_permalink(); ?>" class="link">VIEW ALL</a>
                                </div> -->
                            </div><!--top-box-->
                            
                            <ul class="gallery-slider">

                                <?php if( have_rows('gallery_images') ):
                                    while ( have_rows('gallery_images') ) : the_row(); 
                                    $galleryImage = get_sub_field('gallery_image');
                                    ?>
                                        <li>
                                            <a href="<?php echo $galleryImage['sizes']['models-image'] ?>" class="image-link"><img src="<?php echo $galleryImage['sizes']['model-features-image'] ?>" alt="<?php the_sub_field('gallery_image_title'); ?>" /></a>
                                        </li>

                                    <?php endwhile;
                                    else: endif; ?>                                   
                            </ul>
                        </li>

                    <?php endwhile; wp_reset_query();?> 
   
                </ul><!--gallery-wrap-->
            </div>
        </div>
    </section><!--gallery-landing/-->
    

<?php get_footer(); ?>