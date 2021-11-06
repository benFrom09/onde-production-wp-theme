<?php if (get_theme_mod('onde_header_background')) :
    $headerBackground = get_theme_mod('onde-header-background', '#dd9933');
endif;
?>
<header id="masthead" class="site-header" style="background-color:<?= $headerBackground; ?>;">
    <?php
    get_template_part('template-parts/header/top-bar/top-bar');
    get_template_part('template-parts/header/site-branding');
    get_template_part('template-parts/header/navigation');
    ?>
</header><!-- #masthead -->