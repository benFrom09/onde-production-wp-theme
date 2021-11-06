<?php
/**
 * Implements styles set in the theme customizer
 *
 */
require __DIR__ . '/class/StyleBuilder.php';

if ( ! function_exists( 'onde_customizer_build_style' ) && class_exists( 'StyleBuilder' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function onde_customizer_build_style() {
	
	//if ( wp_is_mobile() ) {
	//	$mobile_menu_breakpoint = 10000000;
	//} else {
		$mobile_menu_breakpoint = 960;   
    
    // Site Title Font
    $font = 'onde-site-title-font';
    $default = 'Marcellus';
    $fontmod = get_theme_mod( $font,$default);
    $fontstack = customizer_library_get_font_stack( $fontmod );
    
    	StyleBuilder()->add( array(
    		'selectors' => array(
    			'h1'
	    	),
    		'declarations' => array(
    			'font-family' => $fontstack
    		)
    	) );  
}
endif;

add_action( 'customizer_build_style', 'onde_customizer_build_style' );

if ( ! function_exists( 'onde_customizer_build_style' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "StyleBuilder" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function onde_customizer_build_style() {

	do_action( 'customizer_build_style' );

	$css = StyleBuilder()->build();
    
	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"out-the-box-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'onde_customizer_build_style', 11 );