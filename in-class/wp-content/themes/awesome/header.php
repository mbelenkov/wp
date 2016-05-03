<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php 
	//Necessary in <head> for JS and plugins to work. 
	//I like it before style.css loads so the theme stylesheet is more specific than all others.
	wp_head();  ?>
</head>
<body <?php body_class(); ?>>	
	<div id="wrapper">
	<header role="banner">
		<?php
			if(function_exists('the_custom_logo')){
				the_custom_logo();
			} // don't forget to add theme support
		?>
		<div class="top-bar clearfix">
			<h1 class="site-name">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home"> 
					<?php bloginfo('name'); ?> 
				</a>
			</h1>
			<h2 class="site-description"> <?php bloginfo('description'); ?> </h2>
			<?php
				// don't forget to register menu locations in functions.php
				wp_nav_menu(array(
					'theme_location'	=>	'main_menu',
					'fallback_cb'		=>	'awesome_menu_fallback',	// turn off the fallback menu
					'container'			=>	'nav',	// wrap with <nav>
					'menu_class'		=>	'nav',	// <ul class="nav">
				));
			?>
		</div><!-- end .top-bar -->
		
			<?php
				// don't forget to register menu locations in functions.php
				wp_nav_menu(array(
					'theme_location'	=>	'utilities',	// registered in functions.php
					'fallback_cb'		=>	false,	// turn off the fallback menu
					'container'			=>	false,	// no container
					'menu_class'		=>	'utilities',	// <ul class="utilities">
				));
			?>
		<?php get_search_form(); //includes searchform.php if it exists, if not, this outputs the default search bar ?>	
	</header>
