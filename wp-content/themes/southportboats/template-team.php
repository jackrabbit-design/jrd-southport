<?php
    /*
    Template Name: Team
    */
    get_header(); the_post();
?>

<div id="pg-title" style="background-image:url(<?php bloginfo('url'); ?>/ui/images/interior-banner.jpg)">
    <h2><?php the_title(); ?></h2>
        <p><?php the_field('intro_text'); ?></p>
</div>

    <section id="team-members-wrap">
        <div class="container">
            <div class="container-inner">
                <ul id="team-members">


                    <?php query_posts('post_type=team-member&posts_per_page=-1&order=menu_order&order=ASC');
                        while ( have_posts() ) : the_post(); ?>

                        <li class="clearfix">
                            <div class="box pull-left row-one">
                                <h3><?php the_title(); ?></h3>
                                <h5><?php the_field('title'); ?></h5>
                            </div><!--row-one-->
                            
                            <div class="box pull-right member-photo">
                                <?php $bioImage = get_field('bio_image'); ?> 
                                <img src="<?php echo $bioImage['sizes']['news-teaser-image']; ?>" alt="<?php the_title(); ?>" />
                            </div>
                            
                            <div class="box bottom-row pull-left">
                                <?php the_field('bio_intro'); ?>

                                <?php if(get_field('bio_detail')) { ?>

                                    <a href="#" class="link more bio-more">READ MORE</a>
                                    <div class="bio-detail">
                                        <?php the_field('bio_detail'); ?>
                                    </div>

                                <?php }; ?>


                            </div>
                        </li>
                        

                    <?php endwhile; wp_reset_query();?> 
   
   
                </ul>
            </div>
        </div>
    </section>




<?php get_footer(); ?>
