<?php
/*
Plugin Name: Rad Post Types
Description: Adds the "products" post type for the shop section.
Author: Maksim Belenkov
Author URI: http://www.belenkovdesign.com
License: GPLv3
Version: 0.1
*/
add_action('init', 'rad_register_cpt');
function rad_register_cpt(){
	register_post_type('product', array(
		'public'			=>	true,	// so users can see the products
		'has_archive'		=>	true,	// so we can have all products on one page
		'menu_position'		=>	5,
		'menu_icon'			=>	'dashicons-cart',
		'supports'			=>	array(
				'title',
				'editor',
				'thumbnail',
				'custom-fields',
				'revisions',
				'excerpt'
			),
		'labels'			=>	array(
				'name'				=>	'Products',
				'singular_name'		=>	'Product',
				'not_found'			=>	'No Products Found',
				'add_new_item'		=>	'Add New Product',
				// 'menu_name'			=>	'Shop',
			),
	));
	// register the "brand" taxonomy
	register_taxonomy('brand', 'product', array(
		'hierarchical'			=>	true,
		'show_admin_column'		=>	true,
		'labels'				=>	array(
				'name'			=>	'Brands',
				'singular_name'	=>	'Brand',
				'add_new_item'	=>	'Add Brand',
				'search_items'	=>	'Search Brands',
				'not_found'		=>	'No Categories Found',
			),

	));
	// register "features" taxonomy
	register_taxonomy('feature', 'product', array(
		'show_admin_column'	=>	true,
		'labels'			=>	array(
				'name'			=>	'Features',
				'singular_name'	=>	'Feature',
				'add_new_item'	=>	'Add Features',
				'search_items'	=>	'Search Features',
				'not_found'		=>	'Feature not found',
			),
	));
}

/*
*	Flush permalinks when this plugin is activated
*	Prevent 404 errors when viewing CPTs
*/
function rad_flush(){
	rad_register_cpt();
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'rad_flush');

// No close PHP