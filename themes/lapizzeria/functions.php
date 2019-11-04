<?php

//Link or import the database.php file// ( this contains the SQL Structure)
require get_template_directory() . '/inc/database.php';

//Handles the submission to the database
require get_template_directory() . '/inc/reservation.php';

//Creates options pages for  the theme!
require get_template_directory() . '/inc/options.php';

//Add feature image
    function lapizzeria_setup(){
        add_theme_support('post-thumbnails');

        add_image_size('boxes', 437, 291, true);

        add_image_size('specialties', 768, 515, true);

        add_image_size('blogsize' , 500, 350, true);

        update_option('thumbnail_size_w', 253);

        update_option('thumbnail_size_h', 164);

        add_image_size('specialty_portrait' , 435, 530, true);

        add_theme_support('title-tag');

    }
    add_action('after_setup_theme','lapizzeria_setup');

    function lapizzeria_custom_logo(){
        $logo = array(
            'height' => 200,
            'width' => 250
        );

        add_theme_support('custom-logo',$logo);
    }
    add_action('after_setup_theme','lapizzeria_custom_logo');


function lapizzeria_styles(){
    // adding stylesheet( register stylesheet)
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css',array(), '8.0.0');
    wp_register_style('googlefont','https://fonts.googleapis.com/css?family=Open+Sans:400,700|Raleway:400,700,900&display=swap',array(),'1.0.0');
    wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css',array(), '4.7.0');
    wp_register_style('style', get_template_directory_uri() . '/style.css',array('normalize'), '1.0');
    wp_register_style('fluidboxcss', get_template_directory_uri() . '/css/fluidbox.min.css',array(), '4.7.0');
    wp_register_style('datetime-local', get_template_directory_uri() . '/css/datetime-local-polyfill.css',array(), '1.0.0');

    //Than we have to enqueue stylesheet that has been registered
    wp_enqueue_style('normalize');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('style');
    wp_enqueue_style('googlefont');
    wp_enqueue_style('fluidboxcss');
    wp_enqueue_style('datetime-local');


    //adding scripts//

    wp_register_script('fluidboxjs',get_template_directory_uri() . '/js/jquery.fluidbox.min.js','1.0.0' ,true);
    wp_register_script('datetime-local-polyfill',get_template_directory_uri() . '/js/datetime-local-polyfill.min.js',array('jquery','jquery-ui-core','jquery-ui-datepicker','modernizr'),'1.0.0' ,true);
    wp_register_script('modernizr','https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array('jquery'),'2.8.3',true);
    wp_register_script('script',get_template_directory_uri() . '/js/scripts.js','1.0.0' ,true);


    //Than we have to enqueue java scripts files that has been registered//
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-datepicker');
    wp_enqueue_script('datetime-local-polyfill');
    wp_enqueue_script('modernizr');
    wp_enqueue_script('fluidboxjs');
    wp_enqueue_script('script');

    wp_localize_script(
        'script',
        'options',
        array(
            'latitude' => esc_html( get_option('lapizzeria_gmap_latitude') ),
            'longitude' => esc_html( get_option('lapizzeria_gmap_longitude') ),
            'zoom' => esc_html( get_option('lapizzeria_gmap_zoom') )
        )
    );
}

    add_action('wp_enqueue_scripts','lapizzeria_styles');

        function lapizzeria_admin_scripts(){
        wp_enqueue_script('adminjs',get_template_directory_uri() . '/js/admin_ajax.js', array('jquery'),'1.0.0' ,true);
     }
    add_action('admin_enqueue_scripts','lapizzeria_admin_scripts');

//Add menus
    function lapizzeria_menus(){
      register_nav_menus(array(
         'header-menu' => __('Header Menu','lapizza'),
          'social-menu' => __('Social Menu','lapizza')
      ));
    }
    add_action('init','lapizzeria_menus');

    function lapizzeria_specialties() {
        $labels = array(
            'name'               => _x( 'Pizzas', 'lapizzeria' ),
            'singular_name'      => _x( 'Pizza', 'post type singular name', 'lapizzeria' ),
            'menu_name'          => _x( 'Pizzas', 'admin menu', 'lapizzeria' ),
            'name_admin_bar'     => _x( 'Pizzas', 'add new on admin bar', 'lapizzeria' ),
            'add_new'            => _x( 'Add New', 'book', 'lapizzeria' ),
            'add_new_item'       => __( 'Add New Pizza', 'lapizzeria' ),
            'new_item'           => __( 'New Pizzas', 'lapizzeria' ),
            'edit_item'          => __( 'Edit Pizzas', 'lapizzeria' ),
            'view_item'          => __( 'View Pizzas', 'lapizzeria' ),
            'all_items'          => __( 'All Pizzas', 'lapizzeria' ),
            'search_items'       => __( 'Search Pizzas', 'lapizzeria' ),
            'parent_item_colon'  => __( 'Parent Pizzas:', 'lapizzeria' ),
            'not_found'          => __( 'No Pizzas found.', 'lapizzeria' ),
            'not_found_in_trash' => __( 'No Pizzas found in Trash.', 'lapizzeria' )
        );
        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'lapizzeria' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'specialties' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 6,
            'supports'           => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'         => array( 'category' ),
        );

        register_post_type( 'specialties', $args );
    }
    add_action( 'init', 'lapizzeria_specialties' );

//Widget Zone//
    function lapizzeria_widgets(){
        register_sidebar(array(
            'name' => 'Blog Sidebar',
            'id' => 'blog_sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
                'after_title' => '</h4>'
        ));
    }
    add_action('widgets_init','lapizzeria_widgets');

