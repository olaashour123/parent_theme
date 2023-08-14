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
$notisnya0 = '<span class="title"><i class="material-icons" style="font-size: 1.2em;">&#xe87f;</i>&nbsp;&nbsp;&nbsp;&nbsp;Info</span> Before you updates.. Please back up your theme when you are done customizing your themes, as errors in your themes are not the responsibility of the developers<span class="close">X</span>';
$notisnya1 = "&nbsp;&nbsp;&nbsp;&nbsp; You Still Using <strong style=\"color: deepskyblue;\">".THEMES_NAMES." v".VERSION."</strong>, Hello.... Theme ";
$notisnya2 = '&nbsp;if you got errors, Please Download on <a href="'.EXTHEMES_MEMBER_URL.'" target="_blank">member area</a> For Manual Upload ';
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>.float{position:fixed;width:30px;height:30px;bottom:20px;right:10px;background-color:#1d2327;color:deepskyblue;border-radius:50px;text-align:center;font-size:15px;box-shadow: 2px 2px 3px #999;z-index:100}.my-float{margin-top:8px}section{width: 100%;overflow: hidden}.notification{width: 98%;height: 40px;/* border-radius: 2em 1em 4em / 0.5em 3em */;color: white;line-height: 40px;overflow: hidden;animation: reveal 1 2s;font-size: 12px}.notification .title{margin-right: 15px;padding: 0px 15px;line-height: 40px;display: inline-block}.notification .close{background: rgba(0,191,255,0.2);padding: 0px 15px;float: right;line-height: 40px;display: inline-block;color: white}.notification .close:hover{cursor: pointer}.notification.closed{transform: translate(0px, -50px);transition: 0.7s;display: none}@keyframes reveal{0%{transform: translate(0px, -50px)}50%{transform: translate(0px, -50px)}100%{transform: translate(0px, 0px)}}.notification.success{background: crimson;text-transform: capitalize}.notification.success .title{background: firebrick}.notification.error{background: #e74c3c}.notification.error .title{background: black}.notification.teal{background: teal}.notification.teal .title{background: #003333}.notification.warning{background: #f1c40f}.notification.warning .title{background: black}.notification.maroon{background: maroon}.notification.maroon a{color: chartreuse}.notification.maroon .title{background: darkgreen}.notification.normal{background: #1d2327;color: #f0f0f1;text-align: center;}.notification.normal a{ color:deepskyblue;background: url(<?php echo EX_THEMES_URI; ?>/assets/img/sparks.gif);text-transform: uppercase !important;}.notification.normal .title{background: black;color: #f0f0f1;}#TB_ajaxContent {width: 96% !important;}</style>
<section><div class="notification success"><?php echo $notisnya0; ?></div></section>
<?php 
echo '<section><div class="notification normal">';
echo $notisnya1;
	printf(
				$strings['update-available'], 
				$theme->get( 'Name' ),
				$api_response->new_version,
				'#TB_inline?width=640&amp;inlineId=' . $this->theme_slug . '_changelog',
				$theme->get( 'Name' ),
				$update_url,
				$update_onclick
	);
echo $notisnya2;
echo '</div></section>';			 
echo '<div id="' . $this->theme_slug . '_' . 'changelog" style="display:none;">';
echo $api_response->sections['changelog'] ;
echo '</div>'; 
?>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'> </script>
<script>
$(".close").click(function() {
	$(this).parent().addClass("closed");
})

$('.Show').click(function() {
	$('#debug').show(500);
	$('.Show').hide(0);
	$('.Hide').show(0);
});

$('.Hide').click(function() {
	$('#debug').hide(500);
	$('.Show').show(0);
	$('.Hide').hide(0);
});

$('.toggle').click(function() {
	$('#debug').toggle('slow');
});
</script>
<?php }