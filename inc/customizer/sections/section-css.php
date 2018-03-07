<?php
/**
 * Customizer controls for Custom CSS Section
 */

$wp_customize->add_section(
	'logincust_css_section', array(
		'priority' => 40,
		'title' => __( 'Custom CSS', 'login-customizer' ),
		'panel'  => 'logincust_panel',
	)
);

$wp_customize->add_setting(
	'login_customizer_options[logincust_other_css]', array(
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	)
);

$wp_customize->add_control(
	new WP_Customize_Code_Editor_Control(
		$wp_customize, 'login_customizer_options[logincust_other_css]', array(
			'label' => __( 'Custom CSS', 'login-customizer' ),
			'code_type' => 'text/css',
			'section' => 'logincust_css_section',
			'priority' => 5,
			'settings' => 'login_customizer_options[logincust_other_css]',
		)
	)
);
