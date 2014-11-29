/**
 * Contains functionality specific to this theme.
 * This is a set of functions that handle core theme parts.
 */

jQuery(document).ready(function(){

	/**
	 * Shows the content with nicer fade in animation if a browser supports it.
	 */
	jQuery('body').addClass('body-visible');
	 
	/**
	 * Adds has-submenu class to menu items that have submenus.
	 */
	jQuery('.nav-menu li').each(function(){
		if(jQuery(this).children('.sub-menu').length){ // children() gets direct children
			jQuery(this).addClass('has-submenu');
		}
	});
	
	/**
	 * Enable menu toggle for small screens.
	 */
	( function() {
		var nav = jQuery( '.site-navigation' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.menu-toggle' ).on( 'click', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();
});

/**
 * Handles compact header search.
 */
jQuery(document).ready(function(){
	jQuery('.compact-search').click(function(){
		jQuery('.header-search').css({ 'display' : 'block' });
		jQuery('.header-search .search-field').focus();
	});
	jQuery('.header-search').click(function(e){
		var target = e.target;

		while (target.nodeType != 1) target = target.parentNode;
		if(target.tagName != 'INPUT'){
			jQuery('.header-search').css({ 'display' : 'none' });
		}
	});
});