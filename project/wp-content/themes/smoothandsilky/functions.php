<?php
add_editor_style();
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('quote', 'image', 'gallery', 'video', 'link', 'audio', 'chat', 'status', 'aside'));
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
add_theme_support('title-tag');

add_action('wp_enqueue_scripts', 'smoothandsilky_styles');
function smoothandsilky_styles(){
	wp_enqueue_style('smoothandsilky_reset', get_stylesheet_directory_uri() . '/styles/reset.css');
	wp_enqueue_style('smoothandsilky_fonts', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');
	wp_enqueue_style('smoothandsilky_css', get_stylesheet_uri());
	wp_enqueue_style('smoothandsilky_lightbox', get_stylesheet_directory_uri() . '/styles/lightbox.css');
}
add_action('wp_enqueue_scripts', 'smoothandsilky_scripts');
function smoothandsilky_scripts(){
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '2.8.2', true );
}

add_action('init', 'smoothandsilky_menu_locations');
function smoothandsilky_menu_locations(){
	register_nav_menus(array(
		'main_menu'			=>	'Main Menu',
	));
}

function smoothandsilky_fallback(){
	echo 'Go into the Wordpress admin and assign a menu to the "Main Menu".';
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

function smoothandsilky_comment_ux(){
	if(is_singular() && get_option('thread_comments') && comments_open()):
		wp_enqueue_script('comment-reply');
	endif;
}
add_action('wp_enqueue_scripts', 'smoothandsilky_comment_ux');

add_filter('the_content', 'add_lightbox_rel');
function add_lightbox_rel($content){
	global $post;
	$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
  	$replacement = '<a$1rel="lightbox[%LIGHTID%]" href=$2$3.$4$5$6</a>';
    $content = preg_replace($pattern, $replacement, $content);
	$content = str_replace("%LIGHTID%", $post->ID, $content);
    return $content;
}