<?php
    /*
    Template Name: Locations
    */
    get_header(); the_post();
?>

    <div id="pg-title" style="background-image:url(<?php bloginfo('url');?>/ui/images/interior-banner.jpg)">
        <h2><?php the_title(); ?></h2>
    </div>

    <div id="locator-filter" class="filter-bar">
    	<div class="container">
        	<div class="container-inner">
            	<div class="filter">
                	<form>
                    	<ul>
                        	<li>
                            	<label>ZIP CODE</label>
                                <div>
                                	<input type="text" placeholder="" />
                                </div>
                            </li>
                        </ul>
                        <div class='gform_footer left_label'>
                            <button type='submit' id='gform_submit_button_1' class='btn black-btn'><span>LOCATE DEALER</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="locator-map"></div>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
	<script>
      function initialize() {
        var mapCanvas = document.getElementById('locator-map');
        var mapOptions = {
          center: new google.maps.LatLng(44.5403, -78.5463),
          zoom: 8,
          scrollwheel: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);

        // Resize stuff...
        google.maps.event.addDomListener(window, "resize", function() {
           var center = map.getCenter();
           google.maps.event.trigger(map, "resize");
           map.setCenter(center);
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <section id="location-result-wrap">
    	<div class="container">
        	<div class="container-inner">
            	<h2>LOCATION RESULTS</h2>

                <ul id="loc-result">

                    <?php query_posts('post_type=location&posts_per_page=-1&orderby=title&order=ASC');
                    while ( have_posts() ) : the_post(); ?>

                        <li>
                            <div class="inner-wrap clearfix">
                                <div class="right-box pull-right">

                                    <?php if($locationImage = get_field('location_image')) { ?> 
                                        <img src="<?php echo $locationImage['sizes']['location-image']; ?>" alt="<?php echo $locationImage['alt']; ?>" />
                                    <?php } ?>

                                </div><!--right-box-->

                                <div class="left-box pull-left">
                                    <h4><?php the_title(); ?></h4>

                                    <p><?php the_field('location_address'); ?></p>
                                    <?php echo (get_field('location_phone') ? '<p><strong>Phone :</strong>' . get_field('location_phone') . '</p>' : ''); ?>

                                    <ul>
                                        <?php echo (get_field('location_directions_link') ? '<li><a href="' . get_field('location_directions_link') . '" class="link more">GET DIRECTIONS</a></li>' : ''); ?>
                                        <?php echo (get_field('location_website') ? '<li><a href="' . get_field('location_website') . '" class="link more">Visit Website</a></li>' : ''); ?>
                                    
                                    </ul>

                                </div><!--left-box-->
                            </div>
                        </li>

                     <?php endwhile; wp_reset_query(); ?>

                </ul>
            </div>
        </div>
    </section>


<?php get_footer(); ?>
