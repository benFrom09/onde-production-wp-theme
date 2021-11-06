<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Onde-production
 */

get_header();
?>
<main class="page-default main-content-wrapper">
	<section id="main-content" class="site-main">
		<div class="post-container">
		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_type());

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'onde-production') . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'onde-production') . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div><!-- post-container -->
	</section><!-- #main-content -->
	<aside id="sidebar-L" class="sidebar">
		<?php get_sidebar();?>
	</aside>
	<aside id="sidebar-R" class="sidebar"></aside>
	</main><!-- .main-content-wrapper -->
<?php

get_footer();
