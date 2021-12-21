<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Onde-production
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<style>
		h1,h2 {
			font-family:<?= get_theme_mod('onde-site-title-font','Marcellus');?>;
		}
		.menu-item a {
			font-family:<?= get_theme_mod('onde-site-title-font','Marcellus');?>;
		}
	</style>
</head>
<?php
if (get_theme_mod('onde-site-body-font')) {
	$bodyFont = get_theme_mod('onde-site-body-font', 'Titillium Web');
}
?>

<body <?php body_class();?> style="font-family:<?= $bodyFont; ?>">
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'onde-production'); ?></a>
	
<?php get_template_part('template-parts/header/header'); ?>