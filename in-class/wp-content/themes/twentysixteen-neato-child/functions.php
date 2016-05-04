<?php
/*
*	Child theme functions run before the parent theme's
*	Use this file to add, remove or modify parent functionality
*/

/*
*	Enqueue the parent's stylesheet (optional)
*/

add_action('wp_enqueue_scripts', 'neato_styles');
function neato_styles(){
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

/*
*	Add a widget area for the footer
*/
add_action('widgets_init', 'neato_widget_areas', 999);
function neato_widget_areas(){
	register_sidebar(array(
		'name'			=>	'Neato Footer',
		'id'			=>	'neato-footer',
		'before_widget'	=>	'<div id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</div>',
	));
}