
<?php 
global $wpdb, $post, $opt_themes, $wp_query; 
$rtl_on					=	$opt_themes['ex_themes_rtl_activate_'];
$font_body_rtl			=	$opt_themes['font_body_rtl_link_custom'];
$font_body				=	$opt_themes['font_body_link_custom'];
?>
<style id="custom-style-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>">@charset "UTF-8"; @import url('<?php if($rtl_on) { echo $font_body_rtl; } else { echo $font_body; } ?>'); .showH{ font-size:.93rem;line-height:1.7em} details.ac{padding:18px 0;border-bottom:0px solid #e0e7f0} details.ac:first-child{border-top:0px solid #e0e7f0} details.ac summary{font-weight:700;cursor:default; display:flex;align-items:baseline; transition: all .1s ease} details.ac summary::before{content:'\203A'; flex:0 0 25px;display:flex;align-items:center;justify-content:flex-start;padding:0 5px; font-weight:400;font-size:1.33rem;color:var(--color_button)} details.ac[open] summary{color: var(--lcolor)} details.ac:not(.alt)[open] summary::before{transform:rotate(90deg);padding:0 0 0 5px;justify-content:center} details.ac.alt summary::before{content:'\002B'; padding:0 2px} details.ac.alt[open] summary::before{content:'\2212'} details.ac .aC{padding:0 25px;opacity:.9}

.rtl details.ac[open] summary{color: var(--lcolor)} details.ac:not(.alt)[open] summary::before{transform:rotate(-90deg);padding:0 5px 0 0 ;justify-content:center} 

.rtl details.ac .aC{padding:0 0 0 25px;text-align: right;}

.rtl .comment-meta .group-label {
  margin-left: 1rem;
  text-align: right;
}
.rtl .comment-text, .rtl .comment-foot { 
  padding-right: 5px;
  text-align: right;
}
.rtl .report-post-form, .rtl .remodal-is-initialized {
  text-align: right;
}
</style>
