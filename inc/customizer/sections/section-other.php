<?php
/**
 * Customizer controls for Other Section
 */

$wp_customize->add_section(
	'logincust_other_section', array(
		'priority' => 35,
		'title' => __( 'Other', 'login-customizer' ),
		'panel'  => 'logincust_panel',
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_other_color]', array(
		'default' => '#999',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_other_color]', array(
			'label' => __( 'Text Color', 'login-customizer' ),
			'section' => 'logincust_other_section',
			'priority' => 5,
			'settings' => 'login_customizer_options[logincust_other_color]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_other_color_hover]', array(
		'default' => '#2EA2CC',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_other_color_hover]', array(
			'label' => __( 'Text Color (Hover)', 'login-customizer' ),
			'section' => 'logincust_other_section',
			'priority' => 10,
			'settings' => 'login_customizer_options[logincust_other_color_hover]',
		)
	)
);
