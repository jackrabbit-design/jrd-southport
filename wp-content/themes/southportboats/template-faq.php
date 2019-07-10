<?php
    /*
    Template Name: FAQs
    */
    get_header(); the_post();
?>   
    
    
    <div id="pg-title" style="background-image:url(<?php bloginfo('url');?>/ui/images/interior-banner.jpg)">
        <h2><?php the_title(); ?></h2>
    </div>
    
    <section id="faqs-wrap">
        <div class="container">
            <div class="container-inner clearfix">


                <aside class="main-right pull-right">

                    <div class="categories">
                        <h4>Categories</h4>
                        
                        <ul>
                            <?php //start by fetching the terms for the taxonomy
                                $terms = get_terms( 'faq-category', array(
                                    'orderby'    => 'title',
                                    'hide_empty' => 0
                                ) );

                                // now run a query for each term
                                foreach( $terms as $term ) {
                                     $args = array(
                                        'post_type' => 'faq',
                                        'faq-category' => $term->slug
                                    );
                                    $query = new WP_Query( $args );
                                             
                                    echo'<li><a href="#faq-' . $term->slug . '">' . $term->name . '</a></li>';
                                     
                                    wp_reset_postdata();
                             } ?>
                        </ul>
                    </div><!--categories-->  
                    

                </aside>




                <div class="main-left pull-left">
                    <ul class="main-acc-wrap">

                    <?php //start by fetching the terms for the taxonomy
                        $terms = get_terms( 'faq-category', array(
                            'orderby'    => 'title',
                            'hide_empty' => 0
                        ) );

                        // now run a query for each term
                        foreach( $terms as $term ) {
                             $args = array(
                                'post_type' => 'faq',
                                'faq-category' => $term->slug
                            );
                            $query = new WP_Query( $args );
                                     
                            echo '<li id="faq-' . $term->slug . '">';          
                            echo'<h2>' . $term->name . '</h2>';
                            echo '<div class="accordion">';
                             
                            // Start the Loop
                            while ( $query->have_posts() ) : $query->the_post(); ?>

                                <h3><?php the_title(); ?></h3>
                                <div>
                                    <?php the_content(); ?>
                                </div>
                             
                            <?php endwhile;
                             
                            echo '</div>';
                            echo '</li>';
                             
                            wp_reset_postdata();
                     } ?>
                 </ul>
                </div>
                
            </div>
        </div>
    </section>

<?php get_sidebar('full-modules'); ?>

<?php get_footer(); ?>