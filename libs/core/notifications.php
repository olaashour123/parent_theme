<?php
/* ~~~~  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS  ~~~~ */ 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_action( 'wp_ajax_my_dismiss_notice', 'notification_exthemes_1' );
function add_dismissible() { ?>
	<div  style='display:none' class='notice my-dismiss-notice is-dismissible notifications size teal'>
    <span class="title"><i class="material-icons" style="font-size: 1.2em;">&#xe87f;</i>&nbsp;&nbsp;&nbsp;&nbsp;INFO</span> Before updating anything, make sure you have backups... 
</div>
<div class="notice my-dismiss-notice is-dismissible notifications success size">
    <span class="title"><i class="material-icons" style="font-size: 1.2em;">&#xe87f;</i>&nbsp;&nbsp;&nbsp;&nbsp;INFO</span> Before you updates.. Please back up your theme when you are done customizing your themes, as errors in your themes are not the responsibility of the developers
</div>
<style>.notifications.size {font-size: 12px;}.notifications button.notice-dismiss::before{color: red !important;}section{width: 100%;overflow: hidden;}.notifications{height: 40px;border-radius: 0px 0px 5px 5px;box-shadow: #95a5a6 0px 0px 6px 2px;color: white;line-height: 40px;overflow: hidden;animation: reveal 1 2s;}.notifications .title{margin-right: 15px;padding: 0px 15px;line-height: 40px;display: inline-block;}.notifications .close{background: rgba(255,255,255,0.2);padding: 0px 15px;float: right;line-height: 40px;display: inline-block;color: white;}.notifications .close:hover{cursor: pointer;}.notifications.closed{transform: translate(0px, -50px);transition: 0.7s;display: none;}@keyframes reveal{0%{transform: translate(0px, -50px);}50%{transform: translate(0px, -50px);}100%{transform: translate(0px, 0px);}}.notifications.success{background: crimson;text-transform: capitalize;}.notifications.success .title{background: firebrick;font-size: 13px!important;}.notifications.error{background: #e74c3c;}.notifications.error .title{background: black;}.notifications.teal{background: teal;font-size: 13px;}.notifications.teal .title{background: #003333;}.notifications.warning{background: #f1c40f;}.notifications.warning .title{background: black;}.notifications.maroon{background: maroon;}.notifications.maroon a{color: chartreuse;}.notifications.maroon .title{background: darkgreen;}.notifications.normal{background: #3498db;}.notifications.normal .title{background: black;}</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php }  
add_action( 'admin_enqueue_scripts', 'add_script' );
function add_script() { 
wp_register_script( 'notice-update', get_template_directory_uri() . '/assets/js/ds.js','','1.0', false );
	   wp_localize_script( 'notice-update', 'notice_params', array(
            ajaxurl => get_admin_url() . 'admin-ajax.php', 
        ));
        wp_enqueue_script(  'notice-update' );
}
function notification_exthemes_1() {
      update_option( 'notification_exthemes_1', true );
}
function admin_notice_update_play5() {
	$url = EXTHEMES_DEMOS_URL.'apis.json?theme='.EX_THEMES_NAMES;
	$data = get_remote_html( $url );
	$result = json_decode($data, TRUE);
	if( $result && EX_THEMES_VERSION < $result['version'] ) {
    ?>
	<?php add_thickbox(); ?>
	<?php $user_locale = strstr(get_user_locale(), '_', true); ?>
<section>
    <div class="notification success size">
        <span class="title"><i class="material-icons" style="font-size: 1.2em;">&#xe87f;</i>&nbsp;&nbsp;&nbsp;&nbsp;INFO</span> Before you updates.. Please back up your theme when you are done customizing your themes, as errors in your themes are not the responsibility of the developers  <span class="close">X</span>
    </div>
</section>
<section>
    <div class="notification maroon">
        <span class="title"><i class="material-icons" style="font-size: 1.2em;">&#xe87f;</i>&nbsp;&nbsp;&nbsp;&nbsp;INFO</span> <?php echo sprintf(__( 'a new version of %s Theme is available', '5play' ), ucfirst(EX_THEMES_NAMES)); ?></strong>, <a href="<?php echo EXTHEMES_DEMOS_URL; ?>" target="_blank">Check DEMO</a> - <a href="<?php echo EXTHEMES_DEMOS_URL; ?>changelog.php?theme=<?php echo EX_THEMES_NAMES; ?>&lang=<?php echo $user_locale; ?>&TB_iframe=true&width=550&height=450" class="thickbox"><?php echo sprintf(__( 'Check Version 5play v.%s', '5play' ), $result['version']); ?></a> - <a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/themes.php" ><?php echo __( 'UPDATES NOW', '5play' ); ?></a> <span class="close">X</span>
    </div>
</section>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>.notification.size {font-size: 12px;}section{width: 100%;overflow: hidden;}.notification{width: 98%;height: 40px;border-radius: 0px 0px 5px 5px;box-shadow: #95a5a6 0px 0px 6px 2px;color: white;line-height: 40px;overflow: hidden;animation: reveal 1 2s;}.notification .title{margin-right: 15px;padding: 0px 15px;line-height: 40px;display: inline-block;}.notification .close{background: rgba(255,255,255,0.2);padding: 0px 15px;float: right;line-height: 40px;display: inline-block;color: white;}.notification .close:hover{cursor: pointer;}.notification.closed{transform: translate(0px, -50px);transition: 0.7s;display: none;}@keyframes reveal{0%{transform: translate(0px, -50px);}50%{transform: translate(0px, -50px);}100%{transform: translate(0px, 0px);}}.notification.success{background: crimson;text-transform: capitalize;}.notification.success .title{background: firebrick;}.notification.error{background: #e74c3c;}.notification.error .title{background: black;}.notification.teal{background: teal;}.notification.teal .title{background: #003333;}.notification.warning{background: #f1c40f;}.notification.warning .title{background: black;}.notification.maroon{background: maroon;}.notification.maroon a{color: chartreuse;}.notification.maroon .title{background: darkgreen;}.notification.normal{background: #3498db;}.notification.normal .title{background: black;}</style>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script>
$(".close").click(function(){
	$(this).parent().addClass("closed");
})
</script>
<?php }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\  
add_action( 'admin_notices', 'admin_notice_update_play5' );