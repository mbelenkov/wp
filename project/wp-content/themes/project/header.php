<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo esc_url( get_stylesheet_directory_uri() ) ?>/styles/normalize.css" />
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>

<body>
<div class="wrapper">
<header role="banner" id="header">
  <h1 class="site-title"><a href="path/to/frontpage">SITE NAME</a></h1>
  <h2>SITE DESCRIPTION</h2>
  <nav>
    <ul class="nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Gallery</a></li>
      <li><a href="#">Blog</a></li>
    </ul>
  </nav>

  <form method="get" action="SEARCH_PARSER">
    <label>Search for:</label>
    <input type="text" />
    <input type="submit" value="Search" />
  </form>
</header>