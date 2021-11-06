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
    onde_navbar:document.querySelector('#site-navigation'),
    onde_site_branding:document.querySelector('.site-branding'),
    onde_topbar:document.querySelector('.top-bar'),
    onde_header_image:document.querySelector('.header-image'),
    onde_main_content_wrapper:document.querySelector('.main-content-wrapper'),

    /**
     * LEFT-SIDEBAR
     */

    onde_open_sidebar_btn:document.querySelector('#open-sidebar-btn'),
    onde_sticky_sidebar_trigger:document.querySelector('.widgets-icons'),
    onde_sidebar:document.querySelector('.sidebar'),
    onde_sidebar_close_btn:document.querySelector('#sidebar-close-btn'),
    /**
     * ELEMENTS FOR HEADER ANIMATION
     */

    onde_site_branding_animated_elements:document.querySelectorAll('.ml12'),

    /**
     * RESPONSIVE SECTION
     */

    onde_brakpoint_small : 600,
    onde_breakpoint_medium :1024,
    onde_brakpoint_large:1400,
    onde_brakpoint_huge:2000
}