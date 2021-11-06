/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	wp.customize('onde-site-info',function(value) {
		value.bind(function(to) {
			$('.site-info').text(to);
		})
	});

	
	// Header text color.
	wp.customize( 'header-textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	//header background-color
	wp.customize('onde-header-background',function(value) {
		value.bind(function(to) {
			
			$('.site-header').css('background-color',to);
		})
	});
	//navbar background color
	wp.customize('onde-navbar-background',function(value) {
		value.bind(function(to) {
			$('#site-navigation').css({backgroundColor:to});
			$('.onde-menu-container').css({backgroundColor:to});
		})
	});

	wp.customize('onde-top-bar-background',function(value) {
		value.bind(function(to) {
			$('.top-bar').css({backgroundColor:to});
		})
	});


}( jQuery) );
