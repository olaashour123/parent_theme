<?php
/**
 * Available filters for extending Merlin WP.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

/**
 * Filter the home page title from your demo content.
 * If your demo's home page title is "Home", you don't need this.
 *
 * @param string $output Home page title.
 */
function exthemes_merlin_content_home_page_title( $output ) {
	return EX_THEMES_NAMES_. 'front page';
}
add_filter( 'merlin_content_home_page_title', 'exthemes_merlin_content_home_page_title' );

/**
 * Filter the blog page title from your demo content.
 * If your demo's blog page title is "Blog", you don't need this.
 *
 * @param string $output Index blogroll page title.
 */
function exthemes_merlin_content_blog_page_title( $output ) {
	return 'Blog';
}
add_filter( 'merlin_content_blog_page_title', 'exthemes_merlin_content_blog_page_title' );

/**
 * Add your widget area to unset the default widgets from.
 * If your theme's first widget area is "sidebar-1", you don't need this.
 *
 * @see https://stackoverflow.com/questions/11757461/how-to-populate-widgets-on-sidebar-on-theme-activation
 *
 * @param  array $widget_areas Arguments for the sidebars_widgets widget areas.
 * @return array of arguments to update the sidebars_widgets option.
 */
function exthemes_merlin_unset_default_widgets_args( $widget_areas ) {

	$widget_areas = array(
		'sidebar-1' => array(),
	);

	return $widget_areas;
}
add_filter( 'merlin_unset_default_widgets_args', 'exthemes_merlin_unset_default_widgets_args' );

/**
 * Custom content for the generated child theme's functions.php file.
 *
 * @param string $output Generated content.
 * @param string $slug Parent theme slug.
 */
function exthemes_generate_child_functions_php( $output, $slug ) {

	$slug_no_hyphens = strtolower( preg_replace( '#[^a-zA-Z]#', '', $slug ) );

	$output = "
		<?php
		/**
		 * Theme functions and definitions.
		 */
		function {$slug_no_hyphens}_child_enqueue_styles() {

		    if ( SCRIPT_DEBUG ) {
		        wp_enqueue_style( '{$slug}-style' , get_template_directory_uri() . '/style.css' );
		    } else {
		        wp_enqueue_style( '{$slug}-minified-style' , get_template_directory_uri() . '/style.min.css' );
		    }

		    wp_enqueue_style( '{$slug}-child-style',
		        get_stylesheet_directory_uri() . '/style.css',
		        array( '{$slug}-style' ),
		        wp_get_theme()->get('Version')
		    );
		}

		add_action(  'wp_enqueue_scripts', '{$slug_no_hyphens}_child_enqueue_styles' );\n
	";

	// Let's remove the tabs so that it displays nicely.
	$output = trim( preg_replace( '/\t+/', '', $output ) );

	// Filterable return.
	return $output;
}
add_filter( 'merlin_generate_child_functions_php', 'exthemes_generate_child_functions_php', 10, 2 );
 
function exthemes_merlin_import_file_urls() {
	return array(
		array(
			'import_file_name'           => 'Demo Import from '.EXTHEMES_DEMO_URL.'',
			'import_file_url'            => trailingslashit( EX_THEMES_DIR ) . 'demo/demo-median.xml',
			/* 'import_widget_file_url'     => trailingslashit( EX_THEMES_DIR ) . 'demo/demo/widgets.json', */
			/* 'import_customizer_file_url' => trailingslashit( EX_THEMES_DIR ) . 'demo/demo/customize.dat', */
			/* 'import_preview_image_url'   => trailingslashit( EX_THEMES_DIR ) . '/screenshot.png', */
			'import_notice'              => __( 'Before Setup Demo '.EX_THEMES_NAMES_.' Please Install All Plugin Requireds. For Import You Need to wait 3-5 Mintues.', 'exthemes' ),
			'preview_url'                => EXTHEMES_DEMO_URL,
           /*  'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( EX_THEMES_DIR ) . 'demo/redux.json',
					'option_name' => 'opt_themes',
				),
			), */
		),
	);
}
/* add_filter( 'merlin_import_files', 'exthemes_merlin_import_file_urls' ); */

function merlin_local_import_files() {
	return array(
		array(
			'import_file_name'             => 'Demo Import from Local',
			'local_import_file'            => get_parent_theme_file_path( '/libs/demo/demo-content-default.xml' ),
			'local_import_widget_file'     => get_parent_theme_file_path( '/libs/demo/demo-widgets-default.wie' ), 
			'local_import_customizer_file' => get_parent_theme_file_path( '/libs/demo/demo-data-default.dat' ), 
			'import_preview_image_url'     => get_template_directory( '/screenshot.png' ), 
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_parent_theme_file_path() ) . '/libs/demo/demo-redux-default.json',
					'option_name' => 'opt_themes',
				),
			),
			'import_notice'              => __( 'Before Setup Demo '.EX_THEMES_NAMES_.' Please Install All Plugin Requireds. For Import You Need to wait 3-5 Mintues.', 'exthemes' ),
			'preview_url'                  => EXTHEMES_DEMO_URL,
		),
		/* 
		array(
			'import_file_name'           => 'Demo Import from Demo Sites',
			'import_file_url'            => 'https://exthem.es/moddroid/demo/demo.xml',
			'import_widget_file_url'     => 'https://exthem.es/moddroid/demo/widgets.wie',
			'import_customizer_file_url' => 'https://exthem.es/moddroid/demo/export.dat',
			'import_preview_image_url'   => get_template_directory( '/screenshot.png' ), 
			'import_redux'           => array(
				array(
				'file_url'   => 'https://exthem.es/moddroid/demo/redux.json',
					'option_name' => 'opt_themes',
				),
			),
			'import_notice'              => __( 'Before Setup Demo '.EX_THEMES_NAMES_.' Please Install All Plugin Requireds. For Import You Need to wait 3-5 Mintues.', 'exthemes' ),
			'preview_url'                => EXTHEMES_DEMO_URL,
		),
		 */
	);
}
add_filter( 'merlin_import_files', 'merlin_local_import_files' );
/* 
function prefix_merlin_local_import_files() {
	return array(
		array(
			'import_file_name'             => 'Demo Import '.EXTHEMES_DEMO_URL.'',
			'local_import_file'            => trailingslashit( get_template_directory() ) . '/demo/contents.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/demo/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/demo/options.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . '/demo/redux.json',
					'option_name' => 'opt_themes',
				),
			),
			'import_preview_image_url'     => 'https://www.example.com/merlin/preview_import_image1.jpg',
			'import_notice'              => __( 'Before Setup Demo '.EX_THEMES_NAMES_.' Please Install All Plugin Requireds. For Import You Need to wait 3-5 Mintues.', 'exthemes' ),
			'preview_url'                  => EXTHEMES_DEMO_URL,
		),
		array(
			'import_file_name'             => 'Demo Import rtones',
			'local_import_file'            => trailingslashit( get_template_directory() ) . '/demo/content.xmll',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/demo/widgets.json',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/demo/customize.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'demo/redux.json',
					'option_name' => 'redux_option_name2',
				),
			),
			'import_preview_image_url'     => 'https://www.example.com/merlin/preview_import_image2.jpg',
			'import_notice'              => __( 'Before Setup Demo '.EX_THEMES_NAMES_.' Please Install All Plugin Requireds. For Import You Need to wait 3-5 Mintues.', 'exthemes' ),
			'preview_url'                  => 'https://www.example.com/my-demo-2',
		),
	);
}
add_filter( 'merlin_import_files', 'prefix_merlin_local_import_files' );
 */
/**
 * Execute custom code after the whole import has finished.
 */
/* function exthemes_merlin_after_import_setup() {
	// Assign menus to their locations.
	 $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $top_menu = get_term_by( 'name', 'Top Left Side Menu', 'nav_menu' );


	set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'top-menu' => $top_menu->term_id,
        )
    );

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

} */
/* add_action( 'merlin_after_all_import', 'exthemes_merlin_after_import_setup' ); */
