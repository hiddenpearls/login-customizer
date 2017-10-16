/* global login_cust */
(function($) {
  wp.customize( login_cust.name, function( value ) {
    value.bind( function( to ) {
		$( 'html, body' ).css('background-color', to);
    } );
  } );
})( jQuery, login_cust );