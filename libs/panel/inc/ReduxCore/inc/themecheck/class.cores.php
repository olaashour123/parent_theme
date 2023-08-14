<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if ( !class_exists( 'ReduxFramework' ) && file_exists( get_template_directory().'/libs/inc/ReduxCore/framework.php' ) ) {
				require_once( get_template_directory().'/libs/inc/ReduxCore/framework.php' );  
}
if ( !isset( $redux_demo ) && file_exists( get_template_directory().'/libs/inc/options/config.php' ) ) {
				require_once( get_template_directory().'/libs/inc/options/config.php' );  
}
