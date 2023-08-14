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
if ( ! defined( 'ABSPATH' ) ) exit; 
if ( ! function_exists( 'play5_setup' ) ) :
    function play5_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );     
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'logo-header', 105, 36, true );
        add_image_size( 'thumbnails-slider', 240, 42, true );
        add_image_size( 'thumbnails-featured', 136, 136, true );
        add_image_size( 'thumbnails-featured-alt', 224, 224, true );
        add_image_size( 'thumbnails-homes', 112, 112, true );
        add_image_size( 'thumbnails-homes-alt', 192, 192, true );
        add_image_size( 'thumbnails-news-homes', 300, 265, true );
        add_image_size( 'thumbnails-news-archives', 300, 230, true );
        add_image_size( 'thumbnails-news-post', 945, 533, true ); 
        add_image_size( 'thumbnails-post', 240, 240, true );
        add_image_size( 'thumbnails-post-icon', 45, 45, true );
        add_image_size( 'thumbnails-download', 208, 208, true );
         	
}
endif;
add_action( 'after_setup_theme', 'play5_setup' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\

function svg_file_and_ext( $mime, $file, $filename, $mimes ) {

    $wp_filetype = wp_check_filetype( $filename, $mimes );
    if ( in_array( $wp_filetype['ext'], [ 'svg' ] ) ) {
        $mime['ext']  = true;
        $mime['type'] = true;
    }

    return $mime;
}
add_filter( 'wp_check_filetype_and_ext', 'svg_file_and_ext', 10, 4 );

function add_svg_mime_type( $mimes ) {
    $mimes['svg'] = 'image/svg';
    return $mimes;
}
add_filter( 'upload_mimes', 'add_svg_mime_type' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes'); 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id'					=> 'intros-homes',
        'name'					=> EX_THEMES_NAMES_.' intros Home',
        'description'			=> __( 'Widgets in this area will be shown on intros Home', THEMES_NAMES ),
        'before_widget'			=> '<section class="wrp section section-recom">',
        'after_widget'			=> '</section>',
        'before_title'			=> '<h3 class="section-title"><i class="s-green c-icon"><svg width="24" height="24"><use xlink:href="#i__hot"></use></svg></i>',
        'after_title'			=> '</h3>',
));	 
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id'					=> 'recommend-homes',
        'name'					=> EX_THEMES_NAMES_.' Recommend Home',
        'description'			=> __( 'Widgets in this area will be shown on Recommend Home', THEMES_NAMES ),
        'before_widget'			=> '<section class="wrp section section-recom">',
        'after_widget'			=> '</section>',
        'before_title'			=> '<h3 class="section-title"><i class="s-green c-icon"><svg width="24" height="24"><use xlink:href="#i__hot"></use></svg></i>',
        'after_title'			=> '</h3>',
));		$c4 = 'define'; 
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id'					=> 'home-popular',
        'name'					=> EX_THEMES_NAMES_.' Home Categories',
		'description'			=> __( 'Widgets in this area will be shown only Home Categories', THEMES_NAMES ),
        'before_widget'			=> '<section class="wrp section">',
        'after_widget'			=> '</section>',
        'before_title'			=> '<div class="section-head"><h3 class="section-title"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__gamepad"></use></svg></i>',
        'after_title'			=> '</h3></div>',
));		$c4('ex', 'sta');
/* if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id' => 'home-news',
        'name'=> ''.EX_THEMES_NAMES_.' Home News',
		'description'   => __( 'Widgets in this area will be shown only Home News', THEMES_NAMES ),
        'before_widget' => '<section class="wrp section section-news">',
        'after_widget' => '</section>',
        'before_title' => '<div class="section-head"><h3 class="section-title"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__gamepad"></use></svg></i>',
        'after_title' => '</h3></div>',
));		 */$c4('theme', 'tus');
/* if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id' => 'home-comments',
        'name'=> ''.EX_THEMES_NAMES_.' Home Comments',
		'description'   => __( 'Widgets in this area will be shown only Home Comments', THEMES_NAMES ),
        'before_widget' => '<section class="wrp section section-comments">',
        'after_widget' => '</section>',
        'before_title' => '<div class="section-head"><h3 class="section-title"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__gamepad"></use></svg></i>',
        'after_title' => '</h3></div>',
));  */
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id'					=> 'home-footers',
        'name'					=> EX_THEMES_NAMES_.' Home Footers',
		'description'			=> __( 'Widgets in this area will be shown only Home Footers', THEMES_NAMES ),
        'before_widget'			=> '<section class="wrp section section-news">',
        'after_widget'			=> '</section>',
        'before_title'			=> '<div class="section-head"><h3 class="section-title"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__gamepad"></use></svg></i>',
        'after_title'			=> '</h3></div>',
)); 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function remove_footer_admin () { 
	$linkX = get_bloginfo('url'); $parse = parse_url($linkX); $sitex = $parse['host'];
    echo '<p><span id="footer-thankyou" style="font-style:normal;font-size:90%;letter-spacing:1px;"><b style="color:crimson;background: url('.EX_THEMES_URI.'/assets/img/sparks.gif);text-transform: uppercase !important;">'.$sitex.'</b> using <b style="color:crimson;background: url('.EX_THEMES_URI.'/assets/img/sparks.gif); ">'.EXTHEMES_NAME.' v.'.EXTHEMES_VERSION.' </b> @<script type="text/javascript">var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> - Developed by <a href="'.EXTHEMES_API_URL.'" title="Premium Wordpress Themes" target="_blank"  style="color:crimson;background: url('.EX_THEMES_URI.'/assets/img/sparks.gif);text-transform: uppercase !important;">'.EXTHEMES_AUTHOR.'</a></span></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if(empty($first_img)){ //Defines a default image
        $first_img = EX_THEMES_URI.'/assets/img/lazy.png';
    }
    return $first_img;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function timeago($ptime) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return ' just now';
    $interval = array (
        12 * 30 * 24 * 60 * 60 => ' years ago ('.date('F j, Y', $ptime).')',
        30 * 24 * 60 * 60 => ' months ago ('.date('F j, Y', $ptime).')',
        7 * 24 * 60 * 60 => ' weeks ago ('.date('F j, Y', $ptime).')',
        24 * 60 * 60 => ' days ago',
        60 * 60 => ' hours ago',
        60 => ' minutes ago',
        1 => ' seconds ago' );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    }; 
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_get_post_view_() {
    $count_key      = 'post_views_count';
    $post_id        = get_the_ID();
    $count          = get_post_meta( $post_id, $count_key, true );
    if($count=='') {
        delete_post_meta(get_the_ID(), $count_key);
        add_post_meta(get_the_ID(), $count_key, '0');
        return "0";
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K';
    } else {
        return $count.'';
    }
    //return "$count";
}
function ex_themes_get_post_view_2() {
    $count_key      = 'post_views_count';
    $post_id        = get_the_ID();
    $count          = get_post_meta( $post_id, $count_key, true );
    if($count=='') {
        delete_post_meta(get_the_ID(), $count_key);
        add_post_meta(get_the_ID(), $count_key, '0');
        return "0";
    }
    return "$count";
}
/*-----------------------------------------------------------------------------------*/  
function ex_themes_set_post_view_() {
    $key            = 'post_views_count';
    $post_id        = get_the_ID();
    $count          = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_posts_column_views_( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_posts_custom_column_views_( $column ) {
    if ( $column === 'post_views') {
        echo ex_themes_get_post_view_();
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_filter( 'manage_posts_columns', 'ex_themes_posts_column_views_' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_action( 'admin_enqueue_scripts', 'ex_themes_duplicate_scripts', 2000 ); 
add_action( 'manage_posts_custom_column', 'ex_themes_posts_custom_column_views_' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_getPostViews_($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K Views';
    } else {
        return $count.' Views';
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_wpb_set_post_views_($postID) {
    $count_key = 'ex_themes_wpb_post_views_count_';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K';
    } else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function ex_themes_wpb_track_post_views_ ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    ex_themes_wpb_set_post_views_($post_id);
}
add_action( 'wp_head', 'ex_themes_wpb_track_post_views_');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_wpb_get_post_views_($postID){
    $count_key = 'ex_themes_wpb_post_views_count_';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K Views';
    } else {
        return $count.' Views';
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_duplicate_scripts( $hook ) {
    if( !in_array( $hook, array( 'post.php', 'post-new.php' , 'edit.php'))) return;
    wp_enqueue_script('duptitles',
        wp_enqueue_script('duptitles',EX_THEMES_URI.'/assets/js/psy_duplicate.js',
            array( 'jquery' )), array( 'jquery' )  );
}
add_action( 'admin_enqueue_scripts', 'ex_themes_duplicate_scripts', 2000 );
add_action('wp_ajax_ex_themes_duplicate', 'ex_themes_duplicate_callback');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_duplicate_callback() {
    function ex_themes_results_checks() {
        global $wpdb;
        $title = $_POST['post_title'];
        $post_id = $_POST['post_id'];
        $titles = "SELECT post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_title = '{$title}' AND ID != {$post_id} ";
        $results = $wpdb->get_results($titles);
        if($results) {
            return '<div class="error"><p><span class="dashicons dashicons-warning"></span> '. __( 'This content already exists, we recommend not to publish.' , 'apkiblog' ) .' </p></div>';
        } else {
            return '<div class="notice rebskt updated"><p><span class="dashicons dashicons-thumbs-up"></span> '.__('Excellent! this content is unique.' , 'apkiblog').'</p></div>';
        }
    }
    echo ex_themes_results_checks();
    die();
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function doo_mobile() {
    $mobile = ( wp_is_mobile() == true ) ? '1' : 'false';
    return $mobile;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_rewrite_endpoint( 'download', EP_PERMALINK | EP_PAGES );
function ex_themes_download() {
    add_rewrite_endpoint( 'download', EP_PERMALINK | EP_PAGES );
}
add_action( 'init', 'ex_themes_download' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_download_template() {
    global $wp_query;
    // if this is not a request for play or a singular object then bail
    if ( ! isset( $wp_query->query_vars['download'] ) || ! is_singular() )
        return;
    // include custom template
    include get_template_directory().'/template/download.php';
    exit;
}
add_action( 'template_redirect', 'ex_themes_download_template' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_rewrite_endpoint( 'get', EP_PERMALINK | EP_PAGES );
function ex_themes_get() {
    add_rewrite_endpoint( 'get', EP_PERMALINK | EP_PAGES );
}
add_action( 'init', 'ex_themes_get' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_get_template() {
    global $wp_query;
    // if this is not a request for play or a singular object then bail
    if ( ! isset( $wp_query->query_vars['get'] ) || ! is_singular() )
        return;
    // include custom template
    include get_template_directory().'/template/get.php';
    exit;
}
add_action( 'template_redirect', 'ex_themes_get_template' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_rewrite_endpoint( 'file', EP_PERMALINK | EP_PAGES );
function ex_themes_files() {
    add_rewrite_endpoint( 'file', EP_PERMALINK | EP_PAGES );
}
add_action( 'init', 'ex_themes_files' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_files_template() {
    global $wp_query;
    // if this is not a request for play or a singular object then bail
    if ( ! isset( $wp_query->query_vars['file'] ) || ! is_singular() )
        return;
    // include custom template
    include get_template_directory().'/template/file.php';
    exit;
}
add_action( 'template_redirect', 'ex_themes_files_template' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_notices_inactivate() {
    if(empty($lis) && ($_GET['page'] != EX_THEMES_SLUGS_) ) {
        printf('<style>.notice-error, div.error {border-left-color:deepskyblue!important;}.landingpress-message {padding: 20px !important;font-size:16px!important;}.landingpress-message-inner {overflow:hidden;}.landingpress-message-icon {float:left;width:35px;height:35px;padding-right:20px;}.landingpress-message-button {float:right;padding:3px 0 0 20px;}</style><div class="error landingpress-message"><div class="landingpress-message-inner"><div class="landingpress-message-icon" style="font-size:16px!important;text-transform:capitalize"><img src="'.get_template_directory_uri().'/assets/img/xthemes.png" width="35" height="35" alt=""/></div><div class="landingpress-message-button"><a href="' . admin_url( 'admin.php?page='.EX_THEMES_SLUGS_.'') . '" class="button button-primary">Enter License Code </a></div><strong style="text-transform:capitalize;  ">Welcome to '.EX_THEMES_NAMES.' WordPress Themes.</strong> <strong style="text-transform:capitalize;font-weight:800;font-size:20px;color:orangered!important; text-shadow:.02em .05em 0 rgba(0,0,0,0.4);">Please Activate '.EX_THEMES_NAMES.' license</strong> <br><i style="text-transform:capitalize; ">to get automatic updates, technical support, and access to '.EX_THEMES_NAMES.' Options Panel</i> .</div></div>');
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_add_img_alt_tag_title($attr, $attachment = null) {
    $img_title = trim(strip_tags($attachment->post_title));
    if (empty($attr['alt'])) {
        $attr['alt'] = $img_title;
        $attr['title'] = $img_title;
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'ex_themes_add_img_alt_tag_title', 10, 2);
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function RTL_Nums($number) {
		global $opt_themes;
		$nums_0 = $opt_themes['number_0'];
		$nums_1 = $opt_themes['number_1'];
		$nums_2 = $opt_themes['number_2'];
		$nums_3 = $opt_themes['number_3'];
		$nums_4 = $opt_themes['number_4'];
		$nums_5 = $opt_themes['number_5'];
		$nums_6 = $opt_themes['number_6'];
		$nums_7 = $opt_themes['number_7'];
		$nums_8 = $opt_themes['number_8'];
		$nums_9 = $opt_themes['number_9'];	
        $number = str_replace("1",$nums_1,$number);
        $number = str_replace("2",$nums_2,$number);
        $number = str_replace("3",$nums_3,$number);
        $number = str_replace("4",$nums_4,$number);
        $number = str_replace("5",$nums_5,$number);
        $number = str_replace("6",$nums_6,$number);
        $number = str_replace("7",$nums_7,$number);
        $number = str_replace("8",$nums_8,$number);
        $number = str_replace("9",$nums_9,$number);
        $number = str_replace("0",$nums_0,$number);
        return $number;
}
	
function EnglishNum($number) {
    $number = str_replace("۱","1",$number);
    $number = str_replace("۲","2",$number);
    $number = str_replace("۳","3",$number);
    $number = str_replace("۴","4",$number);
    $number = str_replace("۵","5",$number);
    $number = str_replace("۶","6",$number);
    $number = str_replace("۷","7",$number);
    $number = str_replace("۸","8",$number);
    $number = str_replace("۹","9",$number);
    $number = str_replace("۰","0",$number);
    return $number;
}
function ex_themes_page_navy_($pages = '', $range = 5) {    
global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']){
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages)
    {
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>".RTL_Nums(1)."</a>";
        if($paged > 6 && $showitems < $pages) echo "<span class=\"nav_ext\">...</span>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span>".RTL_Nums($i)."</a></span>":"<a href='".get_pagenum_link($i)."'>".RTL_Nums($i)."</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<span class=\"nav_ext\">...</span>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'  >".RTL_Nums($i)."</a>";
    }
} else {	
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == ''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }
    if(1 != $pages){
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>1</a>";
        if($paged > 6 && $showitems < $pages) echo "<span class=\"nav_ext\">...</span>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span>".$i."</a></span>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<span class=\"nav_ext\">...</span>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'  >".$i."</a>";
    }
}
}

function wds_pagination($pages = '', $range = 4) {
global $paged;
$showitems = ($range * 2)+1; // links to show
// init paged
if(empty($paged))
$paged = 1;
// init pages
if($pages == '') {
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages)
$pages = 1;
}
// if $pages more then one post
if(1 != $pages) {
//echo '<div class="wds-pagination"><span>Page ' . $paged . ' of ' . $pages . '</span>';
// First link
if($paged > 2 && $paged > $range+1 && $showitems < $pages)
echo '<a href="' . get_pagenum_link(1) . '">1</a>';
// Previous link
if($paged > 5 && $showitems < $pages){
echo '<span class="nav_ext">...</span>';
}
// Links of pages
for ($i=1; $i <= $pages; $i++)
if (1 != $pages && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
echo ($paged == $i) ? '<span>' . $i . '</span>' : '<a href="' . get_pagenum_link($i) . '">' . $i . 
'</a>';
// Next link
if ($paged < $pages && $showitems < $pages)
echo '<span class="nav_ext">...</span>';
// Last link
if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages)
echo '<a href="' . get_pagenum_link($pages) . '">'.$pages.'</a>';
//echo '</div>';
}
}

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
//add_filter('the_generator', '__return_empty_string');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function numToKs($number) {
    if ($number >= 1000) {
        return number_format(($number / 1000), 1) . '&nbsp;k';
    } else {
        return $number;
    }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
//remove_filter( 'sanitize_title', 'sanitize_title_with_dashes', 10 );
//add_filter( 'sanitize_title', 'wpse231448_sanitize_title_with_dashes', 10, 3 );
function wpse231448_sanitize_title_with_dashes( $title, $raw_title = '', $context = 'display' ) {
    $title = strip_tags($title);
    // Preserve escaped octets.
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    // Remove percent signs that are not part of an octet.
    $title = str_replace('%', '', $title);
    // Restore octets.
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
    if (seems_utf8($title)) {
        if (function_exists('mb_strtolower')) {
            $title = mb_strtolower($title, 'UTF-8');
        }
        $title = utf8_uri_encode($title, 200);
    }
    $title = strtolower($title);
    if ( 'save' == $context ) {
        // Convert nbsp, ndash and mdash to hyphens
        $title = str_replace( array( '%c2%a0', '%e2%80%93', '%e2%80%94' ), '-', $title );
        // Convert nbsp, ndash and mdash HTML entities to hyphens
        $title = str_replace( array( '&nbsp;', '&#160;', '&ndash;', '&#8211;', '&mdash;', '&#8212;' ), '-', $title );
        // Strip these characters entirely
        $title = str_replace( array(
            // iexcl and iquest
            '%c2%a1', '%c2%bf',
            // angle quotes
            '%c2%ab', '%c2%bb', '%e2%80%b9', '%e2%80%ba',
            // curly quotes
            '%e2%80%98', '%e2%80%99', '%e2%80%9c', '%e2%80%9d',
            '%e2%80%9a', '%e2%80%9b', '%e2%80%9e', '%e2%80%9f',
            // copy, reg, deg, hellip and trade
            '%c2%a9', '%c2%ae', '%c2%b0', '%e2%80%a6', '%e2%84%a2',
            // acute accents
            '%c2%b4', '%cb%8a', '%cc%81', '%cd%81',
            // grave accent, macron, caron
            '%cc%80', '%cc%84', '%cc%8c',
        ), '', $title );
        // Convert times to x
        $title = str_replace( '%c3%97', 'x', $title );
    }
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    // WPSE-231448: Commented out this line below to stop dots being replaced by dashes.
    //$title = str_replace('.', '-', $title);
    // WPSE-231448: Add the dot to the list of characters NOT to be stripped.
    $title = preg_replace('/[^%a-z0-9 _\-\.]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');
    return $title;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_post_gallery_contents_($content2) {
    global $wpdb, $post, $opt_themes;
    if(is_singular() || is_home()){
		if(get_post_meta( $post->ID, 'wp_GP_ID', true )) {
        $ex_themes_page_titles_ = esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) );
        $ex_themes_datos_imagenes = get_post_meta(get_the_ID(), 'wp_images_GP', true);
        $ex_themes_if_ = get_post_meta( $post->ID, 'wp_images_GP', true );
        $content2 .= "<div id=\"gallery-3\" class=\"gallery galleryid-28459 gallery-columns-3 gallery-size-medium\">";
        if (get_post_meta( $post->ID, 'wp_images_GP', true )) {
            $datos_imagenes = $ex_themes_datos_imagenes;
            $i = 0;
            if(count($datos_imagenes)>3){
                foreach($datos_imagenes as $elemento) {
                    $content2 .= "<dl class=\"gallery-item\">";
                    $content2 .= "<dt class=\"gallery-icon portrait\">";
                    $content2 .= "<img src=\"";
                    $content2 .= $datos_imagenes[$i];
                    $content2 .= "\" data-spai=\"1\" class=\"attachment-medium size-medium\" title=\"";
                    $content2 .= $ex_themes_page_titles_;
                    $content2 .= "screen ";
                    $content2 .= $i;
                    $content2 .= "\" data-spai-upd=\"212\" width=\"226\" height=\"402\">";
                    $content2 .= "</dt>";
                    $content2 .= "</dl>";
                    if (++$i == 3) break; } } }
        $content2 .= "<br style=\"clear: both\">";
        $content2 .= "</div>";
        return $content2;
		} else {
        #### if not a post/page then don't include sharing button
        return $content2;
		}
	}
};
add_filter( 'the_content2', 'ex_themes_post_gallery_contents_');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_post_youtube_contents_($content2) {
    global $wpdb, $post, $opt_themes;
    if(is_singular() || is_home()){
		if(get_post_meta( $post->ID, 'wp_GP_ID', true )) {
        $ex_themes_page_titles_ = esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) );
        $ex_themes_datos_youtube = get_post_meta(get_the_ID(), 'wp_youtube_GP', true);
        $ex_themes_if_ = get_post_meta( $post->ID, 'wp_youtube_GP', true );
        if (get_post_meta( $post->ID, 'wp_youtube_GP', true )) {
            $content2 .= "<center>";
            $datos_youtube = $ex_themes_datos_youtube;
            $content2 .= "<iframe src=\"https://www.youtube.com/embed/";
            $content2 .= $datos_youtube;
            $content2 .= "\" data-spai=\"1\" class=\"attachment-medium size-medium\" title=\"";
            $content2 .= $ex_themes_page_titles_;
            $content2 .= "screen ";
            $content2 .= $i;
            $content2 .= "\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" width=\"100%\" height=\"400px\"></iframe>";
            $content2 .= "<br style=\"clear: both\">";
            $content2 .= "</center>";
        }
         return $content2;
		} else {
        #### if not a post/page then don't include sharing button
        return $content2;
		}
	}    
};
//add_filter( 'the_content2', 'ex_themes_post_youtube_contents_');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
//add_filter( 'the_content', 'ex_themes_post_youtube_contents_insert_' );
function ex_themes_post_youtube_contents_insert_( $content ) {
    global $opt_themes;
    $activate = $opt_themes['ex_themes_youtube_content_activate_'];
    $numbers = $opt_themes['ex_themes_youtube_content_paragraph_on_'];
    $random = mt_rand(1,8);
    if (($activate == '1'))
        $ex_themes_post_youtube_contents_code_ = ex_themes_post_youtube_contents_($content2);
    if($numbers=='0') {
        return ex_themes_post_youtube_contents_after_paragraph_( $ex_themes_post_youtube_contents_code_, $random, $content );
    } else {
        return ex_themes_post_youtube_contents_after_paragraph_( $ex_themes_post_youtube_contents_code_, $numbers, $content );
    }
    if ( is_single() && ! is_admin() ) {
        return ex_themes_post_youtube_contents_after_paragraph_( $ex_themes_post_youtube_contents_code_, $numbers, $content );
    }
    return $content;
}
function ex_themes_post_youtube_contents_after_paragraph_( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    return implode( '', $paragraphs );
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_action( 'before_delete_post', 'wps_remove_attachment_with_post', 10 );
function wps_remove_attachment_with_post($post_id)
{
    if(has_post_thumbnail( $post_id ))
    {
        $attachment_id = get_post_thumbnail_id( $post_id );
        wp_delete_attachment($attachment_id, true);
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function exthemes_post_likes() {
    // Check if single post
    if(is_singular('post')) {
        ob_start();
        ?>
<div class="likes">
	<a href="<?php echo add_query_arg('post_action', 'like'); ?>">
		<span class="like-plus">
			<svg width="24" height="24">
				<use xlink:href="#i__thumbup"/>
			</svg>+
			<span  class="ignore-select" <?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?> <?php } ?>>
				<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php echo RTL_Nums(exthemes_post_likes_count('likes')); ?><?php } else { ?><?php echo exthemes_post_likes_count('likes'); ?><?php } ?>
			</span>
		</span>
		<span class="sr-only">
			<?php global $opt_themes; if($opt_themes['exthemes_Like']) { ?>
			<?php echo $opt_themes['exthemes_Like']; ?>
			<?php } ?>
		</span>
	</a>
	<a href="<?php echo add_query_arg('post_action', 'dislike'); ?>">
		<span class="like-minus">
			<svg width="24" height="24">
				<use xlink:href="#i__thumbdown"/>
			</svg>-
			<span  class="ignore-select" <?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?> <?php } ?>>
				<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php echo RTL_Nums(exthemes_post_likes_count('dislikes')); ?><?php } else { ?><?php echo exthemes_post_likes_count('dislikes'); ?><?php } ?>
			</span>
			<span class="sr-only">
				<?php global $opt_themes; if($opt_themes['exthemes_Dislike']) { ?>
				<?php echo $opt_themes['exthemes_Dislike']; ?>
				<?php } ?>
			</span>
		</span>
	</a>
</div>
	<?php
        $output = ob_get_clean();
        return $output;
    } else {
        return $output;
    }
}
add_filter('the_content1', 'exthemes_post_likes');
//---- Get like or dislike count
function exthemes_post_likes_count($type = 'likes') {
    $current_count = get_post_meta(get_the_id(), $type, true);
    return ($current_count ? $current_count : 0);
}
//---- Process like or dislike
function ip_process_like() {
    $processed_like = false;
    $redirect       = false;
    // Check if like or dislike
    if(is_singular('post')) {
        if(isset($_GET['post_action'])) {
            if($_GET['post_action'] == 'like') {
                // Like
                $like_count = get_post_meta(get_the_id(), 'likes', true);
                if($like_count) {
                    $like_count = $like_count + 1;
                }else {
                    $like_count = 1;
                }
                $processed_like = update_post_meta(get_the_id(), 'likes', $like_count);
            }elseif($_GET['post_action'] == 'dislike') {
                // Dislike
                $dislike_count = get_post_meta(get_the_id(), 'dislikes', true);
                if($dislike_count) {
                    $dislike_count = $dislike_count + 1;
                }else {
                    $dislike_count = 1;
                }
                $processed_like = update_post_meta(get_the_id(), 'dislikes', $dislike_count);
            }
            if($processed_like) {
                $redirect = get_the_permalink();
            }
        }
    }
    // Redirect
    if($redirect) {
        wp_redirect($redirect);
        die;
    }
}
add_action('template_redirect', 'ip_process_like');
function exthemes_posts_column_like( $columns ) {
    $columns['likes'] = 'Info';
    return $columns;
}

function exthemes_posts_custom_column_like( $column ) {
    if ( $column === 'likes') {
			 
			$total_likes		= exthemes_post_likes_count('likes');
			$total_dislikes		= exthemes_post_likes_count('dislikes');
			$total_view_post	= ex_themes_get_post_view_();
			 
			echo '<b style="display: block;height: 2em;background-color: #2271b1;border-radius: 5px;margin-bottom: 10px;" title="Total Likes : '.$total_likes.'"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;'.$total_likes.'</b>'; 
			echo '<b style="display: block;height: 2em;background-color: #2271b1;border-radius: 5px;margin-bottom: 10px;" title="Total Dislikes : '.$total_dislikes.'"><i class="fa fa-thumbs-down" aria-hidden="true"></i>&nbsp;'.$total_dislikes.'</b>';	
			 		
			/* echo '<b style="display: block;height: 2em;background-color: #2271b1;border-radius: 5px;margin-bottom: 10px;" title="Total View Post : '.$total_view_post.'"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;'.$total_view_post.'</b>'; */
    } 
}
add_filter( 'manage_posts_columns', 'exthemes_posts_column_like' );
add_action( 'manage_posts_custom_column', 'exthemes_posts_custom_column_like' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function exthemes_news_likes() {
    // Check if single post
    if(is_singular('news')) {
        ob_start();
        ?>
        <div class="likes">
            <a href="<?php echo add_query_arg('post_action', 'like'); ?>">
			<span class="like-plus"><svg width="24" height="24"><use xlink:href="#i__thumbup"></use></svg>+<span  class="ignore-select"><?php echo exthemes_post_likes_count('likes') ?></span></span>
			<span class="sr-only"><?php global $opt_themes; if($opt_themes['exthemes_Like']) { ?><?php echo $opt_themes['exthemes_Like']; ?><?php } ?></span>
            </a>
            <a href="<?php echo add_query_arg('post_action', 'dislike'); ?>">
			<span class="like-minus"><svg width="24" height="24"><use xlink:href="#i__thumbdown"></use></svg>-<span  class="ignore-select"><?php echo exthemes_post_likes_count('dislikes') ?></span><span class="sr-only"><?php global $opt_themes; if($opt_themes['exthemes_Dislike']) { ?><?php echo $opt_themes['exthemes_Dislike']; ?><?php } ?></span></span>
            </a>
        </div>
        <?php
        $output = ob_get_clean();
        return $output;
		} else {
        return $output;
		}
}
add_filter('the_content2', 'exthemes_news_likes');
//---- Get like or dislike count
function exthemes_news_likes_count($type = 'likes') {
    $current_count = get_post_meta(get_the_id(), $type, true);
    return ($current_count ? $current_count : 0);
}
//---- Process like or dislike
function news_process_like() {
    $processed_like = false;
    $redirect       = false;
    // Check if like or dislike
    if(is_singular('news')) {
        if(isset($_GET['post_action'])) {
            if($_GET['post_action'] == 'like') {
                // Like
                $like_count = get_post_meta(get_the_id(), 'likes', true);
                if($like_count) {
                    $like_count = $like_count + 1;
                }else {
                    $like_count = 1;
                }
                $processed_like = update_post_meta(get_the_id(), 'likes', $like_count);
            }elseif($_GET['post_action'] == 'dislike') {
                // Dislike
                $dislike_count = get_post_meta(get_the_id(), 'dislikes', true);
                if($dislike_count) {
                    $dislike_count = $dislike_count + 1;
                }else {
                    $dislike_count = 1;
                }
                $processed_like = update_post_meta(get_the_id(), 'dislikes', $dislike_count);
            }
            if($processed_like) {
                $redirect = get_the_permalink();
            }
        }
    }
    // Redirect
    if($redirect) {
        wp_redirect($redirect);
        die;
    }
}
add_action('template_redirect', 'news_process_like');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_filter( 'get_comment_author', 'custom_comment_author', 10, 2 );
function custom_comment_author( $author, $commentID ) {
    $comment = get_comment( $commentID );
    $user = get_user_by( 'email', $comment->comment_author_email );
    if( !$user ):
        return $author;
    else:
        $firstname = get_user_meta( $user->ID, 'first_name', true );
        $lastname = get_user_meta( $user->ID, 'last_name', true );
        if( empty( $firstname ) OR empty( $lastname ) ):
            return $author;
        else:
            return $firstname . ' ' . $lastname;
        endif;
    endif;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function _5play_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="comments-tree-item-<?php comment_ID() ?>">
    <div id='comment-id-<?php comment_ID(); ?>'>
        <div class="comment ">
            <div class="comment-head">
                <div class="avatar-status">
                    <i class="avatar fit-cover"><?php echo get_avatar( $comment, 32 ); ?></i>
                </div>
                <span class="name truncate"><a><?php $cID = $comment->comment_ID; printf( __( '%2$s', '5play' ), get_comment_author_url($cID), get_comment_author($cID), get_comment_link($cID), get_comment_date('',$cID) ); ?></a></span>
                <div class="comment-meta">
                    <time class="date c-muted" datetime="<?php printf(  __( '%1$sT%2$s', '5play' ), get_comment_date(), get_comment_time() ); ?>"><?php printf(  __( '%1$s', '5play' ), get_comment_date(), get_comment_time() ); ?> <?php edit_comment_link(__('(Edit)'),'  ','') ?></time>
                </div>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Your comment is awaiting moderation.') ?></em>
                <br />
            <?php endif; ?>
            <div class="comment-text"><div id="comm-id-<?php comment_ID() ?>"><?php comment_text(); ?></div></div>
            <?php if($args['max_depth']!=$depth) { ?>
                <div class="comment-foot">
                    <ul class="comment-tools">
                        <li class="com__reply"> <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>  </li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function get_excerpt($limit, $source = null){
    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'&nbsp;&#8230;';
    return $excerpt;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
/* 
 printf( _x( '%s ago', '%s = human-readable time difference', 'your-text-domain' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); 

$comm .=  sprintf(  __( '<time class="date muted" datetime="%1$sT%2$s" style="var(--opacity)!important;color: white !important;">%1$sT%2$s</time>', '%s = human-readable time difference', '5play' ), human_time_diff(get_comment_date(), get_comment_time() ));

$comm .=  sprintf(  __( '<time class="date muted" datetime="%1$sT%2$s" style="var(--opacity)!important;color: white !important;">%1$sT%2$s</time>', '5play' ), get_comment_date(), get_comment_time() );
*/
function bg_recent_comments($no_comments = 3, $comment_len = 100, $avatar_size = 60) {
    global $comment;
    $comments_query = new WP_Comment_Query(); 
    $comments = $comments_query->query( array( 'number' => $no_comments, 'status'=>'approve' ) );
    $comm = '';
    if ( $comments ) : foreach ( $comments as $comment ) :
        $comm .= '<div class="entry entry-coms"><div class="item"><a class="user" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '"><i class="avatar fit-cover">';
        $comm .= get_avatar( $comment->comment_author_email, $avatar_size );
        $comm .= '</i><span class="fw-b truncate">';
        $comm .= get_comment_author( $comment->comment_ID ) . '</span></a>';
        $comm .= '<h2 class="title"><a class="item-link" href="' . esc_url(get_comment_link($comment->comment_ID)) . '" style="var(--opacity)!important;color: white !important;"><span class="truncate" style="var(--opacity) !important;color: white !important;">' . get_the_title($comment->comment_post_ID) . '</span></a></h2>';
        $comm .= '<div class="description">' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . ' </div> ';
        $comm .= sprintf(  __( '<time class="date muted" datetime="%1$sT%2$s" style="var(--opacity)!important;color: white !important;">%1$s</time>', '%s = human-readable time difference', '5play' ), get_comment_date(), get_comment_time() );
        $comm .= '<i class="entry-coms-reply"><svg width="24" height="24"><use xlink:href="#i__reply"></use></svg></i>';
        $comm .= '</div></div>';
    endforeach; else :
        $comm .= 'No comments.';
    endif;
    echo $comm;
}


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
/*
function exthemes_logout() {
	$linkXhomes = get_bloginfo('url');
    wp_redirect($linkXhomes);
    die;
}
add_action('wp_logout', 'exthemes_logout', PHP_INT_MAX);
function exthemes_login() {
	$linkXhomes = get_bloginfo('url');
    wp_redirect($linkXhomes);
    die;
}
add_action('wp_login', 'exthemes_login', PHP_INT_MAX);
*/
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function exthemes_download_page__noindex_nofollow() {
	global $wp_query;
	$noindex = "<meta name='robots' content='noindex,follow' />\n";
	$index = "<meta name='robots' content='index,follow' />\n";
	if ( ! isset( $wp_query->query_vars['download'] ) || ! is_singular() ) {
	echo $index;
	} else {
	echo $noindex;
	}
}
add_action( 'wp_head', 'exthemes_download_page__noindex_nofollow',1); 
function exthemes_get_page__noindex_nofollow() {
	global $wp_query;	
	$noindex = "<meta name='robots' content='noindex,follow' />\n";
	$index = "<meta name='robots' content='index,follow' />\n";
	if ( ! isset( $wp_query->query_vars['get'] ) || ! is_singular() ) {
	echo $index;
	} else {
	echo $noindex;
	}
}
//add_action( 'wp_head', 'exthemes_get_page__noindex_nofollow',1); 
function exthemes_get_files__noindex_nofollow() {
	global $wp_query;	
	$noindex = "<meta name='robots' content='noindex,follow' />\n";
	$index = "<meta name='robots' content='index,follow' />\n";
	if ( ! isset( $wp_query->query_vars['file'] ) || ! is_singular() ) {
	echo $index;
	} else {
	echo $noindex;
	}
}
//add_action( 'wp_head', 'exthemes_get_files__noindex_nofollow',1); 
function capitalize($str,$a_char = array("'","-"," ")){   
    //$str contains the complete raw name string
    //$a_char is an array containing the characters we use as separators for capitalization. If you don't pass anything, there are three in there as default.
    $string = strtolower($str);
    foreach ($a_char as $temp){
        $pos = strpos($string,$temp);
        if ($pos){
            //we are in the loop because we found one of the special characters in the array, so lets split it up into chunks and capitalize each one.
            $mend = '';
            $a_split = explode($temp,$string);
            foreach ($a_split as $temp2){
                //capitalize each portion of the string which was separated at a special character
                $mend .= ucfirst($temp2).$temp;
                }
            $string = substr($mend,0,-1);
            }   
        }
    return ucfirst($string);
}
/*
How to get the currently logged in user's role in wordpress?
https://stackoverflow.com/a/10085775
*/
function get_user_role() {
    global $current_user;
    $user_roles     = $current_user->roles;
    $user_role      = array_shift($user_roles);
    return $user_role;
}
/* user commnet count */
function get_user_comment_counts( $user_ID ) {
    global $wpdb;
    $count = $wpdb->get_var(
        $wpdb->prepare( "SELECT COUNT(comment_ID) FROM {$wpdb->comments} WHERE user_id = %d ", $user_ID )
    );
    return $count;
}


function display_last_login() {
global $current_user, $wp_roles;
get_currentuserinfo();
$user = wp_get_current_user();
$user_id = $user->ID;
$user_id = get_user_meta( $current_user->ID, '_last_login', false );
$last_login = get_user_meta( 'user_last_login_' . $current_user->ID );
if ( false === $last_login ) {
    $last_login = __( 'Never', 'textdomain' );
} else {
    $last_login = date( 'j F Y, H:i:s', $last_login );
}
echo '<p>Last Login: ' . $last_login . '</p>';

}


// set the last login date
add_action('wp_login','iiwp_set_last_login', 0, 2);
function iiwp_set_last_login($login, $user) {  
    $user = get_user_by('login',$login);
    $time = current_time( 'timestamp' );
    $last_login = get_user_meta( $user->ID, '_last_login', 'true' );
 
    if(!$last_login){
    update_usermeta( $user->ID, '_last_login', $time );
    }else{
    update_usermeta( $user->ID, '_last_login_prev', $last_login );
    update_usermeta( $user->ID, '_last_login', $time );
    }
 
}
 
// get last login date
function iiwp_get_last_login($user_id, $prev=null){
 
  $last_login   = get_user_meta($user_id);
  $time         = current_time( 'timestamp' );
 
  if(isset($last_login['_last_login_prev'][0]) && $prev){
          $last_login = get_user_meta($user_id, '_last_login_prev', 'true' );
  }else if(isset($last_login['_last_login'][0])){
          $last_login = get_user_meta($user_id, '_last_login', 'true' );
  }else{
    update_usermeta( $user_id, '_last_login', $time );
    $last_login = $last_login['_last_login'][0];
  }
 
  return $last_login;
}


function your_last_login($login) {
    global $user_ID;
    $user       = get_userdatabylogin($login);
    update_usermeta($user->ID, 'last_login', current_time('mysql'));
}
add_action('wp_login','your_last_login');
 
function get_last_login($user_id) {
    $last_login     = get_user_meta($user_id, 'last_login', true);
    $date_format    = 'j F Y, H:i';
    $the_last_login = mysql2date($date_format, $last_login, false);
    echo '<b>'.$the_last_login.'</b>';
		 
}


/*
https://gearside.com/online-users-wordpress-currently-active-last-seen/
*/
//Update user online status
add_action('init', 'gearside_users_status_init');
add_action('admin_init', 'gearside_users_status_init');
function gearside_users_status_init(){
	$logged_in_users = get_transient('users_status'); //Get the active users from the transient.
	$user = wp_get_current_user(); //Get the current user's data

	//Update the user if they are not on the list, or if they have not been online in the last 900 seconds (15 minutes)
	if ( !isset($logged_in_users[$user->ID]['last']) || $logged_in_users[$user->ID]['last'] <= time()-900 ){
		$logged_in_users[$user->ID] = array(
			'id' => $user->ID,
			'username' => $user->user_login,
			'last' => time(),
		);
		set_transient('users_status', $logged_in_users, 900); //Set this transient to expire 15 minutes after it is created.
	}
}

//Check if a user has been online in the last 15 minutes
function gearside_is_user_online($id){	
	$logged_in_users = get_transient('users_status'); //Get the active users from the transient.
	
	return isset($logged_in_users[$id]['last']) && $logged_in_users[$id]['last'] > time()-900; //Return boolean if the user has been online in the last 900 seconds (15 minutes).
}

//Check when a user was last online.
function gearside_user_last_online($id){
	$logged_in_users = get_transient('users_status'); //Get the active users from the transient.
	
	//Determine if the user has ever been logged in (and return their last active date if so).
	if ( isset($logged_in_users[$id]['last']) ){
		return $logged_in_users[$id]['last'];
	} else {
		return false;
	}
}

/*==========================
 This snippet shows how to add a column to the Users admin page with each users' last active date.
 Copy these contents to functions.php
 ===========================*/
 
 //Add columns to user listings
add_filter('manage_users_columns', 'gearside_user_columns_head');
function gearside_user_columns_head($defaults){
    $defaults['status'] = 'Status';
    return $defaults;
}
add_action('manage_users_custom_column', 'gearside_user_columns_content', 15, 3);
function gearside_user_columns_content($value='', $column_name, $id){
    if ( $column_name == 'status' ){
		if ( gearside_is_user_online($id) ){
			return '<strong style="color: green;">Online Now</strong>';
		} else {
			return ( gearside_user_last_online($id) )? '<small>Last Seen: <br /><em>' . date('M j, Y @ g:ia', gearside_user_last_online($id)) . '</em></small>' : ''; //Return the user's "Last Seen" date, or return empty if that user has never logged in.
		}
	}
}


/*==========================
 This snippet shows how to add an active user count to the WordPress Dashboard.
 Copy these contents to functions.php
 ===========================*/

//Active Users Metabox
add_action('wp_dashboard_setup', 'gearside_activeusers_metabox');
function gearside_activeusers_metabox(){
	global $wp_meta_boxes;
	wp_add_dashboard_widget('gearside_activeusers', 'Active Users', 'dashboard_gearside_activeusers');
}
function dashboard_gearside_activeusers(){
		$user_count = count_users();
		$users_plural = ( $user_count['total_users'] == 1 )? 'User' : 'Users'; //Determine singular/plural tense
		echo '<div><a href="users.php">' . $user_count['total_users'] . ' ' . $users_plural . '</a> <small>(' . gearside_online_users('count') . ' currently active)</small></div>';
}

//Get a count of online users, or an array of online user IDs.
//Pass 'count' (or nothing) as the parameter to simply return a count, otherwise it will return an array of online user data.
function gearside_online_users($return='count'){
	$logged_in_users = get_transient('users_status');
	
	//If no users are online
	if ( empty($logged_in_users) ){
		return ( $return == 'count' )? 0 : false; //If requesting a count return 0, if requesting user data return false.
	}
	
	$user_online_count = 0;
	$online_users = array();
	foreach ( $logged_in_users as $user ){
		if ( !empty($user['username']) && isset($user['last']) && $user['last'] > time()-900 ){ //If the user has been online in the last 900 seconds, add them to the array and increase the online count.
			$online_users[] = $user;
			$user_online_count++;
		}
	}

	return ( $return == 'count' )? $user_online_count : $online_users; //Return either an integer count, or an array of all online user data.
}

/*
https://wordpress.stackexchange.com/questions/34429/how-to-check-if-a-user-not-current-user-is-logged-in/34434#34434
*/
add_action('wp', 'update_online_users_status');
function update_online_users_status(){
  if(is_user_logged_in()){
    // get the online users list
    if(($logged_in_users = get_transient('users_online')) === false) $logged_in_users = array();

    $current_user = wp_get_current_user();
    $current_user = $current_user->ID;  
    $current_time = current_time('timestamp');

    if(!isset($logged_in_users[$current_user]) || ($logged_in_users[$current_user] < ($current_time - (15 * 60)))){
      $logged_in_users[$current_user] = $current_time;
      set_transient('users_online', $logged_in_users, 30 * 60);
    }
  }
}
function is_user_online($user_id) {
  // get the online users list
  $logged_in_users = get_transient('users_online');
  // online, if (s)he is in the list and last activity was less than 15 minutes ago
  return isset($logged_in_users[$user_id]) && ($logged_in_users[$user_id] > (current_time('timestamp') - (15 * 60)));
}

