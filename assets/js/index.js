/**
 * IMPORT
 */
import '@fortawesome/fontawesome-free/css/all.css';
import '../css/app.css';
import './navigation.js';
import './front-page.js';
import { site_branding_animation } from './modules/animation';
import { sticky_navbar } from './modules/sticky.js';
import { parallaxBackgroundSize }  from './modules/parallax.js';
import { Ui } from './modules/Ui.js';
import App from './modules/App';
/**
 * 
 */
 (function(){
 
  const app = new App(Ui);
  app.init();


 document.addEventListener('DOMContentLoaded', () => {
  console.log("DOM entièrement chargé et analysé");
  app.setState('app_window_size',{width:window.innerWidth,height:window.innerHeight});
  app.setState('parallax_slide',parallaxBackgroundSize());
  console.log(app);
  site_branding_animation();
  sticky_navbar();
 });

 document.addEventListener('scroll', (e) => {
  app.setState('scrollY',window.scrollY);
   sticky_navbar();
 });

 window.onresize = (e) => {
  app.setState('app_window_size',{width:window.innerWidth,height:window.innerHeight});
  parallaxBackgroundSize();
 }

 })();

