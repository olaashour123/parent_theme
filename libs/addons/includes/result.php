<?php
$version_gps			= 'v.'.$gets_data['version_GP'];  
$version    			= 'v.'.$gets_data['version'];
if ( $version === FALSE or $version == '' ) $version = $version_gps;
$poster_gps             = $gets_data['poster_GP'];

$genres_gps             = $gets_data['genres_GP'];
if($gets_data['genres_web']){
$genres_alts            = $gets_data['genres_web'];
}
if ( $genres_gps === FALSE or $genres_gps == '' ) $genres_gps = $genres_alts;

$developer_gps          = $gets_data['developers_GP'];
$developer_alts         = $gets_data['developer_web'];
if ( $developer_gps === FALSE or $developer_gps == '' ) $developer_gps = $developer_alts;

$desck_gps              = $gets_data['summary'];
$desck_alts             = $gets_data['desck_GP'];
if ( $desck_gps === FALSE or $desck_gps == '' ) $desck_gps = $desck_alts;

$title_gps              = $gets_data['title_GP'];
$title_alts             = $gets_data['title'];
if ( $title_gps === FALSE or $title_gps == '' ) $title_gps = $title_alts;

echo '
<style>.Hide{display:none}.wp-block-table{margin:0 0 1em;overflow-x:auto}.wp-block-table .has-fixed-layout{table-layout:fixed;width:100%}.wp-block-table table{border-collapse:collapse;width:100%}block-table .has-fixed-layout th{word-break:break-word}.wp-block-table .has-fixed-layout td,.wp-block-table .has-fixed-layout th{word-break:break-word}.app-box-info th,.app-box-info td{padding:5px 0}.truncate{display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.has-text-align-right{text-align:right}tr.apkextractor:nth-child(odd){background-color:rgba(0,0,0,.05)}tr.apkextractor:nth-child(even){background-color:transparent}.notice, div.errors, div.updated { border-left-color: '.colors_rgb.'!important; }</style>


<style>
.app-card{border-radius:8px;background:#F2F6FC}.app-card .download-btn:hover{background:#24dc83}.app-card a{text-decoration:none}.app-card .app-tags{overflow:hidden;height:26px}.app-card .app-tags a{padding:4px 8px;font-size:12px;line-height:16px;color:#a6a6a6;border:1px solid #eee;border-radius:4px;background-color:#fff;margin-right:4px;display:inline-block}.app-card .app-tags a:hover{color:'.colors_rgb.';background:rgba(36,205,119,0.1);border-color:rgba(36,205,119,0.1);background-clip:padding-box}.app-card .app-details{margin:8px 0}.app-card .app-name{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.app-card .app-name .app-name-link{display:inline-block;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;white-space:nowrap}.app-card .app-howto-share{width:16px;height:16px;margin:0 4px;position:relative}.app-card .app-device-type,.app-card .app-corner-tag{display:inline-block;position:relative;margin-left:4px;font-style:normal;font-weight:400;font-size:9px;line-height:9px;border-radius:2px;vertical-align:top}.app-card .app-device-type div,.app-card .app-corner-tag div{padding:2px;border-radius:2px}.app-card .app-device-type{color:#0AAD00}.app-card .app-device-type div{background:rgba(10,173,0,0.1)}.app-card .app-corner-tag{color:#4087F7}.app-card .app-corner-tag div{background:rgba(64,135,247,0.1)}.app-card .app-stars{direction:ltr;height:12px;width:60px;background:url(https://static.apkpure.com/www/static/imgs/stars_fill.svg) repeat-x;background-size:12px}.app-card .app-stars .stars-score{display:block;height:12px;background:url(https://static.apkpure.com/www/static/imgs/stars.svg) repeat-x;background-size:12px}html[dir="rtl"] .app-card .app-device-type,html[dir="rtl"] .app-card .app-corner-tag{margin-left:0;margin-right:4px}html[dir="rtl"] .app-card .app-tags a{margin-right:0;margin-left:4px}html[dir="rtl"] .app-card .download-btn .fileSize{margin-left:0;margin-right:8px}html[lang="ar"] .app-card .app-info .app-name a,html[lang="ur"] .app-card .app-info .app-name a,html[lang="jp"] .app-card .app-info .app-name a,html[lang="th"] .app-card .app-info .app-name a{font-weight:bold}@media screen and (max-width: 720px){.app-card{padding:12px}.app-card p{margin:0}.app-card .card-header{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.app-card .card-header .app-icon{width:70px;height:70px}.app-card .card-header .app-info{-webkit-box-flex:1;-ms-flex:1;flex:1;width:0;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.app-card .card-header .app-info .app-name{overflow:hidden;white-space:nowrap;-o-text-overflow:ellipsis;text-overflow:ellipsis;color:'.colors_rgb.'}.app-card .card-header .app-info .app-name a{font-size:16px;line-height:26px;font-weight:500;color:'.colors_rgb.'}.app-card .card-header .app-info .app-author{display:none}.app-card .card-header .app-info .app-pre-info{font-weight:400;font-size:12px;line-height:16px;color:#8B8B8B}.app-card .card-header .app-info .app-pre-info span{display:block;margin-top:8px}.app-card .card-header .app-info .app-desc{font-size:12px;line-height:20px;margin-top:4px;word-break:break-word;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;color:#777}.app-card .card-header .app-tags{display:none}.app-card .download-btn .fileSize{vertical-align:top;margin-left:5px}.app-card .app-tags{margin-top:12px}.app-card .download-btn{display:block;margin-top:12px;text-align:center;padding:9px 0;background-color:#24cd77;border-radius:4px;color:#fff}.app-card .download-btn:hover{color:white}.app-card .download-btn i{vertical-align:middle;margin-right:8px}.app-card .download-btn>span{margin-right:8px;vertical-align:middle;display:inline-block;height:19px;position:relative}.app-card .app-icon{display:block;margin-right:16px}.app-card .app-icon img{width:100%;height:100%;border-radius:15%;border:1px solid #EFF3F9}html[dir="rtl"] .app-card .download-btn>span{margin-left:8px;margin-right:0}html[dir="rtl"] .app-card .app-icon{margin-left:16px;margin-right:0}}@media screen and (min-width: 720px){.app-card{margin:0 auto;-webkit-box-sizing:border-box;box-sizing:border-box;padding:16px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.app-card .download-btn{padding:9px 32px;background-color:#24cd77;border-radius:4px;color:#fff}.app-card .download-btn:hover{color:white}.app-card .download-btn .fileSize{display:none}.app-card .download-btn i{vertical-align:middle;margin-right:8px}.app-card .download-btn>span{margin-right:8px;vertical-align:middle;display:inline-block;height:19px;position:relative}.app-card .card-header{-webkit-box-flex:1;-ms-flex:1;flex:1;display:-webkit-box;display:-ms-flexbox;display:flex}.app-card .app-icon{width:120px;height:120px;display:block;margin-right:16px}.app-card .app-icon img{width:100%;height:100%;border-radius:15%;border:1px solid #EFF3F9}.app-card>.app-tags{display:none}.app-card .app-info{-webkit-box-flex:1;-ms-flex:1;flex:1;width:0;margin-right:16px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}.app-card .app-info .app-name{overflow:hidden;white-space:nowrap;-o-text-overflow:ellipsis;text-overflow:ellipsis;margin:0;color:'.colors_rgb.'}.app-card .app-info .app-name a{font-size:20px;line-height:28px;font-weight:500;color:'.colors_rgb.'}.app-card .app-info .app-details{display:-webkit-box;display:-ms-flexbox;display:flex;align-items:center}.app-card .app-info .app-details .delimiter{margin:0 12px;display:block;width:1px;height:8px;background:#C5C5C5}.app-card .app-info .app-author{font-weight:400;font-size:13px;line-height:22px;color:#5E5E5E}.app-card .app-info .app-pre-info{font-weight:400;font-size:13px;line-height:22px;color:#8B8B8B}.app-card .app-info .app-pre-info span{display:inline-block}.app-card .app-info .app-pre-info .app-pre-date{margin-left:12px}.app-card .app-info .app-desc{font-size:14px;line-height:22px;margin-bottom:8px;word-break:break-word;overflow:hidden;-o-text-overflow:ellipsis;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;color:#777}.app-card .app-info .app-tags{margin:0}html[dir="rtl"] .app-card .download-btn>span{margin-left:8px}html[dir="rtl"] .app-card .app-icon{margin-left:16px;margin-right:0}html[dir="rtl"] .app-card .app-info{margin-left:16px;margin-right:0}html[dir="rtl"] .app-card .app-pre-info .app-pre-date{margin-left:0;margin-right:12px}}
</style>



<div class="-app-card-container">
<div class="app-card">
<div class="card-header">
<a class="app-icon" href="'.$urlX.'" target="_blank" rel="noopener">
<img src="'.$poster_gps.'" class="lazy loaded" width="70" height="70">
</a>
<div class="app-info">
<div class="app-name">
<a class="app-name-link" title="'.$title_gps.' '.$version_gps.' " href="'.$urlX.'" target="_blank" rel="noopener">'.$title_gps.' - <i>'.$version_gps.'</i></a>
<span class="app-howto-share">
<svg class="class" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.8333 7.83334C12.7006 7.83334 12.5735 7.88602 12.4797 7.97979C12.3859 8.07356 12.3333 8.20074 12.3333 8.33334V12.3333H4.33325V4.33334H8.33325C8.46586 4.33334 8.59304 4.28067 8.68681 4.1869C8.78057 4.09313 8.83325 3.96595 8.83325 3.83334C8.83325 3.70074 8.78057 3.57356 8.68681 3.47979C8.59304 3.38602 8.46586 3.33334 8.33325 3.33334H3.83325C3.70064 3.33334 3.57347 3.38602 3.4797 3.47979C3.38593 3.57356 3.33325 3.70074 3.33325 3.83334V12.8333C3.33325 12.966 3.38593 13.0931 3.4797 13.1869C3.57347 13.2807 3.70064 13.3333 3.83325 13.3333H12.8333C12.9659 13.3333 13.093 13.2807 13.1868 13.1869C13.2806 13.0931 13.3333 12.966 13.3333 12.8333V8.33334C13.3333 8.20074 13.2806 8.07356 13.1868 7.97979C13.093 7.88602 12.9659 7.83334 12.8333 7.83334Z" fill="'.colors_rgb.'"></path>
<path d="M13.0243 3.37184C12.9638 3.3465 12.8988 3.33341 12.8333 3.33334H10.3333C10.2006 3.33334 10.0735 3.38602 9.9797 3.47979C9.88593 3.57356 9.83325 3.70074 9.83325 3.83334C9.83325 3.96595 9.88593 4.09313 9.9797 4.1869C10.0735 4.28067 10.2006 4.33334 10.3333 4.33334H11.6263L7.97975 7.97984C7.932 8.02597 7.89391 8.08114 7.8677 8.14214C7.8415 8.20314 7.8277 8.26875 7.82713 8.33514C7.82655 8.40153 7.8392 8.46737 7.86434 8.52882C7.88948 8.59027 7.92661 8.64609 7.97355 8.69304C8.0205 8.73999 8.07633 8.77711 8.13777 8.80225C8.19922 8.82739 8.26506 8.84005 8.33145 8.83947C8.39784 8.83889 8.46345 8.8251 8.52445 8.79889C8.58546 8.77269 8.64063 8.7346 8.68675 8.68684L12.3333 5.04034V6.33334C12.3333 6.46595 12.3859 6.59313 12.4797 6.6869C12.5735 6.78066 12.7006 6.83334 12.8333 6.83334C12.9659 6.83334 13.093 6.78066 13.1868 6.6869C13.2806 6.59313 13.3333 6.46595 13.3333 6.33334V3.83334C13.3329 3.76778 13.3199 3.70291 13.2948 3.64234C13.244 3.51989 13.1467 3.42259 13.0243 3.37184Z" fill="'.colors_rgb.'"></path>
</svg>
</span>
</div>

<div class="app-details">
<div class="app-stars"><span class="stars-score" style="width: '.mt_rand(50,90).'%;"></span></div>
<span class="delimiter"></span>
<a class="app-author">'.$developer_gps.'</a>
</div>
<p class="app-desc">'.trim(strip_tags($gets_data['desck_GP'])).' - <i>Updates on '.trim(strip_tags($gets_data['updates_GP'])).'</i></p>
<p class="app-tags">
<a class="dt-app-tag">'.$genres_gps.'</a>
<a href="post.php?post='.$post_id.'&action=edit" class="dt-app-tag" target="_blank">Edit</a>
<a href="'.$urlX.'" class="dt-app-tag" target="_blank">View</a>						 
<a class="toggle dt-app-tag">Debugs</a>
</p>
</div>
</div>
 
</div>
</div>
 
'; 