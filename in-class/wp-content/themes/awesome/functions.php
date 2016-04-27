<?php 
/*
use this file to activate or create any functionality 
that is related to look & feel. 
WordPress will automatically load it before all template files
 */

// max-width for automatic embeds. required by theme check. set it to the width of your main column at its widest
if(!isset($content_width)) $content_width = 690;

// allows you to style the text editor with editor-style.css
add_editor_style();

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
	return $more .  '<br><a href="' . get_permalink() . '" class="readmore">Read More</a>';
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

/*
*	Register two Menu Locations
*/
add_action('init', 'awesome_menu_locations');
function awesome_menu_locations(){
	register_nav_menus(array(
		'main_menu'	=>	'Main Menu',
		'utilities'	=>	'Utility area at the top',
	));
}
function awesome_menu_fallback(){
	echo 'Go into admin and assign a menu to the Main Menu.';
}

/*
*	Helper function to output pagination on any template
*/
function awesome_pagination(){
			?>
			<section class="pagination">
			<?php
				if(is_singular()){
					previous_post_link('%link', 'Older Post: %title');	//  1 older post
					next_post_link('%link', 'Newer Post: %title');		//  1 newer post
				// use newer numbered pagination if available (since 4.1)
				} else if(function_exists('the_posts_pagination')){
					the_posts_pagination(array(
						'prev_text'		=>	'&larr; Newer Posts',
						'next_text'		=>	'Older Posts &rarr;',
						'mid_size'		=>	2,
					));
				} else {
					previous_posts_link('&larr; Newer Posts');
					next_posts_link('Older Posts &rarr;');
				}
			?>
		</section>
		<?php
}

/*
*	Create widget areas (dynamic sidebars)
*/
add_action('widgets_init', 'awesome_widget_areas');
function awesome_widget_areas(){
	register_sidebar(array(
		'name'			=>	'Blog Sidebar',
		'id'			=>	'blog-sidebar',
		'description'	=>	'Appears alongside blog posts and archives.',
		'before_widget'	=>	'<section id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</section>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>'
	));
	register_sidebar(array(
		'name'			=>	'Footer Area',
		'id'			=>	'footer-area',
		'description'	=>	'Appears at the bottom of every screen.',
		'before_widget'	=>	'<section id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</section>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>'
	));
	register_sidebar(array(
		'name'			=>	'Home Area',
		'id'			=>	'home-area',
		'description'	=>	'Appears on the front page of the site.',
		'before_widget'	=>	'<section id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</section>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>'
	));
	register_sidebar(array(
		'name'			=>	'Page Area',
		'id'			=>	'page-area',
		'description'	=>	'Appears on the individual blog posts.',
		'before_widget'	=>	'<section id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</section>',
		'before_title'	=>	'<h3 class="widget-title">',
		'after_title'	=>	'</h3>'
	));
}

/**
*	Display a lovely list of any number of products
*	@param integer		$number 	the number of products to show
*	@param string 		$title 		the title above the list
*	@return mixed 					HTML outpout for the list and title
*/
function awesome_products($number = 6, $title){
	// custom query to get up to 6 products, newest first
	$product_query = new WP_Query(array(
		'post_type'			=>	'product', // custom post type we registered
		'posts_per_page'	=>	$number,
	));

	// custom loop
	if($product_query->have_posts()){
	?>
		<h2><?php echo $title; ?></h2>
		<ul class="latest-products">
			<?php
				while($product_query->have_posts()){
				$product_query->the_post();
			?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('thumbnail'); ?>
					<div class="product-info">
						<h3><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
					</div>
				</a>
			</li>
			<?php } // end while loop ?>
		</ul>
		<?php
			} else { // end if
				echo 'No Products Found';
			} // end else

			// clean up the $post object
			wp_reset_postdata();
			// end of custom query & loop
}

// just an example of how to alter the default loop
// this wil 'hide' posts in category number 5 from the blog
add_action('pre_get_posts', 'awesome_exclude_categories');
function awesome_exclude_categories($query){
	// make sure we're in the blog
	if($query->is_home()){
		$query->set('category__not_in', array(5));
	}
}
//no close PHP