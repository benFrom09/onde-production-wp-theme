<div class="top-bar">
    <div class="left">
        <div id="main-menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-controls="primary-menu">
            <i class="fas fa-bars"></i>
        </div>
    </div>

    <div class="right">
        <?php
        if(ONDE_WOOCOMMERCE_ACTIVE) {
             Woocommerce_Setup_Class::onde_production_woocommerce_cart_link();
        }
        wp_nav_menu(
            array(
                'theme_location' => 'menu-4',
                'menu_id'        => 'topbar-menu',
                'container' => '',
            )
        );
        get_template_part('template-parts/header/top-bar/account-links');

        ?>
    </div>
</div>