<?php
    /*
    Template Name: Model Landing
    */
    get_header(); the_post();
?>   


    
    <section id="model-landing-wrap">
        <ul id="model-landing">

            <?php query_posts('post_type=model&posts_per_page=-1&orderby=title&order=ASC');
                while ( have_posts() ) : the_post(); 
                $modelImage = get_field('teaser_image'); ?>

                <li>
                    <div class="bg-image" style="background-image:url(<?php echo $modelImage['sizes']['full-banner']; ?>)"></div>
                    <div class="text-box-wrap">
                        <div class="container">
                            <div class="container-inner">
                                <div class="text-box">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_field('teaser'); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="btn black-outline">LEARN MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            <?php endwhile; wp_reset_query();?> 

        </ul>
    </section><!--model-landing-wrap-->


<?php get_sidebar('full-modules'); ?>
    
<?php get_footer(); ?>    