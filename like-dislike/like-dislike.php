<?php

defined('ABSPATH') or die('No script kiddies please');

/*
  Plugin Name: Comments Like Dislike
  Description: A simple plugin to add like dislike for your comments
  Version:     1.1.9
  Author:      WP Happy Coders
  Author URI:  http://wphappycoders.com
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages
  Text Domain: comments-like-dislike
 */


if (!class_exists('CLD_Comments_like_dislike')) {

    class CLD_Comments_like_dislike {

        function __construct() {
            $this->define_constants();
            $this->includes();
        }

        /**
         * Define necessary constants
         *
         * @since 1.0.0
         */
        function define_constants() {
            defined('CLD_TD') or define('CLD_TD', 'like-dislike');
            defined('CLD_PATH') or define('CLD_PATH', EX_THEMES_DIR.'/'.CLD_TD.'/');
            defined('CLD_IMG_DIR') or define('CLD_IMG_DIR', EX_THEMES_URI.'/'.CLD_TD.'/images');
            defined('CLD_CSS_DIR') or define('CLD_CSS_DIR', EX_THEMES_URI.'/'.CLD_TD.'/css');
            defined('CLD_JS_DIR') or define('CLD_JS_DIR', EX_THEMES_URI.'/'.CLD_TD.'/js');
            defined('CLD_VERSION') or define('CLD_VERSION', '1.1.9');
            defined('CLD_BASENAME') or define('CLD_BASENAME', CLD_TD);
        }
        /**
         * Include all the necessary files
         *
         * @since 1.0.0
         */
        function includes() {
            require_once CLD_PATH . '/inc/cores/cld-functions.php';
            require_once CLD_PATH . '/inc/classes/cld-library.php';
            require_once CLD_PATH . '/inc/classes/cld-activation.php';
            require_once CLD_PATH . 'inc/classes/cld-init.php';
            require_once CLD_PATH . 'inc/classes/cld-admin.php';
            require_once CLD_PATH . 'inc/classes/cld-enqueue.php';
            require_once CLD_PATH . 'inc/classes/cld-hook.php';
            require_once CLD_PATH . 'inc/classes/cld-ajax.php';
        }

    }

    $cld_object = new CLD_Comments_like_dislike();
}
