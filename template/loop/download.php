<?php 
global $opt_themes, $wpdb, $post, $wp_query;
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
$i								= 0;
$downloadlink					= get_post_meta(get_the_ID(), 'repeatable_fields', true);
$download3						= get_post_meta(get_the_ID(), 'wp_downloadlink2', true);
$download2						= get_post_meta(get_the_ID(), 'wp_downloadlink', true);
$downloadapkxapkpremier			= get_post_meta(get_the_ID(), 'wp_downloadapkxapkpremier', true);
$namedownload2					= get_post_meta(get_the_ID(), 'wp_namedownloadlink', true);
$namedownload3					= get_post_meta(get_the_ID(), 'wp_namedownloadlink2', true);
$size3							= get_post_meta(get_the_ID(), 'wp_sizedownloadlink2', true);
$tipe3							= get_post_meta(get_the_ID(), 'wp_tipedownloadlink2', true);
$download3x1					= get_post_meta(get_the_ID(), 'wp_downloadlink2', true);

$downloadlink_gma				= get_post_meta( $post->ID, 'downloadlink_gma', true );
$downloadlink_gma_1				= get_post_meta( $post->ID, 'downloadlink_gma_1', true );
$downloadlink_gma_2				= get_post_meta( $post->ID, 'downloadlink_gma_2', true );
$downloadlink_gma_3				= get_post_meta( $post->ID, 'downloadlink_gma_3', true );
$downloadlink_gma_4				= get_post_meta( $post->ID, 'downloadlink_gma_4', true );
$downloadlink_gma_5				= get_post_meta( $post->ID, 'downloadlink_gma_5', true );
	
$namedownloadlink_gma			= get_post_meta( $post->ID, 'name_downloadlinks_gma', true );
$namedownloadlink_gma_1 		= get_post_meta( $post->ID, 'name_downloadlinks_gma_1', true );
$namedownloadlink_gma_2			= get_post_meta( $post->ID, 'name_downloadlinks_gma_2', true );
$namedownloadlink_gma_3 		= get_post_meta( $post->ID, 'name_downloadlinks_gma_3', true );
$namedownloadlink_gma_4			= get_post_meta( $post->ID, 'name_downloadlinks_gma_4', true );
$namedownloadlink_gma_5			= get_post_meta( $post->ID, 'name_downloadlinks_gma_5', true );
	
$sizedownloadlink_gma			= get_post_meta( $post->ID, 'size_downloadlinks_gma', true );
$sizedownloadlink_gma_1			= get_post_meta( $post->ID, 'size_downloadlinks_gma_1', true );
$sizedownloadlink_gma_2			= get_post_meta( $post->ID, 'size_downloadlinks_gma_2', true );
$sizedownloadlink_gma_3			= get_post_meta( $post->ID, 'size_downloadlinks_gma_3', true );
$sizedownloadlink_gma_4			= get_post_meta( $post->ID, 'size_downloadlinks_gma_4', true );
$sizedownloadlink_gma_5			= get_post_meta( $post->ID, 'size_downloadlinks_gma_5', true ); 

$playstorelinkurl				= get_post_meta(get_the_ID(), 'wp_GP_ID', true);
$playstorelink					= 'https://play.google.com/store/apps/details?id='.$playstorelinkurl;
 
	
 
$wp_mods						= get_post_meta( $post->ID, 'wp_mods', true ); 
$wp_mods_alt_2					= get_post_meta( $post->ID, 'wp_mods2', true ); 
$nomods							= 'Originals APKs'; 
//if ( $wp_mods_alt_2 === FALSE or $wp_mods_alt_2 == '' ) $wp_mods_alt_2 =  $nomods;
	
	
$sizes							= get_post_meta( $post->ID, 'wp_sizes', true );
$sizes_alt						= get_post_meta( $post->ID, 'wp_sizes_GP', true );
$nosize							= '';
if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizes_alt ;


$image_id						= get_post_thumbnail_id(); 
$full							= 'full';
$icons							= '64';
$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
$image_url_default				= $image_url[0];
$thumbnail_images				= $image_url;
$post_id						= get_the_ID();
$url							= wp_get_attachment_url( get_post_thumbnail_id($post->ID), $icons );
$defaults_no_images				= '';
$thumb_id						= get_post_thumbnail_id( $id );

$image_idXX						= get_post_thumbnail_id($post->ID); 
$image_idx						= get_post_thumbnail_id(); 
$fullx							= 'thumbnails-post-icon'; 
$image_urlx						= wp_get_attachment_image_src($image_idx, $fullx, true); 
$imagex							= $image_urlx[0];
?>			
					
<div class="block b-download">
	<div class="b-nobugs">
		<div class="b-nobugs-icon">
			<figure class="img">
				<img src="<?php echo $imagex; ?>" alt="<?php the_title(); ?>" >
			</figure>
			<i data-fancybox="" data-src="#details-safe" class="c-green"><svg width="24" height="24"><use xlink:href="#i__shield"/></svg></i>		 
			<?php global $opt_themes; if($opt_themes['ex_themes_details_safe']) { ?>
			<div class="details-safe" id="details-safe" style="display: none">
			<?php echo $opt_themes['ex_themes_details_safe']; ?>			 
			</div>
			<?php } ?> 
		</div>
		<div class="b-nobugs-text">
		<span><?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?><?php echo $opt_themes['exthemes_apk_info_Download']; ?><?php } ?>&nbsp;<?php echo get_the_title(); ?>&nbsp;</span>
		</div>
	</div>
	<div class="b-cont">
	<div class="downline-line-list"> 
	<?php ex_themes_adv_single_page_2(); ?>  
	<?php if ($wp_mods){ ?> 
	<?php echo $wp_mods; ?>
	<?php } ?>	
	<?php if ($wp_mods_alt_2) { ?>
	<div class="showH">
	<details class="ac">
		<summary><?php global $opt_themes; if($opt_themes['exthemes_content_Mod_info']) { echo $opt_themes['exthemes_content_Mod_info']; } ?></summary>
		<div class="aC">
		<p><?php echo $wp_mods_alt_2 ?></p>
		</div>
	</details>
	</div>
	<?php } ?>
		 
	<noscript>
	<?php
	if ($wp_mods){ echo $wp_mods;  }
	if ($wp_mods_alt_2) { ?>
	<div class="spoiler"> 
	<div class="title_spoiler">
	<a href="javascript:ShowOrHide('sp_info')">
	<img id="image-sp_info" src="<?php echo get_template_directory_uri(); ?>/assets/img/spoiler-plus.png" alt="" width="24" height="24">
	<span class="sr-only">Show/Hide</span>
	</a>
	<?php global $opt_themes; if($opt_themes['exthemes_content_Mod_info']) { echo $opt_themes['exthemes_content_Mod_info']; } ?>
	</div>
	<div id="sp_info" class="text_spoiler" >
	<?php echo $wp_mods_alt_2 ?>
	</div>
	</div>
	<?php } ?> 
	</noscript>
	
	<?php if($downloadlink){ ?>
	<?php
	
	if ($downloadlink) {
	foreach ($downloadlink as $getlinks => $dw) {
	?>	
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo (!empty($dw['url'])) ? $dw['url'] : ''; ?><?php if($dw['name']){ ?>&names=<?php echo $dw['name']; ?><?php } ?><?php if($dw['sizes1']){ ?>&sizes=<?php echo $dw['sizes1']; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($dw['name'])) ? $dw['name'] : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } ?> - <?php echo (!empty($dw['sizes1'])) ? $dw['sizes1'] : ''; ?>
	</span>
	</a>
	<?php $i++; } }  ?>
	<?php } elseif ($download3) { ?>
	<?php
	foreach($download3 as $elemento) {
	$download3x1 = $download3[$i];
	$download31 = $download3[$i];
	$download32 = $download3[$i];
	?>	
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo (!empty($download31)) ? $download31 : ''; ?><?php if($namedownload3[$i]){ ?>&names=<?php echo $namedownload3[$i]; ?><?php } ?><?php if($size3){ ?>&sizes=<?php echo $size3; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownload3[$i])) ? $namedownload3[$i] : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if (get_post_meta( $post->ID, 'wp_sizes', true )) { ?> - <?php echo $sizes; } ?>
	</span>
	</a>
	<!-- end download link from apkdown -->
	<?php $i++; } ?>	
	<?php } elseif ($downloadlink_gma) { 
	if ($downloadlink_gma) { ?>	
	<!-- download link from getmodsapk -->
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma; ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma)) ? $namedownloadlink_gma : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma) { ?> - <?php echo $sizedownloadlink_gma; } ?>
	</span>
	</a>

	<?php } if ($downloadlink_gma_1) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_1; ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_1)) ? $namedownloadlink_gma_1 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_1) { ?> - <?php echo $sizedownloadlink_gma_1; } ?>
	</span>
	</a>
	<?php } if ($downloadlink_gma_2) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_2; ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_2)) ? $namedownloadlink_gma_2 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_2) { ?> - <?php echo $sizedownloadlink_gma_2; } ?>
	</span>
	</a>
	<?php } if ($downloadlink_gma_3) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_3; ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_3)) ? $namedownloadlink_gma_3 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_3) { ?> - <?php echo $sizedownloadlink_gma_3; } ?>
	</span>
	</a>
	<?php } if ($downloadlink_gma_4) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_4; ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_4)) ? $namedownloadlink_gma_4 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_4) { ?> - <?php echo $sizedownloadlink_gma_4; } ?>
	</span>
	</a>
	<?php } if ($downloadlink_gma_5) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_5; ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_5)) ? $namedownloadlink_gma_5 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_5) { ?> - <?php echo $sizedownloadlink_gma_5; } ?>
	</span>
	</a>
	<!-- end download link from getmodsapk -->
	<?php } } elseif ($download2) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo (!empty($download2)) ? $download2 : ''; ?><?php if($namedownload2){ ?>&names=<?php echo $namedownload2; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownload2)) ? $namedownload2 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if (get_post_meta( $post->ID, 'wp_sizes', true )) { ?> - <?php echo $sizes; } ?>
	</span>
	</a>
	<!-- end download link from happymood -->
	<?php } else { 
	global $opt_themes; if(get_post_meta(get_the_ID(), 'link_download_apksupport', true)) { 
	$link_decode				= mask_link(get_post_meta(get_the_ID(), 'link_download_apksupport', true));
	?>
	<!--download link from apkpremier-->
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $link_decode; ?>&names=<?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?>.<?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo get_post_meta(get_the_ID(), 'name_download_apksupport', true); ?>.<?php echo strtolower(get_post_meta(get_the_ID(), 'type_download_apksupport', true)); ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } ?> - <?php echo get_post_meta(get_the_ID(), 'size_download_apksupport', true); ?> 
	</span>
	</a>	
	<?php } if (get_post_meta( $post->ID, 'wp_download_original_ps', true )) { ?>
	<!--download link from apkpremier-->
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo get_post_meta(get_the_ID(), 'wp_download_original_ps', true); ?>&names=<?php echo get_the_title(); ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo get_the_title(); ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if (get_post_meta( $post->ID, 'wp_sizes', true )) { ?> - <?php echo $sizes; } ?>
	</span>
	</a>
	<?php } }  ?>
	</div>
	
	</div>
</div>


<?php global $opt_themes; if($opt_themes['ex_themes_nolink_activate_']) { ?>
<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' id='jquery-core-js'></script>
<script>
$(document).ready(function () {
	setTimeout(function () {               
		$('a[href]#no-link').each(function () {
			var href = this.href;    
			$(this).removeAttr('href').css('cursor', 'pointer').click(function () {
			if (href.toLowerCase().indexOf("#") >= 0) {    
			} else { //window.open(href, '_blank');
			window.location.href = href; 
			}
			});
		});    
	}, 500);
});
</script>
<?php } ?>
