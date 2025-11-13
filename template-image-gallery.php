<?php

/*
 * Template Name: Image Gallery
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
                        <h1 class="wow fadeInUp" data-cursor="-opaque">Social <span>Banner</span></h1>         
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
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Social Media Marketing</span>
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Search Engine Optimization</span>
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Email Marketing</span>
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Web Design</span>
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Mobile Marketing Solutions</span>
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Social Media Marketing</span>
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Search Engine Optimization</span>
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Email Marketing</span>
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Web Design</span>
                <span><img src="<?php echo get_template_directory_uri();?>/assets/images/icon-sparkle.svg" alt="">Mobile Marketing Solutions</span>
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

    <!-- Photo Gallery Start -->
<div class="page-gallery">
    <div class="container">
        <!-- gallery section start -->
        <div class="row gallery-items page-gallery-box">

            <?php
            // Query Image Gallery CPT
            $gallery_args = [
                'post_type'      => 'image_gallery',
                'posts_per_page' => -1, // Show all images
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ];

            $gallery_query = new WP_Query( $gallery_args );

            if ( $gallery_query->have_posts() ) :
                $delay = 0; // Animation delay

                while ( $gallery_query->have_posts() ) : $gallery_query->the_post();
                    // Get featured image
                    $image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    if ( ! $image_url ) continue; // Skip if no image
            ?>
                    <div class="col-lg-4 col-6">
                        <div class="photo-gallery wow fadeInUp" data-wow-delay="<?php echo esc_attr( $delay ); ?>s">
                            <a href="<?php echo esc_url( $image_url ); ?>" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
                                </figure>
                            </a>
                        </div>
                    </div>
            <?php
                    $delay += 0.2; // Increment animation delay
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>' . esc_html__( 'No gallery images found.', 'ifs-wp' ) . '</p>';
            endif;
            ?>

        </div>
        <!-- gallery section end -->
    </div>
</div>
<!-- Photo Gallery End -->


    <?php get_footer();?>