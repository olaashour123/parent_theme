<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
function news() {
    $labels = array(
        'name'                      => _x( 'News', 'Post Type General Name', THEMES_NAMES ),
        'singular_name'             => _x( 'News', 'Post Type Singular Name', THEMES_NAMES ),
        'menu_name'                 => __( 'News', THEMES_NAMES ),
        'parent_item_colon'         => __( 'Parent News:', THEMES_NAMES ),
        'all_items'                 => __( 'All News', THEMES_NAMES ),
        'view_item'                 => __( 'View News Info', THEMES_NAMES ),
        'add_new_item'              => __( 'Add New Article', THEMES_NAMES ),
        'add_new'                   => __( 'Add News', THEMES_NAMES ),
        'edit_item'                 => __( 'Edit News Info', THEMES_NAMES ),
        'update_item'               => __( 'Update News Info', THEMES_NAMES ),
        'search_items'              => __( 'Search News', THEMES_NAMES ),
        'not_found'                 => __( 'Not found', THEMES_NAMES ),
        'not_found_in_trash'        => __( 'Not found in Trash', THEMES_NAMES ),
    );
    $rewrite = array(
        'slug'                      => 'news',
        'with_front'                => true,
        'pages'                     => true,
        'feeds'                     => true,
    );
    $args = array(
        'label'                     => __( 'News', THEMES_NAMES ),
        'description'               => __( 'Info News', THEMES_NAMES ),
        'labels'                    => $labels,
        'show_in_rest'              => true, // To use Gutenberg editor.
        'supports'                  => array( 'title', 'editor', 'thumbnail', 'comments'),
        'hierarchical'              => false,
        'public'                    => true,
        'show_ui'                   => true,
        'show_in_menu'              => true,
        'show_in_nav_menus'         => true,
        'show_in_admin_bar'         => true,
        'menu_position'             => 7,
        'menu_icon'                 => 'dashicons-edit-page',
        'can_export'                => true,
        'has_archive'               => true,
        'exclude_from_search'       => false,
        'publicly_queryable'        => true,
        'capability_type'           => 'page',
        'rewrite'                   => $rewrite,
    );
    register_post_type( 'news', $args );
}
add_action( 'init', 'news', 0 );
function news_tags_taxonomy() { 
$news_tags = array(
    'name'                          => _x( 'News Tags', 'taxonomy general name' ),
    'singular_name'                 => _x( 'News Tag', 'taxonomy singular name' ),
    'search_items'                  => __( 'Search News Tags' ),
    'popular_items'                 => __( 'Popular News Tags' ),
    'all_items'                     => __( 'All News Tags' ),
    'parent_item'                   => null,
    'parent_item_colon'             => null,
    'edit_item'                     => __( 'Edit News Tag' ),
    'update_item'                   => __( 'Update News Tag' ),
    'add_new_item'                  => __( 'Add New News Tag' ),
    'new_item_name'                 => __( 'New News Tag Name' ),
    'separate_items_with_commas'    => __( 'Separate News tags with commas' ),
    'add_or_remove_items'           => __( 'Add or remove News tags' ),
    'choose_from_most_used'         => __( 'Choose from the most used News tags' ),
    'menu_name'                     => __( 'News Tags' ), 
    );
    register_taxonomy('news_tags','news', array(
        'hierarchical'              => false,
        'labels'                    => $news_tags,
        'show_ui'                   => true,
        'show_in_rest'              => true,
        'show_admin_column'         => true,
        'update_count_callback'     => '_update_post_term_count',
        'query_var'                 => true,
        'rewrite'                   => array('slug' => 'news_tags' ),    
    ));
}
//add_action( 'init', 'news_tags_taxonomy', 0 );
function news_categories_taxonomy() {
$label = array(
        'name'                      => _x( 'News Categories', 'taxonomy general name' ),
        'singular_name'             => _x( 'News Category', 'taxonomy singular name' ), 
        'search_items'              => __( 'Search news Categories' ),
        'all_items'                 => __( 'All News Categories' ),
        'parent_item'               => __( 'Parent News Category' ),
        'parent_item_colon'         => __( 'Parent News Category:' ),
        'edit_item'                 => __( 'Edit News Category' ),
        'update_item'               => __( 'Update News Category' ),
        'add_new_item'              => __( 'Add New News Category' ),
        'new_item_name'             => __( 'New News Category' ),
        'menu_name'                 => __( 'News Categories' ),
    );
    register_taxonomy( 'news_categories',array('news'), array(
        'hierarchical'              => true,
        'labels'                    => $label,
        'show_in_rest'              => true,
        'show_ui'                   => true,
        'show_admin_column'         => true,
        'query_var'                 => true,
        'rewrite'                   => array( 'slug' => 'news_categories' ),
    ));
}
//add_action( 'init', 'news_categories_taxonomy', 0 );
function ex_themes_taxonomies_() {
    // Add genres
    $labels = array(
        'name'                      => _x( 'Developer', 'taxonomy general name' ),
        'singular_name'             => _x( 'Developer', 'taxonomy singular name' ),
        'search_items'              => __( 'Search ' ),
        'all_items'                 => __( 'All ' ),
        'parent_item'               => __( 'Parent ' ),
        'parent_item_colon'         => __( 'Parent ' ),
        'edit_item'                 => __( 'Edit ' ),
        'update_item'               => __( 'Update ' ),
        'add_new_item'              => __( 'Add New ' ),
        'new_item_name'             => __( 'New Name' ),
        'menu_name'                 => __( 'Developer' ),
    );
    $args = array(
        'hierarchical'              => true,
        'labels'                    => $labels,
        'show_ui'                   => true,
        'show_admin_column'         => false,
        'query_var'                 => true,
        'rewrite'                   => array( 'slug' => 'developer' ),
    );
    register_taxonomy( 'developer', array( 'post' ), $args );
}
add_action( 'init', 'ex_themes_taxonomies_', 0 );
/*
Remove slug from custom post type post URLs
https://wordpress.stackexchange.com/questions/203951/remove-slug-from-custom-post-type-post-urls
*/
function remove_slug_news( $post_link, $post, $leavename ) {
    if ( 'news' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}
add_filter( 'post_type_link', 'remove_slug_news', 10, 3 );
function parse_request_news( $query ) {
    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'news', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'parse_request_news' );

