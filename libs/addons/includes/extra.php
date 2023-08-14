<?php
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
    $url = "http://www.${engine}.com/search?q=apkdownload.cc+" . rawurlencode($title);
    /*
    https://www.gamespot.com/
    */
    $ids = $this->match_all('/<a.*?href="https:\/\/apkdownload.cc\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
    if (!isset($ids[0]) || empty($ids[0])) //if search failed
        return $this->get_web_id_from_search($title, $nextEngine); //move to next search engine
    else
        return $ids[0]; //return first IMDb result
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