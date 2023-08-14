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

/**
 * Contains a link to the image, allows you to customize its size and download it.
 *
 * This class only works with images stored on googleusercontent.com.
 * To modify the image, special parameters are added to the URL, using a hyphen.
 *
 * **Supported parameters:**
 *
 * | Param | Name         | Description                                     | Example                       |
 * | :---: |:------------ | :---------------------------------------------- | ----------------------------: |
 * | sN | size            | Sets the longer of height or width to N pixels  | s70 ![][_s] ![][_s2] ![][_s3] |
 * | wN | width           | Sets width of image to N pixels                 | w70 ![][_w] ![][_w2] ![][_w3] |
 * | hN | height          | Sets height of image to N pixels                | h70 ![][_h] ![][_h2] ![][_h3] |
 * | c  | square crop     | Sets square crop                   | w40-h70-c ![][_c1.1] ![][_c1.2] ![][_c1.3] |
 * |    |                 |                                    | w70-h40-c ![][_c2.1] ![][_c2.2] ![][_c2.3] |
 * |    |                 |                                    | w70-h70-c ![][_c3.1] ![][_c3.2] ![][_c3.3] |
 * | p  | smart crop      | Sets smart crop                    | w40-h70-p ![][_p1.1] ![][_p1.2] ![][_p1.3] |
 * |    |                 |                                    | w70-h40-p ![][_p2.1] ![][_p2.2] ![][_p2.3] |
 * |    |                 |                                    | w70-h70-p ![][_p3.1] ![][_p3.2] ![][_p3.3] |
 * | bN | border          | Sets border of image to N pixels            | s70-b10 ![][_b] ![][_b2] ![][_b3] |
 * | fv | vertical flip   | Vertically flips the image                | s70-fv ![][_fv] ![][_fv2] ![][_fv3] |
 * | fh | horizontal flip | Horizontally flips the image              | s70-fh ![][_fh] ![][_fh2] ![][_fh3] |
 *
 * [_s]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=s70
 * [_w]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70
 * [_h]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=h70
 * [_c1.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w40-h70-c
 * [_c2.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70-h40-c
 * [_c3.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70-h70-c
 * [_p1.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w40-h70-p
 * [_p2.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70-h40-p
 * [_p3.1]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=w70-h70-p
 * [_b]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=s70-b10
 * [_fv]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=s70-fv
 * [_fh]:https://lh3.googleusercontent.com/6EtT4dght1QF9-XYvSiwx2uqkBiOnrwq-N-dPZLUw4x61Bh2Bp_w6BZ_d0dZPoTBVqM=s70-fh
 *
 * [_s2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=s70
 * [_w2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70
 * [_h2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=h70
 * [_c1.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w40-h70-c
 * [_c2.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70-h40-c
 * [_c3.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70-h70-c
 * [_p1.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w40-h70-p
 * [_p2.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70-h40-p
 * [_p3.2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=w70-h70-p
 * [_b2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=s70-b10
 * [_fv2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=s70-fv
 * [_fh2]:https://lh3.googleusercontent.com/7tB9mdZ61rXn1uhgPVeGDV39FMtce_bDxyFcRMKlbZy_AbGP6rHn8BknJI4n-U4hki8p=s70-fh
 *
 * [_s3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=s70
 * [_w3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70
 * [_h3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=h70
 * [_c1.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w40-h70-c
 * [_c2.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70-h40-c
 * [_c3.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70-h70-c
 * [_p1.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w40-h70-p
 * [_p2.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70-h40-p
 * [_p3.3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=w70-h70-p
 * [_b3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=s70-b10
 * [_fv3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=s70-fv
 * [_fh3]:https://lh3.googleusercontent.com/tCijG_gfFddONMX6aDD8RjnohoVy0TNbx5wc_Jn9ERSBBXIVtMqO_vs1h-v_FPFrzA0=s70-fh
 *
 * If the URL has no parameters, by default GoogleUserContents uses the parameter **s512**.
 * This means that the width or height will not exceed 512px.
 *
 * @see https://developers.google.com/people/image-sizing Goolge People API - Image Sizing.
 * @see https://github.com/null-dev/libGoogleUserContent Java library to create googleusercontent.com URLs.
 * @see https://sites.google.com/site/picasaresources/Home/Picasa-FAQ/google-photos-1/how-to/how-to-get-a-direct-link-to-an-image
 *      Google Photos and Picasa: How to get a direct link to an image (of a specific size)
 
    public function getYoutubeId(): ?string
    {
        if (preg_match(
            '~^.*(?:(?:youtu\.be/|v/|vi/|u/\w/|embed/)|(?:(?:watch)?\?v(?:i)?=|&v(?:i)?=))([^#&?]*).*~',
            $this->videoUrl,
            $match
        )) {
            return $match[1];
        }

        return null;
    }
	
 */
 
ini_set('display_errors', ERRORS);
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
$apklinkdownload                = "https://apk.demos.web.id/download.php?id=".$titleId;

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

$linksdownloads					= $this->geturl("${apklinkdownload}");

$arr['title_apktoy']			= $this->match('/<title>(.*?)<\/title>/msi', $apktoy, 1);
$arr['version_apktoy']			= $this->match('/<div>.*?<label>Latest version<\/label>.*?<span>(.*?)<\/span><\/div>/msi', $apktoy, 1);
$arr['size_apktoy']				= $this->match('/<div>.*?<label>Size<\/label>.*?<span>(.*?)<\/span>.*?<\/div>/msi', $apktoy, 1);
$arr['title_apkga']				= $this->match('/<title>(.*?)<\/title>/msi', $apkga, 1);
$arr['version_apkga']			= $this->match('/<li class="version">.*?<div class="pro-label"><label>Version :<\/label><\/div>.*?<div class="pro-item"><span>(.*?)<\/span><\/div>.*?<\/li>/msi', $apkga, 1);
$arr['required_apkga']			= $this->match('/<li class="Requirements">.*?<div class="pro-label"><label>Requirements :<\/label><\/div>.*?<div class="pro-item">.*?\ (.*?)\+.*?<\/div>.*?<\/li>/msi', $apkga, 1);
$arr['title_apkgp']				= $this->match('/<title>(.*?)<\/title>/msi', $apkgp, 1);
$arr['version_apkgp']			= $this->match('/<li class="version">.*?<div class="pro-label"><label>Version :<\/label><\/div>.*?<div class="pro-item"><span>(.*?)<\/span><\/div>.*?<\/li>/msi', $apkgp, 1); 
$arr['required_apkgp']			= $this->match('/<li class="Requirements">.*?<div class="pro-label"><label>Requirements :<\/label><\/div>.*?<div class="pro-item">.*?\ (.*?)\+.*?<\/div>.*?<\/li>/msi', $apkgp, 1);
//if ( $arr['version_apkgp'] === FALSE or $arr['version_apkgp'] == '' ) $arr['version_apkgp'] = $arr['version_GP_apkfab'];
//require_once 'download.php';
require_once 'images.php';

##### Download #####
$arr['download_link_pages_alt']		= $apklinkdownload;
$arr['download_link_pages_alt_2']	= $apksupport_dw_url;
 
$arr['judul_download_apkfab']       = $this->match('/<title>(.*?)<\/title>/msi', $linksdownloads, 1);
 
$arr['link_download_apkfab']		= $this->match_all('/<b class="hiden">(.*?)<\/b>/ms', $this->match('/<!-- detail and download link -->(.*?)<!-- stop detail and download link -->/ms', $linksdownloads, 1), 1);
$arr['link_download_apkfab']		= str_replace('apk-dl.com', $hostname, $arr['link_download_apkfab']);	
$arr['name_download_apkfab']		= $this->match_all('/<span class="file">(.*?)<span class="fsize">.*?<\/span><\/span>/ms', $this->match('/<!-- detail and download link -->(.*?)<!-- stop detail and download link -->/ms', $linksdownloads, 1), 1);
$arr['name_download_apkfab']		= str_replace('apk-dl.com', '_'.$hostname.'', $arr['name_download_apkfab']);	 

$arr['size_download_apkfab']		= $this->match_all('/<span class="file">.*?<span class="fsize">(.*?)<\/span><\/span>/ms', $this->match('/<div class="hiden">(.*?)<!-- stop detail and download link -->/ms', $linksdownloads, 1), 1);

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


if(empty($arr['GP_ID']) || !preg_match("/(.*?)/i", $arr['GP_ID'])) {
$arr['error']				= NO_ID;
echo $arr['error'];
}
 
#####   #####
$gplay							= new \Nelexa\GPlay\GPlayApps( $defaultLocale = $language, $defaultCountry = '' ); 
$appinfo						= $gplay->getAppInfo( $titleId );

$arr['name']					= $appinfo->getName();
$arr['size']					= $appinfo->getSize();
$ukuran							= '=w543-h232-c';	
$arr['cover']					= $appinfo->getCover()->getUrl().$ukuran;
$arr['summary']					= $appinfo->getSummary();
$arr['appversion']				= $appinfo->getAppVersion();
$arr['description']				= $appinfo->getDescription();
$arr['category']				= $appinfo->getCategory()->getName();
$arr['developer']				= $appinfo->getDeveloperName();
$arr['installs']				= $appinfo->getInstallsText();
$arr['android']					= $appinfo->getAndroidVersion();
$arr['numbervoters']			= $appinfo->getNumberVoters();
$arr['recentchanges']			= $appinfo->getRecentChanges();
$arr['getsize']		        	= $appinfo->getSize();
$arr['getcontentrating']       	= $appinfo->getContentRating();
$ukuranan						= '=s108';	
$arr['geticon']					= $appinfo->getIcon()->getUrl();
 

##### Title #####
$arr['title_GP']				= trim(strip_tags($this->match('/<h1.*?itemprop="name">(.*?)<\/h1>/msi', $gp1, 1)));
$arr['title_GP_alts_2']			= $this->match('/<h1.*?itemprop="name"><span.*?>(.*?)<\/span><\/h1>/msi', $gp1, 1);
//$arr['title_GP_alt']			= $title_webs;
$arr['title2']					= $this->match('/<title id="main-title">(.*?)\- Apps.*?<\/title>/msi', $gp1, 1);
if ( $arr['title_GP'] === FALSE or $arr['title_GP'] == '' ) $arr['title_GP'] = $arr['title_GP_alts_2'] = $arr['title_GP_alts'];

##### Article #####
$arr['articlebody_GP']			= $this->match('/<div class="bARER".*?>(.*?)<\/div>.*?<div class="TKjAsc">/msi', $gp1, 1);
$arr['articlebody_GP']			= preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP']);
$arr['articlebody_GP']			= str_replace(array('<b>', '</b>', '<div>', '</div>'), '', $arr['articlebody_GP']);
//$arr['articlebody_alt']			= $article_content;
//if ( $arr['articlebody_GP'] === FALSE or $arr['articlebody_GP'] == '' ) $arr['articlebody_GP'] = $article_content;
$arr['articlebody_GP_language'] = $this->match('/<span jsslot.*?>.*?<div jsname="Igi1ac" style="display:none;">(.*?)<\/div>.*?<\/span>/msi', $gp1, 1);
$arr['articlebody_GP_language'] = preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP_language']);
if ($arr['articlebody_GP'] === FALSE or $arr['articlebody_GP'] == '') $arr['articlebody_GP'] = $arr['articlebody_GP_language'];

##### Desc #####
$arr['desck_GP']			= substr(trim(strip_tags($this->match('/<meta.*?itemprop="description".*?content="(.*?)">/msi', $gp1, 1))),0,160);

##### Version ##### 
if($arr['appversion']){
$arr['version_GP']				= $arr['appversion'];
} else {
$arr['version_GP']				= $this->match('/<td id="appversion">(.*?)<\/td>/msi', $apk_infos, 1);
}
//$arr['version_GP_alt']			= $version_web;
//if ($arr['version_GP'] === FALSE or $arr['version_GP'] == '') $arr['version_GP'] = $arr['version_GP_alt'];	 

##### Genre ##### apk_infos
if($arr['category']){
$arr['genres_GP']				= $arr['category'];
} else {
$arr['genres_GP']				= $this->match('/<a id="category">(.*?)<\/a>/msi', $apk_infos, 1);
}

$arr['genres_GP_alts']			= trim(strip_tags($this->match('/<div class="T4LgNb ".*?>.*?<script.*?,"applicationCategory":"(.*?)",.*?<\/script>/msi', $gp1, 1)));
$arr['genres_GP_alts']			= str_replace( '_', ' ', $arr['genres_GP_alts'] );
$arr['genres_GP_alts']			= str_replace( 'GAME', '', $arr['genres_GP_alts'] );
$arr['genres_GP_alts']			= ucwords( strtolower( trim( $arr['genres_GP_alts'] ) ) ); 
if ($arr['genres_GP'] === FALSE or $arr['genres_GP'] == '') $arr['genres_GP'] = $arr['genres_GP_alts'];
 
##### Install #####
$arr['installs_GP']				= $arr['installs'];

##### Require #####
$arr['requires_GP']				= $arr['android'];

##### Rate & Rating #####
$arr['rated_GP']				= trim(strip_tags($this->match('/<div class="jILTFe">(.*?)<\/div>/msi', $gp1, 1)));
$arr['rated_GP']				= str_replace(',', '.', $arr['rated_GP']);

$arr['ratings_GP']			= trim(strip_tags($this->match('/<div class="T4LgNb ".*?>.*?<script.*?,"ratingCount":"(.*?)"},.*?<\/script>/msi', $gp1, 1))); 

##### Size Apk apkdlin #####
$arr['sizes_GP']				= $arr['getsize'];
$arr['sizes_GP_alts']				= $this->match('/<td id="appsize">(.*?)<\/td>/msi', $apk_infos, 1);
$arr['size_apkfab_']			= $this->match('/<div class="new_detail_down">.*?<div class="down_btn"><a.*?>.*?\-&nbsp;(.*?)\<\/a>.*?/msi', $apkfab_alt, 1);
$arr['size_apkfab_']			= $arr['getsize'];
if ($arr['sizes_GP'] === FALSE or $arr['sizes_GP'] == '') $arr['sizes_GP'] = $arr['size_apkfab_'];	 

##### Youtube Trailer #####
$arr['youtube_GP_alt']				= $this->match('/<div class="PyyLUd"><video.*?poster=".*?\/vi\/(.*?)\/hqdefault.jpg".*?>.*?<\/button><\/div><\/div>/msi', $gp1, 1);
$arr['youtube_GP']				= $appinfo->getVideo();

##### Whats News ##### 
$arr['whatnews_GP']				= $arr['recentchanges'];	 

##### Update Times #####
$arr['updates_GP']				= trim(strip_tags($this->match('/<div><div class="lXlx5">.*?<\/div><div class="xg1aie">(.*?)<\/div><\/div>/msi', $gp1, 1)));
$arr['updates_GP_alt']			= $this->match('/<div class="item publish-date">.*?<p>Update Date:<\/p>.*?<p itemprop="datePublished">(.*?)<\/p>/msi', $apkfab, 1);
if ( $arr['updates_GP'] === FALSE or $arr['updates_GP'] == '' ) $arr['updates_GP'] = $arr['updates_GP_alt'];

##### Poster Images #####

$sizes_						= '=s200-rw';
$arr['poster_GP_images']	= $this->match('/<meta property="og:image".*?content="(.*?)".*?>/msi', $gp1, 1);	
$arr['poster_GP_alts']		= $arr['poster_GP_images'].$sizes_;	 	
$arr['poster_GP']			= $arr['geticon'];	
$arr['poster_GP_alt_1'] 	= $this->match('/<meta name="twitter:image" content="(.*?)\=w.*?">/msi', $gp1, 1);
$arr['poster_GP_alt_2'] 	= $this->match('/<img.*?src="(.*?)\=.*?".*?itemprop="image".*?>/msi', $gp1, 1);
if ( $arr['poster_GP'] === FALSE or $arr['poster_GP'] == '' ) $arr['poster_GP'] = $arr['poster_GP_alt_1'] = $arr['poster_GP_alt_2'];

##### Developers #####
$arr['developers_GP']		= $arr['developer'];

##### Gallery Images #####
$arr['images_GP']				= $this->match_all('/<img src="(.*?)".*?>/ms', $this->match('/<div.*?role="list">(.*?)<div jsaction.*?/ms', $gp1, 1), 1);
$arr['images_GP_alts']			= $this->match_all('/<img src="(.*?)".*?>/ms', $this->match('/<div.*?role="list">(.*?)<div jsaction.*?/ms', $gp1, 1), 1);

##### Backgrounds Images #####

$ukurans						= '=w543-h232-c';	
$arr['backgrounds_GP']			= $arr['cover'];
$arr['bg_gp_alt']	        	= $this->match_all('/<img src="(.*?)\=.*?".*?itemprop="image".*?>/ms', $this->match('/<div.*?role="list">(.*?)<\/div>.*?<div jsaction.*?/ms', $gp1, 1), 1);
$arr['backgrounds_GP_alt']		= $arr['bg_gp_alt'][0].$ukurans;

##### Paid #####
$arr['paid_GP']					= $this->match('/<span class="oocvOe">.*?<button aria-label=".*?Buy".*?">.*?d+\(.*?)<\/button>.*?<\/span>/msi', $gp1, 1);
$arr['paid_GP1']				= $this->match('/<button aria-label=".*?Buy".*?">(.*?)<\/button>/msi', $gp_en_us, 1);
$arr['paid_GP2']				= $this->match('/<button aria-label=".*?Buy".*?">(.*?)<\/button>/msi', $gp_en_us, 1);
$arr['paid_GP2']				= preg_replace('/.*?Buy/is', 'Paid',  $arr['paid_GP2']);
$arr['paid_GP3']				= $this->match('/<span class="oocvOe">.*?<button aria-label=".*?Buy".*?">(.*?)<\/button>.*?<\/span>/msi', $gp_en_us, 1);