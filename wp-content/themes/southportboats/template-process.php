<?php
    /*
    Template Name: Our Process
    */
    get_header(); the_post();
?>



    <section id="model-landing-wrap">
        <ul id="model-landing">

            <?php if( have_rows('steps') ){
                while ( have_rows('steps') ) { the_row();
                $modelImage = get_sub_field('background'); ?>

                <li style="text-align:<?php the_sub_field('box_position'); ?>">
                    <div class="bg-image" style="background-image:url(<?php echo $modelImage['sizes']['full-banner']; ?>);"></div>
                    <div class="text-box-wrap">
                        <div class="container">
                            <div class="container-inner">
                                <div class="text-box">
                                    <h3><?php the_sub_field('heading') ?></h3>
                                    <p><?php the_sub_field('text'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <?php } ?>
            <?php } ?>

        </ul>
    </section><!--model-landing-wrap-->


<?php get_sidebar('full-modules'); ?>

<?php get_footer(); ?>
