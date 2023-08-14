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
		$sources					= "https://apkmody.io/" . trim($getLinkID) . "";
		}          
        return $this->scrape_web_info($sources);
    }
    public function scrape_web_info($sources) {
		require_once 'ssl.php';	
        $arr						= array();
		$linksX						= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links						= file_get_contents($linksX, false, stream_context_create($ssl)); 
        $links_alt					= $this->geturl("${sources}");		
		
        $arr['title_id']			= $this->match('/Package Name<\/th>.*?<a href=".*?\?id=(.*?)\&.*?".*?<\/a>.*?<\/td>.*?<\/tr>/ms', $links, 1);	
		
		$arr['title_id_alt']		= $this->match('/Package Name<\/th>.*?<a href=".*?\?id=(.*?)".*?<\/a>.*?<\/td>.*?<\/tr>/ms', $links, 1);	
		 	 
		
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
		
		$arr['title']				= str_replace(array('apkmody.io', 'apkmody', 'Apkmody', 'APK', '-', 'MOD', '+', 'Download'), '', $this->match('/<title>(.*?)<\/title>/ms', $links, 1));
		$arr['title']				= preg_replace('/\s+/', ' ', $arr['title']);
		$arr['canonical']			= $this->match('/<link rel="canonical" href="(.*?)" \/>/ms', $links, 1);
		
		$arr['article_content']		= $this->match('/<div class="entry-block entry-content main-entry-content">.*?<p>(.*?)<\/section>/ms', $links, 1);
		$arr['article_content']		= preg_replace('/<a.*?>(.*?)<\/a>/is', '<b>$1</b>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<h(.*?) class=".*?" id=".*?">/is', '<h$1>',  $arr['article_content']);
		 
		$arr['article_content']		= preg_replace('/<details.*?details>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<div.*?<figure.*?figure>.*?<\/div>/is', '',  $arr['article_content']);
		
		$arr['article_content']		= preg_replace('/<div class="wp-container-flex-center wp-block-buttons">.*?<div class="wp-block-button is-style-outline">/is', '<div class="wp-block-button is-style-outline">',  $arr['article_content']); 
		$arr['article_content']		= preg_replace('/<div class="wp-block-button is-style-outline">.*?<\/div>.*?<\/div>.*?<\/div>/is', '<div class="wp-block-button is-style-outline">',  $arr['article_content']); 
		$arr['article_content']		= preg_replace('/<div class="wp-block-button is-style-outline">/is', '<div>',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<div class="entry-content">.*?<div id="comments" class="center">/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<section>.*?<\/b>.*?<\/div>.*?<\/div>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<div class="wp-block-buttons margin-top-15">.*?<\/div>.*?<\/div>.*?<\/div>.*?<\/div>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<figure.*?figure>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<\/figure>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<\/figure>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<\/div>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<div>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<div class=.*?>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<h(.*?) id=".*?">/is', '<h$1>',  $arr['article_content']);
		/* $arr['article_content']		= preg_replace('/<h(.*?) class=".*?">/is', '<h$1>',  $arr['article_content']); */
		$arr['article_content']		= preg_replace('/\s+\s+/', ' ', $arr['article_content']);
		
		$article_content			= $arr['article_content'];
		
		
		$arr['mods']				= trim(strip_tags($this->match('/MOD.*?Features<\/th>.*?<td.*?>(.*?)<\/td>.*?<\/tr>/ms', $links, 1)));		
		
		$arr['version']				= trim(strip_tags($this->match('/Version<\/th>.*?<td.*?>(.*?)<\/td>.*?<\/tr>/ms', $links, 1)));
		
		$arr['sizes_sources']		= trim(strip_tags($this->match('/Size<\/th>.*?<td.*?>(.*?)<\/td>.*?<\/tr>/ms', $links, 1)));	 
		 
		$arr['download_links_pages'] = $this->match('/<div class="entry-content">.*?<\/div>.*?<div class="entry-block entry-content">.*?<a rel="nofollow".*?href="(.*?)" class="wp-block-button__link has-background-color has-vivid-cyan-blue-background-color clickable">.*?Download<\/a>.*?<\/div>/ms', $links, 1);
		
		$arr['download_links_page'] = $arr["canonical"]."/download";
		
		$download_links_html		= $arr['download_links_page'];
		$download_links_pages		= $this->geturl("${download_links_html}");		 
		
		$sumberTQ					= 'https://download.apkmody.fun';	
		
		$arr['downloadlinks_gma'] 	= $this->match_all('/<a onclick=".*?" href="(.*?)" class="clickable">.*?<\/a>/ms', $this->match('/<div class="download-list.*?">(.*?)<div class="entry-content">/ms', $download_links_pages, 1), 1);		
		$arr['downloadlinks_gma']				= preg_replace('/\/\/download-new.apkmody.fun/', '', $arr['downloadlinks_gma']);
		
		$arr['downloadlinks_gma_alts'] 	= $this->match_all('/<a class=".*?clickable" href="(.*?)">/ms', $this->match('/<div class="entry-content entry-block">(.*?)<div class="entry-content">/ms', $download_links_pages, 1), 1);
		 
		$arr['downloadlinks_gma_alts2'] 	= $this->match_all('/<a class=".*?clickable" href="(.*?)">/ms', $this->match('/<div class="entry-content entry-block">(.*?)<div class="entry-content">/ms', $download_links_pages, 1), 1);
		 
		 
		
		$arr['name_downloadlinks_gma'] = $this->match_all('/<a onclick=".*?".*?>.*?<div class="download-item">.*?<div class="download-item-name">.*?<div class="has-vivid-cyan-blue-color">(.*?)<\/div>.*?<\/div>.*?<\/div>.*?<\/a>/ms', trim(strip_tags($this->match('/<div class="download-list.*?">(.*?)<div class="entry-content">/ms', $download_links_pages, 1))), 1);
		
		#######################
		$download_links_html_alts			= $sumberTQ.$arr['downloadlinks_gma'][0];		  	 		
		$arr['downloadlinks_gma_alt'][0]	= $download_links_html_alts;				
		$download_links_html_altsx			= $sumberTQ.$arr['downloadlinks_gma_alts'][0];		  	 		
		$arr['downloadlinks_gma_altsx'][0]	= $download_links_html_altsx;
		
		if ($arr['downloadlinks_gma'][0]) {
		$download_links_pages_html_alts 	= $arr['downloadlinks_gma_alt'][0];		
		} else {
		$download_links_pages_html_alts 	= $arr['downloadlinks_gma_altsx'][0];	
		}
		
		#######################
		$download_links_html_alts_1			= $sumberTQ.$arr['downloadlinks_gma'][1];		  	 		
		$arr['downloadlinks_gma_alt'][1]	= $download_links_html_alts_1;						
		$download_links_html_altsx1			= $sumberTQ.$arr['downloadlinks_gma_alts'][1];		  	 		
		$arr['downloadlinks_gma_altsx'][1]	= $download_links_html_altsx1;  	
		
		if ($arr['downloadlinks_gma'][1]) {		
		$download_links_pages_html_alts_1 	= $arr['downloadlinks_gma_alt'][1];	
		} else {
		$download_links_pages_html_alts_1 	= $arr['downloadlinks_gma_altsx'][1];	
		}
		
		#######################
		$download_links_html_alts_2			= $sumberTQ.$arr['downloadlinks_gma'][2];		  	 		
		$arr['downloadlinks_gma_alt'][2]	= $download_links_html_alts_2;
		$download_links_html_altsx2			= $sumberTQ.$arr['downloadlinks_gma_alts'][2];		  	 		
		$arr['downloadlinks_gma_altsx'][2]	= $download_links_html_altsx2;
		
		if ($arr['downloadlinks_gma'][2]) {		
		$download_links_pages_html_alts_2 	= $arr['downloadlinks_gma_alt'][2];
		} else {
		$download_links_pages_html_alts_2 	= $arr['downloadlinks_gma_altsx'][2];	
		}
		
		#######################	
		$download_links_html_alts_3			= $sumberTQ.$arr['downloadlinks_gma'][3];		  	 		
		$arr['downloadlinks_gma_alt'][3]	= $download_links_html_alts_3;
		$download_links_html_altsx3			= $sumberTQ.$arr['downloadlinks_gma_alts'][3];		  	 		
		$arr['downloadlinks_gma_altsx'][3]	= $download_links_html_altsx3;
		
		if ($arr['downloadlinks_gma'][3]) {		
		$download_links_pages_html_alts_3 	= $arr['downloadlinks_gma_alt'][3];
		} else {
		$download_links_pages_html_alts_3 	= $arr['downloadlinks_gma_altsx'][3];	
		}
		
		#######################			
		$download_links_html_alts_4			= $sumberTQ.$arr['downloadlinks_gma'][4];		  	 		
		$arr['downloadlinks_gma_alt'][4]	= $download_links_html_alts_4;
		$download_links_html_altsx4			= $sumberTQ.$arr['downloadlinks_gma_alts'][4];		  	 		
		$arr['downloadlinks_gma_altsx'][4]	= $download_links_html_altsx4;
		
		if ($arr['downloadlinks_gma'][4]) {		
		$download_links_pages_html_alts_4 	= $arr['downloadlinks_gma_alt'][4];	
		} else {
		$download_links_pages_html_alts_4 	= $arr['downloadlinks_gma_altsx'][4];	
		}
		
		#######################		
		$download_links_html_alts_5			= $sumberTQ.$arr['downloadlinks_gma'][5];		  	 		
		$arr['downloadlinks_gma_alt'][5]	= $download_links_html_alts_5;
		$download_links_html_altsx5			= $sumberTQ.$arr['downloadlinks_gma_alts'][5];		  	 		
		$arr['downloadlinks_gma_altsx'][5]	= $download_links_html_altsx5;
		
		if ($arr['downloadlinks_gma'][5]) {		
		$download_links_pages_html_alts_5 	= $arr['downloadlinks_gma_alt'][5];
		} else {
		$download_links_pages_html_alts_5 	= $arr['downloadlinks_gma_altsx'][5];	
		}
		
		#######################
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
		 
	 
		$arr['downloadlink_gma']			= $this->match('/<a id="download-button".*?href="(.*?)".*?>.*?<\/a>/ms', $download_links_pages_alt, 1);
		
		$arr['downloadlink_gma_1']			= $this->match('/<a id="download-button".*?href="(.*?)" class="wp-block-button__link has-vivid-cyan-blue-background-color clickable">.*?<\/a>/ms', $download_links_pages_alt_1, 1);
		
		$arr['downloadlink_gma_2']			= $this->match('/<a id="download-button".*?href="(.*?)" class="wp-block-button__link has-vivid-cyan-blue-background-color clickable">.*?<\/a>/ms', $download_links_pages_alt_2, 1);
		 
		$arr['downloadlink_gma_3']			= $this->match('/<a id="download-button".*?href="(.*?)" class="wp-block-button__link has-vivid-cyan-blue-background-color clickable">.*?<\/a>/ms', $download_links_pages_alt_3, 1);
		 
		$arr['downloadlink_gma_4']			= $this->match('/<a id="download-button".*?href="(.*?)" class="wp-block-button__link has-vivid-cyan-blue-background-color clickable">.*?<\/a>/ms', $download_links_pages_alt_4, 1);
		 
		$arr['downloadlink_gma_5']			= $this->match('/<a id="download-button".*?href="(.*?)" class="wp-block-button__link has-vivid-cyan-blue-background-color clickable">.*?<\/a>/ms', $download_links_pages_alt_5, 1);
		
		$arr['name_downloadlink_gma']		= $this->match('/<span class="has-text-align-center has-small-font-size has-cyan-bluish-gray-color margin-bottom-15 truncate">(.*?)<\/span>/ms', $download_links_pages_alt, 1);		
		$arr['name_downloadlink_gma']		= str_replace(array('_', '.apk'), ' ', $arr['name_downloadlink_gma']);
		
		$arr['name_downloadlink_gma_1']		= $this->match('/<span class="has-text-align-center has-small-font-size has-cyan-bluish-gray-color margin-bottom-15 truncate">(.*?)<\/span>/ms', $download_links_pages_alt_1, 1);	
		$arr['name_downloadlink_gma_1']		= str_replace(array('_', '.apk'), ' ', $arr['name_downloadlink_gma_1']);
		
		$arr['name_downloadlink_gma_2']		= $this->match('/<span class="has-text-align-center has-small-font-size has-cyan-bluish-gray-color margin-bottom-15 truncate">(.*?)<\/span>/ms', $download_links_pages_alt_2, 1);
		$arr['name_downloadlink_gma_2']		= str_replace(array('_', '.apk'), ' ', $arr['name_downloadlink_gma_2']);
		  
		$arr['name_downloadlink_gma_3']		= $this->match('/<span class="has-text-align-center has-small-font-size has-cyan-bluish-gray-color margin-bottom-15 truncate">(.*?)<\/span>/ms', $download_links_pages_alt_3, 1);
		$arr['name_downloadlink_gma_3']		= str_replace(array('_', '.apk'), ' ', $arr['name_downloadlink_gma_3']);
		
		$arr['name_downloadlink_gma_4']		= $this->match('/<span class="has-text-align-center has-small-font-size has-cyan-bluish-gray-color margin-bottom-15 truncate">(.*?)<\/span>/ms', $download_links_pages_alt_4, 1);
		$arr['name_downloadlink_gma_4']		= str_replace(array('_', '.apk'), ' ', $arr['name_downloadlink_gma_4']);
		
		$arr['name_downloadlink_gma_5']		= $this->match('/<span class="has-text-align-center has-small-font-size has-cyan-bluish-gray-color margin-bottom-15 truncate">(.*?)<\/span>/ms', $download_links_pages_alt_5, 1);
		$arr['name_downloadlink_gma_5']		= str_replace(array('_', '.apk'), ' ', $arr['name_downloadlink_gma_5']);
		      
		require_once 'play.store.local.php';	
        return $arr;
    }
    //************************[ Extra Functions ]******************************
    private function get_web_id_from_search($title, $engine = "yahoo"){
        switch ($engine) {            
            case "google":  $nextEngine = "bing";  break;
            case "bing":    $nextEngine = "ask";   break;
            case "ask":    $nextEngine = "yandex";   break;
            case "yandex":    $nextEngine = "duckduckgo";   break;
            case "duckduckgo":     $nextEngine = FALSE;   break;
            case FALSE:     return NULL;
            default:        return NULL;
        }
        $url = "http://www.${engine}.com/search?q=apkmody.io+" . rawurlencode($title);
        $ids = $this->match_all('/<a.*?href="https:\/\/apkmody.io\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
        if (!isset($ids[0]) || empty($ids[0])) //if search failed
            return $this->get_web_id_from_search($title, $nextEngine); //move to next search engine
        else
            return $ids[0]; //return first IMDb result
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