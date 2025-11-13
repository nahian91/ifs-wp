<?php
// Theme setup
function mytheme_setup() {
    // Enable featured image support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

        register_nav_menus(array(
        'main-menu' => __('Main Menu', 'mytheme'),
        'footer-1'  => __('Footer 1', 'mytheme'),
        'footer-2'  => __('Footer 2', 'mytheme'),
        'footer-3'  => __('Footer 3', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'mytheme_setup');

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Enqueue CSS & JS
function mytheme_assets() {
   // ------------------
    // 📦 CSS
    // ------------------
    wp_enqueue_style('mytheme-google-fonts', 'https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap', [], null);
    $css_files = [
        'bootstrap.min.css',
        'slicknav.min.css',
        'swiper-bundle.min.css',
        'all.min.css',
        'animate.css',
        'magnific-popup.css',
        'mousecursor.css',
        'custom.css'
    ];
    foreach ($css_files as $css) {
        wp_enqueue_style( basename($css, '.css'), get_template_directory_uri() . '/assets/css/' . $css, [], '1.0.0' );
    }

    // ------------------
    // ⚡ JS
    // ------------------
    wp_enqueue_script('jquery');
    $js_files = [
        'bootstrap.min.js',
        'validator.min.js',
        'jquery.slicknav.js',
        'swiper-bundle.min.js',
        'jquery.waypoints.min.js',
        'jquery.counterup.min.js',
        'jquery.magnific-popup.min.js',
        'SmoothScroll.js',
        'parallaxie.js',
        'gsap.min.js',
        'magiccursor.js',
        'SplitText.js',
        'ScrollTrigger.min.js',
        'jquery.mb.YTPlayer.min.js',
        'wow.min.js',
        'function.js'
    ];
    foreach ($js_files as $js) {
        wp_enqueue_script( basename($js, '.js'), get_template_directory_uri() . '/assets/js/' . $js, ['jquery'], '1.0.0', true );
    }

}
add_action('wp_enqueue_scripts', 'mytheme_assets');
?>
