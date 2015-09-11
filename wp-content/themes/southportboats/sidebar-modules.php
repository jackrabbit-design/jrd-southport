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

<?php endif; endwhile; ?>