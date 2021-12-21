<?php
/**
 * Template Name: Page Prestation/Service
 * The template for displaying Service pages
 *
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onde-production
 */

get_header();
?>
<main class="page-default prestation-model main-content-wrapper">
    <section id="main-content" class="site-main">
        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', 'page');


        endwhile; // End of the loop.
        ?>

    </section><!-- #main -->
    <aside id="sidebar-L" class="sidebar">

        <?php if (is_active_sidebar('sidebar-prestation')) :
            dynamic_sidebar('sidebar-prestation');
        endif;  ?>
    </aside>
    <aside id="sidebar-R" class="sidebar">
        <?php if (is_active_sidebar('sidebar-right')) :
        dynamic_sidebar('sidebar-right');
        endif;
        ?>
    </aside>
</main>
<?php
get_footer();
