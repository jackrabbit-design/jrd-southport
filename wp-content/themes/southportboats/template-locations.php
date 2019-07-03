<?php
    /*
    Template Name: Locations
    */
    get_header(); the_post();
?>

    <div id="pg-title" style="background-image:url(<?php bloginfo('url');?>/ui/images/interior-banner.jpg)">
        <h2><?php the_title(); ?></h2>
    </div>

        <div id="map">
            <div id="map-container"></div>
            <div id="map-box">

                <h6>Locations</h6>
                <ul>

                <?php $terms = get_terms('location-state'); ?>
                <?php $i=0;
                    foreach ($terms as $term) {
                    $wpq = array (
                        'taxonomy'=>'location-state',
                        'post_type'=> 'location',
                        'term'=>$term->slug,
                        'order' => 'ASC',
                        'orderby' => 'title');
                    $query = new WP_Query ($wpq);
                    $article_count = $query->post_count;
                    if ($article_count) {
                        $posts = $query->posts;

                        //
                        echo '<li><a href="#" class="locations-state">' . $term->name . '</a>
                        <div class="locations">
                        <h6><a href="#" class="southicon-arrow-leaft">Back</a>' . $term->name . '</h6>
                        <ul>';

                        foreach ($posts as $post) {

                        echo '<li><a href="#" data-marker="' . $post->post_name . '" class="location"><strong>' . get_the_title() . '</strong>
                                    <span>' . get_field('location_address') . '</span>
                                    <span>' . get_field('location_phone') . '</span></a></li>';
                            $i++;
                        }

                        echo '</ul></div>';
                    }
                 };  ?>


                    </li>
                </ul>

            </div>
        </div>
        <div id="hover-text" style="position:absolute; z-index:5000; background:#000; color:#fff; display:none; padding:16px;"></div>





    <script>
        jQuery(function($){
            L.mapbox.accessToken = 'pk.eyJ1Ijoic291dGhwb3J0Ym9hdHMiLCJhIjoiY2lmaTZ1bjA3MnR3YWl1bHhnNTB2eGM2YSJ9.6XYY0SXwnGz6yZGYE2tOYg';
            var map = L.mapbox.map('map-container', 'mapbox.light',{
                minZoom: 3,
                maxZoom: 12,
                zoomControl: false
            }).setView([36, -85], 5);

            new L.Control.Zoom({ position: 'topright' }).addTo(map);

            // Disable drag and zoom handlers.
            // map.dragging.disable();
            // map.touchZoom.disable();
            map.doubleClickZoom.disable();
            map.scrollWheelZoom.disable();



            var myLayer = L.mapbox.featureLayer().addTo(map);

            var geo = [{


                <?php $i = 1; query_posts('post_type=location&posts_per_page=-1');
                    while ( have_posts() ) : the_post(); ?>

                        "type": "Feature",
                        'geometry': {
                            'type': 'Point',
                            'coordinates': [<?php the_field('location_longitude'); ?>, <?php the_field('location_lattitude'); ?>],
                        },
                        'properties': {
                            'id': '<?php echo $post->post_name; ?>',
                            'icon': {
                                'iconUrl': "/ui/svg/locator.svg",
                                'iconSize': [54, 40],
                                'iconAnchor': [27, 40],
                                'popupAnchor': [0, 0],
                                'className': "dot"
                            },
                            'locTitle': '<?php the_title(); ?>',
                            'locAddress': '<?php echo preg_replace("/[\n\r]/","",get_field("location_address"));?>',
                            'locAddress2': '<?php echo strip_tags(preg_replace('/\s+/', ' ', get_field('location_address')));?>',
                            'locPhone': '<?php the_field("location_phone"); ?>',
                            'locWebsite': '<?php the_field("location_website"); ?>'
                        }
                    }<?= ($wp_query->post_count != $i ? ',{' : '') ?>
                <?php $i++; ?>
                <?php endwhile; wp_reset_query();?>
            ];

            myLayer.on('layeradd', function(e) {
                var marker = e.layer,
                    feature = marker.feature;

                marker.setIcon(L.icon(feature.properties.icon));
            });

            myLayer.setGeoJSON(geo);

            function clickIt(e){
                $('#map-box .details.active').removeClass('active');
                $(e).siblings('.details').addClass('active');
            }




            $('#map-box .location').click(function(){
                clickIt(this);
             });

            $('#map-box .back').click(function(){
                $(this).parent('h3').parent('.details').removeClass('active');
            });

            $('#accordion .row > h3').click(function(){
                $(this).siblings('.details').slideToggle().parent('.row').toggleClass('active');
            });

            // Add custom popups to each using our custom feature properties
            myLayer.on('layeradd', function(e) {
                var marker = e.layer,
                    feature = marker.feature;

                // Create custom popup content
                var popupContent =  '<div class="popup">' +
                                        '<h4>' + feature.properties.locTitle + '</h4>' +
                                        '<p>' + feature.properties.locAddress + '<br />' + feature.properties.locPhone + '</p>' +
                                    '</div>';
                
                // http://leafletjs.com/reference.html#popup
                marker.bindPopup(popupContent,{
                    closeButton: false,
                    minWidth: 320
                });
            });

            // Add features to the map
            myLayer.setGeoJSON(geo);


            myLayer.eachLayer(function(marker) {
                marker.on('click', function(e) {
                	// console.log('test');
                    var markerid = marker.feature.properties.id;
                    $('#map-box .clicker[data-marker='+markerid+']').trigger('click');
                    clickIt('#map-box .location[data-marker='+markerid+']');
                    map.panTo(marker.getLatLng());
                    //marker.closePopup(); WHY WAS THIS HERE? IT BORKED EVERYTHING

                    // http://leafletjs.com/reference.html#popup
                });

                var popupContent =
                    '<div class="popup">' +
                        '<h4>' + marker.feature.properties.locTitle + '</h4>' +
                        '<p>' + marker.feature.properties.locAddress + '<br />' + marker.feature.properties.locPhone + '</p><p><a href="' + marker.feature.properties.locWebsite + '" target="_blank">Visit Website</a> | <a href="https://google.com/maps/search/' + marker.feature.properties.locAddress2 + '" target="_blank">Get Directions</a></p>' +
                    '</div>';

                marker.bindPopup(popupContent,{
                    closeButton: false,
                    minWidth: 320
                });

                var id = marker.feature.properties.id;
                $('.location[data-marker='+id+']').on('click',function() {
                    marker.fire('click');
                });

                marker.on('mouseover',function(){
                    var title = marker.feature.properties.locTitle.replace('&#8211;','<br/>');
                    $('#hover-text').show().html(title);
                }).on('mouseout',function(){
                    $('#hover-text').hide();
                });
            });


            $(document).on('mousemove', function(e){
                $('#hover-text').css({
                   left:  e.pageX + 10,
                   top:   e.pageY + 10
                });
            });

        });
        </script>




<?php /*
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
                                    <?php echo (get_field('location_phone') ? '<p>' . get_field('location_phone') . '</p>' : ''); ?>

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
 */ ?>

<?php get_footer(); ?>
