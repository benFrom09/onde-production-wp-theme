<?php

/**
 * Template Name : Page nous-aider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onde-production
 */

get_header();
?>
<main class="page-default default-model main-content-wrapper">
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
        <?php if (!is_active_sidebar('sidebar-nous-aider')) : ?>

        <?php endif;
        dynamic_sidebar('sidebar-nous-aider');
        ?>
    </aside>
    <aside id="sidebar-R" class="sidebar">
        <?php if (!is_active_sidebar('sidebar-right')) : ?>

        <?php endif;
        dynamic_sidebar('sidebar-right');
        ?>
    </aside>
</main>
<?php
get_footer();
