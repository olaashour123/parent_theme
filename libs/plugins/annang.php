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
if ( version_compare( $this->version, $api_response->new_version, '<' ) ) { 

if( ! defined( 'ABSPATH' ) ) exit;
ini_set('display_errors', ERRORS);
global $post;
$user_info			= get_userdata(1);
$author_names		= $user_info->user_login;
$warning			= 'Before you updates.. Please back up your theme when you are done customizing your themes, as errors in your themes are not the responsibility of the developers';
$warning_1			= "Hello <strong>".$author_names."</strong>.... You Still Using <strong>".THEMES_NAMES." v".EXTHEMES_VERSION."</strong> ";
$warning_2			= '&nbsp; if you got errors, Please Download on <a href="'.EXTHEMES_MEMBER_URL.'" target="_blank">member area</a> and Upload Manual using FTP or your host ';
$warning_3			= "Hello <strong>".$author_names."</strong>.... You Still Using <strong>".THEMES_NAMES." v".EXTHEMES_VERSION."</strong> ";
?>
 
 

<?php		 
echo '<div id="' . $this->theme_slug . '_' . 'changelog" style="display:none;">';
echo $api_response->sections['changelog'] ;
echo '</div>'; 
?>

<script>
    var $exhemes_devs_blog = jQuery.noConflict();   
</script> 
 
<div class="litespeed-callouts notice notice-warning inline" style="margin-top: 4rem;">
		<p><?php echo $warning_1.$warning; ?></p>
        <p><?php echo '<strong>Themes</strong> '; printf( $strings['update-available2'], $theme->get( 'Name' ), $api_response->new_version, '#TB_inline?width=640&amp;inlineId='.$this->theme_slug.'_changelog', $theme->get( 'Name' ), $update_url, $update_onclick ); echo $warning_2; ?></p>
</div>
<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='//fonts.googleapis.com/icon?family=Material+Icons'>
<style>
:root{
--warna_bg : #1d2327;
--warna_bt : tomato;
--warna_link : skyblue;
--warna_alt : white;
--blink: url(<?php echo EX_THEMES_URI; ?>/assets/img/sparks.gif);
}
.litespeed-callouts {margin: 1.5rem 0;border-right: 1px solid var(--warna_bt);border-top: 1px solid var(--warna_bt);border-bottom: 1px solid var(--warna_bt);border-left-color: var(--warna_bt)!important;background: var(--warna_alt);}#notification-bar {position: fixed;width: 100%;top: 30px;background-color: var(--warna_bg);border-bottom: 1px solid var(--warna_bg);clear: both;z-index: 999;}#notification-bar .container {width: 70%;height: 40px;margin: 0 auto;padding: 5px;background-color: var(--warna_bg);}#notification-bar p {display: inline-block;font-size: 14px;float: left;margin: 0 25px 0 0;padding: 0;line-height: 3rem;color: var(--warna_alt);text-align: center!important;}#notification-bar a.btn-action {display: inline-block;line-height: 35px;margin-top: 5px;padding: 0 12px;float: right;margin-right: 50px;font-family: 'Roboto',sans-serif;font-size: 15px;font-weight: bold;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;text-align: center;background-color: var(--warna_bt);color: var(--warna_alt);text-decoration: none;}#notification-bar a.btn-action:hover {background-color: var(--warna_bg);color: var(--warna_bt);}#exthemes input[type=checkbox] {position: absolute;top: -9999px;left: -9999px;}.fa-times-circle {float: right;margin-top: 8px;font-size: 30px;color: white;text-align: right;z-index: 9;cursor: pointer;}.fa-times-circle:hover {color: var(--warna_alt);}input[type=text] + input[type=text] {margin-left: 10px;}#exthemes input[type=checkbox] ~ #notification-bar {-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both;-webkit-animation-name: goDown;animation-name: goDown;}#exthemes input[type=checkbox]:checked ~ #notification-bar {-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both;-webkit-animation-name: goUp;animation-name: goUp;}#exthemes input[type=checkbox] ~ .fa-long-arrow-down {position: absolute;display: none;right: 22%;cursor: pointer;}#exthemes input[type=checkbox]:checked ~ .fa-long-arrow-down {display: block;top: -35px;padding: 10px;font-size: 50px;color: var(--warna_alt);background-color: var(--warna_bg);-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;}#exthemes input[type=checkbox]:checked ~ .fa-long-arrow-down:hover {color: var(--warna_alt);}@-webkit-keyframes goUp {0% {-webkit-transform: none;transform: none;}100% {-webkit-transform: translate3d(0,-100px,0);transform: translate3d(0,-100px,0);}}@keyframes goUp {0% {-webkit-transform: none;transform: none;}100% {-webkit-transform: translate3d(0,-100px,0);transform: translate3d(0,-100px,0);}}@-webkit-keyframes goDown {0% {-webkit-transform: translate3d(0,-100%,0);transform: translate3d(0,-100%,0);}100% {-webkit-transform: none;transform: none;}}@keyframes goDown {0% {-webkit-transform: translate3d(0,-100%,0);transform: translate3d(0,-100%,0);}100% {-webkit-transform: none;transform: none;}}#notif-wrapper {position: fixed;width: 100%;z-index: 999;}.blanternotif {background: var(--warna_bg);color: var(--warna_alt);width: 50px;height: 50px;border-radius: 100%;position: fixed;z-index: 999;bottom: 5%;right: 20px;-webkit-animation-duration: 5s;-webkit-animation-iteration-count: infinite;-webkit-animation-name: notifklik;animation-duration: 5s;animation-iteration-count: infinite;animation-name: notifklik;transition: all 5s ease-in-out;}.blanternotif i {color: var(--warna_alt);font-size: 25px;margin: 12px 10px 10px 13px;-webkit-animation-duration: 2s;-webkit-animation-iteration-count: infinite;-webkit-animation-name: notificon;animation-duration: 2s;animation-iteration-count: infinite;animation-name: notificon;transition: all 2s ease-in-out;}@keyframes notifklik {0% {transform: scale(1);}50% {transform: scale(1.2);}100% {transform: scale(1);}}@keyframes notificon {0% {transform: rotate(-30deg);}50% {transform: rotate(30deg);}100% {transform: rotate(-30deg);}}@keyframes notifbox {0% {transform: rotateZ(-45deg);visibility: visible;opacity: 0;bottom: 8%;right: 78px;}100% {transform: none;visibility: visible;opacity: 1;bottom: 5%;right: 110px;}}.notifbox {padding: 20px;line-height: 1.5;border-radius: 3px;position: fixed;resize: none;z-index: 999;right: 110px;bottom: 5%;max-height: 5rem;max-width: 30rem;background: var(--warna_bg);border: 1px solid var(--warna_bg);color: var(--warna_alt);font-size: 13px;display: inline-block;opacity: 0;visibility: hidden;transition: 0.8s ease-in-out;}.notifbox a,.notifbox b,.notifbox strong {color: var(--warna_link);text-transform: uppercase;background: var(--blink);}.litespeed-callouts strong,.litespeed-callouts b,.litespeed-callouts a {text-transform: uppercase;background: var(--blink);}.notifbox:before {content: "";width: 0;height: 0;position: absolute;bottom: -1px;right: -35px;border-width: 18px;border-style: solid;border-color: transparent transparent transparent var(--warna_bg);display: block;}.blanterxE5CD {display: none;}#notif-wrapper.aktif .blanterxE5CD {display: block!important;animation-name: none!important;}#notif-wrapper.aktif .blanterxE7F4 {display: none!important;}.notifbox.aktif {-webkit-animation-duration: 1s;-webkit-animation-iteration-count: 1;-webkit-animation-name: notifbox;animation-duration: 1s;animation-iteration-count: 1;animation-name: notifbox;transition: all 1s ease-in-out;opacity: 1;visibility: visible;}@media screen and (max-width:680px) {.notifbox:before {display: none;}.notifbox {right: 0%!important;bottom: 0;}@ keyframes notifbox {0%{right: 0!important;}100% {right: 0!important;}}}
</style>

<noscript>
<div id="exthemes">
<label for="notify-2">
  <input id="notify-2" type="checkbox">
  <i class="fa fa-long-arrow-down"></i>
  <div id="notification-bar">
    <div class="container">
      <i class="fa fa-times-circle"></i>
      <p>Hello <strong style="text-transform: uppercase; background: var(--blink);"><?php echo $author_names; ?></strong>, You Still Using <?php echo ''; printf( $strings['info-update'], $theme->get( 'Name' ), $api_response->new_version, '#TB_inline?width=640&amp;inlineId='.$this->theme_slug.'_changelog', $theme->get( 'Name' ), $update_url, $update_onclick ); ?>
    </div>
  </div>
</label>
</div>

<div id='notif-wrapper'>
<a class='blanternotif' href='javascript:;' title='Notifications'><i class="material-icons blanterxE7F4">&#xE7F4;</i><i class="material-icons blanterxE5CD">&#xE5CD;</i></a>
<div class='notifbox'> 
<?php echo $warning_3; ?> - <?php echo '<strong>Themes</strong> '; printf( $strings['update-available2'], $theme->get( 'Name' ), $api_response->new_version, '#TB_inline?width=640&amp;inlineId='.$this->theme_slug.'_changelog', $theme->get( 'Name' ), $update_url, $update_onclick ); echo $warning_2; ?>
</div>
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script id="rendered-js" >
$(document).ready(function () {$(".blanternotif").click(function () {$(".notifbox,#notif-wrapper").toggleClass("aktif");});});
</script>
</noscript>
    
<?php
}