<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/styles/reset.css" />
  <?php wp_head(); ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
<header role="banner">
  <h1 class="site-title">
    <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" rel="home">
      <?php bloginfo('name'); ?>
    </a>
  </h1>
  <h2 class="site-description"><?php bloginfo('description'); ?></h2>

  <?php get_search_form(); ?>

  <?php
    wp_nav_menu(array(
      'theme_location'      =>  'main_menu',
      'fallback_cb'         =>  'smoothandsilky_fallback',
      'container'           =>  'nav',
      'menu_class'          =>  'nav'
    ));
  ?>
</header>