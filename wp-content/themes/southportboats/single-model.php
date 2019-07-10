<?php get_header(); the_post(); ?>


    <div id="model-slider-wrap">
        <ul class="cycle-slideshow" data-cycle-fx="fade"
            data-cycle-pager=".model-pager"
            data-cycle-swipe=true
            data-cycle-swipe-fx="scrollHorz"
            data-cycle-timeout="5000"
            data-cycle-slides=">li"
            data-cycle-pause-on-hover="true">

            <?php if( have_rows('model_banner_images') ):
                while ( have_rows('model_banner_images') ) : the_row();

                $modelBanner = get_sub_field('model_banner_image'); ?>

                    <li>
                        <div class="banner-img" style="background-image:url(<?php echo $modelBanner['sizes']['full-banner-large']; ?>)"></div>
                        <div class="banner-text">
                            <div class="container">
                                <div class="container-inner">
                                    <div class="text-wrap">
                                        <h2><?php the_title(); ?></h2>
                                        <!-- <p><?php the_sub_field('model_banner_text'); ?></p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

            <?php endwhile;
                else:
                endif; ?>

        </ul>
        <div class="model-pager-wrap">
            <div class="container">
                <div class="container-inner">
                    <?php echo (get_field('model_vr_tour_link') ? '<a href="' . get_field('model_vr_tour_link') . '" class="link more vr-link">' . get_field('model_vr_tour_label') . '</a>' : ''); ?>
                    <div class="model-pager"></div>
                </div>
            </div>
        </div>
    </div><!--model-slider-wrap/-->

     <div id="top-content">
        <div class="container">
            <div class="container-inner clearfix">
                <article id="article" class="pg-content main-left pull-left">
                    <?php the_content(); ?>

                    <?php if( have_rows('model_attributes') ): ?>
                        <ul id="attributes">

                            <?php while ( have_rows('model_attributes') ) : the_row(); ?>

                            <li><strong><?php the_sub_field('model_attribute_label'); ?>:</strong> <span><?php the_sub_field('model_attribute_value'); ?></span></li>

                            <?php endwhile; ?>
                        </ul>

                    <?php else: endif; ?>

                </article>

                <aside id="aside" class="main-right pull-right">

                    <blockquote>
                        <p><?php the_field('callout'); ?></p>
                    </blockquote>

                    <?php get_sidebar('modules'); ?>
                </aside>
            </div>
        </div>
    </div><!--top-content/-->


    <section id="features-wrap" class="module">
        <div class="container">
            <div class="container-inner">
                <h2><?php the_title(); ?> Features</h2>

                    <?php
                        $cats = array();
                        if( have_rows('model_features') ):
                            while ( have_rows('model_features') ) : the_row();

                                $obj = get_sub_field_object('model_feature_type'); // finding array of field details
                                $obj = $obj['choices']; // refining array

                                $types = get_sub_field('model_feature_type');

                                if($types) {
                                    foreach($types as $type) {

                                        if(!in_array($type, $cats)) {
                                            $cats[$type] = $obj[$type]; // making an array based on the $obj variable
                                        }
                                    }

                                }

                            endwhile;
                        else: endif;
                    ?>

                <?php if($cats) { ?>

                    <div class="filter-main-wrap">
                        <div class="visible-xs feature-filter-mobile">
                            <div class="select-wrap">
                                <select>
                                    <option class="filter" data-filter="all">All</option>
                                    <?php foreach($cats as $slug => $label) { ?>
                                        <option class="filter" value="<?php echo $slug; ?>" data-filter=".<?php echo $slug ?>"><?php echo $label ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="hidden-xs feature-filter-desktop">
                            <ul class="feature-filter">
                                <li class="filter" data-filter="all">All</li>
                                <?php foreach($cats as $slug => $label) { ?>
                                    <li class="filter" data-filter=".<?php echo $slug ?>"><?php echo $label ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>


                <?php }; ?>






                <ul id="features">

                    <?php if( have_rows('model_features') ): ?>
                        <?php while ( have_rows('model_features') ) : the_row(); ?>

                            <li class="mix <?php echo implode(' ', get_sub_field('model_feature_type')); ?>">

                                <?php if($modelFeatureImage = get_sub_field('model_feature_image')) {
                                    echo (get_sub_field('model_feature_link_optional') ? '<a href="' . get_sub_field('model_feature_link_optional') . '" class="img-link">' : ''); ?>

                                        <img src="<?php echo $modelFeatureImage['sizes']['model-features-image']; ?>" alt="<?php echo $modelFeatureImage['alt']; ?>" />

                                    <?php echo (get_sub_field('model_feature_link_optional') ? '</a>' : '');
                                } ?>
                                <div class="box-wrap">

                                    <h3><?php echo (get_sub_field('model_feature_link_optional') ? '<a href="' . get_sub_field('model_feature_link_optional') . '">' : '');

                                        the_sub_field('model_feature');

                                        echo (get_sub_field('model_feature_link_optional') ? '</a>' : ''); ?>
                                    <span>
                                        <?php
                                            $obj = get_sub_field_object('model_feature_type'); // finding array of field details
                                            $obj = $obj['choices']; // refining array
                                            $types = get_sub_field('model_feature_type');
                                            $cats = array();
                                            if($types) {
                                                foreach($types as $type) {

                                                    if(!in_array($type, $cats)) {
                                                        $cats[$type] = $obj[$type]; // making an array based on the $obj variable
                                                    }
                                                }
                                            }
                                            $i = 1;
                                            foreach($cats as $key => $value){
                                                echo $value;
                                                if($i < count($cats)) echo ', ';
                                                $i++;
                                            }; ?>
                                    </span></h3>
                                    <p><?php the_sub_field('model_feature_description'); ?></p>
                                    <?php echo (get_sub_field('model_feature_link_optional') ? '<a href="' . get_sub_field('model_feature_link_optional') . '" class="link more">Read More</a>' : ''); ?>
                                </div>
                            </li>

                        <?php endwhile; ?>
                    <?php else: endif; ?>

                    <li class="gap"></li>
                    <li class="gap"></li>
                    <li class="gap"></li>
                    <li class="gap"></li>
                </ul>
            </div>
        </div>
    </section><!--features-wrap/-->


<?php get_sidebar('full-modules'); ?>

<?php get_footer(); ?>
