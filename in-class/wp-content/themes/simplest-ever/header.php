<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title>TODO: change this later</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
	<?php wp_head();//HOOK. required for the admin bar and plugins to work ?>
</head>
<body>
	<header role="banner" id="header">
	  <h1 class="site-title">
	  	<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
	  </h1>
	  <h2><?php bloginfo('description'); ?></h2>
	  <nav>
	    <ul class="nav">
			<?php
				// TODO: upgrade this to the "menu" system
				wp_list_pages(array(
					'title_li'	=> '',	// hide "pages" title
					'depth'		=> 1,	// only top level (parent) pages
				));
			?>
	    </ul>
	  </nav>

		<?php get_search_form(); // do the default search OR include searchform.php ?>
	</header>