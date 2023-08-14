<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if ( ! class_exists( 'Redux' ) ) {
    return;
}
// This is your option name where all the Redux data is stored.
$opt_name = "opt_themes";
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
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => __( ''.$theme->get( 'Name' ).' '.$theme->get( 'Version' ).'', THEMES_NAMES ),
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
    'admin_bar_priority'   => 50,
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
    'page_priority'        => null,
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
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
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
    'href'  => 'https://exthem.es',
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
    'url'   => 'https://facebook.com/Ex-themescom-147994030387758',
    'title' => 'Follow us on Facebook',
    'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url'   => 'https://twitter.com/ExThemes',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el el-twitter'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.linkedin.com/in/bangreyblogs',
    'title' => 'Find us on LinkedIn',
    'icon'  => 'el el-linkedin'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.youtube.com/c/seomakassar',
    'title' => 'Find us on Youtube',
    'icon'  => 'el el-youtube'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.instagram.com/exthemescom/',
    'title' => 'Find us on Instagram',
    'icon'  => 'el el-instagram'
);
$args['share_icons'][] = array(
    'url'   => 'https://exthem.es',
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
$args['footer_text'] = __( '<p></p>', THEMES_NAMES );
Redux::setArgs( $opt_name, $args );


Redux::setSection( $opt_name, array(
    'title'            => __( 'Extractor Games', THEMES_NAMES ),
    'id'               => 'option_extractor_games',
    'customizer_width' => '500px',
    'icon'             => 'el el-adjust-alt',
    'fields'     => array(
        array(
        'id'       => 'ex_themes_extractor_games_status_post_',
        'type'     => 'select',
        'title'    => __('Select for Status Post', THEMES_NAMES), 
        'desc' => __('<i>Draft or Publish * <b>Publish</b> to auto post</i>', THEMES_NAMES),		
         
        'options'  => array(
            'draft' => 'Draft',
            'publish' => 'Publish'
			),
				'default'  => 'draft',		
		),		 
		
    )
) );


Redux::setSection( $opt_name, array(
    'title'            => __( 'Generals', THEMES_NAMES ),
    'id'               => 'dashboard_ex_themes',
    'customizer_width' => '700px',
    'icon'             => 'el el-dashboard',
    'subsection'       => false,

) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Headers', THEMES_NAMES ),
    //'desc'             => __( 'For full documentation on this field, visit: ', THEMES_NAMES ) . '<a href="//docs.reduxframework.com/core/fields/text/" target="_blank">docs.reduxframework.com/core/fields/text/</a>',
    'id'               => 'header',
    'subsection'       => true,
    'customizer_width' => '700px',
    'icon'             => 'el el-wrench',

    'fields'           => array(
			array(
                'id'		=> 'ex_themes_header_logo_img_activate_',
                'type'		=> 'switch',
                'title'		=> __( 'Logo Sites', THEMES_NAMES ),  
                'default'	=> false
            ),
			array(
                'id'		=> 'ex_themes_header_logo_img_',
                'type'		=> 'media',
                'title'		=> __( 'Logo Images', THEMES_NAMES ),
				'default'	=> array(
				'url'		=> ''.get_bloginfo('template_directory') . '/assets/img/logos.png'),        
                'desc'		=> __( '<i>* Upload Your Images Logo...</i>', THEMES_NAMES ),
				'required'	=> array( 'ex_themes_header_logo_img_activate_', '=', true ),
            ),  
			array(
                'id'       => 'ex_themes_favicons_',
                'type'     => 'media',
                'title'    => __( 'Favicons', THEMES_NAMES ),
				'default'  => array(
				'url'=> ''.get_bloginfo('template_directory') . '/assets/img/favicon.ico'),        
                'desc'     => __( '<i>* Your Favicon Logo...</i>', THEMES_NAMES ),                
            ), 
             
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Footer', THEMES_NAMES ),
    'id'               => 'footers',
    'customizer_width' => '500px',
    'subsection'       => true,
    'icon'             => 'el el-wrench',
    'fields'     => array(
        
        array(
            'id'       => 'ex_themes_footers_copyrights_active_',
            'type'     => 'switch',
            'title'    => __( 'Footer Copyright', THEMES_NAMES ),
            //'subtitle' => __( '<br> ', THEMES_NAMES ),
            'default'  => false
        ),
        array(
            'id'       => 'ex_themes_footers_copyrights_code_',
            'type'     => 'editor',
            'title'    => __( 'Footer Copyright', THEMES_NAMES ),
            'desc' => __( 'HTML Allowed', THEMES_NAMES ),
            'default'  => "© <script type=\"text/javascript\">var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> ".get_option('blogname')." - ".get_option('blogdescription')." All rights reserved - Developer by <a href=\"https://exthem.es\" title=\"premium wordpress themes - exthem.es\"><strong style=\"text-transform: capitalize;\">exthem.es</strong></a>",
            'required' => array( 'ex_themes_footers_copyrights_active_', '=', true )
        ), 
        array(
            'id'			=> 'ex_themes_footers_menu_',
            'type'			=> 'textarea',
            'title'			=> __( 'Menu Footer ', THEMES_NAMES ),
            'desc'			=> __( '<i> Add your Menu on Footer </i>', THEMES_NAMES ),
            'default'		=> '<li><a href="/">'.get_option("blogname").'</a></li> 
<li><a href="#">FAQ</a></li> 
<li><a href="#">About</a></li> 
<li><a href="#">Terms and Conditions</a></li>
<li><a href="#">Privacy</a></li>', 
        ), 
		
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Colour Sites', THEMES_NAMES ),
    'id'               => 'color_styles',
    'customizer_width' => '700px',
    'icon'             => 'el el-adjust',
    'subsection'       => false,
    'fields'     => array( 
        array(
            'id'			=> 'color_name',
            'type'			=> 'color',
            'title'			=> __('Color Title', THEMES_NAMES),
            'desc'			=> __('Pick Title Color for the theme (default: #fff).', THEMES_NAMES),
            'default'		=> '#fff',
            'validate'		=> 'color',
        ),
        array(
            'id'			=> 'color_name_shadows',
            'type'			=> 'color',
            'title'			=> __('Color Title Shadow', THEMES_NAMES),
            'desc'			=> __('Pick Title Shadow Color for the theme (default: #CC4C16).', THEMES_NAMES),
            'default'		=> '#CC4C16',
            'validate'		=> 'color',
        ),
        array(
            'id'			=> 'color_links',
            'type'			=> 'color',
            'title'			=> __('Color Links', THEMES_NAMES),
            'desc'			=> __('Pick Links Color for the theme (default: #CC4C16).', THEMES_NAMES),
            'default'		=> '#CC4C16',
            'validate'		=> 'color',
        ),
        array(
            'id'			=> 'color_links_hovers',
            'type'			=> 'color',
            'title'			=> __('Color Links Hovers', THEMES_NAMES),
            'desc'			=> __('Pick Links Hovers Color for the theme (default: #fff).', THEMES_NAMES),
            'default'		=> '#fff',
            'validate'		=> 'color',
        ),
        array(
            'id'			=> 'color_body_bg',
            'type'			=> 'color',
            'title'			=> __('Color Body Backgrounds', THEMES_NAMES),
            'desc'			=> __('Pick Body Backgrounds Color for the theme (default: #546aff).', THEMES_NAMES),
            'default'		=> '#546aff',
            'validate'		=> 'color',
        ),
        array(
            'id'			=> 'color_body',
            'type'			=> 'color',
            'title'			=> __('Color Body', THEMES_NAMES),
            'desc'			=> __('Pick Body Color for the theme (default: #fff).', THEMES_NAMES),
            'default'		=> '#fff',
            'validate'		=> 'color',
        ),
        array(
            'id'			=> 'color_border',
            'type'			=> 'color',
            'title'			=> __('Color Border', THEMES_NAMES),
            'desc'			=> __('Pick Border Color for the theme (default: #CC4C16).', THEMES_NAMES),
            'default'		=> '#CC4C16',
            'validate'		=> 'color',
        ),
        array(
            'id'			=> 'color_button',
            'type'			=> 'color',
            'title'			=> __('Color Button', THEMES_NAMES),
            'desc'			=> __('Pick Button Color for the theme (default: #CC4C16).', THEMES_NAMES),
            'default'		=> '#CC4C16',
            'validate'		=> 'color',
        ),
        array(
            'id'			=> 'color_play_bg_',
            'type'			=> 'color',
            'title'			=> __('Color Play Background', THEMES_NAMES),
            'desc'			=> __('Pick Play Background Color for the theme (default: #546aff).', THEMES_NAMES),
            'default'		=> '#546aff',
            'validate'		=> 'color',
        ),
		array(
			'id'			=> 'ex_themes_bg_',
			'type'			=> 'media',
			'title'			=> __( 'Backgrounds', THEMES_NAMES ),
			'default'		=> array(
			'url'			=> ''.get_bloginfo('template_directory') . '/assets/img/xfriv_bg1.png'),        
			'desc'			=> __( '<i>* Your Background Images...</i>', THEMES_NAMES ),                
		),
		array(
			'id'			=> 'ex_themes_cat_bg_',
			'type'			=> 'media',
			'title'			=> __( 'Category Backgrounds', THEMES_NAMES ),
			'default'		=> array(
			'url'			=> ''.get_bloginfo('template_directory') . '/assets/img/categories-btn.png'),        
			'desc'			=> __( '<i>* Your Category Background Images...</i>', THEMES_NAMES ),                
		),
		array(
			'id'			=> 'ex_themes_play_bg_',
			'type'			=> 'media',
			'title'			=> __( 'Play Backgrounds', THEMES_NAMES ),
			'default'		=> array(
			'url'			=> ''.get_bloginfo('template_directory') . '/assets/img/playbg_2.png'),        
			'desc'			=> __( '<i>* Your Play Background Images...</i>', THEMES_NAMES ),                
		),
       

    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Categorie', THEMES_NAMES ),
    'id'               => 'categorie_sites',
    'customizer_width' => '500px',
    'icon'             => 'el el-indent-left',
    'fields'     => array(
        array(
            'id'			=> 'ex_themes_categorie_header_active_',
            'type'			=> 'switch',
            'title'			=> __( 'Header', THEMES_NAMES ),
            'desc'			=> __( 'Categorie for Header', THEMES_NAMES ),
            'default'		=> false
        ),
        array(
            'id'			=> 'ex_themes_categorie_header_code_',
            'type'			=> 'textarea',
            'title'			=> __( 'Categorie ', THEMES_NAMES ),
            'desc'			=> __( '<i> Add your Categorie for headers</i>', THEMES_NAMES ),
            'default'		=> "<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x fromgame\">
<a href=\"#your_cat_link_here\"><img class=\"rollevered float-start lazy\" alt=\"Bike Games\" src=\"".get_bloginfo('template_directory'). "/assets/img/bike-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/bike-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/bike-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"97\"><span>Bike Games</span></a></div>",
            'required'		=> array( 'ex_themes_categorie_header_active_', '=', true )
        ), 
        array(
            'id'			=> 'ex_themes_categorie_active_',
            'type'			=> 'switch',
            'title'			=> __( 'All', THEMES_NAMES ),
            'desc'			=> __( 'All Categorie ', THEMES_NAMES ),
            'default'		=> false
        ),
        array(
            'id'			=> 'ex_themes_categorie_code_',
            'type'			=> 'textarea',
            'title'			=> __( 'Categorie ', THEMES_NAMES ),
            'desc'			=> __( '<i> Add your All Categorie  </i>', THEMES_NAMES ),
            'default'		=> "
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Boy Games\" src=\"".get_bloginfo('template_directory')."/assets/img/boy-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/boy-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/boy-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"90\" height=\"100\">
    <span>Boy Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Girl Games\" src=\"".get_bloginfo('template_directory')."/assets/img/girl-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/girl-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/girl-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"82\">
    <span>Girl Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Car Games\" src=\"".get_bloginfo('template_directory')."/assets/img/car-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/car-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/car-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"100\">
    <span>Car Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"2 Player Games\" src=\"".get_bloginfo('template_directory')."/assets/img/2-player-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/2-player-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/2-player-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"68\">
    <span>2 Player Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"iO Games\" src=\"".get_bloginfo('template_directory')."/assets/img/io-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/io-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/io-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"100\">
    <span>iO Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Dress Up Games\" src=\"".get_bloginfo('template_directory')."/assets/img/dress-up-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/dress-up-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/dress-up-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"72\" height=\"100\">
    <span>Dress Up Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Ben 10 Games\" src=\"".get_bloginfo('template_directory')."/assets/img/ben-10-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/ben-10-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/ben-10-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"86\" height=\"100\">
    <span>Ben 10 Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Shooting Games\" src=\"".get_bloginfo('template_directory')."/assets/img/shooting-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/shooting-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/shooting-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"92\">
    <span>Shooting Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"/fighting-games\">
    <img class=\"rollevered float-start lazy\" alt=\"Fighting Games\" src=\"".get_bloginfo('template_directory')."/assets/img/fighting-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/fighting-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/fighting-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"86\" height=\"100\">
    <span>Fighting Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Running Games\" src=\"".get_bloginfo('template_directory')."/assets/img/running-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/running-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/running-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"98\" height=\"100\">
    <span>Running Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Superhero Games\" src=\"".get_bloginfo('template_directory')."/assets/img/superhero-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/superhero-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/superhero-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"73\" height=\"100\">
    <span>Superhero Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Sports Games\" src=\"".get_bloginfo('template_directory')."/assets/img/sports-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/sports-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/sports-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"65\" height=\"100\">
    <span>Sports Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Cartoon Games\" src=\"".get_bloginfo('template_directory')."/assets/img/cartoon-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/cartoon-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/cartoon-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"78\">
    <span>Cartoon Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Animal Games\" src=\"".get_bloginfo('template_directory')."/assets/img/animal-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/animal-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/animal-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"93\">
    <span>Animal Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Minecraft Games\" src=\"".get_bloginfo('template_directory')."/assets/img/minecraft-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/minecraft-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/minecraft-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"80\">
    <span>Minecraft Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Simulation Games\" src=\"".get_bloginfo('template_directory')."/assets/img/simulation-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/simulation-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/simulation-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"88\">
    <span>Simulation Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Bike Games\" src=\"".get_bloginfo('template_directory')."/assets/img/bike-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/bike-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/bike-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"97\">
    <span>Bike Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Action Games\" src=\"".get_bloginfo('template_directory')."/assets/img/action-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/action-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/action-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"91\" height=\"100\">
    <span>Action Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Adventure Games\" src=\"".get_bloginfo('template_directory')."/assets/img/adventure-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/adventure-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/adventure-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"91\">
    <span>Adventure Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Arcade Games\" src=\"".get_bloginfo('template_directory')."/assets/img/arcade-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/arcade-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/arcade-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"95\" height=\"100\">
    <span>Arcade Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Racing Games\" src=\"".get_bloginfo('template_directory')."/assets/img/racing-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/racing-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/racing-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"97\">
    <span>Racing Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Escape Games\" src=\"".get_bloginfo('template_directory')."/assets/img/escape-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/escape-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/escape-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"100\">
    <span>Escape Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Driving Games\" src=\"".get_bloginfo('template_directory')."/assets/img/driving-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/driving-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/driving-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"93\" height=\"100\">
    <span>Driving Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Disney Games\" src=\"".get_bloginfo('template_directory')."/assets/img/disney-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/disney-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/disney-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"100\">
    <span>Disney Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Motorcycle Games\" src=\"".get_bloginfo('template_directory')."/assets/img/motorcycle-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/motorcycle-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/motorcycle-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"84\">
    <span>Motorcycle Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Baby Hazel Games\" src=\"".get_bloginfo('template_directory')."/assets/img/baby-hazel-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/baby-hazel-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/baby-hazel-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"63\" height=\"100\">
    <span>Baby Hazel Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Airplane Games\" src=\"".get_bloginfo('template_directory')."/assets/img/airplane-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/airplane-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/airplane-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"100\">
    <span>Airplane Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Cooking Games\" src=\"".get_bloginfo('template_directory')."/assets/img/cooking-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/cooking-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/cooking-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"100\">
    <span>Cooking Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Football Games\" src=\"".get_bloginfo('template_directory')."/assets/img/football-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/football-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/football-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"73\">
    <span>Football Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Puzzle Games\" src=\"".get_bloginfo('template_directory')."/assets/img/puzzle-games.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/puzzle-games.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/puzzle-games.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"100\">
    <span>Puzzle Games</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Y8\" src=\"".get_bloginfo('template_directory')."/assets/img/y8.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/y8.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/y8.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"43\">
    <span>Y8</span>
  </a>
</div>
<div class=\"catalog-item category-item catalog-item-2x catalog-item-v1x\">
  <a href=\"#your_cat_link_here\">
    <img class=\"rollevered float-start lazy\" alt=\"Poki\" src=\"".get_bloginfo('template_directory')."/assets/img/poki.webp\" srcset=\"".get_bloginfo('template_directory')."/assets/img/1x1.png 100w\" data-src=\"".get_bloginfo('template_directory')."/assets/img/poki.webp\" data-srcset=\"".get_bloginfo('template_directory')."/assets/img/poki.webp 100w\" sizes=\"100px\" decoding=\"async\" width=\"100\" height=\"100\">
    <span>Poki</span>
  </a>
</div>
			
			",
            'required'		=> array( 'ex_themes_categorie_active_', '=', true )
        ), 
        
 
    )
) );

 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Single Post', THEMES_NAMES ),
    'id'               => 'related_posts',
    'customizer_width' => '500px',
    'icon'             => 'el el-pencil-alt',
    'fields'     => array(
       
        array(
            'id'       => 'ex_themes_related_posts_active_',
            'type'     => 'switch',
            'title'    => __( 'Enable Related Post', THEMES_NAMES ),
            //'subtitle' => __( '<br> ', THEMES_NAMES ),
            'default'  => false
        ), 
		array(
            'id'       => 'ex_themes_related_posts_numbers_',
            'type'     => 'slider',
			'title'    => __( 'How much to showing ', THEMES_NAMES ),
			"default"          => 6,
			"min"              => 2,
			"step"             => 1,
			"max"              => 200,
			'display_value'    => 'text', 
            'required' => array( 'ex_themes_related_posts_active_', '=', true )

        ),  
        
           
		 
					
        

    )
) );
   
Redux::setSection( $opt_name, array(
    'title'            => __( 'Script Insert', THEMES_NAMES ),
    'id'               => 'script_insert',
    'customizer_width' => '500px',
    'icon'             => 'el el-pencil',
    'fields'     => array(
    /* 
        array(
        'id'    => 'info_warning',
        'type'  => 'info',
        'style' => 'warning',
        'title' => __('Success!', THEMES_NAMES),
        'icon'  => 'el-icon-info-sign',
        'desc'  => __( 'This is an info field with the success style applied, a header and an icon.', THEMES_NAMES)
        ),
         */
        array(
            'id'       => 'ex_themes_head_on_sections_active_',
            'type'     => 'switch',
            'title'    => __( 'Header Sections', THEMES_NAMES ),
            //'subtitle' => __( '<br> ', THEMES_NAMES ),
            'default'  => false
        ),
        array(
            'id'       => 'header_section',
            'type'     => 'textarea',
            'title'    => __( 'Header Section', THEMES_NAMES ),
            'desc' => __( 'HTML Allowed', THEMES_NAMES ),
            'required' => array( 'ex_themes_head_on_sections_active_', '=', true )
        ),
        array(
            'id'       => 'ex_themes_footers_sections_active_',
            'type'     => 'switch',
            'title'    => __( 'Footer Sections ', THEMES_NAMES ),
            //'subtitle' => __( '<br> ', THEMES_NAMES ),
            'default'  => false
        ),
        array(
            'id'       => 'ex_themes_footers_sections_',
            'type'     => 'textarea',
            'title'    => __( 'Footer Section', THEMES_NAMES ),
            'desc' => __( 'HTML Allowed', THEMES_NAMES ),
            'required' => array( 'ex_themes_footers_sections_active_', '=', true )
        ),
        array(
            'id'       => 'ex_themes_css_editor_active_',
            'type'     => 'switch',
            'title'    => __( 'Custom CSS', THEMES_NAMES ),
            //'subtitle' => __( '<br> ', THEMES_NAMES ),
            'default'  => false
        ),
        array(
            'id'       => 'css_editor',
            'type'     => 'ace_editor',
            'title'    => __('CSS Code', THEMES_NAMES),
            'desc' => __('Paste your Custom CSS code here.', THEMES_NAMES),
            'mode'     => 'css',
            'theme'    => 'monokai',             
            'default'  => "#rtone-header-example{\nmargin: 0 auto;\n}", 
            'required' => array( 'ex_themes_css_editor_active_', '=', true )

        ),
    )
) );
 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Options', THEMES_NAMES ),
    'id'               => 'optionz',
    'customizer_width' => '500px',
    'icon'             => 'el el-adjust-alt',
    'fields'     => array(
        
        array(
               'id'       => 'ex_themes_minify_activate_',
               'type'     => 'switch',
               'title'    => __( 'Enable Minify', THEMES_NAMES ), 
               //'subtitle' => __( '<br> ', THEMES_NAMES ), 
               'default'  => false
           ),   
		 
    )
) );
 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Change Language', THEMES_NAMES ),
    'id'               => 'language',
    'customizer_width' => '500px',
    'icon'             => 'el el-adjust-alt',
    'fields'     => array(
        
        array(
        'id'    => 'info_warning',
        'type'  => 'info',
        'style' => 'warning',
        'title' => __('THIS IS INFO FOR CHANGE LANGUAGE AS YOU WISH', THEMES_NAMES),
        'icon'  => 'el-icon-info-sign',
        'desc'  => __( ' ', THEMES_NAMES)
        ),
		array(
            'id'		=> 'xfriv_Search',
            'type'		=> 'text',
            'title'		=> __('Search', THEMES_NAMES ),
            'default'	=> 'Search...',
			'desc'		=> 'default is <b style="color: blue;">Search</b>',
		), 
		array(
            'id'		=> 'xfriv_play',
            'type'		=> 'text',
            'title'		=> __('Play', THEMES_NAMES ),
            'default'	=> 'Play',
			'desc'		=> 'default is <b style="color: blue;">Play</b>',
		), 
		array(
            'id'		=> 'xfriv_view',
            'type'		=> 'text',
            'title'		=> __('View', THEMES_NAMES ),
            'default'	=> 'View',
			'desc'		=> 'default is <b style="color: blue;">View</b>',
		), 

		array(
            'id'		=> 'xfriv_fullscreen',
            'type'		=> 'text',
            'title'		=> __('Fullscreen', THEMES_NAMES ),
            'default'	=> 'FULLSCREEN',
			'desc'		=> 'default is <b style="color: blue;">FULLSCREEN</b>',
		), 
		array(
            'id'		=> 'xfriv_report',
            'type'		=> 'text',
            'title'		=> __('Report', THEMES_NAMES ),
            'default'	=> 'REPORT',
			'desc'		=> 'default is <b style="color: blue;">REPORT</b>',
		), 
		array(
            'id'		=> 'xfriv_share',
            'type'		=> 'text',
            'title'		=> __('Share', THEMES_NAMES ),
            'default'	=> 'SHARE',
			'desc'		=> 'default is <b style="color: blue;">SHARE</b>',
		), 
		array(
            'id'		=> 'xfriv_comments_name',
            'type'		=> 'text',
            'title'		=> __('Comments Name', THEMES_NAMES ),
            'default'	=> 'Name',
			'desc'		=> 'default is <b style="color: blue;">Name</b>',
		), 
		array(
            'id'		=> 'xfriv_comments_email',
            'type'		=> 'text',
            'title'		=> __('Comments E-Mail', THEMES_NAMES ),
            'default'	=> 'E-Mail',
			'desc'		=> 'default is <b style="color: blue;">E-Mail</b>',
		), 
		array(
            'id'		=> 'xfriv_comments_submit',
            'type'		=> 'text',
            'title'		=> __('Comments Submit', THEMES_NAMES ),
            'default'	=> 'Post Comments',
			'desc'		=> 'default is <b style="color: blue;">Post Comments</b>',
		), 
           
           
    )
) );
