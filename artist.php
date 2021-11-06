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
<main class="page-default main-content-wrapper">
    <section id="main-content" class="site-main">

        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', 'page');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </section><!-- #main -->
    <aside id="sidebar-L" class="sidebar">

        <?php if (is_active_sidebar('sidebar-artist')) : ?>
            <div class="widgets-icons">
                <p>
                    <?php echo __('Click on icon below to open the sidebar', 'onde-production'); ?>
                </p>
                <div class="icon-container">
                    <i id="open-sidebar-btn" class="fas fa-chevron-down"></i>
                </div>
            </div>
            <div id="left-widget-area" class="widget-area">
                <div class="close">
                    <i id="sidebar-close-btn" class="fas fa-times"></i>
                </div>
                <div class="widgets-container">
                    <?php dynamic_sidebar('sidebar-artist'); ?>
                </div>

            </div><!-- #secondary -->

        <?php endif;  ?>
    </aside>
    <aside id="sidebar-R" class="sidebar"></aside>
</main>
<?php
get_footer();
