import { Ui } from './modules/Ui.js';

if(window.innerWidth < 1024) {
	Ui.onde_menu_container.style.transition = "all 0.4s ease-in-out";
}

Ui.onde_menu_toggle_btn.addEventListener('click',(e) => {

	Ui.onde_navbar.classList.toggle('toggled');
	document.body.classList.toggle('nav-opened');
	if ( Ui.onde_menu_container.getAttribute( 'aria-expanded' ) === 'true' ) {
		Ui.onde_menu_container.setAttribute( 'aria-expanded', 'false' );
		
	} else {
		
		Ui.onde_menu_container.setAttribute( 'aria-expanded', 'true' );

	}
});
// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
document.addEventListener( 'click', ( e ) => {
	const isClickInside = Ui.onde_menu_toggle_btn.contains( e.target );
	if ( ! isClickInside ) {
		Ui.onde_navbar.classList.remove( 'toggled' );
		
		Ui.onde_menu_container.setAttribute( 'aria-expanded', 'false' );
	}
} );
window.addEventListener('resize',(e) => {
	Ui.onde_menu_container.style.transition = "all 0.4s ease-in-out";
	if(window.innerWidth > 1024) {
		Ui.onde_menu_container.style.transition = "none";
		console.log(e);
		Ui.onde_navbar.classList.remove( 'toggled' );
		document.body.classList.remove('nav-opened');
	}
});