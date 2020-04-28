<?php
    /*
    Template Name: Home
    */
    get_header(); the_post();
?>

<?php if(get_field('show_banner_video')) {
    $videoImage = get_field('banner_video_fallback_image') ?>


    <div id="hero-video" style="background-image: url(<?php echo $videoImage['sizes']['full-banner-large']; ?>);">
        <video autoplay muted loop poster="<?php echo $videoImage['sizes']['full-banner-large']; ?>">
            <source src="<?php the_field('banner_video'); ?>" type="video/mp4">
        </video>
        <div class="banner-text <?php the_sub_field('slide_callout_location'); ?>">
            <div class="container">
                <div class="container-inner">

                    <div class="text-wrap">
                        <h2><?php the_field('banner_video_overlay_title') ?></h2>
                        <?php echo (get_field('banner_video_overlay_text') ? '<p>' . get_field('banner_video_overlay_text') . '</p>' : ''); ?>
                        <a href="<?php the_field('banner_video_overlay_link'); ?>" class="btn white-outline"><?php the_field('banner_video_overlay_link_label'); ?></a>
                    </div>
                </div>

            </div>
        </div>
    </div>


<?php } else { ?>

    <div id="hm-slider">
        <ul class="cycle-slideshow" data-cycle-fx="fade"
            data-cycle-pager=".banner-pager"
            data-cycle-swipe="true"
            data-cycle-timeout="5000"
            data-cycle-swipe-fx="scrollHorz"
            data-cycle-slides=">li"
            data-cycle-pause-on-hover="true">

            <?php if( have_rows('home_slideshow') ): ?>
                <?php while ( have_rows('home_slideshow') ) : the_row();
                    $homeSlideImage = get_sub_field('home_slide_image') ?>

                    <li>
                        <div class="banner-img" style="background-image:url(<?php echo $homeSlideImage['sizes']['full-banner-large']; ?>)"></div>
                        <div class="banner-text <?php the_sub_field('slide_callout_location'); ?>">
                            <div class="container">
                                <div class="container-inner">

                                    <div class="text-wrap">
                                        <h2><?php the_sub_field('home_slide_title'); ?></h2>
                                        <!-- <p><?php the_sub_field('home_slide_description'); ?></p> -->
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

    <?php }?>


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


    <?php if(get_field('display_special_message_takeover', 'options')) { ?>


            <?php /*if(!isset($_COOKIE['alert'])){ */ ?>
                <a href="#takeover" class="takeover"></a>
                <div id="takeover-container">
                    <div id="takeover" class="mfp-hide">
                        <?php $takeoverImg = get_field('special_message_image', 'options');
                        echo ($takeoverImg ? '<img src=" ' . $takeoverImg['sizes']['takeover-image'] . '" />' : '' ); ?>
                        <div class="takeover-content">
                            <?php the_field('special_message_text', 'options'); ?>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                       $.magnificPopup.open({
                           closeMarkup: '<button type="button" class="mfp-close close-button">CLOSE</button>',
                           items: {
                               src: '#takeover'
                           },
                           type: 'inline',
                           callbacks: {
                            close: function() {
                                /*$.cookie('alert', 'dismiss', { expires: 1, path: '/' });*/
                            }}
                        });
                    });
                </script>

            <?php /*};*/ ?>



    <?php  } ?>


<?php get_footer(); ?>
