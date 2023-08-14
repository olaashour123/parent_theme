<?php 
class starting_now{	
	public function get_web_info($title) {
		$getLinkID		= $this->get_web_id_from_search(trim($title));
		if($getLinkID === NULL){
		$arr						= array();
		$arr['error']				= "No Title found in Search Results!";
		return $arr;
		} 
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID) {
		$arr						= array();	 	 
		if(isset($_POST['wp_sb'])) {		
		$sources					= $_POST['wp_url'];
		} else {		
		$sources					= "https://techbigs.com/" . trim($getLinkID) . "/";
		}
		return $this->scrape_web_info($sources);
	}
	public function scrape_web_info($sources) {	
		require_once 'ssl.php';	
		$linksX						= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links						=  file_get_contents($linksX); 
		
		$arr						= array();
		$linksX1					= $this->geturl("${sources}");	 
		
		$arr['title_id']			= $this->match('/Google Play Link.*?<\/th>.*?<td><a.*?>(.*?)\&.*?<\/a><\/td>.*?<\/tr>/ms', $links, 1);
		$arr['title_id_alt']		= $this->match('/Google Play Link.*?<\/th>.*?<td><a.*?>(.*?)<\/a><\/td>.*?<\/tr>/ms', $links, 1); 
		
		
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

		 
		$arr['title']				= trim(strip_tags($this->match('/<h1 class="page-title">(.*?)<\/h1>/ms', $links, 1)));
		$arr['title']				= preg_replace('/\s+/', ' ', $arr['title']);
		
		$arr['title_alts']			= str_replace(array('Free', ' Download', 'Free Download', '&#8211;', '&#8211;', '-', 'for Android', '+' ), '', $this->match('/<title>(.*?)<\/title>/ms', $links, 1));
		
		if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title_alts'];	
		
		$arr['title_web']			= $this->match('/<\/svg>.*?Name.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);		
		$title_webs					= $arr['title_web'];
		
		
        $arr['mods']				= $this->match('/MOD.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
		$arr['mods']				= preg_replace('/<a.*?>(.*?)<\/a>/is', '$1',  $arr['mods']); 

        $arr['mods2']				= $this->match('/<title>.*?\((.*?)\).*?<\/title>/ms', $links, 1);
        if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];
 
		$arr['mods_alt_title']		= trim(strip_tags($this->match('/<div role="tabpanel" class="tab-pane fade in active" id="whatsnew">.*?<h3.*?>(.*?)<\/h3>.*?<div role="tabpanel" class="tab-pane fade " id="description">/ms', $links, 1)));
		
		 

		$arr['mods_alt_desc']		= trim($this->match('/<span>MOD Features<\/span>.*?<div class="abody wrapcontent">(.*?)<\/div>/ms', $links, 1));
		$arr['mods_alt_desc']		= preg_replace('/<a.*?>(.*?)<\/a>/is', '$1',  $arr['mods_alt_desc']); 
		$arr['mods_alt_desc']		= preg_replace('/<div id="undefined">/is', '',  $arr['mods_alt_desc']);		 
		$arr['mods_alt_desc']		= preg_replace('/<div id="undefined">.*?<\/div>/is', '',  $arr['mods_alt_desc']);
		
		$arr['mods_alt_desc_2']		= trim($this->match('/<div.*?id="whatsnew">.*?<div class="notes">.*?<h3.*?>.*?<\/h3>(.*?)<strong>.*?Notes.*?<\/strong>.*?<div.*?id="description">/ms', $links, 1));
		$arr['mods_alt_desc_2']		= preg_replace('/<br>/is', '',  $arr['mods_alt_desc_2']);		
		$arr['mods_alt_desc_2']		= preg_replace('/<a.*?>(.*?)<\/a>/is', '$1',  $arr['mods_alt_desc_2']);  
		if ($arr['mods_alt_desc'] === FALSE or $arr['mods_alt_desc'] == '') $arr['mods_alt_desc'] = $arr['mods_alt_desc_2'];
		
		$arr['genres_web']			= $this->match('/Category.*?<\/th>.*?<td><a.*?>(.*?)<\/a><\/td>/ms', $links, 1);		
		$genres_webs				= $arr['genres_web'];
		
		$arr['developer_web']		= $this->match('/Developer.*?<\/th>.*?<td><a.*?>(.*?)<\/a><\/td>/ms', $links, 1);		
		$arr['developer_web']		= str_replace('By', '', $arr['developer_web']);
		$developer_web				= $arr['developer_web'];
		$developer_web				= str_replace('By', '', $developer_web); 
		$arr['version']				= $this->match('/Last version.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
		
		$arr['version_web']			= $arr['version'];
		$version_web				= $arr['version_web'];
		/*
		<tr>.*?<th>.*?<\/svg>.*?Size.*?<td>(.*?)<\/td>.*?<\/tr>
		
		*/
		$arr['sizes_apkdownload']	= $this->match('/<tr>.*?<th>.*?<\/svg>.*?Size.*?<td>(.*?)<\/td>.*?<\/tr>/ms', $links, 1);
		
		$arr['sizes_sources']		= $arr['sizes_apkdownload'];
		 
		$arr['updates_web']			= $this->match('/Updated.*?<\/th>.*?<td><time.*?>(.*?)<\/time><\/td>/ms', $links, 1);		
		$updates_web				= $arr['updates_web'];
		
		$arr['required_web']		= $this->match('/Compatible with.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
		$arr['required_web']		= str_replace('Android ', '', $arr['required_web']);		
		$required_web				= $arr['required_web'];
		
		$arr['article_content']		= $this->match('/<div id="contentMakeToc" class="wrapcontent">(.*?)<div class="entry-download text-center box-space">/ms', $links, 1);
		$arr['article_content']		= preg_replace('/<a.*?<\/a>/is', '',  $arr['article_content']); 
		$arr['article_content']		= preg_replace('/<figure.*?<\/figure>/is', '',  $arr['article_content']); 
		$arr['article_content']		= preg_replace('/<div><p class="txt-ads".*?<\/script><\/div>/is', '',  $arr['article_content']); 
		$arr['article_content']		= str_replace('</div>', '', $arr['article_content']);
		$arr['article_content']		= preg_replace('/\s+\s+/', ' ', $arr['article_content']);
		$article_content			= $arr['article_content'];

		$arr['poster_web']			= $this->match('/<div class="siteTitleBar">.*?<img.*?src="(.*?)">.*?<\/div>.*?<nav/ms', $links, 1);		
		$poster_web					= $arr['poster_web'];
		  
		/* $arr['download_links_page']		= $this->match('/<div class="box-share text-center mb-30">.*?<a href="(.*?)".*?<span>Download Now<\/span>.*?<\/a>/ms', $links, 1); */
		
		$arr['download_links_page']		= $this->match('/<div class="entry-download text-center box-space">.*?<a href="(.*?)" class="btn btn-red btn-icon btn-download" onclick=".*?">.*?<\/svg>.*?<span>.*?<\/span>.*?<\/a>.*?<\/div>/ms', $links, 1);
		
		
		$download_links_pages_html		= $arr['download_links_page'];		
		$download_links_pages			= $this->geturl("${download_links_pages_html}");
		 
		$arr['downloadlinkx2']			= $this->match('/<h2 style="text-align: center">Download.*?For Android<\/h2>.*?<p style="text-align: center">.*?<a.*?href="(.*?)">.*?<\/a>/ms', $download_links_pages, 1);	
		$arr['namedownloadlinkx2']		= $this->match('/<title>(.*?)<\/title>/ms', $download_links_pages, 1);	
		 
		$arr['downloadlinks_gma']		= $this->match_all('/<a.*?href="(.*?)".*?>.*?<\/a>/ms', $this->match('/<div class="bc-title">.*?Mod APK.*?<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);		 
		  
		$arr['downloadlinks_gma_alt']	= $this->match_all('/<a.*?href="(.*?)".*?>.*?<\/a>/ms', $this->match('/<div class="bc-title">.*?Mod APK.*?<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);
		
		/* if ($arr['downloadlinks_gma'] === FALSE or $arr['downloadlinks_gma'] == '') $arr['downloadlinks_gma'] = $arr['downloadlinks_gma_alt']; */
		
		$arr['downloadlinks_original']	= $this->match_all('/<a.*?href="(.*?)".*?>.*?<\/a>/ms', $this->match('/<div class="bc-title">.*?Original<\/div>.*?<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);
 
		$arr['name_downloadlinks_gmas']		= $this->match_all('/<a.*?>(.*?)\[.*?<\/a>/ms', $this->match('/<div class="bc-title">.*?Mod APK.*?<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);		
		
		$arr['name_downloadlinks_original']	= $this->match_all('/<a.*?>(.*?)<\/a>/ms', $this->match('/<div class="bc-title">.*?Original<\/div>.*?<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);	
		
		if ($arr['name_downloadlinks_gmas']) {
		$arr['name_downloadlinks_gma']		= $arr['name_downloadlinks_gmas'];	
		} else {
		$arr['name_downloadlinks_gma']		= $arr['name_downloadlinks_original'];		  	 		
		}

		$arr['size_downloadlinks_gma']		= $this->match_all('/<a.*?>.*?Original.*?\[(.*?)\].*?<\/a>/ms', $this->match('/<div class="links">(.*?)<\/article>/ms', $download_links_pages, 1), 1);		 	
		$arr['size_downloadlinks_gma']		= str_replace(array('Apk', 'OBB',  ),  '', $arr['size_downloadlinks_gma']);
 
		 
		if ($arr['downloadlinks_gma'][0]) {
		$download_links_pages_html_alts		= $arr['downloadlinks_gma'][0];	
		} else {
		$download_links_pages_html_alts		= $arr['downloadlinks_original'][0];		  	 		
		}
		
		$downloadlinks_original				= $arr['downloadlinks_original'][0]; 
		
		if ($arr['downloadlinks_gma'][1]) {
		$download_links_pages_html_alts_1	= $arr['downloadlinks_gma'][1]; 
		} else {		
		$download_links_pages_html_alts_1	= $arr['downloadlinks_original'][1]; 
		}
		if ($arr['downloadlinks_gma'][2]) {
		$download_links_pages_html_alts_2	= $arr['downloadlinks_gma'][2]; 
		} else {		
		$download_links_pages_html_alts_2	= $arr['downloadlinks_original'][2]; 
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
		
		 
		$arr['downloadlink_gma']			= $this->match('/<\/main>.*?<script>.*?getElementsByTagName.*?href="(.*?)".*?<\/script>.*?<footer/ms', $download_links_pages_alt, 1);
		 
		
		$arr['downloadlink_gma_1']			= $this->match('/<\/main>.*?<script>.*?getElementsByTagName.*?href="(.*?)".*?<\/script>.*?<footer/ms', $download_links_pages_alt_1, 1);
		
		$arr['downloadlink_gma_2']			= $this->match('/<\/main>.*?<script>.*?getElementsByTagName.*?href="(.*?)".*?<\/script>.*?<footer/ms', $download_links_pages_alt_2, 1);
		
		$arr['downloadlink_gma_3']			= $this->match('/<\/main>.*?<script>.*?getElementsByTagName.*?href="(.*?)".*?<\/script>.*?<footer/ms', $download_links_pages_alt_3, 1);
		
		$arr['downloadlink_gma_4']			= $this->match('/<\/main>.*?<script>.*?getElementsByTagName.*?href="(.*?)".*?<\/script>.*?<footer/ms', $download_links_pages_alt_4, 1);
		
		$arr['downloadlink_gma_5']			= $this->match('/<\/main>.*?<script>.*?getElementsByTagName.*?href="(.*?)".*?<\/script>.*?<footer/ms', $download_links_pages_alt_5, 1);
		 
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
		$url		= "https://${engine}.com/search?q=techbigs.com+" . rawurlencode($title);
		$ids		= $this->match_all('/<a.*?href="https:\/\/techbigs.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
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