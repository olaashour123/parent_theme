<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
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
if ( ! class_exists( 'Redux' ) ) {
    return;
}
// This is your option name where all the Redux data is stored.
$opt_name					= "opt_themes";
$linksites					= get_bloginfo('url'); 
$parse						= parse_url($linksites); 
$sites						= $parse['host'];
// This is your option name where all the Redux data is stored.profile_url
$loginurl					= home_url( '/login/' );
$registerurl				= home_url( '/register/' );
$tosurl						= home_url( '/tos/' );
$profileurl					= home_url( '/profile/' );
$url						= home_url( '/' );
$url1						= get_bloginfo('url'); 
$linkX						= get_bloginfo('url');;
$parse						= parse_url($linkX);
$sites						= $parse['host'];
$admin_email				= get_bloginfo('admin_email'); 
$linkthemes					= get_bloginfo('template_directory');
$dir_image					= $linkthemes."/assets/img";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '<span class="dashicons dashicons-share-alt"></span> '.$theme->get( 'Name' ).'',
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ). ' - '.EXTHEMES_AUTHOR,
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
	'menu_title'           => __( 'Panel '.$theme->get( 'Name' ), THEMES_NAMES ),
	'page_title'           => __( ''.$theme->get( 'Name' ).' '.$theme->get( 'Version' ).'', THEMES_NAMES ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar dashicons-share-alt dashicons-dashboard
    'admin_bar_icon'       => 'dashicons-admin-multisite',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 999,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => false,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    // OPTIONAL -> Give you extra features
    'page_priority'        => 125,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => 'dashicons-admin-multisite',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '_options',
    // Page slug used to denote the panel
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.
    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    //'compiler'             => true,
    // HINTS
    'hints'               			=> array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'    			=> array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position' 			=> array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'   			=> array(
            'show'			=> array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide'			=> array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);
// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.

			$args['admin_bar_links'][] = array(
			'id'    => 'redux-docs',
			'href'  => EXTHEMES_YOUTUBE_URL,
			'title' => __( 'Doc', THEMES_NAMES ),
			);
			/*
			$args['admin_bar_links'][] = array(
			//'id'    => 'redux-support',
			'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
			'title' => __( 'Support', THEMES_NAMES ),
			);

			$args['admin_bar_links'][] = array(
			'id'    => 'redux-extensions',
			'href'  => 'reduxframework.com/extensions',
			'title' => __( 'Extensions', THEMES_NAMES ),
			);

*/
// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
			$args['share_icons'][] = array(
			'url'   => EXTHEMES_FACEBOOK_URL,
			'title' => 'Follow us on Facebook',
			'icon'  => 'el el-facebook'
			);
			$args['share_icons'][] = array(
			'url'   => EXTHEMES_TWITTER_URL,
			'title' => 'Follow us on Twitter',
			'icon'  => 'el el-twitter'
			);
			$args['share_icons'][] = array(
			'url'   => EXTHEMES_LINKEDIN_URL,
			'title' => 'Find us on LinkedIn',
			'icon'  => 'el el-linkedin'
			);
			$args['share_icons'][] = array(
			'url'   => EXTHEMES_YOUTUBE_URL,
			'title' => 'Find us on Youtube',
			'icon'  => 'el el-youtube'
			);

			$args['share_icons'][] = array(
			'url'   => EXTHEMES_INSTAGRAM_URL,
			'title' => 'Find us on Instagram',
			'icon'  => 'el el-instagram'
			);

			$args['share_icons'][] = array(
			'url'   => EXTHEMES_API_URL,
			'title' => 'Find us on Wordpress',
			'icon'  => 'el el-wordpress'
			);

// Panel Intro text -> before the form
if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    if ( ! empty( $args['global_variable'] ) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }
    //$args['intro_text'] = sprintf( __( '<noscript><p style="display:none">Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p></noscript>', THEMES_NAMES ), $v );
} else {
    //$args['intro_text'] = __( '<p style="display:none">This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', THEMES_NAMES );
}
// Add content after the form.
$args['footer_text'] = __( ' ', THEMES_NAMES );
Redux::setArgs( $opt_name, $args );


Redux::setSection( $opt_name, array(
    'title'            => __( 'Extractor APK', THEMES_NAMES ),
    'id'               => 'option_extractor_apk',
    'customizer_width' => '500px',
    'icon'             => 'el el-view-mode',
    'fields'		   => array(
		array(
		'id'			=> 'info_post_options',
		'type'			=> 'info',
		'title'			=> __('How to Post with Apk Extractor', THEMES_NAMES),
		'style'			=> 'critical',
		'desc'			=> __('<a href="'.get_option("home").'/wp-admin/admin.php?page=wp_apk_mod_menu" target="_blank" style="display: block; padding: 1em 0; text-align: center; "><img alt="" border="0" data-original-height="416" data-original-width="1085" src="'.EX_THEMES_URI.'/assets/img/ss.jpg"/></a>', THEMES_NAMES)
		),
			 
        array(
		'id'			=> 'ex_themes_extractor_apk_status_post_',
		'type'			=> 'select',
		'title'			=> __('Status Post', THEMES_NAMES),
		'desc'			=> __('Select for Status Post <u class="cool-link f2">&nbsp;&nbsp;Draft</u> or <u class="cool-link f2">&nbsp;&nbsp;Publish</u> <br> Default is <u class="cool-link f2">&nbsp;&nbsp;Publish</u> ', THEMES_NAMES), 
			'options'	=> array(
			'draft'		=> 'Draft',
			'publish'	=> 'Publish'
			),
		'default'			=> 'draft',
        ),
		array(
            'id'			=> 'ex_themes_extractor_apk_language_',
            'type'			=> 'select',
            'title'			=> __('Language', THEMES_NAMES), 
            'desc'			=> __('Select for <u class="cool-link f2">&nbsp;&nbsp;Language</u> <br> Default is <u class="cool-link f2">&nbsp;&nbsp;English</u>', THEMES_NAMES), 
            'options'		=> array(
                'en-US'		=> 'Default ( English )', 
                'af'		=> 'Afrikaans', 
                'sq'		=> 'Albanian', 
                'am'		=> 'Amharic', 
                'ar'		=> 'Arabic', 
                'hy'		=> 'Armenian', 
                'eu'		=> 'Basque', 
                'bg'		=> 'Bulgarian ', 
                'be'		=> 'Belarusian', 
                'bn'		=> 'Bengali - India', 
                'bs'		=> 'Bosnian', 
                'pt_BR'		=> 'Brazil', 
                'ca'		=> 'Catalan',  
                'zh_CN'		=> 'Chinese (PRC)', 
                'zh_TW'		=> 'Chinese Taiwan', 
                'zh_HK'		=> 'Chinese Hong Kong', 
                'hr'		=> 'Croatian', 
                'cs'		=> 'Czech', 
                'da'		=> 'Danish', 
                'et'		=> 'Estonian', 
                'fi'		=> 'Finnish', 
                'fil'		=> 'Filipino', 
                'fr'		=> 'French', 
                'gl'		=> 'Galician', 
                'de'		=> 'German', 
                'de_AT'		=> 'German - Austria', 
                'de_CH'		=> 'German - Switzerland', 
                'gsw'		=> 'German Swiss', 
                'el'		=> 'Greek', 
                'gu'		=> 'Gujarati', 
                'iw'		=> 'Hebrew ', 
                'hi'		=> 'Hindi', 
                'hu'		=> 'Hungarian', 
                'in'		=> 'Indonesia', 
                'it'		=> 'Italian', 
                'ja'		=> 'Japanese', 
                'ko'		=> 'Korean', 
                'lo'		=> 'Laos', 
                'mn'		=> 'Mongolian', 
                'mr'		=> 'Marathi', 
                'ms'		=> 'Malaysia', 
                'my'		=> 'Myanmar', 
                'no'		=> 'Norwegian ', 
                'ne'		=> 'Nepali', 
                'nl'		=> 'Netherlands',
                'fa'		=> 'Persian',  
                'pa'		=> 'Punjabi', 
                'pl'		=> 'Polish', 
                'pt_PT'		=> 'Portugal', 
                'ro'		=> 'Romania', 
                'ru'		=> 'Russian', 
                'sk'		=> 'Slovak', 
                'sl'		=> 'Slovenian', 
                'es'		=> 'Spanish', 
                'sr'		=> 'Serbian ', 
                'ta'		=> 'Tamil', 
                'te'		=> 'Telugu', 
                'th'		=> 'Thai', 
                'tr'		=> 'Turkish', 
                'uk'		=> 'Ukrainian',  
                'vi'		=> 'Vietnamese',
                'zu'		=> 'Zulu' 
            ),
				'default'		=> 'en-US',
			),
        array(
            'id'				=>  'ex_themes_extractor_apk_title_',
            'type'				=> 'select',
            'title'				=> __('Title Post', THEMES_NAMES),
            'desc'				=> __('Select for Title Post <u class="cool-link f2">&nbsp;&nbsp;Title Mods</u> or <u class="cool-link f2">&nbsp;&nbsp;Title PlayStore</u> 
<br>
  Default is <u class="cool-link f2">&nbsp;&nbsp;Title PlayStore</u>', THEMES_NAMES), 
				'options'		=> array(
					'title'		=> 'Title Mods',
					'title_GP'	=> 'Title PlayStore'
				),
            'default'			=> 'title_GP',
        ),
        array(
            'id'				=>  'ex_themes_extractor_apk_permalink_',
            'type'				=> 'select',
            'title'				=> __('Permalink Post', THEMES_NAMES),
            'desc'				=> __('Select for Permalink Post <u class="cool-link f2">&nbsp;&nbsp;Permalink Title Mods</u> or <u class="cool-link f2">&nbsp;&nbsp;Permalink Title Playstore</u><br>
 Default is <u class="cool-link f2">&nbsp;&nbsp;Permalink Title Playstore</u>', THEMES_NAMES), 
				'options'		=> array(
					'title'		=> 'Permalink Title Mods',
					'title_GP'	=> 'Permalink Title Playstore'
				),
            'default'			=> 'title_GP',
        ),
        array(
            'id'				=>  'title_app_name_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Title App Name', THEMES_NAMES ), 
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to use <u class="cool-link f2">Title Playstore</u>', THEMES_NAMES ), 
            'default'			=> false
        ),
		array(
			'id'			=> 'duplicate_post',
			'type'			=> 'switch',
			'title'			=> 'Duplicate Post',			
			'desc'			=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> enable <u class="cool-link f2">Duplicate Post</u> after Submit Auto Post
			<br>
			Default is <u class="cool-link f2">&nbsp;&nbsp;ON</u>', THEMES_NAMES ), 
			'default'		=> true
		), 
		/* 
        array(
            'id'				=>  'ex_themes_extractor_apk_debug_',
            'type'				=> 'switch',
            'title'				=> __( 'Showing Debugs', THEMES_NAMES ),
            'desc'				=> __('<i>for developer only *if you dont know leave it default OFF </i>', THEMES_NAMES),
            'default'			=> false
        ),
		*/
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Generals', THEMES_NAMES ),
    'id'               => 'dashboard_ex_themes',
    'customizer_width' => '700px',
    'icon'             => 'el el-screen',
    'subsection'       => false,
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Headers', THEMES_NAMES ),
    'id'               => 'header',
    'subsection'       => true,
    'customizer_width' => '700px',
    'icon'             => 'el el-cog',
    'fields'          			=> array(
        array(
            'id'				=>  'ex_themes_logo_headers_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Logo Header', THEMES_NAMES ), 
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable Logo Header', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'header_logo',
            'type'				=> 'media',
            'title'				=> __( 'Header Logo', THEMES_NAMES ),
            'default'			=> array(
					'url'		=> get_bloginfo('template_directory').'/assets/img/logos.png'					
					),
			'desc'				=> __( '<u class="cool-link f2">Upload Your Header Logo</u> ', THEMES_NAMES ), 
            'required'			=> array( 'ex_themes_logo_headers_active_', '=', true )
        ),
        array(
            'id'				=>  'aktif_favicon',
            'type'				=> 'switch',
            'title'				=> __( 'Favicons', THEMES_NAMES ), 
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable Favicons', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'favicon',
            'type'				=> 'media',
            'title'				=> __( 'Favicon Logo', THEMES_NAMES ),
            'default'			=> array(
					'url'		=> get_bloginfo('template_directory') . '/assets/img/logo_footer.png'
					),
			'desc'				=> __( '<u class="cool-link f2">Upload Your Favicon</u> ', THEMES_NAMES ), 
            'required'			=> array( 'aktif_favicon', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_login_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Menu Login', THEMES_NAMES ), 
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable Login on Header Menu ', THEMES_NAMES ),
            'default'			=> false
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', THEMES_NAMES ),
    'id'               => 'footers',
    'customizer_width' => '500px',
    'subsection'       => true,
    'icon'             => 'el el-cog',
    'fields'		  			=> array(
        array(
            'id'				=>  'ex_themes_footers_code_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Statistic Codes', THEMES_NAMES ), 
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable Statistic Codes', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_footers_code_',
            'type'				=> 'textarea',
            'title'				=> __( 'Analytics', THEMES_NAMES ),
            'desc'				=> __( 'HTML Allowed', THEMES_NAMES ), 
            'default'			=> '',
            'required'			=> array( 'ex_themes_footers_code_active_', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_footers_copyrights_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Footer Copyright', THEMES_NAMES ),  
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Footer Copyright', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_footers_copyrights_code_',
            'type'				=> 'textarea',
            'title'				=> __( 'Footer Copyright', THEMES_NAMES ),
            'desc'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'default'			=> "<a href='".get_option('home')."'>".get_option('blogname')."</a> - © <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> All rights reserved - Developer by <a href='".EXTHEMES_API_URL."' title='premium wordpress themes - ".DEVS."'><strong style='text-transform: capitalize;'>".DEVS."</strong></a>",
            'required'			=> array( 'ex_themes_footers_copyrights_active_', '=', true )
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Colour & Styles', THEMES_NAMES ),
    'id'               => 'color_styles',
    'customizer_width' => '700px',
    'icon'             => 'el el-tint',
    'subsection'       => false,
    'fields'		   => array(			
			array(
			'id'				=> 'font_body',
			'type'				=> 'text',
			'title'				=> __('Fonts Body', THEMES_NAMES),
			'default'			=> '\'Segoe UI\', sans-serif',		
			'desc'				=> __( '*Default is, <code style="color: #0073aa;">\'Segoe UI\', sans-serif</code><br> Click Here To Get Font <a href="https://www.cdnfonts.com/" target="_blank">cdnfonts.com</a>', THEMES_NAMES ), 
			),
			array(
			'id'				=> 'font_body_link_custom',
			'type'				=> 'text',
			'title'				=> __( 'Url Link Fonts', THEMES_NAMES ),
			'default'			=> 'https://fonts.cdnfonts.com/css/segoe-ui-4',			 
			'desc'				=> __( '*Default is, <br><code style="color: #0073aa;">https://fonts.cdnfonts.com/css/segoe-ui-4</code><br> Click Here To Get Font <a href="https://www.cdnfonts.com/" target="_blank">cdnfonts.com</a>', THEMES_NAMES )
			),
			array(
            'id'				=> 'bg_color',
            'type'				=> 'color',
            'title'				=> __('Background Color', THEMES_NAMES),
            'desc'				=> __('Pick Background Color for the theme (default: #EFF7F1).', THEMES_NAMES),
            'default'			=> '#EFF7F1',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'bg_color_dark',
            'type'				=> 'color',
            'title'				=> __('Background Color  (dark)', THEMES_NAMES),
            'desc'				=> __('Pick Background Color for the theme (default: #172B3D).', THEMES_NAMES),
            'default'			=> '#172B3D',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'header_color',
            'type'				=> 'color',
            'title'				=> __('Header Background ', THEMES_NAMES),
            'desc'				=> __('Pick Background Header Color for the theme (default: #ffffff).', THEMES_NAMES),
            'default'			=> '#ffffff',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'header_color_dark',
            'type'				=> 'color',
            'title'				=> __('Header Background (dark)', THEMES_NAMES),
            'desc'				=> __('Pick Background Header Color for the theme (default: #2A4055) (dark).', THEMES_NAMES),
            'default'			=> '#2A4055',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'footer_color',
            'type'				=> 'color',
            'title'				=> __('Footer Background ', THEMES_NAMES),
            'desc'				=> __('Pick Background Footer Color for the theme (default: #142636).', THEMES_NAMES),
            'default'			=> '#142636',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'footer_color_dark',
            'type'				=> 'color',
            'title'				=> __('Footer Background (dark)', THEMES_NAMES),
            'desc'				=> __('Pick Background Footer Color for the theme (default: #091521).', THEMES_NAMES),
            'default'			=> '#091521',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_link',
            'type'				=> 'color',
            'title'				=> __('Link Url', THEMES_NAMES),
            'desc'				=> __('Pick Color Link Url for the theme (default: #999999).', THEMES_NAMES),
            'default'			=> '#999999',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_link_dark',
            'type'				=> 'color',
            'title'				=> __('Link Url (dark)', THEMES_NAMES),
            'desc'				=> __('Pick Color Link Url for the theme (default: #fff).', THEMES_NAMES),
            'default'			=> '#fff',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_link_hover',
            'type'				=> 'color',
            'title'				=> __('Link Hover', THEMES_NAMES),
            'desc'				=> __('Pick Color Link Hover for the theme (default: #438bd3).', THEMES_NAMES),
            'default'			=> '#438bd3',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_link_menu',
            'type'				=> 'color',
            'title'				=> __('Link Menu', THEMES_NAMES),
            'desc'				=> __('Pick Color Link Menu for the theme (default: #000000).', THEMES_NAMES),
            'default'			=> '#000000',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_link_menu_dark',
            'type'				=> 'color',
            'title'				=> __('Link Menu (dark)', THEMES_NAMES),
            'desc'				=> __('Pick Color Link Menu for the theme (default: #fff).', THEMES_NAMES),
            'default'			=> '#fff',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_text',
            'type'				=> 'color',
            'title'				=> __('Body Text Color', THEMES_NAMES),
            'desc'				=> __('Pick Color Heading Text for the theme (default: #172B3D).', THEMES_NAMES),
            'default'			=> '#172B3D',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_text_dark',
            'type'				=> 'color',
            'title'				=> __('Body Text Color (dark)', THEMES_NAMES),
            'desc'				=> __('Pick Color Text for the theme (default: #fff).', THEMES_NAMES),
            'default'			=> '#fff',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_button',
            'type'				=> 'color',
            'title'				=> __('Button', THEMES_NAMES),
            'desc'				=> __('Pick Color Button for the theme (default: #008080).', THEMES_NAMES),
            'default'			=> '#008080',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_border_button',
            'type'				=> 'color',
            'title'				=> __('Border Button', THEMES_NAMES),
            'desc'				=> __('Pick Color Border Button for the theme (default: #008080).', THEMES_NAMES),
            'default'			=> '#008080',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_button_hover',
            'type'				=> 'color',
            'title'				=> __('Button Hover', THEMES_NAMES),
            'desc'				=> __('Pick Color Button Hover for the theme (default: #008080).', THEMES_NAMES),
            'default'			=> '#008080',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_svg',
            'type'				=> 'color',
            'title'				=> __('SVG Icon', THEMES_NAMES),
            'desc'				=> __('Pick SVG Icon Color for the theme (default: #008080).', THEMES_NAMES),
            'default'			=> '#008080',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_svg_hover',
            'type'				=> 'color',
            'title'				=> __('SVG Hover', THEMES_NAMES),
            'desc'				=> __('Pick SVG Icon Hover Color for the theme (default: #008080).', THEMES_NAMES),
            'default'			=> '#008080',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_rgba',
            'type'				=> 'color',
            'title'				=> __('Rgba', THEMES_NAMES),
            'desc'				=> __('Pick Rgba Color for the theme (default: #FEDE4A).', THEMES_NAMES),
            'default'			=> '#FEDE4A',
            'validate'			=> 'color',
			),        
			array(
            'id'				=>  'color_rgba_background',
            'type'				=> 'color',
            'title'				=> __('Rgba Hover', THEMES_NAMES),
            'desc'				=> __('Pick RGBA Color Hover for the theme (default: #008080).', THEMES_NAMES),
            'default'			=> '#008080',
            'validate'			=> 'color',
			),	
			array(
            'id'				=>  'color_sosmed_icon',
            'type'				=> 'color',
            'title'				=> __('Social Icons', THEMES_NAMES),
            'desc'				=> __('Pick Social Icons Color for the theme (default: #008080).', THEMES_NAMES),
            'default'			=> '#008080',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_s_yellow',
            'type'				=> 'color',
            'title'				=> __('Color Yellow', THEMES_NAMES),
            'desc'				=> __('Pick Color Yellow for the theme (default: #f9bd3b).', THEMES_NAMES),
            'default'			=> '#f9bd3b',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'color_s_yellow_bg',
            'type'				=> 'color',
            'title'				=> __('Color Background 1 Yellow', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 1 Yellow for the theme (default: #FEDE4A).', THEMES_NAMES),
            'default'			=> '#FEDE4A',
            'validate'			=> 'color',
			),			
			array(
            'id'				=> 'color_s_yellow_bg_2',
            'type'				=> 'color',
            'title'				=> __('Color Background 2 Yellow', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 2 Yellow for the theme (default: #F8B035).', THEMES_NAMES),
            'default'			=> '#F8B035',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_s_green',
            'type'				=> 'color',
            'title'				=> __('Color Green', THEMES_NAMES),
            'desc'				=> __('Pick Color Green for the theme (default: #45c368).', THEMES_NAMES),
            'default'			=> '#45c368',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'color_s_green_bg',
            'type'				=> 'color',
            'title'				=> __('Color Background 1 green', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 1 green for the theme (default: #4CCB70).', THEMES_NAMES),
            'default'			=> '#4CCB70',
            'validate'			=> 'color',
			),			
			array(
            'id'				=> 'color_s_green_bg_2',
            'type'				=> 'color',
            'title'				=> __('Color Background 2 green', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 2 green for the theme (default: #3DBA60).', THEMES_NAMES),
            'default'			=> '#3DBA60',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_s_purple',
            'type'				=> 'color',
            'title'				=> __('Color Purple', THEMES_NAMES),
            'desc'				=> __('Pick Color Purple for the theme (default: #9248e1).', THEMES_NAMES),
            'default'			=> '#9248e1',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'color_s_purple_bg',
            'type'				=> 'color',
            'title'				=> __('Color Background 1 purple', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 1 purple for the theme (default: #9B54E8).', THEMES_NAMES),
            'default'			=> '#9B54E8',
            'validate'			=> 'color',
			),			
			array(
            'id'				=> 'color_s_purple_bg_2',
            'type'				=> 'color',
            'title'				=> __('Color Background 2 purple', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 2 purple for the theme (default: #7126C1).', THEMES_NAMES),
            'default'			=> '#7126C1',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_s_red',
            'type'				=> 'color',
            'title'				=> __('Color Red', THEMES_NAMES),
            'desc'				=> __('Pick Color Red for the theme (default: #fb614a).', THEMES_NAMES),
            'default'			=> '#fb614a',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'color_s_red_bg',
            'type'				=> 'color',
            'title'				=> __('Color Background 1 red', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 1 red for the theme (default: #FF715C).', THEMES_NAMES),
            'default'			=> '#FF715C',
            'validate'			=> 'color',
			),			
			array(
            'id'				=> 'color_s_red_bg_2',
            'type'				=> 'color',
            'title'				=> __('Color Background 2 red', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 2 red for the theme (default: #F74A2F).', THEMES_NAMES),
            'default'			=> '#F74A2F',
            'validate'			=> 'color',
			),
			array(
            'id'				=>  'color_s_blue',
            'type'				=> 'color',
            'title'				=> __('Color Blue', THEMES_NAMES),
            'desc'				=> __('Pick Color Blue for the theme (default: #37a9e4).', THEMES_NAMES),
            'default'			=> '#37a9e4',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'color_s_blue_bg',
            'type'				=> 'color',
            'title'				=> __('Color Background 1 blue', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 1 blue for the theme (default: #38B9E6).', THEMES_NAMES),
            'default'			=> '#38B9E6',
            'validate'			=> 'color',
			),			
			array(
            'id'				=> 'color_s_blue_bg_2',
            'type'				=> 'color',
            'title'				=> __('Color Background 2 blue', THEMES_NAMES),
            'desc'				=> __('Pick Color Background 2 blue for the theme (default: #368BE1).', THEMES_NAMES),
            'default'			=> '#368BE1',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'dark_section_bg',
            'type'				=> 'color',
            'title'				=> __('Background Dark Section ', THEMES_NAMES),
            'desc'				=> __('Pick Background Color for the theme (default: #172B3D).', THEMES_NAMES),
            'default'			=> '#172B3D',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'dark_section_bg_dark',
            'type'				=> 'color',
            'title'				=> __('Background Dark Section (dark)', THEMES_NAMES),
            'desc'				=> __('Pick Background Color for the theme (default: #0F1F2E).', THEMES_NAMES),
            'default'			=> '#0F1F2E',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'entry_bg',
            'type'				=> 'color',
            'title'				=> __('Background Entry ', THEMES_NAMES),
            'desc'				=> __('Pick Background Color for the theme (default: #fff).', THEMES_NAMES),
            'default'			=> '#fff',
            'validate'			=> 'color',
			),
			array(
            'id'				=> 'entry_bg_dark',
            'type'				=> 'color',
            'title'				=> __('Background Entry (dark)', THEMES_NAMES),
            'desc'				=> __('Pick Background Color for the theme (default: #273D52).', THEMES_NAMES),
            'default'			=> '#273D52',
            'validate'			=> 'color',
			),
			array(
			'id'				=>  'opacity',
			'type'				=> 'slider',
			'title'				=> __( 'Opacity ', THEMES_NAMES ),
			"default"			=> 1,
				"min"			=> 1,
				"step"			=> 1,
				"max"			=> 10,
			'display_value'		=> 'text',
			),
		
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Menus', THEMES_NAMES ),
    'id'               => 'menu_headers',
    'customizer_width' => '500px',
    'subsection'       => false,
    'icon'             => 'el el-indent-left',
    'fields'		   => array(
        array(
            'id'				=>  'ex_themes_menu_header_',
            'type'				=> 'textarea',
            'title'				=> __( 'Header Menu ', THEMES_NAMES ),
            'desc'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'default'			=> '
<a class="hm-games" itemprop="url" href="'.get_bloginfo('url').'"><span itemprop="name"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__gamepad"></use></svg></i>Games</span></a>
<a class="hm-apps" itemprop="url" href="'.get_bloginfo('url').'"><span itemprop="name"><i class="s-purple c-icon"><svg width="24" height="24"><use xlink:href="#i__apps"></use></svg></i>Apps</span></a>
<a class="hm-top" itemprop="url" href="'.get_bloginfo('url').'"><span itemprop="name"><i class="s-red c-icon"><svg width="24" height="24"><use xlink:href="#i__cup"></use></svg></i>TOP 100</span></a>
<a class="hm-news" itemprop="url" href="'.get_bloginfo('url').'/news"><span itemprop="name"><i class="s-blue c-icon"><svg width="24" height="24"><use xlink:href="#i__flash"></use></svg></i>News</span></a>
						',
        ),
        array(
            'id'				=>  'ex_themes_submenu_header_',
            'type'				=> 'textarea',
            'title'				=> __( 'Header Sub Menu ', THEMES_NAMES ),
            'desc'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'default'			=> '
<a href="#">Feedback</a>
<a href="#">Terms of use</a>
<a href="#">DMCA</a>
<a href="#">Copyright Holders</a>
									',
        ),
    )
) );

Redux::setSection( $opt_name, array(
'title'            => __( 'Pages Setting', THEMES_NAMES ),
'id'               => 'pages_settings',
'customizer_width' => '700px',
'icon'             => 'el el-screen',
'subsection'       => false,
) );


Redux::setSection( $opt_name, array(
    'title'            => __( 'Home Pages', THEMES_NAMES ),
    'id'               => 'option_homepage',
    'customizer_width' => '500px',
    'icon'             => 'el el-home',
	'subsection'       => true,
    'fields'		   => array(
			array(
			'id'			=> 'info_homepages_options',
			'type'			=> 'info',
			'title'			=> __('Please add on your intro widget <a href="'.home_url( '/wp-admin/widgets.php' ).'">click here</a>', THEMES_NAMES),
			'style'			=> 'critical',
			'desc'			=> __('', THEMES_NAMES)
			), 
			array(
            'id'				=>  'latest_post_homes',
            'type'				=> 'switch',
            'title'				=> __( 'Latest Post', THEMES_NAMES ),
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Showing Latest Post on Homes', THEMES_NAMES ),
            'default'			=> true
			),
		 
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Single Pages', THEMES_NAMES ),
    'id'               => 'related_posts',
    'customizer_width' => '500px',
    'icon'             => 'el el-list-alt',
	'subsection'       => true,
    'fields'		   => array(
        array(
            'id'				=>  'report_active',
            'type'				=> 'switch',
            'title'				=> __( 'Report Post', THEMES_NAMES ), 
			'desc'				=> '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> for only member can use Report<br><u class="cool-link f2">&nbsp;&nbsp;OFF&nbsp;&nbsp;&nbsp;</u> for all can use Report',
            'default'			=> false
        ),
		
        array(
            'id'				=>  'ex_themes_related_posts_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Related Post', THEMES_NAMES ), 
            'desc'				=> '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Show Related Post.',
            'default'			=> false
        ), 
        array(
            'id'				=>  'ex_themes_related_posts_title_',
            'type'				=> 'text',
            'title'				=> __('Title Opt ', THEMES_NAMES),
            'desc'				=> 'Default is : <u class="cool-link f2">Recommended for you</u>',
            'default'			=> 'Recommended for you',
            'required'			=> array( 'ex_themes_related_posts_active_', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_related_posts_numbers_',
            'type'				=> 'slider',
            'title'				=> __( 'How much to showing ', THEMES_NAMES ),
            "default"          => 6,
            "min"              => 0,
            "step"             => 1,
            "max"              => 120,
            'display_value'    => 'text',
            'required'			=> array( 'ex_themes_related_posts_active_', '=', true )
        ),
        array(
            'id'				=>  'aktif_ex_themes_gallery_images_gpstore_',
            'type'				=> 'switch',
            'title'				=> __( 'Gallery Image', THEMES_NAMES ),
            'desc'				=> '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Show Gallery Image.',
            'default'			=> false
        ),/* 
        array(
            'id'				=>  'ex_themes_youtube_content_activate_',
            'type'				=> 'switch',
            'title'				=> __( 'Youtube Embed', THEMES_NAMES ),
            'desc'				=> '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Show Youtube on inside content.',
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_youtube_content_paragraph_on_',
            'type'				=> 'slider',
            'title'				=> __( 'Showing on after paragraph', THEMES_NAMES ),
            'desc'				=> __('<i>*0 is Randoms</i>', THEMES_NAMES),
            "default"          => 3,
            "min"              => 0,
            "step"             => 1,
            "max"              => 120,
            'display_value'    => 'text',
            'required'			=> array( 'ex_themes_youtube_content_activate_', '=', true )
        ), */
        array(
            'id'				=>  'ex_themes_help_single_post_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Help Menu', THEMES_NAMES ), 
            'desc'				=> '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Show Help Menu.',
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_help_single_post_',
            'type'				=> 'editor',
            'title'				=> __( 'Help Menu', THEMES_NAMES ),
            'desc'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'default'			=> '
<a class="link-faq" href="#">Installing games and programs</a>
<a class="link-faq" href="#">Installing games with a cache</a>
<a class="link-faq" href="#">How to make a screenshot</a>
									',
            'required'			=> array( 'ex_themes_help_single_post_active_', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_details_safe',
            'type'				=> 'textarea',
            'title'				=> __( 'Details Safe', THEMES_NAMES ),
            'desc'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'default'			=> "<div class=\"title\">Safe to Download</div>
				<p>".$sites." and the download link of this app are 100% safe. All download links of apps listed on ".$sites." are from Google Play Store or submitted by users. For the app from Google Play Store, ".$sites." won't modify it in any way. For the app submitted by users, ".$sites." will verify its APK signature safety before release it on our website.</p>
				<button class=\"closed\" data-fancybox-close=\"\">Got it</button>",
        ),
        array(
            'id'				=>  'no_jquery_post',
            'type'				=> 'switch',
            'title'				=> __( 'No Jquery Post ', THEMES_NAMES ), 
            'desc'				=> 'Make it <u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;</u> if you Conflict or Issue with Adding Post or Edit Post.. <br>
			<u class="cool-link f2">ON&nbsp;&nbsp;</u> if you use <u class="cool-link f2">Adding Post Used Laptop Or Pc</u> <br>
			<u class="cool-link f2">OFF&nbsp;&nbsp;</u> if you use <u class="cool-link f2">Adding Post Used Mobile</u> <br> 
			Default is <u class="cool-link f2">&nbsp;ON&nbsp;</u>',
            'default'			=> true
        ),
		
			array(
			'id'			=> 'activated_latest_version',
			'type'			=> 'switch',
			'title'			=> __( 'Latest Version', THEMES_NAMES ),
			'desc'			=> __( ' <u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to <code class="cool-link f2">Show Latest Version</code>', THEMES_NAMES ),
			'default'		=> false
			),  
			array(
			'id'			=> 'title_latest_version',
			'type'			=> 'text',
			'title'			=> __( 'Title', THEMES_NAMES ),
			'default'		=> 'All Version',
			'desc'			=> __( 'Default is <code class="cool-link f2">All Version</code>', THEMES_NAMES ),
			'required'		=> array( 'activated_latest_version', '=', true )
			),
			array(
			'id'			=> 'title_version_apk',
			'type'			=> 'text',
			'title'			=> __( 'Title', THEMES_NAMES ),
			'default'		=> 'Apk',
			'desc'			=> __( 'Default is <code class="cool-link f2">Apk</code>', THEMES_NAMES ),
			'required'		=> array( 'activated_latest_version', '=', true )
			),
			array(
			'id'			=> 'title_version_mod',
			'type'			=> 'text',
			'title'			=> __( 'Title', THEMES_NAMES ),
			'default'		=> 'Mod',
			'desc'			=> __( 'Default is <code class="cool-link f2">Mod</code>', THEMES_NAMES ),
			'required'		=> array( 'activated_latest_version', '=', true )
			),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Popular Pages', THEMES_NAMES ),
    'id'               => 'popular_pages',
    'customizer_width' => '500px',
    'icon'             => 'el el-graph',
	'subsection'       => true,
    'fields'		   => array(
        array(
            'id'				=>  'limit_categorie',
            'type'				=> 'slider',
            'title'				=> __( 'Limit post ', THEMES_NAMES ),
            'desc'				=> __( 'Limit Post to showing ', THEMES_NAMES ),
            "default"      	    => 12,
            "min"				=> 2,
            "step"				=> 1,
            "max"				=> 999,
            'display_value'		=> 'text',
        ),
        array(
            'id'				=>  'categorie_games_id',
            'type'				=> 'select',
            'data'				=> 'category',
            'title'				=> __( 'Category Games', THEMES_NAMES),
            'desc'				=> __( 'Select Category for Top Games Page', THEMES_NAMES)
        ),
        array(
            'id'				=>  'categorie_apps_id',
            'type'				=> 'select',
            'data'				=> 'category',
            'title'				=> __( 'Category Apps', THEMES_NAMES),
            'desc'				=> __( 'Select Category for Top Apps Page', THEMES_NAMES)
        ),
		array(
			'id'				=> 'popular_ranges',
			'type'				=> 'select',
			'title'				=> __('Popular Ranges', THEMES_NAMES),
			'options'			=> array( 
								'1 days' => 'Daily = 1 Days',
								'7 days' => 'Weekly = 7 Days',
								'30 days' => 'Mountly = 30 Days',
								'360 days' => 'Yearly = 360 Days',
								'alltime' => 'Alltime'
							),
			'default'			=> 'alltime',
			'desc'				=> __('Select Your Popular Ranges by Most View', THEMES_NAMES),
			),
    )
) );


Redux::setSection( $opt_name, array(
    'title'            => __( 'Download Pages', THEMES_NAMES ),
    'id'               => 'downloasds_pages',
    'customizer_width' => '500px',
    'icon'             => 'el el-download',
	'subsection'       => true,
    'fields'		   => array(
		/* 
        array(
            'id'				=>  'google_play_store_links',
            'type'				=> 'switch',
            'title'				=> __( 'Google Play Store Link', THEMES_NAMES ), 
            'desc'				=> __( '<code style="color: #0073aa;">ON</code> to showing download link from google play store', THEMES_NAMES ), 
            'default'			=> false
        ),
        array(
            'id'				=>  'aktif_ads_fake_download',
            'type'				=> 'switch',
            'title'				=> __( 'Fake Link', THEMES_NAMES ), 
            'desc'				=> __( '<code style="color: #0073aa;">ON</code> to enable Ads Banner for Fake Link', THEMES_NAMES ), 
            'default'			=> false
        ),
		
        array(
            'id'				=>  'title_fake_download',
            'type'				=> 'text',
            'title'				=> __( 'Title Fake Download', THEMES_NAMES ), 
            'default'			=> 'Fast Download APK MOD & OBB File',
            'required'			=> array( 'aktif_ads_fake_download', '=', true )
        ),
        array(
            'id'				=>  'ads_fake_download',
            'type'				=> 'text',
            'title'				=> __( 'Link URL Fake Download', THEMES_NAMES ),
            'desc'				=> __( 'This must be a URL.', THEMES_NAMES ),
            'validate'			=> 'url',
            'default'			=> 'https://exthem.es/download',
            'required'			=> array( 'aktif_ads_fake_download', '=', true )
        ),
		*/
        array(
            'id'				=>  'timer_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Timer ', THEMES_NAMES ),
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable Timer Counts ', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'timer_fake_download',
            'type'				=> 'slider',
            'title'				=> __( 'Timer Counts', THEMES_NAMES ),
            'desc'				=> __( 'Setting Your Timer', THEMES_NAMES ),
            "default"          => 3,
            "min"              => 0,
            "step"             => 1,
            "max"              => 999,
            'display_value'    => 'text',
            'required'			=> array( 'timer_active_', '=', true )
        ),
		array(
			'id'				=> 'ex_themes_nolink_activate_',
			'type'				=> 'switch',
			'title'				=> 'Hide Link',			
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Hide Url Link Download from copy paste', THEMES_NAMES ), 
			'default'			=> false
		),  
    )
) );
	
Redux::setSection( $opt_name, array(
    'title'            => __( 'Advertise', THEMES_NAMES ),
    'id'               => 'ads',
    'customizer_width' => '500px',
    'icon'             => 'el el-usd',
    'fields'		   => array(
        array(
            'id'				=>  'ex_themes_adv_homes_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Ads Banner All Pages', THEMES_NAMES ),
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to enable ads banner for home, archive, categorie, search, 404 pages', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_adv_homes_code_',
            'type'				=> 'textarea',
            'title'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'desc'				=> __( 'Insert your code <br> Scripts or Banner', THEMES_NAMES ),
            'default'			=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
            'required'			=> array( 'ex_themes_adv_homes_active_', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_adv_homes_active_2',
            'type'				=> 'switch',
            'title'				=> __( 'Ads Banner only Homes', THEMES_NAMES ),
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to enable ads banner for homes', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_adv_homes_code_2',
            'type'				=> 'textarea',
            'title'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'desc'				=> __( 'Insert your code <br> Scripts or Banner', THEMES_NAMES ),
            'default'			=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
            'required'			=> array( 'ex_themes_adv_homes_active_2', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_adv_single_page_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Ads Banner Single Post', THEMES_NAMES ),
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to enable Banner for Single Post', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_adv_single_page_code_',
            'type'				=> 'textarea',
            'title'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'desc'				=> __( 'Insert your code <br> Scripts or Banner', THEMES_NAMES ),
            'default'			=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
            'required'			=> array( 'ex_themes_adv_single_page_active_', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_adv_single_page_active_2',
            'type'				=> 'switch',
            'title'				=> __( 'Ads Banner Single Post (2)', THEMES_NAMES ),
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to enable Banner for Single Post Alternative', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_adv_single_page_code_2',
            'type'				=> 'textarea',
            'title'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'desc'				=> __( 'Insert your code <br> Scripts or Banner', THEMES_NAMES ),
            'default'			=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
            'required'			=> array( 'ex_themes_adv_single_page_active_2', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_adv_download_page_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Ads Banner Download Pages', THEMES_NAMES ),
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to enable Ads Banner for Download Pages', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_adv_download_page_code_',
            'type'				=> 'textarea',
            'title'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'desc'				=> __( 'Insert your code <br> Scripts or Banner', THEMES_NAMES ),
            'default'			=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
            'required'			=> array( 'ex_themes_adv_download_page_active_', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_adv_download_page_active_2',
            'type'				=> 'switch',
            'title'				=> __( 'Ads Banner Download Pages (2)', THEMES_NAMES ),
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to enable Ads Banner for Download Pages Alternative', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_adv_download_page_code_2',
            'type'				=> 'textarea',
            'title'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'desc'				=> __( 'Insert your code <br> Scripts or Banner', THEMES_NAMES ),
            'default'			=> "<div class=\"ads-here\"><i class=\"ads-img\"></i><i class=\"ads-content\"></i><i class=\"ads-button\"></i></div>",
            'required'			=> array( 'ex_themes_adv_download_page_active_2', '=', true )
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Webmasters', THEMES_NAMES ),
    'id'               => 'webmaster_tools_verification',
    'customizer_width' => '500px',
    'icon'             => 'el el-podcast',
    'fields'		   => array(
        array(
            'id'				=>  'ex_themes_webmaster_tools_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Webmaster Tools', THEMES_NAMES ),
            'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Insert your code <u class="cool-link f2">Webmaster Tools</u>', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'google_verif',
            'type'				=> 'text',
            'title'				=> __( 'Google Search Console', THEMES_NAMES ),
            'desc'				=> __( 'Insert Code Google Search Console ', THEMES_NAMES ),
            'default'			=> 'AvKGNc41mcT7TmHke8nHR5U99NHLk2-eJw_j6PyQq94',
            'required'			=> array( 'ex_themes_webmaster_tools_active_', '=', true )
        ),
        array(
            'id'				=>  'bing_verif',
            'type'				=> 'text',
            'title'				=> __( 'Bing Webmaster Tools', THEMES_NAMES ),
            'desc'				=> __( 'Insert Code Bing Webmaster Tools', THEMES_NAMES ),
            'default'			=> 'BC97A518A2B909C0B1A76AD695E9A665',
            'required'			=> array( 'ex_themes_webmaster_tools_active_', '=', true )
        ),
        array(
            'id'				=>  'pinterest_verif',
            'type'				=> 'text',
            'title'				=> __( 'Pinterest Site Verification', THEMES_NAMES ),
            'desc'				=> __( 'Insert Code Pinterest Site Verification', THEMES_NAMES ),
            'default'			=> 'put your code',
            'required'			=> array( 'ex_themes_webmaster_tools_active_', '=', true )
        ),
        array(
            'id'				=>  'yandex_verif',
            'type'				=> 'text',
            'title'				=> __( 'Yandex Webmaster Tools', THEMES_NAMES ),
            'desc'				=> __( 'Insert Code Yandex Webmaster Tools', THEMES_NAMES ),
            'default'			=> 'bb0b65aedc95ce07',
            'required'			=> array( 'ex_themes_webmaster_tools_active_', '=', true )
        ),
        array(
            'id'				=>  'baidu_verif',
            'type'				=> 'text',
            'title'				=> __( 'Baidu Webmaster Tools', THEMES_NAMES ),
            'desc'				=> __( 'Insert Code Baidu Webmaster Tools ', THEMES_NAMES ),
            'default'			=> 'put your code',
            'required'			=> array( 'ex_themes_webmaster_tools_active_', '=', true )
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Sosial Media', THEMES_NAMES ),
    'id'               => 'sosial_media',
    'customizer_width' => '500px',
    'icon'             => 'el el-user',
    'fields'		   => array(
        array(
            'id'				=>  'ex_themes_social_media_sidebar_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Socials Media', THEMES_NAMES ),
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable to Socials Media', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'facebook_url',
            'type'				=> 'text',
            'title'				=> __( 'Facebook', THEMES_NAMES ), 
            'default'			=> EXTHEMES_FACEBOOK_URL,
            'required'			=> array( 'ex_themes_social_media_sidebar_active_', '=', true )
        ),
        array(
            'id'				=>  'twitter_url',
            'type'				=> 'text',
            'title'				=> __( 'Twitter', THEMES_NAMES ), 
            'default'			=> EXTHEMES_TWITTER_URL,
            'required'			=> array( 'ex_themes_social_media_sidebar_active_', '=', true )
        ),
        array(
            'id'				=>  'youtube_url',
            'type'				=> 'text',
            'title'				=> __( 'Youtube', THEMES_NAMES ), 
            'default'			=> EXTHEMES_YOUTUBE_URL,
            'required'			=> array( 'ex_themes_social_media_sidebar_active_', '=', true )
        ),
        array(
            'id'				=>  'instagram_url',
            'type'				=> 'text',
            'title'				=> __( 'Instagram', THEMES_NAMES ), 
            'default'			=> EXTHEMES_INSTAGRAM_URL,
            'required'			=> array( 'ex_themes_social_media_sidebar_active_', '=', true )
        ),
        array(
            'id'				=>  'telegram_url',
            'type'				=> 'text',
            'title'				=> __( 'Telegram', THEMES_NAMES ), 
            'default'			=> EXTHEMES_TELEGRAM_URL,
            'required'			=> array( 'ex_themes_social_media_sidebar_active_', '=', true )
        ),
        array(
            'id'				=>  'pinterest_url',
            'type'				=> 'text',
            'title'				=> __( 'Pinterest', THEMES_NAMES ), 
            'default'			=> 'https://pinterest.com/exthemes',
            'required'			=> array( 'ex_themes_social_media_sidebar_active_', '=', true )
        ),
        array(
            'id'				=>  'linked_url',
            'type'				=> 'text',
            'title'				=> __( 'Linkedin', THEMES_NAMES ), 
            'default'			=> 'https://www.linkedin.com/in/bangreyblogs',
            'required'			=> array( 'ex_themes_social_media_sidebar_active_', '=', true )
        ),
        array(
            'id'				=>  'VKontakte_url',
            'type'				=> 'text',
            'title'				=> __( 'VKontakte ', THEMES_NAMES ), 
            'default'			=> '#',
            'required'			=> array( 'ex_themes_social_media_sidebar_active_', '=', true )
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Custom JS CSS', THEMES_NAMES ),
    'id'               => 'script_insert',
    'customizer_width' => '500px',
    'icon'             => 'el el-edit',
    'fields'		   => array(
        array(
            'id'				=>  'ex_themes_head_on_sections_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Header Sections', THEMES_NAMES ),
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable to Header Sections', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'header_section',
            'type'				=> 'textarea',
            'title'				=> __( 'Header Section', THEMES_NAMES ),
            'desc'				=> __( 'You can Inject Scripts or CSS Style on Header<br>example<br>&lt;style&gt;<b style="color:#c09853;background-color: #fcf8e3;">.sample {display:none}</b>&lt;/style&gt;
			<br>
			&lt;script&gt;<b style="color:#c09853;background-color: #fcf8e3;">Your code</b>&lt;/script&gt;', THEMES_NAMES ),
            'required'			=> array( 'ex_themes_head_on_sections_active_', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_footers_sections_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Footer Sections ', THEMES_NAMES ),
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable to Footer Sections', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=>  'ex_themes_footers_sections_',
            'type'				=> 'textarea',
            'title'				=> __( 'Footer Section', THEMES_NAMES ),
            'desc'				=> __( 'You can Inject Scripts or CSS Style on Footer<br>example<br>&lt;style&gt;<b style="color:#c09853;background-color: #fcf8e3;">.sample {display:none}</b>&lt;/style&gt;
			<br>
			&lt;script&gt;<b style="color:#c09853;background-color: #fcf8e3;">Your code</b>&lt;/script&gt;', THEMES_NAMES ),
            'required'			=> array( 'ex_themes_footers_sections_active_', '=', true )
        ),
    )
) );
Redux::setSection( $opt_name, array(
    'title'            => __( 'Options', THEMES_NAMES ),
    'id'               => 'optionz',
    'customizer_width' => '500px',
    'icon'             => 'el el-adjust-alt',
    'fields'		   => array(
        array(
            'id'				=> 'maintenances',
            'type'				=> 'switch',
            'title'				=> 'Maintenances',
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> for developers only <br>*<i>don\'t enable</i>', THEMES_NAMES ),
            'default'			=> false
        ),
        array(
            'id'				=> 'maintenances_code',
            'type'				=> 'textarea',
            'title'				=> __( 'HTML Allowed', THEMES_NAMES ),
            'desc'				=> __( 'Insert your code ', THEMES_NAMES ),
            'default'			=> "<a href='".EXTHEMES_ITEMS_URL."' title='".THEMES_NAMES." v4.8' target='_blank'><b>".THEMES_NAMES." v4.8</b> We under maintenance for issues</a>",
            'required'			=> array( 'maintenances', '=', true )
        ),
        array(
            'id'				=>  'ex_themes_thumbnails_gpstore_active_',
            'type'				=> 'switch',
            'title'				=> __( 'Image Google Play', THEMES_NAMES ),
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable to use CDN from Google Play', THEMES_NAMES ),
            'default'			=> false
        ), 
		array(
            'id'				=> 'ex_themes_scheme_seo_activate_',
            'type'				=> 'switch',
            'title'				=> 'Scheme SEO ',
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable Scheme SEO MobileApplication', THEMES_NAMES ),
            'default'			=> false
        ),
		array(
            'id'				=> 'disable_wpadmin',
            'type'				=> 'switch',
            'title'				=> 'WPAdmin frontend',
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Remove WP Admin from frontend', THEMES_NAMES ),
            'default'			=> false
        ),
		array(
            'id'				=> 'minify_active',
            'type'				=> 'switch',
            'title'				=> 'Minify',
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable Minify Only HTML and CSS, not inlucude JS', THEMES_NAMES ),
            'default'			=> false
        ),
		array(
            'id'				=> 'cdn_active',
            'type'				=> 'switch',
            'title'				=> 'CDN Photon',
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable CDN Photon WP.com Server', THEMES_NAMES ),
            'default'			=> false
        ),
    )
) );


Redux::setSection( $opt_name, array(
    'title'            => __( 'RTL Mode', THEMES_NAMES ),
    'id'               => 'optionrtl',
    'customizer_width' => '500px',
    'icon'             => 'el el-retweet',
    'fields'		   => array(
	
		array(
            'id'				=> 'ex_themes_rtl_activate_',
            'type'				=> 'switch',
            'title'				=> 'RTL Mode',
			'desc'				=> __( '<u class="cool-link f2">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> to Enable RTL Mode', THEMES_NAMES ),
            'default'			=> false
        ),
		
			
			array(
			'id'			=> 'font_body_rtl',
			'type'			=> 'text',
			'title'			=> __('Fonts Body', THEMES_NAMES),
			'default'		=> '\'Kahfi\', sans-serif',		
			'desc'			=> __( 'Default is, <u class="cool-link f2">\'Kahfi\', sans-serif</u><br> Click Here To Get Font <a href="https://www.cdnfonts.com/" target="_blank">cdnfonts.com</a>', THEMES_NAMES ), 
			'required'		=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'			=> 'font_body_rtl_link_custom',
			'type'			=> 'textarea',
			'title'			=> __( 'Url Link Fonts', THEMES_NAMES ),
			'default'		=> 'https://fonts.cdnfonts.com/css/kahfi',			 
			'desc'			=> __( 'Default is, <u class="cool-link f2">https://fonts.cdnfonts.com/css/kahfi</u><br> Click Here To Get Font <a href="https://www.cdnfonts.com/" target="_blank">cdnfonts.com</a>', THEMES_NAMES ),
			'required'		=> array( 'ex_themes_rtl_activate_', '=', true )
			),	 
			array(
			'id'				=>  'Languange_rtl',
			'type'				=> 'text',
			'title'				=> __( 'Languange ', THEMES_NAMES ), 
			'default'			=> 'ar',
			'desc'				=> __( 'Default is <u class="cool-link f2">&nbsp;&nbsp;ar&nbsp;&nbsp;</u>', THEMES_NAMES ),
			'required'			=> array( 'ex_themes_activate_rtl_', '=', true )
			),
			
			array(
			'id'				=>  'Languange_rtl',
			'type'				=> 'text',
			'title'				=> __( 'Languange ', THEMES_NAMES ), 
			'default'			=> 'ar',
			'desc'				=> __( 'Default is <b style="color: crimson;">ar</b>', THEMES_NAMES ),
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			
			array(
			'id'    => 'info_rtl_translate_options',
			'type'  => 'info',
			'title' => __('THIS IS INFO FOR CHANGE LANGUAGE NUMBERS FOR RTL', THEMES_NAMES),
			'style' => 'critical',
			'desc'  => __('', THEMES_NAMES),			
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_1',
			'type'				=> 'text',
			'title'				=> __( 'Number 1 ', THEMES_NAMES ), 
			'default'			=> '۱',
			'desc'				=> __( 'Default is <b style="color: crimson;">۱</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_2',
			'type'				=> 'text',
			'title'				=> __( 'Number 2 ', THEMES_NAMES ), 
			'default'			=> '۲',
			'desc'				=> __( 'Default is <b style="color: crimson;">۲</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_3',
			'type'				=> 'text',
			'title'				=> __( 'Number 3 ', THEMES_NAMES ), 
			'default'			=> '۳',
			'desc'				=> __( 'Default is <b style="color: crimson;">۳</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_4',
			'type'				=> 'text',
			'title'				=> __( 'Number 4 ', THEMES_NAMES ), 
			'default'			=> '۴',
			'desc'				=> __( 'Default is <b style="color: crimson;">۴</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_5',
			'type'				=> 'text',
			'title'				=> __( 'Number 5 ', THEMES_NAMES ), 
			'default'			=> '۵',
			'desc'				=> __( 'Default is <b style="color: crimson;">۵</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_6',
			'type'				=> 'text',
			'title'				=> __( 'Number 6 ', THEMES_NAMES ), 
			'default'			=> '۶',
			'desc'				=> __( 'Default is <b style="color: crimson;">۶</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_7',
			'type'				=> 'text',
			'title'				=> __( 'Number 7 ', THEMES_NAMES ), 
			'default'			=> '۷',
			'desc'				=> __( 'Default is <b style="color: crimson;">۷</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_8',
			'type'				=> 'text',
			'title'				=> __( 'Number 8 ', THEMES_NAMES ), 
			'default'			=> '۸',
			'desc'				=> __( 'Default is <b style="color: crimson;">۸</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_9',
			'type'				=> 'text',
			'title'				=> __( 'Number 9 ', THEMES_NAMES ), 
			'default'			=> '۹',
			'desc'				=> __( 'Default is <b style="color: crimson;">۹</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			array(
			'id'				=>  'number_0',
			'type'				=> 'text',
			'title'				=> __( 'Number 0 ', THEMES_NAMES ), 
			'default'			=> '۰',
			'desc'				=> __( 'Default is <b style="color: crimson;">۰</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			),
			/* 
			array(
			'id'				=>  'rtl_homes',
			'type'				=> 'text',
			'title'				=> __( 'Home ', THEMES_NAMES ), 
			'default'			=> 'خانه',
			'desc'				=> __( 'Default is <b style="color: crimson;">خانه</b>', THEMES_NAMES ), 
			'required'			=> array( 'ex_themes_rtl_activate_', '=', true )
			), 
			*/

	
	
	 )
) );
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Change Language', THEMES_NAMES ),
    'id'               => 'translate_options',
    'customizer_width' => '500px',
    'icon'             => 'el el-idea',
    'fields'		   => array( 
			array(
				'id'    => 'info_translate_options',
				'type'  => 'info',
				'title' => __('THIS IS INFO FOR CHANGE LANGUAGE AS YOU WISH', THEMES_NAMES),
				'style' => 'critical',
				'desc'  => __('', THEMES_NAMES)
			),
			array(
            'id'				=>  'exthemes_Search',
            'type'				=> 'text',
            'title'				=> esc_html__( 'I want to find...', THEMES_NAMES ),
            'default'			=> 'I want to find...',
			),
			array(
            'id'				=>  'exthemes_Search_2',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Search', THEMES_NAMES ),
            'default'			=> 'Search',
			),
			array(
            'id'				=>  'exthemes_Find',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Find', THEMES_NAMES ),
            'default'			=> 'Find',
			),
			array(
            'id'				=>  'exthemes_Add_new_post',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Add new post', THEMES_NAMES ),
            'default'			=> 'Add new post',
			),
			array(
            'id'				=>  'exthemes_Logout',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Logout', THEMES_NAMES ),
            'default'			=> 'Logout',
			),
			array(
            'id'				=>  'exthemes_Authorization',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Authorization', THEMES_NAMES ),
            'default'			=> 'Authorization',
			),
			array(
            'id'				=>  'exthemes_Recommend',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Recommend', THEMES_NAMES ),
            'default'			=> 'Recommend',
			),
			array(
            'id'				=>  'exthemes_More',
            'type'				=> 'text',
            'title'				=> esc_html__( 'More', THEMES_NAMES ),
            'default'			=> 'More',
			),
			array(
            'id'				=>  'exthemes_Last_news',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Last news', THEMES_NAMES ),
            'default'			=> 'Last news',
			),
			array(
            'id'				=>  'exthemes_All_news',
            'type'				=> 'text',
            'title'				=> esc_html__( 'All news', THEMES_NAMES ),
            'default'			=> 'All news',
			),
			array(
            'id'				=>  'exthemes_Read_more',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Read more', THEMES_NAMES ),
            'default'			=> 'Read more',
			),
			array(
            'id'				=>  'exthemes_Latest_comments',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Latest comments', THEMES_NAMES ),
            'default'			=> 'Latest comments',
			),
			array(
            'id'				=>  'exthemes_Take_comment',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Take a comment', THEMES_NAMES ),
            'default'			=> 'Take a comment',
			),
			array(
            'id'				=>  'exthemes_comment_Name',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Name', THEMES_NAMES ),
            'default'			=> 'Name',
			),
			array(
            'id'				=>  'exthemes_comment_EMail',
            'type'				=> 'text',
            'title'				=> esc_html__( 'E-Mail', THEMES_NAMES ),
            'default'			=> 'E-Mail',
			),
			array(
            'id'				=>  'exthemes_comment_text',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Comment text', THEMES_NAMES ),
            'default'			=> 'Comment text',
			),
			array(
            'id'				=>  'exthemes_comment_Send',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Send', THEMES_NAMES ),
            'default'			=> 'Send',
			),
			array(
            'id'				=>  'exthemes_comment_Comments',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Comments', THEMES_NAMES ),
            'default'			=> 'Comments',
			),
			array(
            'id'				=>  'exthemes_comment_Comment_on',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Comment on', THEMES_NAMES ),
            'default'			=> 'Comment on',
			),
			array(
            'id'				=>  'exthemes_apk_info_Updated',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Updated', THEMES_NAMES ),
            'default'			=> 'Updated',
			),
			array(
            'id'				=>  'exthemes_apk_info_Version',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Version', THEMES_NAMES ),
            'default'			=> 'Version',
			),
			array(
            'id'				=>  'exthemes_apk_info_developer',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Developer', THEMES_NAMES ),
            'default'			=> 'Developer',
			),
			array(
            'id'				=>  'exthemes_apk_info_Requirements',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Requirements', THEMES_NAMES ),
            'default'			=> 'Requirements',
			),
			array(
            'id'				=>  'exthemes_apk_info_Android',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Android', THEMES_NAMES ),
            'default'			=> 'Android',
			),
			array(
            'id'				=>  'exthemes_apk_info_Genre',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Genre', THEMES_NAMES ),
            'default'			=> 'Genre',
			),
			array(
            'id'				=>  'exthemes_apk_info_Views',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Views', THEMES_NAMES ),
            'default'			=> 'Views',
			),
			array(
            'id'				=>  'exthemes_apk_info_Google_Play',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Google Play', THEMES_NAMES ),
            'default'			=> 'Google Play',
			),
			array(
            'id'				=>  'exthemes_apk_info_Votes',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Votes:', THEMES_NAMES ),
            'default'			=> 'Votes:',
			),
			array(
            'id'				=>  'exthemes_apk_info_Comments',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Comments:', THEMES_NAMES ),
            'default'			=> 'Comments:',
			),
			array(
            'id'				=>  'exthemes_apk_info_Popularity',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Popularity', THEMES_NAMES ),
            'default'			=> 'Popularity',
			),
			array(
            'id'				=>  'exthemes_apk_info_Download',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Download', THEMES_NAMES ),
            'default'			=> 'Download',
			),
			array(
            'id'				=>  'exthemes_apk_info_Request_update',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Request for update', THEMES_NAMES ),
            'default'			=> 'Request for update',
			),
			array(
            'id'				=>  'exthemes_apk_info_Share_friends',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Share with friends', THEMES_NAMES ),
            'default'			=> 'Share with friends',
			),
			array(
            'id'				=>  'exthemes_content_Description',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Description', THEMES_NAMES ),
            'default'			=> 'Description',
			),
			array(
            'id'				=>  'exthemes_content_Whats_News',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Whats News', THEMES_NAMES ),
            'default'			=> 'Whats News',
			),
			array(
            'id'				=>  'exthemes_content_Help',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Help', THEMES_NAMES ),
            'default'			=> 'Help',
			),
			array(
            'id'				=>  'exthemes_content_Mod_info',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Mod info:', THEMES_NAMES ),
            'default'			=> 'Mod info:',
			),
			array(
            'id'				=>  'exthemes_content_Back_main',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Back to main', THEMES_NAMES ),
            'default'			=> 'Back to main',
			),
			array(
            'id'				=>  'exthemes_Scroll_up',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Scroll up', THEMES_NAMES ),
            'default'			=> 'Scroll up',
			),
			array(
            'id'				=>  'exthemes_Screenshots',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Screenshots', THEMES_NAMES ),
            'default'			=> 'Screenshots',
			),
			array(
            'id'				=>  'exthemes_Enter_your_search_here',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Enter your search here', THEMES_NAMES ),
            'default'			=> 'Enter your search here',
			),
			array(
            'id'				=>  'exthemes_Login_to',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Login to', THEMES_NAMES ),
            'default'			=> 'Login to',
			),
			array(
            'id'				=>  'exthemes_Logins',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Login', THEMES_NAMES ),
            'default'			=> 'Login',
			),
			array(
            'id'				=>  'exthemes_Forgot_your_password',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Forgot your password?', THEMES_NAMES ),
            'default'			=> 'Forgot your password?',
			),
			array(
            'id'				=>  'exthemes_Password',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Password', THEMES_NAMES ),
            'default'			=> 'Password',
			),
			array(
            'id'				=>  'exthemes_Registration',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Registration Page', THEMES_NAMES ),
            'default'			=> 'Registration Page',
			),
			array(
            'id'				=>  'exthemes_Like',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Like', THEMES_NAMES ),
            'default'			=> 'Like',
			),
			array(
            'id'				=>  'exthemes_Dislike',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Dislike', THEMES_NAMES ),
            'default'			=> 'Dislike',
			),
			array(
            'id'				=>  'exthemes_latest_post_index',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Latest Post', THEMES_NAMES ),
            'default'			=> 'Latest Post',
			),
			array(
            'id'				=>  'exthemes_more_by_developers',
            'type'				=> 'text',
            'title'				=> esc_html__( 'More by Developers', THEMES_NAMES ),
            'default'			=> 'More by Developers',
			),
			array(
            'id'				=>  'exthemes_registration_',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Registration', THEMES_NAMES ),
            'default'			=> 'Registration',
			),
			array(
            'id'				=>  'exthemes_registration_1',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Thanks for Register', THEMES_NAMES ),
            'default'			=> 'Thanks for Register',
			),
			array(
            'id'				=>  'exthemes_registration_2',
            'type'				=> 'text',
            'title'				=> esc_html__( 'First Name', THEMES_NAMES ),
            'default'			=> 'First Name',
			),
			array(
            'id'				=>  'exthemes_registration_3',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Last Name', THEMES_NAMES ),
            'default'			=> 'Last Name',
			),
			array(
            'id'				=>  'exthemes_registration_4',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Username', THEMES_NAMES ),
            'default'			=> 'Username',
			),
			array(
            'id'				=>  'exthemes_registration_5',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Password', THEMES_NAMES ),
            'default'			=> 'Password',
			),
			array(
            'id'				=>  'exthemes_registration_6',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Confirm password', THEMES_NAMES ),
            'default'			=> 'Confirm password',
			),
			
			array(
            'id'				=>  'exthemes_registration_7',
            'type'				=> 'text',
            'title'				=> esc_html__( 'E-Mail', THEMES_NAMES ),
            'default'			=> 'E-Mail',
			),
			array(
            'id'				=>  'exthemes_registration_8',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Send', THEMES_NAMES ),
            'default'			=> 'Send',
			),
			array(
            'id'				=>  'exthemes_mods_info',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Mods', THEMES_NAMES ),
            'default'			=> 'Mods',
			),
			array(
            'id'				=>  'text_home_bcm',
            'type'				=> 'text',
            'title'				=> esc_html__( 'Home', THEMES_NAMES ),
            'default'			=> 'Home',
            'desc'				=> '<u class="cool-link f2">This For Breadcrumbs</u>', 
			),
    )
) ); 
