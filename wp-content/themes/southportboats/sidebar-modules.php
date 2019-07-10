<?php while(have_rows("sidebar_modules")): the_row();
    if(get_row_layout() == "text_callout"): ?>

    <blockquote>
        <p><?php the_sub_field('text_callout_content'); ?></p>
    </blockquote>


<?php elseif(get_row_layout() == "image_with_text"): ?>

    <div class="side-bar-box">
        <?php $sidebarImage = get_sub_field('image_text_image'); ?>
        <img src="<?php echo $sidebarImage['sizes']['sidebar-image']; ?>" alt="<?php echo $sidebarImage['alt']; ?>" />
        <h6><?php the_sub_field('image_text_text'); ?></h6>
    </div>

<?php elseif(get_row_layout() == "links_module"): ?>


    <?php if( have_rows('links') ): ?>
        <ul id="links">

            <?php while ( have_rows('links') ) : the_row(); ?>

            <li><a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_label'); ?></a></li>

            <?php endwhile; ?>
        </ul>

    <?php else: endif; ?>  


<?php endif; endwhile; ?>