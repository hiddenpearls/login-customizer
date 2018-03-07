<?php
/**
 * Functions to customize login page
 */

 /**
 * Change login logo URL
 */
function logincust_login_logo_url() {
	// Get plugin options array
	$options = get_option( 'login_customizer_options' );

	// Return logo link option
	return esc_url( $options[ 'logincust_logo_link' ] );
}

// Hook to login_headerurl
add_filter( 'login_headerurl', 'logincust_login_logo_url' );

 /**
 * Change login logo title attribute
 */
function logincust_login_logo_url_title() {
	// Get blog title
	$title = get_bloginfo( 'name', 'display' );

	// Return blog title
	return $title;
}

// Hook to login_headertitle
add_filter( 'login_headertitle', 'logincust_login_logo_url_title' );
