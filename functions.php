<?php
/**
 * Desvio Vivo Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Desvio_Vivo_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'desvio_vivo_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function desvio_vivo_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Desvio Vivo Theme, use a find and replace
		 * to change 'desvio-vivo-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'desvio-vivo-theme', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'desvio-vivo-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'desvio_vivo_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'desvio_vivo_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function desvio_vivo_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'desvio_vivo_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'desvio_vivo_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function desvio_vivo_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'desvio-vivo-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'desvio-vivo-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'desvio_vivo_theme_widgets_init' );

function custom_scripts_method()
{
wp_register_script('customscripts', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'), '1.0.0', true);
wp_enqueue_script('customscripts');
}

add_action('wp_enqueue_scripts', 'custom_scripts_method');


/**
 * Enqueue scripts and styles.
 */
function desvio_vivo_theme_scripts() {
	wp_enqueue_style( 'desvio-vivo-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'desvio-vivo-theme-style', 'rtl', 'replace' );

	wp_enqueue_style( 'desvio-vivo-theme-custom', get_template_directory_uri() . '/css/custom.css');

	wp_enqueue_style( 'desvio-vivo-theme-fonts', get_template_directory_uri() . '/css/fonts.css');

	wp_enqueue_script( 'desvio-vivo-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'desvio-theme-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'desvio_vivo_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Register Script
function abe_polyfills() {

	wp_register_script( 'polyfill-io', 'https://cdn.polyfill.io/v2/polyfill.min.js', false, false, false );
	wp_enqueue_script( 'polyfill-io' );

}
add_action( 'wp_enqueue_scripts', 'abe_polyfills' );


// Register Script
function abe_gsap() {

	wp_register_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js', false, false, false );
	wp_enqueue_script( 'gsap' );

}
add_action( 'wp_enqueue_scripts', 'abe_gsap' );

// Tirar zoom
function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

//Mudar nome da pagina thank you


add_filter( 'the_title', 'woo_title_order_received', 10, 2 );

function woo_title_order_received( $title, $id ) {
	if ( function_exists( 'is_order_received_page' ) &&
	     is_order_received_page() && get_the_ID() === $id ) {
		$title = "Pedido";
	}
	return $title;
}

add_filter( 'woocommerce_product_add_to_cart_text', 'bbloomer_archive_custom_cart_button_text' );

function bbloomer_archive_custom_cart_button_text( $text ) {
   global $product;
   if ( $product && ! $product->is_in_stock() ) {
      return '';
   }
   return $text;
}
