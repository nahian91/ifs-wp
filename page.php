<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays pages by default.
 *
 * @package Your_Theme_Name
 */

get_header(); ?>

<!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="wow fadeInUp" data-cursor="-opaque"><?php the_title();?></h1>         
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php the_content();?>
            </div>
        </div>
    </div>

<?php
get_footer();
