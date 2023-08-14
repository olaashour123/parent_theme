<?php
add_action( 'admin_init', 'ex_themes_install_db_page_' );
function ex_themes_install_db_page_() {
    if ( ! get_option( 'ex_themes_install_db_pages_' ) ) {

        $topapps = array(
            'post_title'     => "Top Apps",
            'post_name' => 'top-apps',
            'post_content'   => '',
            'post_type'      => 'page',
            'post_status'   => 'publish',
            'page_template'  => "template/template-popular-apps.php"
        );
        $post_id = wp_insert_post( $topapps );

        $topgames = array(
            'post_title'     => "Top Games",
            'post_name' => 'top-games',
            'post_content'   => '',
            'post_type'      => 'page',
            'post_status'   => 'publish',
            'page_template'  => "template/template-popular-games.php"
        );
        $post_id = wp_insert_post( $topgames );

        $toptens = array(
            'post_title'     => "Top 100",
            'post_name' => 'top-100',
            'post_content'   => '',
            'post_type'      => 'page',
            'post_status'   => 'publish',
            'page_template'  => "template/template-100.php"
        );
        $post_id = wp_insert_post( $toptens );

        $register = array(
            'post_title'     => "Register",
            'post_name' => 'register',
            'post_content'   => '',
            'post_type'      => 'page',
            'post_status'   => 'publish',
            'page_template'  => "template/template-register.php"
        );
        $post_id = wp_insert_post( $register );

        update_option( 'ex_themes_install_db_pages_', true );
    }
    /*set permalink structure*/
    /* global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
    $wp_rewrite->flush_rules(); */
}