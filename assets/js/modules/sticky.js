import { Ui } from './Ui';




/**
 * STICKY NAVBAR FUNCTION
 */
const { 
    onde_navbar, onde_site_branding, onde_header_image, 
    onde_breakpoint_medium,
    onde_site_branding_animated_elements } = Ui;

export function sticky_navbar() {
    let navbar_rect = onde_navbar.getBoundingClientRect();
   let site_branding_rect = onde_site_branding.getBoundingClientRect();
 
   onde_header_image.style.transition = 'height 0.6s ease';
 
 
 
   if (window.innerWidth > onde_breakpoint_medium) {
 
     if (navbar_rect.top < 0) {
       onde_navbar.style.position = 'fixed';
       onde_navbar.style.top = window.scrollY;
       onde_header_image.style.transition = 'none';
     }
     if (site_branding_rect.bottom > 0) {
       onde_navbar.style.position = 'static';
     }
   }
}