<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
<header role="banner">
  <div class="top-header cf">
    <h1 class="site-title">
      <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" rel="home">
        <?php bloginfo('name'); ?>
      </a>
    </h1>
    <h2 class="site-description"><?php bloginfo('description'); ?></h2>

    <?php get_search_form(); ?>
  </div>

  <?php
    wp_nav_menu(array(
      'theme_location'      =>  'main_menu',
      'fallback_cb'         =>  'smoothandsilky_fallback',
      'container'           =>  'nav',
      'menu_class'          =>  'nav'
    ));
  ?>
</header>