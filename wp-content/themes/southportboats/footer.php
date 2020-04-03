	<?php if(get_field('hide_contact_strip')) {} else { ?>

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
	                    <a href="<?php the_field('schedule_a_demo_button_link', 'options'); ?>?check=demo" class="btn black-btn"><?php the_field('schedule_a_demo_button_label', 'options'); ?></a>
	                </div>
	            </div>
	        </div>
	    </section><!--bottom-contact/-->

	<?php } ?>

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
                        <?php echo (get_field('facebook_link', 'options') ? '<a href="' . get_field('facebook_link', 'options') . '" target="_blank"><i class="social-facebook"></i></a>' : ''); ?>
                        <?php echo (get_field('twitter_link', 'options') ? '<a href="' . get_field('twitter_link', 'options') . '"> target="_blank"<i class="social-twitter"></i></a>' : ''); ?>
                        <?php echo (get_field('linkedin_link', 'options') ? '<a href="' . get_field('linkedin_link', 'options') . '" target="_blank"><i class="social-linkedin"></i></a>' : ''); ?>
                        <?php echo (get_field('google_plus_link', 'options') ? '<a href="' . get_field('google_plus_link', 'options') . '" target="_blank"><i class="social-google_plus"></i></a>' : ''); ?>
                        <?php echo (get_field('pinterest_link', 'options') ? '<a href="' . get_field('pinterest_link', 'options') . '" target="_blank"><i class="social-pinterest"></i></a>' : ''); ?>
                        <?php echo (get_field('vimeo_link', 'options') ? '<a href="' . get_field('vimeo_link', 'options') . '" target="_blank"><i class="social-vimeo"></i></a>' : ''); ?>
                        <?php echo (get_field('instagram_link', 'options') ? '<a href="' . get_field('instagram_link', 'options') . '" target="_blank"><i class="social-instagram"></i></a>' : ''); ?>
                        <a href="<?php bloginfo('url'); ?>/feed/?post_type=blog-post"><i class="social-rss"></i></a>



                    </div><!--col-two-->

                    <div class="pull-left col-one">
                        <div class="copy-right">
                            <p>COPYRIGHT &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
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

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-41421674-1', 'southportboats.com');
      ga('send', 'pageview');

    </script>

    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-32559973-1']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>

    <!-- start number replacer -->
<script type="text/javascript"><!--
vs_account_id      = "Ch4Nl1dxazRl3gAb";
//--></script>
<script type="text/javascript" src="https://rw1.marchex.io/euinc/number-changer.js">
</script>
<!-- end ad widget -->

</body>
</html>
