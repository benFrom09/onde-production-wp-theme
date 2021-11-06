<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Onde-production
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('onde-front-page-post-container'); ?>>
	<header class="onde-front-page-entry-header">
		<?php
			if(get_theme_mod('onde-site-title-font')) {
				$font = get_theme_mod('onde-site-title-font','Marcellus');
			}
		if(!is_front_page()):
			the_title( '<h1 class="entry-title .title" style="font-family:'. $font . ';">', '</h1>' );
		endif;
		 ?>
	</header><!-- .entry-header -->

	<?php onde_production_post_thumbnail(); ?>

	<div class="onde-front-page-entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="onde-front-page-entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'onde-production' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
