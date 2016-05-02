<?php
/*
Plugin Name: Smooth and Silky Post Types Test
Description: Adds the "products" post type for a shop section so you can test archive-product.php, single-product.php, and taxonomys.
Author:	Maksim Belenkov
Author URI:	#
License: GPLv3
Version: 0.1
*/
add_action('init', 'smoothandsilky_register_cpt');
function smoothandsilky_register_cpt(){
	register_post_type('product', array(
		'public'			=>	true,
		'has_archive'		=>	true,
		'menu_position'		=>	25,
		'menu_icon'			=>	'dashicons-cart',
		'labels'			=>	array(
			'name'			=>	'Products',
			'singular_name'	=>	'Product',
			'not_found'		=>	'No products were found.',
			'add_new_item'	=>	'Add a new product!',
		),
		'supports'			=>	array(
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'excerpt',
		),
	));
}
function smoothandsilky_flush(){
	rad_register_cpt();
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'smoothandsilky_flush');