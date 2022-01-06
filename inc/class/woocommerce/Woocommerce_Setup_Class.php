<?php

/**
 * Perform all main woocommerce configuration for onde theme
 */

if (!class_exists('Woocommerce_Setup_Class')) {

    class Woocommerce_Setup_Class
    {
        public $product_cat = [];

        public function __construct()
        {
            require_once __DIR__ . '/woocoomerce_helpers.php';
            /**
             * Remove default WooCommerce wrapper.
             */
            remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
            remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

            add_action('woocommerce_before_main_content', [$this, 'onde_woocommerce_wrapper_before']);
            add_action('woocommerce_after_main_content', [$this, 'onde_woocommerce_wrapper_after']);

            add_action('after_setup_theme', [$this, 'onde_production_woocommerce_setup']);
            /**
             * Disable the default WooCommerce stylesheet.
             *
             * Removing the default WooCommerce stylesheet and enqueing your own will
             * protect you during WooCommerce core updates.
             *
             * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
             */
            add_action('wp_enqueue_scripts', [$this, 'woocommerce_register_scripts']);
            add_action('woocommerce_sidebar', 'onde_get_woocommerce_sidebar');

            add_filter('woocommerce_enqueue_styles', '__return_empty_array');
            add_filter('woocommerce_add_to_cart_fragments', [$this, 'onde_production_woocommerce_cart_link_fragment']);
        }

        public function onde_production_woocommerce_setup()
        {

            add_theme_support(
                'woocommerce',
                array(
                    'thumbnail_image_width' => 150,
                    'single_image_width'    => 300,
                    'product_grid'          => array(
                        'default_rows'    => 3,
                        'min_rows'        => 1,
                        'default_columns' => 4,
                        'min_columns'     => 1,
                        'max_columns'     => 6,
                    ),
                )
            );
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');
        }

        public function woocommerce_register_scripts()
        {
            wp_enqueue_style('onde-production-woocommerce-style', ONDE_THEME_URI . '/woocommerce/assets/woocommerce.css', array(), _S_VERSION);
            wp_enqueue_style('onde-production-woocommerce-custom-style', ONDE_THEME_URI . '/assets/css/woocommerce-custom.css', array(), _S_VERSION);
        }

        public function onde_woocommerce_wrapper_before()
        {
?>
            <main class="page-default main-content-wrapper">
                <section id="main-content" class="site-main">
                <?php
            }

            public function onde_woocommerce_wrapper_after()
            {
                ?>
                </section>
                <aside id="sidebar-L" class="sidebar">
                    <?php do_action('woocommerce_sidebar');

                    ?>
                    <!-- main-wrapper -->
                </aside>
                <aside id="sidebar-R" class="sidebar">
                    <?php dynamic_sidebar('sidebar-right'); ?>
                </aside>
            </main><!-- #main -->

            <?php
            }
            /**
             * Cart Fragments.
             *
             * Ensure cart contents update when products are added to the cart via AJAX.
             *
             * @param array $fragments Fragments to refresh via AJAX.
             * @return array Fragments to refresh via AJAX.
             */
            public static function onde_production_woocommerce_cart_link_fragment($fragments)
            {
                ob_start();
                self::onde_production_woocommerce_cart_link();
                $fragments['a.cart-contents'] = ob_get_clean();

                return $fragments;
            }
            /**
             * Cart Link.
             *
             * Displayed a link to the cart including the number of items present and the cart total.
             *
             * @return void
             */
            public static function onde_production_woocommerce_cart_link()
            {
                if (ONDE_WOOCOMMERCE_ACTIVE && onde_is_item_in_menu('menu-1', 'Boutique')) :
            ?>
                <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'onde-production'); ?>">
                    <?php
                    $item_count_text = sprintf(
                        /* translators: number of items in the mini cart. */
                        _n('%d', '%d', WC()->cart->get_cart_contents_count(), 'onde-production'),
                        WC()->cart->get_cart_contents_count()
                    );
                    ?>
                    <div class="amount-container">
                        <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
                    </div>
                    <div class="cart-total">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="count"><?php echo esc_html($item_count_text); ?></span>
                    </div>

                </a>
            <?php
                endif;
            }

            /**
             * Display Header Cart.
             *
             * @return void
             */
            public static function onde_production_woocommerce_header_cart()
            {
                if (is_cart()) {
                    $class = 'current-menu-item';
                } else {
                    $class = '';
                }
            ?>
            <ul id="site-header-cart" class="site-header-cart">
                <li class="<?php echo esc_attr($class); ?>">
                    <?php self::onde_production_woocommerce_cart_link(); ?>
                </li>
                <li>
                    <?php
                    $instance = array(
                        'title' => '',
                    );

                    the_widget('WC_Widget_Cart', $instance);
                    ?>
                </li>
            </ul>
<?php
            }

            public function onde_shop_product_order_by($option)
            {
                $option['title'] = 'Sort by categories';
                return $option;
            }


            public function set_products_categories()
            {
                $this->product_cat = onde_get_woocommerce_product_categories();
            }
        }
    }
