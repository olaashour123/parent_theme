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
if( ! defined( 'ABSPATH' ) ) exit;
ini_set('display_errors', ERRORS);
$checks = 'edd_updater_admin';

if ( !class_exists( $checks ) ) {
	include( EX_THEMES_DIR. '/libs/merlin/vendor/monolog/monolog/src/Monolog/Handler/Slack/ClassDebugRecords.php' );
}
 
$updater = new $checks (
	$config = array(
		'remote_api_url'	=> exthemes,
		'item_name'			=> EXTHEMES_NAME,
		'theme_slug'		=> ext.heme, 
		'version'			=> EXTHEMES_VERSION, 
		'author'			=> EXTHEMES_AUTHOR, 
		'download_id'		=> '', 
		'renew_url'			=> EXTHEMES_ITEMS_URL,
		'beta'				=> false
	),	
	
	$strings = array(
		'theme-license'			=> __( 'Theme License', THEMES_NAMES ),
		'enter-key'				=> __( 'Enter your theme license key', THEMES_NAMES ),
		'license-key'			=> __( 'License Key', THEMES_NAMES ),
		'license-action'		=> __( 'License Action', THEMES_NAMES ),
		'deactivate-license'	=> __( 'Deactivate License', THEMES_NAMES ),
		'activate-license'		=> __( 'Activate License', THEMES_NAMES ),
		'status-unknown'		=> __( 'License status is unknown', THEMES_NAMES ),
		'renew'					=> __( 'Renew?', THEMES_NAMES ),
		'unlimited'				=> __( 'unlimited', THEMES_NAMES ),
		'license-key-is-active'	=> __( 'License key is active', THEMES_NAMES ),
		'expires%s'				=> __( '<b style="color: crimson;">Expires</b> <b>%s</b>', THEMES_NAMES ),
		'%1$s/%2$-sites'		=> __( '<b style="color: crimson;">Sites</b> <b>%1$s</b> / <b>%2$s</b> sites activated', THEMES_NAMES ),
		'license-key-expired-%s' => __( '<b style="color: crimson;">License key expired</b> <b>%s</b>', THEMES_NAMES ),
		'license-key-expired'	=> __( '<b style="color: crimson;">License key has expired</b>', THEMES_NAMES ),
		'expires-never'			=> __( 'Never expired', THEMES_NAMES ),
		'customer-name-%1$s'	=> __( 'Customer <b>%1$s</b>', THEMES_NAMES ),
		'customer-email-%1$s'	=> __( '<b style="color: crimson;">Emails</b> <b>%1$s</b>', THEMES_NAMES ),
		'license-keys-do-not-match' => __( 'License keys do not match', THEMES_NAMES ),
		'license-is-inactive'	=> __( 'License is inactive', THEMES_NAMES ),
		'license-key-is-disabled' => __( 'License key is disabled', THEMES_NAMES ),
		'site-is-inactive'		=> __( 'Site is inactive', THEMES_NAMES ),
		'license-status-unknown' => __( 'License status is unknown', THEMES_NAMES ),
		'update-notice'			=> __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update", THEMES_NAMES ),
		'update-available'		=> __('<b>%1$s %2$s</b> Themes is available. <br><br><a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>', THEMES_NAMES ),
		'update-available2'		=> __('<b>%1$s %2$s</b> Themes is available. <br><a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>', THEMES_NAMES ),
		'info-update'			=> __(''.THEMES_NAMES.' v'.VERSION.' old version, <b>%1$s v.%2$s</b> Themes is Ready available.', THEMES_NAMES ),
		'info-update2'			=> __('<a href="%3$s" class="cool-link" title="%4s" style="color: firebrick;">Check out what\'s new</a> or <a href="%5$s"%6$s class="cool-link" style="color: firebrick;">update now</a>', THEMES_NAMES )
	)
);