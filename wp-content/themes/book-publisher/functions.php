<?php
/**
 * Book Publisher functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Book Publisher
 */

if ( ! defined( 'DIGITAL_BOOKS_URL' ) ) {
    define( 'DIGITAL_BOOKS_URL', esc_url( 'https://www.themagnifico.net/themes/book-publisher-wordpress-theme/', 'book-publisher') );
}
if ( ! defined( 'DIGITAL_BOOKS_TEXT' ) ) {
    define( 'DIGITAL_BOOKS_TEXT', __( 'Book Publisher Pro','book-publisher' ));
}

function book_publisher_enqueue_styles() {
    wp_enqueue_style('book-publisher-font', digital_books_font_url(), array());
    wp_enqueue_style( 'flatly-css', esc_url(get_template_directory_uri()) . '/assets/css/flatly.css');
    $parentcss = 'digital-books-style';
    $theme = wp_get_theme(); wp_enqueue_style( $parentcss, get_template_directory_uri() . '/style.css', array(), $theme->parent()->get('Version'));
    wp_enqueue_style( 'book-publisher-style', get_stylesheet_uri(), array( $parentcss ), $theme->get('Version'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );  
}

add_action( 'wp_enqueue_scripts', 'book_publisher_enqueue_styles' );

function book_publisher_customize_register($wp_customize){

    $wp_customize->add_setting('book_publisher_topbar_text', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('book_publisher_topbar_text', array(
        'label' => __('Topbar Text', 'book-publisher'),
        'section' => 'digital_books_social_link',
        'priority' => 1,
        'type' => 'text',
    ));

    //Latest Product
    $wp_customize->add_section('book_publisher_latest_product',array(
        'title' => esc_html__('Latest Product','book-publisher'),
        'description' => esc_html__('Here you have to select product category which will display perticular latest product in the home page.','book-publisher'),
        'priority' => 5,
    ));

    $wp_customize->add_setting('book_publisher_latest_product_title', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('book_publisher_latest_product_title', array(
        'label' => __('Section Title', 'book-publisher'),
        'section' => 'book_publisher_latest_product',
        'priority' => 1,
        'type' => 'text',
    ));

    $args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        } 
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('book_publisher_latest_product',array(
        'sanitize_callback' => 'digital_books_sanitize_select',
    ));
    $wp_customize->add_control('book_publisher_latest_product',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','book-publisher'),
        'section' => 'book_publisher_latest_product',
    ));

}
add_action('customize_register', 'book_publisher_customize_register');

if ( ! function_exists( 'book_publisher_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function book_publisher_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('book-publisher-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'digital_books_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'book_publisher_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function book_publisher_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'book-publisher' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'book-publisher' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'book_publisher_widgets_init' );

function book_publisher_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_section( 'digital_books_color_option' );
    $wp_customize->remove_section( 'digital_books_general_settings' );
}
add_action( 'customize_register', 'book_publisher_remove_customize_register', 11 );