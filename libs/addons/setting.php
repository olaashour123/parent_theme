<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 
if ( ! defined( 'ABSPATH' ) ) exit;
function rgbs($hex, $asString = true) {
	if (0 === strpos($hex, '#')) {
	$hex		= substr($hex, 1);
	} else if (0 === strpos($hex, '&H')) {
	$hex		= substr($hex, 2);
	}      
	$cutpoint	= ceil(strlen($hex) / 2)-1;
	$rgb		= explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);
	$rgb[0]		= (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
	$rgb[1]		= (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
	$rgb[2]		= (isset($rgb[2]) ? hexdec($rgb[2]) : 0);
	return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .8)" : $rgb);
} 
define('ex_themes_name_extractor_','Extractor APK');
define('ex_themes_version_extractor_','1.0');
define('spacescore','v');
define('BY', EXTHEMES_AUTHOR);
define('FB', EXTHEMES_FACEBOOK_URL);
define('TW', EXTHEMES_TWITTER_URL);
define('IG', EXTHEMES_INSTAGRAM_URL);
define('YT', EXTHEMES_YOUTUBE_URL);
define('webs', EXTHEMES_API_URL);
define('setting_opt','_options&tab=1');
define('options_setting','_options&tab=1');
define('addscriptx', 'libs/addons/libs/addscript');
define('footerx', 'libs/addons/libs/footer');
define('postnow', 'Get Now');
define('postnow2', postnow);
define('colors', '#000000');
define('colors_2', '#ffffff');
define('colors_rgb', rgbs(colors));
define('colors_url', rgbs(colors));
define('colors2', rgbs(colors_2));
define('font_size', '2.5rem');
define('font_size_alt', '1.1em');
define('font_size_alts', '1.7rem');
define('NO_ID', '<h1 style="text-align: center;">Sorry.... <u style="color: '.colors.';">ID Play Store</u> No Found</h1><h3 style="text-align: center;">Please Refresh Agains</h3>');
define('NOIMAGES', EX_THEMES_URI.'/assets/img/lazy.png' );

// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function wp_apk_admin_menu() {
    add_menu_page(
        __( ''.ex_themes_name_extractor_.' ', 'ex_themes_' ),
        ''.ex_themes_name_extractor_.' ',
        'manage_options',
        'wp_apk_mod_menu',
        'wp_docs',
        'dashicons-rest-api',
        //plugins_url( '/img/imdb.png' ),
        100
    );
    add_submenu_page( 'wp_apk_mod_menu', 'play.google.com', 'PLAY STORE', 'manage_options', 'wp_apk_googleplay', 'wp_googleplay' ); 
    add_submenu_page( 'wp_apk_mod_menu', 'apkmody.IO', 'APKMODY', 'manage_options', 'wp_apk_apkmody', 'wp_apkmody' );
    add_submenu_page( 'wp_apk_mod_menu', 'happymod.COM', 'HAPPYMOD', 'manage_options', 'wp_apk_happymod', 'wp_happymod' );
	add_submenu_page( 'wp_apk_mod_menu', 'getmodsapk.COM', 'GETMODSAPK', 'manage_options', 'wp_apk_getmodsapk', 'wp_getmodsapk' );
    add_submenu_page( 'wp_apk_mod_menu', 'modcombo.COM', 'MODCOMBO', 'manage_options', 'wp_apk_modcombo', 'wp_modcombo' ); 
    add_submenu_page( 'wp_apk_mod_menu', 'modder.me', 'MODDER ', 'manage_options', 'wp_apk_modder', 'wp_modder_errors' );
    add_submenu_page( 'wp_apk_mod_menu', 'techbigs.COM', 'TECHBIGS', 'manage_options', 'wp_apk_techbigs', 'wp_techbigs' );
    add_submenu_page( 'wp_apk_mod_menu', 'zmodapk.net', 'ZMODAPK ', 'manage_options', 'wp_apk_zmodapk', 'wp_zmodapk' );
    add_submenu_page( 'wp_apk_mod_menu', 'rexdl.com', 'REXDL', 'manage_options', 'wp_apk_rexdl', 'wp_rexdl' );
    
    /*
    <span class="awaiting-mod">new</span>
    add_submenu_page( 'wp_apk_mod_menu', 'coffeeapps.IR', 'COFFEEAPPS (for RTL)', 'manage_options', 'wp_apk_coffeeapps', 'wp_coffeeapps' );
    add_submenu_page( 'wp_apk_mod_menu', 'farsroid.COM', 'FARSROID', 'manage_options', 'wp_apk_farsroid', 'wp_farsroid' );
    add_submenu_page( 'wp_apk_mod_menu', '5play.RU', '5PLAY', 'manage_options', 'wp_apk_play5', 'wp_play5' );
    */
    add_submenu_page( 'wp_apk_mod_menu', 'setting', 'SETTING', 'manage_options', setting_opt, 'wpwm_settings' );
}
add_action('admin_menu', 'wp_apk_admin_menu');
require_once 'includes/techbigs.php';
require_once 'includes/modcombo.php';
require_once 'includes/apkstore.php';
require_once 'includes/getmodsapk.php';
require_once 'includes/happymod.php';
require_once 'includes/googleplay.php';
require_once 'includes/core.php';
require_once 'includes/apkmod.php'; 
require_once 'includes/apkmody.php'; 
require_once 'includes/zmodapk.php';
require_once 'includes/modder.php';
require_once 'includes/rexdl.php';
require_once 'vendor/autoload.php';
require_once 'includes/docs.php';
require_once 'includes/dom.php';
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
//enable upload for webp image files.
function webps_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webps_upload_mimes');

//enable preview / thumbnail for webp image files.
function webps_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webps_is_displayable', 10, 2);


function ex_themes_notices_php() {
if (!(PHP_VERSION_ID >= 80000)) {
     printf('<div class="notice notice-error is-dismissible"><p><b>'.strtoupper(THEMES_NAMES).'</b> require a PHP version 8.0 or UP. You site running '.PHP_VERSION.'. please update your PHP</p></div> ');
}
}
add_action( 'admin_notices', 'ex_themes_notices_php' );
