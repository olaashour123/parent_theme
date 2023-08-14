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
public function get_webs_info_by_id($getLinkID)	{
		$arr = array();	 
		/* if(isset($_POST['wp_sb'])) {		
		$sources					= $_POST['wp_url'];
		} else {		
		$sources = "https://www.happymod.com/".trim($getLinkID)."/";
		} */		
		$sources = "https://www.happymod.com/".trim($getLinkID)."/";
		
		return $this->scrape_web_info($sources);
}	
public function scrape_web_info($sources) {				
		require_once 'ssl.php';	
		
		$linksX				= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links123			=  file_get_contents($linksX, false, stream_context_create($ssl)); 
		
		$arr				= array();
		$links				= $this->geturl("${sources}");	
		
		$arr['title_id'] 			= $this->match('/Get it on Google Play<\/td>.*href=".*?\?id=(.*?)\&.*?" title=".*?">.*?<\/a>/ms', $links, 1);		
		
		$arr['title_id_alt']		= $this->match('/Get it on Google Play<\/td>.*?<td>.*?<a.*?href=".*?\?id=(.*?)".*?>.*?<\/a>.*?<\/td>/ms', $links, 1);
		
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

		
		 
		$arr['title2']				= str_replace(array('GAME4N', 'for Android', '-', 'Download'), '', $this->match('/<title>(.*?)<\/title>/ms', $links, 1));
		$arr['title']				= trim(strip_tags($this->match('/<meta property="og:title" content="(.*?)" \/>/ms', $links, 1)));
		$arr['title']				= preg_replace('/\s+/', ' ', $arr['title']);
		if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title3'];
				
		
		$arr['title_web']			= $this->match('/<meta property="og:title" content="(.*?)" \/>/ms', $links, 1);		
		$title_webs					= $arr['title_web'];
		 
		$arr['title']				= str_replace('[', '(', $arr['title']);
		$arr['title']				= str_replace(']', ')', $arr['title']);
		$arr['title']				= str_replace('download', '', $arr['title']);
		$arr['title2']				= str_replace('(', ',', $arr['title2']);
		$arr['title2']				= str_replace(')', ',', $arr['title2']);
		$arr['title2']				= str_replace('/', ',', $arr['title2']); 	
		
		 
		$arr['mods']				= $this->match('/Mod info<\/td><td.*?>(.*?)<\/td>/ms', $links, 1);			
		$arr['mods1']				= $this->match('/<h3.*?>Mod Info:.*?<\/h3>.*?<div class="new-pdt-info".*?>.*?<pre.*?>(.*?)<\/pre>.*?<\/div>/ms', $links, 1); 
		$arr['mods2']				= str_replace(array('APK Home', 'Android', '-', 'Download'), '', $this->match('/<h1 class="new-pdt-app-title">.*?\[(.*?)]<\/h1>/ms', $links, 1));
		if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];	
		
		
		$arr['genres_web']			= $this->match('/<div class="bread-box clearfix">.*?<a href="\/">HappyMod<\/a>.*?<span>\/<\/span>.*?<a.*?>(.*?)<\/a>.*?<span>\/<\/span>.*?<span>.*?<\/span>.*?<\/div>/ms', $links, 1);		
		$genres_webs				= $arr['genres_web'];		 
		
		$arr['version']				= $this->match('/Version<\/td><td>(.*?)<\/td>/ms', $links, 1);
		/*
		<tr><td class="t">Size</td><td>739.36 MB</td></tr>
		*/
		$arr['sizes']				= $this->match('/Size<\/td><td>(.*?)<\/td>/ms', $links, 1);	
		$arr['sizes_sources']		= $arr['sizes'];	
		
		$arr['developer_web']		= $this->match('/Developer<\/td><td>(.*?)<\/td>/ms', $links, 1);		
		$developer_web				= $arr['developer_web'];
		
		$arr['updated_web']			= $this->match('/Update on<\/td><td>(.*?)<\/td>/ms', $links, 1);		
		$updated_web				= $arr['updated_web'];
		
		$arr['article_content']		= '';
		$arr['article_content']		= preg_replace('/<a.*?">(.*?)<\/a>/is', '',  $arr['article_content']);
		$arr['article_content']		= preg_replace('/<img.*?>/is', '',  $arr['article_content']);
		$article_content			= $arr['article_content']; 
 
		$arr['poster_web']			= $this->match('/<span class="pdt-app-img">.*?<img class="lazy" data-original="(.*?)".*?>.*?<\/span>/ms', $links, 1);		
		$poster_web					= $arr['poster_web'];
		
		
		$arr['downloadlink']		= $sources."downloading.html"; 
		/* 
		$arr['downloadlink']		= $this->match('/<div class="pdt-download ".*?>.*?<a href="(.*?)" class="download-btn" title=".*?".*?>.*?<i><\/i>.*?<span>.*?<\/span>.*?<\/a>.*?<\/div>/ms', $links, 1); 
		*/
		$arr['namedownloadlink']	= $this->match('/<td colspan=\'2\'>.*?<h2>(.*?)<\/h2>/ms', $links, 1);
		$arr['downloadlink2']		= $this->match_all('/<a href="(.*?)">.*?<\/a>/ms', $this->match('/<div class="vc_tta-panel-body">(.*?)<\/ul>/ms', $links, 1), 1);
		$arr['namedownloadlink2']	= $this->match_all('/<a.*?>(.*?)<\/a>/ms', $this->match('/<div class="vc_tta-panel-body">(.*?)<\/ul>/ms', $links, 1), 1);
		
		require_once 'play.store.local.php';
		return $arr;
		}
		//************************[ Extra Functions ]******************************
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
				$url = "http://www.${engine}.com/search?q=happymod.com+" . rawurlencode($title);
				$ids = $this->match_all('/<a.*?href="https:\/\/www.happymod.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
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
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
				curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com");
				curl_setopt($ch, CURLOPT_AUTOREFERER, true);
				curl_setopt($ch, CURLOPT_HEADER, 0 );
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE );
				$html = curl_exec($ch);
				curl_close($ch);
				return $html;
		}
		/* 
		function file_get_contents_curl( $url ) {

  $ch = curl_init();

  curl_setopt( $ch, CURLOPT_AUTOREFERER, TRUE );
  curl_setopt( $ch, CURLOPT_HEADER, 0 );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt( $ch, CURLOPT_URL, $url );
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, TRUE );

  $data = curl_exec( $ch );
  curl_close( $ch );

  return $data;

}

		private function getbinaryurl ($url) {

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
			$value1 = curl_exec($curl);
			curl_close($curl);

			$doc = new DOMDocument();
			libxml_use_internal_errors(true);
			$doc->loadHTML($value1);
			libxml_use_internal_errors(false);

			$xp = new DOMXPath($doc);

			$srcs = $xp->query('//script[@type="text/x-component"][contains(text(), "macURL")]');
			foreach ( $srcs as $src )   {
				$content = json_decode( $src->textContent, true);
				echo $content['params']['macURL'] . PHP_EOL;
				echo $content['params']['windowsURL'] . PHP_EOL;
				echo $content['params']['enterpriseURL'] . PHP_EOL;
			}
		}
		
			$input_string = '<script type="text/javascript" src="http://localhost/assets/javascript/system.js" charset="UTF-8"></script>';
			$count = preg_match('/src=(["\'])(.*?)\1/', $input_string, $match);
			if ($count === FALSE) 
				echo('not found\n');
			else 
				echo($match[2] . "\n");

			$input_string = "<script type='text/javascript' src='http://localhost/index.php?uid=93db46d877df1af2a360fa2b04aabb3c' charset='UTF-8'></script>";
			$count = preg_match('/src=(["\'])(.*?)\1/', $input_string, $match);
			if ($count === FALSE) 
				echo('not found\n');
			else 
				echo($match[2] . "\n");
		 */

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