<?php
/*
Plugin Name: Rad Announcement Bar
Plugin URI: http://support-website-for-this-plugin
Author: Maksim Belenkov
Author: URI: http://belenkovdesign.com
Version: 0.1
License: GPLv3
*/

/*
*	HTML output at the bottom of the page
*/
function rad_ab_output(){
	if(is_front_page() OR is_home()){
		$values = get_option('rad_ab');
	?>

	<div id="rad-announcement-bar">
		<h2><?php echo $values['bartext']; ?> <a href="<?php echo $values['url']; ?>" target="_blank">Click here!</a></h2>
	</div>

	<?php
} // end if front page
}
add_action('wp_footer', 'rad_ab_output');

/*
*	Attach the stylesheet
*	__FILE__ refers to the location of THIS file
*/
function rad_ab_css(){
	// absolute URL to the stylesheet
	$url = plugins_url('css/rad-ab.css', __FILE__);
	// put it on the page
	wp_enqueue_style('rad-ab-css', $url);
}
add_action('wp_enqueue_scripts', 'rad_ab_css');

/*
*	Bonus! Add settings to this plugin
*/
// ad a page to the admin panel for the settings
function rad_ab_page(){
	add_options_page('Announcement Bar Settings', 'Announcement Bar', 'manage_options', 'rad-bar', 'rad_ab_form');
}
add_action('admin_menu', 'rad_ab_page');

// callback function for the page content
function rad_ab_form(){
	require(plugin_dir_path(__FILE__) . 'admin-form.php');
}
// Create a group of settings that will be allowed in the options table
function rad_ab_setting(){
	register_setting('rad_ab_group', 'rad_ab', 'rad_ab_sanitize');
}
add_action('admin_init', 'rad_ab_setting');

// sanitizing function
function rad_ab_sanitize($dirty){
	// TODO: clean the dirty inputs!
	return $dirty;
}
//no close PHP