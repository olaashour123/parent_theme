<?php

if ( ! function_exists('file_get_html') )
    require_once 'includes/dom.php';

global $wpdb, $post;
    $appid = $gets_data['GP_ID'];
    $playstoreid = $gets_data['GP_ID'];
class ScrapPlayStore {

    public $o = null;
    public $error = null;
   

    function __construct($appid){
        

        $url = 'https://play.google.com/store/apps/details?id=' . $appid;

        $file = wp_remote_get($url);
        if (!is_wp_error($file)) {
            $this->o = str_get_html($file['body']);
        }
    }

    public function appInfo($var="Current Version"){

        $all = $this->o->find('div.hAyfc');
        $appInfo = array();
        foreach($all as $e) {
            $appInfo[$e->find('.BgcNfc')[0]->innertext] = $e->find('span.htlgb div.IQ1z0d span.htlgb')[0]->innertext ;
        }

        if(isset($appInfo[$var] ) ) return $appInfo[$var];

        return false;
    }

}