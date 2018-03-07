<?php
/**
 * Customizer controls for Fields Section
 */

$wp_customize->add_section(
	'logincust_field_section', array(
		'priority' => 25,
		'title' => __( 'Fields', 'login-customizer' ),
		'panel'  => 'logincust_panel',
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_field_width]', array(
		'default' => '100%',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_html',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new O2_Customizer_Range_Slider_Control(
		$wp_customize, 'login_customizer_options[logincust_field_width]', array(
			'label' => __( 'Width', 'login-customizer' ),
			'section' => 'logincust_field_section',
			'priority' => 5,
			'settings' => 'login_customizer_options[logincust_field_width]',
			'choices' => array(
				'percent' => true,
			),
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 1000,
				'step'   => 1,
			),
		)
	)
	
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_field_margin]', array(
		'default' => '2px 6px 16px 0px',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_html',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new LoginCust_Padding_Control(
			$wp_customize, 'login_customizer_options[logincust_field_margin]', array(
			'label' => __( 'Margin', 'login-customizer' ),
			'section' => 'logincust_field_section',
			'priority' => 10,
			'settings' => 'login_customizer_options[logincust_field_margin]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_field_bg]', array(
		'default' => '#FFF',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_field_bg]', array(
			'label' => __( 'Background', 'login-customizer' ),
			'section' => 'logincust_field_section',
			'priority' => 15,
			'settings' => 'login_customizer_options[logincust_field_bg]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_field_color]', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_field_color]', array(
			'label' => __( 'Text Color', 'login-customizer' ),
			'section' => 'logincust_field_section',
			'priority' => 20,
			'settings' => 'login_customizer_options[logincust_field_color]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_field_label]', array(
		'default' => '#777',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_field_label]', array(
			'label' => __( 'Label Color', 'login-customizer' ),
			'section' => 'logincust_field_section',
			'priority' => 25,
			'settings' => 'login_customizer_options[logincust_field_label]',
		)
	)
);
