<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Onde-production
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'onde-production' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content has-text-align-center">
				<p class="onde-404-message"><strong><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'onde-production' ); ?></strong></p>

					<?php
					get_search_form();
					?>
					<div class="widget-list-pages">
						<h2 class="widget-title"><?php esc_html_e( 'Pages', 'onde-production' ); ?></h2>
						<?php wp_list_pages(array(
							'depth' => 0,
							'title_li' => ''
						)); ?>
					</div>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'onde-production' ); ?></h2>
						<ul style="list-style-type:none;">
							<?php
							wp_list_categories(
								array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								)
							);
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$onde_production_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'onde-production' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$onde_production_archive_content" );
					the_widget( 'WP_Widget_Recent_Posts' );	
					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
