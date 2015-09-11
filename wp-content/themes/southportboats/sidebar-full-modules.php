
<?php while(have_rows("full_modules")): the_row();
    if(get_row_layout() == "events_full_module"): ?>


    <?php $post_object = get_sub_field('event_to_display');    
        if( $post_object ): $post = $post_object; setup_postdata( $post ); 

            $dateA = DateTime::createFromFormat('Ymd', get_field('event_date'));
            foreach($dateA as $dateS){
                $date = $dateS; break;
            }
            $date = strtotime($date);
            $today = strtotime(date('Y-m-d'));

            wp_reset_postdata();
            if($date >= $today) {  ?>

                <section id="upcoming-events">
                    <div class="container">
                        <div class="container-inner">
                            
                            <?php if(!is_page(250)) /* EVENTS PAGE*/ { ?>                    
                                <div class="top-row clearfix">
                                    <div class="pull-left box-one"><h2>UPCOMING EVENTS</h2></div>
                                    <div class="pull-right box-two">
                                        <a href="<?php echo get_permalink(250); ?>" class="link black-link">VIEW UPCOMING EVENTS</a>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php $post_object = get_sub_field('event_to_display');    
                                if( $post_object ): $post = $post_object; setup_postdata( $post ); ?>
                        
                                <div class="clearfix inner-wrap">
                                <div class="col-one pull-left" style="background-image:url(<?php if($eventImage = get_field('event_image')) { echo $eventImage['sizes']['featured-image']; } ?>);"></div>
                                    <div class="col-two pull-right">
                                        <h4>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        <h6><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date')); echo $date->format('F j, Y'); ?> <span>|</span>  <?php the_field('event_location'); ?></h6>
                                        <p><?php the_field('event_teaser'); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn white-outline">LEARN MORE</a>
                                    </div>
                                 </div>

                            <?php wp_reset_postdata();
                            endif; ?>           

                        </div>
                    </div>
                </section><!--upcoming-events/-->

            <?php  } else { ?>

                <section id="upcoming-events">
                    <div class="container">
                        <div class="container-inner">
                            
                            <?php if(!is_page(250)) /* EVENTS PAGE*/ { ?>                    
                                <div class="top-row clearfix">
                                    <div class="pull-left box-one"><h2>UPCOMING EVENTS</h2></div>
                                    <div class="pull-right box-two">
                                        <a href="<?php echo get_permalink(250); ?>" class="link black-link">VIEW UPCOMING EVENTS</a>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php $args = array(
                                'posts_per_page' => '-1',
                                'post_type' => 'event',
                                'orderby' => 'meta_value',
                                'meta_key' => 'event_date',
                                'order' => 'ASC'
                                );

                            query_posts($args);
                            while ( have_posts() ) : the_post(); 
                            $dateA = DateTime::createFromFormat('Ymd', get_field('event_date'));
                            foreach($dateA as $dateS){
                                $date = $dateS; break;
                            }
                            $date = strtotime($date);
                            $today = strtotime(date('Y-m-d'));

                            if($date <= $today) continue;  ?>
                        
                                <div class="clearfix inner-wrap">
                                <div class="col-one pull-left" style="background-image:url(<?php if($eventImage = get_field('event_image')) { echo $eventImage['sizes']['featured-image']; } ?>);"></div>
                                    <div class="col-two pull-right">
                                        <h4>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        <h6><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date')); echo $date->format('F j, Y'); ?> <span>|</span>  <?php the_field('event_location'); ?></h6>
                                        <p><?php the_field('event_teaser'); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn white-outline">LEARN MORE</a>
                                    </div>
                                 </div>
                            
                            <?php break; endwhile; wp_reset_query();?> 

                        </div>
                    </div>
                </section><!--upcoming-events/-->

            <?php } endif; ?>

<?php elseif(get_row_layout() == "fleet_full_module"):  ?>


        <section id="fleet-wrap" class="module">
            <div class="container">
                <div class="container-inner">
                    <h2>THE SOUTHPORT FLEET</h2>
                    
                    <ul id="fleet">
                    
                        <?php query_posts('post_type=model&posts_per_page=3&orderby=title&order=ASC');
                            while ( have_posts() ) : the_post(); ?>

                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <?php $teaserImage = get_field('teaser_image'); ?>
                                    <img src="<?php echo $teaserImage['sizes']['models-image']; ?>" alt="<?php the_title(); ?>" />
                                    <h3><?php the_title(); ?></h3>
                                    
                                    <div class="hover-box">
                                        <div class="inner-wrap">
                                            <div class="box-cell">
                                                <span class="btn white-outline">VIEW MODEL</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                        <?php endwhile; wp_reset_query();?> 
   
                  </ul>
                </div>
            </div>
        </section><!--fleet-wrap-->


    <?php elseif(get_row_layout() == "image_strip_full_module"):  ?>

        <?php $firstImage = get_field('first_image', 'options'); ?>
        <?php $secondImage = get_field('second_image', 'options'); ?>
        <section id="img-row">
            <div class="inner-wrap clearfix">
                <div class="col-one box">
                    <img src="<?php echo $firstImage['sizes']['image-row-image']; ?>" />
                </div>
                <div class="col-three box">
                    <img src="<?php echo $firstImage['sizes']['image-row-image']; ?>" />
                </div>
                <div class="col-two box">
                    <img src="<?php bloginfo('url'); ?>/ui/images/dark-photo.png" width="478" height="474" alt="" />
                    
                    <div class="text-box">
                        <div class="box-table">
                            <div class="box-cell">
                                <h2><?php the_field('image_row_text', 'options'); ?></h2>
                                <a href="<?php the_field('image_row_button_link', 'options'); ?>" class="btn white-outline"><?php the_field('image_row_button_label', 'options'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <?php elseif(get_row_layout() == "news_full_module"):  ?>


        <section id="related-post-wrap" class="module">
            <div class="container">
                <div class="container-inner">
                    <ul id="related-post" class="clearfix">


                        <li>
                            <div class="top-wrap clearfix">
                                <div class="box-one pull-left">
                                    <h2><a href="<?php echo get_permalink(246); ?>">LATEST NEWS</a></h2>
                                </div>
                                <div class="box-two pull-right">
                                    <a href="<?php echo get_permalink(246); ?>" class="link more">VIEW ALL NEWS</a>
                                </div>
                            </div><!--top-wrap-->

                            <?php query_posts('post_type=news-article&posts_per_page=1&orderby=date&order=DESC'); 
                                while ( have_posts() ) : the_post(); ?>

                                <div class="text-wrap clearfix">
                                    <div class="date-wrap pull-left">
                                         <span><?php the_time('M'); ?></span>
                                         <h6><?php the_time('j'); ?></h6>
                                         <span><?php the_time('Y'); ?></span>
                                    </div><!--date-wrap-->
                                    
                                    <div class="text pull-right">
                                        <h5><?php echo (get_field('news_external_link') ? '<a href="' . get_field('news_external_link') . '" target="_blank">' . get_the_title() . '</a>' : '<a href="' . get_permalink() . '">' . get_the_title() . '</a>'); ?></h5>
                                        <?php the_excerpt(); ?>
                                        
                                        <?php echo (get_field('news_external_link') ? '<a href="' . get_field('news_external_link') . '" class="link more" target="_blank">read more</a>' : '<a href="' . get_permalink() . '" class="link more">read more</a>'); ?>
                                    </div>
                                </div>

                            <?php endwhile; wp_reset_query();?> 

                        </li>


                        <li>
                            <div class="top-wrap clearfix">
                                <div class="box-one pull-left">
                                    <h2><a href="<?php echo get_permalink(287); ?>">BLOG UPDATES</a></h2>
                                </div>
                                <div class="box-two pull-right">
                                    <a href="<?php echo get_permalink(287); ?>" class="link more">VISIT THE BLOG</a>
                                </div>
                            </div><!--top-wrap-->


                            <?php query_posts('post_type=blog-post&posts_per_page=1&orderby=date&order=DESC'); 
                                while ( have_posts() ) : the_post(); ?>

                                        <div class="text-wrap clearfix">
                                            <div class="date-wrap pull-left">
                                                 <span><?php the_time('M'); ?></span>
                                                 <h6><?php the_time('j'); ?></h6>
                                                 <span><?php the_time('Y'); ?></span>
                                            </div><!--date-wrap-->
                                            
                                            <div class="text pull-right">
                                                <h5>
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h5>
                                                <?php the_excerpt(); ?>
                                                
                                                <a href="<?php the_permalink(); ?>" class="link more">read more</a>
                                            </div>
                                        </div>

                            <?php endwhile; wp_reset_query();?> 

                         </li>
                    </ul>
                </div>
            </div>
        </section><!--related-post-wrap/-->


    <?php elseif(get_row_layout() == "testimonials_full_module"):  ?>


        <section id="testimonials" style="background-image:url(<?php bloginfo('url');?>/ui/images/testimonials-bg.jpg)">
            <div class="container">
                <div class="container-inner">
                    <span class="quote"></span>
                    
                    <h4><?php the_sub_field('testimonial_quote'); ?></h4>
                    <h5><?php the_sub_field('testimonial_author'); ?></h5>
                    <h6><?php the_sub_field('testimonial_location'); ?></h6>
                </div>
            </div>
        </section><!--testimonials/-->


    <?php elseif(get_row_layout() == "video_full_module"): ?>



        <?php $post_object = get_sub_field('what_video_should_be_shown');
            
            if( $post_object ): 
                $post = $post_object; setup_postdata( $post ); ?>
 




                <section id="video-box-main">
                    <div class="container">
                        <div class="container-inner">


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
                            <a href="<?php echo get_permalink(285); ?>" class="btn black-outline">VIEW ALL VIDEOS</a>
                        </div><!--left-box-->
                        <div class="video-column video-right desktop">
                            <div class="video-thumbnail" style="background-image:url(http://img.youtube.com/vi/<?php the_field('youtube_video_id'); ?>/0.jpg)">
                                <a class="video-link" href="http://www.youtube.com/watch?v=<?php the_field('youtube_video_id'); ?>?autoplay=0">
                                    <div class="play-btn"></div>
                                </a>
                            </div><!--right-box-->
                        </div>
                    </div>
       
                        </div>
                    </div>
                </section><!--video-box-main/-->

            <?php wp_reset_postdata(); 
        endif; ?>


<?php endif; endwhile; ?>