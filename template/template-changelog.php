<?php
/* 
Template Name: Template - Changelogs
*/ 
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<style>
#px-changelog .last-changelog{border-top:2px dashed #CCC;border-bottom:2px dashed #CCC}#px-changelog .alert{display:inline-block;padding:0 5px;border-radius:3px;font-size:11px;border:1px solid;margin:4px 10px 4px 0;min-width:85px;text-align:center}#px-changelog ul{margin:0;padding:0;margin-top:20px}#px-changelog ul li{width:auto;margin-bottom:9px;list-style:none;padding-left:130px;position:relative;text-transform:capitalize}#px-changelog .chl-release,#px-changelog .chl-error-fixed,#px-changelog .chl-fixed,#px-changelog .chl-remove,#px-changelog .chl-add{display:inline-block;border-radius:2px;-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;padding:0 9px;margin-right:10px;color:#FFF;font-size:12px!important;min-width:100px;text-align:center;height:22px;position:absolute;left:0;border:1px solid;font-weight:bold!important}#px-changelog .chl-add{border-color:#59b859;color:#59b859}#px-changelog .chl-fixed{border-color:steelblue!important;color:blue!important}#px-changelog .chl-remove{border-color:crimson;color:crimson}#px-changelog .chl-release{color:#3a87ad;background-color:#d9edf7;border-color:#bce8f1}#px-changelog h1,#px-changelog h2,#px-changelog h3,#px-changelog h4{margin-top:10px;margin-bottom:10px}#px-changelog a{color:#3a87ad;text-transform:uppercase;font-weight:bold}
</style>
    <div class="wrp-min speedbar" style='display:none'>
        <div class="speedbar-panel">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div>
    <div id="dle-content">
        <div class="wrp-min block-list">
            <div class="block static-page">
                <div class="b-cont">
                    <h1 class="title"><?php the_title(); ?> for <a href="<?php echo EXTHEMES_DEMO_URL; ?>"> <?php echo EXTHEMES_NAME; ?></a> v.<?php echo VERSION; ?></a></h1>
                    <div class="text">
                       <div id="px-changelog">
					    
						<div class="last-changelog">
						<?php echo file_get_contents('https://demos.web.id/changelog-5play.php'); ?>
						</div>

   
						</div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	
<?php
get_footer(); 