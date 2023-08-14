<?php 
 
?>
<style>
#px-changelog .last-changelog {border-bottom: 2px dashed #CCC;border-bottom: 2px dashed #CCC;}#px-changelog .alert {display: inline-block;padding: 0px 5px;border-radius: 3px;font-size: 11px;border: 1px solid;margin: 4px 10px 4px 0;min-width: 85px;text-align: center;}#px-changelog ul {margin: 0;padding: 0;margin-top: 20px;margin-bottom: 20px;}#px-changelog ul li {width: auto;margin-bottom: 9px;list-style: none;padding-left: 130px;position: relative;text-transform: capitalize;}#px-changelog .chl-release, #px-changelog .chl-error-fixed, #px-changelog .chl-fixed, #px-changelog .chl-remove, #px-changelog .chl-add {display: inline-block;border-radius: 2px;-webkit-border-radius: 2px;-moz-border-radius: 2px;-ms-border-radius: 2px;-o-border-radius: 2px;padding: 0px 9px;margin-right: 10px;color: #FFF;font-size: 15px;min-width: 100px;text-align: center;height: 20px;position: absolute;left: 0;border: 1px solid;font-weight: bold;}#px-changelog .chl-add {border-color: #59b859;color: #59b859;}#px-changelog .chl-fixed {border-color: steelblue;color: blue;}#px-changelog .chl-remove {border-color: crimson;color: crimson;}#px-changelog .chl-release {color: #3a87ad;background-color: #d9edf7;border-color: #bce8f1;}#px-changelog h1, #px-changelog h2, #px-changelog h3.ch, #px-changelog h4{margin-top: 10px;margin-bottom: 10px;}#px-changelog h3.ch {font-weight: bold;}#px-changelog a {color: #3a87ad;text-transform: uppercase;font-weight: bold;}.scrollable-changelog {height: 200px;width: 100%;overflow: scroll;overflow-x: hidden;}.scrollable-changelog ul li {display: block;margin-bottom: 5px;text-overflow: clip;text-overflow: ellipsis;white-space: nowrap;}
</style>

<style>
 body {font-size:80%;color:#222;background:#fff; }
 .error, .notice, .success {padding:.8em;margin-bottom:1em;border:2px solid #ddd;}.error {background:#FBE3E4;color:#8a1f11;border-color:#FBC2C4;}.notice {background:#FFF6BF;color:#514721;border-color:#FFD324;}.success {background:#E6EFC2;color:#264409;border-color:#C6D880;}.error a {color:#8a1f11;}.notice a {color:#514721;}.success a {color:#264409;}.container {width:100%;margin:0 auto;} 
</style>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>

 


<body>
	<div class="container">
			<div id="px-changelog"> 
				<div class="last-changelog">
				<h2 style="color: red;background-color: ghostwhite;">Infos</h2>
				<p style="color: crimson;background-color: ghostwhite;"> Please back up your theme when you are done customizing your theme, as errors in your themes are not the responsibility of the developers</strong>. if you got errors, Please ReDownload 5play themes and upload for manual on <a href="//exthem.es/dashboard/" target="_blank">member area</a> For Manual Upload</p>					 
				
				<h2>Upgrade</h2>
				NOTE: If you have directly made changes to the files, the update will overwrite these changes. So, we recommend that you DO NOT make changes in this way. Alternatively you can use plugins that allow adding CSS, however we do not guarantee that the 'classes' or 'id' will change in future updates.
				
				<h2>Manual update</h2>
				Before updating anything, make sure you have backups.<br>
				<ol>
					<li>Download the theme by logging into your account <a href="//exthem.es/dashboard/" target="_blank" rel="noopener">login</a> and <a href="//exthem.es/how-to-see-my-license-key-and-download-link/" target="_blank" rel="noopener">see my license key</a></li>
					<li>Unzip the <strong>'5play'</strong> theme file.</li>
					<li>From your FTP account, replace all files within the <strong>'5play'</strong> folder found in the 'wp-content' directory. </li>
				</ol>				
				</div>
			</div>
			
			<div id="px-changelog">	
 
				<div class="last-changelog">
				<h2>Whats is Changes</h2>                
                <i style="font-size: x-small;color: dimgrey;"><?php echo round(((( time() - strtotime("2022-04-11 00:00:00") )/60)/60)/24).' day(s) ago'; ?></i>
                
                <h3>v5.2 &#8211; 05/05/2023 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2023-05-05"></time></i> </h3>
                <ul> 
                    <li><span class="chl-add">adding</span> like and dislike comments</li>  
                </ul>	
                
                <h3>v5.1 &#8211; 26/04/2023 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2023-04-26"></time></i> </h3>
                <ul> 
                    <li><span class="chl-add">adding</span> new sources apk extractor</li> 
                    <li><span class="chl-fixed">fixed</span> small issues apk extractor</li> 
                </ul>	
                
                <h3>v5.0 &#8211; 26/03/2023 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2023-03-26"></time></i> </h3>
                <ul>		
                    <li> <span class="chl-fixed">fixed</span> metabox Details App Informations can't be saved</li> 
                    <li> <span class="chl-fixed">fixed</span> categorie pages </li> 
                </ul>	
                <h3>v4.9 &#8211; 13/01/2023 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2023-01-13T00:00:00Z"></time></i></h3>
                <ul>		
                    <li> <span class="chl-fixed">fixed</span> list apk post version (make it duplicate post to showing latest version) </li>
                    <li> <span class="chl-remove">remove</span> Wp Report Post plugins (please deactivate and delete) </li>
                    <li> <span class="chl-add">adding</span> edit list version on custom box post</li>
                    <li><span class="chl-fixed">fixed</span> small issues apk extractor</li> 
                    <li><span class="chl-add">adding</span> new apk extractor sources from coffeeapps.ir goods for rtl</li>	  
                </ul>	
                
                <h3>v4.8 &#8211; 19/11/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-11-19T00:00:00Z"></time></i></h3>
                <ul> 	   	 	  	 
                    <li><span class="chl-fixed">fixed</span> small issues</li> 
                    <li><span class="chl-fixed">improved</span> speed themes </li> 
                </ul>	
                
                <h3>v4.7 &#8211; 31/10/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-10-31T00:00:00Z"></time></i></h3>
                <ul> 	   	 	  	 
                    <li><span class="chl-fixed">fixed</span> apk extractor. no make new post or duplicate post for same post</li>
                    <li><span class="chl-fixed">fixed</span> apk extractor for php 7</li> 

                </ul>	
                
                <h3>v4.6 &#8211; 19/10/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-10-19T00:00:00Z"></time></i></h3>
                <ul> 	   	 	  	 
                    <li><span class="chl-fixed">fixed</span> sources apkmod</li> 
                </ul>
                
                <h3>v4.5 &#8211; 13/10/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-10-13T00:00:00Z"></time></i></h3>
                <ul> 	   	 	  	 
                    <li><span class="chl-fixed">fixed</span> languanges for apk extractor</li> 
                </ul>
                
                <h3>v4.4 &#8211; 09/10/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-10-9T00:00:00Z"></time></i></h3>
                <ul> 	   	 	  	 
                    <li><span class="chl-fixed">fixed</span> small issues</li> 
                </ul>
                
                <h3>v4.3 &#8211; 03/10/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-10-3T00:00:00Z"></time></i></h3>
                <ul> 	   	 	  	 
                    <li><span class="chl-fixed">fixed</span> small issues metabox</li> 
                </ul>
                
                <h3>v4.2 &#8211; 26/09/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-9-26T00:00:00Z"></time></i></h3>
                <ul> 	
                    <li><span class="chl-fixed">fixed</span> small issues apk extractor</li>
                    <li><span class="chl-add">adding</span> new apk extractor sources from apkmody</li>	  	  
                </ul>
                
                <h3>v4.1 &#8211; 14/09/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-9-14T00:00:00Z"></time></i></h3>
                <ul> 	   	 	  	 
                    <li><span class="chl-add">adding</span> Drag and Drop Download Link Box</li>	  
                </ul>
                
                <h3>v4.0 &#8211; 31/08/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-8-31T00:00:00Z"></time></i></h3>
                <ul> 	  	   	 	  	 
                    <li><span class="chl-fixed">fixed</span> small issues apk extractor </li>	 
                </ul>
                
                <h3>v3.9 &#8211; 09/08/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-8-9T00:00:00Z"></time></i></h3>
                <ul> 	  	   	 	  	 
                    <li><span class="chl-fixed">fixed</span> small issues</li>	 
                </ul>
                
                <h3>v3.8 &#8211; 29/07/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-7-29T00:00:00Z"></time></i></h3>
                <ul> 	  	   	 	  	 
                    <li><span class="chl-fixed">fixed</span> small issues apk extractor </li>	 
                </ul>
                
                <h3>v3.7 &#8211; 9/06/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-6-9T00:00:00Z"></time></i></h3>
                <ul> 	  	   	 	  	 
                    <li><span class="chl-add">adding</span> new apk extractor sources from techbigs</li>	 
                </ul>
                
                <h3>v3.6 &#8211; 3/06/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-6-3T00:00:00Z"></time></i></h3>
                <ul> 	  
                    <li><span class="chl-fixed">improved</span> apk extractor</li>	  	  
                </ul>
                
                <h3>v3.5 &#8211; 31/05/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-5-31T00:00:00Z"></time></i></h3>
                <ul> 	  
                    <li><span class="chl-fixed">fixed</span> apk extractor </li>   
                </ul>
                
                
                <h3>v3.4 &#8211; 6/05/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-5-6T00:00:00Z"></time></i></h3>
                <ul> 	  
                    <li><span class="chl-remove">remove</span> "news" slug from news post </li>   
                </ul>
                
                
                <h3>v3.3 &#8211; 4/05/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-5-4T00:00:00Z"></time></i></h3>
                <ul> 	  
                    <li><span class="chl-fixed">fixed</span> apk extractor sources apkdown </li>  		 	  	 
                    <li><span class="chl-add">adding</span> new apk extractor sources from apk-store and modcombo</li>	 
                    <li><span class="chl-add">adding</span> new colors options for svg </li>  
                    <li><span class="chl-fixed">fixed</span> small issues </li>  
                </ul>
                
                
                <h3>v3.2 &#8211; 27/04/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-4-27T00:00:00Z"></time></i></h3>
                <ul> 
                    <li><span class="chl-add">adding</span> on off setting for app names titles </li>  
                    <li><span class="chl-add">adding</span> on off setting for showing latest post on homes </li>  
                    <li><span class="chl-add">adding</span> setting for popular pages by popular range daily, weekly, Mountly, and Yearly </li>	 
                    <li><span class="chl-fixed">fixed</span> issues css styles and rtl styles</li>  
                </ul>
                
                <h3>v3.1 &#8211; 21/04/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-4-21T00:00:00Z"></time></i></h3>
                <ul> 
                    <li><span class="chl-fixed">fixed</span> apk extractor for sources getmodsapk.com </li>  
                </ul>
                
                <h3>v3.0 &#8211; 10/04/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-4-10T00:00:00Z"></time></i></h3>
                <ul> 
                    <li><span class="chl-fixed">fixed</span> featured image not showing </li>  
                </ul>
                
                <h3>v2.9 &#8211; 2/04/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-4-2T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-remove">remove</span> getmodsapk sources from apk extractor </li>  
                    <li><span class="chl-fixed">fixed</span> css style and small issue </li> 
                    <li><span class="chl-add">add</span> box background images post </li> 
                    <li><span class="chl-add">add</span> new color options themes </li> 

                </ul>
                
                <h3>v2.8 &#8211; 13/03/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-3-13T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-fixed">fixed</span> apk extractor </li>  

                </ul>
                
                <h3>v2.7 &#8211; 10/02/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-2-10T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-fixed">fixed</span> apk extractor sources getmodsapk.com</li> 
                    <li><span class="chl-fixed">fixed</span> showing list comments for only approve on widget comments. </li> 

                </ul>
                
                <h3>v2.6 &#8211; 27/01/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-1-27T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-fixed">fixed</span> date updates apk info extractor</li> 

                </ul>
                
                <h3>v2.5 &#8211; 27/01/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-1-27T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-fixed">fixed</span> styles for rtl mode</li>  
                    <li><span class="chl-add">add</span> your own number for rtl modes</li>  
                    <li><span class="chl-fixed">fixed</span> apk extractor apkdownload.cc</li>  
                    <li><span class="chl-add">add</span> new sources apk extractor getmodsapk.com</li>  

                </ul>
                
                
                    <h3>v2.4 &#8211; 12/01/2022 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2022-1-12T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-fixed">fixed</span> small bugs</li>  
                    <li><span class="chl-fixed">fixed</span> sitemap erros</li>  
                    <li><span class="chl-fixed">fixed</span> apk extractor sources happymod</li>  

                </ul>
                
                <h3>v2.3 &#8211; 09/12/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-12-9T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-fixed">fixed</span> small bugs</li>  
                    <li><span class="chl-add">add</span> hidden download link, (no link show on mouse hover) </li>  

                </ul>
                    <h3>v2.2 &#8211; 08/11/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-11-8T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-fixed">fixed</span> widget popular home not showing</li>  

                </ul>
                    <h3>v2.1 &#8211; 28/10/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-10-28T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-remove">remove</span> virus warning</li>  

                </ul>
                    <h3>v2.0 &#8211; 25/10/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-10-25T00:00:00Z"></time></i></h3>
                <ul>
                    <li><span class="chl-add">add</span> Support php version 8, now apk extractor version is 8.0</li> 
                    <li><span class="chl-fixed">fixed</span> small warning in php 8</li> 
                    <li><span class="chl-add">add</span> most post by developers</li>  

                </ul>
                    <h3>v1.9 &#8211; 30/09/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-9-30T00:00:00Z"></time></i></h3>
                    <ul>          
                    <li><span class="chl-fixed">fixing</span> apk extractor </li>
                    </ul>
                    <h3>v1.8 &#8211; 28/07/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-7-28T00:00:00Z"></time></i></h3>
                    <ul>          
                    <li><span class="chl-fixed">fixing</span> apk extractor </li>
                    <li><span class="chl-add">adding</span> sources apk extractor rajaapk </li> 
                    </ul>
                    
                    <h3>v1.7 &#8211; 28/06/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-6-28T00:00:00Z"></time></i></h3>
                    <ul> 
                        <li><span class="chl-add">adding</span> Languages for apk extractor </li> 
                    </ul>

                    <h3>v1.6 &#8211; 25/06/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-6-25T00:00:00Z"></time></i></h3>
                    <ul> 
                        <li><span class="chl-fixed">fixed</span> schemes MobileApplication rating using kk stars rating plugins</li> 
                    </ul>

                    
                    <h3>v1.5 &#8211; 15/06/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-6-15T00:00:00Z"></time></i></h3>
                    <ul>
                      
                        <li><span class="chl-fixed">fixed</span> download link box</li>
                        <li><span class="chl-fixed">fixed</span> schemes MobileApplication rating </li>
                        <li><span class="chl-add">adding</span> enable on off schemes seo </li>
                        <li><span class="chl-add">adding</span> changes languange options </li>
                    </ul>

                    
                    <h3>v1.4 &#8211; 29/05/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-5-29T00:00:00Z"></time></i></h3>
                    <ul>
                      
                        <li><span class="chl-add">adding</span> RTL Supports</li>
                    </ul>

                    <h3>v1.3 &#8211; 26/05/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-5-26T00:00:00Z"></time></i></h3>
                    <ul>
                        <li><span class="chl-fixed">Fixed</span> no image extractor apk source from apkdownload.cc</li>
                        <li><span class="chl-fixed">Fixed</span> button report</li>
                        <li><span class="chl-add">adding</span> new extractor to post editor</li>
                    </ul>

                    <h3>v1.2 &#8211; 08/05/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-5-8T00:00:00Z"></time></i></h3>
                    <ul>
                        <li><span class="chl-remove">Remove</span> Masking Link</li>
                        <li><span class="chl-add">adding</span> for report system</li>
                        <li><span class="chl-fixed">Fixed</span> for bugs</li>
                    </ul>

                    <h3>v1.1 &#8211; 28/04/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-4-28T00:00:00Z"></time></i></h3>
                    <ul>
                        <li><span class="chl-fixed">Fixed</span> turn on off for Thumbnails for original size</li>
                        <li><span class="chl-fixed">Fixed</span> for bugs</li>
                    </ul>

                    <h3>v1.0 &#8211; 28/04/2021 <i style="color: teal;background-color: floralwhite;"><time class="timeago" datetime="2021-4-28T00:00:00Z"></time></i></h3>
                    <ul> 
                        <li><span class="chl-release">Release</span> First Release</li>
                    </ul>


				</div>
			</div>

			 

 
	</div><!-- end div .container -->
	
	
<script id="rendered-js" >
/* 
https://cdpn.io/vogelbeere/fullembedgrid/erdvMR?animations=run&type=embed
https://codepen.io/vogelbeere/pen/erdvMR
 */
$(document).ready(function () {
  $("time.timeago").timeago();
  var timenow = jQuery.timeago(new Date());
  var yesterday = jQuery.timeago(new Date() - 86400000);
  var lastWeek = jQuery.timeago(new Date() - 604800000);
  var lastMonth = jQuery.timeago(new Date() - 2419200000);
  $(".now").html(timenow);
  $(".yesterday").html(yesterday);
  $(".lastweek").html(lastWeek);
  $(".lastmonth").html(lastMonth);
});

/**
 * Timeago is a jQuery plugin that makes it easy to support automatically
 * updating fuzzy timestamps (e.g. "4 minutes ago" or "about 1 day ago").
 *
 * @name timeago
 * @version 1.6.3
 * @requires jQuery v1.2.3+
 * @author Ryan McGeary
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 *
 * For usage and examples, visit:
 * http://timeago.yarp.com/
 *
 * Copyright (c) 2008-2017, Ryan McGeary (ryan -[at]- mcgeary [*dot*] org)
 */

(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else if (typeof module === 'object' && typeof module.exports === 'object') {
    factory(require('jquery'));
  } else {
    // Browser globals
    factory(jQuery);
  }
})(function ($) {
  $.timeago = function (timestamp) {
    if (timestamp instanceof Date) {
      return inWords(timestamp);
    } else if (typeof timestamp === "string") {
      return inWords($.timeago.parse(timestamp));
    } else if (typeof timestamp === "number") {
      return inWords(new Date(timestamp));
    } else {
      return inWords($.timeago.datetime(timestamp));
    }
  };
  var $t = $.timeago;

  $.extend($.timeago, {
    settings: {
      refreshMillis: 60000,
      allowPast: true,
      allowFuture: false,
      localeTitle: false,
      cutoff: 0,
      autoDispose: true,
      strings: {
        prefixAgo: null,
        prefixFromNow: null,
        suffixAgo: "ago",
        suffixFromNow: "from now",
        inPast: 'any moment now',
        seconds: "less than a minute",
        minute: "%d minute",
        minutes: "%d minutes",
        hour: "%d hour",
        hours: "%d hours",
        day: "%d day",
        days: "%d days",
        month: "%d month",
        months: "%d months",
        year: "%d year",
        years: "%d years",
        wordSeparator: " ",
        numbers: [] } },



    inWords: function (distanceMillis) {
      if (!this.settings.allowPast && !this.settings.allowFuture) {
        throw 'timeago allowPast and allowFuture settings can not both be set to false.';
      }

      var $l = this.settings.strings;
      var prefix = $l.prefixAgo;
      var suffix = $l.suffixAgo;
      if (this.settings.allowFuture) {
        if (distanceMillis < 0) {
          prefix = $l.prefixFromNow;
          suffix = $l.suffixFromNow;
        }
      }

      if (!this.settings.allowPast && distanceMillis >= 0) {
        return this.settings.strings.inPast;
      }

      var seconds = Math.abs(distanceMillis) / 1000;
      var minutes = seconds / 60;
      var hours = minutes / 60;
      var days = hours / 24;
      var years = days / 365;

      function substitute(stringOrFunction, number) {
        var string = $.isFunction(stringOrFunction) ? stringOrFunction(number, distanceMillis) : stringOrFunction;
        var value = $l.numbers && $l.numbers[number] || number;
        return string.replace(/%d/i, value);
      }

      var words = seconds < 45 && substitute($l.seconds, Math.round(seconds)) ||
      seconds < 90 && substitute($l.minute, 1) ||
      minutes < 45 && substitute($l.minutes, Math.round(minutes)) ||
      minutes < 90 && substitute($l.hour, 1) ||
      hours < 24 && substitute($l.hours, Math.round(hours)) ||
      hours < 42 && substitute($l.day, 1) ||
      days < 30 && substitute($l.days, Math.round(days)) ||
      days < 45 && substitute($l.month, 1) ||
      days < 365 && substitute($l.months, Math.round(days / 30)) ||
      years < 1.5 && substitute($l.year, 1) ||
      substitute($l.years, Math.round(years));

      var separator = $l.wordSeparator || "";
      if ($l.wordSeparator === undefined) {separator = " ";}
      return $.trim([prefix, words, suffix].join(separator));
    },

    parse: function (iso8601) {
      var s = $.trim(iso8601);
      s = s.replace(/\.\d+/, ""); // remove milliseconds
      s = s.replace(/-/, "/").replace(/-/, "/");
      s = s.replace(/T/, " ").replace(/Z/, " UTC");
      s = s.replace(/([\+\-]\d\d)\:?(\d\d)/, " $1$2"); // -04:00 -> -0400
      s = s.replace(/([\+\-]\d\d)$/, " $100"); // +09 -> +0900
      return new Date(s);
    },
    datetime: function (elem) {
      var iso8601 = $t.isTime(elem) ? $(elem).attr("datetime") : $(elem).attr("title");
      return $t.parse(iso8601);
    },
    isTime: function (elem) {
      // jQuery's `is()` doesn't play well with HTML5 in IE
      return $(elem).get(0).tagName.toLowerCase() === "time"; // $(elem).is("time");
    } });


  // functions that can be called via $(el).timeago('action')
  // init is default when no action is given
  // functions are called with context of a single element
  var functions = {
    init: function () {
      functions.dispose.call(this);
      var refresh_el = $.proxy(refresh, this);
      refresh_el();
      var $s = $t.settings;
      if ($s.refreshMillis > 0) {
        this._timeagoInterval = setInterval(refresh_el, $s.refreshMillis);
      }
    },
    update: function (timestamp) {
      var date = timestamp instanceof Date ? timestamp : $t.parse(timestamp);
      $(this).data('timeago', { datetime: date });
      if ($t.settings.localeTitle) {
        $(this).attr("title", date.toLocaleString());
      }
      refresh.apply(this);
    },
    updateFromDOM: function () {
      $(this).data('timeago', { datetime: $t.parse($t.isTime(this) ? $(this).attr("datetime") : $(this).attr("title")) });
      refresh.apply(this);
    },
    dispose: function () {
      if (this._timeagoInterval) {
        window.clearInterval(this._timeagoInterval);
        this._timeagoInterval = null;
      }
    } };


  $.fn.timeago = function (action, options) {
    var fn = action ? functions[action] : functions.init;
    if (!fn) {
      throw new Error("Unknown function name '" + action + "' for timeago");
    }
    // each over objects here and call the requested function
    this.each(function () {
      fn.call(this, options);
    });
    return this;
  };

  function refresh() {
    var $s = $t.settings;

    //check if it's still visible
    if ($s.autoDispose && !$.contains(document.documentElement, this)) {
      //stop if it has been removed
      $(this).timeago("dispose");
      return this;
    }

    var data = prepareData(this);

    if (!isNaN(data.datetime)) {
      if ($s.cutoff === 0 || Math.abs(distance(data.datetime)) < $s.cutoff) {
        $(this).text(inWords(data.datetime));
      } else {
        if ($(this).attr('title').length > 0) {
          $(this).text($(this).attr('title'));
        }
      }
    }
    return this;
  }

  function prepareData(element) {
    element = $(element);
    if (!element.data("timeago")) {
      element.data("timeago", { datetime: $t.datetime(element) });
      var text = $.trim(element.text());
      if ($t.settings.localeTitle) {
        element.attr("title", element.data('timeago').datetime.toLocaleString());
      } else if (text.length > 0 && !($t.isTime(element) && element.attr("title"))) {
        element.attr("title", text);
      }
    }
    return element.data("timeago");
  }

  function inWords(date) {
    return $t.inWords(distance(date));
  }

  function distance(date) {
    return new Date().getTime() - date.getTime();    
    //return new Date(.getTime() + 2 * 24 * 60 * 60 * 1000);
  }

  // fix for IE6 suckage
  document.createElement("abbr");
  document.createElement("time");
});
</script>

 