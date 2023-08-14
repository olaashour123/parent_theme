<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory'            => 'libs/merlin', 
		'merlin_url'           => 'exthemes-wizard', 
		'parent_slug'          => 'themes.php', 
		/* 'capability'           => 'manage_options',  */
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', 
		'dev_mode'             => true, 
		'license_step'         => true, 
		'license_required'     => true, 
		'license_help_url'     => EXTHEMES_MEMBER_URL, 
		'edd_remote_api_url'   => EXTHEMES_API_URL,  
		'edd_item_name'        => EXTHEMES_NAME, 
		'edd_theme_slug'       => ext.heme, 
		/* 'ready_big_button_url' => '',  */
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Import Demos '.EX_THEMES_NAMES_.'', THEMES_NAMES ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', THEMES_NAMES ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', THEMES_NAMES ),
		'ignore'                   => esc_html__( 'Disable '.EX_THEMES_NAMES_.' wizard', THEMES_NAMES ),

		'btn-skip'                 => esc_html__( 'Skip', THEMES_NAMES ),
		'btn-next'                 => esc_html__( 'Next', THEMES_NAMES ),
		'btn-start'                => esc_html__( 'Start', THEMES_NAMES ),
		'btn-no'                   => esc_html__( 'Cancel', THEMES_NAMES ),
		'btn-plugins-install'      => esc_html__( 'Install', THEMES_NAMES ),
		'btn-child-install'        => esc_html__( 'Install', THEMES_NAMES ),
		'btn-content-install'      => esc_html__( 'Install', THEMES_NAMES ),
		'btn-import'               => esc_html__( 'Import', THEMES_NAMES ),
		'btn-license-activate'     => esc_html__( 'Activate', THEMES_NAMES ),
		'btn-license-skip'         => esc_html__( 'Later', THEMES_NAMES ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', THEMES_NAMES ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', THEMES_NAMES ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key and double click or Click 2x Activate Button', THEMES_NAMES ),
		'license-label'            => esc_html__( 'License key', THEMES_NAMES ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', THEMES_NAMES ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', THEMES_NAMES ),
		'license-tooltip'          => esc_html__( 'Need help?', THEMES_NAMES ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', THEMES_NAMES ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', THEMES_NAMES ),
		'welcome%s'                => esc_html__( 'This wizard will set up '.EX_THEMES_NAMES_.' theme, install plugins, and import content. It is optional & should take only a few minutes.', THEMES_NAMES ),
		'welcome-success%s'        => esc_html__( 'You may have already run '.EX_THEMES_NAMES_.' theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', THEMES_NAMES ),

		'child-header'             => esc_html__( 'Install '.EX_THEMES_NAMES_.' Child Theme', THEMES_NAMES ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', THEMES_NAMES ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', THEMES_NAMES ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', THEMES_NAMES ),
		'child-action-link'        => esc_html__( 'Learn about child themes', THEMES_NAMES ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', THEMES_NAMES ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', THEMES_NAMES ),

		'plugins-header'           => esc_html__( 'Install Plugins', THEMES_NAMES ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', THEMES_NAMES ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', THEMES_NAMES ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', THEMES_NAMES ),
		'plugins-action-link'      => esc_html__( 'Advanced', THEMES_NAMES ),

		'import-header'            => esc_html__( 'Import Demo Content ', THEMES_NAMES ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.Choose Your Preferred demo from below.', THEMES_NAMES ),
		'import-action-link'       => esc_html__( 'Advanced', THEMES_NAMES ),

		'ready-header'             => esc_html__( 'All done. Have fun!', THEMES_NAMES ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', THEMES_NAMES ),
		'ready-action-link'        => esc_html__( 'Extras', THEMES_NAMES ),
		'ready-big-button'         => esc_html__( 'View your website', THEMES_NAMES ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__( 'Explore WordPress', THEMES_NAMES ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://exthem.es', esc_html__( 'Get Theme Support', THEMES_NAMES ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', THEMES_NAMES ) ),
	)
);
