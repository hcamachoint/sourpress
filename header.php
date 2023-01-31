<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow">
    <title><?php wp_title('•', true, 'right'); ?></title>
    <?php wp_head();?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <nav>
        <a href="/"><img class="logo_header" src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>"/></a>
      </nav>
    </header>
