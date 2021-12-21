<div class="site-branding">
    <div class="header-image" style="background-image:url(<?= esc_url(get_template_directory_uri() . '/assets/images/default-header-custom-image.jpg') ?>)">
        <!--<img src="--><?php /* esc_url(get_template_directory_uri() . '/assets/images/default-header-custom-image.png') */?><!--" alt="">-->
    </div>

    <?php
    if (function_exists('has_custom_logo')) {
        if (has_custom_logo()) {
            $logo = get_custom_logo();
        } else {
            $logo = "<a href=\"" . esc_url(home_url('/')) . "\" title=\"" . esc_attr(get_bloginfo('name', 'display')) . "\"><img src=\"" . esc_url(get_template_directory_uri() . '/assets/images/Typo@800x190-white.png') . "\" alt=\"" . esc_attr(get_bloginfo('name')) . "\" /></a>";
        }
    }
    ?>
    <div class="site-logo">
        <?php
        if (get_theme_mod('onde-show-logo')) :
            echo $logo;
        else :
        ?>
            <div class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></div>
            <?php
            $onde_production_description = get_bloginfo('description', 'display');
            if ($onde_production_description || is_customize_preview()) :
            ?>
                <p class="site-description"><?php echo $onde_production_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                            ?></p>
        <?php endif;

        endif;
        ?>
    </div>
    <div class="logo-text">
        <div class="ml12">Enregistrement audio</div>
        <div class="ml12">Réalisation video</div>
        <div class="ml12">édition et diffusion numérique</div>
    </div>
</div><!-- .site-branding -->