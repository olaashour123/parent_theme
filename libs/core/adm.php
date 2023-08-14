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
add_action('admin_head', '_5play_custom_styles');
function _5play_custom_styles() { ?>
<link href="https://fonts.googleapis.com/css?family=Pacifico|Comfortaa|Lobster" rel="stylesheet">
<style> 
td.likes.column-likes{display:block;min-width:25px;height:2em;color:#fff;font-size:11px;line-height:1.90909090;text-align:center;margin-top:5px}td.dislikes.column-dislikes{}.f1{font-family:'Lobster',cursive}.f2{font-family:'Comfortaa',cursive}.f3{font-family:'Pacifico',cursive}.redux-main,.redux-sidebar,#wp_apk_details,#wp_desc,#repeatable-fields,#post_gallery,#changelogs_themes_dashboard_widget{font-family:'Comfortaa',cursive}.cool-link{font-size:13px;display:inline-block;color:steelblue;text-decoration:none}.cool-link::after{content:"";display:block;width:0;height:2px;background:steelblue;transition:width 0.2s}.cool-link:hover::after{width:100%}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php }
add_filter('admin_menu', 'admin_menu_filter',500);
function admin_menu_filter() {
	if (current_user_can('editor')) {
		//administrator
		remove_submenu_page( 'themes.php', 'themes.php?page=exthemes' );
		remove_submenu_page( 'themes.php', 'exthemes' );
		remove_submenu_page( 'themes.php', 'widgets.php' );//widget
		remove_submenu_page( 'themes.php', 'theme-editor.php'); //editor
		remove_submenu_page( 'themes.php', 'theme_options' ); //theme-option
		remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwordpress%2Fwp-admin%2Fnav-menus.php' ); // hide the customize submenu
		$customizer_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
		remove_submenu_page( 'themes.php', $customizer_url );
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'themes.php' );                 //Appearance
		remove_menu_page( 'plugins.php' );                //Plugins
		remove_menu_page( 'users.php' );                  //Users
		remove_menu_page( 'tools.php' );                  //Tools
		remove_menu_page( 'options-general.php' );        //Settings
		remove_menu_page( 'index.php' );                  //Dashboard
		remove_menu_page( 'upload.php' );
		remove_submenu_page( 'admin.php', 'admin.php?page=_options&tab=10' ); //admin.php?page=_options&tab=10
		remove_submenu_page( 'admin.php', '?page=_options&tab=10' ); //admin.php?page=_options&tab=10
		remove_submenu_page( 'admin.php', '_options&tab=10' ); //admin.php?page=_options&tab=10
		remove_submenu_page( 'admin.php', 'page=_options&tab=10' ); //admin.php?page=_options&tab=10
  }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets()
{
	global $wp_meta_boxes;
	unset(
	$wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
	$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
	$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
	);
	wp_add_dashboard_widget( 'dashboard_custom_feed', 'Latest Blog '.DEVS , 'dashboard_custom_feed_output' );
}
function dashboard_custom_feed_output() {
	echo '<div class="rss-widget">';
	wp_widget_rss_output(array(
	'url'				=> 'https://exthem.es/blog/feed/',
	'title'				=> 'Latest Blog ',
	'items'				=> 5,
	'show_summary'		=> 1,
	'show_author'		=> 1,
	'show_date'			=> 1
	));
	/* wp_widget_rss_output(array(
	'url'				=> 'https://iblog.my.id/feed/',
	'title'				=> 'Latest Blog ',
	'items'				=> 5,
	'show_summary'		=> 1,
	'show_author'		=> 1,
	'show_date'			=> 1
	)); */
	wp_widget_rss_output(array(
	'url'				=> 'https://ex-themes.com/feed/',
	'title'				=> 'Latest Blog ',
	'items'				=> 5,
	'show_summary'		=> 1,
	'show_author'		=> 1,
	'show_date'			=> 1
	));
	echo '</div>';
}

// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function exthemes_wp_dashboard_setup() {
	// Add custom dashbboard widget.
	add_meta_box(
	'dashboard_widget_exthemes',
	__( 'Best Product Themes for You '.DEVS, THEMES_NAMES ),
	'exthemes_render_dashboard_widget',
	'dashboard',
	'normal',  // $context: 'advanced', 'normal', 'side', 'column3', 'column4'
	'high'  // $priority: 'high', 'core', 'default', 'low'
	);
}
add_action( 'wp_dashboard_setup', 'exthemes_wp_dashboard_setup' );
if ( ! function_exists( 'exthemes_get_banner_widget' ) )
	:
/**
* Get json data banner
*
* @since 1.0.0
* @param int $cache Cache.
* @return array
*/
function exthemes_get_banner_widget( $cache = 168 )
{
	if ( false === ( $result = get_transient( 'exthemes_cache_json_banner_' . $cache ) ) ) {
		$response = wp_remote_get(
		''.EXTHEMES_API_URL.'/idasboard.json',
		array(
		'timeout'   => 120,
		'sslverify' => false,
		)
		);
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			if ( is_wp_error( $response ) ) {
				$result = false;
			} else {
				$result = false;
			}
		} else {
			$data = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( ! empty( $data ) && is_array( $data ) ) {
				$result = $data;
			} else {
				$result = false;
			}
		}
		set_transient( 'exthemes_cache_json_banner_' . $cache, $result, $cache * HOUR_IN_SECONDS );
	}
	return $result;
}
endif;
/**
* Render widget.
*/
function exthemes_render_dashboard_widget()
{
	$cache = 168;
	$data_array = exthemes_get_banner_widget( $cache );
	if ( false !== $data_array && ! empty( $data_array ) && is_array( $data_array ) ) {
		$imagebanner    = $data_array['bannerimage'];
		$imagebannerurl = $data_array['urlbannerimage'];
		if ( ! empty( $imagebanner ) && isset( $imagebanner ) && ! empty( $imagebannerurl ) && isset( $imagebannerurl ) ) {
			echo '<div style="margin: -13px -13px 15px;">';
			echo '<a href="' . esc_url( $imagebannerurl ) . '?source='.DOMAINSITES.'" rel="nofollow" target="_blank"><img src="' . esc_url( $imagebanner ) . '" style="display:block;width:100%;" loading="lazy" /></a>';
			echo '</div>';
		}
		$themeterbaru = $data_array['newtheme'];
		if ( is_array( $themeterbaru ) ) {
			echo '<div id="published-posts">';
			echo '<h3>Best Product Themes for You from '.DEVS.'</h3>';
			echo '<ul>';
			foreach ( $themeterbaru as $value ) {
				if ( ! empty( $value['url'] ) && isset( $value['url'] ) && ! empty( $value['title'] ) && isset( $value['title'] ) ) {
					echo '<li><a href="' . esc_url( $value['url'] ) . '?source='.DOMAINSITES.'" rel="nofollow" target="_blank">' . esc_attr( $value['title'] ) . '</a></li>';
				}
			}
			echo '</ul></div>';
		}
	} else {
		echo '<p>No News</p>';
		delete_transient( 'exthemes_cache_json_banner_' . $cache );
	}
	
	echo '<p class="community-events-footer" style="margin: 0 -12px -12px !important;background-color: #efefef;">';
	echo '<a href="'.EXTHEMES_MEMBER_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-admin-site"></span> Member Area <span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_FACEBOOK_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-facebook"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span> </a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_YOUTUBE_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-youtube"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_INSTAGRAM_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-instagram"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_TWITTER_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-twitter"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo '</p>';  
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function rgb($hex, $asString = true) {
// strip off any leading #
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}      

// break into hex 3-tuple
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);

// convert each tuple to decimal
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);

return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .7)" : $rgb);
/* rgba(0,128,128, 0.1) */
}
/*-----------------------------------------------------------------------------------*/ 

//add_action( 'wp_dashboard_setup', 'supports_cs_setup_function' );
function supports_cs_setup_function() {
    add_meta_box( 'my_dashboard_widget', DEVS.' Support '.THEMES_NAMES.' Themes', 'supports_cs_widget_function', 'dashboard', 'side', 'high' );
}
function supports_cs_widget_function() { ?>
<style>
.scrollable-supports {height: 350px;width: 100%;overflow: hidden;overflow-x: hidden;}a:link,a:visited{text-decoration:none;transition:all .4s ease-in-out}.credit{background:#fff;position:relative;display:inline-block;padding:10px 20px;border:1px solid #ddd;border-radius:20px}#whatsapp-chat{background:#fff;width:100%;border-radius:10px;box-shadow:0 1px 15px rgba(32,33,36,.28);bottom:90px;right:30px;overflow:hidden;z-index:99;animation-name:showchat;animation-duration:1s;transform:scale(1)}a.blantershow-chat{background:linear-gradient(to right top,#075e54,#075e54);color:#fff;position:fixed;z-index:98;bottom:25px;right:30px;font-size:15px;padding:10px 20px;border-radius:30px;box-shadow:0 1px 15px rgba(32,33,36,.28)}a.blantershow-chat i{transform:scale(1.2);margin:0 10px 0 0}.header-chat{background:linear-gradient(to right top,#075e54,#075e54);color:#fff;padding:20px}.header-chat h3{margin:0 0 10px}.header-chat p{font-size:14px;line-height:1.7;margin:0}.info-avatar{position:relative}.info-avatar img{border-radius:100%;width:50px;float:left;margin:0 10px 0 0}.info-avatar:before{content:'\f232';z-index:1;font-family:"Font Awesome 5 Brands";background:#075e54;color:#fff;padding:4px 5px;border-radius:100%;position:absolute;top:30px;left:30px}a.informasi{padding:20px;display:block;overflow:hidden;animation-name:showhide;animation-duration:2.5s}a.informasi:hover{background:#f1f1f1}.info-chat span{display:block}#get-label,span.chat-label{font-size:12px;color:#888}#get-nama,span.chat-nama{margin:5px 0 0;font-size:15px;font-weight:700;color:#222}#get-label,#get-nama{color:#fff}span.my-number{display:none}.blanter-msg{color:#444;padding:20px;font-size:12.5px;text-align:center;border-top:1px solid #ddd}textarea#chat-input{border:none;font-family:'Arial',sans-serif;width:100%;height:20px;outline:none;resize:none}a#send-it{color:#555;width:40px;margin:-5px 0 0 5px;font-weight:700;padding:8px;background:#eee;border-radius:10px}.first-msg{background:#f5f5f5;padding:30px;text-align:center}.first-msg span{background:#e2e2e2;color:#333;font-size:14.2px;line-height:1.7;border-radius:10px;padding:15px 20px;display:inline-block}.start-chat .blanter-msg{display:flex}#get-number{display:none}a.close-chat{position:absolute;top:5px;right:15px;color:#fff;font-size:30px}@keyframes showhide{from{transform:scale(.5);opacity:0}}@keyframes showchat{from{transform:scale(0);opacity:0}}@media screen and (max-width:480px){#whatsapp-chat{width:auto;left:5%;right:5%;font-size:80%}}.hide{display:none;animation-name:showhide;animation-duration:1.5s;transform:scale(1);opacity:1}.show{display:block;animation-name:showhide;animation-duration:1.5s;transform:scale(1);opacity:1}
</style>

<div id="fb-root"></div>
<script> //<![CDATA[
  (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1&appId=2211013729079516&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
//]]> </script>

<center>
<div class="fb-group"
   data-href="https://www.facebook.com/groups/exthem.es"
   data-width="300"
   data-show-social-context="true"
   data-show-metadata="false">
</div>
</center>
 
<?php 
}

//add_action( 'wp_dashboard_setup', 'changelogs_themes' );
function changelogs_themes() {
    add_meta_box( 'changelogs_themes_dashboard_widget', 'Changelogs for '.THEMES_NAMES.' Themes', 'changelogs_themes_function', 'dashboard', 'side', 'high' );
}
function changelogs_themes_function() {  

?>

<style>
	 #px-changelog .last-changelog {border-bottom: 2px dashed #CCC;border-bottom: 2px dashed #CCC;}#px-changelog .alert {display: inline-block;padding: 0px 5px;border-radius: 3px;font-size: 11px;border: 1px solid;margin: 4px 10px 4px 0;min-width: 85px;text-align: center;}#px-changelog ul {margin: 0;padding: 0;margin-top: 20px;margin-bottom: 20px;}#px-changelog ul li {width: auto;margin-bottom: 9px;list-style: none;padding-left: 130px;position: relative;text-transform: capitalize;}#px-changelog .chl-release, #px-changelog .chl-error-fixed, #px-changelog .chl-fixed, #px-changelog .chl-remove, #px-changelog .chl-add {display: inline-block;border-radius: 2px;-webkit-border-radius: 2px;-moz-border-radius: 2px;-ms-border-radius: 2px;-o-border-radius: 2px;padding: 0px 9px;margin-right: 10px;color: #FFF;font-size: 12px;min-width: 100px;text-align: center;height: 22px;position: absolute;left: 0;border: 1px solid;font-weight: bold;}#px-changelog .chl-add {border-color: #59b859;color: #59b859;}#px-changelog .chl-fixed {border-color: steelblue;color: blue;}#px-changelog .chl-remove {border-color: crimson;color: crimson;}#px-changelog .chl-release {color: #3a87ad;background-color: #d9edf7;border-color: #bce8f1;}#px-changelog h1, #px-changelog h2, #px-changelog h3, #px-changelog h4{margin-top: 10px;margin-bottom: 10px;}#px-changelog h3 {font-weight: bold;}#px-changelog a {color: #3a87ad;text-transform: uppercase;font-weight: bold;}.scrollable-changelog {height: 200px;width: 100%;overflow: scroll;overflow-x: hidden;}.scrollable-changelog ul li {display: block;margin-bottom: 5px;text-overflow: clip;text-overflow: ellipsis;white-space: nowrap;}
</style>

<div id="px-changelog">	 
	<div class="last-changelog">	
	<h2 style="color: red;">Infos</h2>
	<iframe id="infos" src="//demos.web.id/infos-5play.php" width="100%" ></iframe> 
	&nbsp;
	<h2>Whats is Changes</h2>
	<noscript>	
	<div class="scrollable-changelog"> 	
	<i style="font-size: x-small;color: dimgrey;"><?php echo round(((( time() - strtotime("2022-04-11 00:00:00") )/60)/60)/24).' day(s) ago'; ?></i>
	</div>
	</noscript>
	
	<iframe id="logs" src="//demos.web.id/changelog-5play.php" width="100%" ></iframe>
	&nbsp;
	
	<p><strong>Please back up your theme when you are done customizing your theme, as errors in your themes are not the responsibility of the developers</strong>. if you got errors, Please Download on <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank">member area</a> For Manual Upload</p>
	
	<h2>Upgrade</h2>
	NOTE: If you have directly made changes to the files, the update will overwrite these changes. So, we recommend that you DO NOT make changes in this way. Alternatively you can use plugins that allow adding CSS, however we do not guarantee that the 'classes' or 'id' will change in future updates.
	
	
	<h2>Manual update</h2>
	Before updating anything, make sure you have backups.<br>
	<ol>
		<li>Download the theme by logging into your account <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank" rel="noopener">login</a> and <a href="<?php echo EXTHEMES_HOW_TO; ?>" target="_blank" rel="noopener">see my license key</a></li>
		<li>Unzip the <strong>'<?php echo THEMES_NAMES; ?>'</strong> theme file.</li>
		<li>From your FTP account, replace all files within the <strong>'<?php echo THEMES_NAMES; ?>'</strong> folder found in the 'wp-content' directory. </li>
	</ol>
	<p>More information: <a href="<?php echo EXTHEMES_ITEMS_URL; ?>" target="_blank" rel="noopener"><?php echo EXTHEMES_ITEMS_URL; ?></a></p>
	 
	
	</div>
 

	<?php 
	echo '<h2>Memory & PHP Infos</h2>';
	echo 'Memory Limit: <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.ini_get('memory_limit').'</b>';
	echo '<br>';
	echo 'PHP version: <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.phpversion().'</b> ( Required PHP 8+ )';
	echo '<br>';
	echo 'OS : <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.php_uname().'</b>';
	echo ' and <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.PHP_OS.'</b>';
	if ( ini_get( 'allow_url_fopen' ) ) {
     echo "<br>allow_url_fopen is <b style=\"font-size: 87.5%;color: #e83e8c;word-wrap: break-word;\">ENABLED</b>\n";
	} else {    
		 echo "<br>allow_url_fopen is DISABLED. please make it <u class=\"cool-link f2\">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> ( Required allow_url_fopen )\n";
	} 
	if ( ini_get( 'allow_url_fopen' ) ) { } else { ?>
	<h2>Using the allow_url_fopen directive</h4>
	<p>The <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive is disabled by default. You should be aware of the security implications of enabling the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive. PHP scripts that can access remote files are potentially vulnerable to arbitrary code injection.</p>

	<p>When the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive is enabled, you can write scripts that open remote files as if they are local files. For example, you can use the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">file_get_contents</strong> function to retrieve the contents of a web page.</p>

	<p>To enable this functionality, use a text editor to modify the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive in the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">php.ini</strong> file as follows:</p>

	<pre style="margin: 1.5em 0;padding: 15px;color: #212529;line-height: 1.2em;border: 1px solid #c9c9c9;border-radius: .2rem;box-shadow: 1px 1px 1px #d8d8d8;background: #fafafa;white-space: pre-wrap;">allow_url_fopen = on</pre>
	<p>To disable this functionality, modify the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive in the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">php.ini</strong> file as follows:</p>

	<pre style="margin: 1.5em 0;padding: 15px;color: #212529;line-height: 1.2em;border: 1px solid #c9c9c9;border-radius: .2rem;box-shadow: 1px 1px 1px #d8d8d8;background: #fafafa;white-space: pre-wrap;">allow_url_fopen = off</pre>

	<p>To verify the current value of the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive and other directives, you can use the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">phpinfo()</strong> function. </p> 
	<?php } ?>
</div>
<?php  } 

define('ex_themes_name_cs','Theme Docs');
function wp_exthemes_supports() {
    add_menu_page(
        __( 'docs_themes', THEMES_NAMES ), ex_themes_name_cs,
        'manage_options',
        'docs_themes',
        'wp__docs',
        'dashicons-info-outline',
        //plugins_url( '/img/imdb.png' ),
        100
    );
    add_submenu_page( 'docs_themes', 'Live Supports', 'Live Supports', 'manage_options', 'wp__supportss', 'wp__supports' ); 
    add_submenu_page( 'docs_themes', 'Changelogs', 'Changelogs', 'manage_options', 'wp__changelogs', 'wp__changelogs' );  
    add_submenu_page( 'docs_themes', 'Required', 'Required', 'manage_options', 'Required', 'wp__required' ); 
     
}
add_action('admin_menu', 'wp_exthemes_supports');

function wp__docs() { ?>
<div class="wrap">
<?php echo file_get_contents(EX_THEMES_DIR.'/youtube.php'); ?>
</div>
<?php } 

function wp__changelogs() { ?>

<div class="wrap">
<div class="container">
			<div id="px-changelog"> 
				<div class="last-changelog">
				<h2 style="color: red;background-color: ghostwhite;">Infos</h2>
				<p style="color: crimson;background-color: ghostwhite;"> Please back up your theme when you are done customizing your theme, as errors in your themes are not the responsibility of the developers</strong>. if you got errors, Please ReDownload moddroid themes and upload for manual on <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank">member area</a> For Manual Upload</p>					 
				
				<h2>Upgrade</h2>
				NOTE: If you have directly made changes to the files, the update will overwrite these changes. So, we recommend that you DO NOT make changes in this way. Alternatively you can use plugins that allow adding CSS, however we do not guarantee that the 'classes' or 'id' will change in future updates.
				
				<h2>Manual update</h2>
				Before updating anything, make sure you have backups.<br>
				<ol>
					<li>Download the theme by logging into your account <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank" rel="noopener">login</a> and <a href="<?php echo EXTHEMES_HOW_TO; ?>" target="_blank" rel="noopener">see my license key</a></li>
					<li>Unzip the <strong>'<?php echo strtolower(THEMES_NAMES); ?>'</strong> theme file.</li>
					<li>From your FTP account, replace all files within the <strong>'<?php echo strtolower(THEMES_NAMES); ?>'</strong> folder found in the 'wp-content' directory. </li>
				</ol>				
				</div>
			</div>
			
			<div id="px-changelog">	 
				<div class="last-changelog">
				<h2>Whats is Changes</h2>	
				</div>

				<div class="last-changelog">	
				<?php echo file_get_contents(WEBSCHANGELOGS); ?> 
				</div>
			</div>
 
	</div><!-- end div .container -->
</div>
<?php } 

function wp__required() { ?> 
<style>
 body {font-size:80%;color:#222;background:#fff; }
 .error, .notice, .success {padding:.8em;margin-bottom:1em;border:2px solid #ddd;}.error {background:#FBE3E4;color:#8a1f11;border-color:#FBC2C4;}.notice {background:#FFF6BF;color:#514721;border-color:#FFD324;}.success {background:#E6EFC2;color:#264409;border-color:#C6D880;}.error a {color:#8a1f11;}.notice a {color:#514721;}.success a {color:#264409;}.container {width:100%;margin:0 auto;} 
</style>

<div class="wrap">

	<div class="container">
	<?php  
	echo '<h2>Memory & PHP Infos</h2>';
	echo 'Memory Limit : <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.ini_get('memory_limit').'</b>';
	echo '<br>';	 
	echo 'Post Max Size : <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">' . ini_get('post_max_size') .'</b>';
	echo '<br>';
	echo 'PHP version : <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.phpversion().'</b> ( <u class="cool-link f2">Required PHP 8+</u> )';
	echo '<br>';
	echo 'OS : <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.php_uname().'</b>';
	echo ' and <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.PHP_OS.'</b>';
	if ( ini_get( 'allow_url_fopen' ) ) {
     echo "<br>allow_url_fopen is <b style=\"font-size: 87.5%;color: #e83e8c;word-wrap: break-word;\">ENABLED</b>\n";
	} else {    
		 echo "<br>allow_url_fopen is DISABLED. please make it <u class=\"cool-link f2\">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> ( Required allow_url_fopen )\n";
	} 
	if ( !ini_get( 'allow_url_fopen' ) ) { ?>
	<h1>How to ENABLED allow_url_fopen</h1>
	
	<h2>How to enable or disable allow_url_fopen in cPanel</h2>
	
	<p>There are specific scenarios when you may be asked to change your PHP configuration. Specifically, you may be directed to edit a file on your server called php.ini and to enable or disable <strong  style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong>.</p>
	
	<h3>What is allow_url_fopen?</h3>
	<p>The <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> is a setting managed through the PHP Options which allows PHP file functions to retrieve data from remote locations over FTP or HTTP. This option is a significant security risk, thus, do not turn it on without necessity.</p>
	
	<h3>How to Enable or Disable allow_url_fopen in cPanel</h3>
	<p>The PHP Selector is omitted by default in cPanel and might be missing from your account if you are hosting with a different web host. All ChemiCloud customers should see the Select PHP Version section in their hosting account&#8217;s cPanel.</p>
	
	<p>While do not allow direct changes to PHP.ini on our servers. However, PHP configuration changes can be made from cPanel by following these steps:</p>
	
	<p><strong>1) </strong>Log into <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">cPanel</strong>.</p>
	<p><strong>2)</strong> Look for the <em style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">SOFTWARE</em> section and click on <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">Select PHP version</strong></p>
	<?php  
	$image 			= 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgDGcqHRNxK9mTccGGH6-fCI4K50JLipaKkdXE2JbIJQbdGOihGxnbgzolTLrWTsgobiUWewVC8yRyu4nPQV6y88tIfNecPyImhCRmQBKF-pBAOh51huovf-PLaDILmv4sYcGembT_Tbj06_6JY3Yuq72VFz3wA_7STeblB2EDPPoHodNHbkjgbTqER/s1600/Software-Select-PHP-Version.png';	 
	$imageData		= base64_encode(file_get_contents($image)); 
	$src			= 'data: png;base64,'.$imageData; 
	?>
	<figure style="width: 643px" class="caption alignnone">
	<img class="size-large wp-image-7674" src="<?php echo $src; ?>" alt="PHP Version" width="643" height="245" /><figcaption class="caption-text">Software &gt; Select PHP Version</figcaption>
	</figure>
	
	<p><strong>3)</strong> Click on the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">Options</strong> link in the new window.</p>
	
	<?php  
	$image1 			= 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiO_GXUoykbByxAzRBYS1ret9lTMfddU7Z4Kp9HeBBk_BfP_9U61phWnloXGti7VYduytWjvR68nseOUv4dHGCD-7ge1jbo2oA0wIwNcrqJQQjiAC0HZdAnaCbN4DO5edIntwujCvygkCQahkk2BYhDMJpOyLD0YhsAZwQ6R_wW6IUXES6YLAWAHApR/s1600/PHP-Selector-Options.png';	 
	$imageData1		= base64_encode(file_get_contents($image1)); 
	$src_a			= 'data: png;base64,'.$imageData1; 
	?>
	<figure style="width: 643px" class="caption alignnone">
	<img decoding="async" loading="lazy" class="size-large wp-image-7720" src="<?php echo $src_a; ?>" alt="" width="643" height="202"  />
	<figcaption class="caption-text">PHP Selector &gt; Options</figcaption>
	</figure>
	
	<p><strong>4)</strong> You can locate the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> and tick on the box next to it to enable it or un-tick the box to disable it.</p>	
	<?php  
	$image2 			= 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj21lWVmKXgJKBrLPqtqG6jlR4r6RRGAhxB812moNeDD6ED6YXtDQak7EfzrSVOsA8iHs08e1DesODVTbPwG97lP5ut2Ctntre0sYoFyY9kZWOxeu9zOuAH72yS9lqAi7P9FWVwv676hCWo_0OIbkmGiRW_zlGbJ0FHmg0pB-IgQGSstXmajxLzYpK7/s1600/allow_url_fopen.png';	 
	$imageData2		= base64_encode(file_get_contents($image2)); 
	$src_b			= 'data: png;base64,'.$imageData2; 
	?>
	<p><img decoding="async" loading="lazy" class="alignnone size-large wp-image-7719" src="<?php echo $src_b; ?>" alt="allow_url_fopen" width="643" height="246" /></p>
	
	<p><strong>5)</strong> Once you make any changes, please do a left-hand side click anywhere outside the dropdown or text input box. If the change were successful, you would see a green box with a message confirming that the change has been applied.</p>
	
	<p>That&#8217;s all! Now you know how to enable or disable allow_url_fopen in cPanel.</p>
	

	<h2>Using the allow_url_fopen directive</h2>
	<p>The <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive is disabled by default. You should be aware of the security implications of enabling the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive. PHP scripts that can access remote files are potentially vulnerable to arbitrary code injection.</p>

	<p>When the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive is enabled, you can write scripts that open remote files as if they are local files. For example, you can use the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">file_get_contents</strong> function to retrieve the contents of a web page.</p>

	<p>To enable this functionality, use a text editor to modify the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive in the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">php.ini</strong> file as follows:</p>

	<pre style="margin: 1.5em 0;padding: 15px;color: #212529;line-height: 1.2em;border: 1px solid #c9c9c9;border-radius: .2rem;box-shadow: 1px 1px 1px #d8d8d8;background: #fafafa;white-space: pre-wrap;">allow_url_fopen = on</pre>
	<p>To disable this functionality, modify the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive in the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">php.ini</strong> file as follows:</p>

	<pre style="margin: 1.5em 0;padding: 15px;color: #212529;line-height: 1.2em;border: 1px solid #c9c9c9;border-radius: .2rem;box-shadow: 1px 1px 1px #d8d8d8;background: #fafafa;white-space: pre-wrap;">allow_url_fopen = off</pre>

	<p>To verify the current value of the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive and other directives, you can use the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">phpinfo()</strong> function. </p> 
	<?php } ?>
</div>
</div>
 
<?php } 

function wp__supports() { ?>
<div class="wrap">
<?php echo file_get_contents(WEBSSUPPORTS); ?>
</div>
<?php } 