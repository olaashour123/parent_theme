<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
include_once 'dom.php';

function wp_googleplay_errors() {
$sources        = 'play.google.com';
?>
<div class="play_menu" style="text-transform:uppercase"><b>Add sources from <?php echo $sources; ?></b></div>
	 
    <div class="wrap">
    <div class="containerX">
	<h1 style="text-align: center;">Sorry....<?php echo $sources; ?> <u style="color: <?php echo colors; ?>;">not working </u> now</h1>
	<h5 style="text-align: center;">because its blocked by cloudflare</h5> 
    </div>
    </div>
	
<?php 
get_template_part(footerx);
get_template_part(addscriptx); 
}

function wp_googleplay() {
$types			= 'post';
$sources		= 'play.google.com';
$demos			= 'https://play.google.com/store/apps/details?id=com.roblox.client'; 
 
?>
 
    <div class="play_menu" style="text-transform:uppercase">
        <b>Add sources from <?php echo $sources; ?></b>
    </div>
    <?php 
    if(isset($_POST['wp_sb'])) {
		ini_set('display_errors', ERRORS);
        if(isset($_POST['wp_url'])) {
            $url							= trim(strip_tags($_POST['wp_url']));
            if(stristr($url, $sources)) {
                global $post, $opt_themes;
                require_once 'googleplay.class.php';
                $getslinks					= new getslinks;
                $gets_data					= $getslinks->scrape_web_info($url, false);
                $title						= $gets_data['title_GP'];
                $title						= str_replace('Games for Free', '',  $title);
                $title						= str_replace('', '',  $title);
                $title						= str_replace(':', '',  $title);
                /* $title2						= sanitize_title_with_dashes(ex_themes_clean($gets_data['title']));
                $title22					= sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP'])); */
                $judul						= $gets_data['title_GP']; 
                $title_GP_ID				= $gets_data['GP_ID'];
                $version_GP_ID				= $gets_data['version_GP'];
                $post_status				= get_option('wp_post_status', 'draft');
                $post_statusX				= $opt_themes['ex_themes_extractor_apk_status_post_'];
                $post_titlee				= $opt_themes['ex_themes_extractor_apk_title_'];
                $permalink_titlee			= $opt_themes['ex_themes_extractor_apk_permalink_'];
                $duplicatepost				= $opt_themes['duplicate_post'];
				
                if(count($gets_data) AND !isset($gets_data['error'])) {
					$post_title		= $gets_data['title_GP'];
					$idX			= $post->ID;
					$check_title	= get_page_by_title($post_title, 'OBJECT', $types);
					
				if($duplicatepost){
					$post_args	= array(
                        'post_title'		=> $post_title,
                        'post_name'			=> sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP'])),
                        'post_content'		=> $gets_data['articlebody_GP'],
                        'post_status'		=> $post_statusX, 
                        //'post_category'		=> array($new_cat_ID),
                        'post_type'			=> $types
                    );
					$post_id	= wp_insert_post( $post_args );
						} else {
				if (empty($check_title) ){ 
					$post_args	= array(
                        'post_title'		=> $post_title,
                        'post_name'			=> sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP'])),
                        'post_content'		=> $gets_data['articlebody_GP'],
                        'post_status'		=> $post_statusX, 
                        //'post_category'		=> array($new_cat_ID),
                        'post_type'			=> $types
                    );
					$post_id	= wp_insert_post( $post_args );
					} else {
					$post_args	= array(
						'ID'				=> $check_title->ID,
						/* 
						'post_title'		=> $post_title,
						'post_name'			=> sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP'])),
						'post_content'		=> $gets_data['articlebody_GP'],
						*/
						'post_status'		=> $post_statusX,
						//'post_category'		=> array($new_cat_ID),
						'post_type'			=> $types
					);
					$post_id	= wp_update_post( $post_args ); 
					
					}
				}
                    
                    $terms					= array();
                    foreach($gets_data['genres_GP'] as $term):
                        $t_exists = term_exists( $term, 'category' );
                        if( !$t_exists ):
                            $t = wp_insert_term( $term, 'category' );
                            $terms[] = $t['term_id'];
                        else:
                            $terms[] = $t_exists['term_id'];
                        endif;
                    endforeach;
                    
                    wp_set_post_terms( $post_id, $terms, 'category' );
                    add_post_meta( $post_id, 'wp_GP_ID', $gets_data['GP_ID'] );
                    add_post_meta( $post_id, 'wp_ps_sources', $url );
                    add_post_meta( $post_id, 'DLPRO_playstoreID', $gets_data['GP_ID'] );
                    add_post_meta( $post_id, 'wp_GP_ID', $gets_data['GP_ID'] );
                    add_post_meta( $post_id, 'wp_title_GP', $gets_data['title_GP'] );
                    add_post_meta( $post_id, 'DLPRO_AppName', $gets_data['title_GP'] );
                    add_post_meta( $post_id, 'wp_images_GP', $gets_data['images_GP'] );					
					
					if ($gets_data['cover']){
                    add_post_meta( $post_id, 'wp_backgrounds_GP', $gets_data['cover'] );
                    add_post_meta( $post_id, 'wp_background_images', $gets_data['cover'] );
                    add_post_meta( $post_id, 'background_images', $gets_data['cover'] );
					} elseif ($gets_data['backgrounds_GP']){
                    add_post_meta( $post_id, 'wp_backgrounds_GP', $gets_data['backgrounds_GP'] );
                    add_post_meta( $post_id, 'wp_background_images', $gets_data['backgrounds_GP'] );
                    add_post_meta( $post_id, 'background_images', $gets_data['backgrounds_GP'] );
					} else {
                    add_post_meta( $post_id, 'wp_backgrounds_GP', $gets_data['backgrounds_GP_alt'] );
                    add_post_meta( $post_id, 'wp_background_images', $gets_data['backgrounds_GP_alt'] );
                    add_post_meta( $post_id, 'background_images', $gets_data['backgrounds_GP_alt'] );
					}
					
                    add_post_meta( $post_id, 'wp_poster_GP', $gets_data['poster_GP'] );
                    add_post_meta( $post_id, 'DLPRO_Posters', $gets_data['poster_GP'] );
                    add_post_meta( $post_id, 'wp_youtube_GP', $gets_data['youtube_GP'] );
                    add_post_meta( $post_id, 'DLPRO_youtubes_ID', $gets_data['youtube_GP'] );
                    add_post_meta( $post_id, 'wp_genres_GP', $gets_data['genres_GP'] );
                    add_post_meta( $post_id, 'DLPRO_genres', $gets_data['genres_GP'] );
                    add_post_meta( $post_id, 'wp_genres_GP', $gets_data['genres_GP'] );
                    wp_set_object_terms( $post_id, $gets_data['genres_GP'], 'category', true );
                    wp_set_object_terms( $post_id, $gets_data['paid_GP2'], 'category', true );
                     
                    add_post_meta( $post_id, 'wp_title_GP', $gets_data['title_GP'] );
                    add_post_meta( $post_id, 'wp_version_GP', $gets_data['version_GP'] );
                    add_post_meta( $post_id, 'DLPRO_Version', $gets_data['version_GP'] );
                    wp_set_object_terms( $post_id, $gets_data['version_GP'], 'wp_version_GP', true );
                     
                    add_post_meta( $post_id, 'wp_sizes_GP', $gets_data['sizes_GP'] );
                    add_post_meta( $post_id, 'DLPRO_Filesize', $gets_data['sizes_GP'] );
                    add_post_meta( $post_id, 'wp_whatnews_GP', $gets_data['whatnews_GP'] );
                    add_post_meta( $post_id, 'DLPRO_Whatsnews', $gets_data['whatnews_GP'] );
                    add_post_meta( $post_id, 'wp_developers_GP', $gets_data['developers_GP'] );
                    add_post_meta( $post_id, 'DLPRO_Developer', $gets_data['developers_GP'] );
                    wp_set_post_terms( $post_id, $gets_data['developers_GP'], 'developer' );
                    wp_set_object_terms( $post_id, $gets_data['developers_GP'], 'developer', true );
                     
                    add_post_meta( $post_id, 'wp_installs_GP', $gets_data['installs_GP'] );
                    add_post_meta( $post_id, 'DLPRO_totalinstalls', $gets_data['installs_GP'] );
                    add_post_meta( $post_id, 'wp_requires_GP', $gets_data['requires_GP'] );
                    add_post_meta( $post_id, 'DLPRO_Requires', $gets_data['requires_GP'] );
                    add_post_meta( $post_id, 'wp_updates_GP', $gets_data['updates_GP'] );
                    add_post_meta( $post_id, 'DLPRO_Updated', $gets_data['updates_GP'] );
                    add_post_meta( $post_id, 'wp_ratings_GP', $gets_data['ratings_GP'] );
                    add_post_meta( $post_id, 'DLPRO_totalrating', $gets_data['ratings_GP'] );
                    add_post_meta( $post_id, 'wp_rated_GP', $gets_data['rated_GP'] );
                    add_post_meta( $post_id, 'DLPRO_voted', $gets_data['rated_GP'] );
                    //add_post_meta( $post_id, 'wp_contentrated_GP', $gets_data['contentrated_GP'] );
                    //add_post_meta( $post_id, 'DLPRO_contentrated', $gets_data['contentrated_GP'] );
                    add_post_meta( $post_id, 'wp_desck_GP', $gets_data['desck_GP'] );
                    add_post_meta( $post_id, 'DLPRO_deskbeforepost', $gets_data['desck_GP'] );
                    add_post_meta( $post_id, 'wp_articlebody_GP', $gets_data['articlebody_GP'] );
					
                    update_post_meta( $post_id, 'wp_version_GP', $gets_data['version_GP'] );
                    update_post_meta( $post_id, 'wp_sizes_GP', $gets_data['sizes_GP'] );
                    update_post_meta( $post_id, 'wp_sizes', $gets_data['sizes_GP'] );
                    update_post_meta( $post_id, 'wp_whatnews_GP', $gets_data['whatnews_GP'] );
                    update_post_meta( $post_id, 'wp_updates_GP', $gets_data['updates_GP'] );
                    
					########## 
                    //$poster1							= $gets_data['poster3'];
                    //$poster2							= $gets_data['posterx1'];
                    //$poster3							= $gets_data['poster3'];
                    //$poster								= $poster1;
                    //add_post_meta( $post_id, 'wp_poster', $poster );
                    //add_post_meta( $post_id, 'wp_poster3', $poster3 );
                    //add_post_meta( $post_id, 'wp_posterx1', $poster2 );					
					/* 
					global $opt_themes; 
					if($opt_themes['ex_themes_save_apk_']) {  					
					//$urlapk = $gets_data['downloadlink2'][0];
					$urlapk1							= $gets_data['downloadapkx3'];
                    $urlapk = array();
                    foreach($urlapk1 as $term):
                        $urlapk_exists = $gets_data['downloadapkx3'];                         
                    endforeach;

					$nameapk						= $gets_data['namedownloadapkx3'][0];
					$nameapks						= sanitize_title_with_dashes(ex_themes_clean($gets_data['namedownloadapk3']));
					$uploaddirapk					= wp_upload_dir();
                    $full							= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					$domen							= str_replace(['https://','http://'],'',home_url());
					$domen							= explode('/',$domen)[0];
					$domen2							= str_replace(['https://','http://'],'',get_the_permalink($post->ID)); 
					$filenameapk					= $domen.'_'.$nameapks.'_'.$nameapk.'';
 					$uploadfileapk					= $uploaddirapk['path'] . '/' . $filenameapk;
					if( !file_exists($uploadfileapk) ) {
						$contentsapk= file_get_contents($urlapk);
						$savefileapk = fopen($uploadfileapk, 'w');
						fwrite($savefileapk, $contentsapk);
						fclose($savefileapk);
					}
					$wp_filetypeapk					= wp_check_filetype(basename($filenameapk), null );
					$attachmentapk = array(
						'post_mime_type' => $wp_filetypeapk['type'],
						'post_title' => $filenameapk,
						'post_content' => '',
						'post_status' => 'inherit'
					);
					wp_insert_attachment( $attachmentapk, $uploadfileapk, $post_id );
					$wp_downloadlink				= get_post_meta( $post_id, 'wp_downloadlink2', true );
					$wp_downloadlink2				= $uploaddirapk['url']."/".$filenameapk;
                     
					//$datos_download = get_post_meta( $post_id, 'datos_download', true );
					//$datos_download = ( !empty($datos_download) ) ? $datos_download : array(); 
					//$datos_download['option'] = 'direct-download';
					//$datos_download['direct-download'] = $uploaddirapk['url']."/".$filenameapk;
					 
					$datos_downloadX				= $uploaddirapk['url']."/".$filenameapk;
					add_post_meta( $post_id, 'wp_downloadlink2', $wp_downloadlink2 );
					update_post_meta( $post_id, 'wp_downloadlink2', $wp_downloadlink2 ); 
					} 
					*/
					
					########## 
                    $image_url						= $gets_data['poster_GP'];
                    $image							= $gets_data['poster_GP'];
                    //$image_url2						= $gets_data['poster_GP_2'];
                    //$image2							= $gets_data['poster_GP_2'];
					$title_PS						= sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP']));
                    //$title_Sources					= sanitize_title_with_dashes(ex_themes_clean($gets_data['title']));
                    $uploaddir						= wp_upload_dir();
                    $filename						= "{$title_PS}.png";
                    $uploadfile						= $uploaddir['path'] . '/' . $filename;
                    $contents						= file_get_contents($image);
                    $savefile						= fopen($uploadfile, 'w');
                    fwrite($savefile, $contents);
                    fclose($savefile);
                    $wp_filetype					= wp_check_filetype(basename($filename), null );
                    $attachment = array(
                        'post_mime_type'	=> $wp_filetype['type'],
                        'post_title'		=> $filename,
                        'post_content'		=> '',
                        'post_status'		=> 'inherit'
                    );
                    $attach_id						= wp_insert_attachment( $attachment, $uploadfile );
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data					= wp_generate_attachment_metadata( $attach_id, $uploadfile );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $post_id, $attach_id );
                    
					########## 
                    $tags					= array(''.$gets_data['title_GP'].' '.$gets_data['version_GP'].',');
                    wp_set_object_terms( $post_id, $gets_data['genres_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['title_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['developers_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $tags, 'post_tag', true );
                    if($post_id)
					$urlX			= get_permalink( $post_id );
					require_once 'result.php';
					require_once 'debug.php';
                }
				} else {
                echo '<div class="play_menu" style="text-transform:uppercase!important;color:#00a0d2"><h3 style="color:#00a0d2">Please check your link.. your link is <b style="color:red">'.$url.'</b></h3></div>';
				}
        }
    }
    ?>
    
    <?php get_template_part(addscriptx); ?>
    <div class="wrap">
        <div class="play_fixedx play_menu" id="play_fixed" style="margin-bottom: 10px;">
            <div class="play_search">
                &nbsp;  &nbsp;
                &nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;
            </div>
            <ul class="play_menus" style="text-transform:capitalize">
               <li><a data-toggle="tab" href="#home"><i class="fa fa-home"></i> Home</a></li>
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-rss"></i> Latest Post Games</a></li>
                <li><a data-toggle="tab" href="#menu2"><i class="fa fa-rss"></i> Alternative</a></li>
                <li class="active"><a data-toggle="tab" href="#menu5"><i class="fa fa-rss"></i> add Manual</a></li>
                <li><a href='admin.php?page=<?php echo options_setting; ?>'><i class="fa fa-cogs"></i> Setting</a></li>
               
            </ul>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="containerX">
        <div class="tab-content">
            <div id="home" class="tab-pane fade">
                <ul class="play_menu" >
				<li><?php global $opt_themes; $post_statusX = $opt_themes['ex_themes_extractor_apk_status_post_']; ?> Your Status Post is <?php global $opt_themes; $wp_post_status12 = $opt_themes['ex_themes_extractor_apk_status_post_']; if($wp_post_status12 != 'draft') { ?> <blink><strong class="blink blink-one" style="color:green"><?php echo $wp_post_status12; ?></strong></blink> You ready to Make auto posting now <?php } else { ?><blink><strong class="blink blink-one" style="color:red"><?php echo $wp_post_status12; ?></strong></blink>. Please Change to <blink><strong class="blink" style="color:green">publish</strong></blink> to make Auto Posting,  you can go to Setting Page <?php } ?> </li>
                </ul>
            </div>
			
			<div id="menu5" class="tab-pane fade in active">
			<div class="play_menu" style="text-transform:uppercase"><b>Add manual</b></div>
				<div class="play_menu" style="text-transform:uppercase">
                <ol style="paddiing-right: 20px !important;margin: 20px;">
                    <li>Open website <a href="https://play.google.com/store/games" target="_blank"><?php echo $sources; ?></a></li> 
                    <li>Copy link post and paste to form</li>
                    <li>use the url into this format:  <strong style="color:<?php echo colors_rgb; ?>;text-transform:lowercase!important"><?php echo $demos; ?></strong> </li>
                </ol>				
				</div>
				
				<div class="play_menu" ><b>Paste your link post here</b></div>
				
				<div class="play_menu" >
				<form name="myForm" id="myForm" method="POST">
					<input class="apkextractor" type="text" name="wp_url" placeholder="example : <?php echo $demos; ?>" onkeypress="this.style.width =((this.value.length + 1) * 8) + 'px';" >
					<input type="submit" id="Submit" name="wp_sb" class="button-primary" value="<?php echo postnow2; ?>" />
				</form>
				</div>
		 
			</div>
			
            <div id="menu1" class="tab-pane fade">
			<div class="play_menu" style="text-transform:uppercase"><b>Latest Post Game</b></div>
            <?php
					ini_set('display_errors', 'off');
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');       

					$count			= 1;					
                    $host			= $_SERVER['HTTP_HOST'];
                    $host2			= $host;
                    $host3			= $host; 
					
					$clusterPage = 'https://play.google.com/store/apps/collection/cluster?clp=SjAKKgokcHJvbW90aW9uXzMwMDA3OTFfbmV3X3JlbGVhc2VzX2dhbWVzEEoYAzoCCAE%3D:S:ANO1ljIvgTM&gsr=CjJKMAoqCiRwcm9tb3Rpb25fMzAwMDc5MV9uZXdfcmVsZWFzZXNfZ2FtZXMQShgDOgIIAQ%3D%3D:S:ANO1ljJBvBg&hl=en_US&gl=GB';


					$clusterPage2 = 'https://play.google.com/store/apps/collection/cluster?clp=ogooCAEaHAoWcmVjc190b3BpY19pREdaa09EdG1UMBA7GAMqAggBUgIIAg%3D%3D:S:ANO1ljKeniA&gsr=CiuiCigIARocChZyZWNzX3RvcGljX2lER1prT0R0bVQwEDsYAyoCCAFSAggC:S:ANO1ljKPzfI&hl=en_US&gl=GB';


					$clusterPage3 = 'https://play.google.com/store/apps/collection/cluster?clp=ogooCAEaHAoWcmVjc190b3BpY19vbDFxdl9tODloVRA7GAMqAggBUgIIAg%3D%3D:S:ANO1ljLnmTE&gsr=CiuiCigIARocChZyZWNzX3RvcGljX29sMXF2X204OWhVEDsYAyoCCAFSAggC:S:ANO1ljJBunU&hl=en_US&gl=GB';

                    $sumbers		= $clusterPage; 
					
					
					$parse			= parse_url($sumbers);
					$target			= $parse['host'];
                    $target1		= 'https://'.$target;
                    $target2		= $target; 
					

					$contents =  file_get_contents($clusterPage, false, stream_context_create($ssl)); 			
					
					$contents =  preg_replace('#<!doctype.*?<body#si', '<body', $contents);      
					$contents =  preg_replace('#<script.*?<\/script>#si', '', $contents);   
					$contents =  preg_replace('#<nav.*?<\/nav>#si', '', $contents);  
					$contents =  preg_replace('#<body.*?>#si', '', $contents);    
					$contents =  preg_replace('#<div class="VUoKZ".*?<section>#si', '<section>', $contents);   
					$contents =  preg_replace('#<\/section>.*?<\/html>#si', '', $contents);    
					$contents =  preg_replace('#<header.*?<\/header>#si', '', $contents);    
					$contents =  preg_replace('#<section>.*?<div class="ULeU3b" role="listitem">#si', '<section>'.PHP_EOL.''.PHP_EOL.'<div class="ULeU3b" role="listitem">', $contents);   
					$contents =  preg_replace('#<\/div><div class="ULeU3b" role="listitem">#si', '</div>'.PHP_EOL.''.PHP_EOL.'<div class="ULeU3b" role="listitem">', $contents);  
					
 
					$contents =  preg_replace('#<div class="ULeU3b" role="listitem"><div class="VfPpkd-WsjYwc VfPpkd-WsjYwc-OWXEXe-INsAgc KC1dQ Usd1Ac AaN0Dd  Y8RQXd"><div class="VfPpkd-aGsRMb"><div class="VfPpkd-EScbFb-JIbuQc TAQqTe" jscontroller="tKHFxf" jsaction=".*?"><a class="Si6A0c Gy4nib" href="(.*?)" jslog=".*?"><div class="Vc0mnc"><img.*?><div class="aCy7Gf"><button.*?<\/button><\/div><\/div><div class="j2FCNc"><img src="(.*?)" srcset=".*?" class="T75of stzEZd.*?><div class="cXFu1"><div class="ubGTjb"><span class="sT93pb DdYX5 OnEJge ">(.*?)<\/span><\/div><div class="ubGTjb"><span class="sT93pb w2kbF ">(.*?)<\/span><\/div><div class="ubGTjb"><div aria-label=".*?"><span class="sT93pb  CKzsaf"><span class="w2kbF">.*?<\/span><span class="Q4fJQd"><i class="google-material-icons Yvy3Fd" aria-hidden="true">star<\/i><\/span><\/span><\/div><span class="sT93pb w2kbF ePXqnb"><\/span><\/div><\/div><\/div><\/a><div class="VfPpkd-FJ5hab"><\/div><\/div><\/div><span class="VfPpkd-BFbNVe-bF1uUb NZp2ef" aria-hidden="true"><\/span><\/div><\/div>#si', '
					
					<div class="col-12 col-md-6 mb-4">
							<span class="position-relative archive-post--remove app-container">
							<div class="flex-shrink-0">
							<img src="$2" alt="$3" class="app-logo " width="64" height="64"> 
							</div>
							
							<div class="app-info">
							<h3 class="h5 font-weight-semibold w-100 app-title">$3</h3>
							<div class="text-truncate text-muted app-desc">			
							<span class="clamp-1 w-100"> $4 </span>
									
							</div>
							</div>
							<div class="app-get">							
							<form method="POST">
							<input style="display:none" type="text" name="wp_url" value="'.$target1.'$1">
							<input type="submit" id="submit_'.$count.'" name="wp_sb" class="get-button" value="'.postnow2.'" />
							</form>
							
							<!--
							<span class="get-button">'.postnow2.'</span>
							<span class="app-version text-truncate"> <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"></path>
							</svg> </span>
							-->
							</div>
							</span>
					</div> ', $contents);
					
					$contents =  preg_replace('#<section>#si', '', $contents);
					$contents =  preg_replace('#</section>#si', '', $contents);
					$contents =  preg_replace('#<div class="ULeU3b" role="listitem">.*?</span></div></div>#si', '', $contents);    
					$contents =  preg_replace('#<div class="VfPpkd-FJ5hab"></div>#si', '', $contents);
					$contents =  preg_replace('#</div></a></div></div><span class=".*?" aria-hidden="true"></span></div></div></div></div></div>#si', '', $contents);
					
					$contents =  preg_replace('#</div></a></div></div><span class=".*?" aria-hidden="true"></span></div></div>#si', '', $contents);
					$contents =  preg_replace('#</div> </div></div></div>#si', '', $contents);
			
					 
					echo '
			<section>
				<div class="row">';
					echo $contents;					 
					echo '
				</div>
			</section>';
					?> 			  
                    
					 
            </div>
			
			
            <div id="menu2" class="tab-pane fade">
			<div class="play_menu" style="text-transform:uppercase"><b>Alternative</b></div>
			<?php 
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');                      
                    
					$clusterPage = 'https://play.google.com/store/apps/collection/cluster?clp=SjAKKgokcHJvbW90aW9uXzMwMDA3OTFfbmV3X3JlbGVhc2VzX2dhbWVzEEoYAzoCCAE%3D:S:ANO1ljIvgTM&gsr=CjJKMAoqCiRwcm9tb3Rpb25fMzAwMDc5MV9uZXdfcmVsZWFzZXNfZ2FtZXMQShgDOgIIAQ%3D%3D:S:ANO1ljJBvBg&hl=en_US&gl=GB';


					$clusterPage2 = 'https://play.google.com/store/apps/collection/cluster?clp=ogooCAEaHAoWcmVjc190b3BpY19pREdaa09EdG1UMBA7GAMqAggBUgIIAg%3D%3D:S:ANO1ljKeniA&gsr=CiuiCigIARocChZyZWNzX3RvcGljX2lER1prT0R0bVQwEDsYAyoCCAFSAggC:S:ANO1ljKPzfI&hl=en_US&gl=GB';


					$clusterPage3 = 'https://play.google.com/store/apps/collection/cluster?clp=ogooCAEaHAoWcmVjc190b3BpY19vbDFxdl9tODloVRA7GAMqAggBUgIIAg%3D%3D:S:ANO1ljLnmTE&gsr=CiuiCigIARocChZyZWNzX3RvcGljX29sMXF2X204OWhVEDsYAyoCCAFSAggC:S:ANO1ljJBunU&hl=en_US&gl=GB';

                    $sumbers		= $clusterPage; 
					
					$parse			= parse_url($sumbers);
					$target			= $parse['host'];
                    $target1		= 'https://'.$target;
                    $target2		= $target; 
					

					$contents_alt =  file_get_contents($clusterPage, false, stream_context_create($ssl)); 			
					 
					$contents_alt =  preg_replace('#<!doctype.*?<body#si', '<body', $contents_alt);      
					$contents_alt =  preg_replace('#<script.*?<\/script>#si', '', $contents_alt);   
					$contents_alt =  preg_replace('#<nav.*?<\/nav>#si', '', $contents_alt);  
					$contents_alt =  preg_replace('#<body.*?>#si', '', $contents_alt);    
					$contents_alt =  preg_replace('#<div class="VUoKZ".*?<section>#si', '<section>', $contents_alt);   
					$contents_alt =  preg_replace('#<\/section>.*?<\/html>#si', '', $contents_alt);    
					$contents_alt =  preg_replace('#<header.*?<\/header>#si', '', $contents_alt);    
					$contents_alt =  preg_replace('#<section>.*?<div class="ULeU3b" role="listitem">#si', '<section>'.PHP_EOL.''.PHP_EOL.'<div class="ULeU3b" role="listitem">', $contents_alt);   
					$contents_alt =  preg_replace('#<\/div><div class="ULeU3b" role="listitem">#si', '</div>'.PHP_EOL.''.PHP_EOL.'<div class="ULeU3b" role="listitem">', $contents_alt);  
					 
					$contents_alt =  preg_replace('#<div class="ULeU3b" role="listitem"><div class="VfPpkd-WsjYwc VfPpkd-WsjYwc-OWXEXe-INsAgc KC1dQ Usd1Ac AaN0Dd  Y8RQXd"><div class="VfPpkd-aGsRMb"><div class="VfPpkd-EScbFb-JIbuQc TAQqTe" jscontroller="tKHFxf" jsaction=".*?"><a class="Si6A0c Gy4nib" href="(.*?)" jslog=".*?"><div class="Vc0mnc"><img.*?><div class="aCy7Gf"><button.*?<\/button><\/div><\/div><div class="j2FCNc"><img src="(.*?)" srcset=".*?" class="T75of stzEZd.*?><div class="cXFu1"><div class="ubGTjb"><span class="sT93pb DdYX5 OnEJge ">(.*?)<\/span><\/div><div class="ubGTjb"><span class="sT93pb w2kbF ">(.*?)<\/span><\/div><div class="ubGTjb"><div aria-label=".*?"><span class="sT93pb  CKzsaf"><span class="w2kbF">.*?<\/span><span class="Q4fJQd"><i class="google-material-icons Yvy3Fd" aria-hidden="true">star<\/i><\/span><\/span><\/div><span class="sT93pb w2kbF ePXqnb"><\/span><\/div><\/div><\/div><\/a><div class="VfPpkd-FJ5hab"><\/div><\/div><\/div><span class="VfPpkd-BFbNVe-bF1uUb NZp2ef" aria-hidden="true"><\/span><\/div><\/div>#si', '
					
					<div class="col-12 col-md-6 mb-4">
							<span class="position-relative archive-post--remove app-container">
							<div class="flex-shrink-0">
							<img src="$2" alt="$3" class="app-logo " width="64" height="64"> 
							</div>
							
							<div class="app-info">
							<h3 class="h5 font-weight-semibold w-100 app-title">$3</h3>
							<div class="text-truncate text-muted app-desc">			
							<span class="clamp-1 w-100"> $4 </span>
									
							</div>
							</div>
							<div class="app-get">							
							<form method="POST">
							<input style="display:none" type="text" name="wp_url" value="'.$target1.'$1">
							<input type="submit" id="submit_'.$count.'" name="wp_sb" class="get-button" value="'.postnow2.'" />
							</form>
							
							<!--
							<span class="get-button">'.postnow2.'</span>
							<span class="app-version text-truncate"> <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"></path>
							</svg> </span>
							-->
							</div>
							</span>
					</div> ', $contents_alt); 

					
					$contents_alt =  preg_replace('#<section>#si', '', $contents_alt);
					$contents_alt =  preg_replace('#</section>#si', '', $contents_alt);
					$contents_alt =  preg_replace('#<div class="ULeU3b" role="listitem">.*?</span></div></div>#si', '', $contents_alt);    
					$contents_alt =  preg_replace('#<div class="VfPpkd-FJ5hab"></div>#si', '', $contents_alt);
					$contents_alt =  preg_replace('#</div></a></div></div><span class="VfPpkd-BFbNVe-bF1uUb NZp2ef" aria-hidden="true"></span></div></div></div></div></div>#si', '', $contents_alt);
					$contents_alt =  preg_replace('#</div></a></div></div><span class=".*?" aria-hidden="true"></span></div></div></div></div></div>#si', '', $contents_alt);
					
					$contents_alt =  preg_replace('#</div></a></div></div><span class=".*?" aria-hidden="true"></span></div></div>#si', '', $contents_alt);
					$contents_alt =  preg_replace('#</div> </div></div></div>#si', '', $contents_alt);
					 
					echo '
			<section>
				<div class="row">';
					echo $contents_alt;					 
					echo '
				</div>
			</section>';
					?>
			</div>
        </div>
    </div>
    <div style="clear:both"></div>
	
<?php
get_template_part(footerx);
} 