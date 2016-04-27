<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php wp_title(); ?></title>
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

  <?php get_search_form(); ?>

  <nav class="cf">
    <ul class="nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Gallery</a></li>
      <li><a href="#">Blog</a></li>
    </ul>
  </nav>
</header>