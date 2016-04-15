<?php 
/*
use this file to activate or create any functionality 
that is related to look & feel. 
WordPress will automatically load it before all template files
 */

//activate "sleeping features"
add_theme_support('post-thumbnails');

// allows you to style different kinds of posts differently
add_theme_support('post-formats', array('quote', 'image', 'gallery', 'video', 'link', 'audio', 'chat', 'status', 'aside'));

add_theme_support('custom-background');

add_theme_support('custom-logo', array(
				  'height' => 80,
				  'width' => 324,
				  'flex-height' => false,
				  'flex-width' => false,
				  ));

add_theme_support('automatic-feed-links');

add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

// don't forget to remove the <title> tag from header.php
add_theme_support('title-tag');

/**
 * special image size for the front page banner
 *	don't forget to use the plugin "force regenerate thumbnails"
 *	after creating or changing image sizes. 
 *
 *					name 		w 	h 	 crop?
 */
add_image_size( 'big-banner', 1050, 300, true );

/*
*	Make excerpts better!
*	Change the default length and [...]
*/
function awesome_ex_length(){
	return 30; // words
}
add_filter('excerpt_length', 'awesome_ex_length');
function awesome_readmore($more){
	return $more .  '<br><a href="' . get_permalink() . '" class="readmore">Keep Reading &hellip;</a>';
}
add_filter('excerpt_more', 'awesome_readmore');

/*
*	Make threaded comment replies more user friendly with JS
*/
function awesome_comment_ux(){
	if(is_singular() && get_option('thread_comments') && comments_open()){
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'awesome_comment_ux');

//no close PHP