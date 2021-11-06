<?php

/**
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
			<?php
			if (!is_front_page()) {
				get_sidebar();
			}
			?>
	</aside>
	<aside id="sidebar-R" class="sidebar"></aside>
</main>
<?php
get_footer();
