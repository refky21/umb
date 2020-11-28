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

	//Update site background color...
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$('body, .slide-menu').css('background-color', newval );
		} );
	} );
	
	//Update site link color in real time...
	wp.customize( 'text_color', function( value ) {
		value.bind( function( newval ) {
			$('body, a').css('color', newval );
		} );
	} );

	// Header logo text color.
	wp.customize( 'site_identity_text_logo_first_color', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-brand h1').css('color', newval);
		} );
	} );
	wp.customize( 'site_identity_text_logo_second_color', function( value ) {
		value.bind( function( newval ) {
			$('.navbar-brand h1 > small').css('color', newval);
		} );
	} );
} )( jQuery );
