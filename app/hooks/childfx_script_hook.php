<?php

add_action('admin_init', 'childthemes_load_admin_scripts');
/**
 * This function loads the admin CSS files
 */
function childthemes_load_admin_scripts() {
    wp_enqueue_style('childthemes-admin', CHILD_CSS_URL . '/admin.style.css');

    wp_enqueue_script('childthemes-admin', CHILD_JS_URL . '/admin.functions.js', array('jquery'));
}


add_action('init', 'childthemes_register_scripts');
/**
 * This function register our style and script files
 */
function childthemes_register_scripts(){
    wp_register_script('childthemes-clockwork', CHILD_JS_URL . '/clockwork.js', array('jquery'));
    wp_register_script('childthemes-clockwork-ajax', CHILD_JS_URL . '/clockwork-collections/clockwork-ajax.js', array('jquery'));
	wp_register_script('childthemes-functions', CHILD_JS_URL . '/functions.js', array('jquery'));
}

/**
 * This function load our style and script files
 */
add_action('calibrefx_meta', 'childthemes_load_script');
function childthemes_load_script(){   
	wp_enqueue_script('childthemes-clockwork');
	wp_enqueue_script('childthemes-clockwork-ajax');
	wp_enqueue_script('childthemes-functions');
}