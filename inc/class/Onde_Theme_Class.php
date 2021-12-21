<?php

/**
 *Onde Theme class
 * 
 * 
 */

class Onde_Theme_Class
{

    /**
     * Main Theme class constructor
     * 
     * @since 1.0.0
     */

    public function __construct()
    {


        //Define theme constant 
        $this->onde_constants();

        //load required files

        $this->onde_load_files();


       // add_action('init',[$this,'onde_modify_jquery']);
        //after_set_up_theme hook
        add_action('after_setup_theme', [$this, 'theme_set_up']);

        //widget init
        add_action('widgets_init', [$this, 'onde_register_widgets']);

        //set global content width
        add_action('after_setup_theme', [$this,'onde_content_width'], 0);

        //custom login
        add_action('login_enqueue_scripts', [$this, 'onde_custom_login_page']);

        //register_script
        add_action('wp_enqueue_scripts', [$this,'onde_register_scripts']);

        //add navbar active class 
        add_filter('nav_menu_css_class', [$this,'onde_menu_add_active_class'], 10, 2);
    }


    /**
     * define constant
     *
     * @since 1.0.0.
     */
    public function onde_constants()
    {

        $version = self::theme_version();

        define('ONDE_THEME_VERSION', $version);

        //define js,images and css path 

        define('ONDE_ASSETS', ONDE_THEME_URI . '/assets');

        //text-domain for translation

        define('ONDE_TEXT_DOMAIN', 'onde-production');

        define('ONDE_WOOCOMMERCE_ACTIVE', class_exists('WooCommerce'));
    }

    public function onde_load_files()
    {

        $dir = ONDE_THEME_DIR;

        /**
         * Custom template tags for this theme.
         */
        require $dir . '/inc/template-tags.php';

        /**
         * Functions which enhance the theme by hooking into WordPress.
         */
        require $dir . '/inc/template-functions.php';

        /**
         * Customizer additions.
         */
        require $dir . '/inc/customizer.php';



        require $dir . '/inc/add-font-uri.php';


        require $dir . '/inc/style.php';


        /**
         * Custom Widgets
         */

        require_once $dir . '/widgets/YoutubeWidget.php';
        require_once $dir . '/widgets/SocialMediaWideget.php';

        /**
         * Woocommerce
         */

        if (ONDE_WOOCOMMERCE_ACTIVE) {
            require_once $dir . '/inc/class/woocommerce/Woocommerce_Setup_Class.php';

            new Woocommerce_Setup_Class();
            //require_once $dir . '/inc/woocommerce.php';
        }

        /**
         * JETPACK
         */

        /**
         * Load Jetpack compatibility file.
         */
        if (defined('JETPACK__VERSION')) {
            require $dir . '/inc/jetpack.php';
        }
    }


    public function theme_set_up()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Onde-production, use a find and replace
		 * to change 'onde-production' to the name of your theme in all the template files.
		 */
        load_theme_textdomain(ONDE_TEXT_DOMAIN, ONDE_THEME_DIR . '/languages');

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
                'menu-4' => esc_html__('Top Bar','onde-production'),
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
        add_theme_support('editor-color-palette', array(
            array(
                'name'  => esc_attr__('onde black', 'onde-production'),
                'slug'  => 'onde-black',
                'color' => '#000',
            ),
            array(
                'name'  => esc_attr__('onde dark', 'onde-production'),
                'slug'  => 'onde-dark',
                'color' => '#222',
            ),
            array(
                'name'  => esc_attr__('white', 'onde-production'),
                'slug'  => 'white',
                'color' => '#FFF',
            ),
            array(
                'name'  => esc_attr__('onde orange', 'onde-production'),
                'slug'  => 'onde-orange',
                'color' => '#FF9900',
            ),
        ));

        add_theme_support(
            'editor-font-sizes',
            array(
                array(
                    'name' => esc_html__('very-small', 'onde-production'),
                    'shortName' => 'XXS',
                    'size' => 12,
                    'slug' => 'very-small'
                ),
                array(
                    'name' => esc_html__('small', 'onde-production'),
                    'shortName' => 'XS',
                    'size' => 14,
                    'slug' => 'small'
                ),
                array(
                    'name' => esc_html__('normal', 'onde-production'),
                    'shortName' => 'S',
                    'size' => 16,
                    'slug' => 'normal'
                ),
                array(
                    'name' => esc_html__('medium', 'onde-production'),
                    'shortName' => 'M',
                    'size' => 20,
                    'slug' => 'medium'
                ),
                array(
                    'name' => esc_html__('large', 'onde-production'),
                    'shortName' => 'L',
                    'size' => 26,
                    'slug' => 'large'
                ),
                array(
                    'name' => esc_html__('extra-large', 'onde-production'),
                    'shortName' => 'XL',
                    'size' => 30,
                    'slug' => 'extra-large'
                ),

            )
        );

        //disable custom font-size
        add_theme_support('disable-custom-font-sizes');
        /**
         * The embed blocks automatically apply styles to embedded content to reflect the aspect ratio of content that is embedded in an iFrame
         */
        add_theme_support('responsive-embeds');

        remove_theme_support('widgets-block-editor');
        
    }
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * 
 *  @global int $content_width
 */
    public function onde_content_width() {
        $GLOBALS['content_width'] = apply_filters('onde_production_content_width', 640);
    }
    /**
     * Enqueue  WP scripts
     *
     * @return void
     */
    public function onde_register_scripts()
    {
        
        wp_enqueue_style('onde-production-style', get_stylesheet_uri(), array(), ONDE_THEME_VERSION);
        wp_style_add_data('onde-production-style', 'rtl', 'replace');
        wp_enqueue_style('onde-production-main-style', ONDE_THEME_URI . '/build/css/main.css', array(), ONDE_THEME_VERSION);
        //$id = uniqid();
        wp_enqueue_script('onde-production-js', ONDE_THEME_URI . "/build/js/app.js", array(), ONDE_THEME_VERSION, true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        //AJAX SCRIPT

        //wp_enqueue_script('onde-ajax', ONDE_THEME_URI . '/assets/js/modules/ajax.js', array(), ONDE_THEME_VERSION, true);

        //SEND PHP VAR TO JS
        
        wp_localize_script('onde-ajax', 'ajaxurl', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
        
    }
    /**
     * Use a googleserved  version of jquery 
     *
     * @return void
     */
    public function onde_modify_jquery() {
        if(!is_admin()) {
            wp_deregister_script('jquery');
            wp_register_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',false,'3.6.0');
            wp_enqueue_script('jquery');
        }
    }
    public function onde_register_widgets()
    {

        if (class_exists(Onde\widgets\SocialMediaWidget::class)) {
            register_widget(Onde\widgets\SocialMediaWidget::class);
        }
        if (class_exists(Onde\widgets\YoutubeWidget::class)) {
            register_widget(Onde\widgets\YoutubeWidget::class);
        }



        register_sidebar(array(
            'name'          => esc_html__('Sidebar Left', 'onde-production'),
            'id'            => 'sidebar-left',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name'          => esc_html__('Sidebar Right', 'onde-production'),
            'id'            => 'sidebar-right',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name'          => esc_html__('Sidebar Artist', 'onde-production'),
            'id'            => 'sidebar-artist',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name' => __('Footer widget', 'onde-production'),
            'id' => 'footer-widget',
            'description' => ''
        ));
        register_sidebar(array(
            'name'          => esc_html__('Sidebar Prestation', 'onde-production'),
            'id'            => 'sidebar-prestation',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name'          => esc_html__('Sidebar optv', 'onde-production'),
            'id'            => 'sidebar-optv',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name'          => esc_html__('Sidebar contact', 'onde-production'),
            'id'            => 'sidebar-contact',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
        register_sidebar(array(
            'name'          => esc_html__('Sidebar nous-aider', 'onde-production'),
            'id'            => 'sidebar-nous-aider',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));

        register_sidebar(array(
            'name'          => esc_html__('Sidebar woocommerce', 'onde-production'),
            'id'            => 'sidebar-woocommerce',
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="widget woocommerce-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
    }

    public function onde_custom_login_page()
    {
        wp_enqueue_style(
            'custom-login',
            ONDE_THEME_URI . '/custom-login.css',
            array('login')
        );
    }
    /**
     * Undocumented function
     *
     * @return string|false
     */
    public static function theme_version()
    {

        //get theme data
        $theme = wp_get_theme();

        //return version
        return $theme->get('Version');
    }
    /**
	 * add special classes to navbar
	 *
	 * @param array $classes
	 * @param [type] $item
	 * @return array
	 */
    public function onde_menu_add_active_class (array $classes, $item):array {
        /*
        if (in_array('current-post-ancestor', $classes) || in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes)) {

			$classes[] = 'active';
		}
        */
        if (in_array('current-menu-item', $classes)|| in_array('current-page-ancestor', $classes) ) {

			$classes[] = 'active';
		}
		return $classes;
    }
}
