<?php if (get_theme_mod('onde-navbar-background')) :
    $navbarBackground = get_theme_mod('onde-navbar-background', '#FF9900');
endif;
?>
<nav id="site-navigation" class="main-navigation" style="background-color:<?= $navbarBackground; ?>;">
    <div id="main-menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </div>
    <div class="onde-menu-container" style="background-color:<?= $navbarBackground; ?>;">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            )
        );
        ?>
    </div>
</nav><!-- #site-navigation -->
