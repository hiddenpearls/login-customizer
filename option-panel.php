<?php
function logincust_register_options_page() {
	add_theme_page( __( 'Login Customizer', 'login-customizer' ), __( 'Login Customizer', 'login-customizer' ), 'manage_options', 'logincust_options', 'logincust_options_page' );
}
add_action( 'admin_menu', 'logincust_register_options_page' );

function logincust_admin_style() {
	wp_enqueue_style( 'admin_style', LOGINCUST_FREE_URL . '/css/admin.css', array(), LOGINCUST_VERSION, false );
}
add_action( 'admin_enqueue_scripts', 'logincust_admin_style' );


function logincust_options_page() {
	?>
<div class="wrap">
	<div id="logincust-logo"></div>
	<h2><?php _e( 'Login Customizer', 'login-customizer' ); ?></h2>
	<h3><?php _e( 'Howdy!', 'login-customizer' ); ?></h3>
	<p><?php _e( 'Login Customizer plugin allows you to easily customize your login page straight from your WordPress Customizer! You can preview your changes before you save them! Awesome, right?', 'login-customizer' ); ?></p>
	<p><?php _e( 'In Customizer, navigate to Login Customizer', 'login-customizer' ); ?>.</p>
	<a href="<?php echo get_admin_url(); ?>customize.php?url=<?php echo wp_login_url(); ?>" id="submit" class="button button-primary"><?php _e( 'Start Customizing!', 'login-customizer' ); ?></a>
	<h3><?php _e( 'Credits/Support (All the unwanted crap)', 'login-customizer' ); ?></h3>
	<p><?php _e( 'If you find any issues or if you want to contribute, then please free to drop me a mail at', 'login-customizer' ); ?> <a href="https://themeisle.com/contact" target="_blank" rel="nofollow"><?php _e( 'this link', 'login-customizer' ); ?></a>.</p>
	<p><?php _e( 'Thanks for using this plugin. Don not forget to leave a review.', 'login-customizer' ); ?></p>
	<p> <a href="https://themeisle.com/" target="_blank" rel="nofollow"><?php _e( 'ThemeIsle :)', 'login-customizer' ); ?></a>.</p>

	<h3><?php _e( 'Subscribe', 'login-customizer' ); ?></h3>
	<?php
	if ( ! empty( $_POST['logincust_mail'] ) ) {
		require( LOGINCUST_FREE_PATH . 'mailin.php' );
		$was_submited = get_option( 'mail_was_submited', false );
		$user_info = get_userdata( 1 );
		$mailin = new Mailin( 'https://api.sendinblue.com/v2.0', 'cHW5sxZnzE7mhaYb' );
		$data = array(
			'email' => $_POST['logincust_mail'],
			'attributes' => array('NAME' => $user_info->first_name, 'SURNAME' => $user_info->last_name),
			'blacklisted' => 0,
			'listid' => array(34),
			'blacklisted_sms' => 0,
		);
		$status = $mailin->create_update_user( $data );
		if ( $status['code'] == 'success' ) {
			if ( empty( $was_submited ) ) {
					add_option( 'logincust_mail_was_submited', true );
			}
		}
	}

	  $was_submited = get_option( 'logincust_mail_was_submited', false );
	if ( $was_submited == false ) {
		echo sprintf( '<p> %s </p><form class="logincust-submit-mail" method="post"><input name="logincust_mail" type="email" class="wp-pointer-input" value="' . get_option( 'admin_email' ) . '" /><input class="button wp-pointer-submit button-primary" type="submit" value="Join Now !"></form>', esc_html__( 'Our free, 4-lesson course on how to make your WordPress site run incredibly fast is barely waiting for its students. Ready to learn how to reduce your loading times by half? Come and join the 1st lesson here!', 'login-customizer' ) );
	} else {
		echo sprintf( '<p> %s </p>', esc_html__( 'Thank you for subscribing! You have been added to the mailing list and will receive the next email information in the coming weeks. If you ever wish to unsubscribe, simply use the  Unsubscribe  link included in each newsletter.', 'login-customizer' ) );
	}
		?>
</div>
<?php
}


function logincust_dashboard_widget() {
	wp_add_dashboard_widget( 'logincust_subscribe_widget', __( 'Subscribe', 'login-customizer' ), 'logincust_subscribe_widget' );
}
add_action( 'wp_dashboard_setup', 'logincust_dashboard_widget' );

function logincust_subscribe_widget() {
	if ( ! empty( $_POST['logincust_mail'] ) ) {
		require( LOGINCUST_FREE_PATH . 'mailin.php' );
		$was_submited = get_option( 'logincust_mail_was_submited', false );
		$user_info = get_userdata( 1 );
		$mailin = new Mailin( 'https://api.sendinblue.com/v2.0', 'cHW5sxZnzE7mhaYb' );
		$data = array(
			'email' => $_POST['logincust_mail'],
			'attributes' => array('NAME' => $user_info->first_name, 'SURNAME' => $user_info->last_name),
			'blacklisted' => 0,
			'listid' => array(34),
			'blacklisted_sms' => 0,
		);
		$status = $mailin->create_update_user( $data );
		if ( $status['code'] == 'success' ) {
			if ( empty( $was_submited ) ) {
				add_option( 'logincust_mail_was_submited', true );
			}
		}
	}

	$was_submited = get_option( 'logincust_mail_was_submited', false );
	if ( $was_submited == false ) {
		echo sprintf( '<p> %s </p><form class="logincust-submit-mail" method="post"><input name="logincust_mail" type="email" class="wp-pointer-input" value="' . get_option( 'admin_email' ) . '" /><input class="button wp-pointer-submit" type="submit" value="Submit"></form>', esc_html__( 'Our free, 4-lesson course on how to make your WordPress site run incredibly fast is barely waiting for its students. Ready to learn how to reduce your loading times by half? Come and join the 1st lesson here!', 'login-customizer' ) );
	} else {
		echo sprintf( '<p> %s </p>', esc_html__( 'Thank you for subscribing! You have been added to the mailing list and will receive the next email information in the coming weeks. If you ever wish to unsubscribe, simply use the Unsubscribe link included in each newsletter.', 'login-customizer' ) );
	}
}
