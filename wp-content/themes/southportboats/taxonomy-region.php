<?php get_header();  ?>

<div id="pg-title" style="background-image:url(<?php bloginfo('url'); ?>/ui/images/interior-banner.jpg)">
    <h2>Upcoming <?php $term = $wp_query->queried_object; echo $term->name; ?> Events</h2>
</div>

<?php get_sidebar('event-filter'); ?>

<?php //get_sidebar('full-modules'); ?>

<section id="events-wrap">
    <div class="container">
        <div class="container-inner">

                <?php $term = get_term_by( 'slug', get_query_var( 'region' ), get_query_var( 'taxonomy' ) ); ?>
                <?php
                /*Added*/
                $event1 = current_time('Ymd'); //Get Current Date
                /*End Added*/
                 $args = array(
                    'post_type' => 'event',
                    'posts_per_page' => '6',
                    'paged' => $paged,
                    /*Added*/
                    'meta_query' => array(
				        array(
				        'key' => 'event_date', //Check against Date field, Here I am using two Event Start and Event End
				        'compare' => '>=', //Change depend on what/ how you are querying.
				        'value' => $event1,
				        )
				    ),
				    /*End Added*/
                    'orderby' => 'meta_value',
                    'meta_key' => 'event_date',
                    'region' => $term->slug,
                    'order' => 'ASC'
                );
                query_posts($args);
                ?>
                <?php if ( have_posts() ) : ?>
                <ul id="events" class="scroll-content">

                     <?php while ( have_posts() ) : the_post();
                        $dateA = DateTime::createFromFormat('Ymd', get_field('event_date'));
                        foreach($dateA as $dateS){
                            $date = $dateS; break;
                        }
                        $date = strtotime($date);
                        $today = strtotime(date('Y-m-d'));

                        if($date <= $today) continue;

                        $date = DateTime::createFromFormat('Ymd', get_field('event_date'));
                        $dateEnd = DateTime::createFromFormat('Ymd', get_field('event_date_end'));
                         ?>

                         <li class="post-content">
                             <a href="<?php the_permalink(); ?>" class="img-link">
                                <?php if($eventImage = get_field('event_image')) { ?>
                                    <img src="<?php echo $eventImage['sizes']['featured-image']; ?>" alt="<?php echo $eventImage['alt']; ?>" />
                                <?php } ?>
                            </a>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <h5><?php if(get_field('event_date_end')) {
                                    echo $date->format('F j, Y') . ' - ' . $dateEnd->format('F j, Y');
                                } else {
                                    echo $date->format('F j, Y');
                                };?> <span>|</span>  <?php the_field('event_location'); ?></h5>
                            <p><?php the_field('event_teaser'); ?></p>
                            <a href="<?php echo (get_field('event_button_link') ? get_field('event_button_link') : get_the_permalink()); ?>" class="link more"><?php the_field('event_button_label'); ?></a>
                    </li>
                <?php endwhile; ?>
               </ul>
           <?php else : ?>
           <p style="text-align:center; font-weight:600; margin-bottom:40px;">
               There are no upcoming events.
           </p>
       <?php endif; ?>
                <div class="loader">
                    <span>LOADING</span>
                </div>
                <div class="load-more">
                   <?php next_posts_link('&nbsp;'); ?>
                </div>
            <?php wp_reset_query(); ?>

        </div>
    </div>
</section><!--events/-->

<?php get_footer(); ?>
