<?php 
global $opt_themes; 
$homes						= get_template_directory_uri();
$color_link					= $opt_themes['color_link'];
$color_link_dark			= $opt_themes['color_link_dark'];
$color_link_hover			= $opt_themes['color_link_hover'];
$color_link_menu			= $opt_themes['color_link_menu'];
$color_link_menu_dark		= $opt_themes['color_link_menu_dark'];
$color_text					= $opt_themes['color_text'];
$color_text_dark			= $opt_themes['color_text_dark'];
$color_button				= $opt_themes['color_button'];
$color_border_button		= $opt_themes['color_border_button'];
$color_button_hover			= $opt_themes['color_button_hover'];
$color_svg					= $opt_themes['color_svg'];
$color_svg_hover			= $opt_themes['color_svg_hover'];
$color_sosmed_icon			= $opt_themes['color_sosmed_icon'];
$color_rgba					= rgb($opt_themes['color_rgba']);
$fonts						= $opt_themes['font_body'];
$font_body_rtl				= $opt_themes['font_body_rtl'];
$header_color				= $opt_themes['header_color'];
$header_color_dark			= $opt_themes['header_color_dark'];
$footer_color				= $opt_themes['footer_color'];
$footer_color_dark			= $opt_themes['footer_color_dark'];
$color_rgba_background		= rgb($opt_themes['color_rgba_background']);
$s_yellow					= $opt_themes['color_s_yellow'];
$s_yellow_bg_1				= $opt_themes['color_s_yellow_bg'];
$s_yellow_bg_2				= $opt_themes['color_s_yellow_bg_2'];
$s_green					= $opt_themes['color_s_green'];
$s_green_bg_1				= $opt_themes['color_s_green_bg'];
$s_green_bg_2				= $opt_themes['color_s_green_bg_2'];
$s_purple					= $opt_themes['color_s_purple'];
$s_purple_bg_1				= $opt_themes['color_s_purple_bg'];
$s_purple_bg_2				= $opt_themes['color_s_purple_bg_2'];
$s_red						= $opt_themes['color_s_red'];
$s_red_bg_1					= $opt_themes['color_s_red_bg'];
$s_red_bg_2					= $opt_themes['color_s_red_bg_2'];
$s_blue						= $opt_themes['color_s_blue'];
$s_blue_bg_1				= $opt_themes['color_s_blue_bg'];
$s_blue_bg_2				= $opt_themes['color_s_blue_bg_2'];
$opacity					= $opt_themes['opacity'];
$bg_color					= $opt_themes['bg_color'];
$bg_color_dark				= $opt_themes['bg_color_dark'];
$dark_section_bg			= $opt_themes['dark_section_bg'];
$dark_section_bg_dark		= $opt_themes['dark_section_bg_dark'];
$entry_bg					= $opt_themes['entry_bg'];
$entry_bg_dark				= $opt_themes['entry_bg_dark'];
$homes_titles_colors		= $opt_themes['homes_titles_colors'];
$homes_titles_colors_dark	= $opt_themes['homes_titles_colors_dark'];

?>
<style id="root-rtl-styles-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>">
:root{--s_yellow:<?php echo $s_yellow;?>;--s_yellow_bg_1:<?php echo $s_yellow_bg_1;?>;--s_yellow_bg_2:<?php echo $s_yellow_bg_2;?>;--s_green:<?php echo $s_green;?>;--s_green_bg_1:<?php echo $s_green_bg_1;?>;--s_green_bg_2:<?php echo $s_green_bg_2;?>;--s_purple:<?php echo $s_purple;?>;--s_purple_bg_1:<?php echo $s_purple_bg_1;?>;--s_purple_bg_2:<?php echo $s_purple_bg_2;?>;--s_red:<?php echo $s_red;?>;--s_red_bg_1:<?php echo $s_red_bg_1;?>;--s_red_bg_2:<?php echo $s_red_bg_2;?>;--s_blue:<?php echo $s_blue;?>;--s_blue_bg_1:<?php echo $s_blue_bg_1;?>;--s_blue_bg_2:<?php echo $s_blue_bg_2;?>;--font:<?php echo $fonts;?>;--homes:<?php echo $homes;?>;--tcolor:<?php echo $color_text;?>;--bgcolor:#EFF7F1;--color_link_menu:<?php echo $color_link_menu;?>;--colorsvg:<?php echo $color_svg;?>;--color_sosmed_icon:<?php echo $color_sosmed_icon;?>;--colorsvg_hover:<?php echo $color_svg_hover;?>;--lcolor:<?php echo $color_link;?>;--lhcolor:<?php echo $color_link_hover;?>;--color_button:<?php echo $color_button;?>;--color_border_button:<?php echo $color_border_button;?>;--color_button_hover:<?php echo $color_button_hover;?>;--rgbacolor:<?php echo $color_rgba;?>;--rgbacolorbackground:<?php echo $color_rgba_background;?>;--sel-lang-active:#fff;--header-bg:<?php echo $header_color;?>;--menu-hover-games:#F8B035;--menu-hover-apps:#7126C1;--menu-hover-top:#F74A2F;--menu-hover-news:#368BE1;--hmenu-more-grad:linear-gradient(90deg,rgba(23,43,61,0) 0%,rgba(23,43,61,0.05) 100%);--footer-bg:<?php echo $footer_color;?>;--main-heading:<?php echo $color_svg;?>;--dark-section-bg:#172B3D;--dark-section-grad:linear-gradient(0deg,#172B3D 0%,#0E1C29 100%);--dark-circle-blur:radial-gradient(closest-side,rgba(23,43,61,0) 0,rgba(23,43,61,0.6) 50%,rgba(23,43,61,1) 94%);--form-control-bg:#fff;--form-control-brd:#E7E9EB;--form-control-brd-f:#D0D4D8;--placeholder:#8B959E;--cloud-c1:<?php echo $color_svg;?>;--cloud-c2:#fbfcf3;--entry-bg:#fff;--entry-info:<?php echo $color_svg;?>;--entry-info-sep:#E6EFF4;--entry-label:rgba(255,255,255,.5);--entry-pattern:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%238B959E' d='M2,8a2,2,0,1,0,2,2A2,2,0,0,0,2,8Zm8-8a2,2,0,1,0,2,2A2,2,0,0,0,10,0Z'/%3E%3C/svg%3E");--entry-pattern-d:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='%234CCB70' d='M2,8a2,2,0,1,0,2,2A2,2,0,0,0,2,8Zm8-8a2,2,0,1,0,2,2A2,2,0,0,0,10,0Z'/%3E%3C/svg%3E");--block-bg:#fff;--block-bg-transp:rgba(255,255,255,0);--block-dark-bg:#273D52;--modal-bg:<?php echo $header_color;?>;--cat-menu:<?php echo $color_rgba_background;?>;--cat-menu-h:#172B3D;--spoiler:#f7f7f7;--spoiler-h:#EDFAF0;--searchsug:#f7f7f7;--searchsug-item:#fff;--nocomms:#765846;--coms-meta:rgba(23,43,61,.5);--coms-meta-h:rgba(23,43,61,.8);--line:#EBECED;--scrollbar:#F7F7F7;--scrollbar-thumb:#D0D0D0;--scrollbar-track:#F7F7F7;--loading-bg:rgba(255,255,255,.9);--spec-fade:rgba(23,41,61,1);--spec-fade-transp:rgba(23,41,61,0);--select-arrow:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23172B3D' d='M8.12 9.29L12 13.17l3.88-3.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-4.59 4.59c-.39.39-1.02.39-1.41 0L6.7 10.7c-.39-.39-.39-1.02 0-1.41.39-.38 1.03-.39 1.42 0z'/%3E%3C/svg%3E");--pageform-img:url(<?php echo $homes;?>/assets/img/page-illustation.png);--pageform-img2:url(<?php echo $homes;?>/assets/img/page-illustation.png);--pageform-bg:#EFF7F1;--fonts: <?php echo $fonts;?>;--font_body_rtl: <?php echo $font_body_rtl;?>;}
html.darktheme{--tcolor:<?php echo $color_text_dark; ?>;--color_link_menu_dark:<?php echo $color_link_menu_dark; ?>;--bgcolor:<?php echo $bg_color_dark; ?>;--bgcolor_dark:<?php echo $bg_color_dark; ?>;--sel-lang-active:#172B3D;--header-bg:<?php echo $header_color_dark; ?>;--menu-hover-apps:#9A53E7;--hmenu-more-grad:linear-gradient(90deg,rgba(255,255,255,0) 0%,rgba(255,255,255,0.05) 100%);--footer-bg:<?php echo $footer_color_dark; ?>;--main-heading:<?php echo $color_svg; ?>;--dark-section-bg:<?php echo $dark_section_bg_dark; ?>;--dark-section-grad:linear-gradient(0deg,<?php echo $dark_section_bg; ?> 0%,<?php echo $dark_section_bg_dark; ?> 100%);--dark-circle-blur:radial-gradient(closest-side,rgba(15,31,46,0) 0,rgba(15,31,46,0.6) 50%,rgba(15,31,46,1) 94%);--form-control-bg:#273D52;--form-control-brd:#3D5164;--form-control-brd-f:#53677B;--placeholder:#687786;--cloud-c1:#0F1F2E;--cloud-c2:#142636;--entry-bg:<?php echo $entry_bg_dark; ?>;--entry-info:#939EA9;--entry-info-sep:#3D5164;--entry-label:rgba(39,61,82,.5);--entry-pattern:var(--entry-pattern-d);--block-bg:#273D52;--block-bg-transp:rgba(39,61,82,0);--block-dark-bg:#213548;--modal-bg:#2A4055;--cat-menu:rgba(76,203,112,.1);--cat-menu-h:rgba(76,203,112,.2);--spoiler:rgba(255,255,255,0.05);--spoiler-h:rgba(255,255,255,0.1);--searchsug:#2A4055;--searchsug-item:rgba(255,255,255,0.05);--nocomms:#fede4a;--coms-meta:rgba(255,255,255,.5);--coms-meta-h:rgba(255,255,255,.8);--line:rgba(255,255,255,0.05);--scrollbar:#2A4055;--scrollbar-thumb:#0F1F2E;--scrollbar-track:#2A4055;--loading-bg:rgba(0,0,0,.9);--spec-fade:rgba(15,31,46,1);--spec-fade-transp:rgba(15,31,46,0);--select-arrow:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23748390' d='M8.12 9.29L12 13.17l3.88-3.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-4.59 4.59c-.39.39-1.02.39-1.41 0L6.7 10.7c-.39-.39-.39-1.02 0-1.41.39-.38 1.03-.39 1.42 0z'/%3E%3C/svg%3E");--pageform-img:url(<?php echo $homes; ?>/assets/img/page-illustation-night.png);--pageform-img2:url(<?php echo $homes; ?>/assets/img/page-illustation-night.png);--pageform-bg:#0d1d2b;--fonts: <?php echo $fonts; ?>;--font_body_rtl: <?php echo $font_body_rtl; ?>;--homes_titles_colors_dark:<?php echo $homes_titles_colors_dark; ?>;}
</style>
