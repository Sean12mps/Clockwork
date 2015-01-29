<?php 


// 	TAXONOMY FOR RESEARCH
add_action( 'init', 'register_taxonomy_javascript' );

function register_taxonomy_javascript() {

    $labels = array( 
        'name' => _x( 'javascript', 'javascript' ),
        'singular_name' => _x( 'javascripts', 'javascript' ),
        'search_items' => _x( 'Search javascript', 'javascript' ),
        'popular_items' => _x( 'Popular javascript', 'javascript' ),
        'all_items' => _x( 'All javascript', 'javascript' ),
        'parent_item' => _x( 'Parent javascripts', 'javascript' ),
        'parent_item_colon' => _x( 'Parent javascripts:', 'javascript' ),
        'edit_item' => _x( 'Edit javascripts', 'javascript' ),
        'update_item' => _x( 'Update javascripts', 'javascript' ),
        'add_new_item' => _x( 'Add New javascripts', 'javascript' ),
        'new_item_name' => _x( 'New javascripts', 'javascript' ),
        'separate_items_with_commas' => _x( 'Separate javascript with commas', 'javascript' ),
        'add_or_remove_items' => _x( 'Add or remove javascript', 'javascript' ),
        'choose_from_most_used' => _x( 'Choose from most used javascript', 'javascript' ),
        'menu_name' => _x( 'javascript', 'javascript' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'javascript', array('javascripts'), $args );
}




add_action( 'init', 'register_taxonomy_php_script' );

function register_taxonomy_php_script() {

    $labels = array( 
        'name' => _x( 'php_script', 'php_script' ),
        'singular_name' => _x( 'php_scripts', 'php_script' ),
        'search_items' => _x( 'Search php_script', 'php_script' ),
        'popular_items' => _x( 'Popular php_script', 'php_script' ),
        'all_items' => _x( 'All php_script', 'php_script' ),
        'parent_item' => _x( 'Parent php_scripts', 'php_script' ),
        'parent_item_colon' => _x( 'Parent php_scripts:', 'php_script' ),
        'edit_item' => _x( 'Edit php_scripts', 'php_script' ),
        'update_item' => _x( 'Update php_scripts', 'php_script' ),
        'add_new_item' => _x( 'Add New php_scripts', 'php_script' ),
        'new_item_name' => _x( 'New php_scripts', 'php_script' ),
        'separate_items_with_commas' => _x( 'Separate php_script with commas', 'php_script' ),
        'add_or_remove_items' => _x( 'Add or remove php_script', 'php_script' ),
        'choose_from_most_used' => _x( 'Choose from most used php_script', 'php_script' ),
        'menu_name' => _x( 'php_script', 'php_script' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,
        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'php_script', array('php_scripts'), $args );
}




add_action( 'init', 'register_post_research' );

function register_post_research() {

    $labels = array( 
        'name' => _x( 'research', 'research' ),
        'singular_name' => _x( 'research', 'research' ),
        'add_new' => _x( 'Add New', 'research' ),
        'add_new_item' => _x( 'Add New research', 'research' ),
        'edit_item' => _x( 'Edit research', 'research' ),
        'new_item' => _x( 'New research', 'research' ),
        'view_item' => _x( 'View research', 'research' ),
        'search_items' => _x( 'Search research', 'research' ),
        'not_found' => _x( 'No research found', 'research' ),
        'not_found_in_trash' => _x( 'No research found in Trash', 'research' ),
        'parent_item_colon' => _x( 'Parent research:', 'research' ),
        'menu_name' => _x( 'research', 'research' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies' => array( 'javascript', 'php_script' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'research', $args );
}