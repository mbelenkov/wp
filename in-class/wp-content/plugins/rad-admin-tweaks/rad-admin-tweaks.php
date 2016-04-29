<?php
/*
Plugin Name: Rad Admin Tweaks
Description: Customizes the login/register forms and admin panel
Plugin URI: http://#
Author: Maksim Belenkov
Author URI: http://#
Version: 0.1
License: GPL2
*/

/**
*	Custom CSS for the login/register form
*/
add_action('login_enqueue_scripts', 'rad_login_css');
function rad_login_css(){
	// get the URL of the css file
	$url = plugins_url('rad-login.css', __FILE__);
	// enqueue it
	wp_enqueue_style('rad-login-css', $url);
}
/**
*	Change the behavior of the login logo link
*/
add_filter('login_headerurl', 'rad_login_href');
function rad_login_href(){
	return home_url(); // any URL you want
}
add_filter('login_headertitle', 'rad_login_title');
function rad_login_title(){
	return 'Go back to ' . get_bloginfo('name');
}
/**
*	Remove the WP node from the toolbar
*	@link https://codex.wordpress.org/toolbar
*/
add_action('admin_bar_menu', 'rad_toolbar', 999);
function rad_toolbar($wp_admin_bar){
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->add_node(array(
		'id'			=>	'contact-me',
		'title'			=>	'<span class="ab-icon dashicons dashicons-email"></span>Contact Me',
		'href'			=>	'http://www.google.com/',
		'parent'		=>	'top-secondary',
	));
}
/**
*	Customize the admin dashboard panels
*/
add_action('wp_dashboard_setup', 'rad_dashboard');
function rad_dashboard(){
	// remove quick press
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	// wordpress news
	remove_meta_box('dashboard_primary', 'dashboard', 'side');
	// add a custom "help" box
	wp_add_dashboard_widget('dashboard_help', 'Get Help', 'rad_widget_content');
}
function rad_widget_content(){
	echo '<p>Check out this helpful video:</p> <iframe width="300" height="200" src="https://www.youtube.com/embed/SD7MjqOU1tQ" frameborder="0" allowfullscreen></iframe>';
}
// no close PHP