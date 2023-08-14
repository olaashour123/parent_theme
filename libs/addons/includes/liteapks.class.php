<?php

class starting_now {	
	public function get_web_info($title)
	{
		$getLinkID = $this->get_web_id_from_search(trim($title));
		if($getLinkID === NULL){
			$arr = array();	 	 	 
				
			$arr['error'] = "No Title found in Search Results!";
			 
			return $arr;
		}
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID)
	{
		$arr = array();	
		if(isset($_POST['wp_sb'])) {		
		$sources					= $_POST['wp_url'];
		} else { 		
		$sources = "https://liteapks.com/".trim($getLinkID).".html";
		} 
		return $this->scrape_web_info($sources);
	}
	
	
	public function scrape_web_info($sources) {				
		require_once 'ssl.php';
		$linksX						= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links						= file_get_contents($linksX, false, stream_context_create($ssl)); 
		
		$arr						= array();
		$linksX1					= $this->geturl("${sources}");	
		
		
		$arr['title_id'] 			= $this->match('/Get it On.*?<td style="width: 55%;">.*?<a href=".*?\?id=(.*?)\&.*?".*?>.*?<img.*?src=".*?google-play.png" alt="Google Play">.*?<\/a>.*?<\/td>/ms', $links, 1);		
		
		$arr['title_id_alt']		= $this->match('/Get it On.*?<td style="width: 55%;">.*?<a href=".*?\?id=(.*?)".*?>.*?<img.*?src=".*?google-play.png" alt="Google Play">.*?<\/a>.*?<\/td>/ms', $links, 1);
		
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

		$arr['title']			= str_replace(array('modder.me', 'mod apk', 'mod', 'apk', '-', 'for Android', '+', 'Download'), '', $this->match('/<title>(.*?)<\/title>/ms', $links, 1));
		
		
		$arr['title2']			= trim(strip_tags($this->match('/<h1 class="lead font-weight-semibold">(.*?)<\/h1>/ms', $links, 1)));
		if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title2'];	
		 
		$arr['version']				= $this->match('/Latest Version.*?<td style=".*?">(.*?)<\/td>/ms', $links, 1);
		
		$arr['sizes_sources']		= $this->match('/Size.*?<td style=".*?">(.*?)<\/td>/ms', $links, 1);
		
		$arr['sizes_apkdownload']	= $arr['sizes_sources'];
		  
        $arr['mods']				= $this->match('/Mod Features<\/th>.*?<td.*?>(.*?)<\/td>/ms', $links, 1);
		
        $arr['mods2']				= $this->match('/<title>.*?\((.*?)\).*?<\/title>/ms', $links, 1); 
        if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];	
		
		
		/*
		<a class="rounded d-flex align-items-center py-2 px-3  toggler" data-toggle="collapse" href="#more-info-1">
MOD Info </a>
		*/
		
		$arr['mods_alt_title']			= trim(strip_tags($this->match('/<a.*?href="#more-info.*?".*?>(.*?)<\/a>/ms', $links, 1)));
		
		$arr['mods_alt_desc']			= $this->match('/<div id="more-info.*?".*?>.*?<div class="pt-3 px-3">(.*?)<\/div>.*?<div class="mb-3">/ms', $links, 1);
		$arr['mods_alt_desc_2']			= trim($this->match('/<div.*?id="whatsnew">.*?<div class="notes">.*?<h3.*?>.*?<\/h3>(.*?)<strong>.*?Notes.*?<\/strong>.*?<div.*?id="description">/ms', $links, 1));
		$arr['mods_alt_desc']			= preg_replace('/<br>/is', '',  $arr['mods_alt_desc']);		 
		$arr['mods_alt_desc_2']			= preg_replace('/<br>/is', '',  $arr['mods_alt_desc_2']);		 
		if ($arr['mods_alt_desc'] === FALSE or $arr['mods_alt_desc'] == '') $arr['mods_alt_desc'] = $arr['mods_alt_desc_2'];
		
		
		
		$arr['article_content']		= $this->match('/<div class="entry-content.*?>(.*?)<ul class="nav.*?list-shares">/ms', $links, 1);
		$arr['article_content']		= preg_replace('/<div class="mb-3">(.*?)<div>/is', '<div>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<h(.*?) class=".*?">/is', '<h$1>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<h(.*?) id=".*?">/is', '<h$1>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<h(.*?) style=".*?">/is', '<h$1>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<img.*?>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<figure.*?figure>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<div>/is', ' ',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<\/div>/is', ' ',  $arr['article_content']);		
		$arr['article_content']		= preg_replace('/<div class=.*?>/is', ' ',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<div id=.*?>/is', ' ',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<span style=.*?>/is', ' ',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<\/span>/is', ' ',  $arr['article_content']);	
		
		$article_content			= $arr['article_content']; 
		/*
		<a class="btn btn-primary btn-block mb-3" href="(.*?)".*?>.*?<\/a>
		
		*/
		$arr['download_links_page'] = $this->match('/<a class="btn btn-primary btn-block mb-3" href="(.*?)".*?>.*?<\/a>/ms', $links, 1);				
		
		$download_links_pages_html			= $arr['download_links_page'];		
		$download_links_pages				= $this->geturl("${download_links_pages_html}");
		
		/*
		<a.*?href="(.*?)".*?>
		
		<a class="h6 font-weight-semibold rounded d-flex align-items-center py-2 px-3 mb-0 collapsed toggler" data-toggle="collapse" href="#version-1">
v2.572.482 - Mod </a>
		*/
		
		$arr['downloadlinks_gma']			= $this->match_all('/<a class="btn btn-light btn-sm btn-block text-left d-flex align-items-center px-3".*?href="(.*?)".*?>/ms', $this->match('/<div id="accordion-versions".*?>(.*?)<div class="border rounded mb-3">/ms', $download_links_pages, 1), 1);
		 
		$arr['name_downloadlinks_gma']		= $this->match_all('/<a class="h6.*?" data-toggle=.*?>(.*?)<\/a>/ms', $this->match('/<div id="accordion-versions".*?>(.*?)<div class="border rounded mb-3">/ms', $download_links_pages, 1), 1);
		 
		$arr['size_downloadlinks_gma']		= $this->match_all('/<span class="text-muted d-block ml-auto">(.*?)<\/span>/ms', $this->match('/<div id="accordion-versions".*?>(.*?)<div class="border rounded mb-3">/ms', $download_links_pages, 1), 1);
		
		print_r( $arr['downloadlinks_gma']);
		echo '<br>';
		print_r( $arr['name_downloadlinks_gma']);
		echo '<br>';
		print_r( $arr['size_downloadlinks_gma']);
		
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
		 
		$download_links_pages_alt		= $this->geturl("${download_links_pages_html_alts}");
		
		if ($download_links_pages_html_alts_1) { 
		$download_links_pages_alt_1		= $this->geturl("${download_links_pages_html_alts_1}");
		}
		
		if ($download_links_pages_html_alts_2) { 
		$download_links_pages_alt_2		= $this->geturl("${download_links_pages_html_alts_2}");
		}
		
		if ($download_links_pages_html_alts_3) { 
		$download_links_pages_alt_3		= $this->geturl("${download_links_pages_html_alts_3}");
		}
		
		if ($download_links_pages_html_alts_4) { 
		$download_links_pages_alt_4		= $this->geturl("${download_links_pages_html_alts_4}");
		}
		
		if ($download_links_pages_html_alts_5) { 
		$download_links_pages_alt_5		= $this->geturl("${download_links_pages_html_alts_5}");
		}
		
		$arr['downloadlink_gma']		= $this->match('/<p id="download".*?<a id="click-here" href="(.*?)".*?>.*?<\/a>.*?<\/p>/ms', $download_links_pages_alt, 1);
		
		$arr['downloadlink_gma_1']		= $this->match('/<p id="download".*?<a id="click-here" href="(.*?)".*?>.*?<\/a>.*?<\/p>/ms', $download_links_pages_alt_1, 1);
		
		$arr['downloadlink_gma_2']		= $this->match('/<p id="download".*?<a id="click-here" href="(.*?)".*?>.*?<\/a>.*?<\/p>/ms', $download_links_pages_alt_2, 1);
		
		$arr['downloadlink_gma_3']		= $this->match('/<p id="download".*?<a id="click-here" href="(.*?)".*?>.*?<\/a>.*?<\/p>/ms', $download_links_pages_alt_3, 1);
		
		$arr['downloadlink_gma_4']		= $this->match('/<p id="download".*?<a id="click-here" href="(.*?)".*?>.*?<\/a>.*?<\/p>/ms', $download_links_pages_alt_4, 1);
		
		$arr['downloadlink_gma_5']		= $this->match('/<p id="download".*?<a id="click-here" href="(.*?)".*?>.*?<\/a>.*?<\/p>/ms', $download_links_pages_alt_5, 1);
		   
		 
		
		 
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
		$url = "http://www.${engine}.com/search?q=liteapks.com+" . rawurlencode($title);
		$ids = $this->match_all('/<a.*?href="https:\/\/liteapks.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
		if (!isset($ids[0]) || empty($ids[0])) // 
			return $this->get_web_id_from_search($title, $nextEngine); 
		else
			return $ids[0];
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