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
add_action('widgets_init', 'smoothandsilky_widget_areas');
function smoothandsilky_widget_areas(){
	register_sidebar(array(
		'name'			=>	'Blog Sidebar',
		'id'			=>	'blog-sidebar',
		'description'	=>	'Appears on the blog posts and individual posts pages.',
		'before_widget'	=>	'<section id="%1$s" class="blog-widgets %2$s">',
		'after_widget'	=>	'</section>',
	));
	register_sidebar(array(
		'name'			=>	'Widgets Sidebar',
		'id'			=>	'widgets-sidebar',
		'description'	=>	'Appears on the pages that are set to use the default template.',
		'before_widget'	=>	'<section id="%1$s" class="page-widgets %2$s">',
		'after_widget'	=>	'</section>',
	));
	register_sidebar(array(
		'name'			=>	'Footer Widgets',
		'id'			=>	'footer-widgets',
		'description'	=>	'Appears in the footer of the website. Looks best with 4 or less widgets.',
		'before_widget'	=>	'<section id="%1$s" class="footer-widgets %2$s">',
		'after_widget'	=>	'</section>',
	));
	register_sidebar(array(
		'name'			=>	'Footer Widgets 2',
		'id'			=>	'footer-widgets-2',
		'description'	=>	'Appears in the footer of the website. Another line for widgets under the first. Also looks best with 4 or less widgets.',
		'before_widget'	=>	'<section id="%1$s" class="footer-widgets-2 %2$s">',
		'after_widget'	=>	'</section>',
	));
}