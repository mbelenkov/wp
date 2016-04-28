<?php
add_editor_style();
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

add_action('init', 'smoothandsilky_menu_locations');
function smoothandsilky_menu_locations(){
	register_nav_menus(array(
		'main_menu'			=>	'Main Menu',
	));
}
function smoothandsilky_fallback(){
	echo 'Go into the Wordpress admin and asiign a menu to the "Main Menu".';
}
function smoothandsilky_pagination(){
	?>
		<section class="blog-pagination">
	<?php
		if(is_singular()):
			previous_post_link('Older Post');
			next_post_link('Newer Post');
		elseif (function_exists('the_posts_pagination')):
			the_posts_pagination(array(
				'prev_text'			=>	'<',
				'next_text'			=>	'>',
				'mid_size'			=>	2
			));
		else:
			previous_posts_link('Newer Posts');
			next_posts_link('Older Posts');
		endif;
	?>
		</section>
	<?php
}