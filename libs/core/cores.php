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
function ex_themes_head_on_sections_() { 
global $opt_themes;
$blogname				= get_option("blogname");
$siteurls				= get_option("siteurl");
$blogemail				= get_option("admin_email");
$blogdesc				= get_option("blogdescription");
$sitelangs				= get_bloginfo("language");
echo '<!-- Theme Designer -->'.PHP_EOL;
echo '<meta name="designer" content="'.EXTHEMES_AUTHOR.'" />'.PHP_EOL;
echo '<meta name="themes" content="'.THEMES_NAMES.'" />'.PHP_EOL;
echo '<meta name="version" content="'.VERSION.'" />'.PHP_EOL; 
?>
<!-- Chrome, Firefox OS and Opera -->
<meta content='<?php echo $opt_themes['color_svg'];?>' name='theme-color'/>
<!-- Windows Phone -->
<meta content='<?php echo $opt_themes['color_svg'];?>' name='msapplication-navbutton-color'/>
<meta content='<?php echo $opt_themes['color_svg'];?>' name='apple-mobile-web-app-status-bar-style' />
<!-- Styles for <?php echo EX_THEMES_NAMES_; ?> v<?php echo EXTHEMES_VERSION; ?> by <?php echo EXTHEMES_AUTHOR; ?> -->
<?php get_template_part( '/assets/css/root.styles' ); ?>
<?php get_template_part( '/assets/css/custom.styles' ); ?>
<?php get_template_part( '/assets/css/main.style' ); ?> 
<?php get_template_part( '/assets/css/mobile' ); ?> 
<?php get_template_part( '/assets/css/top.styles' ); ?> 
<?php get_template_part( '/assets/css/version.styles' ); ?> 
<!-- Styles for <?php echo EX_THEMES_NAMES_; ?> v<?php echo EXTHEMES_VERSION; ?> by <?php echo EXTHEMES_AUTHOR; ?> -->
<link rel="shortcut icon" href="<?php if($opt_themes['aktif_favicon']) { ?><?php echo $opt_themes['favicon']['url']; ?><?php } else { ?><?php echo EX_THEMES_URI; ?>/assets/img/logo_footer.png<?php } ?>" type="image/x-icon" />
<style>label.c-muted { color: currentColor ; }</style>
<?php 
if ( is_user_logged_in() ) {  
} else {
   echo '<style>#wpadminbars {display: none;}</style>';
}
?>

<?php if($opt_themes['ex_themes_scheme_seo_activate_']) { ?>
<script type="application/ld+json">{"@context": "https://schema.org","@type": "Organization","url": "<?php echo esc_url( home_url( '/' ) ); ?>","logo": "<?php if($opt_themes['ex_themes_logo_headers_active_']) { ?><?php echo $opt_themes['header_logo']['url']; ?><?php } else { ?><?php echo EX_THEMES_URI; ?>/assets/img/lazy.png<?php } ?>","sameAs": ["<?php echo $opt_themes['facebook_url']; ?>","<?php echo $opt_themes['twitter_url']; ?>","<?php echo $opt_themes['instagram_url']; ?>","<?php echo $opt_themes['youtube_url']; ?>"]}</script>
<?php } ?>
<?php if($opt_themes['ex_themes_head_on_sections_active_']) echo $opt_themes['header_section'];  ?>
<?php if($opt_themes['ex_themes_webmaster_tools_active_']) { ?>
<!-- Webmaster Tool Verification -->
<?php if($opt_themes['google_verif']) { ?>
<meta name="google-site-verification" content="<?php echo $opt_themes['google_verif']; ?>" />
<?php } ?>
<?php if($opt_themes['bing_verif']) { ?>
<meta name="msvalidate.01" content="<?php echo $opt_themes['bing_verif']; ?>" />
<?php } ?>
<?php if($opt_themes['yandex_verif']) { ?>
<meta name="yandex-verification" content="<?php echo $opt_themes['yandex_verif']; ?>" />
<?php } ?>
<?php if($opt_themes['pinterest_verif']) { ?>
<meta name="p:domain_verify" content="<?php echo $opt_themes['pinterest_verif']; ?>"/>
<?php } ?>
<?php if($opt_themes['baidu_verif']) { ?>
<meta name="baidu-site-verification" content="<?php echo $opt_themes['baidu_verif']; ?>" />
<?php } ?>
<!-- Webmaster Tool Verification -->
<?php } ?>
<!--<script src="#<?php echo EX_THEMES_URI; ?>/assets/js/jquery.min.js" ></script> -->
<?php if(is_archive('archive-news')) { ?>
<style id="news-styles-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>">
.entry-list,.entry-listpage{display:flex;flex-wrap:wrap;margin:-.25rem}.entry-list .entry,.entry-listpage .entry{width:100%;padding:.25rem}@media(min-width:640px){.entry-list,.entry-listpage{margin:-.5rem}.entry-list .entry,.entry-listpage .entry{padding:.5rem}}@media(min-width:1040px){.entry-list,.entry-listpage{margin:-1rem}.entry-list .entry,.entry-listpage .entry{padding:1rem}}.list-c2 .entry,.list-c3 .entry,.list-c4 .entry,.list-c6 .entry{max-width:50%;flex:0 0 50%}@media(min-width:576px) and (max-width:859px){.list-c6 .entry,.list-c4 .entry{max-width:33.333333%;flex:0 0 33.333333%}}@media(min-width:576px){.list-c3 .entry{max-width:33.333333%;flex:0 0 33.333333%}}@media(min-width:860px) and (max-width:1299px){.list-c6 .entry{max-width:25%;flex:0 0 25%}}@media(min-width:860px){.list-c4 .entry{max-width:25%;flex:0 0 25%}}@media(min-width:1300px){.list-c6 .entry{max-width:16.666666%;flex:0 0 16.666666%}}@media(min-width:860px) and (max-width:1299px){.section-related .list-c6 .entry{display:none}.section-related .list-c6 .entry:nth-child(-n+4){display:block}}@media(max-width:991px){.scroll-entry-list{margin:-.5rem -2rem;overflow:hidden}.scroll-entry-list .list-c6 .entry{max-width:16.666666%;flex:0 0 16.666666%}.scroll-entry-list .list-c4 .entry{max-width:25%;flex:0 0 25%}.scroll-entry-list .list-c3 .entry{max-width:33.333333%;flex:0 0 33.333333%}.scroll-entry-list .list-c2 .entry{max-width:50%;flex:0 0 50%}.scroll-entry-list .entry{min-width:18rem}.scroll-entry-list .entry-list{padding:2rem 0;margin:-2rem 0;overflow:hidden;overflow-x:auto;-webkit-overflow-scrolling:touch;flex-wrap:nowrap}.scroll-entry-list .entry-list::before,.scroll-entry-list .entry-list::after{content:"";min-width:1.5rem;max-width:1.5rem;height:2rem}}@media(max-width:639px){.scroll-entry-list{margin:-.5rem -1rem}.scroll-entry-list .entry-list::before,.scroll-entry-list .entry-list::after{min-width:.75rem;max-width:.75rem}}.label{display:flex;align-items:center;font-size:.6875rem;font-weight:700;background-color:var(--entry-label);text-transform:uppercase;line-height:1rem;padding:.25rem .5rem;border-radius:.75rem;backdrop-filter:blur(5px);-webkit-backdrop-filter:blur(5px);pointer-events:none}.label::before{content:"";width:.5rem;height:.5rem;border:.25rem solid;display:block;border-radius:50%;margin-right:.25rem}.label-up{color:#37b6e5}.label-up::before{box-shadow:0 .25rem .5rem 0 rgba(55,176,229,.3)}.label-new{color:#f9563d}.label-new::before{box-shadow:0 .25rem .5rem 0 rgba(249,86,61,.3)}@media(min-width:992px){.recom-list{margin-top:-1rem}}.recom-post{z-index:0;padding:1rem;padding-top:0;text-align:center}.recom-post .title{font-size:.875rem;margin-top:1.25rem;margin-bottom:.25rem;padding-left:.25rem padding-right:.25rem}.recom-post .img{width:7rem;height:7rem}.recom-post-bg,.recom-post-vers{position:absolute;top:.5rem}.recom-post-bg{z-index:-1;background-color:var(--entry-bg);overflow:hidden;border-radius:1.125rem;left:0;bottom:0;width:100%;display:flex;justify-content:center;align-items:center}.recom-post-bg>svg{height:auto;transform:translateY(-40%)}.recom-post-vers{right:0;width:2rem;margin:.75rem;padding:.25rem;padding-bottom:.375rem;background-color:var(--entry-bg);pointer-events:none;border-radius:1rem;font-size:.625rem;font-weight:700;text-align:center;color:var(--entry-info)}.recom-post-vers>svg{display:block;margin:0 auto .125rem}.recom-purple .recom-post-bg>svg{transform:translateY(-40%) translateX(10%)}.recom-blue .img img{box-shadow:0 .5rem 1.5rem -.5rem #2b9dd5}.recom-green .img img{box-shadow:0 .5rem 1.5rem -.5rem #4ccb70}.recom-purple .img img{box-shadow:0 .5rem 1.5rem -.5rem #784ccb}.recom-yellow .img img{box-shadow:0 .5rem 1.5rem -.5rem #fede4a}@media(min-width:1140px){.recom-post .img{width:8.5rem;height:8.5rem}.recom-post .title{font-size:1rem}}@media(min-width:1040px){.recom-list{margin-top:-2rem}.recom-post::before{content:"";height:2rem;width:100%;position:absolute;left:0;top:0;z-index:-1;background-size:1rem 1rem;opacity:.2}.recom-post{padding:1.125rem}.recom-post-bg,.recom-post-vers{top:2.125rem}.recom-blue::before{background-image:url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9JzAgMCAxNiAxNic+PHBhdGggZmlsbD0nIzJCOURENScgZD0nTTIsOGEyLDIsMCwxLDAsMiwyQTIsMiwwLDAsMCwyLDhabTgtOGEyLDIsMCwxLDAsMiwyQTIsMiwwLDAsMCwxMCwwWicvPjwvc3ZnPg==)}.recom-green::before{background-image:url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9JzAgMCAxNiAxNic+PHBhdGggZmlsbD0nIzRDQ0I3MCcgZD0nTTIsOGEyLDIsMCwxLDAsMiwyQTIsMiwwLDAsMCwyLDhabTgtOGEyLDIsMCwxLDAsMiwyQTIsMiwwLDAsMCwxMCwwWicvPjwvc3ZnPg==)}.recom-purple::before{background-image:url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9JzAgMCAxNiAxNic+PHBhdGggZmlsbD0nIzc4NENDQicgZD0nTTIsOGEyLDIsMCwxLDAsMiwyQTIsMiwwLDAsMCwyLDhabTgtOGEyLDIsMCwxLDAsMiwyQTIsMiwwLDAsMCwxMCwwWicvPjwvc3ZnPg==)}.recom-yellow::before{background-image:url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9JzAgMCAxNiAxNic+PHBhdGggZmlsbD0nI0ZFREU0QScgZD0nTTIsOGEyLDIsMCwxLDAsMiwyQTIsMiwwLDAsMCwyLDhabTgtOGEyLDIsMCwxLDAsMiwyQTIsMiwwLDAsMCwxMCwwWicvPjwvc3ZnPg==)}}@media(min-width:992px){.recom-post .img img{transition:transform .2s ease}.recom-post:hover .img img{transform:translateY(-.25rem)}.recom-post-bg>svg{transition:transform .3s ease}.recom-post:hover .recom-post-bg>svg{transform:translateY(-40%) scale(1.2)!important}.recom-purple.recom-post:hover .recom-post-bg>svg{transform:translateY(-40%) translateX(10%) scale(1.2)!important}}.page-news .entry-news+.entry-news{margin-top:1rem}@media(min-width:1040px){.page-news .entry-news+.entry-news{margin-top:2rem}}.entry-app>.item,.entry-news>.item{background-color:var(--entry-bg);border-radius:1.125rem;z-index:0}.entry-app>.item{height:100%;display:flex;flex-direction:column;text-align:center}.entry-app>.item::before{height:3.75rem;left:.875rem;right:.875rem;top:.875rem}@media(min-width:640px){.entry-news .pic::after,.entry-app>.item::before{content:"";position:absolute;background-size:1rem 1rem;z-index:-1;opacity:.075;background-image:var(--entry-pattern)}}.entry-app>.item::after{content:"";position:absolute;left:50%;top:0;z-index:-1;transform:translate(-50%,1rem);background-image:radial-gradient(closest-side,rgba(23,43,61,0.2) 0,rgba(23,43,61,0) 100%)}.entry-app .label{position:absolute;top:0;left:0;margin:.5rem;z-index:1}.entry-app .img{width:6rem;height:6rem;display:block;position:relative;margin:1.5rem auto}.entry-app .title{font-size:.875rem;padding:0 1rem;margin-top:-.25rem;margin-bottom:.25rem}.entry-app .title>a>span{display:block;overflow:hidden;line-height:1.4em;max-height:2.8em}.entry-app .genre{font-size:.75rem;margin:0 1rem auto;color:var(--lcolor)}.entry-app-info{display:flex;margin-top:1.25rem;position:relative;color:var(--entry-info);font-size:.625rem;font-weight:700}.entry-app-info::before{content:"";position:absolute;left:50%;top:0;width:1px;height:100%;background-color:var(--entry-info-sep)}.entry-app-info>li{width:100%;max-width:50%;flex:0 0 50%;padding:0 .75rem;padding-bottom:1rem}.entry-app-info>li svg{display:block;margin:0 auto;margin-bottom:.125rem}@media(max-width:639px){.entry-app-info>li svg{width:1rem;height:1rem}.entry-app>.item::after{width:10rem;padding-top:10rem}}@media(min-width:640px){.entry-app>.item::after{width:12rem;padding-top:12rem}.entry-app .img{width:7rem;height:7rem}}@media(min-width:992px){.entry-app>.item .img img{transition:transform .2s ease}.entry-app>.item:hover .img>img{transform:scale(1.05)}}.img .post__edit{position:absolute;right:0;top:0;z-index:3}.img .post__modpaid{background-color:#fff;width:2.5rem;height:1.25rem;border-radius:.625rem;color:var(--entry-info);pointer-events:none;position:absolute;top:100%;left:50%;transform:translate(-50%,-50%);line-height:.875rem;font-size:.625rem;padding:.1875rem .25rem;text-align:center;font-weight:700;letter-spacing:.05rem;text-indent:.05rem;box-shadow:0 .25rem .5rem 0 rgba(0,0,0,.07)}.entry-news{display:flex}.entry-news>.item{width:100%;border-radius:1.125rem}.entry-news .fit-cover{width:100%;height:100%;border-radius:inherit;margin:0}.entry-news .fit-cover::after{content:"";position:absolute;left:0;top:0;width:100%;height:100%;background-color:#000;opacity:.12}.entry-news .post__edit{right:0;top:0;position:absolute;margin:.25rem}.entry-news .post__edit a{z-index:3}.entry-news .cont{display:flex;flex-direction:column;width:100%;padding:1rem}.entry-news .meta{margin-bottom:1rem}.entry-news .title{font-size:1.25rem;margin-bottom:.75rem;margin-top:-.25rem}@media(min-width:992px){.entry-news .fit-cover::after{transition:opacity .2s ease}.entry-news>.item:hover .fit-cover::after{opacity:0}}@media(max-width:1139px){.entry-news .title{font-size:1.125rem}}@media(max-width:991px){.section-news .entry-news{max-width:100%;flex:0 0 100%}.entry-news .title{font-size:1rem}}@media(max-width:499px){.entry-news .pic{position:relative;width:100%;padding-top:35%;border-radius:inherit;border-bottom-left-radius:0;border-bottom-right-radius:0}.entry-news .pic .fit-cover{position:absolute;left:0;top:0}}@media(min-width:500px){.entry-news>.item{display:flex}.entry-news .cont{padding:1.5rem 2rem}.entry-news .pic{width:50%;max-width:18.75rem;order:13;margin:0;border-radius:inherit;border-top-left-radius:0;border-bottom-left-radius:0;margin-left:auto;background-color:#fbfbfb;position:relative}.entry-news .pic::after{right:100%;top:0;bottom:0;width:4.75rem;margin:.25rem}.entry-news .meta{margin-bottom:1.5rem}.entry-news .description{display:block!important;opacity:.8;overflow:hidden;max-height:6em;font-size:.875rem;margin-bottom:.75rem}.read-more{font-weight:700}}.read-more{font-size:.875rem;margin-top:auto}.read-more a{display:inline-block;padding:.5rem;margin:-.5rem 0 -.25rem -.5rem;position:relative;z-index:3}.meta{font-size:.75rem;line-height:1rem}.meta,.meta>*{display:flex;align-items:center}.meta>*:not(:last-child){margin-right:.5rem}.meta svg{vertical-align:top}.meta-date{font-weight:700;background-color:rgba(23,43,61,.1);padding:.25rem .5rem;border-radius:.75rem}.meta-edit a{display:flex;align-items:center;color:inherit}.meta-edit a svg{margin-right:.25rem}.dark-foot .entry-news .meta-date{background-color:rgba(255,255,255,.05)}.entry-coms>.item{background-color:#fff;border-radius:1.125rem;padding:1rem;font-size:.875rem}.entry-coms .user{margin-bottom:1rem;font-size:.75rem;color:inherit!important}.entry-coms .user .avatar img[src*="noavatar.png"]{background-color:#4ccb70}.entry-coms .title{font-size:inherit;margin-bottom:.5rem}.entry-coms .title a,.entry-coms-reply{color:#4ccb70}.entry-coms .description{margin-bottom:auto;opacity:.8;overflow:hidden;line-height:1.5em;height:3em}.entry-coms .date{margin-top:.5rem;display:block;font-size:.75rem}.entry-coms-reply{position:absolute;right:0;top:0;margin:1.5rem}@media(min-width:500px){.entry-coms>.item{padding:1.5rem}.entry-coms .title{margin-bottom:.75rem}.entry-coms .date{margin-top:.75rem}}@media(max-width:991px){.entry-coms .user{display:flex;align-items:center;margin-right:2rem}.entry-coms .user .avatar{min-width:1.5rem;max-width:1.5rem;height:1.5rem;margin-right:1rem}}@media(min-width:992px){.entry-coms>.item{text-align:center}.entry-coms .user{display:block;margin-top:-2rem}.entry-coms .user>span{opacity:.5}.entry-coms .user .avatar{display:block;margin:0 auto;margin-bottom:.25rem;box-shadow:0 .5rem 1.5rem -.5rem rgba(0,0,0,.5);transition:transform .2s ease}.entry-coms>.item:hover .user .avatar{transform:scale(1.05)}}.dark-foot .entry-news .pic::after,.dark-foot .entry-app>.item::before,.entry-coms::after{opacity:.075;background-image:var(--entry-pattern-d)}.dark-foot .entry-app>.item,.dark-foot .entry-news>.item,.entry-coms>.item{background-color:#273d52}.dark-foot .entry-news .pic{background-color:#2b4258}@media(min-width:1040px){.entry-coms::after{content:"";display:block;height:1.75rem;background-size:1rem 1rem;margin-top:.25rem}}
</style>

<!--<link href="<?php echo EX_THEMES_URI; ?>/assets/css/short.styles.css" type="text/css" rel="stylesheet" />-->
<?php } 
echo '<!-- '.PHP_EOL.'- '.$siteurls.' using '.THEMES_NAMES.' '.SPACES_THEMES.''.VERSION.' '.PHP_EOL.'- Buy now on '.EXTHEMES_ITEMS_URL.' '.PHP_EOL.'- Designer and Developer by '.DEVS.' '.PHP_EOL.'- More Premium Themes Visit Now On '.EXTHEMES_API_URL.' '.PHP_EOL.'-->'.PHP_EOL; }
add_shortcode('ex_themes_head_on_sections_', 'ex_themes_head_on_sections_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_logo_headers_() { 
global $opt_themes;
if($opt_themes['ex_themes_logo_headers_active_']) { ?>
<img src="<?php echo $opt_themes['header_logo']['url']; ?>" alt="<?php echo get_option("blogname") ?>" width="104" height="36" />
<?php } else { ?>
<img src='<?php echo EX_THEMES_URI; ?>/assets/img/logos.png' alt="<?php echo get_option("blogname") ?>" width="104" height="36" />
<?php } 
}
add_shortcode('ex_themes_logo_headers_', 'ex_themes_logo_headers_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\  
function ex_themes_footer_on_sections_() {
if ( is_user_logged_in() ) {    
} else {
ex_themes_login_form_();
}
wp_reset_query();
ex_themes_background_st_1_();
if (is_single()) {
ex_themes_background_st_2_();
}
?> 
<svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>		
        <symbol id="i__icons_facebook" width="40" height="40" viewBox="0 0 40 40">
            <path fill="var(--color_sosmed_icon)" d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z"></path>
        </symbol>		
        <symbol id="i__icons_twitter" width="40" height="40"  viewBox="0 0 40 40">
            <path fill="var(--color_sosmed_icon)" d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"></path>
        </symbol>		
        <symbol id="i__icons_instagram" width="40" height="40"  viewBox="0 0 40 40">
            <path fill="var(--color_sosmed_icon)" d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"></path>
        </symbol>		
        <symbol id="i__icons_youtube" width="40" height="40"  viewBox="0 0 40 40">
            <path fill="var(--color_sosmed_icon)" d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"></path>
        </symbol>		
        <symbol id="i__icons_telegram" width="40" height="40"  viewBox="0 0 40 40">
            <path fill="var(--color_sosmed_icon)" d="M23.91 3.79L20.3 20.84c-.25 1.21-.98 1.5-2 .94l-5.5-4.07-2.66 2.57c-.3.3-.55.56-1.1.56-.72 0-.6-.27-.84-.95L6.3 13.7l-5.45-1.7c-1.18-.35-1.19-1.16.26-1.75l21.26-8.2c.97-.43 1.9.24 1.53 1.73z"></path>
        </symbol>
        
    </defs>
</svg>
<?php }
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_copyright_() {
global $opt_themes;
if($opt_themes['ex_themes_footers_copyrights_active_']) { 
    echo $opt_themes['ex_themes_footers_copyrights_code_'];
} else { ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_option("blogname") ?></a> - <a href="<?php echo EXTHEMES_ITEMS_URL; ?>" title="Using Themes <?php echo THEMES_NAMES; ?>.v<?php echo VERSION; ?> Premium by <?php echo DEVS; ?>"><?php echo THEMES_NAMES; ?>.v<?php echo VERSION; ?></a> © <script type="text/javascript">var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> All rights reserved - Developer by <a href="<?php echo EXTHEMES_API_URL; ?>" title="Premium Wordpress Themes - <?php echo DEVS; ?>"><?php echo DEVS; ?></a>
<?php }
}
add_shortcode('ex_themes_footer_on_sections_', 'ex_themes_footer_on_sections_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_footers_social_media_() {
global $opt_themes; 
$linkXhost          = get_bloginfo('url'); 
$parse              = parse_url($linkXhost); 
$sites              = $parse['host']; 
?> 
        <?php if($opt_themes['facebook_url']) { ?><a href="<?php echo $opt_themes['facebook_url']; ?>" rel="nofollow noreferrer" target="_blank" title="Follow <?php echo $sites; ?> on Facebook" aria-label="Facebook" ><svg width="30" height="30"><use xlink:href="#i__icons_facebook"></use></svg></a>
        <?php } 
        if($opt_themes['twitter_url']) { ?><a href="<?php echo $opt_themes['twitter_url']; ?>" rel="nofollow noreferrer" target="_blank" title="Follow <?php echo $sites; ?> on Twitter" aria-label="Twitter"><svg width="30" height="30"><use xlink:href="#i__icons_twitter"></use></svg></a>
        <?php }
        if($opt_themes['instagram_url']) { ?><a href="<?php echo $opt_themes['instagram_url']; ?>" rel="nofollow noreferrer" target="_blank" title="Follow <?php echo $sites; ?> on Instagram" aria-label="Instagram"><svg width="30" height="30"><use xlink:href="#i__icons_instagram"></use></svg></a>
        <?php }
        if($opt_themes['youtube_url']) { ?><a href="<?php echo $opt_themes['youtube_url']; ?>" rel="nofollow noreferrer" target="_blank" title="Follow <?php echo $sites; ?> on Youtube" aria-label="Youtube"><svg width="30" height="30"><use xlink:href="#i__icons_youtube"></use></svg></a>
        <?php }
        if($opt_themes['telegram_url']) { ?><a href="<?php echo $opt_themes['telegram_url']; ?>" rel="nofollow noreferrer" target="_blank" title="Follow <?php echo $sites; ?> on Telegram" aria-label="Telegram"><svg width="30" height="30"><use xlink:href="#i__icons_telegram"></use></svg></a>
        <?php } ?>
  
<?php } 
add_shortcode('ex_themes_footers_social_media_', 'ex_themes_footers_social_media_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_related_posts_() { 
	global $opt_themes, $wpdb, $post, $wp_query;
    $activate           = $opt_themes['ex_themes_related_posts_active_'];
    $numbers            = $opt_themes['ex_themes_related_posts_numbers_'];
    $titles             = $opt_themes['ex_themes_related_posts_title_'];
	$developer_terms    = get_the_terms( $post->ID , 'developer', 'string');
	$term_ids           = wp_list_pluck($developer_terms,'term_id');
	$developer_terms    = get_the_terms( $post->ID , 'developer', 'string'); 
	$term_ids           = wp_list_pluck($developer_terms,'term_id');
	$paged_categorie_apps = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	$developer_query = new WP_Query( array(
		'post_type' => 'post',
		'tax_query' => array(
		array(
			'taxonomy' => 'developer',
			'field' => 'id',
			'terms' => $term_ids,
			/* 'operator'=> 'IN' //Or 'AND' or 'NOT IN' */
			)),
			'posts_per_page' => 10,
			'paged' => $paged_categorie_apps,
			'ignore_sticky_posts' => 1,
			'orderby' => 'rand',
			'post__not_in'=>array($post->ID)
		) ); 
	if($developer_query->have_posts()){ ?>
	<section class="wrp section section-related">
            <div class="section-head">
                <h3 class="section-title"><i class="s-blue c-icon"><svg width="24" height="24"><use xlink:href="#i__explore"></use></svg></i><?php global $opt_themes; if($opt_themes['exthemes_more_by_developers']) { ?><?php echo $opt_themes['exthemes_more_by_developers']; ?><?php } ?> </h3>
				<?php
                global $post;
                $developer = get_option('wp_developers_GP', 'developer');
				$terms = wp_get_post_terms($post->ID, $developer);
                if ($terms) {
                    $output = array();
                    foreach ($terms as $term) {
                        $output[] = '<a class="btn s-green btn-all" href="' .get_term_link( $term->slug, $developer) .'" title="Developer by ' .$term->name .'"><span>' .$term->name .'</span><svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg></a>';
                   }
                   echo join( ', ', $output );	}
                ?>
            </div> 
	<div class="entry-list list-c6"> 		
	<?php while($developer_query->have_posts() ) : $developer_query->the_post();  ?>	
	<?php get_template_part('template/loop/loop.item.home'); ?>	
	<?php endwhile; wp_reset_query(); }  ?>
	</div>
	</section>
    <?php //if (($activate == '1'))    
    if($activate) { 
	$categories = get_the_category($post->ID);
	if ($categories) {
	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args=array(
			//'tag' => $tags->slug,
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=> $numbers, // Number of related posts that will be shown.
			'caller_get_posts'=> 1
			);			
	$my_query = new WP_Query( $args );
	if( $my_query->have_posts() ) {				
	?>
        <section class="wrp section section-related">
            <div class="section-head">
                <h3 class="section-title"><i class="s-blue c-icon"><svg width="24" height="24"><use xlink:href="#i__explore"></use></svg></i><?php echo $titles; ?></h3>
				<?php
                $category = get_the_category();
                echo '<a class="btn s-green btn-all" href="'.get_category_link($category[0]->cat_ID).'"><span>All ' . $category[0]->cat_name . '</span><svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg></a>';
				?>
                 
            </div>
            <div class="entry-list list-c6">
                <?php
				if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) : $my_query->the_post();
				get_template_part('template/loop/loop.item.home');
				endwhile; } wp_reset_query();
                } 
				?>
            </div>
        </section>
    <?php } } else { ?>
    <?php } ?>
<?php } 
add_shortcode('ex_themes_related_posts_', 'ex_themes_related_posts_');

function ex_themes_version_() {  
global $opt_themes, $wpdb, $post, $wp_query;
$latest_version_on			= $opt_themes['activated_latest_version'];  
$search						= get_post_meta( $post->ID, 'wp_title_GP', true );
$search						= preg_replace('/[^A-Za-z0-9\-]/', ' ', $search);
$wp_gp_id					= get_post_meta( $post->ID, 'wp_GP_ID', true );
//$search					= str_replace(array(':','-'), '', $search);
$version_gp					= get_post_meta( $post->ID, 'wp_version_GP', true );
$version_sc					= get_post_meta( get_the_ID(), 'wp_version', true );				
//if ( $version_gp === FALSE or $version_gp == '' ) $version_gp = $version_sc;
$appname_on					= $opt_themes['title_app_name_active_'];
$title						= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt					= get_the_title(); 
if ($latest_version_on) { if($wp_gp_id){ 
?>
<div class="block ">
<div class="box_download box_shadow">  
<div class="b-head">
<h3 class="section-title fbold"><i class="s-blue c-icon"><svg width="24" height="24"><use xlink:href="#i__vers"></use></svg></i> <?php echo $opt_themes['title_latest_version']; ?></h3>
</div>
<div class="version_history"> 
		<?php		 
		$arg_version = array(		
		'post_type'			=> 'post',
		'posts_per_page'	=> -1, 
		'meta_key'			=> 'wp_GP_ID', 
		'meta_value'		=> $wp_gp_id,
		'orderby'			=> $version_gp,
		'order'				=> 'DESC',
		);
		$post_version = new WP_Query($arg_version); 
		while($post_version->have_posts() ) : $post_version->the_post();
        ?>
        
        <?php
		$image_id_alt					= get_post_thumbnail_id($post->ID); 
		$image_idx						= get_post_thumbnail_id(); 
		$fullx							= 'post_thumb_version'; 
		$image_urlx						= wp_get_attachment_image_src($image_idx, $fullx, true); 
		$imagex							= $image_urlx[0];
        $version_gp			    		= get_post_meta( $post->ID, 'wp_version_GP', true );
        $version_sc		    			= get_post_meta( get_the_ID(), 'wp_version', true );	
		//if ( $version_gp === FALSE or $version_gp == '' ) $version_gp = $version_sc;		
		$mods							= get_post_meta( get_the_ID(), 'wp_mods', true );
		$updates						= get_the_modified_time('F j, Y');
		$search							= get_post_meta( $post->ID, 'wp_title_GP', true );
		$sizes							= get_post_meta( $post->ID, 'wp_sizes', true ); 
		$sizes_alt						= get_post_meta( $post->ID, 'wp_sizes_GP', true );
		if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizes_alt;
        $appname_on				    	= $opt_themes['title_app_name_active_'];
        $title					    	= get_post_meta( $post->ID, 'wp_title_GP', true );
        $title_alt				    	= get_the_title(); 
		$poster_gp						= get_post_meta( $post->ID, 'wp_poster_GP', true );
                
		?>
		<div class="list">
            <div class="package_info open_info">
                <img src="<?php if($poster_gp){ echo $poster_gp; } else { echo $imagex; } ?>" class="icon " alt="<?php if ($title) { if($opt_themes['title_app_name_active_']) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?>" width="50" height="50">
                <div class="title">
                    <span class="name"><?php if ($title) { echo ucwords($title); } ?></span>
                    <span class="version"><?php echo $version_gp; ?></span>
                    <span class="<?php if($mods){ ?>mod<?php } else { ?>apk<?php } ?>"><?php if($mods){ ?><?php echo $opt_themes['title_version_mod']; ?><?php } else { ?><?php echo $opt_themes['title_version_apk']; ?><?php } ?></span>
                </div>
                <div class="text">
                    <span><?php echo the_modified_time('F j, Y '); ?></span>
                    <?php if($sizes){ ?><span><?php echo $sizes; ?></span><?php } ?>
                </div>
            </div>
            <?php if($mods){ ?>
            <div class="info-fix"> 
                <div class="info_box">
				<p><strong><?php echo $opt_themes['exthemes_content_Mod_info']; ?></strong></p>
                <div class="whats_new"><?php echo $mods; ?></div>
                </div>
            </div> 
            <?php } ?>		
            <div class="v_h_button button_down ">
                <a class="down" href="<?php the_permalink() ?>"><span><?php echo $opt_themes['exthemes_apk_info_Download'] ?></span></a>
            </div>
		</div>
		<?php endwhile; wp_reset_query(); ?>
</div> 
</div> 
</div>

 

<script id="rendered-js" >
$(function() {
  $(".open_info").on("click", function(e) {
    e.preventDefault();
    $('.info_box').removeClass('show');
    $(this).parent().addClass('show');
    var content = $(this).closest("div").next().find(".info_box");
    $(".info_box").not(content).slideUp();
    content.slideToggle();
  });
});
</script>
<?php }   }}
add_shortcode('ex_themes_version_', 'ex_themes_version_');

// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_gallery_images_gpstore_() { 
global $wpdb, $post, $opt_themes; 
$gallery            = get_post_meta( $post->ID, 'gallery_data', true );
$images_GP          = get_post_meta(get_the_ID(), 'wp_images_GP', true);
if ( $gallery === FALSE or $gallery == '' ) $gallery = $images_GP;
if ($gallery) {
?>
    <div class="block b-screens">
        <div class="b-icon-title">
            <i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__cam"></use></svg></i>
            <h3 class="b-title"><?php global $opt_themes; if($opt_themes['exthemes_Screenshots']) { ?><?php echo $opt_themes['exthemes_Screenshots']; ?><?php } ?></h3>
        </div>
        <div class="b-cont">
            <div class="screenshots">
                <?php
                global $wpdb, $post, $opt_themes; 
                $gallery_data       = get_post_meta( $post->ID, 'gallery_data', true );
                if ($gallery_data) { ?>
                    <?php
                    global $post;
                    $gallery_data = get_post_meta( $post->ID, 'gallery_data', true );
                    if ( '' != get_post_meta( $post->ID, 'gallery_data', true ) ) { $gallery = get_post_meta( $post->ID, 'gallery_data', true ); }
                    if ( isset( $gallery_data ) ) :
                        for( $i = 0; $i < count( $gallery['image_url'] ); $i++ ) {
                            if ( '' != $gallery['image_url'][$i] ) { ?>
                                <a href="<?php echo  $gallery['image_url'][$i] ; ?>" class="highslide" ><img data-src="<?php echo  $gallery['image_url'][$i] ; ?>" style="max-width:100%;" alt="" src="<?php echo  $gallery['image_url'][$i] ; ?>" class="lazy-loaded"></a>
                            <?php }
                        }
                    endif;
                    ?>
                <?php } else { ?>
                    <?php global $wpdb, $post, $opt_themes; if($opt_themes['aktif_ex_themes_gallery_images_gpstore_']) { ?>
                        <?php if (get_post_meta( $post->ID, 'wp_images_GP', true )) { ?>
                            <?php
                            $datos_imagenes = get_post_meta(get_the_ID(), 'wp_images_GP', true);
                            $i = 0;
                            $count = 4;
                            foreach($datos_imagenes as $elemento) {
                                $i++;
                                if ( $i <= $count ) { ?>
                                    <a href="<?php echo (!empty($datos_imagenes[$i])) ? $datos_imagenes[$i] : ''; ?>" class="highslide" ><img data-src="<?php echo (!empty($datos_imagenes[$i])) ? $datos_imagenes[$i] : ''; ?>" style="max-width:100%;" alt="" src="<?php echo (!empty($datos_imagenes[$i])) ? $datos_imagenes[$i] : ''; ?>" class="lazy-loaded"></a>
                                <?php } else { ?>
                                <?php   }  }  ?>
                        <?php } else { ?>
                        <?php }} ?>
                <?php } ?>
            </div>
        </div>
    </div>
<?php }} 
add_shortcode('ex_themes_gallery_images_gpstore_', 'ex_themes_gallery_images_gpstore_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_homes_search_() { ?>
    <div class="has-text-centered">
        <form action="<?php echo esc_url(home_url('/')); ?>" method="GET">
            <div style="display: -webkit-box;-webkit-box-orient: horizontal;">
                <div style="-webkit-box-flex: 1;width: 100%;">
                    <input name="s" value="" required="" aria-label="Name" class="ainput" type="search" style="border-color: darkgray;" placeholder="<?php global $opt_themes; if($opt_themes['exthemes_Enter_your_search_here']) { ?><?php echo $opt_themes['exthemes_Enter_your_search_here']; ?><?php } ?>">
                </div>
                <button aria-label="Search" class="abutton is-light" style="border-color: darkgray;margin: 0 -1px; height: 2.25em;border-bottom-left-radius: 0;border-top-left-radius: 0"><span style="position: relative;top: -1px;"><?php global $opt_themes; if($opt_themes['exthemes_Search_2']) { ?><?php echo $opt_themes['exthemes_Search_2']; ?><?php } ?></span></button>
            </div>
        </form>
    </div>
<?php }
add_shortcode('ex_themes_homes_search_', 'ex_themes_homes_search_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_homes_titles_() { 
global $opt_themes;
    if($opt_themes['ex_themes_homes_titles_']) { ?>
        <h1 class="atitle has-text-centered"><?php echo $opt_themes['ex_themes_homes_titles_']; ?></h1>
    <?php } else { ?>
        <h1 class="atitle has-text-centered"><?php echo get_option("blogname") ?></h1>
    <?php } ?>
<?php }
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_shortcode('ex_themes_homes_titles_', 'ex_themes_homes_titles_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_background_st_1_() { 
    $linkXhost          = get_bloginfo('url'); 
    $parse              = parse_url($linkXhost); 
    $watermark1         = $parse['host']; 
    ?>
    <div class="background bg-style-1">
    <i class="bg-circle-purple"></i>
    <i class="bg-circle-yellow bgc-1"></i>
    <i class="bg-circle-yellow bgc-2"></i>
    <i class="bg-circle-green"></i>
    <i class="bg-clouds"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2808 800" width="2808" height="800"><path class="cloud-c1" d="M2066,300h-2a50,50,0,0,0,0,100h2a50,50,0,0,0,0-100Zm459.27-100H2758a50,50,0,0,0,0-100H2577.58a50,50,0,0,1,0-100H2126.45a50,50,0,0,1-.06,100H1970a50,50,0,0,0,0,100h232.45a50,50,0,0,1-.08,100H2186a50,50,0,0,0,0,100h104.46a50,50,0,0,1,0,100H2282a50,50,0,0,0,0,100h428a50,50,0,0,0,0-100H2601.55a50,50,0,0,1-.3-100H2606a50,50,0,0,0,0-100h-80.45a50,50,0,1,1-.28-100Z" /><path class="cloud-c2" d="M2142,324H1969.55a50,50,0,0,1,0-100H1998a50,50,0,0,0,0-100H1770a50,50,0,0,0,0,100h14.26a50,50,0,1,1,0,100H1718a50,50,0,0,0,0,100h424a50,50,0,0,0,0-100Zm132-200H2170a50,50,0,0,0,0,100h104a50,50,0,0,0,0-100Z" /><path class="cloud-c1" d="M962,100H781.58a50,50,0,0,1,0-100H206.45a50,50,0,0,1-.06,100H50a50,50,0,0,0,0,100H282.45a50,50,0,0,1-.08,100H266a50,50,0,0,0,0,100H370.46a50,50,0,1,1,0,100H362a50,50,0,0,0,0,100h8.46a50,50,0,1,1,0,100h-24a50,50,0,0,0,0,100H590a50,50,0,0,0,0-100H509.55a50,50,0,1,1,.08-100H790a50,50,0,0,0,0-100H681.55a50,50,0,0,1-.3-100H686a50,50,0,0,0,0-100H605.55a50,50,0,1,1-.28-100H962a50,50,0,0,0,0-100Zm168,0h-28a50,50,0,0,0,0,100h28a50,50,0,0,0,0-100Z" /><path class="cloud-c2" d="M1086,244H913.57a50,50,0,0,1,0-100H962a50,50,0,0,0,0-100H654a50,50,0,0,0,0,100h28a50,50,0,0,1,0,100H642a50,50,0,0,0,0,100h444a50,50,0,0,0,0-100Z" /></svg></i>
</div>
<svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>
        <symbol id="i__search" viewBox="0 0 24 24">
            <path fill="currentColor" d="M15.5 14h-.79l-.28-.27c1.2-1.4 1.82-3.31 1.48-5.34-.47-2.78-2.79-5-5.59-5.34-4.23-.52-7.79 3.04-7.27 7.27.34 2.8 2.56 5.12 5.34 5.59 2.03.34 3.94-.28 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
        </symbol>
        <symbol id="i__user" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v1c0 .55.45 1 1 1h14c.55 0 1-.45 1-1v-1c0-2.66-5.33-4-8-4z" />
        </symbol>
        <symbol id="i__gamepad" viewBox="0 0 24 24">
            <path fill="currentColor" d="M21.58,16.09l-1.09-7.66C20.21,6.46,18.52,5,16.53,5H7.47C5.48,5,3.79,6.46,3.51,8.43l-1.09,7.66 C2.2,17.63,3.39,19,4.94,19h0c0.68,0,1.32-0.27,1.8-0.75L9,16h6l2.25,2.25c0.48,0.48,1.13,0.75,1.8,0.75h0 C20.61,19,21.8,17.63,21.58,16.09z M11,11H9v2H8v-2H6v-1h2V8h1v2h2V11z M15,10c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1 C16,9.55,15.55,10,15,10z M17,13c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1C18,12.55,17.55,13,17,13z" />
        </symbol>
        <symbol id="i__apps" viewBox="0 0 24 24">
            <path fill="currentColor" d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z" />
        </symbol>
        <symbol id="i__cup" viewBox="0 0 24 24">
            <path fill="currentColor" d="M19,5h-2V4c0-0.55-0.45-1-1-1H8C7.45,3,7,3.45,7,4v1H5C3.9,5,3,5.9,3,7v1c0,2.55,1.92,4.63,4.39,4.94 c0.63,1.5,1.98,2.63,3.61,2.96V19H8c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h8c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1h-3v-3.1 c1.63-0.33,2.98-1.46,3.61-2.96C19.08,12.63,21,10.55,21,8V7C21,5.9,20.1,5,19,5z M5,8V7h2v3.82C5.84,10.4,5,9.3,5,8z M19,8 c0,1.3-0.84,2.4-2,2.82V7h2V8z" />
        </symbol>
        <symbol id="i__flash" viewBox="0 0 24 24">
            <path fill="currentColor" d="M8,4v9a1,1,0,0,0,1,1h2v7.15a.5.5,0,0,0,.93.25l5.19-8.9a1,1,0,0,0-.37-1.37,1.05,1.05,0,0,0-.49-.13H14l2.49-6.65a1,1,0,0,0-.57-1.28A.92.92,0,0,0,15.56,3H9A1,1,0,0,0,8,4Z" />
        </symbol>
        <symbol id="i__coms" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12,23h0L9,20H5a2,2,0,0,1-2-2V4A2,2,0,0,1,5,2H19a2,2,0,0,1,2,2V18a2,2,0,0,1-2,2H15Zm4-13a1,1,0,1,0,1,1A1,1,0,0,0,16,10Zm-4,0a1,1,0,1,0,1,1A1,1,0,0,0,12,10ZM8,10a1,1,0,1,0,1,1A1,1,0,0,0,8,10Z" />
        </symbol>
        <symbol id="i__stats" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2s-2 .9-2 2v12c0 1.1.9 2 2 2zm-6 0c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2s-2 .9-2 2v4c0 1.1.9 2 2 2zm10-9v7c0 1.1.9 2 2 2s2-.9 2-2v-7c0-1.1-.9-2-2-2s-2 .9-2 2z" />
        </symbol>
        <symbol id="i__close" viewBox="0 0 24 24">
            <path fill="currentColor" d="M18.3 5.71c-.39-.39-1.02-.39-1.41 0L12 10.59 7.11 5.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L10.59 12 5.7 16.89c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L12 13.41l4.89 4.89c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z" />
        </symbol>
        <symbol id="i__order" viewBox="0 0 32 32">
            <path fill="#fede4a" d="M30,26h0a2,2,0,0,1,0-4,2,2,0,0,0,0-4H26a2,2,0,0,1,0-4h1a2,2,0,0,0,0-4H17a2,2,0,0,1,0-4h4a2,2,0,0,0,0-4H4A2,2,0,0,0,4,6H5a2,2,0,0,1,0,4H2a2,2,0,0,0,0,4H5a2,2,0,0,1,0,4,2,2,0,0,0,0,4H9a2,2,0,0,1,0,4H7a2,2,0,0,0,0,4H30a2,2,0,0,0,0-4Z" /><path fill="#4bca6f" d="M10,5H24a2,2,0,0,1,2,2V26a3,3,0,0,1-3,3H10a2,2,0,0,1-2-2V7A2,2,0,0,1,10,5Z" /><path fill="#fff" d="M16,18V15H13a1,1,0,0,1,0-2h3V10a1,1,0,0,1,2,0v3h3a1,1,0,0,1,0,2H18v3a1,1,0,0,1-2,0Z" /><path fill="#27987d" d="M20,26V24h0a2,2,0,0,0-2-2H4a2,2,0,0,0-2,2v2a3,3,0,0,0,3,3H23A3,3,0,0,1,20,26Z" />
        </symbol>
        <symbol id="i__android" viewBox="0 0 24 24">
            <path fill="currentColor" d="M7.2,16.8a.8.8,0,0,0,.8.8h.8v2.8a1.2,1.2,0,0,0,2.4,0V17.6h1.6v2.8a1.2,1.2,0,0,0,2.4,0h0V17.6H16a.8.8,0,0,0,.8-.8h0v-8H7.2Zm-2-8A1.2,1.2,0,0,0,4,10H4v5.6a1.2,1.2,0,0,0,2.4,0h0V10A1.2,1.2,0,0,0,5.2,8.8Zm13.6,0A1.2,1.2,0,0,0,17.6,10v5.6a1.2,1.2,0,0,0,2.4,0V10a1.2,1.2,0,0,0-1.2-1.2Zm-4-4.67,1-1a.41.41,0,0,0,0-.57h0a.39.39,0,0,0-.56,0h0L14.11,3.7A4.68,4.68,0,0,0,12,3.2a4.76,4.76,0,0,0-2.13.5L8.68,2.52a.4.4,0,0,0-.57,0h0a.41.41,0,0,0,0,.57h0l1.05,1A4.78,4.78,0,0,0,7.2,8h9.6A4.76,4.76,0,0,0,14.82,4.13ZM10.4,6.4H9.6V5.6h.8Zm4,0h-.8V5.6h.8Z" />
        </symbol>
        <symbol id="i__vers" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 2.02c-5.51 0-9.98 4.47-9.98 9.98s4.47 9.98 9.98 9.98 9.98-4.47 9.98-9.98S17.51 2.02 12 2.02zm-.52 15.86v-4.14H8.82c-.37 0-.62-.4-.44-.73l3.68-7.17c.23-.47.94-.3.94.23v4.19h2.54c.37 0 .61.39.45.72l-3.56 7.12c-.24.48-.95.31-.95-.22z" />
        </symbol>
        <symbol id="i__info" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 15c-.55 0-1-.45-1-1v-4c0-.55.45-1 1-1s1 .45 1 1v4c0 .55-.45 1-1 1zm1-8h-2V7h2v2z" />
        </symbol>
        <symbol id="i__arrowleft" viewBox="0 0 24 24">
            <path fill="currentColor" d="M19 11H7.83l4.88-4.88c.39-.39.39-1.03 0-1.42-.39-.39-1.02-.39-1.41 0l-6.59 6.59c-.39.39-.39 1.02 0 1.41l6.59 6.59c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L7.83 13H19c.55 0 1-.45 1-1s-.45-1-1-1z" />
        </symbol>
        <symbol id="i__arrowright" viewBox="0 0 24 24">
            <path fill="currentColor" d="M5 13h11.17l-4.88 4.88c-.39.39-.39 1.03 0 1.42.39.39 1.02.39 1.41 0l6.59-6.59c.39-.39.39-1.02 0-1.41l-6.58-6.6c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L16.17 11H5c-.55 0-1 .45-1 1s.45 1 1 1z" />
        </symbol>
        <symbol id="i__keyright" viewBox="0 0 24 24">
            <path fill="currentColor" d="M9.29 15.88L13.17 12 9.29 8.12c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0l4.59 4.59c.39.39.39 1.02 0 1.41L10.7 17.3c-.39.39-1.02.39-1.41 0-.38-.39-.39-1.03 0-1.42z" />
        </symbol>
        <symbol id="i__getapp" viewBox="0 0 24 24">
            <path fill="currentColor" d="M16.59 9H15V4c0-.55-.45-1-1-1h-4c-.55 0-1 .45-1 1v5H7.41c-.89 0-1.34 1.08-.71 1.71l4.59 4.59c.39.39 1.02.39 1.41 0l4.59-4.59c.63-.63.19-1.71-.7-1.71zM5 19c0 .55.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1H6c-.55 0-1 .45-1 1z" />
        </symbol>
        <symbol id="i__scrollup" viewBox="0 0 24 24">
            <path fill="currentColor" d="M8.06,11.71,12,7.83l3.88,3.88a1,1,0,1,0,1.52-1.3.57.57,0,0,0-.11-.11L12.65,5.71a1,1,0,0,0-1.41,0L6.65,10.3a1,1,0,0,0,1.41,1.41Zm9.18,5.17-4.59-4.59a1,1,0,0,0-1.41,0L6.65,16.88a1,1,0,0,0,1.41,1.41L12,14.41l3.88,3.88A1,1,0,1,0,17.35,17Z" />
        </symbol>
        <symbol id="i__reply" viewBox="0 0 24 24">
            <path fill="currentColor" d="M10 9V7.41c0-.89-1.08-1.34-1.71-.71L3.7 11.29c-.39.39-.39 1.02 0 1.41l4.59 4.59c.63.63 1.71.19 1.71-.7V14.9c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z" />
        </symbol>
        <symbol id="i__moon" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12,2.73a.5.5,0,0,0-.26-.66.49.49,0,0,0-.24,0A10,10,0,1,0,20.2,17.71a.51.51,0,0,0-.11-.7.43.43,0,0,0-.22-.09A10,10,0,0,1,12,2.73Z" />
        </symbol>
        <symbol id="i__sun" viewBox="0 0 24 24">
            <path fill="currentColor" d="M6.06,4.64l-.39-.39a1,1,0,0,0-1.4,0h0a1,1,0,0,0,0,1.4l.38.39a1,1,0,0,0,1.41,0h0A1,1,0,0,0,6.06,4.64ZM3,11H2a1,1,0,0,0-1,1H1a1,1,0,0,0,1,1H3a1,1,0,0,0,1-1H4A1,1,0,0,0,3,11Zm9-9.95h0a1,1,0,0,0-1,1V3a1,1,0,0,0,1,1h0a1,1,0,0,0,1-1V2A1,1,0,0,0,12,1.05Zm7.74,3.21a1,1,0,0,0-1.41,0L18,4.64A1,1,0,0,0,18,6h0a1,1,0,0,0,1.4,0l.39-.39A1,1,0,0,0,19.76,4.26ZM18,19.36l.39.39a1,1,0,0,0,1.4,0,1,1,0,0,0,0-1.41L19.36,18A1,1,0,0,0,18,19.36ZM20,12h0a1,1,0,0,0,1,1h1a1,1,0,0,0,1-1h0a1,1,0,0,0-1-1H21A1,1,0,0,0,20,12ZM12,6a6,6,0,1,0,6,6A6,6,0,0,0,12,6Zm0,17h0a1,1,0,0,0,1-1V21a1,1,0,0,0-1-1h0a1,1,0,0,0-1,1v1A1,1,0,0,0,12,23ZM4.26,19.74a1,1,0,0,0,1.4,0l.39-.39a1,1,0,0,0,0-1.4H6a1,1,0,0,0-1.41,0l-.39.39A1,1,0,0,0,4.26,19.74Z" />
        </symbol>
        <symbol id="i__telegram" viewBox="0 0 40 40">
            <path fill="#c8daea" d="M14.87,32.83c-.91,0-.76-.34-1.07-1.2l-2.67-8.78L31.67,10.67Z" /><path fill="#a9c9dd" d="M14.87,32.83a1.77,1.77,0,0,0,1.4-.7L20,28.5l-4.66-2.8Z" /><path fill="#eff7fc" d="M15.34,25.7,26.63,34c1.28.71,2.21.35,2.53-1.2l4.6-21.64C34.23,9.31,33,8.45,31.81,9l-27,10.4C3,20.15,3,21.18,4.5,21.63l6.92,2.16,16-10.1c.75-.46,1.45-.22.88.29Z" />
        </symbol>
        <symbol id="i__hot" viewBox="0 0 24 24">
            <path fill="currentColor" d="M19.48,12.35c-1.57-4.08-7.16-4.3-5.81-10.23c0.1-0.44-0.37-0.78-0.75-0.55C9.29,3.71,6.68,8,8.87,13.62 c0.18,0.46-0.36,0.89-0.75,0.59c-1.81-1.37-2-3.34-1.84-4.75c0.06-0.52-0.62-0.77-0.91-0.34C4.69,10.16,4,11.84,4,14.37 c0.38,5.6,5.11,7.32,6.81,7.54c2.43,0.31,5.06-0.14,6.95-1.87C19.84,18.11,20.6,15.03,19.48,12.35z M10.2,17.38 c1.44-0.35,2.18-1.39,2.38-2.31c0.33-1.43-0.96-2.83-0.09-5.09c0.33,1.87,3.27,3.04,3.27,5.08C15.84,17.59,13.1,19.76,10.2,17.38z" />
        </symbol>
    </defs>
</svg>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo EX_THEMES_URI; ?>/assets/js/general3.php"></script>
<script src="<?php echo EX_THEMES_URI; ?>/assets/js/lazy.js" ></script>
<script src="<?php echo EX_THEMES_URI; ?>/assets/js/bootstrap.min.js"></script>
<script>
$(document).ready((function(){$("html").removeClass("load")})),$((function(){$(".dropdown-form").click((function(o){o.stopPropagation()})),$(".social-links a").on("click",(function(){var o=$(this).attr("href"),t=(screen.width-820)/2,n=(screen.height-420)/2-100;return auth_window=window.open(o,"auth_window","width=820,height=420,top="+n+",left="+t+"menubar=no,resizable=no,scrollbars=no,status=no,toolbar=no"),!1})),$(".q-search-call").on("click",(function(){return $(".q-search").toggleClass("open"),setTimeout((function(){$(".header").toggleClass("qs")}),50),!1})),$(".scrollup").click((function(){return $("html, body").animate({scrollTop:0},"fast"),!1}));var o=$("html, body");$("a.anchor").click((function(){var t=$.attr(this,"href");return o.animate({scrollTop:$(t).offset().top},500),!1})),$(".menu-toggle").on("click",(function(){return $("#mobilemenu").toggleClass("open"),setTimeout((function(){$("html").toggleClass("mm")}),50),!1}))}));
</script>
<?php } 
add_shortcode('ex_themes_background_st_1_', 'ex_themes_background_st_1_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_background_st_2_() { ?>
    <?php 
    $linkXhost = get_bloginfo('url'); 
    $parse = parse_url($linkXhost); 
    $watermark1 = $parse['host'];
    ?>
    <div class="background bg-style-2">
        <i class="bg-circle-purple"></i>
        <i class="bg-circle-yellow bgc-1"></i>
        <i class="bg-circle-yellow bgc-2"></i>
        <i class="bg-circle-green"></i>
        <i class="bg-clouds"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2808 800" width="2808" height="800"><path class="cloud-c1" d="M2066,500h-2a50,50,0,0,1,0-100h2a50,50,0,0,1,0,100Zm459.27,100H2758a50,50,0,0,1,0,100H2577.58a50,50,0,0,0,0,100H2126.45a50,50,0,1,0-.06-100H1970a50,50,0,0,1,0-100h232.45a50,50,0,1,0-.08-100H2186a50,50,0,0,1,0-100h104.46a50,50,0,0,0,0-100H2282a50,50,0,0,1,0-100h428a50,50,0,0,1,0,100H2601.55a50,50,0,0,0-.3,100H2606a50,50,0,0,1,0,100h-80.45a50,50,0,1,0-.28,100Z" /><path class="cloud-c2" d="M2142,476H1969.55a50,50,0,0,0,0,100H1998a50,50,0,0,1,0,100H1770a50,50,0,0,1,0-100h14.26a50,50,0,1,0,0-100H1718a50,50,0,0,1,0-100h424a50,50,0,0,1,0,100Zm132,200H2170a50,50,0,0,1,0-100h104a50,50,0,0,1,0,100Z" /><path class="cloud-c1" d="M962,700H781.58a50,50,0,1,0,0,100H206.45a50,50,0,0,0-.06-100H50a50,50,0,0,1,0-100H282.45a50,50,0,1,0-.08-100H266a50,50,0,0,1,0-100H370.46a50,50,0,1,0,0-100H362a50,50,0,0,1,0-100h8.46a50,50,0,1,0,0-100h-24a50,50,0,0,1,0-100H590a50,50,0,0,1,0,100H509.55a50,50,0,0,0,.08,100H790a50,50,0,0,1,0,100H681.55a50,50,0,0,0-.3,100H686a50,50,0,0,1,0,100H605.55a50,50,0,0,0-.28,100H962a50,50,0,0,1,0,100Zm168,0h-28a50,50,0,0,1,0-100h28a50,50,0,0,1,0,100Z" /><path class="cloud-c2" d="M1086,556H913.57a50,50,0,0,0,0,100H962a50,50,0,0,1,0,100H654a50,50,0,0,1,0-100h28a50,50,0,0,0,0-100H642a50,50,0,0,1,0-100h444a50,50,0,0,1,0,100Z" /></svg></i>
    </div>
    <svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <symbol id="i__search" viewBox="0 0 24 24">
                <path fill="currentColor" d="M15.5 14h-.79l-.28-.27c1.2-1.4 1.82-3.31 1.48-5.34-.47-2.78-2.79-5-5.59-5.34-4.23-.52-7.79 3.04-7.27 7.27.34 2.8 2.56 5.12 5.34 5.59 2.03.34 3.94-.28 5.34-1.48l.27.28v.79l4.25 4.25c.41.41 1.08.41 1.49 0 .41-.41.41-1.08 0-1.49L15.5 14zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
            </symbol>
            <symbol id="i__user" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v1c0 .55.45 1 1 1h14c.55 0 1-.45 1-1v-1c0-2.66-5.33-4-8-4z" />
            </symbol>
            <symbol id="i__gamepad" viewBox="0 0 24 24">
                <path fill="currentColor" d="M21.58,16.09l-1.09-7.66C20.21,6.46,18.52,5,16.53,5H7.47C5.48,5,3.79,6.46,3.51,8.43l-1.09,7.66 C2.2,17.63,3.39,19,4.94,19h0c0.68,0,1.32-0.27,1.8-0.75L9,16h6l2.25,2.25c0.48,0.48,1.13,0.75,1.8,0.75h0 C20.61,19,21.8,17.63,21.58,16.09z M11,11H9v2H8v-2H6v-1h2V8h1v2h2V11z M15,10c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1 C16,9.55,15.55,10,15,10z M17,13c-0.55,0-1-0.45-1-1c0-0.55,0.45-1,1-1s1,0.45,1,1C18,12.55,17.55,13,17,13z" />
            </symbol>
            <symbol id="i__apps" viewBox="0 0 24 24">
                <path fill="currentColor" d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z" />
            </symbol>
            <symbol id="i__cup" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19,5h-2V4c0-0.55-0.45-1-1-1H8C7.45,3,7,3.45,7,4v1H5C3.9,5,3,5.9,3,7v1c0,2.55,1.92,4.63,4.39,4.94 c0.63,1.5,1.98,2.63,3.61,2.96V19H8c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h8c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1h-3v-3.1 c1.63-0.33,2.98-1.46,3.61-2.96C19.08,12.63,21,10.55,21,8V7C21,5.9,20.1,5,19,5z M5,8V7h2v3.82C5.84,10.4,5,9.3,5,8z M19,8 c0,1.3-0.84,2.4-2,2.82V7h2V8z" />
            </symbol>
            <symbol id="i__flash" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8,4v9a1,1,0,0,0,1,1h2v7.15a.5.5,0,0,0,.93.25l5.19-8.9a1,1,0,0,0-.37-1.37,1.05,1.05,0,0,0-.49-.13H14l2.49-6.65a1,1,0,0,0-.57-1.28A.92.92,0,0,0,15.56,3H9A1,1,0,0,0,8,4Z" />
            </symbol>
            <symbol id="i__coms" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,23h0L9,20H5a2,2,0,0,1-2-2V4A2,2,0,0,1,5,2H19a2,2,0,0,1,2,2V18a2,2,0,0,1-2,2H15Zm4-13a1,1,0,1,0,1,1A1,1,0,0,0,16,10Zm-4,0a1,1,0,1,0,1,1A1,1,0,0,0,12,10ZM8,10a1,1,0,1,0,1,1A1,1,0,0,0,8,10Z" />
            </symbol>
            <symbol id="i__stats" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2s-2 .9-2 2v12c0 1.1.9 2 2 2zm-6 0c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2s-2 .9-2 2v4c0 1.1.9 2 2 2zm10-9v7c0 1.1.9 2 2 2s2-.9 2-2v-7c0-1.1-.9-2-2-2s-2 .9-2 2z" />
            </symbol>
            <symbol id="i__close" viewBox="0 0 24 24">
                <path fill="currentColor" d="M18.3 5.71c-.39-.39-1.02-.39-1.41 0L12 10.59 7.11 5.7c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L10.59 12 5.7 16.89c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L12 13.41l4.89 4.89c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z" />
            </symbol>
            <symbol id="i__order" viewBox="0 0 32 32">
                <path fill="#fede4a" d="M30,26h0a2,2,0,0,1,0-4,2,2,0,0,0,0-4H26a2,2,0,0,1,0-4h1a2,2,0,0,0,0-4H17a2,2,0,0,1,0-4h4a2,2,0,0,0,0-4H4A2,2,0,0,0,4,6H5a2,2,0,0,1,0,4H2a2,2,0,0,0,0,4H5a2,2,0,0,1,0,4,2,2,0,0,0,0,4H9a2,2,0,0,1,0,4H7a2,2,0,0,0,0,4H30a2,2,0,0,0,0-4Z" /><path fill="#4bca6f" d="M10,5H24a2,2,0,0,1,2,2V26a3,3,0,0,1-3,3H10a2,2,0,0,1-2-2V7A2,2,0,0,1,10,5Z" /><path fill="#fff" d="M16,18V15H13a1,1,0,0,1,0-2h3V10a1,1,0,0,1,2,0v3h3a1,1,0,0,1,0,2H18v3a1,1,0,0,1-2,0Z" /><path fill="#27987d" d="M20,26V24h0a2,2,0,0,0-2-2H4a2,2,0,0,0-2,2v2a3,3,0,0,0,3,3H23A3,3,0,0,1,20,26Z" />
            </symbol>
            <symbol id="i__android" viewBox="0 0 24 24">
                <path fill="currentColor" d="M7.2,16.8a.8.8,0,0,0,.8.8h.8v2.8a1.2,1.2,0,0,0,2.4,0V17.6h1.6v2.8a1.2,1.2,0,0,0,2.4,0h0V17.6H16a.8.8,0,0,0,.8-.8h0v-8H7.2Zm-2-8A1.2,1.2,0,0,0,4,10H4v5.6a1.2,1.2,0,0,0,2.4,0h0V10A1.2,1.2,0,0,0,5.2,8.8Zm13.6,0A1.2,1.2,0,0,0,17.6,10v5.6a1.2,1.2,0,0,0,2.4,0V10a1.2,1.2,0,0,0-1.2-1.2Zm-4-4.67,1-1a.41.41,0,0,0,0-.57h0a.39.39,0,0,0-.56,0h0L14.11,3.7A4.68,4.68,0,0,0,12,3.2a4.76,4.76,0,0,0-2.13.5L8.68,2.52a.4.4,0,0,0-.57,0h0a.41.41,0,0,0,0,.57h0l1.05,1A4.78,4.78,0,0,0,7.2,8h9.6A4.76,4.76,0,0,0,14.82,4.13ZM10.4,6.4H9.6V5.6h.8Zm4,0h-.8V5.6h.8Z" />
            </symbol>
            <symbol id="i__vers" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 2.02c-5.51 0-9.98 4.47-9.98 9.98s4.47 9.98 9.98 9.98 9.98-4.47 9.98-9.98S17.51 2.02 12 2.02zm-.52 15.86v-4.14H8.82c-.37 0-.62-.4-.44-.73l3.68-7.17c.23-.47.94-.3.94.23v4.19h2.54c.37 0 .61.39.45.72l-3.56 7.12c-.24.48-.95.31-.95-.22z" />
            </symbol>
            <symbol id="i__info" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 15c-.55 0-1-.45-1-1v-4c0-.55.45-1 1-1s1 .45 1 1v4c0 .55-.45 1-1 1zm1-8h-2V7h2v2z" />
            </symbol>
            <symbol id="i__arrowleft" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19 11H7.83l4.88-4.88c.39-.39.39-1.03 0-1.42-.39-.39-1.02-.39-1.41 0l-6.59 6.59c-.39.39-.39 1.02 0 1.41l6.59 6.59c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L7.83 13H19c.55 0 1-.45 1-1s-.45-1-1-1z" />
            </symbol>
            <symbol id="i__arrowright" viewBox="0 0 24 24">
                <path fill="currentColor" d="M5 13h11.17l-4.88 4.88c-.39.39-.39 1.03 0 1.42.39.39 1.02.39 1.41 0l6.59-6.59c.39-.39.39-1.02 0-1.41l-6.58-6.6c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L16.17 11H5c-.55 0-1 .45-1 1s.45 1 1 1z" />
            </symbol>
            <symbol id="i__keyright" viewBox="0 0 24 24">
                <path fill="currentColor" d="M9.29 15.88L13.17 12 9.29 8.12c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0l4.59 4.59c.39.39.39 1.02 0 1.41L10.7 17.3c-.39.39-1.02.39-1.41 0-.38-.39-.39-1.03 0-1.42z" />
            </symbol>
            <symbol id="i__getapp" viewBox="0 0 24 24">
                <path fill="currentColor" d="M16.59 9H15V4c0-.55-.45-1-1-1h-4c-.55 0-1 .45-1 1v5H7.41c-.89 0-1.34 1.08-.71 1.71l4.59 4.59c.39.39 1.02.39 1.41 0l4.59-4.59c.63-.63.19-1.71-.7-1.71zM5 19c0 .55.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1H6c-.55 0-1 .45-1 1z" />
            </symbol>
            <symbol id="i__scrollup" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8.06,11.71,12,7.83l3.88,3.88a1,1,0,1,0,1.52-1.3.57.57,0,0,0-.11-.11L12.65,5.71a1,1,0,0,0-1.41,0L6.65,10.3a1,1,0,0,0,1.41,1.41Zm9.18,5.17-4.59-4.59a1,1,0,0,0-1.41,0L6.65,16.88a1,1,0,0,0,1.41,1.41L12,14.41l3.88,3.88A1,1,0,1,0,17.35,17Z" />
            </symbol>
            <symbol id="i__reply" viewBox="0 0 24 24">
                <path fill="currentColor" d="M10 9V7.41c0-.89-1.08-1.34-1.71-.71L3.7 11.29c-.39.39-.39 1.02 0 1.41l4.59 4.59c.63.63 1.71.19 1.71-.7V14.9c5 0 8.5 1.6 11 5.1-1-5-4-10-11-11z" />
            </symbol>
            <symbol id="i__moon" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,2.73a.5.5,0,0,0-.26-.66.49.49,0,0,0-.24,0A10,10,0,1,0,20.2,17.71a.51.51,0,0,0-.11-.7.43.43,0,0,0-.22-.09A10,10,0,0,1,12,2.73Z" />
            </symbol>
            <symbol id="i__sun" viewBox="0 0 24 24">
                <path fill="currentColor" d="M6.06,4.64l-.39-.39a1,1,0,0,0-1.4,0h0a1,1,0,0,0,0,1.4l.38.39a1,1,0,0,0,1.41,0h0A1,1,0,0,0,6.06,4.64ZM3,11H2a1,1,0,0,0-1,1H1a1,1,0,0,0,1,1H3a1,1,0,0,0,1-1H4A1,1,0,0,0,3,11Zm9-9.95h0a1,1,0,0,0-1,1V3a1,1,0,0,0,1,1h0a1,1,0,0,0,1-1V2A1,1,0,0,0,12,1.05Zm7.74,3.21a1,1,0,0,0-1.41,0L18,4.64A1,1,0,0,0,18,6h0a1,1,0,0,0,1.4,0l.39-.39A1,1,0,0,0,19.76,4.26ZM18,19.36l.39.39a1,1,0,0,0,1.4,0,1,1,0,0,0,0-1.41L19.36,18A1,1,0,0,0,18,19.36ZM20,12h0a1,1,0,0,0,1,1h1a1,1,0,0,0,1-1h0a1,1,0,0,0-1-1H21A1,1,0,0,0,20,12ZM12,6a6,6,0,1,0,6,6A6,6,0,0,0,12,6Zm0,17h0a1,1,0,0,0,1-1V21a1,1,0,0,0-1-1h0a1,1,0,0,0-1,1v1A1,1,0,0,0,12,23ZM4.26,19.74a1,1,0,0,0,1.4,0l.39-.39a1,1,0,0,0,0-1.4H6a1,1,0,0,0-1.41,0l-.39.39A1,1,0,0,0,4.26,19.74Z" />
            </symbol>
            <symbol id="i__update" viewBox="0 0 24 24">
                <path fill="currentColor" d="M21,9.5V4.21a.49.49,0,0,0-.85-.35L18.37,5.64a9,9,0,1,0,2.56,7.48,1,1,0,0,0-1-1.12,1,1,0,0,0-1,.86,7,7,0,0,1-7,6.14A7.1,7.1,0,0,1,5,12.1a7,7,0,0,1,12-5L14.86,9.14a.5.5,0,0,0,.35.86H20.5A.5.5,0,0,0,21,9.5Z" />
            </symbol>
            <symbol id="i__cat" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8.28,11h7.43a1,1,0,0,0,.85-1.52L12.85,3.4a1,1,0,0,0-1.7,0L7.43,9.48A1,1,0,0,0,8.28,11Zm9.22,2A4.5,4.5,0,1,0,22,17.5,4.49,4.49,0,0,0,17.5,13Zm-7.5.5H4a1,1,0,0,0-1,1v6a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1v-6A1,1,0,0,0,10,13.5Z" />
            </symbol>
            <symbol id="i__play" viewBox="0 0 24 24">
                <path fill="currentColor" d="M10.8 15.9l4.67-3.5c.27-.2.27-.6 0-.8L10.8 8.1c-.33-.25-.8-.01-.8.4v7c0 .41.47.65.8.4zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
            </symbol>
            <symbol id="i__linkopen" viewBox="0 0 24 24">
                <path fill="currentColor" d="M9 6c0 .56.45 1 1 1h5.59L4.7 17.89c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0L17 8.41V14c0 .55.45 1 1 1s1-.45 1-1V6c0-.55-.45-1-1-1h-8c-.55 0-1 .45-1 1z" />
            </symbol>
            <symbol id="i__settings" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z" />
            </symbol>
            <symbol id="i__thumbup" viewBox="0 0 24 24">
                <path fill="currentColor" d="M13.12 2.06L7.58 7.6c-.37.37-.58.88-.58 1.41V19c0 1.1.9 2 2 2h9c.8 0 1.52-.48 1.84-1.21l3.26-7.61C23.94 10.2 22.49 8 20.34 8h-5.65l.95-4.58c.1-.5-.05-1.01-.41-1.37-.59-.58-1.53-.58-2.11.01zM3 21c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2s-2 .9-2 2v8c0 1.1.9 2 2 2z" />
            </symbol>
            <symbol id="i__thumbdown" viewBox="0 0 24 24">
                <path fill="currentColor" d="M10.88 21.94l5.53-5.54c.37-.37.58-.88.58-1.41V5c0-1.1-.9-2-2-2H6c-.8 0-1.52.48-1.83 1.21L.91 11.82C.06 13.8 1.51 16 3.66 16h5.65l-.95 4.58c-.1.5.05 1.01.41 1.37.59.58 1.53.58 2.11-.01zM21 3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2s2-.9 2-2V5c0-1.1-.9-2-2-2z" />
            </symbol>
            <symbol id="i__cam" viewBox="0 0 24 24">
                <path fill="currentColor" d="M13.81 2.86c.17-.3 0-.7-.35-.74-2.62-.37-5.3.28-7.44 1.86-.19.15-.25.43-.12.65l3.01 5.22c.19.33.67.33.87 0l4.03-6.99zm7.49 5.47c-.98-2.47-2.92-4.46-5.35-5.5-.23-.1-.5 0-.63.22l-3.01 5.21c-.19.32.05.74.44.74h8.08c.35 0 .6-.35.47-.67zm.07 1.67h-6.2c-.38 0-.63.42-.43.75L19 18.14c.17.3.6.35.82.08 1.74-2.18 2.48-5.03 2.05-7.79-.03-.25-.25-.43-.5-.43zM4.18 5.79c-1.73 2.19-2.48 5.02-2.05 7.79.03.24.25.42.5.42h6.2c.38 0 .63-.42.43-.75L5 5.87c-.18-.3-.61-.35-.82-.08zM2.7 15.67c.98 2.47 2.92 4.46 5.35 5.5.23.1.5 0 .63-.22l3.01-5.21c.19-.33-.05-.75-.43-.75H3.17c-.35.01-.6.36-.47.68zm7.83 6.22c2.62.37 5.3-.28 7.44-1.86.2-.15.26-.44.13-.66l-3.01-5.22c-.19-.33-.67-.33-.87 0l-4.04 6.99c-.17.3.01.7.35.75z" />
            </symbol>
            <symbol id="i__explore" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12 10.9c-.61 0-1.1.49-1.1 1.1s.49 1.1 1.1 1.1c.61 0 1.1-.49 1.1-1.1s-.49-1.1-1.1-1.1zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm2.19 12.19L6 18l3.81-8.19L18 6l-3.81 8.19z" />
            </symbol>
            <symbol id="i__shield" viewBox="0 0 24 24">
                <path fill="currentColor" d="M11.19 1.36l-7 3.11C3.47 4.79 3 5.51 3 6.3V11c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6.3c0-.79-.47-1.51-1.19-1.83l-7-3.11c-.51-.23-1.11-.23-1.62 0zm-1.9 14.93L6.7 13.7c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0L10 14.17l5.88-5.88c.39-.39 1.02-.39 1.41 0 .39.39.39 1.02 0 1.41l-6.59 6.59c-.38.39-1.02.39-1.41 0z" />
            </symbol>
            <symbol id="i__addcom" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,23h0L9,20H5a2,2,0,0,1-2-2V4A2,2,0,0,1,5,2H19a2,2,0,0,1,2,2V18a2,2,0,0,1-2,2H15ZM8,10a1,1,0,0,0,0,2h3v3a1,1,0,0,0,2,0V12h3a1,1,0,0,0,0-2H13V7a1,1,0,0,0-2,0v3Z" />
            </symbol>
            <symbol id="i__videoplay" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8 6.82v10.36c0 .79.87 1.27 1.54.84l8.14-5.18c.62-.39.62-1.29 0-1.69L9.54 5.98C8.87 5.55 8 6.03 8 6.82z" />
            </symbol>
            <symbol id="i__telegram" viewBox="0 0 40 40">
                <path fill="#c8daea" d="M14.87,32.83c-.91,0-.76-.34-1.07-1.2l-2.67-8.78L31.67,10.67Z" /><path fill="#a9c9dd" d="M14.87,32.83a1.77,1.77,0,0,0,1.4-.7L20,28.5l-4.66-2.8Z" /><path fill="#eff7fc" d="M15.34,25.7,26.63,34c1.28.71,2.21.35,2.53-1.2l4.6-21.64C34.23,9.31,33,8.45,31.81,9l-27,10.4C3,20.15,3,21.18,4.5,21.63l6.92,2.16,16-10.1c.75-.46,1.45-.22.88.29Z" />
            </symbol>
            <symbol id="i__hot" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19.48,12.35c-1.57-4.08-7.16-4.3-5.81-10.23c0.1-0.44-0.37-0.78-0.75-0.55C9.29,3.71,6.68,8,8.87,13.62 c0.18,0.46-0.36,0.89-0.75,0.59c-1.81-1.37-2-3.34-1.84-4.75c0.06-0.52-0.62-0.77-0.91-0.34C4.69,10.16,4,11.84,4,14.37 c0.38,5.6,5.11,7.32,6.81,7.54c2.43,0.31,5.06-0.14,6.95-1.87C19.84,18.11,20.6,15.03,19.48,12.35z M10.2,17.38 c1.44-0.35,2.18-1.39,2.38-2.31c0.33-1.43-0.96-2.83-0.09-5.09c0.33,1.87,3.27,3.04,3.27,5.08C15.84,17.59,13.1,19.76,10.2,17.38z" />
            </symbol>
        </defs>
    </svg>
     <script src="<?php echo EX_THEMES_URI; ?>/assets/js/highslide.js" defer></script>
    <script>
        <!--
        jQuery(function($){hs.graphicsDir='<?php echo EX_THEMES_URI; ?>/assets/highslide/graphics/';hs.wrapperClassName='rounded-white';hs.outlineType='rounded-white';hs.numberOfImagesToPreload=0;hs.captionEval='this.thumb.alt';hs.showCredits=false;hs.align='center';hs.transitions=['expand','crossfade'];hs.dimmingOpacity=0.60;hs.lang={loadingText:'Loading...',playTitle:'Watch slideshow (space) ',pauseTitle:'Pause',previousTitle:'Previous image',nextTitle:'Next Image',moveTitle:'Move',closeTitle:'Close (Esc)',fullExpandTitle:'Enlarge to full size',restoreTitle:'Click to close image. Click and hold to move.',focusTitle:'Focus',loadingTitle:'Click to cancel'};hs.slideshowGroup='fullnews';hs.addSlideshow({slideshowGroup:'fullnews',interval:4000,repeat:false,useControls:true,fixedControls:'fit',overlayOptions:{opacity:.75,position:'bottom center',hideOnMouseOut:true}});});
        //-->
    </script>
 <?php }  
add_shortcode('ex_themes_background_st_2_', 'ex_themes_background_st_2_');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_login_form_() { ?>
    <?php 
    $linkXhost          = get_bloginfo('url'); 
    $parse              = parse_url($linkXhost); 
    $watermark1         = $parse['host'];
    ?>
    </div>
    <div class="modal fade login_modal" id="login" tabindex="-1" role="dialog" aria-labelledby="login_dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="24" height="24"><use xlink:href="#i__close"></use></svg>
                    </button>
                    <h3 class="modal-title" ><?php global $opt_themes; if($opt_themes['exthemes_Login_to']) { ?><?php echo $opt_themes['exthemes_Login_to']; ?><?php } ?> <?php echo $watermark1; ?></h3>
                        <?php
                        if ( shortcode_exists( 'apsl-login' ) ): ?>
                            <?php echo do_shortcode( '[apsl-login]' ); ?>
                        <?php else: ?>
                        <?php endif;?>
                </div>
                <div class="modal-body">
                    <form name="loginform" id="loginform"  class="login_form" method="post" action="<?php echo site_url( '/wp-login.php' ); ?>">
                        <label class="form-group">
                            <span class="c-muted"><?php global $opt_themes; if($opt_themes['exthemes_Logins']) { ?><?php echo $opt_themes['exthemes_Logins']; ?><?php } ?></span>
                            <input class="form-control" type="text" name="log" id="user_login" required>
                        </label>
                        <label class="form-group">
                            <a class="f-right" href="<?php echo wp_lostpassword_url( ); ?>"><?php global $opt_themes; if($opt_themes['exthemes_Forgot_your_password']) { ?><?php echo $opt_themes['exthemes_Forgot_your_password']; ?><?php } ?></a>
                            <span class="c-muted"><?php global $opt_themes; if($opt_themes['exthemes_Password']) { ?><?php echo $opt_themes['exthemes_Password']; ?><?php } ?></span>
                            <input class="form-control" type="password" name="pwd" id="user_pass" required>
                        </label>
                        <input name="login" type="hidden" name="wp-submit" id="wp-submit" value="submit">
                        <div class="form-submit btn-group">
                            <button class="btn btn-block s-green" onclick="submit();" name="wp-submit" id="wp-submit" type="submit"><?php global $opt_themes; if($opt_themes['exthemes_Logins']) { ?><?php echo $opt_themes['exthemes_Logins']; ?><?php } ?></button>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>register/" class="btn btn-block s-yellow"><?php global $opt_themes; if($opt_themes['exthemes_Registration']) { ?><?php echo $opt_themes['exthemes_Registration']; ?><?php } ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }
add_shortcode('ex_themes_login_form_', 'ex_themes_login_form_');
add_filter( 'login_redirect', 'noindex_nofollow_page_login', 10, 3 );
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function maintenances_notices() {
global $opt_themes;
$maintenances_on					= $opt_themes['maintenances'];
$maintenances_code					= $opt_themes['maintenances_code'];
if ($maintenances_on) {
?>

<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
  
<style>
<!-- :root{--background: rgba(255,255,255, 0.9);--background_versi: firebrick;--background_developers: black;--box_shadow: rgba(0,0,0,.28);}--> div.fix-notif a{text-transform:capitalize;color:currentColor}div.fix-notif a:hover,a.close-fixed:hover{color:var(--color_button)}.fix-notif{background:var(--background);position:fixed;bottom:90px;right:35px;z-index:99;border-radius:7px;padding:15px;box-shadow:0 1px 6px var(--box_shadow);font-size:14px;font-weight:bold;animation-name:fromleft;animation-duration:4s}.fix-notif b{background:var(--background_versi);font-size:13px;padding:5px 8px;border-radius:5px;color:#fff;margin-right:5px}.fix-notif.developers{bottom:35px;animation-duration:6s}.fix-notif.developers b{background:var(--background_developers)}.close-fixed{position:fixed;z-index:99;background:var(--background);padding:3px 7px;border-radius:100%;box-shadow:0 1px 6px rgba(32,33,36,.28);right:5px;bottom:75px;animation-name:closeleft;animation-duration:5s}.fix-notif.hidden,.close-fixed.hidden{display:none}@keyframes fromleft{0%{right:-300px}100%{right:35px}}@keyframes closeleft{0%{right:-300px}100%{right:5px}}
</style>

<div class='fix-notif'>
  <?php echo $maintenances_code; ?>
</div>
<div class='fix-notif developers'>
  <a href='<?php echo EXTHEMES_API_URL; ?>' title='<?php echo DEVS; ?>' target='_blank'><b><?php echo DEVS; ?></b> Themes Premium Wordpress </a>
</div>
<a class='close-fixed' href='javascript:void' aria-label="close"><i class='fa fa-close'></i></a>
  
<script id="rendered-js" >
$(document).ready(function () {$(".close-fixed").click(function () {$(".fix-notif,.close-fixed").toggleClass("hidden");});});
</script>

<?php }
}
add_shortcode('maintenances_notices', 'maintenances_notices');