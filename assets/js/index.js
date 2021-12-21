/**
 * IMPORT
 */
import '@fortawesome/fontawesome-free/css/all.css';
import '../css/app.css';
import { site_branding_animation } from './modules/animation';
import { parallaxBackgroundSize } from './modules/parallax.js';
import { Ui } from './modules/Ui.js';
import App from './modules/App';
/**
 * 
 */
(function () {

  document.addEventListener('DOMContentLoaded', () => {
    const app = new App(Ui);
    app.init();
    app.setState('parallax_slide', parallaxBackgroundSize());
    site_branding_animation();
    document.addEventListener('scroll', (e) => {
      app.update();
    });
    window.onresize = (e) => {
      app.update();
      parallaxBackgroundSize();

    }

  }); 

})();

