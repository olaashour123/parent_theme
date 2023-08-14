<?php
function mask_link( $string, $action = 'e' ){
$secret_key						= THEMES_NAMES;
$secret_iv						= EXTHEMES_AUTHOR;
$output							= false;
$encrypt_method					= "AES-256-CBC";
$key							= hash( 'sha256', $secret_key );
$iv								= substr( hash( 'sha256', $secret_iv ), 0, 16 );
if( $action == 'e' ){
	$output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
} else if( $action == 'd' ){
	$output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
}
return $output;
}
 
$links					= $_GET['urls'];
$links_name				= $_GET['names'];
$host 					= $_SERVER['HTTP_HOST'];
$urls					= $_GET['urls'];
$names					= $_GET['names'];
$size					= $_GET['size'];
$url					= $_GET['url'];
$link_decode			= mask_link($links); 
$link_encode			= mask_link($links, 'd');
$file_name				= $_GET['names'];
 

/* 
get_bloginfo( 'url' );
header('Content-Type: application/vnd.android.package-archive');
header("Content-length: ".filesize($link_encode));
header('Content-Disposition: attachment; filename="'.$host.'-'.$file_name.'" ');
ob_end_flush();
readfile($link_encode);
return true; */
?>
<meta http-equiv="refresh" content="3;url=<?php the_permalink() ?>" />
<style>#iframe_download{display:none}</style>
<iframe id="iframe_download"></iframe>
<script>function startDownload () { document.getElementById("iframe_download").src="<?php if($link_encode) { echo $link_encode; } else { echo $links; } ?>"; } setTimeout (startDownload,0);</script>