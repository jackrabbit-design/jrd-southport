<?php get_header(); the_post(); ?>
    
    <div id="pg-title" style="background-image:url(<?php bloginfo('url');?>/ui/images/interior-banner.jpg)">
        <h2>Events</h2>
    </div>
    
    
    <div id="main-content">
        <div class="container">
            <div class="container-inner clearfix">
                <article id="article" class="pg-content main-left pull-left">
                    <h3><?php the_title(); ?></h3>
                    <h5><?php $date = DateTime::createFromFormat('Ymd', get_field('event_date')); echo $date->format('F j, Y'); ?>  <span>|</span>  <?php the_field('event_location'); ?></h5>



                    <?php the_content(); ?>
                </article>
                
                
                <aside id="aside" class="main-right pull-right">

                    <div class="side-bar-box">
                        <?php $eventImage = get_field('event_image'); ?>
                        <img src="<?php echo $eventImage['sizes']['sidebar-image']; ?>" alt="<?php echo $eventImage['alt']; ?>" />
                    </div>

                    <?php get_sidebar('modules'); ?>
                </aside>

            </div>
            <section id="vip-registration" class="clearfix">
                <div class="container-inner clearfix">
                    <?php gravity_form(2, true, false, false, '', false); ?>
                </div>
            </section>
        </div>
    </div><!--main-content-->

    
<?php get_sidebar('full-modules'); ?>
<?php get_footer(); ?>