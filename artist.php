<?php
/**
 * Template Name: Page artistes
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
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
<main class="page-default artist-model main-content-wrapper">
    <section id="main-content" class="site-main">

        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', 'page');

        endwhile; // End of the loop.
        ?>

    </section><!-- #main -->
    <aside id="sidebar-L" class="sidebar">

        <?php if (is_active_sidebar('sidebar-artist')) :
            dynamic_sidebar('sidebar-artist');
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
