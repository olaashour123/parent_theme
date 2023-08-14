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
function ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'Default Demos',
			'categories'                 => array( 'Default' ),
			'import_file_url'            => EX_THEMES_URI.'/libs/demo/demo-content-default.xml',
			'import_widget_file_url'     => EX_THEMES_URI.'/libs/demo/demo-widgets-default.wie', 
			'import_customizer_file_url' => EX_THEMES_URI.'/libs/demo/demo-data-default.dat', 
			'import_redux'               => array(
				array(
					'file_url'    => EX_THEMES_URI.'/libs/demo/demo-redux-default.json', 
					'option_name' => 'opt_themes',
				),
			),
			'import_preview_image_url'   => EX_THEMES_URI.'/assets/img/screenshot.png',
			'import_notice'              => __( 'before you import this demo, you have to install all required plugins.', THEMES_NAMES ),
			'preview_url'                => EXTHEMES_DEMO_URL,
		),
		array(
			'import_file_name'           => 'RTL Demos',
			'categories'                 => array( 'RTL' ),
			'import_file_url'            => EX_THEMES_URI.'/libs/demo/demo-content-rtl.xml',
			'import_widget_file_url'     => EX_THEMES_URI.'/libs/demo/demo-widgets-rtl.wie', 
			'import_customizer_file_url' => EX_THEMES_URI.'/libs/demo/demo-data-rtl.dat', 
			'import_redux'               => array(
				array(
					'file_url'    => EX_THEMES_URI.'/libs/demo/demo-redux-rtl.json', 
					'option_name' => 'opt_themes',
				),
			),
			'import_preview_image_url'   => EX_THEMES_URI.'/assets/img/demos-rtl.png',
			'import_notice'              => __( 'before you import this demo, you have to install all required plugins.', THEMES_NAMES ),
			'preview_url'                => EXTHEMES_DEMO_RTL_URL,
		),
	);
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );

if ( ! function_exists( 'ocdi_after_import' ) ) :
	/**
	 * Set action after import demo data. Plugin require is. https://wordpress.org/plugins/one-click-demo-import/
	 *
	 * @param Array $selected_import Import selected.
	 * @since v.1.0.0
	 * @link https://wordpress.org/plugins/one-click-demo-import/faq/
	 *
	 * @return void
	 */
	function ocdi_after_import( $selected_import ) {
		// Menus to Import and assign - you can remove or add as many as you want.
		$top_menu    = get_term_by( 'name', 'Top menus', 'nav_menu' );
		$second_menu = get_term_by( 'name', 'Second menus', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary'   => $top_menu->term_id,
				'secondary' => $second_menu->term_id,
			)
		);

	}
endif;
//add_action( 'pt-ocdi/after_import', 'ocdi_after_import' );

if ( ! function_exists( 'change_time_of_single_ajax_call' ) ) :
	/**
	 * Change ajax call timeout
	 *
	 * @link https://github.com/awesomemotive/one-click-demo-import/blob/master/docs/import-problems.md.
	 */
	function change_time_of_single_ajax_call() {
		return 60;
	}
endif;
//add_action( 'pt-ocdi/time_for_one_ajax_call', 'change_time_of_single_ajax_call' );

// disable generation of smaller images (thumbnails) during the content import.
//add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

// disable the branding notice.
//add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

