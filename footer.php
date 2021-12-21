<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onde-production
 */

?>

<footer id="colophon" class="site-footer">
	<div class="footer-widget">
		<div class="f-widget-container">
			<?php dynamic_sidebar('footer-widget'); ?>	
	</div>
	<?php
		wp_nav_menu(
            array(
                'theme_location' => 'menu-3',
                'menu_id'        => 'footer-menu',
                'container' => '',
            )
        );
	?>
	<div class="site-info">
		<?php
		$site_info = get_theme_mod('onde-site-info', '');
		if ($site_info) :
			$allowed = array('a' => array(
				'href' => array(),
				'title' => array()
			));
			echo wp_kses($site_info, $allowed);
		else :
			/* translators: 1: Theme name, 2: Theme author. */
			printf(esc_html__('Theme: %1$s by %2$s.', 'onde-production'), 'onde-production', '<a href="http://web-09.com" target="_blank">web-09 team</a>');
		endif;
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>

</html>