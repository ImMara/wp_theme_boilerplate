<?php

// register taxonomy and post type
function montheme_init(){

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

    register_taxonomy('customtaxonomy','custompost',[
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

    wp_register_script('bootstrap',get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.bundle.min.js',[],false,true);
    wp_register_script('gsap',get_template_directory_uri() .'/assets/js/gsap/gsap.min.js',[],false,true);
    wp_register_script('scrolltrigger',get_template_directory_uri() .'/assets/js/gsap/ScrollTrigger.min.js',[],false,true);
    wp_register_script('js', get_template_directory_uri() . '/assets/js/index.js',[],false,true);

    wp_register_style('bootstrap',get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css',[]);
    wp_register_style('fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
    wp_register_style('style', get_template_directory_uri() . '/assets/css/index.css' ,[] );
    // true to put the js in the footer

    wp_deregister_script('jquery');

    wp_enqueue_script('bootstrap');
    wp_enqueue_script('gsap');
    wp_enqueue_script('scrolltrigger');
    wp_enqueue_script('js');

    wp_enqueue_style('bootstrap');
    wp_enqueue_style('fontawesome');
    wp_enqueue_style('style');
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

function my_acf_google_map_api( $api ){
    $api['key'] = '';
    return $api;
}

// ADDING BUTTON TO EXPORT
function admin_post_list_export_button($wich){
    global $typenow;

    if( 'custompost' === $typenow && 'top' === $wich ){
        ?>
        <input type="submit" name="export_all_posts" class="button button-primary" value="<?php _e('Export All Posts'); ?>" />
        <?php
    }
}

// EXPORT FUNCTION CSV
function func_export_all_posts() {
    if(isset($_GET['export_all_posts'])) {
        $arg = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );

        global $post;
        $arr_post = get_posts($arg);
        if ($arr_post) {

            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="wp-posts.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');

            $file = fopen('php://output', 'w');

            fputcsv($file, array('Post Title', 'URL', 'Categories', 'Tags'));

            foreach ($arr_post as $post) {
                setup_postdata($post);

                $categories = get_the_category();
                $cats = array();
                if (!empty($categories)) {
                    foreach ( $categories as $category ) {
                        $cats[] = $category->name;
                    }
                }

                $post_tags = get_the_tags();
                $tags = array();
                if (!empty($post_tags)) {
                    foreach ($post_tags as $tag) {
                        $tags[] = $tag->name;
                    }
                }

                fputcsv($file, array(get_the_title(), get_the_permalink(), implode(",", $cats), implode(",", $tags)));
            }

            exit();
        }
    }
}


add_action('init','montheme_init');
add_action('after_setup_theme','montheme_support');
add_action('wp_enqueue_scripts','montheme_register_assets');
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('document_title_separator','montheme_title_separator');
add_filter('document_title_parts','montheme_document_title_parts');
add_filter('nav_menu_css_class','montheme_menu_class',10,3);
add_filter('nav_menu_link_attributes','montheme_menu_link_class',10,3);
add_action('admin_menu', 'remove_admin_menus');
add_filter('upload_mimes', 'wpc_mime_types');
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
add_action('manage_posts_extra_tablenav','admin_post_list_export_button');
add_action( 'init', 'func_export_all_posts' );
add_action( 'show_admin_bar','__return_false');

/* hide acf from admin # */
// add_filter('acf/settings/show_admin', '__return_false');