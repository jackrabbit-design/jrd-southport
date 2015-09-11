<?php get_header();  ?>

<div id="pg-title" style="background-image:url(<?php bloginfo('url'); ?>/ui/images/interior-banner.jpg)">
    <h2>Upcoming <?php $term = $wp_query->queried_object; echo $term->name; ?> Events</h2>
</div>

<?php get_sidebar('event-filter'); ?>

<?php get_sidebar('full-modules'); ?>

<section id="events-wrap">
    <div class="container">
        <div class="container-inner">

                <?php $term = get_term_by( 'slug', get_query_var( 'event-type' ), get_query_var( 'taxonomy' ) ); ?>
                <?php $args = array(
                    'post_type' => 'event',
                    'posts_per_page' => '6', 
                    'paged' => $paged, 
                    'orderby' => 'meta_value',
                    'meta_key' => 'event_date',
                    'event-type' => $term->slug,
                    'order' => 'ASC'
                );
                query_posts($args);
                ?>
                <ul id="events" class="scroll-content">

                     <?php while ( have_posts() ) : the_post();
                        $dateA = DateTime::createFromFormat('Ymd', get_field('event_date'));
                        foreach($dateA as $dateS){
                            $date = $dateS; break;
                        }
                        $date = strtotime($date);
                        $today = strtotime(date('Y-m-d'));

                        if($date <= $today) continue; 
                         ?>

                         <li class="post-content">
                             <a href="<?php the_permalink(); ?>" class="img-link">
                                <?php if($eventImage = get_field('event_image')) { ?>
                                    <img src="<?php echo $eventImage['sizes']['featured-image']; ?>" alt="<?php echo $eventImage['alt']; ?>" />
                                <?php } ?>
                            </a>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <h5><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date')); echo $date->format('F j, Y'); ?>  <span>|</span>  <?php the_field('event_location'); ?></h5>
                            <p><?php the_field('event_teaser'); ?></p>
                            <a href="<?php echo (get_field('event_button_link') ? get_field('event_button_link') : get_the_permalink()); ?>" class="link more"><?php the_field('event_button_label'); ?></a>
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
</section><!--events/-->

<?php get_footer(); ?>
