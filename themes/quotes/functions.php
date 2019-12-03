<?php

require get_theme_file_path('/inc/api-route.php');
require get_theme_file_path('/inc/metaboxes.php');
require get_theme_file_path('/inc/extras.php');

function quotes_files() {
    wp_enqueue_style('quotes_styles', get_stylesheet_uri('/build/css/style.min.css'), NULL, microtime());
    wp_enqueue_style('fonts', "https://fonts.googleapis.com/css?family=Contrail+One|Tinos:700&display=swap");

    wp_enqueue_script('api_js', get_template_directory_uri() . '/js/api.js', array('jquery'), microtime(), true);
    wp_localize_script("api_js", "quotes_on_dev_data", array(
        "root_url" => get_site_url(),
        "nonce" => wp_create_nonce("wp_rest")
    ));
}

add_action('wp_enqueue_scripts', 'quotes_files');

function quotes_features() {
    add_theme_support('title-tag');
     register_nav_menus( array(
        'primary' => 'Primary Menu',
    ));
}

add_action('after_setup_theme', 'quotes_features');

function quotes_filter_home($query){
    if(is_home() && $query->is_main_query()):
        $query->set("orderby", "rand");
        $query->set("posts_per_page", 1);
    endif;
}

add_action("pre_get_posts", 'quotes_filter_home');

?>