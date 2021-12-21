<?php
/**
 * Onde-production Theme Customizer
 *
 * @package Onde-production
 */
require get_template_directory() . '/inc/fonts.php';
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function onde_production_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'onde_production_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'onde_production_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_setting('onde-show-logo',array(
		'default' => true,
		
	));

	$wp_customize->add_control('onde-show-logo',array(
		'type' => 'checkbox',
		'label' => esc_html__('Logo','onde-production'),
		'section' => 'title_tagline'
	));
	//add setting to customize background
	//header
	/*
	$wp_customize->add_setting('onde-header-background',array(
		'default' => '#FF9900',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'onde-header-background',[
        'section' =>'colors',
        'label' => esc_html__('Header color','onde-production'),

    ]));
	//Navbar
	$wp_customize->add_setting('onde-navbar-background',array(
		'default' => '#FF9900',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'onde-navbar-background',[
        'section' =>'colors',
        'label' => esc_html__('Navbar color','onde-production'),

    ]));

	$wp_customize->add_setting('onde-top-bar-background',array(
		'default' => '#FF9900',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'onde-top-bar-background',[
        'section' =>'colors',
        'label' => esc_html__('Topbar color','onde-production'),

    ]));

	//fonts colors
	$wp_customize->add_setting('onde-heading-color',array(
		'default' => '#3c434a',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'onde-heading-color',[
        'section' =>'colors',
        'label' => esc_html__('Heading font color','onde-production'),

    ]));

	$wp_customize->add_setting('onde-body-font-color',array(
		'default' => '#3c434a',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'onde-body-font-color',[
        'section' =>'colors',
        'label' => esc_html__('Body font color','onde-production'),

    ]));

	$wp_customize->add_setting('onde-font-menu-color',array(
		'default' => '#FFF',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'onde-font-menu-color',[
        'section' =>'colors',
        'label' => esc_html__('Menu font color','onde-production'),

    ]));

	$wp_customize->add_setting('onde-hover-font-menu-color',array(
		'default' => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'onde-hover-font-menu-color',[
        'section' =>'colors',
        'label' => esc_html__('Hover menu font color','onde-production'),

    ]));
	*/
	//add new sections 
	//footer
	$wp_customize->add_section('onde-footer-options',array(
		'title'=> esc_html__('Footer Options','onde-production'),
		'description' => esc_html__('You can change footer options from here','onde-production'),
		'priority' => 90
	));

	$wp_customize->add_setting('onde-site-info',array(
		'default' => '',
		'sanitize_callback' => 'onde_sanitize_site_info',
		'transport' =>'postMessage'
	));

	$wp_customize->add_control('onde-site-info',array(
		'type' => 'text',
		'label' => esc_html__('Site info','onde-production'),
		'section' => 'onde-footer-options'
	));
	//fonts
	$wp_customize->add_section('onde-fonts',
		array(
			'title'=> esc_html__('Fonts Options','onde-production'),
			'description' => esc_html__('Customize fonts of your web site','onde-production'),
			'priority' => 40
		)
	);
	$wp_customize->add_setting('onde-site-title-font',array(
		'default' => 'Marcellus',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' =>'refresh'
	));

	$font_choices = customizer_library_get_font_choices();

	$wp_customize->add_control('onde-site-title-font',array(
		'type' => 'select',
		'label' => esc_html__('Site title font','onde-production'),
		'section' => 'onde-fonts',
		'choices' => $font_choices
	));
	$wp_customize->add_setting('onde-site-body-font',array(
		'default' => 'Titillium Web',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' =>'refresh'
	));

	$wp_customize->add_control('onde-site-body-font',array(
		'type' => 'select',
		'label' => esc_html__('Site body font','onde-production'),
		'section' => 'onde-fonts',
		'choices' => $font_choices
	));

}
add_action( 'customize_register', 'onde_production_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function onde_production_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function onde_production_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function onde_production_customize_preview_js() {
	wp_enqueue_script( 'onde-production-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true);
}
add_action( 'customize_preview_init', 'onde_production_customize_preview_js' );

/**
 * 
 */
function onde_sanitize_site_info($input) {
	$allowed = array('a' => array(
		'href'=>array(),
		'title' => array()
	));
	return wp_kses($input,$allowed);
}