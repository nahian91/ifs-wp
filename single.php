<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="wow fadeInUp" data-cursor="-opaque"><?php the_title(); ?></h1>                        
                    <div class="post-single-meta wow fadeInUp">
                        <ol class="breadcrumb">
                            <li><i class="fa-regular fa-user"></i> <?php the_author(); ?></li>
                            <li><i class="fa-regular fa-clock"></i> <?php echo get_the_date('d M, Y'); ?></li>
                        </ol>
                    </div>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Scrolling Ticker Section Start -->
<div class="our-scrolling-ticker">
    <div class="scrolling-ticker-box">
        <div class="scrolling-content">
            <?php
            // Example dynamic categories or tags in ticker
            $tags = get_tags(array('number' => 10));
            if ($tags) {
                foreach ($tags as $tag) {
                    echo '<span><img src="' . get_template_directory_uri() . '/assets/images/icon-sparkle.svg" alt="">' . esc_html($tag->name) . '</span>';
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Scrolling Ticker Section End -->

<!-- Page Single Post Start -->
<div class="page-single-post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Post Featured Image Start -->
                <?php if (has_post_thumbnail()) : ?>
                <div class="post-image">
                    <figure class="image-anime reveal">
                        <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                    </figure>
                </div>
                <?php endif; ?>
                <!-- Post Featured Image End -->

                <!-- Post Single Content Start -->
                <div class="post-content">
                    <!-- Post Entry Start -->
                    <div class="post-entry">
                        <?php
                        // The Content
                        the_content();
                        ?>
                    </div>
                    <!-- Post Entry End -->

                    <!-- Post Tag Links Start -->
                    <div class="post-tag-links">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <!-- Post Tags Start -->
                                <div class="post-tags wow fadeInUp" data-wow-delay="0.5s">
                                    <span class="tag-links">
                                        Tags: <?php the_tags('', ' ', ''); ?>
                                    </span>
                                </div>
                                <!-- Post Tags End -->
                            </div>

                            <div class="col-lg-4">
                                <!-- Post Social Links Start -->
                                <div class="post-social-sharing wow fadeInUp" data-wow-delay="0.5s">
                                    <ul>
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
                                    </ul>
                                </div>
                                <!-- Post Social Links End -->
                            </div>
                        </div>
                    </div>
                    <!-- Post Tag Links End -->
                </div>
                <!-- Post Single Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Single Post End -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>
