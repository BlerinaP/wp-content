<?php
function lapizzeria_styles(){
    // adding stylesheet( register stylesheet)
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css',array(), '8.0.0');
    wp_register_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.css',array(), ' 5.11.2');
    wp_register_style('style', get_template_directory_uri() . '/style.css',array('normalize'), '1.0');

    //Than we have to enqueue stylesheet that has been registered
    wp_enqueue_style('normalize');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts','lapizzeria_styles');

//Add menus
function lapizzeria_menus(){
  register_nav_menus(array(
     'header-menu' => __('Header Menu','lapizza'),
      'social-menu' => __('Social Menu','lapizza')
  ));
}
add_action('init','lapizzeria_menus');