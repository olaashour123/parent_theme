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
//add jquery_cloudflare on the frontend
function fancybox_js() {
	wp_enqueue_script( THEMES_NAMES.'-fancybox-js', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js', true ); 
}
//add_action( 'wp_enqueue_scripts', 'fancybox_js', 99999 );
/*-----------------------------------------------------------------------------------*/
//add css on the frontend
function fancybox_css() {
	wp_enqueue_style( THEMES_NAMES.'-fancybox-css', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css', true ); 
}
//add_action( 'wp_enqueue_scripts', 'fancybox_css', 0 ); 
/*-----------------------------------------------------------------------------------*/
function cores_scripts() {  
	$js_dir = EX_THEMES_URI.'/assets/js';	 
	//wp_enqueue_script( THEMES_NAMES.'-hide-link-download', $js_dir . '/nolink.js', [], '', true ); 
	wp_enqueue_script( THEMES_NAMES.'-bootstrap-min', $js_dir . '/bootstrap.min.js', array('jquery'), null, false);
	//wp_enqueue_script( THEMES_NAMES.'-jquery-3.6.0-js', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', true ); 
	wp_enqueue_script( THEMES_NAMES.'-jquery-min', $js_dir . '/jquery.min.js', array('jquery'), null, false);
}
//add_action( 'wp_enqueue_scripts', 'cores_scripts', 99999 );
/*-----------------------------------------------------------------------------------*/
function jquery3_6_0() {
	wp_enqueue_script( THEMES_NAMES.'-jquery-3.6.0-js', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', true ); 
}
//add_action( 'wp_enqueue_scripts', 'jquery3_6_0', 0 );
/*-----------------------------------------------------------------------------------*/
// load css into the admin pages
function mytheme_enqueue_options_style() {
    wp_enqueue_style( 'mytheme-options-style', get_template_directory_uri() . '/css/admin.css' ); 
}
//add_action( 'admin_enqueue_scripts', 'mytheme_enqueue_options_style' );
/*-----------------------------------------------------------------------------------*/
// load css into the login page
function mytheme_enqueue_login_style() {
    wp_enqueue_style( 'mytheme-options-style', get_template_directory_uri() . '/css/login.css' ); 
}
//add_action( 'login_enqueue_scripts', 'mytheme_enqueue_login_style' );
/*-----------------------------------------------------------------------------------*/
/* Loading CSS Only on Specific Pages */
function conditionally_enqueue_styles_scripts() { 
    if ( is_page(array('sales', 'quarterly-results')) ) {
        wp_enqueue_script( 'chartjs_js' );
        wp_enqueue_style( 'chartjs_css' );
    }
}
//add_action( 'wp_enqueue_scripts', 'conditionally_enqueue_styles_scripts' );
/*-----------------------------------------------------------------------------------*/
/* Loading CSS in the Footer */
/* https://webdesign.tutsplus.com/tutorials/loading-css-into-wordpress-the-right-way--cms-20402 */
function footer_add_chart_style() {
    wp_enqueue_style('chartjs_css', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css');
};
//add_action( 'get_footer', 'footer_add_chart_style' );
/*-----------------------------------------------------------------------------------*/
function no_more_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}
add_action('init', 'no_more_jquery');
/*-----------------------------------------------------------------------------------*/
// load css into the website's front-end 
function core_themes_style() {
	$css_dir		= EX_THEMES_URI.'/assets/css';	 
	$sites			= home_url( '/' );	 
	
    wp_enqueue_style( 'custom.styles', $css_dir.'/custom.styles.css');
    wp_enqueue_style( 'dark.styles', $css_dir.'/dark.styles.css');
    wp_enqueue_style( 'dashicons.styles', $sites.'/wp-includes/css/dashicons.min.css');
}
add_action( 'wp_enqueue_scripts', 'core_themes_style', 1 );
/*-----------------------------------------------------------------------------------*/