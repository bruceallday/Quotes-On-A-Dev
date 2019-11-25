<?php

//Adds script and stylesheets
function quotes_files() {
    wp_enqueue_style('quotes_styles', get_stylesheet_uri('/build/css/style.min.css'), NULL, microtime());
    wp_enqueue_style('fonts', "https://fonts.googleapis.com/css?family=Lato&display=swap");

    wp_enqueue_script('api_js', get_template_directory_uri() . '/js/api.js', array('jquery'), microtime(), true);
    wp_enqueue_script('wp-api');

    // wp_localize_script('qod_api', 'api_url', array(
    //     'root_url' => rest_url(),
    //     'home_url' => home_url(),
    //     'nonce' => wp_create_nonce('wp_rest')
    // ));
}


add_action('wp_enqueue_scripts', 'quotes_files');

//Adds theme support - ex: title tag
function quotes_features() {
    add_theme_support('title-tag');
     register_nav_menus( array(
        'primary' => 'Primary Menu',
    ));
}

add_action('after_setup_theme', 'quotes_features');

?>