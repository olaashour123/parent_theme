<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Theme Updater
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => EXTHEMES_API_URL,
		'item_name' => EXTHEMES_NAME,
		'theme_slug' => EXTHEMES_SLUG, 
		'version' => EXTHEMES_VERSION, 
		'author' => EXTHEMES_AUTHOR, 
		'download_id' => '', 
		'renew_url' => EXTHEMES_ITEMS_URL,
		'beta'           => false
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'exthemes-wp' ),
		'enter-key' => __( 'Enter your theme license key.', 'exthemes-wp' ),
		'license-key' => __( 'License Key', 'exthemes-wp' ),
		'license-action' => __( 'License Action', 'exthemes-wp' ),
		'deactivate-license' => __( 'Deactivate License', 'exthemes-wp' ),
		'activate-license' => __( 'Activate License', 'exthemes-wp' ),
		'status-unknown' => __( 'License status is unknown.', 'exthemes-wp' ),
		'renew' => __( 'Renew?', 'exthemes-wp' ),
		'unlimited' => __( 'unlimited', 'exthemes-wp' ),
		'license-key-is-active' => __( 'License key is active.', 'exthemes-wp' ),
		'expires%s' => __( 'Expires : <b>%s</b>.', 'exthemes-wp' ),
		'%1$s/%2$-sites' => __( 'You have : <b>%1$s</b> / <b>%2$s</b> sites activated.', 'exthemes-wp' ),
		'license-key-expired-%s' => __( 'License key expired : <b>%s</b>.', 'exthemes-wp' ),
		'license-key-expired' => __( 'License key has expired.', 'exthemes-wp' ),
		'customer-name-%1$s' => __( 'Customer : <b>%1$s</b>', 'exthemes-wp' ),
		'customer-email-%1$s' => __( 'Emails : <b>%1$s</b>', 'exthemes-wp' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'exthemes-wp' ),
		'license-is-inactive' => __( 'License is inactive.', 'exthemes-wp' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'exthemes-wp' ),
		'site-is-inactive' => __( 'Site is inactive.', 'exthemes-wp' ),
		'license-status-unknown' => __( 'License status is unknown.', 'exthemes-wp' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'exthemes-wp' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'exthemes-wp' )
	)

);