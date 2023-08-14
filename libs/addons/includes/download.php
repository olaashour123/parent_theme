<?php 
$apkfind						= "http://apkfind.com/store/download?id=" . $titleIdX1 . ""; 
$apkpure1						= "https://apkpure.com/genericApp/" . $titleIdX1 . "/download"; 
$apkpure						= "https://apkpure.com/.*?/" . $titleIdX1 . "/download"; 
$apkmirror						= "https://www.apkmirror.com/?post_type=app_release&searchtype=apk&s=" . $titleIdX1 . ""; 
$apkleecher						= "https://apkleecher.com/download/dl.php?dl=" . $titleIdX1 . ""; 
$apkcombo						= "https://apkcombo.com/genericApp/" . $titleIdX1 . "/download/apk"; 
$apkpremier						= "https://apkpremier.com/download/" . $titleIdX1 . ""; 
$apkgk_dw						= "https://apkgk.com/" . $titleIdX1 . "/download"; 
$apkfind_dl						= $this->geturl("${apkfind}"); 
$apkpure_dl						= $this->geturl("${apkpure}"); 
$apkmirror_dl					= $this->geturl("${apkmirror}"); 
$apkleecher_dl					= $this->geturl("${apkleecher}"); 
$apkcombo_dl					= $this->geturl("${apkcombo}"); 
$apkpremier_dl					= $this->geturl("${apkpremier}"); 
$apkgk_dl						= $this->geturl("${apkgk_dw}"); 

$arr['download_links_page_apkgk']		= $apkgk_dw;

$arr['downloadapkxapkpremier']	= $this->match('/<iframe.*?id="iframe_download".*?src="(.*?)".*?>.*?<\/iframe>/ms', $apkpremier_dl, 1) ;

$arr['downloadapkgk']			= $this->match('/<div class="c-download"><a.*?href="(.*?)">.*?<\/a>.*?<\/div>/ms', $apkgk_dl, 1) ;

$arr['link_download_apkgk']		= $this->match_all('/<a.*?href="(.*?)">.*?<\/a>/ms', $this->match('/<div class="c-download">(.*?)<\/div>/ms', $apkgk_dl, 1), 1);

$arr['downloadlinks_ori']		= $arr['link_download_apkgk'];
$arr['downloadlink_ori']		= $arr['link_download_apkgk'][0]; 
$arr['downloadlink_ori_1']		= $arr['link_download_apkgk'][1]; 
$arr['downloadlink_ori_2']		= $arr['link_download_apkgk'][2]; 

$arr['name_download_apkgk']		= $this->match_all('/<a.*?title="(.*?)".*?>.*?<\/a>/ms', $this->match('/<div class="c-download">(.*?)<\/div>/ms', $apkgk_dl, 1), 1);
$arr['name_download_apkgk']		= str_replace('Download', '', $arr['name_download_apkgk']);	 
$arr['name_downloadlinks_ori']	= $arr['name_download_apkgk']; 

$arr['size_download_apkgk']		= $this->match_all('/<span>.*?\((.*?)\).*?<\/span>/ms', $this->match('/<div class="c-download">(.*?)<\/div>/ms', $apkgk_dl, 1), 1);
$arr['size_downloadlinks_orig']	= $arr['size_download_apkgk']; 




/* 	
if ( $arr['downloadapkxapkpremier'] === FALSE or $arr['downloadapkxapkpremier'] == '' ) $arr['downloadapkxapkpremier'] = $arr['downloadapkgk'];	
$arr['namedownloadapkx1']		= $this->match('/<tr>.*?<td>File Name: <\/td>.*?<td>(.*?)<\/td>.*?<\/tr>/ms', $apkfind_dl, 1) ;
$arr['downloadapkxapkpure'] 	= $this->match('/<iframe.*?id="iframe_download".*?src="(.*?)".*?>.*?<\/iframe>/ms', $apkpure_dl, 1) ;
$arr['downloadapkxapkpure1']	= $this->match('/<a.*?id="download_link".*?href="(.*?)".*?>.*?<\/a>/ms', $apkpure_dl, 1) ;
$arr['downloadapkxapkmirror']	= $this->match('/<iframe.*?id="iframe_download".*?src="(.*?)".*?>.*?<\/iframe>/ms', $apkmirror_dl, 1) ;
$arr['downloadapkxapkleecher']	= $this->match('/<iframe.*?id="iframe_download".*?src="(.*?)".*?>.*?<\/iframe>/ms', $apkleecher_dl, 1) ;
$arr['downloadapkxapkcombo']	= $this->match('/<div.*?id="best-variant-tab".*?<a.*?href="(.*?)".*?class="variant".*?<div.*?id="variants-tab" style="display: none;">/ms', $apkcombo_dl, 1) ;
 

$arr['downloadapkx1']			= $this->match('/<a href="(.*?)" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect fixed-size".*?>.*?<span id="text">Start Download<\/span>.*?<span class="mdl-button__ripple-container"><span class="mdl-ripple"><\/span><\/span><\/a>/ms', $apkfind_dl, 1) ;
$arr['namedownloadapk3']		= $this->match('/<div class="ft_folder"><img.*?>(.*?)<\/div>/msi', $apkgk3, 1);
$arr['namedownloadapkx3']		= $this->match_all('/<a.*?>.*?<img.*?>(.*?)<span class="dersize">.*?<\/span>.*?<\/a>/ms', $this->match('/<div class="dvContents_a">.*?<ul>(.*?)<\/ul>.*?<\/div>/ms', $apkgk3, 1), 1);
$arr['downloadapkx3']			= $this->match_all('/<a.*?href="(.*?)".*?>.*?<\/a>/ms', $this->match('/<div class="dvContents_a">.*?<ul>(.*?)<\/ul>.*?<\/div>/ms', $apkgk3, 1), 1);
*/