<?php
class starting_now{	
	public function get_web_info($title) {
		$getLinkID = $this->get_web_id_from_search(trim($title));
		if($getLinkID === NULL){
			$arr = array();	 	 	 
				
			$arr['error'] = "No Title found in Search Results!";
			 
			return $arr;
		}
		return $this->get_webs_info_by_id($getLinkID);
	}
	
	public function get_webs_info_by_id($getLinkID) {
		$arr = array();	
		if(isset($_POST['wp_sb'])) {		
		$sources					= $_POST['wp_url'];
		} else { 		
		$sources = "https://www.apktops.ir/".trim($getLinkID)."/";
		} 
		return $this->scrape_web_info($sources);
	}	
	
	public function scrape_web_info($sources) {				
		require_once 'ssl.php';	
		
		$linksX						= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links						=  file_get_contents($linksX, false, stream_context_create($ssl)); 
		
		$arr						= array();
		$linksX1					= $this->geturl("${sources}");	
 
 /*
 https://play.google.com/store/apps/details?id=com.roblox.client&hl=en&gl=us
 <a class="googleplay" href=".*?\?id=(.*?)\&.*?".*?><i class="fab fa-google-play.*?" aria-hidden="true"><\/i><\/a>
 */
		$arr['title_id'] 			= $this->match('/<a class="googleplay" href=".*?\?id=(.*?)\&.*?".*?><i class="fab fa-google-play.*?" aria-hidden="true"><\/i><\/a>/ms', $links, 1);	
			
 
		$arr['title_id_alt']		= $this->match('/<a class="googleplay" href=".*?\?id=(.*?)".*?><i class="fab fa-google-play.*?" aria-hidden="true"><\/i><\/a>/ms', $links, 1);
		$title_id_alt				= $arr['title_id_alt'];		
		if ($arr['title_id'] === FALSE or $arr['title_id'] == '') $arr['title_id'] = $title_id_alt;
		
		print_r( $arr['title_id']);
		echo '<br>';
		print_r( $arr['title_id_alt']); 
		
		/* 
		print_r( $arr['title_id']);
		echo '<br>';
		print_r( $arr['title_id_alt']); 
		
		echo 'title_id : '.$arr['title_id'];
		echo '<br>';
		echo 'title_id_alt : '.$arr['title_id_alt'];
		 */ 
		
		
		$arr['GP_ID']				= $arr['title_id'];
		$arr['GP_IDX']				= $arr['title_id_alt'];
		
		$title_id					= $arr['title_id'];
		$title_id_alternative		= $arr['title_id_alt'];
		
        if ($title_id === FALSE or $title_id == '') $title_id = $title_id_alternative;	
		

		$titleId					= $arr['title_id'];
		$titleId_alternative		= $arr['title_id_alt'];
        if ($titleId === FALSE or $titleId == '') $titleId = $titleId_alternative;	
		
		if(empty($titleId) || !preg_match("/(.*?)/i", $titleId)) {
			$arr['error']			= NO_ID;
			echo $arr['error'];
		}		  

		/*
		<title>Soccer Manager 2022 v1.4.8 APK + MOD (Official) for android Download</title>
		*/
		$arr['title']				= str_replace(array('دانلود', '&#8211;', '-', ' free for android', ' for android Download', 'for Android', '+', 'Download'), '', $this->match('/<title>(.*?)<\/title>/ms', $links, 1));
		$arr['title']				= preg_replace('/\s+/', ' ', $arr['title']);
		 
		$arr['title_web']			= $this->match('/<\/svg>.*?App Name.*?<td.*?>(.*?)<\/td>/ms', $links, 1);		
		$title_webs					= $arr['title_web'];
		
		$arr['title2']				= str_replace(array('getmodsapk.com', '&#8211;', '-', ' free for android', ' for android Download', 'for Android', '+', 'Download'), '', trim(strip_tags($this->match('/<span class="sm:text-left text-center block w-full">(.*?)<\/span>/ms', $links, 1))));
		if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title2'];	
		$arr['title']				= str_replace('[', '(', $arr['title']);
		$arr['title']				= str_replace(']', ')', $arr['title']);
		$arr['title']				= str_replace('download', '', $arr['title']);
		$arr['title2']				= str_replace('(', ',', $arr['title2']);
		$arr['title2']				= str_replace(')', ',', $arr['title2']);
		$arr['title2']				= str_replace('/', ',', $arr['title2']); 
	 
		 
        $arr['mods']				= str_replace(array('getmodsapk.com', 'MOD ', 'Download'), '', $this->match('/<title>.*?\((.*?)\).*?<\/title>/ms', $links, 1));
		
		
        $arr['mods2']				= $this->match('/<title>.*?\((.*?)\).*?<\/title>/ms', $links, 1);
		$arr['mods2']				= preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['mods2']);
		$arr['mods2']				= preg_replace('/<h2.*?>.*?<\/h2>.*?<br>.*?<br>.*?<br>.*?/is', '',  $arr['mods2']);
		$arr['mods2']				= preg_replace('/<strong>Note.*?<\/strong>.*?<br>.*?<br>.*?<\/div>.*?/is', '',  $arr['mods2']);

		$arr['mods3']				= $this->match('/<div class="su-spoiler-content su-u-clearfix su-u-trim">(.*?)<\/div>/ms', $links, 1);
        if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];	
		 
		$arr['mods_alt_title']		= trim(strip_tags($this->match('/<div class="su-accordion su-u-trim">.*?<div class="su-spoiler-title".*?>.*?<span class="su-spoiler-icon">.*?<\/span>(.*?)<\/div>.*?<div class="su-spoiler-content su-u-clearfix su-u-trim">.*?<\/div>.*?<\/div>.*?<\/div>/ms', $links, 1)));


		$arr['mods_alt_desc']		= $this->match('/<div class="faq-description hidden.*?>(.*?)<\/div>/ms', $links, 1);	
		$arr['mods_alt_desc']		= str_replace('&nbsp;', '', $arr['mods_alt_desc']);	
		  
		$arr['version']				= $this->match('/<\/svg>.*?Latest Version.*?<\/th>.*?<td.*?>(.*?)<\/td>/ms', $links, 1);	
		$arr['version']				= str_replace('v', '', $arr['version']);	
		$arr['sizes_apkdownload']	= $this->match('/<\/svg>.*?Size.*?<\/th>.*?<td.*?>(.*?)<\/td>/ms', $links, 1);	
		$arr['sizes_sources']		= $this->match('/<\/svg>.*?Size.*?<\/th>.*?<td.*?>(.*?)<\/td>/ms', $links, 1);
		 
		$arr['genres_web']			= $this->match('/<\/svg>.*?Category.*?<\/th>.*?<td.*?<a.*?>(.*?)<\/a>/ms', $links, 1);		
		$genres_webs				= $arr['genres_web'];		

		$arr['developer_web']		= $this->match('/<\/svg>.*?Publisher.*?<\/th>.*?<td.*?>(.*?)<\/td>/ms', $links, 1);		
		$developer_web				= $arr['developer_web'];
		
		$arr['updated_web']			= $this->match('/<\/svg>.*?Last Updated.*?<\/th>.*?<td.*?>(.*?)<\/td>/ms', $links, 1);		
		$updated_web				= $arr['updated_web'];
		
		$arr['article_content']		= $this->match('/<div class="sm:mt-5 mt-10 leading-relaxed.*?post-description.*?">(.*?)<\/div>.*?<div class=\'flex justify-center py-2\'><\/div>.*?<center>/ms', $links, 1);
		$arr['article_content']		= preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<h(.*?) id=".*?">/is', '<h$1>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<img.*?>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<figure.*?figure>/is', '',  $arr['article_content']);
		$article_content			= $arr['article_content']; 
 
		$arr['poster_web']			= $this->match('/<div class="img md.*?">.*?<img src="(.*?)".*?>.*?<\/div>/ms', $links, 1);		
		$poster_web					= $arr['poster_web'];
		
		$arr['download_links_page']			= $this->match('/<div.*?id="download">.*?<a href="(.*?)".*?<\/a>.*?<\/div>/ms', $links, 1); 
		$arr['download_links_page_alt']		= $this->match('/<div.*?id="download">.*?<a href="(.*?)".*?<\/a>.*?<\/div>/ms', $links, 1);		
		if ($arr['download_links_page'] === FALSE or $arr['download_links_page'] == '') $arr['download_links_page'] = $arr['download_links_page_alt'];	
		
		$download_links_pages_html			= $arr['download_links_page'];		
		$download_links_pages				= $this->geturl("${download_links_pages_html}");
		 
		$arr['downloadlinkx2']				= $this->match('/<h2 style="text-align: center">Download.*?For Android<\/h2>.*?<p style="text-align: center">.*?<a.*?href="(.*?)">.*?<\/a>/ms', $download_links_pages, 1);	
		$arr['namedownloadlinkx2']			= $this->match('/<title>(.*?)<\/title>/ms', $download_links_pages, 1);	
		
		$arr['downloadlinks_gma']			= $this->match_all('/<a.*?href="(.*?)".*?>.*?<\/a>/ms', $this->match('/<div class="pt-8">.*?<ul>(.*?)<\/ul>.*?<\/div>/ms', $download_links_pages, 1), 1);		 
		 
		$arr['name_downloadlinks_gma']		= $this->match_all('/<span class="closed.*?>(.*?)\<div.*?<\/span>/ms', $this->match('/<div class="pt-8">.*?<ul>(.*?)<\/ul>.*?<\/div>/ms', $download_links_pages, 1), 1);		 
		 
		$arr['size_downloadlinks_gma']		= $this->match_all('/<div.*?class="downloadLink.*?">.*?<\/svg>(.*?)<\/a>/ms', $this->match('/<div class="pt-8">.*?<ul>(.*?)<\/ul>.*?<\/div>/ms', $download_links_pages, 1), 1);	
		$arr['size_downloadlinks_gma']		= str_replace('APK ', '', $arr['size_downloadlinks_gma']);		 
		 		
		 
		$download_links_pages_html_alts		= $arr['downloadlinks_gma'][0];		  	 		
		  		
		if ($arr['downloadlinks_gma'][1]) {
		$download_links_pages_html_alts_1	= $arr['downloadlinks_gma'][1]; 
		}	 		
		if ($arr['downloadlinks_gma'][2]) {
		$download_links_pages_html_alts_2	= $arr['downloadlinks_gma'][2]; 
		}	 		
		if ($arr['downloadlinks_gma'][3]) {
		$download_links_pages_html_alts_3	= $arr['downloadlinks_gma'][3]; 
		}	 		
		if ($arr['downloadlinks_gma'][4]) {
		$download_links_pages_html_alts_4	= $arr['downloadlinks_gma'][4]; 
		}			
		if ($arr['downloadlinks_gma'][5]) {
		$download_links_pages_html_alts_5	= $arr['downloadlinks_gma'][5]; 
		}		 
		 
		$download_links_pages_alt			= $this->geturl("${download_links_pages_html_alts}");
		
		if ($download_links_pages_html_alts_1) { 
		$download_links_pages_alt_1			= $this->geturl("${download_links_pages_html_alts_1}");
		}
		
		if ($download_links_pages_html_alts_2) { 
		$download_links_pages_alt_2			= $this->geturl("${download_links_pages_html_alts_2}");
		}
		
		if ($download_links_pages_html_alts_3) { 
		$download_links_pages_alt_3			= $this->geturl("${download_links_pages_html_alts_3}");
		}
		
		if ($download_links_pages_html_alts_4) { 
		$download_links_pages_alt_4			= $this->geturl("${download_links_pages_html_alts_4}");
		}
		
		if ($download_links_pages_html_alts_5) { 
		$download_links_pages_alt_5			= $this->geturl("${download_links_pages_html_alts_5}");
		}
		
		$arr['downloadlink_gma']			= $this->match('/<div class="mt-4.*?>.*?<a href="(.*?)".*?<\/a>.*?<\/div>/ms', $download_links_pages_alt, 1);
		
		$arr['downloadlink_gma_1']			= $this->match('/<div class="mt-4.*?>.*?<a href="(.*?)".*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_1, 1);
		
		$arr['downloadlink_gma_2']			= $this->match('/<div class="mt-4.*?>.*?<a href="(.*?)".*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_2, 1);
		
		$arr['downloadlink_gma_3']			= $this->match('/<div class="mt-4.*?>.*?<a href="(.*?)".*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_3, 1);
		
		$arr['downloadlink_gma_4']			= $this->match('/<div class="mt-4.*?>.*?<a href="(.*?)".*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_4, 1);
		
		$arr['downloadlink_gma_5']			= $this->match('/<div class="mt-4.*?>.*?<a href="(.*?)".*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_5, 1);
		 
		/* 	 
		$arr['namedownloadlink_gma']		= $this->match_all('/<span.*?>(.*?)<\/span>/ms', $this->match('/<div class="pt-8">.*?<ul>(.*?)<\/ul>.*?<\/div>/ms', $download_links_pages_alt, 1), 1);		
		
		$arr['sizedownloadlink_gma']		= $this->match_all('/<a.*?>.*?([0-9a-zA-Z]+)<\/a>/ms', $this->match('/<div class="su-accordion su-u-trim">(.*?)<p>Your file is now ready.*?<strong>/ms', $download_links_pages_alt, 1), 1);		
		
		$arr['typedownloadlink_gma']		= $this->match_all('/<a.*?>.*?([a-zA-Z]+).*?<\/a>/ms', $this->match('/<div class="su-accordion su-u-trim">(.*?)<p>Your file is now ready.*?<strong>/ms', $download_links_pages_alt, 1), 1);		
		*/
		require_once 'play.store.local.php';
		return $arr;
		}
		
		private function get_web_id_from_search($title, $engine = "yahoo"){
				switch ($engine) {
					//case "google":  $nextEngine = "bing";  break;  
					//case "bing":    $nextEngine = "ask";   break;
					case "google":  $nextEngine = "bing";  break;			
					case "bing":    $nextEngine = "ask";   break;
					case "ask":    $nextEngine = "yandex";   break;
					case "yandex":    $nextEngine = "duckduckgo";   break;
					case "duckduckgo":     $nextEngine = FALSE;   break;
					case FALSE:     return NULL;
					default:        return NULL;
		}
		$url = "http://www.${engine}.com/search?q=getmodsapk.com+" . rawurlencode($title);
		$ids = $this->match_all('/<a.*?href="https:\/\/getmodsapk.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
		if (!isset($ids[0]) || empty($ids[0])) //if search failedhttps://an1.com/
			return $this->get_web_id_from_search($title, $nextEngine); 
		else
			return $ids[0];
		}
		private function decode($string, $action = 'e') {
		  $secret_key = 'drivekey';
		  $secret_iv = 'google';
		  $output = false;
		  $encrypt_method = "AES-256-CBC";
		  $key = hash( 'sha256', $secret_key );
		  $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
		  if( $action == 'e' ) {
			$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
		  }else if( $action == 'd' ){
			$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
		  }
		  return $output;
		}
		private function geturl($url){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				$ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
				//$ip=172.69.70.6;
				curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
				//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0");
				curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com");
				curl_setopt($ch, CURLOPT_AUTOREFERER, true);
				$html = curl_exec($ch);
				curl_close($ch);
				return $html;
		}
		private function match_all_key_value($regex, $str, $keyIndex = 1, $valueIndex = 2){
				$arr = array();
				preg_match_all($regex, $str, $matches, PREG_SET_ORDER);
				foreach($matches as $m){
					$arr[$m[$keyIndex]] = $m[$valueIndex];
				}
				return $arr;
		}
		private function match_all($regex, $str, $i = 0){
				if(preg_match_all($regex, $str, $matches) === false)
					return false;
				else
					return $matches[$i];
		}
		private function match($regex, $str, $i = 0){
				if(preg_match($regex, $str, $match) == 1)
					return $match[$i];
				else
					return false;
		}
}