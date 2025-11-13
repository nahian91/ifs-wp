<?php
/**
 * Theme Functions
 * -----------------
 * Handles theme setup, asset loading, widgets, CPTs, and cleanup.
 *
 * @package ifs-wp
 */

if ( ! defined( 'ABSPATH' ) ) exit; // 🔒 Prevent direct access


// ===============================
// 🎨 THEME SETUP
// ===============================
function ifs_wp_theme_setup() {

    // Add theme supports
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    // Navigation Menus
    register_nav_menus( [
        'main-menu' => __( 'Main Menu', 'ifs-wp' ),
        'footer-1'  => __( 'Footer 1', 'ifs-wp' ),
        'footer-2'  => __( 'Footer 2', 'ifs-wp' ),
        'footer-3'  => __( 'Footer 3', 'ifs-wp' ),
    ] );

    // Default content width
    if ( ! isset( $content_width ) ) {
        $GLOBALS['content_width'] = 1200;
    }
}
add_action( 'after_setup_theme', 'ifs_wp_theme_setup' );


// ===============================
// 🚀 ENQUEUE STYLES & SCRIPTS
// ===============================
function ifs_wp_enqueue_assets() {

    // Google Font
    wp_enqueue_style(
        'ifs-wp-google-fonts',
        'https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap',
        [],
        null
    );

    // CSS Files
    $css_files = [
        'bootstrap.min.css',
        'slicknav.min.css',
        'swiper-bundle.min.css',
        'all.min.css',
        'animate.css',
        'magnific-popup.css',
        'mousecursor.css',
        'custom.css',
    ];

    foreach ( $css_files as $css ) {
        $path = get_template_directory() . '/assets/css/' . $css;
        wp_enqueue_style(
            'ifs-wp-' . basename( $css, '.css' ),
            get_template_directory_uri() . '/assets/css/' . $css,
            [],
            file_exists( $path ) ? filemtime( $path ) : '1.0.0'
        );
    }

    // JS Files
    wp_enqueue_script( 'jquery' );

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
        'function.js',
    ];

    foreach ( $js_files as $js ) {
        $path = get_template_directory() . '/assets/js/' . $js;
        wp_enqueue_script(
            'ifs-wp-' . basename( $js, '.js' ),
            get_template_directory_uri() . '/assets/js/' . $js,
            [ 'jquery' ],
            file_exists( $path ) ? filemtime( $path ) : '1.0.0',
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'ifs_wp_enqueue_assets' );


// ===============================
// 🖼️ IMAGE SIZES
// ===============================
function ifs_wp_image_sizes() {
    add_image_size( 'ifs-thumb', 400, 300, true );
    add_image_size( 'ifs-banner', 1920, 600, true );
}
add_action( 'after_setup_theme', 'ifs_wp_image_sizes' );


// ===============================
// 🧩 WIDGET AREAS
// ===============================
function ifs_wp_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Sidebar', 'ifs-wp' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar area', 'ifs-wp' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ] );

    register_sidebar( [
        'name'          => __( 'Footer Widgets', 'ifs-wp' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Widgets for footer area', 'ifs-wp' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="footer-widget-title">',
        'after_title'   => '</h5>',
    ] );
}
add_action( 'widgets_init', 'ifs_wp_widgets_init' );


// ===============================
// 🧼 CLEANUP DEFAULT WP HEAD
// ===============================
function ifs_wp_cleanup_head() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'rest_output_link_wp_head' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
}
add_action( 'init', 'ifs_wp_cleanup_head' );


// ===============================
// 📸 CUSTOM POST TYPES (CPTs)
// ===============================
function ifs_wp_register_cpts() {

    // 🖼️ Image Gallery CPT
    register_post_type( 'image_gallery', [
        'labels' => [
            'name'               => __( 'Image Gallery', 'ifs-wp' ),
            'singular_name'      => __( 'Image Item', 'ifs-wp' ),
            'add_new'            => __( 'Add New Image', 'ifs-wp' ),
            'add_new_item'       => __( 'Add New Image', 'ifs-wp' ),
            'edit_item'          => __( 'Edit Image', 'ifs-wp' ),
            'new_item'           => __( 'New Image', 'ifs-wp' ),
            'view_item'          => __( 'View Image', 'ifs-wp' ),
            'search_items'       => __( 'Search Images', 'ifs-wp' ),
            'not_found'          => __( 'No Images found', 'ifs-wp' ),
            'not_found_in_trash' => __( 'No Images found in Trash', 'ifs-wp' ),
            'menu_name'          => __( 'Image Gallery', 'ifs-wp' ),
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => [ 'slug' => 'images' ],
        'menu_icon'     => 'dashicons-format-gallery',
        'supports'      => [ 'title', 'thumbnail' ],
        'show_in_rest'  => true,
    ] );

    // 🎞️ Video Gallery CPT
    register_post_type( 'video_gallery', [
        'labels' => [
            'name'               => __( 'Video Gallery', 'ifs-wp' ),
            'singular_name'      => __( 'Video Item', 'ifs-wp' ),
            'add_new'            => __( 'Add New Video', 'ifs-wp' ),
            'add_new_item'       => __( 'Add New Video', 'ifs-wp' ),
            'edit_item'          => __( 'Edit Video', 'ifs-wp' ),
            'new_item'           => __( 'New Video', 'ifs-wp' ),
            'view_item'          => __( 'View Video', 'ifs-wp' ),
            'search_items'       => __( 'Search Videos', 'ifs-wp' ),
            'not_found'          => __( 'No Videos found', 'ifs-wp' ),
            'not_found_in_trash' => __( 'No Videos found in Trash', 'ifs-wp' ),
            'menu_name'          => __( 'Video Gallery', 'ifs-wp' ),
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => [ 'slug' => 'videos' ],
        'menu_icon'     => 'dashicons-video-alt3',
        'supports'      => [ 'title' ],
        'show_in_rest'  => true,
    ] );

    // 🗣️ Testimonials CPT
    register_post_type( 'testimonials', [
        'labels' => [
            'name'               => __( 'Testimonials', 'ifs-wp' ),
            'singular_name'      => __( 'Testimonial', 'ifs-wp' ),
            'add_new'            => __( 'Add New Testimonial', 'ifs-wp' ),
            'add_new_item'       => __( 'Add New Testimonial', 'ifs-wp' ),
            'edit_item'          => __( 'Edit Testimonial', 'ifs-wp' ),
            'new_item'           => __( 'New Testimonial', 'ifs-wp' ),
            'view_item'          => __( 'View Testimonial', 'ifs-wp' ),
            'search_items'       => __( 'Search Testimonials', 'ifs-wp' ),
            'not_found'          => __( 'No Testimonials found', 'ifs-wp' ),
            'not_found_in_trash' => __( 'No Testimonials found in Trash', 'ifs-wp' ),
            'menu_name'          => __( 'Testimonials', 'ifs-wp' ),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => [ 'slug' => 'testimonials' ],
        'menu_icon'    => 'dashicons-testimonial',
        'supports'     => [ 'title', 'editor', 'thumbnail' ], // Title = Name, Editor = Speech
        'show_in_rest' => false,
    ] );

}
add_action( 'init', 'ifs_wp_register_cpts' );


// ===============================
// ➕ CUSTOM META BOX FOR VIDEO URL
// ===============================
function ifs_wp_video_gallery_meta_box() {
    add_meta_box(
        'ifs_wp_video_url',           // ID
        __( 'Video URL', 'ifs-wp' ), // Title
        'ifs_wp_video_url_callback',  // Callback
        'video_gallery',              // Post type
        'normal',                     // Context
        'high'                        // Priority
    );
}
add_action( 'add_meta_boxes', 'ifs_wp_video_gallery_meta_box' );

function ifs_wp_video_url_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'ifs_wp_video_nonce' );
    $video_url = get_post_meta( $post->ID, '_ifs_wp_video_url', true );
    ?>
    <p>
        <label for="ifs_wp_video_url"><?php _e( 'Enter Video URL (YouTube, Vimeo, etc.)', 'ifs-wp' ); ?></label>
        <input type="url" name="ifs_wp_video_url" id="ifs_wp_video_url" value="<?php echo esc_attr( $video_url ); ?>" style="width:100%;">
    </p>
    <?php
}

function ifs_wp_save_video_url_meta( $post_id ) {

    if ( ! isset( $_POST['ifs_wp_video_nonce'] ) || ! wp_verify_nonce( $_POST['ifs_wp_video_nonce'], basename( __FILE__ ) ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['ifs_wp_video_url'] ) && ! empty( $_POST['ifs_wp_video_url'] ) ) {
        update_post_meta( $post_id, '_ifs_wp_video_url', esc_url_raw( $_POST['ifs_wp_video_url'] ) );
    } else {
        delete_post_meta( $post_id, '_ifs_wp_video_url' );
    }
}
add_action( 'save_post', 'ifs_wp_save_video_url_meta' );


// ===============================
// ➕ CUSTOM META BOX FOR TESTIMONIAL DESIGNATION
// ===============================
function ifs_wp_testimonial_meta_box() {
    add_meta_box(
        'ifs_wp_testimonial_designation',
        __( 'Designation', 'ifs-wp' ),
        'ifs_wp_testimonial_designation_callback',
        'testimonials',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ifs_wp_testimonial_meta_box' );

function ifs_wp_testimonial_designation_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'ifs_wp_testimonial_nonce' );
    $designation = get_post_meta( $post->ID, '_ifs_wp_testimonial_designation', true );
    ?>
    <p>
        <label for="ifs_wp_testimonial_designation"><?php _e( 'Enter Designation', 'ifs-wp' ); ?></label>
        <input type="text" name="ifs_wp_testimonial_designation" id="ifs_wp_testimonial_designation" value="<?php echo esc_attr( $designation ); ?>" style="width:100%;">
    </p>
    <?php
}

function ifs_wp_save_testimonial_meta( $post_id ) {
    if ( ! isset( $_POST['ifs_wp_testimonial_nonce'] ) || ! wp_verify_nonce( $_POST['ifs_wp_testimonial_nonce'], basename( __FILE__ ) ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['ifs_wp_testimonial_designation'] ) && ! empty( $_POST['ifs_wp_testimonial_designation'] ) ) {
        update_post_meta( $post_id, '_ifs_wp_testimonial_designation', sanitize_text_field( $_POST['ifs_wp_testimonial_designation'] ) );
    } else {
        delete_post_meta( $post_id, '_ifs_wp_testimonial_designation' );
    }
}
add_action( 'save_post', 'ifs_wp_save_testimonial_meta' );
