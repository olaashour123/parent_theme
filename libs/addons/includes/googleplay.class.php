<?php

class getslinks{	
	public function get_web_info($title) {
		$getLinkID = $this->get_web_id_from_search(trim($title));
		/* if($getLinkID === NULL){
			$arr = array();
			$arr['error'] = "No Title found in Search Results!";
			return $arr;
		} */
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID) {
		$arr				= array();	 	 
		if(isset($_POST['wp_sb'])) {		
		$sources			= $_POST['wp_url'];
		} else {		
		$sources			= "https://play.google.com/store/apps/details?id=".trim($getLinkID); 
		}
		return $this->scrape_web_info($sources);
	}
	public function scrape_web_info($sources) {	
		require_once 'ssl.php';	
		$linksX				= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links				= file_get_contents($linksX); 
		
		$arr				= array();
		$linksX1			= $this->geturl("${sources}");	
		$arr['title_id']	= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $links, 1);
		$arr['GP_ID']		= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $links, 1);
		$title_id			= $this->match('/<link rel="alternate" href=".*?\?id=(.*?)" hreflang="x-default">/ms', $links, 1);
		 
		
		
		if(empty($title_id) || !preg_match("/(.*?)/i", $title_id)) {
			$arr['error']			= NO_ID;
			echo $arr['error'];
		}
		
		$arr['title_id']	= $title_id;        
        $titleId			= $arr['GP_ID'];		
		require_once 'play.store.local.php';		
        return $arr;
	}
//************************[ Extra Functions ]******************************
private function get_web_id_from_search($title, $engine = "google"){
		switch ($engine) {
			case "google":  $nextEngine = "bing";  break;			
			case "bing":    $nextEngine = "ask";   break;
			case "ask":    $nextEngine = "yandex";   break;
			case "yandex":    $nextEngine = "duckduckgo";   break;
			case "duckduckgo":     $nextEngine = FALSE;   break;
			case FALSE:     return NULL;
			default:        return NULL;
		}
		$url = "https://www.${engine}.com/search?q=play.google.com+" . rawurlencode($title);
		
		$ids = $this->match_all('/<a.*?href="https:\/\/play.google.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
		if (!isset($ids[0]) || empty($ids[0])) //if search failed
			return $this->get_web_id_from_search($title, $nextEngine); //move to next search engine
		else
			return $ids[0]; 
}
 
private function geturl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		 
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch, CURLOPT_HEADER, false); 
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