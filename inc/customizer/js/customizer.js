jQuery( document ).ready( function( $ ) {

	$( '<li class="accordion-section control-section control-section-default control-subsection"><h4 class="accordion-section-title"><a href="https://wordpress.org/support/plugin/login-customizer/reviews/#new-post" target="_blank">Like our plugin? Leave a review here!</a></h4></li><li style="padding: 10px; text-align: center;">Made with ❤ by <a href="https://themeisle.com/" target="_blank">ThemeIsle</a></li>' ).appendTo( '#sub-accordion-panel-logincust_panel' );

	if ( wp.customize( 'login_customizer_options[logincust_bg_image]' )._value === '' ) {
		jQuery( '#customize-control-login_customizer_options-logincust_bg_image_size' ).hide();
		jQuery( '#customize-control-login_customizer_options-logincust_bg_size' ).hide();
		jQuery( '#customize-control-login_customizer_options-logincust_bg_image_repeat' ).hide();
		jQuery( '#customize-control-login_customizer_options-logincust_bg_image_position' ).hide();
	}

	if ( wp.customize( 'login_customizer_options[logincust_bg_image_size]' )._value !== 'custom' ) {
		jQuery( '#customize-control-login_customizer_options-logincust_bg_size' ).hide();
	}

	if ( wp.customize( 'login_customizer_options[logincust_logo_show]' )._value === true ) {
		jQuery( '#customize-control-login_customizer_options-logincust_logo' ).hide();
		jQuery( '#customize-control-login_customizer_options-logincust_logo_width' ).hide();
		jQuery( '#customize-control-login_customizer_options-logincust_logo_height' ).hide();
		jQuery( '#customize-control-login_customizer_options-logincust_logo_padding' ).hide();
		jQuery( '#customize-control-login_customizer_options-logincust_logo_link' ).hide();
	} else {
		jQuery( '#customize-control-login_customizer_options-logincust_logo' ).show();
		jQuery( '#customize-control-login_customizer_options-logincust_logo_width' ).show();
		jQuery( '#customize-control-login_customizer_options-logincust_logo_height' ).show();
		jQuery( '#customize-control-login_customizer_options-logincust_logo_padding' ).show();
		jQuery( '#customize-control-login_customizer_options-logincust_logo_link' ).show();
	}

	if ( wp.customize( 'login_customizer_options[logincust_button_border_width]' )._value === '0px' ) {
		jQuery( '#customize-control-login_customizer_options-logincust_button_border' ).hide();
		jQuery( '#customize-control-login_customizer_options-logincust_button_hover_border' ).hide();
	}

	/*
	 * Detect when the Login Customizer panel is expanded (or closed) so we can preview the login form easily.
	 * Source: Login Designer
	*/
	wp.customize.panel( 'logincust_panel', function( section ) {
		section.expanded.bind( function( isExpanding ) {

			// Value of isExpanding will = true if you're entering the section, false if you're leaving it.
			if ( isExpanding ) {

				// Only send the previewer to the login designer page, if we're not already on it.
				var current_url = wp.customize.previewer.previewUrl();
				var current_url = current_url.includes( logincust_script.page );

				if ( ! current_url ) {
					wp.customize.previewer.send( 'logincust-url-switcher', { expanded: isExpanding } );
				}

			} else {
				// Head back to the home page, if we leave the Login Designer panel.
				wp.customize.previewer.send( 'logincust-back-to-home', { home_url: wp.customize.settings.url.home } );
				url = wp.customize.settings.url.home;
			}
		});
	});

	wp.customize( 'login_customizer_options[logincust_bg_image]', function( setting ) {
		setting.bind( function( value ) {
			if ( value === '' ) {
				jQuery( '#customize-control-login_customizer_options-logincust_bg_image_size' ).hide();
				jQuery( '#customize-control-login_customizer_options-logincust_bg_size' ).hide();
				jQuery( '#customize-control-login_customizer_options-logincust_bg_image_repeat' ).hide();
				jQuery( '#customize-control-login_customizer_options-logincust_bg_image_position' ).hide();
			} else {
				jQuery( '#customize-control-login_customizer_options-logincust_bg_image_size' ).show();
				if ( wp.customize( 'login_customizer_options[logincust_bg_image_size]' )._value === 'custom' ) {
					jQuery( '#customize-control-login_customizer_options-logincust_bg_size' ).show();
				}
				jQuery( '#customize-control-login_customizer_options-logincust_bg_image_repeat' ).show();
				jQuery( '#customize-control-login_customizer_options-logincust_bg_image_position' ).show();
			}
		});
	});

	wp.customize( 'login_customizer_options[logincust_bg_image_size]', function( setting ) {
		setting.bind( function( value ) {
			if ( value === 'custom' ) {
				jQuery( '#customize-control-login_customizer_options-logincust_bg_size' ).show();
			} else {
				jQuery( '#customize-control-login_customizer_options-logincust_bg_size' ).hide();
			}
		});
	});

	wp.customize( 'login_customizer_options[logincust_logo_show]', function( setting ) {
		setting.bind( function( value ) {
			if ( value === true ) {
				jQuery( '#customize-control-login_customizer_options-logincust_logo' ).hide();
				jQuery( '#customize-control-login_customizer_options-logincust_logo_width' ).hide();
				jQuery( '#customize-control-login_customizer_options-logincust_logo_height' ).hide();
				jQuery( '#customize-control-login_customizer_options-logincust_logo_padding' ).hide();
				jQuery( '#customize-control-login_customizer_options-logincust_logo_link' ).hide();
			} else {
				jQuery( '#customize-control-login_customizer_options-logincust_logo' ).show();
				jQuery( '#customize-control-login_customizer_options-logincust_logo_width' ).show();
				jQuery( '#customize-control-login_customizer_options-logincust_logo_height' ).show();
				jQuery( '#customize-control-login_customizer_options-logincust_logo_padding' ).show();
				jQuery( '#customize-control-login_customizer_options-logincust_logo_link' ).show();
			}
		});
	});

	wp.customize( 'login_customizer_options[logincust_button_border_width]', function( setting ) {
		setting.bind( function( value ) {
			if ( value !== '0px' ) {
				jQuery( '#customize-control-login_customizer_options-logincust_button_border' ).show();
				jQuery( '#customize-control-login_customizer_options-logincust_button_hover_border' ).show();
			} else {
				jQuery( '#customize-control-login_customizer_options-logincust_button_border' ).hide();
				jQuery( '#customize-control-login_customizer_options-logincust_button_hover_border' ).hide();
			}
		});
	});

});