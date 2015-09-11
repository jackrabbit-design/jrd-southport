<?php
    /*
    Template Name: Home
    */
    get_header(); the_post();
?>   


    <div id="hm-slider">
        <ul class="cycle-slideshow" data-cycle-fx="fade" 
            data-cycle-pager=".banner-pager"
            data-cycle-swipe=true
            data-cycle-timeout=0
            data-cycle-swipe-fx=scrollHorz
            data-cycle-slides=">li">          

            <?php if( have_rows('home_slideshow') ): ?>
                <?php while ( have_rows('home_slideshow') ) : the_row(); 
                    $homeSlideImage = get_sub_field('home_slide_image') ?>

                    <li>
                        <div class="banner-img" style="background-image:url(<?php echo $homeSlideImage['sizes']['full-banner']; ?>)"></div>
                        <div class="banner-text">
                            <div class="container">
                                <div class="container-inner">
                                    <div class="text-wrap">
                                        <h2><?php the_sub_field('home_slide_title'); ?></h2>
                                        <p><?php the_sub_field('home_slide_description'); ?></p>
                                        <a href="<?php the_sub_field('home_slide_button_link'); ?>" class="btn white-outline"><?php the_sub_field('home_slide_button_label'); ?></a>
                                        <?php echo (get_sub_field('display_demo_button') == 'Yes' ? '<a href="' . get_bloginfo() . '/contact" class="btn white-outline">Schedule a Demo</a>' : ''); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                <?php endwhile; ?>
            <?php else: endif; ?>                   

        </ul>
        <div class="pager-wrap">
            <div class="container">
                <div class="container-inner">
                    <div class="banner-pager"></div>
                </div>
            </div>
        </div>
    </div>
    

    <section id="pg-links" class="module">
        <div class="container">
            <div class="container-inner clearfix">
                <ul>

                    <?php if( have_rows('editon_callouts') ): ?>
                        <?php while ( have_rows('editon_callouts') ) : the_row(); 
                            $editionCalloutImage = get_sub_field('edition_image') ?>

                            <li>
                                <a href="<?php the_sub_field('edition_button_link'); ?>"><img src="<?php echo $editionCalloutImage['sizes']['news-teaser-image']; ?>" alt="<?php echo $editionCalloutImage['alt']; ?>" /></a>
                                <h2><a href="<?php the_sub_field('edition_button_link'); ?>"><?php the_sub_field('edition_title'); ?></a></h2>
                                <p><?php the_sub_field('edition_description'); ?></p>
                                <a href="<?php the_sub_field('edition_button_link'); ?>" class="btn black-btn"><?php the_sub_field('edition_button_label'); ?></a>
                            </li>

                        <?php endwhile; ?>
                    <?php else: endif; ?>                   

                </ul>
            </div>
        </div>
    </section>

<?php get_sidebar('full-modules'); ?>
    
<?php get_footer(); ?>    