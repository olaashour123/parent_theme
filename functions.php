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
@ini_set('WP_MEMORY_LIMIT', '256M');
@ini_set('WP_MAX_MEMORY_LIMIT', '256M');
@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');
@ini_set('pcre.recursion_limit',20000000);
@ini_set('pcre.backtrack_limit',10000000);
$theme_version		= wp_get_theme()->get( 'Version' );
$theme_name			= wp_get_theme()->get( 'Name' );
$theme_url			= wp_get_theme()->get( 'AuthorURI' );
$link_sites			= get_bloginfo('url');;
$parse				= parse_url($link_sites);
$sites				= $parse['host'];
$gueganteng			='define';
$gueganteng('sulawesi', 'base64');
$gueganteng('selatan', '_decode');
$gueganteng('BS64D', sulawesi.selatan);
$mdr_xx_0  = BS64D;
define('ERRORS', 'off');
define('DOMAINSITES', $link_sites);
define('THEMES', $theme_name);
define('VERSION', $theme_version);
define('SLUGSX', 'exthemes');
define('THEMES_NAMES', THEMES);
define('EX_THEMES_NAMES_', THEMES);
define('EX_THEMES_NAMES', THEMES);
define('EX_THEMES_NAMES2_', THEMES);
define('EX_THEMES_NAMES_2', THEMES);
define('EX_THEMES_VERSION', VERSION);
define('EXTHEMES_VERSION', VERSION);
define('EX_THEMES_SLUGS_', SLUGSX);
define('EX_THEMES_SPACES', 'v');
define('SPACES_THEMES', EX_THEMES_SPACES);
define('EXTHEMES_NAME',  $theme_name.' Themes Premium' );
define('EXTHEMES_SLUG', SLUGSX);
define('EXTHEMES_API_URL', 'https://exthem.es' );
define('EXTHEMES_API_URLS', EXTHEMES_API_URL );
define('DEVS', 'Exthemes Devs' );
define('exthemes', $theme_url );
define('EXTHEMES_HELPS_NAME', 'exthemes_helps' );
define('EXTHEMES_AUTHOR', 'exthem.es' ); 
define('EXTHEMES_ITEMS_URL', EXTHEMES_API_URL.'/item/5play-themes-premium/' );
define('EXTHEMES_DEMOS_URL', 'https://5play.demos.web.id/' );
define('EXTHEMES_DEMO_RTL_URL', 'https://5play-rtl.demos.web.id/' );
define('EXTHEMES_DEMO_URL', EXTHEMES_DEMOS_URL );
define('EXTHEMES_MEMBER_URL', EXTHEMES_API_URL.'/dashboard/' );
define('EXTHEMES_MEMBERS', EXTHEMES_API_URL.'/dashboard/' );
define('EXTHEMES_HOW_TO', EXTHEMES_API_URL.'/how-to-see-my-license-key-and-download-link/' ); 
define('EXTHEMES_FACEBOOK_URL', 'https://www.facebook.com/groups/exthem.es' );
define('EXTHEMES_TWITTER_URL', 'https://twitter.com/ExThemes' );
define('EXTHEMES_INSTAGRAM_URL', 'https://www.instagram.com/exthem.es/' );
define('EXTHEMES_YOUTUBE_URL', 'https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA?sub_confirmation=1' );
define('EXTHEMES_LINKEDIN_URL', 'https://www.linkedin.com/in/bangreyblogs' );
define('EXTHEMES_TELEGRAM_URL', 'https://t.me/exthemes_helps' );
define('EXTHEMES_HELPS_URL', EXTHEMES_TELEGRAM_URL );
define('WEBSCHANGELOGS', 'https://demos.web.id/changelog-5play.php' );
define('WEBSSUPPORTS', 'https://demos.web.id/livesupports.php' );
define('SITUS', 'https://exthem.es' );
define('EXTHEMES_DEVS_BLOG', 'https://ex-themes.com' );
define('EX_THEMES_URI', get_template_directory_uri());
define('EX_THEMES_DIR', get_template_directory());
require EX_THEMES_DIR.'/libs/includes.php';
ini_set('display_errors', ERRORS);
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
// ADD YOUR CUSTOM CODE HERE 
// ~~~~~~~~~~~~~~~~~~~~~ @EXTHEMES DEVS ~~~~~~~~~~~~~~~~~~~~~~~~ \\ 
// ADD YOUR CUSTOM CODE BELOW
 
 