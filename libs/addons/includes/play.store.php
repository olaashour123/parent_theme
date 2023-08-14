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
/*  Twitter : https://twitter.com/bangreyblog
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 
ini_set('display_errors', 'off');
global $opt_themes;  
$language						= $opt_themes['ex_themes_extractor_apk_language_']; 
$arr['languages']				= $language;
$linkX							= get_bloginfo('url'); 
$parse							= parse_url($linkX); 
$hostname						= $parse['host'];
$gp								= "https://play.google.com/store/apps/details?id=".$titleId."&hl=".$language;
$gp_en_usa						= "https://play.google.com/store/apps/details?id=".$titleId."&hl=en-US";
$gp_lang						= "https://play.google.com/store/apps/details?id=".$titleId."&hl=id";
$gpindox						= "https://play.google.com/store/apps/details?id=".$titleId."&hl=id";
$apk_infox						= "https://apku.us/apk/?id=".$titleId."&hl=".$language;
$gp_languages					= $this->geturl("${gp}");
$gpindo							= $this->geturl("${gpindox}");
$gp1							= $this->geturl("${gp}");
$gp_en_us						= $this->geturl("${gp_en_usa}");
$apk_infos						= $this->geturl("${apk_infox}");


	

##### ID #####
$arr['GP_ID']					= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp1, 1);
$arr['GP_ID_2']					= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp1, 1);
if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_ID_2'];
$arr['title_id']				= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp1, 1);
$arr['GP_ID99']					= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp1, 1);
$titleIdX1						= $arr['title_id'];
$id_apkfab						= $arr['title_id'];
$arr['title_id_ps']				= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp_en_us, 1);
$arr['title_id_ps']				= str_replace('.', '-',  $arr['title_id_ps']);
$id_package_alt					= $arr['title_id_ps'];
$arr['ID_GPS_ORI']				= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $gp_en_us, 1);

/* if(empty($arr['GP_ID']) || !preg_match("/(.*?)/i", $arr['GP_ID'])) {
$arr['error']				= NO_ID;
echo $arr['error'];
}
 */

$apkgk_url						= "https://apkgk.com/".$titleIdX1;
$apkgk_url_alt					= "https://apkgk.com/".$titleIdX1;
$apkshub_url					= "https://www.apkshub.com/app/".$titleIdX1;
$apksos_url						= "https://apksos.com/app/".$titleIdX1;
$galaxystore_url				= "https://galaxystore.samsung.com/detail/".$titleIdX1;
$apkfind_url					= ""; 
$apkpure_url					= ""; 
$apkcombo_url					= ""; 
$apkpremier_url					= "https://apkpremier.com/details/".$arr['title_id_ps']; 
$apkpremier_url_size			= "https://apkpremier.com/download/".$arr['title_id_ps']; 
$apksum_url						= "https://www.apksum.com/app/".$titleIdX1; 
$apkga_url						= "https://apkga.com/".$titleIdX1; 
$apktoy_url						= "https://www.apktoy.com/genericApp/".$titleIdX1; 
$apkgp_url						= "https://apkgp.com/".$titleIdX1; 
$apkdl_url						= "https://apkdl.demos.web.id/".$titleIdX1;
$apkfab_url_dw					= "https://apk.demos.web.id/apkfind.php?id=".$titleId;
$apkfab_url						= "https://apk.demos.web.id/details.php?id=".$titleId;
$apkfab_alt_url					= "https://apk.demos.web.id/infos.php?id=".$titleId;
$apkpures_url					= "https://apk.demos.web.id/details.php?id=".$titleIdX1;
$apkdlin_url					= "https://apkdl.in/app/details?id=".$titleIdX1;
$apksupport_url					= "https://apk.support/app/".$titleIdX1;
$apksupport_dw_url				= "https://apk.support/download-app/".$titleIdX1;
$apkfabs_url					= "https://apkfab.com/genericApp/".$titleId;
$apkgk							= $this->geturl("${apkgk_url}");
$apkgk_alt						= $this->geturl("${apkgk_url_alt}");
$apkshub						= $this->geturl("${apkshub_url}");
$apksos							= $this->geturl("${apksos_url}");
$galaxystore					= $this->geturl("${galaxystore_url}");
$apksum							= $this->geturl("${apksum_url}");
$apkfind						= $this->geturl("${apkfind_url}");
$apkpure						= $this->geturl("${apkpure_url}");
$apkcombo						= $this->geturl("${apkcombo_url}");
$apkpremier						= $this->geturl("${apkpremier_url}");
$apkpremier_alt					= $this->geturl("${apkpremier_url_size}");
$apkdl							= $this->geturl("${apkdl_url}");
$apkfab							= $this->geturl("${apkfab_url}");
$apkfab_alt						= $this->geturl("${apkfab_alt_url}");
$apkfab_dw						= $this->geturl("${apkfab_url_dw}");
$apk_details					= $this->geturl("${apkpures_url}");
$apkdlin						= $this->geturl("${apkdlin_url}");
$apksupport						= $this->geturl("${apksupport_url}");
$apksupport_dl					= $this->geturl("${apksupport_dw_url}");
$apkga							= $this->geturl("${apkga_url}");
$apktoy							= $this->geturl("${apktoy_url}");
$apkgp							= $this->geturl("${apkgp_url}");
$apkfabs						= $this->geturl("${apkfabs_url}");

#####   #####
$arr['title_apktoy']			= $this->match('/<title>(.*?)<\/title>/msi', $apktoy, 1);
$arr['version_apktoy']			= $this->match('/<div>.*?<label>Latest version<\/label>.*?<span>(.*?)<\/span><\/div>/msi', $apktoy, 1);
$arr['size_apktoy']				= $this->match('/<div>.*?<label>Size<\/label>.*?<span>(.*?)<\/span>.*?<\/div>/msi', $apktoy, 1);
$arr['title_apkga']				= $this->match('/<title>(.*?)<\/title>/msi', $apkga, 1);
$arr['version_apkga']			= $this->match('/<li class="version">.*?<div class="pro-label"><label>Version :<\/label><\/div>.*?<div class="pro-item"><span>(.*?)<\/span><\/div>.*?<\/li>/msi', $apkga, 1);
$arr['required_apkga']			= $this->match('/<li class="Requirements">.*?<div class="pro-label"><label>Requirements :<\/label><\/div>.*?<div class="pro-item">.*?\ (.*?)\+.*?<\/div>.*?<\/li>/msi', $apkga, 1);
$arr['title_apkgp']				= $this->match('/<title>(.*?)<\/title>/msi', $apkgp, 1);
$arr['version_apkgp']			= $this->match('/<li class="version">.*?<div class="pro-label"><label>Version :<\/label><\/div>.*?<div class="pro-item"><span>(.*?)<\/span><\/div>.*?<\/li>/msi', $apkgp, 1); 
$arr['required_apkgp']			= $this->match('/<li class="Requirements">.*?<div class="pro-label"><label>Requirements :<\/label><\/div>.*?<div class="pro-item">.*?\ (.*?)\+.*?<\/div>.*?<\/li>/msi', $apkgp, 1);
if ( $arr['version_apkgp'] === FALSE or $arr['version_apkgp'] == '' ) $arr['version_apkgp'] = $arr['version_GP_apkfab'];
//require_once 'download.php';
require_once 'images.php';

##### Download #####
$arr['download_link_pages_alt']		= $apkfab_url_dw;
$arr['download_link_pages_alt_2']	= $apksupport_dw_url;
$arr['link_download_apkfab']		= $this->match_all('/<a href="(.*?)" class="mdl-button.*?<\/a>/ms', $this->match('/<div class="container-content">(.*?)<footer/ms', $apkfab_dw, 1), 1);
$arr['link_download_apkfab']		= str_replace('apk-dl.com', $hostname, $arr['link_download_apkfab']);	
$arr['name_download_apkfab']		= $this->match_all('/<td>File Name: <\/td><td>(.*?)<\/td>/ms', $this->match('/<table class="mdl-data-table mdl-js-data-table.*?>(.*?)<\/table/ms', $apkfab_dw, 1), 1);
$arr['name_download_apkfab']		= str_replace('apk-dl.com', '_'.$hostname.'', $arr['name_download_apkfab']);	 
$arr['size_download_apkfab']		= $this->match_all('/<td>File Size: <\/td><td>(.*?)<\/td>/ms', $this->match('/<table class="mdl-data-table mdl-js-data-table.*?>(.*?)<\/table/ms', $apkfab_dw, 1), 1);
$arr['type_download_apkfab']		= '';
$arr['link_download_apksupport']	= $arr['link_download_apkfab'];
$arr['name_download_apksupport']	= $arr['name_download_apkfab'];
$arr['size_download_apksupport']	= $arr['size_download_apkfab'];
$arr['type_download_apksupport']	= $arr['type_download_apkfab'];
 /* 
$arr['downloadlinks_ori']			= $arr['link_download_apkfab'];	
$arr['name_downloadlinks_ori']		= $arr['name_download_apkfab'];
$arr['size_downloadlinks_orig']		= $arr['size_download_apkfab'];	
*/
$arr['link_download_apksupport_']	= $this->match_all('/<a.*?href="(.*?)".*?>/ms', $this->match('/<div id="atload">(.*?)<div class="down-wrap">/ms', $apksupport_dl, 1), 1);  
$arr['name_download_apksupport_']	= $this->match_all('/<span class="anameinfo">(.*?)<\/span>/ms', $this->match('/<div class="dinfo">(.*?)<div class="down-wrap">/ms', $apksupport_dl, 1), 1);  
$arr['size_download_apksupport_']	= $this->match_all('/<span class="dsizeinfo">(.*?)<\/span>/ms', $this->match('/<div class="dinfo">(.*?)<div class="down-wrap">/ms', $apksupport_dl, 1), 1); 
$arr['type_download_apksupport_']	= $this->match_all('/<span class="ftinfo.*?">(.*?)<\/span>/ms', $this->match('/<div class="dinfo">(.*?)<div class="down-wrap">/ms', $apksupport_dl, 1), 1);   

##### Title #####
$arr['title_GP']				= trim(strip_tags($this->match('/<h1.*?itemprop="name">(.*?)<\/h1>/msi', $gp1, 1)));
$arr['title_GP_alts_2']			= $this->match('/<h1.*?itemprop="name"><span.*?>(.*?)<\/span><\/h1>/msi', $gp1, 1);
$arr['title_GP_alt']			= $title_webs;
$arr['title2']					= $this->match('/<title id="main-title">(.*?)\- Apps.*?<\/title>/msi', $gp1, 1);
if ( $arr['title_GP'] === FALSE or $arr['title_GP'] == '' ) $arr['title_GP'] = $arr['title_GP_alts_2'] = $arr['title_GP_alts'] = $arr['title_GP_alt'];

##### Article #####
$arr['articlebody_GP']			= $this->match('/<div class="bARER".*?>(.*?)<\/div>.*?<div class="TKjAsc">/msi', $gp1, 1);
$arr['articlebody_GP']			= preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP']);
$arr['articlebody_GP']			= str_replace(array('<b>', '</b>', '<div>', '</div>'), '', $arr['articlebody_GP']);
$arr['articlebody_alt']			= $article_content;
if ( $arr['articlebody_GP'] === FALSE or $arr['articlebody_GP'] == '' ) $arr['articlebody_GP'] = $article_content;
$arr['articlebody_GP_language'] = $this->match('/<span jsslot.*?>.*?<div jsname="Igi1ac" style="display:none;">(.*?)<\/div>.*?<\/span>/msi', $gp1, 1);
$arr['articlebody_GP_language'] = preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP_language']);
if ($arr['articlebody_GP'] === FALSE or $arr['articlebody_GP'] == '') $arr['articlebody_GP'] = $arr['articlebody_GP_language'];

##### Desc #####
$arr['desck_GP']			= substr(trim(strip_tags($this->match('/<meta.*?itemprop="description".*?content="(.*?)">/msi', $gp1, 1))),0,160);

##### Version ##### 
$arr['version_GP']				= $this->match('/<td id="appversion">(.*?)<\/td>/msi', $apk_infos, 1);
$arr['version_GP_alt']			= $version_web;
 
##### Genre ##### apk_infos
$arr['genres_GP']				= $this->match('/<a id="category">(.*?)<\/a>/msi', $apk_infos, 1);
$arr['genres_GP_alts']			= trim(strip_tags($this->match('/<div class="T4LgNb ".*?>.*?<script.*?,"applicationCategory":"(.*?)",.*?<\/script>/msi', $gp1, 1)));
$arr['genres_GP_alts']			= str_replace( '_', ' ', $arr['genres_GP_alts'] );
$arr['genres_GP_alts']			= str_replace( 'GAME', '', $arr['genres_GP_alts'] );
$arr['genres_GP_alts']			= ucwords( strtolower( trim( $arr['genres_GP_alts'] ) ) ); 
 
##### Install #####
$arr['installs_GP']				= $this->match('/<td id="appinstalls">(.*?)<\/td>/msi', $apk_infos, 1);

##### Require #####
$arr['requires_GP']				= $this->match('/<td id="androidversion">(.*?)<\/td>/msi', $apk_infos, 1);

##### Rate & Rating #####
$arr['rated_GP']				= trim(strip_tags($this->match('/<div class="jILTFe">(.*?)<\/div>/msi', $gp1, 1)));
$arr['rated_GP']				= str_replace(',', '.', $arr['rated_GP']);

$arr['ratings_GP']			= trim(strip_tags($this->match('/<div class="T4LgNb ".*?>.*?<script.*?,"ratingCount":"(.*?)"},.*?<\/script>/msi', $gp1, 1))); 

##### Size Apk apkdlin #####
$arr['sizes_GP']				= $this->match('/<td id="appsize">(.*?)<\/td>/msi', $apk_infos, 1);
$arr['size_apkfab_']			= $this->match('/<div class="new_detail_down">.*?<div class="down_btn"><a.*?>.*?\-&nbsp;(.*?)\<\/a>.*?/msi', $apkfab_alt, 1);
if ($arr['sizes_GP'] === FALSE or $arr['sizes_GP'] == '') $arr['sizes_GP'] = $arr['size_apkfab_'];	 

##### Youtube Trailer #####
$arr['youtube_GP']				= $this->match('/<div class="PyyLUd"><video.*?poster=".*?\/vi\/(.*?)\/hqdefault.jpg".*?>.*?<\/button><\/div><\/div>/msi', $gp1, 1);

##### Whats News ##### 
$arr['whatnews_GP']				= $this->match('/<\/h2><\/div><\/div><\/header><div class="SfzRHd"><div itemprop="description">(.*?)<\/div>.*?<\/div>.*?<\/section>/msi', $gp1, 1);
if ($arr['whatnews_GP'] === FALSE or $arr['whatnews_GP'] == '') $arr['whatnews_GP'] = $arr['whatnews_GP_alt'];	 

##### Update Times #####
$arr['updates_GP']				= trim(strip_tags($this->match('/<div><div class="lXlx5">.*?<\/div><div class="xg1aie">(.*?)<\/div><\/div>/msi', $gp1, 1)));
$arr['updates_GP_alt']			= $this->match('/<div class="item publish-date">.*?<p>Update Date:<\/p>.*?<p itemprop="datePublished">(.*?)<\/p>/msi', $apkfab, 1);
if ( $arr['updates_GP'] === FALSE or $arr['updates_GP'] == '' ) $arr['updates_GP'] = $arr['updates_GP_alt'];

##### Poster Images #####

$sizes_						= '=s200-rw';
$arr['poster_GP_images']	= $this->match('/<meta property="og:image".*?content="(.*?)".*?>/msi', $gp1, 1);	
$arr['poster_GP_alts']		= $arr['poster_GP_images'].$sizes_;	 	
$arr['poster_GP']			= $arr['poster_GP_images'];	
$arr['poster_GP_alt_1'] 	= $this->match('/<meta name="twitter:image" content="(.*?)\=w.*?">/msi', $gp1, 1);
$arr['poster_GP_alt_2'] 	= $this->match('/<img.*?src="(.*?)\=.*?".*?itemprop="image".*?>/msi', $gp1, 1);
if ( $arr['poster_GP'] === FALSE or $arr['poster_GP'] == '' ) $arr['poster_GP'] = $arr['poster_GP_alt_1'] = $arr['poster_GP_alt_2'];

##### Developers #####
$arr['developers_GP']		= $this->match('/<div class="Vbfug auoIOc"><a.*?><span>(.*?)<\/span><\/a><\/div>/msi', $gp1, 1);

##### Gallery Images #####
$arr['images_GP']				= $this->match_all('/<img src="(.*?)".*?>/ms', $this->match('/<div.*?role="list">(.*?)<div jsaction.*?/ms', $gp1, 1), 1);
$arr['images_GP_alts']			= $this->match_all('/<img src="(.*?)".*?>/ms', $this->match('/<div.*?role="list">(.*?)<div jsaction.*?/ms', $gp1, 1), 1);

##### Backgrounds Images #####
$arr['backgrounds_GP']			= $this->match('/<img id="background" src="(.*?)".*?>/msi', $apk_infos, 1);
$arr['backgrounds_GP_alt']		= $this->match_all('/<img src="(.*?)\.*?".*?itemprop="image".*?>/ms', $this->match('/<div.*?role="list">(.*?)<\/div>.*?<div jsaction.*?/ms', $gp1, 1), 1);

##### Paid #####
$arr['paid_GP']					= $this->match('/<span class="oocvOe">.*?<button aria-label=".*?Buy".*?">.*?d+\(.*?)<\/button>.*?<\/span>/msi', $gp1, 1);
$arr['paid_GP1']				= $this->match('/<button aria-label=".*?Buy".*?">(.*?)<\/button>/msi', $gp_en_us, 1);
$arr['paid_GP2']				= $this->match('/<button aria-label=".*?Buy".*?">(.*?)<\/button>/msi', $gp_en_us, 1);
$arr['paid_GP2']				= preg_replace('/.*?Buy/is', 'Paid',  $arr['paid_GP2']);
$arr['paid_GP3']				= $this->match('/<span class="oocvOe">.*?<button aria-label=".*?Buy".*?">(.*?)<\/button>.*?<\/span>/msi', $gp_en_us, 1);