<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 
ini_set('display_errors', 'off'); 
global $opt_themes, $wpdb, $post, $wp_query; 

function mask_link( $string, $action = 'e' ){
$secret_key						= THEMES_NAMES;
$secret_iv						= EXTHEMES_AUTHOR;
$output							= false;
$encrypt_method					= "AES-256-CBC";
$key							= hash( 'sha256', $secret_key );
$iv								= substr( hash( 'sha256', $secret_iv ), 0, 16 );
if( $action == 'e' ){
	$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
} else if( $action == 'd' ){
	$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
}
return $output;
}
 
$REQUEST_URI					= $_SERVER['REQUEST_URI'];
$linkX							= get_bloginfo('url'); 
$parse							= parse_url($linkX); 
$watermark1						= $parse['host'];
$sizes							= get_post_meta( $post->ID, 'wp_sizes', true );
$sizesX1						= get_post_meta( $post->ID, 'wp_sizes_GP', true );
$sizesX							= 'Loading...';
if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizesX;
$url1							= get_post_meta( $post->ID, 'wp_downloadlink', true ) ;
$postid							= $wp_query->post->ID;
$dt_player						= get_post_meta($postid, 'repeatable_fields', true);
$updates						= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX1						= get_post_meta( $post->ID, 'wp_updates_GP', true );
$updatesX						= '-';
if ( $updates === FALSE or $updates == '' ) $updates = $updatesX;
$titleGPs						= get_post_meta( $post->ID, 'wp_title_GP', true );
$titleGPsX1						= get_post_meta( $post->ID, 'wp_title_GP', true );
$titleGPsX						= '-';
if ( $titleGPs === FALSE or $titleGPs == '' ) $titleGPs = $titleGPsX;
$idtitleGPs						= get_post_meta( $post->ID, 'wp_GP_ID', true );
$idtitleGPsX1					= get_post_meta( $post->ID, 'wp_GP_ID', true );
$idtitleGPsX					= '-';
if ( $idtitleGPs === FALSE or $idtitleGPs == '' ) $idtitleGPs = $idtitleGPsX;

$image_id						= get_post_thumbnail_id(); 
$full							= 'full';
$icons							= '64';
$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
$image_url_default				= $image_url[0];
$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
if ( $thumbnails === FALSE or $thumbnails == '' ) $thumbnails = $image_url_default;

$version						= get_post_meta( $post->ID, 'wp_version_GP', true );
$versionX1						= get_post_meta( $post->ID, 'wp_version_GP', true );
$versionX						= '-';
if ( $version === FALSE or $version == '' ) $version = $versionX;
$requires						= get_post_meta( $post->ID, 'wp_requires_GP', true );
$requiresX1						= get_post_meta( $post->ID, 'wp_requires_GP', true );
$requiresX						= '-';
if ( $requires === FALSE or $requires == '' ) $requires = $requiresX;
$requires						= get_post_meta($post->ID, "wp_requires_GP", true);
$requiresX						= str_replace('and up', '', $requires);
$file_path						= $_GET['urls'];
$file_name						= $_GET['names'];
$host							= $_SERVER['HTTP_HOST'];
$permalink						= get_the_permalink();
$urls							= $_GET['urls'];  
$urlsx							= str_replace($permalink.'/file/?urls=', '', $urls);
$namesapks						= $_GET['names'];
$sizeapks						= $_GET['sizes'];
$urlapks						= $_GET['url'];
$link_decode					= mask_link($file_path); 
$link_encode					= mask_link($file_path, 'd');
$names							= $_GET['names'];
$size							= $_GET['sizes'];
$url							= $_GET['urls'];
$wp_mods						= get_post_meta( $post->ID, 'wp_mods1', true );
$wp_mods1						= get_post_meta( $post->ID, 'wp_mods', true );
if ( $wp_mods === FALSE or $wp_mods == '' ) $wp_mods = $wp_mods1;
$image_id_alt					= get_post_thumbnail_id($post->ID); 
$image_idx						= get_post_thumbnail_id(); 
$fullx							= 'thumbnails-homes'; 
$fullx_alt						= 'thumbnails-homes-alt'; 
$image_urlx						= wp_get_attachment_image_src($image_idx, $fullx, true); 
$imagesx						= $image_urlx[0]; 
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" <?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?> dir="rtl" lang="<?php echo $opt_themes['Languange_rtl']; ?>"<?php } else{ ?><?php language_attributes(); ?><?php } ?>  id="h" class="load">
<head>
<meta charset="utf-8">
<title><?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?><?php echo $opt_themes['exthemes_apk_info_Download']; ?><?php } ?> <?php if ($namesapks) { ?><?php echo trim(strip_tags($namesapks)); ?><?php } else { ?><?php echo ucwords($title_gp); ?><?php } ?></title>
<meta name="robots" content="noindex, nofollow">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
<!-- Chrome, Firefox OS and Opera -->
<meta content='<?php global $opt_themes;echo $opt_themes['color_link'];?>' name='theme-color'/>
<!-- Windows Phone -->
<meta content='<?php global $opt_themes;echo $opt_themes['color_link'];?>' name='msapplication-navbutton-color'/>
<meta content='<?php global $opt_themes;echo $opt_themes['color_link'];?>' name='apple-mobile-web-app-status-bar-style' />
<link rel="shortcut icon" href="<?php global $opt_themes; if($opt_themes['aktif_favicon']) { ?><?php echo $opt_themes['favicon']['url']; ?><?php } else { ?><?php echo EX_THEMES_URI; ?>/assets/img/logo_footer.png<?php } ?>" type="image/x-icon" />
<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/fonts/manrope-v3-cyrillic-700.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/fonts/manrope-v3-cyrillic-regular.woff2" as="font" type="font/woff2" crossorigin>

<?php get_template_part( '/assets/css/root.styles' ); ?>
<?php get_template_part( '/assets/css/custom.styles' ); ?>

<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/css/cdn.styles.css" as="style">
 
<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
<style>.page-cdn-back > a > .c-icon { margin-left: 1rem!important;} </style>
<?php } ?>

<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/css/cores.styles.css" as="style">
<link href="<?php echo EX_THEMES_URI; ?>/assets/css/cores.styles.css" type="text/css" rel="stylesheet">
<link href="<?php echo EX_THEMES_URI; ?>/assets/css/cdn.styles.css?v=1.17" type="text/css" rel="stylesheet">
<?php 
wp_head();
?>
</head>
<body>
<div class="page-cdn">
<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
 <div class="page-cdn-back"><a href="<?php the_permalink() ?>"><?php global $opt_themes; if($opt_themes['exthemes_content_Back_main']) { ?><?php echo $opt_themes['exthemes_content_Back_main']; ?><?php } ?><i class="s-button c-icon"><svg width="24" height="24" style="stroke: currentColor!important;fill:currentColor!important;"><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
<use xlink:href="#i__arrowright"></use>
<?php } else { ?>
<use xlink:href="#i__arrowleft"></use>
<?php } ?></svg></i></a></div>
<?php } else { ?>
<div class="page-cdn-back"><a href="<?php the_permalink() ?>"><i class="s-button c-icon"><svg width="24" height="24"  style="stroke: currentColor!important;fill:currentColor!important;"><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
<use xlink:href="#i__arrowright"></use>
<?php } else { ?>
<use xlink:href="#i__arrowleft"></use>
<?php } ?></svg></i><?php global $opt_themes; if($opt_themes['exthemes_content_Back_main']) { ?><?php echo $opt_themes['exthemes_content_Back_main']; ?><?php } ?></a></div>
<?php } ?>
    <div class="page-cdn-cont">
        <header class="page-cdn-head">
            <a class="logotype" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_option("blogname") ?>"><?php ex_themes_logo_headers_(); ?></a>
        </header>
        <div id='dle-content'>
            <div class="download-cdn">
                <ul class="download-cdn-main">
                    <li class="cdn-meta"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><span class="ww-break-word"><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
					<?php if ($requiresX) { ?><?php echo RTL_Nums($requiresX); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?>
					<?php } else { ?>
					<?php if ($requiresX) { ?><?php echo $requiresX; ?><?php } else { ?>4.5<?php } ?>
					<?php } ?></span></li>
                    <li class="cdn-img">
					<i class="img">
							<img src="<?php echo $imagesx; ?>" alt="<?php the_title(); ?>" >
					</i>
					</li>
                    <li class="cdn-meta"><svg width="24" height="24"><use xlink:href="#i__vers"></use></svg><span class="ww-break-word"><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
					<?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?>
					<?php } else { ?>
					<?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?>
					<?php } ?></span></li>
                </ul>
                <h1 class="title ww-break-word"><i style="display: none;"><?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?><?php echo $opt_themes['exthemes_apk_info_Download']; ?><?php } ?></i> <?php if ($namesapks) { ?><?php echo trim(strip_tags($namesapks)); ?><?php } else { ?><?php echo ucwords($title_gp); ?><?php } ?> </h1>
				<?php if ($wp_mods) { ?><div class="md5" >Mod <?php echo trim(strip_tags($wp_mods)); ?></div><?php } ?> 
				<div class="md5" >SHA-1: <?php echo substr(sha1(time()), 0, 40); ?></div>
                <div class="md5" ><?php ex_themes_adv_download_page_(); ?></div>
                <div class="counter">
                    <div class="number-wrapper" id="load"></div>
                    <span id="countdown" class="number"><?php global $opt_themes; if($opt_themes['timer_active_']) { ?> <?php echo $opt_themes['timer_fake_download']; ?><?php } else { ?>3<?php } ?></span>
                </div>
                <div class="download-btn-group" style="display:none;">
                    <div class="download-btn"  style="display:inline-flex;max-width:none !important;">
					<a id="no-link" href="<?php if($link_encode) { echo $link_encode; } else { echo $urlsx; } ?>"><input type="button" value="<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?><?php echo $opt_themes['exthemes_apk_info_Download']; ?><?php } ?>" class="btn s-button btn-lg btn-block"><svg style="display:none;" width="24" height="24"><use xlink:href="#i__getapp"></use></svg></a>
					</div>                    
                </div>
				<div class="md5" ><?php ex_themes_adv_download_page_2(); ?></div>
					<?php get_template_part('template/telegram'); ?>
            </div>
        </div>
    </div>
</div>
<div class="background">
    <i class="bg-circle-green"></i>
    <i class="bg-clouds" style="display:none;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2550 700" width="2550" height="700"><path fill="var(--header-bg)" d="M554,100h-4A50,50,0,0,1,550,0h4a50,50,0,0,1,0,100Zm25,600H50a50,50,0,0,1,0-100h78.08a50,50,0,1,0,.11-100H98a50,50,0,0,1,0-100H238a50,50,0,0,0,0-100H194a50,50,0,0,1,0-100h56a50,50,0,0,0,.3-100H238A50,50,0,0,1,238,0H430a50,50,0,0,1,0,100H413.55a50,50,0,1,0,.05,100H630a50,50,0,0,1,0,100H521.55a50,50,0,1,0,0,100H526a50,50,0,0,1,0,100H445.55a50,50,0,0,0,.08,100H579a50,50,0,0,1,0,100Z" /><path fill="var(--header-bg)" d="M2073,700a50,50,0,0,1,0-100h16.43a50,50,0,0,0,0-100H1901a50,50,0,0,1,0-100h216.42a50,50,0,0,0,0-100H2097a50,50,0,0,1-50-50h0a50,50,0,0,1,50-50h252a50,50,0,0,1,0,100h-28a50,50,0,0,0,0,100h24a50,50,0,0,1,0,100h-24a50,50,0,0,0,0,100h179a50,50,0,0,1,0,100Z" /></svg></i>
</div>
<svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>
        <symbol id="i__android" viewBox="0 0 24 24">
            <path fill="var(--form-control-bg)" d="M7.2,16.8a.8.8,0,0,0,.8.8h.8v2.8a1.2,1.2,0,0,0,2.4,0V17.6h1.6v2.8a1.2,1.2,0,0,0,2.4,0h0V17.6H16a.8.8,0,0,0,.8-.8h0v-8H7.2Zm-2-8A1.2,1.2,0,0,0,4,10H4v5.6a1.2,1.2,0,0,0,2.4,0h0V10A1.2,1.2,0,0,0,5.2,8.8Zm13.6,0A1.2,1.2,0,0,0,17.6,10v5.6a1.2,1.2,0,0,0,2.4,0V10a1.2,1.2,0,0,0-1.2-1.2Zm-4-4.67,1-1a.41.41,0,0,0,0-.57h0a.39.39,0,0,0-.56,0h0L14.11,3.7A4.68,4.68,0,0,0,12,3.2a4.76,4.76,0,0,0-2.13.5L8.68,2.52a.4.4,0,0,0-.57,0h0a.41.41,0,0,0,0,.57h0l1.05,1A4.78,4.78,0,0,0,7.2,8h9.6A4.76,4.76,0,0,0,14.82,4.13ZM10.4,6.4H9.6V5.6h.8Zm4,0h-.8V5.6h.8Z" />
        </symbol>
        <symbol id="i__vers" viewBox="0 0 24 24">
            <path fill="var(--form-control-bg)" d="M12 2.02c-5.51 0-9.98 4.47-9.98 9.98s4.47 9.98 9.98 9.98 9.98-4.47 9.98-9.98S17.51 2.02 12 2.02zm-.52 15.86v-4.14H8.82c-.37 0-.62-.4-.44-.73l3.68-7.17c.23-.47.94-.3.94.23v4.19h2.54c.37 0 .61.39.45.72l-3.56 7.12c-.24.48-.95.31-.95-.22z" />
        </symbol>
        <symbol id="i__info" viewBox="0 0 24 24">
            <path fill="var(--colorsvg)" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 15c-.55 0-1-.45-1-1v-4c0-.55.45-1 1-1s1 .45 1 1v4c0 .55-.45 1-1 1zm1-8h-2V7h2v2z" />
        </symbol>
        <symbol id="i__arrowleft" viewBox="0 0 24 24">
            <path fill="var(--form-control-bg)" d="M19 11H7.83l4.88-4.88c.39-.39.39-1.03 0-1.42-.39-.39-1.02-.39-1.41 0l-6.59 6.59c-.39.39-.39 1.02 0 1.41l6.59 6.59c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L7.83 13H19c.55 0 1-.45 1-1s-.45-1-1-1z" />
        </symbol>
        <symbol id="i__arrowright" viewBox="0 0 24 24">
            <path fill="var(--form-control-bg)" d="M5 13h11.17l-4.88 4.88c-.39.39-.39 1.03 0 1.42.39.39 1.02.39 1.41 0l6.59-6.59c.39-.39.39-1.02 0-1.41l-6.58-6.6c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L16.17 11H5c-.55 0-1 .45-1 1s.45 1 1 1z" />
        </symbol>
        <symbol id="i__keyright" viewBox="0 0 24 24">
            <path fill="var(--form-control-bg)" d="M9.29 15.88L13.17 12 9.29 8.12c-.39-.39-.39-1.02 0-1.41.39-.39 1.02-.39 1.41 0l4.59 4.59c.39.39.39 1.02 0 1.41L10.7 17.3c-.39.39-1.02.39-1.41 0-.38-.39-.39-1.03 0-1.42z" />
        </symbol>
        <symbol id="i__getapp" viewBox="0 0 24 24">
            <path fill="#fff" d="M16.59 9H15V4c0-.55-.45-1-1-1h-4c-.55 0-1 .45-1 1v5H7.41c-.89 0-1.34 1.08-.71 1.71l4.59 4.59c.39.39 1.02.39 1.41 0l4.59-4.59c.63-.63.19-1.71-.7-1.71zM5 19c0 .55.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1H6c-.55 0-1 .45-1 1z" />
        </symbol>
        <symbol id="i__telegram" viewBox="0 0 40 40">
            <path fill="var(--colorsvg)" d="M14.87,32.83c-.91,0-.76-.34-1.07-1.2l-2.67-8.78L31.67,10.67Z" /><path fill="var(--colorsvg)" d="M14.87,32.83a1.77,1.77,0,0,0,1.4-.7L20,28.5l-4.66-2.8Z" /><path fill="var(--colorsvg)" d="M15.34,25.7,26.63,34c1.28.71,2.21.35,2.53-1.2l4.6-21.64C34.23,9.31,33,8.45,31.81,9l-27,10.4C3,20.15,3,21.18,4.5,21.63l6.92,2.16,16-10.1c.75-.46,1.45-.22.88.29Z" />
        </symbol>
        <symbol id="i__hot" viewBox="0 0 24 24">
            <path fill="var(--colorsvg)" d="M19.48,12.35c-1.57-4.08-7.16-4.3-5.81-10.23c0.1-0.44-0.37-0.78-0.75-0.55C9.29,3.71,6.68,8,8.87,13.62 c0.18,0.46-0.36,0.89-0.75,0.59c-1.81-1.37-2-3.34-1.84-4.75c0.06-0.52-0.62-0.77-0.91-0.34C4.69,10.16,4,11.84,4,14.37 c0.38,5.6,5.11,7.32,6.81,7.54c2.43,0.31,5.06-0.14,6.95-1.87C19.84,18.11,20.6,15.03,19.48,12.35z M10.2,17.38 c1.44-0.35,2.18-1.39,2.38-2.31c0.33-1.43-0.96-2.83-0.09-5.09c0.33,1.87,3.27,3.04,3.27,5.08C15.84,17.59,13.1,19.76,10.2,17.38z" />
        </symbol>
    </defs>
</svg>
<script>
    var timeleft = <?php global $opt_themes; if($opt_themes['timer_active_']) { ?> <?php echo $opt_themes['timer_fake_download']; ?><?php } else { ?>3<?php } ?>;
    var downloadTimer = setInterval(function(){
        document.getElementById("countdown").innerHTML = timeleft ;
        timeleft -= 1;
        if(timeleft < 0){
            clearInterval(downloadTimer);
            document.querySelector(".counter").setAttribute("style", "display:none;");
            document.querySelector(".download-btn-group").setAttribute("style", "display:inline-flex;");
        }
    }, 1000);
</script>
<?php global $opt_themes; if($opt_themes['ex_themes_nolink_activate_']) { ?>
<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' id='jquery-core-js'></script>
<script>
$(document).ready(function () {
	setTimeout(function () {               
		$('a[href]#no-link').each(function () {
			var href = this.href;    
			$(this).removeAttr('href').css('cursor', 'pointer').click(function () {
			if (href.toLowerCase().indexOf("#") >= 0) {    
			} else { //window.open(href, '_blank');
			window.location.href = href; 
			}
			});
		});    
	}, 500);
});
</script>
<?php } ?>

<?php 
wp_footer(); 
?>

</body>
</html>