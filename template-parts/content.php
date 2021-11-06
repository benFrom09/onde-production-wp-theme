<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onde-production
 */

?>
<div class="post-archive-container">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog-post-container">
			<?php if (!is_singular()) : ?>
				<div class="post-image-wrapper">
					<?php onde_production_post_thumbnail(); ?>
				</div>
			<?php endif; ?>
			<div class="blog-post-content">
				<header class="entry-header">
					<?php
					if (!is_front_page() || !is_home()) {
						if (is_singular()) :
							the_title('<h1 class="singular-page entry-title">', '</h1>');
						else :
							the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
						endif;
					}

					if ('post' === get_post_type()) :
					?>
						<div class="entry-meta">
							<?php
							onde_production_posted_on();
							onde_production_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
					<?php if (is_singular()) : ?>
						<div class="post-image-wrapper">
							<?php onde_production_post_thumbnail(); ?>
						</div>
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php 
					if (!is_singular()):
					the_excerpt(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'onde-production'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post(get_the_title())
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__('Pages:', 'onde-production'),
							'after'  => '</div>',
						)
					);
				else:
					
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'onde-production'),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post(get_the_title())
							)
						);
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__('Pages:', 'onde-production'),
								'after'  => '</div>',
							)
						);

				endif;	?>
				</div><!-- .entry-content -->
			</div>


			<footer class="entry-footer">
				<?php onde_production_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div><!-- .blog-post-container -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div>