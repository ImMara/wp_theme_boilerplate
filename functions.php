<?php

// register taxonomy and post type
function montheme_init(){
    register_taxonomy('customtaxonomy','post',[
        'labels'=>[
            'name' => 'custom taxonomy',
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'show_admin_column' => true,
        // needs to resave permalink when changed
    ]);
    register_post_type('custompost',[
        'label' => 'custom post',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-building',
        'supports' => ['title','editor','thumbnail'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);
    // needs to resave permalinks
}

// register theme support
function montheme_support (){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header','En tete du menu');
    register_nav_menu('footer','Pied de page');
}

// register scripts and css
function montheme_register_assets(){
    wp_register_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css',[]);
    wp_register_script('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js',[],false,true);
    wp_register_script('js', get_template_directory_uri() . '/js/index.js',[],false,true);
    // true to put the js in the footer
    wp_deregister_script('jquery');

    wp_enqueue_script('bootstrap');
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('js');
}

/* add bar to title parts */
function montheme_title_separator(){
    return '|';
}

/* navbar: change <li> class */
function montheme_menu_class($classes)
{
    $classes[] = 'nav-item';
    return $classes;
}

/* navbar: change <a> class */
function montheme_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

/* hide menus from admin */
function remove_admin_menus(){
    if ( function_exists('remove_menu_page') ) {
       // remove_menu_page('plugins.php');
        // remove_menu_page('themes.php');
        // remove_menu_page('tools.php');
        // remove_menu_page('edit.php');
        // remove_menu_page('edit.php?post_type=page');
        // remove_menu_page('edit-comments.php');
    }
}

/* allow svg ( security issue if not trusted users )  */
function wpc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Header | Footer',
        'menu_title' => 'Header | Footer',
        'menu_slug' => 'Header-Footer',
        'parent_slug' => '',
        'capability' => 'edit_posts',
        'position' => 10,
        'icon_url' => false,
        'redirect' => false
    ));

}

function my_acf_google_map_api( $api ){
    $api['key'] = '';
    return $api;
}

add_action('init','montheme_init');
add_action('after_setup_theme','montheme_support');
add_action('wp_enqueue_scripts','montheme_register_assets');
add_filter('document_title_separator','montheme_title_separator');
add_filter('document_title_parts','montheme_document_title_parts');
add_filter('nav_menu_css_class','montheme_menu_class');
add_filter('nav_menu_link_attributes','montheme_menu_link_class');
add_action('admin_menu', 'remove_admin_menus');
add_filter('upload_mimes', 'wpc_mime_types');
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/* hide acf from admin # */
// add_filter('acf/settings/show_admin', '__return_false');