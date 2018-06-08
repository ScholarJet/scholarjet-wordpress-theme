<?php
function scholarjet_wordpress_enqueue() {
    wp_enqueue_style('scholarjet-app-style');
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('google-font-roboto', 'https://fonts.googleapis.com/css?family=Roboto');
    wp_enqueue_style('google-font-roboto-slab', 'https://fonts.googleapis.com/css?family=Roboto+Slab');
    wp_enqueue_style('scholarjet-app-style', 'https://scholarjet.com/styles.bundle.css');
    wp_enqueue_style('scholarjet-theme-style', get_template_directory_uri() . '/css/scholarjet-wordpress.css');
    wp_enqueue_script('bootstrapjs', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '3.3.7', true);
}

add_action('wp_enqueue_scripts', 'scholarjet_wordpress_enqueue');

function scholarjet_theme_setup() {
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');
}



add_action('init', 'scholarjet_theme_setup');