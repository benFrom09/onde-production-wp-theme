<?php
/**
 * Functions used to implement options
 *
 * @package onde-production
 */
/**
 * Enqueue Google Fonts Example
 */
function onde_production_add_theme_fonts_uri() {

	// Font options
    
	$fonts = array(
		get_theme_mod( 'onde-site-title-font','Marcellus'),
		get_theme_mod( 'onde-site-body-font','Titillium Web'),
		//get_theme_mod( 'onde-heading-font', 'Marcelus')
	);
    
	$font_uri = customizer_library_get_google_font_uri( $fonts );
	// Load Google Fonts
	wp_enqueue_style( 'onde_customizer_theme_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'onde_production_add_theme_fonts_uri' );