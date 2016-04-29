(function($) {
    console.log("loading admin.js");
  wp.customize( 'logincust_bg_color', function( value ) {
      console.log("in logincust_bg_color");
    value.bind( function( to ) {
        console.log("in bind");
      $( 'html' ).css('background-color', to);
    } );
  } );
})( jQuery );