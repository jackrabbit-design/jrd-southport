    <section id="bottom-contact">
        <div class="container">
            <div class="container-inner clearfix">
                <div class="col-one pull-left">
                    <h3>KEEP IN TOUCH</h3>
                    <div class="inner-wrap clearfix">
                        <div class="contact-form pull-left">

                            <?php gravity_form(1, false, false, false, '', false); ?>

                        </div><!--contact-form-->
                        <div class="pull-right form-contect">
                            <p><?php the_field('contact_us_teaser', 'options'); ?> <br/><?php the_field('phone_number', 'options'); ?></p>
                            <a href="mailto:<?php the_field('email_address', 'options'); ?>"><?php the_field('email_address', 'options'); ?></a>
                        </div>
                    </div>
                </div><!--col-one-->

                <div class="col-two pull-left">
                    <h3><?php the_field('schedule_a_demo_title', 'options'); ?></h3>
                    <p><?php the_field('schedule_a_demo_text', 'options'); ?></p>
                    <a href="<?php the_field('schedule_a_demo_button_link', 'options'); ?>" class="btn black-btn"><?php the_field('schedule_a_demo_button_label', 'options'); ?></a>
                </div>
            </div>
        </div>
    </section><!--bottom-contact/-->

    <footer id="footer">
        <div class="f-rwo-one">
            <div class="container">
                <div class="container-inner clearfix">
                    <h3 id="footer-logo" class="pull-left">
                        <a href="#">
                            <img src="<?php bloginfo('url'); ?>/ui/images/footer-logo.png" width="190" height="61" alt="" />
                         </a>
                    </h3>

                    <nav id="footer-nav" class="hidden-s pull-right">
                        <?php wp_nav_menu('menu=Main Menu&container=&menu_id=&link_before=&link_after='); ?>
                    </nav>
                </div>
            </div>
        </div>

        <div class="f-row-two">
            <div class="container">
                <div class="container-inner clearfix">
                    <div class="col-two footer-social-links pull-right">
                        <a href="<?php bloginfo('url'); ?>/feed/?post_type=post"><i class="social-rss"></i></a>
                        <?php echo (get_field('facebook_link', 'options') ? '<a href="' . get_field('facebook_link', 'options') . '" target="_blank"><i class="social-facebook"></i></a>' : ''); ?>
                        <?php echo (get_field('twitter_link', 'options') ? '<a href="' . get_field('twitter_link', 'options') . '"> target="_blank"<i class="social-twitter"></i></a>' : ''); ?>
                        <?php echo (get_field('linkedin_link', 'options') ? '<a href="' . get_field('linkedin_link', 'options') . '" target="_blank"><i class="social-linkedin"></i></a>' : ''); ?>
                        <?php echo (get_field('google_plus_link', 'options') ? '<a href="' . get_field('google_plus_link', 'options') . '" target="_blank"><i class="social-google_plus"></i></a>' : ''); ?>
                        <?php echo (get_field('pinterest_link', 'options') ? '<a href="' . get_field('pinterest_link', 'options') . '" target="_blank"><i class="social-pinterest"></i></a>' : ''); ?>
                        <?php echo (get_field('vimeo_link', 'options') ? '<a href="' . get_field('vimeo_link', 'options') . '" target="_blank"><i class="social-vimeo"></i></a>' : ''); ?>


                    </div><!--col-two-->

                    <div class="pull-left col-one">
                        <div class="copy-right">
                            <p>COPYRIGHT &copy; <?php echo date('Y'); bloginfo('name'); ?></p>
                        </div>
                        <div class="row-two">
                            <p>All Rights Reserved.</p>
                            <?php if(get_page_by_title('Privacy Policy')) : ?>
                                <div class="links"><a href="<?php echo get_permalink('27'); ?>">Privacy Policy</a></div>
                            <?php endif;?>
                            <div class="dev">
                                <span class="jackrabbit"><a href="http://www.jumpingjackrabbit.com" title="Website Design by Jackrabbit" target="_blank">Website Design</a> by <a href="http://www.jumpingjackrabbit.com" title="Website Design by Jackrabbit" target="_blank">Jackrabbit</a></span>
                            </div>
                        </div>
                    </div><!--col-one-->

              </div>
            </div>
        </div>
    </footer>


    <script src="<?php bloginfo('url'); ?>/ui/js/jquery.plugins.js" type="text/javascript"></script>
    <script src="<?php bloginfo('url'); ?>/ui/js/jquery.init.js" type="text/javascript"></script>
</body>
</html>
