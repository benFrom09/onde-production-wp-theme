<?php if (get_theme_mod('onde-navbar-background')) :
    $navbarBackground = get_theme_mod('onde-navbar-background', '#FF9900');
endif;
?>
<nav id="site-navigation" class="main-navigation" style="background-color:<?= $navbarBackground; ?>;">
    <!--
    <div id="main-menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <i class="fas fa-bars"></i>
    </div>
-->
    <div class="left-fix-empty-div"></div>
    <div class="onde-menu-container" aria-expanded="false" style="background-color:<?= $navbarBackground; ?>;">
        <?php
        if(has_nav_menu('menu-1')) {
            wp_nav_menu(
                array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'container' => '',
                    'walker' => new Onde_Nav_Walker()
                )
            );
        }
        ?>
    </div>
    <div class="header-cart">
            <?php
            get_template_part('template-parts/header/top-bar/header-cart');
            ?>
    </div>
</nav><!-- #site-navigation -->