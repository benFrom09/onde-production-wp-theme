<?php

/**
 * Onde-production functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Onde-production
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}


if (!function_exists('onde_production_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function onde_production_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Onde-production, use a find and replace
		 * to change 'onde-production' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('onde-production', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'onde-production'),
				'menu-2' => esc_html__('Artists', 'onde-production'),
				'menu-3' => esc_html__('Footer', 'onde-production'),
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
				'onde_production_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 800,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		 * display full screen images in gutemberg 
		 */
		add_theme_support('align-wide');

		/**
		 * Custom color palette
		 */
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_attr__( 'onde black', 'onde-production' ),
				'slug'  => 'onde-black',
				'color' => '#000',
			),
			array(
				'name'  => esc_attr__( 'onde dark', 'onde-production' ),
				'slug'  => 'onde-dark',
				'color' => '#222',
			),
			array(
				'name'  => esc_attr__( 'white', 'onde-production' ),
				'slug'  => 'white',
				'color' => '#FFF',
			),
			array(
				'name'  => esc_attr__( 'onde orange', 'onde-production' ),
				'slug'  => 'onde-orange',
				'color' => '#FF9900',
			),
		) );

			/**
		 * The embed blocks automatically apply styles to embedded content to reflect the aspect ratio of content that is embedded in an iFrame
		 */
		add_theme_support( 'responsive-embeds' );

		remove_theme_support( 'widgets-block-editor' );
	}
endif;
add_action('after_setup_theme', 'onde_production_setup');

if (!function_exists('onde_production_special_nav_class')) :

	/**
	 * add special classes to navbar
	 *
	 * @param array $classes
	 * @param [type] $item
	 * @return array
	 */
	function onde_production_special_nav_class(array $classes, $item): array
	{

		if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes)) {

			$classes[] = 'active';
		}
		return $classes;
	}

endif;
add_filter('nav_menu_css_class', 'onde_production_special_nav_class', 10, 2);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onde_production_content_width()
{
	$GLOBALS['content_width'] = apply_filters('onde_production_content_width', 640);
}
add_action('after_setup_theme', 'onde_production_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onde_production_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar Left', 'onde-production'),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name'          => esc_html__('Sidebar Right', 'onde-production'),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name'          => esc_html__('Sidebar Artist', 'onde-production'),
		'id'            => 'sidebar-artist',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name' => __('Footer', 'onde-production'),
		'id' => 'footer',
		'description' => ''
	));
}
add_action('widgets_init', 'onde_production_widgets_init');

/**
 * custom login page
 *
 * @return void
 */
function onde_production_login_logo () {

	wp_enqueue_style(
		'custom-login',
		get_template_directory_uri() . '/custom-login.css',
		array('login')
	);
}

add_action('login_enqueue_scripts','onde_production_login_logo');

/**
 * Enqueue scripts and styles.
 */
function onde_production_scripts()
{
	wp_enqueue_style('onde-production-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('onde-production-style', 'rtl', 'replace');
	wp_enqueue_style('onde-production-main-style', get_template_directory_uri() . '/build/css/main.css', array(), _S_VERSION);
	$id = uniqid();
	wp_enqueue_script('onde-production-js', get_template_directory_uri() . "/build/js/app.js?random=$id", array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'onde_production_scripts');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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



require get_template_directory() . '/inc/add-font-uri.php';


require get_template_directory() . '/inc/style.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}
