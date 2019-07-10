<?php
    /*
    Template Name: Video Listing
    */
    get_header(); the_post();
?>

<div id="pg-title" style="background-image:url(<?php bloginfo('url'); ?>/ui/images/interior-banner.jpg)">
    <h2><?php the_title(); ?></h2>
</div>

<section id="video-box-main">
    <div class="container">
        <div class="container-inner">
            <?php query_posts('post_type=video&posts_per_page=6&paged=' . $paged .'&orderby=date&order=DESC'); ?>

            <div class="clearfix two-colomn" id="video-box-wrap">




                 <?php while ( have_posts() ) : the_post();

                    if(get_field('youtube_or_vimeo') == 'Vimeo') {

                        $oembed_endpoint = 'http://vimeo.com/api/oembed';
                        $video_url = ($_GET['url']) ? $_GET['url'] : 'http://vimeo.com/' . get_field('vimeo_video_id'); // Grab the video url from the url, or use default
                        $json_url = $oembed_endpoint . '.json?url=' . rawurlencode($video_url) . '&width=640'; // Create the URLs
                        $xml_url = $oembed_endpoint . '.xml?url=' . rawurlencode($video_url) . '&width=640';
                        function curl_get($url) { // Curl helper function
                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
                            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                            $return = curl_exec($curl);
                            curl_close($curl);
                            return $return;
                        }
                        $oembed = simplexml_load_string(curl_get($xml_url));// Load in the oEmbed XML
                        
                        //echo html_entity_decode($oembed->thumbnail_url);

                        $videoThumb = html_entity_decode($oembed->thumbnail_url);
                        $videoLink = 'https://player.vimeo.com/video/' . get_field('vimeo_video_id') . '?title=0&byline=0&portrait=0';
                    } else {
                        $videoThumb = 'http://img.youtube.com/vi/' . get_field('youtube_video_id') . '/0.jpg';
                        $videoLink = 'http://www.youtube.com/watch?v=' . get_field('youtube_video_id') . '?autoplay=0';

                    }
                  ?>

                    <div class="video clearfix">
                        <div class="video-column video-right mobile clearfix">
                            <div class="video-thumbnail" style="background-image:url(<?php echo $videoThumb; ?>)">
                                <a class="video-link" href="<?php echo $videoLink; ?>">
                                    <div class="play-btn"></div>
                                </a>
                            </div><!--right-box-->
                        </div>
                        <div class="video-column video-left">
                            <h3><?php the_title(); ?></h3>
                            <?php the_field('video_description'); ?>
                        </div><!--left-box-->
                        <div class="video-column video-right desktop">
                            <div class="video-thumbnail" style="background-image:url(<?php echo $videoThumb; ?>)">
                                <a class="video-link" href="<?php echo $videoLink; ?>">
                                    <div class="play-btn"></div>
                                </a>
                            </div><!--right-box-->
                        </div>
                    </div>



             <?php endwhile; ?>
            </div>
                 <div class="loader">
                     <span>LOADING</span>
                 </div>
                 <div class="load-more">
                 	<?php next_posts_link('&nbsp;'); ?>
                 </div>
             <?php wp_reset_query(); ?>

        </div>
    </div>
</section><!--related-post-wrap/-->




<?php get_footer(); ?>
