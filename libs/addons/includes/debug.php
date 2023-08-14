<div id="debug"> 
<?php
if ($gets_data) {  
global $opt_themes;  
$urlX							= $url;
$parse							= parse_url($urlX);
$urlX1							= preg_replace("/^([a-zA-Z0-9].*\.)?([a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z.]{2,})$/", '$2', $parse['host']);
$language						= $opt_themes['ex_themes_extractor_apk_language_']; 
$arr['languages']				= $language;	 
?>

<div class="play_menu">
	<h3 style="color:black;text-align: center;font-size: x-large!important;">Showing Information "<b style="font-size: <?php echo font_size; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"><?php print_r( $gets_data['title_GP']) ?></b>" from <b style="font-size: <?php echo font_size; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"><a href='<?php echo $url; ?>' target="_blank"  style="text-transform:uppercase!important;color: <?php echo colors_url; ?>;"><?php echo $urlX1; ?></a></b>
	</h3>
</div>
<style>
th.has-text-align-left {text-transform: capitalize;}
</style>
<div style="clear:both"></div> 
  
<noscript> 
ID_GPS_ORI : <?php print_r( $gets_data['ID_GPS_ORI']); ?>  
<br>
name_downloadlinks_gma : <?php print_r( $gets_data['name_downloadlinks_gma']); ?>  
<br>
<textarea class="play_menu" rows="25%" cols="100%">
	<?php print_r( $gets_data['article_content']); ?>
</textarea>
<br>
  
</noscript>
<figure class="wp-block-table play_menu">
	<table class="has-fixed-layout app-box-info">
		<tbody>		
			<?php if ($gets_data['title_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['title_GP']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['title']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['title']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['GP_ID']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					ID <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<a href="https://play.google.com/store/apps/details?id=<?php print_r( $gets_data['GP_ID']) ?>&hl=<?php echo $language; ?>" rel="noopener" target="_blank"><?php print_r( $gets_data['GP_ID']) ?> <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
					</a> 
					<br>
					<a href="https://gps.demos.web.id/info/?id=<?php print_r( $gets_data['GP_ID']) ?>&hl=<?php echo $language; ?>" rel="noopener" target="_blank"><?php print_r( $gets_data['GP_ID']) ?> <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> gps.demos.web.id </span>
					</a> 
					  
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['youtube_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Youtube id <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<a href='https://www.youtube.com/watch?v=<?php print_r( $gets_data['youtube_GP']) ?>' target='_blank'><?php print_r( $gets_data['youtube_GP']) ?></a>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['genres_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Genre <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['genres_GP']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['version']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Version <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['version']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['version_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Version <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['version_GP']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['sizes_sources']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Size <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['sizes_sources']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['sizes_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Size <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['sizes_GP']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['developers_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Developers <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['developers_GP']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['installs_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					total Installs <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['installs_GP']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['updates_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					date Updates <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['updates_GP']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['requires_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					android Requires <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['requires_GP']) ?>
				</td>
			</tr>
			<?php } ?>			 
			<?php if ($gets_data['rated_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Rate <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['rated_GP']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['ratings_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Rating <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['ratings_GP']) ?>
				</td>
			</tr>
			<?php } ?> 
			<?php if ($gets_data['paid_GP1']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Paid 1
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['paid_GP1']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['paid_GP2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Paid 2
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['paid_GP2']) ?>
				</td>
			</tr>
			<?php } ?>			
			<?php if ($gets_data['mods']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Short Mod <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['mods']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['mods_alt_desc']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Full Mod <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left">
					<?php print_r( $gets_data['mods_alt_desc']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['download_links_page']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					download links page <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"><?php echo $urlX1; ?></span>
				</th>
				<td class="has-text-align-left truncate">
				<a href="<?php print_r( $gets_data['download_links_page']) ?>" rel="noopener" target="_blank"><?php print_r( $gets_data['download_links_page']) ?></a>
				 
				</td>
			</tr>
			<?php } ?>			
			<?php if ($gets_data['link_download_apksupport']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link  <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> apk.support </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['link_download_apksupport']) ?>
				</td>
			</tr>
			<?php } ?>	
			
			<?php if ($gets_data['name_download_apksupport']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> apk.support </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['name_download_apksupport']) ?>
				</td>
			</tr>
			<?php } ?>	
			
			<?php if ($gets_data['size_download_apksupport']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					size Download  <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> apk.support </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['size_download_apksupport']) ?>
				</td>
			</tr>
			<?php } ?>	
			
			<?php if ($gets_data['type_download_apksupport']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					type Download  <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> apk.support </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['type_download_apksupport']) ?>
				</td>
			</tr>
			<?php } ?>	
			
			<?php if ($gets_data['downloadlink']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					link download   <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink']) ?>
				</td>
			</tr>
			<?php } ?>			
			<?php if ($gets_data['downloadlinks_ori']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					download links ori <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;">apk.support</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlinks_ori']) ?>
				</td>
			</tr>
			<?php } ?>			 
			<?php if ($gets_data['name_downloadlinks_ori']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download Links ori <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;">apk.demos.web.id</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['name_downloadlinks_ori']) ?>
				</td>
			</tr>
			<?php } ?>			 
			<?php if ($gets_data['size_downloadlinks_orig']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Size Download Links ori <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;">apk.demos.web.id</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['size_downloadlinks_orig']) ?>
				</td>
			</tr>
			<?php } ?>						
			<?php if ($gets_data['downloadlinks_gma']) { ?> 
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					download links gma <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlinks_gma']) ?>
				</td>
			</tr>
			<?php } ?>			 
			<?php if ($gets_data['name_downloadlinks_gma']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					name download links gma <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['name_downloadlinks_gma']) ?>
				</td>
			</tr>
			<?php } ?>			 
			<?php if ($gets_data['name_downloadlink_gma']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					name download link gma <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['name_downloadlink_gma']) ?>
				</td>
			</tr>
			<?php } ?>	
			<?php if ($gets_data['name_downloadlink_gma_1']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download Link gma 1 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['name_downloadlink_gma_1']) ?>
				</td>
			</tr>
			<?php } ?>	
			<?php if ($gets_data['name_downloadlink_gma_2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download Link gma 2 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['name_downloadlink_gma_2']) ?>
				</td>
			</tr>
			<?php } ?>	
			<?php if ($gets_data['name_downloadlink_gma_3']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download Link gma 3 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['name_downloadlink_gma_3']) ?>
				</td>
			</tr>
			<?php } ?>				 
			<?php if ($gets_data['size_downloadlinks_gma']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Size Download Links <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['size_downloadlinks_gma']) ?>
				</td>
			</tr>
			<?php } ?>			
			<?php if ($gets_data['downloadlink_gma']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					 Download Link gma <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink_gma']) ?>
				</td>
			</tr>
			<?php } ?>				
			<?php if ($gets_data['downloadlink_gma_1']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					 Download Link gma 1 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink_gma_1']) ?>
				</td>
			</tr>
			<?php } ?>					
			<?php if ($gets_data['downloadlink_gma_2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					 Download Link gma 2 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink_gma_2']) ?>
				</td>
			</tr>
			<?php } ?>					
			<?php if ($gets_data['downloadlink_gma_3']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					 Download Link gma 3 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink_gma_3']) ?>
				</td>
			</tr>
			<?php } ?>					
			<?php if ($gets_data['downloadlink_gma_4']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					 Download Link gma 4 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink_gma_4']) ?>
				</td>
			</tr>
			<?php } ?>					
			<?php if ($gets_data['downloadlink_gma_5']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					 Download Link gma 5 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink_gma_5']) ?>
				</td>
			</tr>
			<?php } ?>			 
			<?php if ($gets_data['namedownloadlink']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download Link <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['namedownloadlink']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['downloadlink2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link2 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink2']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['namedownloadlink2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download Link2 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['namedownloadlink2']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['sizedownloadlink2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Size Download Link2 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['sizedownloadlink2']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['typedownloadlink2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Type Download Link2 <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['typedownloadlink2']) ?>
				</td>
			</tr>
			<?php } ?>
			<?php if ($gets_data['downloadapkx1']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Alt <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> <?php echo $urlX1; ?> </span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadapkx1']) ?>
				</td>
			</tr>
			<?php } ?> 
			<?php if ($gets_data['whatnews_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					What News  <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['whatnews_GP']) ?>
				</td>
			</tr>
			<?php } ?>			
			<?php if ($gets_data['desck_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					short Desc <span class="name new" style="font-size: <?php echo font_size_alt; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"> Play Store </span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['desck_GP']) ?>
				</td>
			</tr>
			<?php } ?>	
		</tbody>
	</table>

</figure>
<div style="clear:both"></div>
<div class="play_menu" >
	<h3 style="color:black;text-align: center;font-size: x-large!important;">Full Description " <b style="font-size: <?php echo font_size; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"><?php print_r( $gets_data['title_GP']) ?></b> " from <a href="https://play.google.com/store/apps/details?id=<?php print_r( $gets_data['GP_ID']) ?>&hl=<?php echo $language; ?>" rel="noopener" target="_blank"><b style="font-size: <?php echo font_size; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;">Play Store</b></a></h3>
</div>
<div class="play_menu" >
	<?php print_r( $gets_data['articlebody_GP']) ?>
</div>
<br>
<?php if ($gets_data['article_content']) { ?>
<div class="play_menu" >
	<h3 style="color:black;text-align: center;font-size: x-large!important;">Full Description " <b style="font-size: <?php echo font_size; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"><?php print_r( $gets_data['title_GP']) ?></b> " from <b style="font-size: <?php echo font_size; ?> !important;color: <?php echo colors_url; ?> !important; font-family: josefin sans,Sans-serif !important;  !important; font-weight: 700 !important; line-height: 1.4em !important; letter-spacing: .2px !important; text-shadow: 1px 1px 1px <?php echo colors2; ?> !important;"><a href='<?php echo $url; ?>' target="_blank"  style="text-transform:uppercase!important;color: <?php echo colors_url; ?>;"><?php echo $urlX1; ?></a></b>	</h3>
</div>
<div class="play_menu" >
	<?php print_r( $gets_data['article_content']) ?>
</div>


<textarea class="play_menu" style="width:98%;display: none; "  class="play_menu" rows="25%" cols="100%"><?php print_r( $gets_data['article_content']) ?></textarea>

<?php } ?>
<textarea class="play_menu" style="width:98%;display: none;"  name="play.google.com" class="play_menu" rows="25%" cols="100%">
	<?php print_r( $gets_data['article_content']) ?>
</textarea>
<?php } ?>
</div>