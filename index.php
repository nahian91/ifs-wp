<?php get_header();?>

<!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="wow fadeInUp" data-cursor="-opaque">Our <span>Blogs</span></h1>                
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
        </div>
        <!-- Scrolling Ticker End -->
    </div>
    <!-- Scrolling Ticker Section End -->

    <!-- Page Blog Start -->
<div class="page-blog">
    <div class="container">
        <div class="row">

            <?php
            // WP_Query to get latest blog posts
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 6, // Adjust number of posts per page
                'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
            );

            $blog_query = new WP_Query($args);
            $delay = 0; // For wow.js animation delay

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    $delay += 0.2; // Increase delay for each post
            ?>
            
            <div class="col-lg-4 col-md-6">
                <!-- Post Item Start -->
                <div class="post-item wow fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                    
                    <!-- Post Featured Image Start-->
                    <div class="post-featured-image">
                        <a href="<?php the_permalink(); ?>" data-cursor-text="View">
                            <figure class="image-anime">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', array('alt' => get_the_title()));
                                } else { ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-post.jpg" alt="Default Image">
                                <?php } ?>
                            </figure>    
                        </a>                            
                    </div>
                    <!-- Post Featured Image End -->

                    <!-- Post Item Body Start -->
                    <div class="post-item-body">
                        <!-- Post Item Content Start -->
                        <div class="post-item-content">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                        <!-- Post Item Content End -->

                        <!-- Post Item Footer Start -->
                        <div class="post-item-footer">
                            <!-- Post Meta Start-->
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa-solid fa-calendar-days"></i> <?php echo get_the_date('F d, Y'); ?></li>
                                </ul>                                   
                            </div>
                            <!-- Post Meta End-->

                            <!-- Post Readmore Button Start-->
                            <div class="post-item-btn">
                                <a href="<?php the_permalink(); ?>" class="readmore-btn">read more</a>
                            </div>
                            <!-- Post Readmore Button End-->
                        </div> 
                        <!-- Post Item Footer End -->                      
                    </div>
                    <!-- Post Item Body End -->

                </div>
                <!-- Post Item End -->
            </div>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
            <p>No posts found.</p>
            <?php endif; ?>

            <div class="col-lg-12">
                <!-- Page Pagination Start -->
                <div class="page-pagination wow fadeInUp" data-wow-delay="1.2s">
                    <?php
                    echo paginate_links(array(
                        'total'   => $blog_query->max_num_pages,
                        'prev_text' => '<i class="fa-solid fa-arrow-left-long"></i>',
                        'next_text' => '<i class="fa-solid fa-arrow-right-long"></i>',
                    ));
                    ?>
                </div>
                <!-- Page Pagination End -->
            </div>

        </div>
    </div>
</div>
<!-- Page Blog End -->


    <?php get_footer();?>