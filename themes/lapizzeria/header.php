<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>La Pizzeria</title>
    <?php wp_head(); ?>
</head>
<body>

<header class="site-header">
    <div class="logo">
        <a href="<?php echo esc_url(home_url('/') );?>">
          <img src="<?php echo get_template_directory_uri();?>/img/logo.svg" class="logoimage">
        </a>
    </div>
</header>
<div class="main-menu">
    <div class="navigation">
        <?php
        $args=array(
          'theme_location' => 'header-menu',
          'container' => 'nav',
          'container_class'=> 'site-nav'
        );
        wp_nav_menu($args);
        ?>
    </div>
</div>
