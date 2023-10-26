<?php

//This function will save our styles that we are going to use:
function music_register_styles(){

    //set a version variable to be done dynamically - optional
    $version=wp_get_theme()->get('Version');

    wp_enqueue_style('music-style',get_template_directory_uri()."/style.css",array('music-bootstrap'),$version,'all');
    wp_enqueue_style('music-bootstrap',"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css",array(),'4.4.1','all');

}
//adding the action to call the func:
add_action('wp_enqueue_scripts','music_register_styles');

function music_register_scripts(){

    wp_enqueue_script('music-jquery','https://code.jquery.com/jquery-3.4.1.slim.min.js',array(),'3.4.1',true);
    wp_enqueue_script('music-popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',array(),'1.16.0',true);
    wp_enqueue_script('music-bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',array(),'4.4.1',true);
    wp_enqueue_script('music-main',get_template_directory_uri()."assets/js/main.js",array(),'1.0',true);
    

}

add_action('wp_enqueue_scripts','music_register_scripts');


//Registering our menus:
function register_custom_menus() {
    register_nav_menus(array(
        'header-menu' => 'Header Menu',
        'footer-menu' =>'Footer Menu'
        
    ));
}
add_action('init','register_custom_menus');
?>