<?php

/**
 * Template Name: Page d'Acceuil
 */
get_header();
?>
<!--
<div class="loader">
	<div class="spinner"></div>
</div> -->
<main class="front-page main-content-wrapper">
<section class="parallax-container site-main">
	<div id="slide1" class="slide">
	</div>
	<div id="slide2" class="slide">
	</div>
	<div id="slide3" class="slide"></div>
	<div id="front-page-content-post" class="content-post">

		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', 'home');

		endwhile; // End of the loop.
		?>
	</div>
</section>
<aside id="sidebar-L" class="sidebar"></aside>
<aside id="sidebar-R" class="sidebar"></aside>
</main>
<?php
get_footer();
