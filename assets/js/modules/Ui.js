/**
 * DOMElementsObject Wrapper
 */
export const Ui = {
    /**
     * FRONT PAGE SELECTED ELEMENTS FOR PARALLAX EFFECT 
     */
    //main container
    onde_front_page_parallax_container:document.querySelector('.parallax-container'),
    //slide  background
    onde_front_page_slides:document.querySelectorAll('.slide'),
    //content of the displayed post to calculate height of each background
    onde_front_page_content_post:document.querySelector('#front-page-content-post'),

    /**
     * Navigation DomElements
     */
    onde_navbar:document.querySelector('.main-navigation'),
    onde_site_branding:document.querySelector('.site-branding'),
    onde_menu_container:document.querySelector('.onde-menu-container'),
    onde_topbar:document.querySelector('.top-bar'),
    onde_header_image:document.querySelector('.header-image'),
    onde_main_content_wrapper:document.querySelector('.main-content-wrapper'),
    onde_menu_toggle_btn:document.querySelector('#main-menu-toggle'),
    onde_sub_menu_container:document.querySelector('#primary-menu .menu-item-has-children'),
    onde_sub_menu_arrow_btn:document.querySelectorAll('#primary-menu .sub-menu-arrow-btn'),
    /**
     * LEFT-SIDEBAR
     */

    /**
     * ELEMENTS FOR HEADER ANIMATION
     */

    onde_site_branding_animated_elements:document.querySelectorAll('.ml12'),



    /**
     * e-commerce btn qty add 
     */

    onde_wc_qty_btn:document.querySelectorAll('input.input-text.qty'),
    /**
     * cart updete btn
     */
    onde_wc_cart_update_btn:document.querySelector('button[name="update_cart"]'),
    /**
     * RESPONSIVE SECTION
     */

    onde_brakpoint_small : 600,
    onde_breakpoint_medium :1024,
    onde_brakpoint_large:1400,
    onde_brakpoint_huge:2000
}