<?php get_header(); the_post(); ?>

    <div id="header-404">

        <div class="not-found">
	        <h2><span>ERROR 404. Page Not Found.</span><br />
	            Adrift at Sea!</h2>
	        <h3>We can't find this page, <br />
	            but we can give you a ride back.</h3>
	        <a href="<?php bloginfo('url'); ?>" class="btn">Sail Home</a>
        </div>

    </div>



<?php get_footer(); ?>
