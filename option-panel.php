<?php
function logincust_register_options_page() {
    add_theme_page(__('Login Customizer','login-customizer'), __('Login Customizer','login-customizer'), 'manage_options', 'logincust_options', 'logincust_options_page');
}
add_action('admin_menu', 'logincust_register_options_page');
 
function logincust_options_page() {
	?>
<div class="wrap">
	<h2><?php _e('Login Customizer', 'login-customizer'); ?></h2>
    <h3><?php _e('Howdy!', 'login-customizer'); ?></h3>
    <p><?php _e('Login Customizer plugin allows you to easily customize your login page straight from your WordPress Customizer! You can preview your changes before you save them! Awesome, right?', 'login-customizer'); ?></p>
    <p><?php _e('In Customizer, navigate to Login Customizer', 'login-customizer'); ?>.</p>
    <a href="<?php echo get_admin_url(); ?>customize.php?url=<?php echo wp_login_url(); ?>" id="submit" class="button button-primary"><?php _e('Start Customizing!', 'login-customizer'); ?></a>
    <h3><?php _e('Credits/Support (All the unwanted crap)', 'login-customizer'); ?></h3>
    <p><?php _e('If you find any issues or if you want to contribute, then please free to drop me a mail at', 'login-customizer'); ?> <a href="https://themeisle.com/contact" target="_blank" rel="nofollow"><?php _e('this link', 'login-customizer'); ?></a>.</p>
    <p><?php _e('Thanks for using this plugin. Don not forget to leave a review.', 'login-customizer'); ?></p>
    <p> <a href="https://themeisle.com/" target="_blank" rel="nofollow"><?php _e('ThemeIsle :)', 'login-customizer'); ?></a>.</p>
</div>
<?php
}
?>