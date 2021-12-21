<?php
/**
 * Template Name: Page OPTV
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

		endwhile; // End of the loop.
		?>

	</section><!-- #main -->
	<aside id="sidebar-L" class="sidebar">
    <?php if (is_active_sidebar('sidebar-contact')) :
			dynamic_sidebar('sidebar-contact');
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
