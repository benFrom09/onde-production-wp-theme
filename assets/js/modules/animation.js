import anime from 'animejs/lib/anime.es.js';
import { Ui } from './Ui';

export function site_branding_animation() {
    const { onde_site_branding_animated_elements } = Ui;
    // Wrap every letter in a span
 onde_site_branding_animated_elements.forEach(el => {
    el.innerHTML = el.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
  
  
  });
  anime.timeline({ loop: false }).add({
    targets: '#front-page-content-post',
    opacity: [0, 1],
    easing: "easeInExpo",
    duration: 0,
    delay: (el, i) => 100 + 30 * i
  })
  
  anime.timeline({ loop: false }).add({
    targets: '.site-logo',
    opacity: [0, 1],
    easing: "easeInExpo",
    duration: 0,
    delay: (el, i) => 100 + 30 * i
  })
    .add({
      targets: '.ml12 .letter',
      translateX: [40, 0],
      translateZ: 0,
      opacity: [0, 1],
      easing: "easeOutExpo",
      duration: 3000,
      delay: (el, i) => 500 + 30 * i
    });
}