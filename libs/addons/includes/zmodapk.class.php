<?php 
class starting_now{	
	public function get_web_info($title) {
		$getLinkID						= $this->get_web_id_from_search(trim($title));
		if($getLinkID === NULL){
		$arr							= array();
		$arr['error']					= "No Title found in Search Results!";
		return $arr;
		} 
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID) {
		$arr							= array();	 	 
		if(isset($_POST['wp_sb'])) {		
		$sources						= $_POST['wp_url'];
		} else {		
		//https://zmodapk.net/games/stumble-guys
		$sources						= "https://zmodapk.net/".trim($getLinkID)."/";
		}
		return $this->scrape_web_info($sources);
	}
	public function scrape_web_info($sources) {	
		require_once 'ssl.php';	
		$linksX							= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links							= file_get_contents($linksX); 
		
		$arr							= array();
		$linksX1						= $this->geturl("${sources}");	
		 
		$arr['id_ps_gp_alts']			= $this->match('/<th>Get it On<\/th>.*?<td>.*?<a href=".*?\?id=(.*?)\&.*?".*?> .*?<img.*?alt="Google Play".*?>.*?<\/a>.*?<\/td>.*?<\/tr>/ms', $links, 1); 	
		$arr['id_ps_gp']				= $this->match('/<th>Get it On<\/th>.*?<td>.*?<a href=".*?\?id=(.*?)".*?> .*?<img.*?alt="Google Play".*?>.*?<\/a>.*?<\/td>.*?<\/tr>/ms', $links, 1);
		
		$arr['title_id'] 			= $this->match('/<th>Get it On<\/th>.*?<td>.*?<a href=".*?\?id=(.*?)\&.*?".*?> .*?<img.*?alt="Google Play".*?>.*?<\/a>.*?<\/td>.*?<\/tr>/ms', $links, 1); 	
		
		$arr['title_id_alt']		= $this->match('/<th>Get it On<\/th>.*?<td>.*?<a href=".*?\?id=(.*?)".*?> .*?<img.*?alt="Google Play".*?>.*?<\/a>.*?<\/td>.*?<\/tr>/ms', $links, 1);
		 
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
		   
		$titleId						= $title_id;
		
		$arr['title']					= str_replace(array('zModAPK.net', 'APKMOD', 'APKDownload.cc', 'apkmod.cc', 'APKMod.cc', 'APKDown.cc', '&#8211;', '&#8211;', '-', 'for Android', '+', 'Download'), '', $this->match('/<h1 class="h5.*?">(.*?)<\/h1>/ms', $links, 1));
		$arr['title']					= preg_replace('/\s+/', ' ', $arr['title']);
		
		$arr['title2']					= trim(strip_tags($this->match('/<div class="table-cell">.*?<h1 title="(.*?)" class="marginZero.*?">.*?<\/h1>.*?<\/div>/ms', $links, 1)));
		
		$arr['title_alt']				= trim(strip_tags($this->match('/<div class="table-cell">.*?<h1 title="(.*?)" class="marginZero.*?">.*?<\/h1>.*?<\/div>/ms', $links, 1)));
		
		if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title_alt'];	
		
		$arr['title_web']				= $this->match('/<a class="withoutripple ".*?>(.*?)<\/a>.*?<svg class="icon chevron-icon">/ms', $links, 1);		
		$title_webs						= $arr['title_web'];
		
		$arr['title']					= str_replace('[', '(', $arr['title']);
		$arr['title']					= str_replace(']', ')', $arr['title']);
		$arr['title']					= str_replace('download', '', $arr['title']);
		$arr['title2']					= str_replace('(', ',', $arr['title2']);
		$arr['title2']					= str_replace(')', ',', $arr['title2']);
		$arr['title2']					= str_replace('/', ',', $arr['title2']);	
		 
        $arr['mods']					= str_replace(array('APKDownload.cc', 'MOD ', 'Download'), '', $this->match('/<h1 class="h5.*?">.*?\((.*?)\).*?<\/h1>/ms', $links, 1));

        $arr['mods2']					= $this->match('/<div id="more-info.*?".*?>.*?<div class="pt-3 px-3">(.*?)<\/div>.*?<\/div>/ms', $links, 1);
		$arr['mods2']					= preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['mods2']);
		$arr['mods2']					= preg_replace('/<h2.*?>.*?<\/h2>.*?<br>.*?<br>.*?<br>.*?/is', '',  $arr['mods2']);
		$arr['mods2']					= preg_replace('/<strong>Note.*?<\/strong>.*?<br>.*?<br>.*?<\/div>.*?/is', '',  $arr['mods2']);

		$arr['mods3']					= $this->match('/<div id="more-info.*?".*?>.*?<div class="pt-3 px-3">(.*?)<\/div>.*?<\/div>/ms', $links, 1);
        if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];
 
		$arr['mods_alt_title']			= trim(strip_tags($this->match('/<a.*?href="#more-info.*?" aria-expanded="false">(.*?)<\/a>/ms', $links, 1)));
		
		$arr['mods_alt_desc']			= $this->match('/<div id="more-info.*?".*?>.*?<div class="pt-3 px-3">(.*?)<\/div>.*?<\/div>/ms', $links, 1);
		$arr['mods_alt_desc_2']			= trim($this->match('/<div.*?id="whatsnew">.*?<div class="notes">.*?<h3.*?>.*?<\/h3>(.*?)<strong>.*?Notes.*?<\/strong>.*?<div.*?id="description">/ms', $links, 1));
		$arr['mods_alt_desc']			= preg_replace('/<br>/is', '',  $arr['mods_alt_desc']);		 
		$arr['mods_alt_desc_2']			= preg_replace('/<br>/is', '',  $arr['mods_alt_desc_2']);		 
		if ($arr['mods_alt_desc'] === FALSE or $arr['mods_alt_desc'] == '') $arr['mods_alt_desc'] = $arr['mods_alt_desc_2'];
		
		$arr['genres_web']				= $this->match('/<tr>.*?<th>Genre<\/th>.*?<td><a.*?>(.*?)</a><\/td>.*?<\/tr>/ms', $links, 1);		
		$genres_webs					= $arr['genres_web'];
		
		$arr['developer_web']			= $this->match('/<tr>.*?<th>Publisher<\/th>.*?<td><a.*?>(.*?)</a><\/td>.*?<\/tr>/ms', $links, 1);		
		$arr['developer_web']			= str_replace('By', '', $arr['developer_web']);
		$developer_web					= $arr['developer_web'];
		$developer_web					= str_replace('By', '', $developer_web);
		
		$arr['version']					= $this->match('/<tr>.*?<th>Version<\/th>.*?<td>(.*?)\(.*?<\/td>.*?<\/tr>/ms', $links, 1);
		
		$arr['version_web']				= $arr['version'];
		$version_web					= $arr['version_web'];
		
					
		$arr['sizes_apkdownload']		= $this->match('/<tr>.*?<th>Size<\/th>.*?<td>(.*?)<\/td>.*?<\/tr>/ms', $links, 1);
		
		$arr['sizes_web']				= $this->match('/<tr>.*?<th>Size<\/th>.*?<td>(.*?)<\/td>.*?<\/tr>/ms', $links, 1);
		/* 
		print_r($arr['sizes_web']);
		 */
		$arr['sizes_sources']			= $arr['sizes_web'];
		
		$arr['article_content']			= $this->match('/<div class="mb-3 entry-content">(.*?)<\/div>.*?<h2 id="download"/ms', $links, 1);
		$arr['article_content']			= preg_replace('/<a.*?>(.*?)<\/a>/is', '$1',  $arr['article_content']);
		$arr['article_content']			= preg_replace('/<span.*?>/is', '',  $arr['article_content']); 
		$arr['article_content']			= preg_replace('/<\/span>/is', '',  $arr['article_content']);
		$arr['article_content']			= preg_replace('/<h(.*?) id=".*?">/is', '<h$1>',  $arr['article_content']);
		$arr['article_content']			= preg_replace('/<p><img.*?<\/noscript><\/p>/is', ' ',  $arr['article_content']);
		$arr['article_content']			= preg_replace('/<p style=".*?"><img.*?<\/noscript><\/p>/is', ' ',  $arr['article_content']);
		$arr['article_content']			= preg_replace('/<div.*?>/is', ' ',  $arr['article_content']); 
		$arr['article_content']			= preg_replace('/<\/div>/is', ' ',  $arr['article_content']);
		/* $arr['article_content']			= preg_replace('/\s+\s+/', ' ', $arr['article_content']); */
		$article_content				= $arr['article_content'];
		 
		$arr['poster_web']				= $this->match('/<img class="rounded-lg mb-3 lazyloaded".*?src="(.*?)">/ms', $links, 1);		
		$poster_web						= $arr['poster_web'];
		 
		$arr['canonical']				= $this->match('/<link rel="canonical" href="(.*?)" \/>/ms', $links, 1);

		
		$arr['download_links_page']		= $arr['canonical'].'?download';
		
				
		$arr['dwps']					= $this->match('/<h2 id="download".*?>.*?<\/h2>.*?<a class="btn btn-secondary btn-block mb-3" href="(.*?)" rel="nofollow">.*?<\/svg>.*?<\/a>.*?<div class="text-center border-top border-bottom d-flex align-items-center justify-content-center py-3 mb-3">/ms', $links, 1);
		$download_links_pages_htmlS		= $arr['dwps'];		
		$download_links_pages_ALT		= $this->geturl("${download_links_pages_htmlS}"); 
		
		$arr['downloadlinks_gma']			= $this->match_all('/<a class="btn btn-secondary px-5" href="(.*?)".*?<\/a>/ms', $this->match('/<main id="primary".*?>(.*?)<\/main>/ms', $download_links_pages_ALT, 1), 1);		 

		$arr['name_downloadlinks_gma']		= $this->match_all('/<a class="h6.*?>.*?<span>(.*?)<\/span>.*?<\/a>/ms', $this->match('/<main id="primary".*?>(.*?)<\/main>/ms', $download_links_pages_ALT, 1), 1);	  

		/* $arr['name_downloadlink_gma']		= $arr['name_downloadlinks_gma']; */

		$arr['size_downloadlinks_gma']		= $this->match_all('/<a class="btn btn-secondary px-5".*?>.*?<span class="align-middle">.*?<span class="text-uppercase">.*?<\/span>.*?\((.*?)\).*?<\/span>.*?<\/a>/ms', $this->match('/<main id="primary".*?>(.*?)<\/main>/ms', $download_links_pages_ALT, 1), 1);	 
		$arr['size_downloadlinks_gma']		= str_replace('APK ', '', $arr['size_downloadlinks_gma']);
		 
		$arr['type_downloadlinks_gma'] 		= $this->match_all('/<a class="btn btn-secondary px-5".*?<span class="text-uppercase">(.*?)<\/span>.*?<\/a>/ms', $this->match('/<main id="primary".*?>(.*?)<\/main>/ms', $download_links_pages_ALT, 1), 1);		
		 
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
		/*
		<div id="download" class="text-center mb-4".*?>.*?<a class="btn-secondary-click btn btn-secondary px-5" href="(.*?)".*?>.*?<\/a>.*?<\/div>
									*/
		$arr['downloadlink_gma']			= $this->match('/<div id="download" class="text-center mb-4".*?>.*?<a class="btn-secondary-click btn btn-secondary px-5" href="(.*?)".*?>.*?<\/a>.*?<\/div>/ms', $download_links_pages_alt, 1);
		
		$arr['downloadlink_gma_1']			= $this->match('/<div id="download" class="text-center mb-4".*?>.*?<a class="btn-secondary-click btn btn-secondary px-5" href="(.*?)".*?>.*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_1, 1);
		
		$arr['downloadlink_gma_2']			= $this->match('/<div id="download" class="text-center mb-4".*?>.*?<a class="btn-secondary-click btn btn-secondary px-5" href="(.*?)".*?>.*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_2, 1);
		
		$arr['downloadlink_gma_3']			= $this->match('/<div id="download" class="text-center mb-4".*?>.*?<a class="btn-secondary-click btn btn-secondary px-5" href="(.*?)".*?>.*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_3, 1);
		
		$arr['downloadlink_gma_4']			= $this->match('/<div id="download" class="text-center mb-4".*?>.*?<a class="btn-secondary-click btn btn-secondary px-5" href="(.*?)".*?>.*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_4, 1);
		
		$arr['downloadlink_gma_5']			= $this->match('/<div id="download" class="text-center mb-4".*?>.*?<a class="btn-secondary-click btn btn-secondary px-5" href="(.*?)".*?>.*?<\/a>.*?<\/div>/ms', $download_links_pages_alt_5, 1);	 
	 
	 
		$arr['type_downloadlink_gma']		= $arr['type_downloadlinks_gma'][0];
		
		$arr['type_downloadlink_gma_1']		= $arr['type_downloadlinks_gma'][1];
		
		$arr['type_downloadlink_gma_2']		= $arr['type_downloadlinks_gma'][2];
		
		$arr['type_downloadlink_gma_3']		= $arr['type_downloadlinks_gma'][3];
		
		$arr['type_downloadlink_gma_4']		= $arr['type_downloadlinks_gma'][4];
		
		$arr['type_downloadlink_gma_5']		= $arr['type_downloadlinks_gma'][5];
		
		require_once 'play.store.local.php';	
		 
		return $arr;
		}
		
		private function get_web_id_from_search($title, $engine = "google"){
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
		$url		= "https://${engine}.com/search?q=zmodapk.net+" . rawurlencode($title);
		$ids		= $this->match_all('/<a.*?href="https:\/\/zmodapk.net\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
		if (!isset($ids[0]) || empty($ids[0])) //if search failed
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
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
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