<?php
/*
Plugin Name: Custom Login Page Customizer
Plugin URI: https://themeisle.com/plugins/login-customizer/
Description: Custom Login Customizer plugin allows you to easily customize your login page straight from your WordPress Customizer! Awesome, right?
Author: Hardeep Asrani
Author URI:  https://themeisle.com/
Version: 1.0.1
*/

include( plugin_dir_path( __FILE__ ) . 'customizer.php');
include( plugin_dir_path( __FILE__ ) . 'option-panel.php');
define("LOGINCUST_VERSION","1.0.1");
define("LOGINCUST_TEXTDOMAIN","login-customizer");

?>