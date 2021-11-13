<?php

/**
 * Template Name: Page contact
 * The template for displaying contact pages
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
<main class="page-contact contact-model main-content-wrapper">
	<section id="main-content" class="site-main">

		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', 'page');

		endwhile; // End of the loop.
		?>

	</section><!-- #main -->
	<aside id="sidebar-L" class="sidebar"></aside>
	<aside id="sidebar-R" class="sidebar"></aside>
	</main>
<?php
get_footer();