<?php

/*
 * Template Name: Video Gallery
*/

get_header();
?>

   <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="wow fadeInUp" data-cursor="-opaque">Promotional <span>Videos</span></h1>      
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Scrolling Ticker Section Start -->
    <div class="our-scrolling-ticker">
        <!-- Scrolling Ticker Start -->
        <div class="scrolling-ticker-box">
            <div class="scrolling-content">
                <span><img src="images/icon-sparkle.svg" alt="">Social Media Marketing</span>
                <span><img src="images/icon-sparkle.svg" alt="">Search Engine Optimization</span>
                <span><img src="images/icon-sparkle.svg" alt="">Email Marketing</span>
                <span><img src="images/icon-sparkle.svg" alt="">Web Design</span>
                <span><img src="images/icon-sparkle.svg" alt="">Mobile Marketing Solutions</span>
                <span><img src="images/icon-sparkle.svg" alt="">Social Media Marketing</span>
                <span><img src="images/icon-sparkle.svg" alt="">Search Engine Optimization</span>
                <span><img src="images/icon-sparkle.svg" alt="">Email Marketing</span>
                <span><img src="images/icon-sparkle.svg" alt="">Web Design</span>
                <span><img src="images/icon-sparkle.svg" alt="">Mobile Marketing Solutions</span>
            </div>

            <div class="scrolling-content">
                <span><img src="images/icon-sparkle.svg" alt="">Social Media Marketing</span>
                <span><img src="images/icon-sparkle.svg" alt="">Search Engine Optimization</span>
                <span><img src="images/icon-sparkle.svg" alt="">Email Marketing</span>
                <span><img src="images/icon-sparkle.svg" alt="">Web Design</span>
                <span><img src="images/icon-sparkle.svg" alt="">Mobile Marketing Solutions</span>
                <span><img src="images/icon-sparkle.svg" alt="">Social Media Marketing</span>
                <span><img src="images/icon-sparkle.svg" alt="">Search Engine Optimization</span>
                <span><img src="images/icon-sparkle.svg" alt="">Email Marketing</span>
                <span><img src="images/icon-sparkle.svg" alt="">Web Design</span>
                <span><img src="images/icon-sparkle.svg" alt="">Mobile Marketing Solutions</span>
            </div>
        </div>
        <!-- Scrolling Ticker End -->
    </div>
    <!-- Scrolling Ticker Section End -->

    <!-- Page Video Gallery Start -->
<div class="page-video-gallery">
    <div class="container">
        <div class="row">
            <?php
            $videos = new WP_Query([
                'post_type'      => 'video_gallery',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);

            if ( $videos->have_posts() ) :
                $delay = 0;
                while ( $videos->have_posts() ) : $videos->the_post();
                    $video_url = get_post_meta( get_the_ID(), '_ifs_wp_video_url', true );
                    if ( ! $video_url ) continue;
                    $delay_attr = $delay > 0 ? ' data-wow-delay="' . $delay . 's"' : '';

                    // Convert URL to embed iframe (YouTube or Vimeo)
                    if ( strpos( $video_url, 'youtube.com' ) !== false || strpos( $video_url, 'youtu.be' ) !== false ) {
                        // YouTube
                        preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/))([^\&\?\/]+)/", $video_url, $matches);
                        $video_id = $matches[1] ?? '';
                        $embed_url = 'https://www.youtube.com/embed/' . $video_id;
                    } elseif ( strpos( $video_url, 'vimeo.com' ) !== false ) {
                        // Vimeo
                        preg_match("/vimeo\.com\/(\d+)/", $video_url, $matches);
                        $video_id = $matches[1] ?? '';
                        $embed_url = 'https://player.vimeo.com/video/' . $video_id;
                    } else {
                        $embed_url = $video_url; // fallback for direct iframe URLs
                    }
            ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="video-gallery-image wow fadeInUp"<?php echo $delay_attr; ?>>
                            <iframe width="100%" height="250" src="<?php echo esc_url( $embed_url ); ?>" frameborder="0" allowfullscreen allow="autoplay; fullscreen"></iframe>
                        </div>
                    </div>
            <?php
                    $delay += 0.2;
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No videos found.</p>';
            endif;
            ?>
        </div>
    </div>
</div>
<!-- Page Video Gallery End -->


    <?php get_footer();?>