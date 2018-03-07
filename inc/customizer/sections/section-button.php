<?php
/**
 * Customizer controls for Button Section
 */

$wp_customize->add_section(
	'logincust_button_section', array(
		'priority' => 30,
		'title' => __( 'Button', 'login-customizer' ),
		'panel'  => 'logincust_panel',
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_bg]', array(
		'default' => '#2EA2CC',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_button_bg]', array(
			'label' => __( 'Background', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 5,
			'settings' => 'login_customizer_options[logincust_button_bg]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_hover_bg]', array(
		'default' => '#1E8CBE',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_button_hover_bg]', array(
			'label' => __( 'Background (Hover)', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 10,
			'settings' => 'login_customizer_options[logincust_button_hover_bg]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_color]', array(
		'default' => '#FFF',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_button_color]', array(
			'label' => __( 'Text Color', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 15,
			'settings' => 'login_customizer_options[logincust_button_color]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_padding]', array(
		'default' => '0 12px 2px',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_html',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new LoginCust_Padding_Control(
		$wp_customize, 'login_customizer_options[logincust_button_padding]', array(
			'label' => __( 'Padding', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 20,
			'settings' => 'login_customizer_options[logincust_button_padding]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_border_width]', array(
		'default' => '1px',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_html',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new O2_Customizer_Range_Slider_Control(
		$wp_customize, 'login_customizer_options[logincust_button_border_width]', array(
			'label' => __( 'Border Width', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 25,
			'settings' => 'login_customizer_options[logincust_button_border_width]',
			'choices' => array(
				'percent' => false,
			),
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 20,
				'step'   => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_border_radius]', array(
		'default' => '3px',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_html',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new O2_Customizer_Range_Slider_Control(
		$wp_customize, 'login_customizer_options[logincust_button_border_radius]', array(
			'label' => __( 'Border Radius', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 30,
			'settings' => 'login_customizer_options[logincust_button_border_radius]',
			'choices' => array(
				'percent' => false,
			),
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 100,
				'step'   => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_border]', array(
		'default' => '#0074A2',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_button_border]', array(
			'label' => __( 'Border', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 35,
			'settings' => 'login_customizer_options[logincust_button_border]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_hover_border]', array(
		'default' => '#0074A2',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_button_hover_border]', array(
			'label' => __( 'Border (Hover)', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 40,
			'settings' => 'login_customizer_options[logincust_button_hover_border]',
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_shadow_spread]', array(
		'default' => '0px',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_html',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new O2_Customizer_Range_Slider_Control(
		$wp_customize, 'login_customizer_options[logincust_button_shadow_spread]', array(
			'label' => __( 'Shadow Spread', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 45,
			'settings' => 'login_customizer_options[logincust_button_shadow_spread]',
			'choices' => array(
				'percent' => false,
			),
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 50,
				'step'   => 1,
			),
		)
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_button_shadow]', array(
		'default' => '#78C8E6',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	)
);

$wp_customize->add_control(
	new LoginCust_Customize_Alpha_Color_Control(
		$wp_customize, 'login_customizer_options[logincust_button_shadow]', array(
			'label' => __( 'Box Shadow', 'login-customizer' ),
			'section' => 'logincust_button_section',
			'priority' => 50,
			'settings' => 'login_customizer_options[logincust_button_shadow]',
		)
	)
);
