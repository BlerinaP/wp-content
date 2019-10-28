<?php
function lapizzeria_styles(){
    // adding stylesheet( register stylesheet)
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css',array(), '8.0.0');
    wp_register_style('googlefont','https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700,900&display=swap',array(),'1.0.0');
    wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css',array(), '4.7.0');
    wp_register_style('style', get_template_directory_uri() . '/style.css',array('normalize'), '1.0');

    //Than we have to enqueue stylesheet that has been registered
    wp_enqueue_style('normalize');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('style');
    wp_enqueue_style('googlefont');


    //adding scripts//
    wp_register_script('script',get_template_directory_uri() . '/js/scripts.js','1.0.0' ,true);

    //Than we have to enqueue java scripts files that has been registered//
    wp_enqueue_script('jquery');
    wp_enqueue_script('script');

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