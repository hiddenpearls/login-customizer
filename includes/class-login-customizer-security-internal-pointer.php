<?php
add_action( 'admin_enqueue_scripts', 'logincust_pointer_load', 1000 );

function logincust_pointer_load( $hook_suffix ) {
	$was_submited = false;
	if(!empty($_POST["logincust_mail"])){
		$was_submited == get_option( 'mail_was_submited', false);
		/*
		
		require( LOGINCUST_FREE_PATH . 'mailin.php' );
		$mailin = new Mailin("https://api.sendinblue.com/v2.0","cHW5sxZnzE7mhaYb"); 
		$email = $_POST["logincust_mail"];
		$attributes = array("NAME"=> $user_info->first_name , "SURNAME"=>$user_info->last_name); 
		$blacklisted = 0; 
		$listid = array(1,4,6); 
		$listid_unlink = array(2,5); 
		$blacklisted_sms = 0;
		echo '<pre>';
		var_dump($mailin->create_update_user($email,$attributes,$blacklisted,$listid,$listid_unlink,$blacklisted_sms));
		echo '</pre>';*/
		
		$user_info = get_userdata(1);
		require( LOGINCUST_FREE_PATH . 'mailin.php' );
		$mailin = new Mailin("https://api.sendinblue.com/v2.0","cHW5sxZnzE7mhaYb");
		$data = array( "email" => $_POST["logincust_mail"],
			"attributes" => array("NAME"=>$user_info->first_name, "SURNAME"=>$user_info->last_name),
			"blacklisted" => 0,
			"listid" => array(34),
			"blacklisted_sms" => 0
		);

		$status =  $mailin->create_update_user($data);
		if($status['code'] == 'success'){
			if(empty($was_submited)){
				add_option( 'mail_was_submited', true);
			}
		}
	}
	
	// Don't run on WP < 3.3
	if ( get_bloginfo( 'version' ) < '3.3' )
		return;


	// Get pointers for this screen
	$pointers = apply_filters( 'logincust_admin_pointers', array() );

	if ( ! $pointers || ! is_array( $pointers ) )
		return;

	// Get dismissed pointers
	$dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
	$valid_pointers =array();
	// Check pointers and remove dismissed ones.
	foreach ( $pointers as $pointer_id => $pointer ) {

		// Sanity check
		if ( in_array( $pointer_id, $dismissed ) || empty( $pointer )  || empty( $pointer_id ) || empty( $pointer['target'] ) || empty( $pointer['options'] ) )
			continue;

		$pointer['pointer_id'] = $pointer_id;

		// Add the pointer to $valid_pointers array
		$valid_pointers['pointers'][] =  $pointer;
	}

	// No valid pointers? Stop here.
	if ( empty( $valid_pointers ) )
		return;

	// Add pointers style to queue.
	wp_enqueue_style( 'wp-pointer' );

	// Add pointers script to queue. Add custom script.
	wp_enqueue_script( 'logincust-pointer', LOGINCUST_FREE_URL."js/logincust_pointer.js", array( 'wp-pointer' ) );

	// Add pointer options to script.
	wp_localize_script( 'logincust-pointer', 'logincust', $valid_pointers );
}

add_filter( 'logincust_admin_pointers', 'logincust_register_pointer_security' );
function logincust_register_pointer_security( $p ) {
	$was_submited = get_option( 'mail_was_submited', false );
	$p['logincustsecurity'] = array(
		'target' => '#menu-appearance',
		'options' => array(
			'content' => 
			($was_submited == false ? sprintf( '<h3> %s </h3> <p> %s </p><form class="logincust-submit-mail" method="post"><input name="logincust_mail" type="email" class="wp-pointer-input" value="'.get_option( 'admin_email' ) .'" /><input class="button wp-pointer-submit" type="submit" value="Submit"></form>',
				__( 'Congratulations!' ,'login-customizer'),
				__( 'You\'ve just installed Custom Login Page Customizer! Start by submitting the administrator email address to receive cool tips about how to customize your admin page.','login-customizer')
			) : sprintf( '<h3> %s </h3> <p> %s </p>',
				__( 'Thank You For Subscribing!' ,'login-customizer'),
				__( 'You have now been added to the mailing list and will receive the next email information in the coming weeks. If you ever wish to unsubscribe, simply use the “Unsubscribe” link included in each newsletter. Click Dismiss to close this.','login-customizer')
			)),
			'position' => array( 'edge' => 'top', 'align' => 'middle' )
		)
	);
	return $p;
}