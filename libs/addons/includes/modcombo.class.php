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
		$sources					= "https://modcombo.com/" . trim($getLinkID) . ".html";
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
		 
		$arr['title_id']			= $this->match('/Google Play Link.*?<a href=".*?\?id=(.*?)\&.*?".*?<span class="ch-play">/ms', $links, 1);
		
		$arr['title_id_alt']		= $this->match('/Google Play Link.*?<a href=".*?\?id=(.*?)".*?<span class="ch-play">/ms', $links, 1);
		 
		
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
	
		 
		$arr['title']				= str_replace(array('modyolo.com', 'mod apk', 'mod', 'apk', '-', 'for Android', '+', 'Download'), '', $this->match('/<h1 class="page-title">(.*?)<\/h1>/ms', $links, 1));
		$arr['title']				= preg_replace('/\s+/', ' ', $arr['title']);
		
		
		$arr['title2']				= trim(strip_tags($this->match('/<figure class="thumb">.*?<img.*?alt="Icon(.*?)">.*?<\/figure>/ms', $links, 1)));
		if(!$arr['title']) $arr['title'] = $arr['title2'];
		
		$arr['title_web']			= $this->match('/<th>Name<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);		
		$title_webs					= $arr['title_web'];
		
		 
        $arr['mods']				= str_replace(array('modcombo.com', 'modcombo', 'mod apk', 'mod', 'apk', '-', 'for Android', '+', 'Download'), '', $this->match('/<th>MOD<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1));
        $arr['mods2']				= $this->match('/<h1 class="page-title">.*?\((.*?)\).*?<\/h1>/ms', $links, 1);
		$arr['mods2']				= preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['mods2']);
		if(!$arr['mods']) $arr['mods'] = $arr['mods2'];		
		 
 
		$arr['version']				= $this->match('/<th>Last version<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
		$version_web				= $arr['version'];
		$arr['version_web']			= $arr['version'];
		$arr['sizes_apkdownload']	= $this->match('/<tr>.*?<th>Size<\/th>.*?<td>(.*?)<\/td>.*?<\/tr>/ms', $links, 1);
		$arr['sizes_sources']		= $arr['sizes_apkdownload'];
		
		$arr['genres_web']			= $this->match('/<th>Category<\/th>.*?<td><a.*?>(.*?)<\/a><\/td>/ms', $links, 1);		
		$genres_webs				= $arr['genres_web'];
		
		
		$arr['developer_web']		= $this->match('/<th>Developer<\/th>.*?<td><a.*?>(.*?)<\/a><\/td>/ms', $links, 1);		
		$developer_web				= $arr['developer_web'];
		
		$arr['updated_web']			= $this->match('/<th>Updated<\/th>.*?<td><time.*?>(.*?)<\/time><\/td>/ms', $links, 1);		
		$updated_web				= $arr['updated_web'];
		
		
		$arr['article_content']		= $this->match('/<div.*?id="content-desc">(.*?)<div class="entry-download text-center mb-20" id="content-download">/ms', $links, 1);
		$arr['article_content']		= preg_replace('/<a.*?<\/a>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<figure.*?figure>.*?<p>/is', '<p>',  $arr['article_content']);

		$arr['article_content']		= preg_replace('/<div class="ads123".*?<\/div>.*?<p>/is', '<p>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<div><p class="txt-ads".*?<\/p><\/div>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<\/p><\/div>.*?<\/div>/is', '</p>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<div id="contentMakeToc" class="wrapcontent"><p>/is', '<p>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<img.*?>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/\s+\s+/', ' ', $arr['article_content']);
		
		$article_content			= $arr['article_content'];

		$arr['poster_web']			= $this->match('/<figure class="thumb">.*?<img src="(.*?)".*?>.*?<\/figure>/ms', $links, 1);		
		$poster_web					= $arr['poster_web'];		
		
		$arr['download_link_2']		= $this->match('/<div.*?id="btn-download-1">.*?<a href="(.*?)".*?<\/a>/ms', $links, 1);
		
		$arr['download_links_page'] = $arr['download_link_2'];
		$download_links_pages_html	= $arr['download_links_page'];
		$download_links_pages		= $this->geturl("${download_links_pages_html}");
		$arr['mods_alt_title']		= $this->match('/<h3>.*?<span.*?>(.*?)<\/span>.*?<\/h3>/ms', $download_links_pages, 1);
		$arr['mods_alt_desc']		= $this->match('/<div class="wrapcontent">.*?<h3>.*?<\/h3>(.*?)<\/div>/ms', $download_links_pages, 1);
		 
		$arr['downloadlinks_gma']				= $this->match_all('/<div class="item item-apk">.*?<a href="(.*?)".*?<\/a>/ms', $this->match('/<article.*?<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);		
		
		$arr['downloadlinks_gma_alt']			= $this->match_all('/<a href="(.*?)".*?<\/a>/ms', $this->match('/<div id="bh-original" class="sbhTitle mb-20">(.*?)<div class="ads12 box-space">/ms', $download_links_pages, 1), 1);		
		if(!$arr['downloadlinks_gma']) $arr['downloadlinks_gma'] = $arr['downloadlinks_gma_alt'];
		
		$arr['name_downloadlinks_gma']			= $this->match_all('/<a.*?title="(.*?)\[.*?".*?<\/a>/ms', $this->match('/<article.*?<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);		
		$arr['name_downloadlinks_gma_alt']		= $this->match_all('/<a.*?title="(.*?)\[.*?".*?<\/a>/ms', $this->match('/<article.*?<div class="sbhTitle mb-20">.*?<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);		
		if(!$arr['name_downloadlinks_gma']) $arr['name_downloadlinks_gma'] = $arr['name_downloadlinks_gma_alt'];
		 
		$arr['size_downloadlinks_gma']			= $this->match_all('/<a.*?title=".*?\[(.*?)\].*?">/ms', $this->match('/<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);		
		$arr['size_downloadlinks_gma_alt']		= $this->match_all('/<a.*?title=".*?\[(.*?)\].*?">/ms', $this->match('/<div id="bh-original" class="sbhTitle mb-20">(.*?)<div class="ads12 box-space">/ms', $download_links_pages, 1), 1);
		if(!$arr['size_downloadlinks_gma']) $arr['size_downloadlinks_gma'] = $arr['size_downloadlinks_gma_alt'];
 
		$arr['mods_alt_title']		= trim($this->match('/<div class="entry-mod mb-20">.*?<div class="accordion.*?">.*?<span>(.*?)<\/span>/ms', $links, 1));
		
 
		$arr['mods_alt_desc']		= $this->match('/<div class="bc-body wrap-box-mod">(.*?)<div class="links">/ms', $download_links_pages, 1);
		$arr['mods_alt_desc_2']		= trim($this->match('/<div class="entry-mod mb-20">.*?<div class="accordion.*?">.*?<div class="abody wrapcontent">(.*?)<\/div>/ms', $links, 1));
		$arr['mods_alt_desc']		= preg_replace('/<br>/is', '',  $arr['mods_alt_desc']);		 
		$arr['mods_alt_desc_2']		= preg_replace('/<br>/is', '',  $arr['mods_alt_desc_2']);		 
		if ($arr['mods_alt_desc'] === FALSE or $arr['mods_alt_desc'] == '') $arr['mods_alt_desc'] = $arr['mods_alt_desc_2'];
		
		if ($arr['downloadlinks_gma'][0]) {
		$download_links_pages_html_alts 		= $arr['downloadlinks_gma'][0];		  	 		
		}  		
		if ($arr['downloadlinks_gma'][1]) {
		$download_links_pages_html_alts_1		= $arr['downloadlinks_gma'][1]; 
		}	 		
		if ($arr['downloadlinks_gma'][2]) {
		$download_links_pages_html_alts_2		= $arr['downloadlinks_gma'][2]; 
		}	 		
		if ($arr['downloadlinks_gma'][3]) {
		$download_links_pages_html_alts_3		= $arr['downloadlinks_gma'][3]; 
		}	 		
		if ($arr['downloadlinks_gma'][4]) {
		$download_links_pages_html_alts_4		= $arr['downloadlinks_gma'][4]; 
		}			
		if ($arr['downloadlinks_gma'][5]) {
		$download_links_pages_html_alts_5		= $arr['downloadlinks_gma'][5]; 
		}		 
		
		if ($arr['downloadlinks_gma'][0]) { 
		$download_links_pages_alt				= $this->geturl("${download_links_pages_html_alts}");
		}
		if ($arr['downloadlinks_gma'][1]) {
		$download_links_pages_alt_1				= $this->geturl("${download_links_pages_html_alts_1}");
		}
		
		if ($arr['downloadlinks_gma'][2]) {
		$download_links_pages_alt_2				= $this->geturl("${download_links_pages_html_alts_2}");
		}
		
		if ($arr['downloadlinks_gma'][3]) {
		$download_links_pages_alt_3				= $this->geturl("${download_links_pages_html_alts_3}");
		}
		
		if ($arr['downloadlinks_gma'][4]) {
		$download_links_pages_alt_4				= $this->geturl("${download_links_pages_html_alts_4}");
		}
		
		if ($arr['downloadlinks_gma'][5]) {
		$download_links_pages_alt_5				= $this->geturl("${download_links_pages_html_alts_5}");
		}
		if ($arr['downloadlinks_gma'][0]) { 
		$arr['downloadlink_gma']				= $this->match('/<script>.*?href = "(.*?)".*?<\/script>/ms', $download_links_pages_alt, 1);		
		}
		if ($arr['downloadlinks_gma'][1]) { 
		$arr['downloadlink_gma_1']				= $this->match('/<script>.*?href = "(.*?)".*?<\/script>/ms', $download_links_pages_alt_1, 1);
		}
		if ($arr['downloadlinks_gma'][2]) { 		
		$arr['downloadlink_gma_2']				= $this->match('/<script>.*?href = "(.*?)".*?<\/script>/ms', $download_links_pages_alt_2, 1);
		}
		if ($arr['downloadlinks_gma'][3]) { 
		$arr['downloadlink_gma_3']				= $this->match('/<script>.*?href = "(.*?)".*?<\/script>/ms', $download_links_pages_alt_3, 1);
		}
		if ($arr['downloadlinks_gma'][4]) { 
		$arr['downloadlink_gma_4']				= $this->match('/<script>.*?href = "(.*?)".*?<\/script>/ms', $download_links_pages_alt_4, 1);
		}
		if ($arr['downloadlinks_gma'][5]) { 
		$arr['downloadlink_gma_5']				= $this->match('/<script>.*?href = "(.*?)".*?<\/script>/ms', $download_links_pages_alt_5, 1);
		}
		
		$arr['name_downloadlink_gma']		= $arr['name_downloadlinks_gma'][0]; 
		
		$arr['name_downloadlink_gma_1']		= $arr['name_downloadlinks_gma'][1];
		
		$arr['name_downloadlink_gma_2']		= $arr['name_downloadlinks_gma'][2];
		  
		$arr['name_downloadlink_gma_3']		= $arr['name_downloadlinks_gma'][3];
		
		$arr['name_downloadlink_gma_4']		= $arr['name_downloadlinks_gma'][4];
		
		$arr['name_downloadlink_gma_5']		= $arr['name_downloadlinks_gma'][5];
		
		if ($arr['downloadlinks_gma'][0]) {  
		$arr['type_downloadlink_gma']		= $this->match('/<script>.*?href = ".*?\.Com.(.*?)".*?<\/script>/ms', $download_links_pages_alt, 1);
		}
		if ($arr['downloadlinks_gma'][1]) {  
		$arr['type_downloadlink_gma_1']		= $this->match('/<script>.*?href = ".*?\.Com.(.*?)".*?<\/script>/ms', $download_links_pages_alt_1, 1);
		}
		if ($arr['downloadlinks_gma'][2]) {  
		$arr['type_downloadlink_gma_2']		= $this->match('/<script>.*?href = ".*?\.Com.(.*?)".*?<\/script>/ms', $download_links_pages_alt_2, 1);
		}
		if ($arr['downloadlinks_gma'][3]) {  
		$arr['type_downloadlink_gma_3']		= $this->match('/<script>.*?href = ".*?\.Com.(.*?)".*?<\/script>/ms', $download_links_pages_alt_3, 1);
		}
		if ($arr['downloadlinks_gma'][4]) { 
		$arr['type_downloadlink_gma_4']		= $this->match('/<script>.*?href = ".*?\.Com.(.*?)".*?<\/script>/ms', $download_links_pages_alt_4, 1);
		}
		if ($arr['downloadlinks_gma'][5]) { 
		$arr['type_downloadlink_gma_5']		= $this->match('/<script>.*?href = ".*?\.Com.(.*?)".*?<\/script>/ms', $download_links_pages_alt_5, 1);
		} 
		
		 
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
		$url = "http://www.${engine}.com/search?q=modcombo.com+" . rawurlencode($title);
		$ids = $this->match_all('/<a.*?href="https:\/\/modcombo.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
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