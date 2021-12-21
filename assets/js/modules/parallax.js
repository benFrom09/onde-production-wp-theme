/**
 *  front-page Parallax effect function
 */
import { Ui } from './Ui.js';

export function parallaxBackgroundSize() {
     const {onde_front_page_content_post,onde_front_page_slides, onde_front_page_parallax_container } = Ui;
     const size = {
         pos:{},
     };
    if(onde_front_page_content_post) {
        const height = onde_front_page_content_post.offsetHeight;
        let slide_height = Math.ceil(height / 3);
        let top = 0;
        onde_front_page_parallax_container.style.height = height + 'px';
        onde_front_page_slides.forEach((slide,k) => {
            slide.style.height = slide_height + 'px';
            slide.style.top = top + 'px';
            size.pos[`slide${k + 1}`] = top;
            size.slide_size = slide_height;
            top += slide_height ;
            
        });

    }
    return size;
}