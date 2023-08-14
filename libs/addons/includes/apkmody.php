<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
include_once 'dom.php'; 

function wp_apkmody_errors() {
$sources		= 'apkmody.io';
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

function wp_apkmody() {
$types			= 'post';
$sources		= 'apkmody.io';
$demos			= 'https://apkmody.io/games/terragenesis';
?>
    <div class="play_menu" style="text-transform:uppercase">
        <b>Add sources from <?php echo $sources; ?></b>
    </div>

	<?php 
    if(isset($_POST['wp_sb'])) {
		ini_set('display_errors', 'off');
        if(isset($_POST['wp_url'])) {
            $url				= trim(strip_tags($_POST['wp_url']));
            if(stristr($url, $sources)) {
                require_once 'apkmody.class.php';  
				########## 
				global $opt_themes;
                $getslinks		= new starting_now;
                $gets_data		= $getslinks->scrape_web_info($url, false);
                $title			= wp_strip_all_tags($gets_data['title']);
                $title			= str_replace('Games for Free', '',  $title);
                $title			= str_replace('', '',  $title);
                $title			= str_replace(':', '',  $title);
                $title2			= sanitize_title_with_dashes(ex_themes_clean($gets_data['title']));
                $title22		= sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP']));
                $judul			= $gets_data['title_GP'];
                $title_id		= $gets_data['title_id'];
                $title_GP_ID	= $gets_data['GPS_ID'];
                $version_GP_ID	= $gets_data['version_GP'];
				$title_sources	= ex_themes_clean($gets_data['title']);
				$title_gp		= ex_themes_clean($gets_data['title_GP']);
                $post_stats		= get_option('wp_post_status', 'draft'); 
                $post_status	= $opt_themes['ex_themes_extractor_apk_status_post_']; 
                $post_title		= $opt_themes['ex_themes_extractor_apk_title_']; 
                $post_permalink	= $opt_themes['ex_themes_extractor_apk_permalink_'];
				
                $duplicatepost	= $opt_themes['duplicate_post'];
				 
                if(count($gets_data) AND !isset($gets_data['error'])) {
					global $post, $opt_themes;
					$post_titles		= $gets_data[$post_title];
					$idX				= $post->ID;
					$check_title		= get_page_by_title($post_titles, 'OBJECT', $types);
					
				if($duplicatepost){
					$post_args = array(
                        'post_title'    => $post_titles,
                        'post_name'		=> sanitize_title_with_dashes(ex_themes_clean($gets_data[$post_permalink])),
                        'post_content'  => $gets_data['articlebody_GP'],
                        'post_status'   => $post_status,
                        'post_category' => array($new_cat_ID),
                        'post_type'		=> $types
                    );				
					$post_id	= wp_insert_post( $post_args );
				} else {				
				if (empty($check_title) ){
                    $post_args = array(
                        'post_title'    => $post_titles,
                        'post_name'		=> sanitize_title_with_dashes(ex_themes_clean($gets_data[$post_permalink])),
                        'post_content'  => $gets_data['articlebody_GP'],
                        'post_status'   => $post_status,
                        'post_category' => array($new_cat_ID),
                        'post_type'		=> $types
                    );				
					$post_id	= wp_insert_post( $post_args );
                } else {
					$post_args	= array(
						'ID'				=> $check_title->ID,
						/* 
						'post_title'		=> $post_titles,
						'post_name'			=> sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP'])),
						'post_content'		=> $gets_data['articlebody_GP'],
						*/
						'post_status'		=> $post_status,
						'post_category'		=> array($new_cat_ID),
						'post_type'			=> $types
					);					
					$post_id	= wp_update_post( $post_args ); 					
				}
				}
                    $terms				= array();
                    foreach($gets_data['genres_GP'] as $term):
                        $t_exists		= term_exists( $term, 'category' );
                        if( !$t_exists ):
                            $t			= wp_insert_term( $term, 'category' );
                            $terms[]	= $t['term_id'];
                        else:
                            $terms[]	= $t_exists['term_id'];
                        endif;
                    endforeach;
                    wp_set_post_terms( $post_id, $terms, 'category' );
					
                    add_post_meta( $post_id, 'wp_GP_ID', $gets_data['GP_ID'] );
                    add_post_meta( $post_id, 'wp_GPS_ID', $gets_data['GPS_ID'] );
                    add_post_meta( $post_id, 'wp_title_GP', $gets_data['title_GP'] );
                    add_post_meta( $post_id, 'wp_images_GP', $gets_data['images_GP'] );
                    add_post_meta( $post_id, 'wp_backgrounds_GP', $gets_data['backgrounds_GP'] );
                    add_post_meta( $post_id, 'wp_poster_GP', $gets_data['poster_GP'] );
                    add_post_meta( $post_id, 'wp_youtube_GP', $gets_data['youtube_GP'] );
                    add_post_meta( $post_id, 'wp_genres_GP', $gets_data['genres_GP'] );
                    add_post_meta( $post_id, 'wp_genres_GP', $gets_data['genres_GP'] );
                    wp_set_object_terms( $post_id, $gets_data['genres_GP'], 'category', true );
                    wp_set_object_terms( $post_id, $gets_data['paid_GP2'], 'category', true );
                    add_post_meta( $post_id, 'wp_source_url', $url );
                    add_post_meta( $post_id, 'wp_downloadlink', $gets_data['downloadlink']);
                    add_post_meta( $post_id, 'wp_namedownloadlink', $gets_data['namedownloadlink'] );
                    add_post_meta( $post_id, 'wp_downloadlink2', $gets_data['downloadlink2'] );
                    add_post_meta( $post_id, 'wp_namedownloadlink2', $gets_data['namedownloadlink2'] );
                    add_post_meta( $post_id, 'wp_sizedownloadlink2', $gets_data['sizedownloadlink2'] );
                    add_post_meta( $post_id, 'wp_typedownloadlink2', $gets_data['typedownloadlink2'] );
                    add_post_meta( $post_id, 'wp_title_GP', $gets_data['title_GP'] );
                    add_post_meta( $post_id, 'wp_version', $gets_data['version'] );
                    update_post_meta( $post_id, 'wp_version', $gets_data['version'] );
                    add_post_meta( $post_id, 'wp_version_GP', $gets_data['version_GP'] );
                    wp_set_object_terms( $post_id, $gets_data['version'], 'wp_version', true );
                    wp_set_object_terms( $post_id, $gets_data['version_GP'], 'wp_version_GP', true );
                    add_post_meta( $post_id, 'wp_sizes_apkdownload', $gets_data['sizes_apkdownload'] );
                    wp_set_object_terms( $post_id, $gets_data['sizes_apkdownload'], 'wp_sizes_apkdownload', true );
					
					if($gets_data['sizes_sources']){
                    add_post_meta( $post_id, 'wp_sizes', $gets_data['sizes_sources'] );
					}
                    add_post_meta( $post_id, 'wp_sizes', $gets_data['sizes_GP'] );
                    wp_set_object_terms( $post_id, $gets_data['sizes_GP'], 'wp_sizes', true );
                    add_post_meta( $post_id, 'wp_whatnews_GP', $gets_data['whatnews_GP'] );
                    add_post_meta( $post_id, 'wp_downloadapkxapkg', $gets_data['downloadapkgk'] );
                    wp_set_object_terms( $post_id, $gets_data['downloadapkgk'], 'wp_downloadapkxapkg', true );
                    add_post_meta( $post_id, 'wp_downloadapkxapkpremier', $gets_data['downloadapkxapkpremier'] );
                    wp_set_object_terms( $post_id, $gets_data['downloadapkxapkpremier'], 'wp_downloadapkxapkpremier', true );
					add_post_meta( $post_id, 'wp_developers_GP', str_replace(array('.', ',' ), ' ', $gets_data['developers_GP']) );
					wp_set_post_terms( $post_id, str_replace(array('.', ',' ), ' ', $gets_data['developers_GP']), 'developer' );
					wp_set_object_terms( $post_id, str_replace(array('.', ',' ), ' ', $gets_data['developers_GP']), 'developer', true );
                    add_post_meta( $post_id, 'wp_developers2_GP', str_replace(array('.', ',' ), ' ', $gets_data['developers2_GP']), true );
                    add_post_meta( $post_id, 'wp_installs_GP', $gets_data['installs_GP'] );
                    add_post_meta( $post_id, 'wp_requires_GP', $gets_data['requires_GP'] );
                    add_post_meta( $post_id, 'wp_updates_GP', $gets_data['updates_GP'] );
                    add_post_meta( $post_id, 'wp_ratings_GP', $gets_data['ratings_GP'] );
                    add_post_meta( $post_id, 'wp_rated_GP', $gets_data['rated_GP'] );
                    add_post_meta( $post_id, 'wp_contentrated_GP', $gets_data['contentrated_GP'] );
                    add_post_meta( $post_id, 'wp_desck_GP', $gets_data['desck_GP'] );
                    add_post_meta( $post_id, 'wp_articlebody_GP', $gets_data['articlebody_GP'] );
                    add_post_meta( $post_id, 'wp_article_content', $gets_data['article_content'] );
                    add_post_meta( $post_id, 'wp_mods', $gets_data['mods'] );
                    update_post_meta( $post_id, 'wp_mods', $gets_data['mods'] );
                    add_post_meta( $post_id, 'wp_poster', $gets_data['poster3'] );
                    add_post_meta( $post_id, 'wp_poster3', $gets_data['poster3'] );
                    add_post_meta( $post_id, 'wp_posterx1', $gets_data['posterx1'] );					
                    add_post_meta( $post_id, 'wp_title_wp_mods', $gets_data['mods_alt_title'] );
                    add_post_meta( $post_id, 'wp_mods_post', $gets_data['mods_alt_desc'] );
                    update_post_meta( $post_id, 'wp_mods_post', $gets_data['mods_alt_desc'] );
					
                    add_post_meta( $post_id, 'downloadlink_ori', $gets_data['downloadlink_ori'] );
                    add_post_meta( $post_id, 'downloadlink_ori_1', $gets_data['downloadlink_ori_1'] );
                    add_post_meta( $post_id, 'downloadlink_ori_2', $gets_data['downloadlink_ori_2'] );
                    add_post_meta( $post_id, 'name_downloadlinks_ori', $gets_data['name_downloadlinks_ori'][0] );
                    add_post_meta( $post_id, 'name_downloadlinks_ori_1', $gets_data['name_downloadlinks_ori'][1] );
                    add_post_meta( $post_id, 'name_downloadlinks_ori_2', $gets_data['name_downloadlinks_ori'][2] );
                    add_post_meta( $post_id, 'size_downloadlinks_orig', $gets_data['size_downloadlinks_orig'][0] );
                    add_post_meta( $post_id, 'size_downloadlinks_orig_1', $gets_data['size_downloadlinks_orig'][1] );
                    add_post_meta( $post_id, 'size_downloadlinks_orig_2', $gets_data['size_downloadlinks_orig'][2] );
					
                    add_post_meta( $post_id, 'downloadlink_gma', $gets_data['downloadlink_gma'] );	
                    add_post_meta( $post_id, 'downloadlink_gma_1', $gets_data['downloadlink_gma_1'] );
                    add_post_meta( $post_id, 'downloadlink_gma_2', $gets_data['downloadlink_gma_2'] );
                    add_post_meta( $post_id, 'downloadlink_gma_3', $gets_data['downloadlink_gma_3'] );
                    add_post_meta( $post_id, 'downloadlink_gma_4', $gets_data['downloadlink_gma_4'] );
                    add_post_meta( $post_id, 'downloadlink_gma_5',  $gets_data['downloadlink_gma_5'] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma', $gets_data['name_downloadlink_gma'] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_1', $gets_data['name_downloadlink_gma_1'] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_2', $gets_data['name_downloadlink_gma_2'] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_3', $gets_data['name_downloadlink_gma_3'] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_4', $gets_data['name_downloadlink_gma_4'] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_5', $gets_data['name_downloadlink_gma_5'] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma', $gets_data['size_downloadlinks_gma'][0] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_1', $gets_data['size_downloadlinks_gma'][1] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_2', $gets_data['size_downloadlinks_gma'][2] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_3', $gets_data['size_downloadlinks_gma'][3] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_4', $gets_data['size_downloadlinks_gma'][4] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_5', $gets_data['size_downloadlinks_gma'][5] );
					
                    
					##########					
					add_post_meta( $post_id, 'DLPRO_playstoreID', $gets_data['GP_ID'] );
                    add_post_meta( $post_id, 'DLPRO_AppName', $gets_data['title_GP'] );
                    add_post_meta( $post_id, 'DLPRO_Posters', $gets_data['poster_GP'] );
                    add_post_meta( $post_id, 'DLPRO_youtubes_ID', $gets_data['youtube_GP'] ); 
					add_post_meta( $post_id, 'DLPRO_genres', $gets_data['genres_GP'] );
                    
					if($gets_data['version_GP']){
                    add_post_meta( $post_id, 'DLPRO_Version', $gets_data['version_GP'] );
                    update_post_meta( $post_id, 'DLPRO_Version', $gets_data['version_GP'] );
					} else {						
                    add_post_meta( $post_id, 'DLPRO_Version', $gets_data['version'] );
                    update_post_meta( $post_id, 'DLPRO_Version', $gets_data['version'] );
					}
					if($gets_data['sizes_GP']){
					add_post_meta( $post_id, 'DLPRO_Filesize', $gets_data['sizes_GP'] );
					update_post_meta( $post_id, 'DLPRO_Filesize', $gets_data['sizes_GP'] );
					} else {
					add_post_meta( $post_id, 'DLPRO_Filesize', $gets_data['sizes_sources'] );
					update_post_meta( $post_id, 'DLPRO_Filesize', $gets_data['sizes_sources'] );
					}
					add_post_meta( $post_id, 'DLPRO_Whatsnews', $gets_data['whatnews_GP'] );
					update_post_meta( $post_id, 'DLPRO_Whatsnews', $gets_data['whatnews_GP'] );
					add_post_meta( $post_id, 'DLPRO_Developer', str_replace(array('.', ',' ), ' ', $gets_data['developers_GP']) );
                    add_post_meta( $post_id, 'DLPRO_totalinstalls', $gets_data['installs_GP'] );
					add_post_meta( $post_id, 'DLPRO_Requires', $gets_data['requires_GP'] );
					add_post_meta( $post_id, 'DLPRO_Updated', $gets_data['updates_GP'] );
					update_post_meta( $post_id, 'DLPRO_Updated', $gets_data['updates_GP'] );
                    add_post_meta( $post_id, 'DLPRO_totalrating', $gets_data['ratings_GP'] );
                    add_post_meta( $post_id, 'DLPRO_voted', $gets_data['rated_GP'] );
					add_post_meta( $post_id, 'DLPRO_deskbeforepost', $gets_data['desck_GP'] ); 
					add_post_meta( $post_id, 'DLPRO_mods', $gets_data['mods'] ); 
					update_post_meta( $post_id, 'DLPRO_mods', $gets_data['mods'] ); 
					add_post_meta( $post_id, 'wp_mods2', $gets_data['mods_alt_desc'] );
					update_post_meta( $post_id, 'wp_mods2', $gets_data['mods_alt_desc'] );
                    add_post_meta( $post_id, 'DLPRO_backgroudx', $gets_data['backgrounds_GP'] );
                    update_post_meta( $post_id, 'DLPRO_backgroudx', $gets_data['backgrounds_GP'] );
					
                    
					##########
                    $image_url				= $gets_data['poster_GP'];
                    $image					= $gets_data['poster_GP'];
                    $title_PS				= sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP']));
                    $title_Sources			= sanitize_title_with_dashes(ex_themes_clean($gets_data['title']));
                    $uploaddir				= wp_upload_dir();
                    $filename				= "{$title_PS}.png";
                    $uploadfile				= $uploaddir['path'] . '/' . $filename;
                    $contents				= file_get_contents($image);
                    $savefile				= fopen($uploadfile, 'w');
                    fwrite($savefile, $contents);
                    fclose($savefile);
                    $wp_filetype			= wp_check_filetype(basename($filename), null );
                    $attachment				= array(
                        'post_mime_type'	=> $wp_filetype['type'],
                        'post_title'		=> $filename,
                        'post_content'		=> '',
                        'post_status'		=> 'inherit'
                    );
                    $attach_id				= wp_insert_attachment( $attachment, $uploadfile );
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data			= wp_generate_attachment_metadata( $attach_id, $uploadfile );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $post_id, $attach_id );
					
					##########
                    $modsX					= $gets_data['mods'];
                    $modsX					= str_replace('/', ',', $modsX);
                    $modsX					= str_replace('(', '', $modsX);
                    $modsX					= str_replace(')', '', $modsX);
					
					##########
                    $tags					= array(''.$gets_data['title_GP'].' '.$gets_data['version_GP'].',');
                    wp_set_object_terms( $post_id, $gets_data['genres_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['title_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['developers_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $modsX, 'post_tag', true );
                    wp_set_object_terms( $post_id, $mods, 'post_tag', true );
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
	
    <div style="clear:both"></div>
    <div class="wrap">
        <div class="play_fixedx play_menu" id="play_fixed" style="margin-bottom: 10px;">
            <div class="play_search">
                &nbsp;  &nbsp;
                &nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;
            </div>
            <ul class="play_menus" style="text-transform:capitalize">
                <li><a data-toggle="tab" href="#home"><i class="fa fa-home"></i> Home</a></li>
                <!--<li><a data-toggle="tab" href="#menu4"><i class="fa fa-rss"></i> Latest Post</a></li>-->
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-rss"></i> Latest Post</a></li>
                <!--<li><a data-toggle="tab" href="#menu2"><i class="fa fa-rss"></i> Latest Post Apps</a></li>-->
                <li class="active"><a data-toggle="tab" href="#menu3"><i class="fa fa-rss"></i> Add Manual</a></li>
                <li><a href='admin.php?page=<?php echo options_setting; ?>'><i class="fa fa-cogs"></i> Setting</a></li> 
            </ul>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="containerX">
        <div class="tab-content">
            <div id="home" class="tab-pane fade ">
                <ul class="play_menu" >
				<li><?php global $opt_themes; $post_statusX = $opt_themes['ex_themes_extractor_apk_status_post_']; ?> Your Status Post is <?php global $opt_themes; $wp_post_status12 = $opt_themes['ex_themes_extractor_apk_status_post_']; if($wp_post_status12 != 'draft') { ?> <blink><strong class="blink blink-one" style="color:green"><?php echo $wp_post_status12; ?></strong></blink> You ready to Make auto posting now <?php } else { ?><blink><strong class="blink blink-one" style="color:red"><?php echo $wp_post_status12; ?></strong></blink>. Please Change to <blink><strong class="blink" style="color:green">publish</strong></blink> to make Auto Posting,  you can go to Setting Page <?php } ?> </li>
                </ul>
            </div>
			
            
			 <div id="menu3" class="tab-pane fade in active">
                <div class="play_menu" style="text-transform:uppercase">
                    <b>Add manual</b>
                </div>

			<div class="play_menu" style="text-transform:uppercase">
			<ol style="paddiing-right: 20px !important;margin: 20px;">
			<li>go to <a href="//<?php echo $sources; ?>" target="_blank"><?php echo $sources; ?></a></li>
			<li>use the url into this format: <strong style="color:<?php echo colors_rgb; ?>"><?php echo $demos; ?></strong> </li> 
			</ol>		
			</div>
            <div class="play_menu" ><b>Paste your link post here</b></div>

			<div class="play_menu" >    
                <form name="myForm" id="myForm" method="POST">
                    <input  class="apkextractor"  type="text" name="wp_url"  placeholder="example : <?php echo $demos; ?>" onkeypress="this.style.width =((this.value.length + 1) * 8) + 'px';" >
                    <input type="submit" id="Submit" name="wp_sb" class="button-primary" value="<?php echo postnow2; ?>" />
                </form>

            </div>
            </div>
			
            <div id="menu1" class="tab-pane fade">
                <div class="play_menu" style="text-transform:uppercase">
                    <b>Latest Post Game & apps</b>
                </div>
				
				<section>
				<div class="row">
				<?php  
					ini_set('display_errors', 'off');
                    function latest_games() {
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');  
					ini_set('user_agent', 'My-Application/2.5');					
						$target1	= 'http://apkmody.io/games'; 
						$target2	= 'http://apkmody.io/apps';
                        $html		= file_get_html($target1, false, stream_context_create($ssl));  
                        $html2		= file_get_html($target2, false, stream_context_create($ssl));  
                        foreach($html->find("div.flex-container article") as $article) {
						$item['title']		= trim($article->find('div.has-normal-font-size.no-margin.no-padding.truncate', 0)->{'plaintext'});
						$item['url']		= trim($article->find('a.app.clickable', 0)->href) ;
						 
						$item['version']	= trim($article->find('div.has-small-font-size.truncate', 0)->{'plaintext'});
						$item['mod']		= trim($article->find('div.label.absolute', 0)->{'plaintext'});
						$item['img']		= trim(strip_tags($article->find('img', 0)->src)); 
						/* $item['img']		= str_replace(array('/cdn-cgi/', '/mirage/', '/be69d6e2684cda313b9c423282b4822db7a24ddaeed3ddefba2d5459d49b5dbf', '/6b7a1117181e1cf1a19b7aada9020b129b14bd12e50824a5fadbdf2d080ecf34','/1440','/1280/','miragemirage', 'mirage/'), '', $item['img']); */
						  
						$ret[]				= $item;
						}   
                        foreach($html2->find("div.flex-container article") as $article) {
						$item['title']		= trim($article->find('div.has-normal-font-size.no-margin.no-padding.truncate', 0)->{'plaintext'});
						$item['url']		= trim($article->find('a.app.clickable', 0)->href) ;
						 
						$item['version']	= trim($article->find('div.has-small-font-size.truncate', 0)->{'plaintext'});
						$item['mod']		= trim($article->find('div.label.absolute', 0)->{'plaintext'});
						$item['img']		= trim(strip_tags($article->find('img', 0)->src)); 
						/* $item['img']		= str_replace(array('/cdn-cgi/', '/mirage/', '/be69d6e2684cda313b9c423282b4822db7a24ddaeed3ddefba2d5459d49b5dbf', '/6b7a1117181e1cf1a19b7aada9020b129b14bd12e50824a5fadbdf2d080ecf34','/1440','/1280/','miragemirage', 'mirage/'), '', $item['img']); */
						  
						$ret[]				= $item;
						}
                        $html->clear();
                        unset($html); 
                        /* $html2->clear();
                        unset($html2); */
                        return $ret;
                    } 
                    $ret		= latest_games();
					?>
					 
   
					<?php 
					$count		= 1;
					foreach($ret as $GP_) { if ($GP_['url']) {
					/*
					https://www.php.net/manual/en/function.base64-encode.php#115261
					*/
					if($GP_['img']){
					$image			= $GP_['img']; 
					} else {
					$image 			= NOIMAGES;
					}
					/* $imageData		= base64_encode(file_get_contents($image)); 
					$src			= 'data: '.mime_content_type($image).';base64,'.$imageData;  */
					?>	
					<div class="col-12 col-md-6 mb-4">
							<span class="position-relative archive-post--remove app-container">
							<div class="flex-shrink-0">
							<img src="<?php echo $image; ?>" alt="<?php echo $GP_['title']; ?> - <?php echo $GP_['version']; ?>" class="app-logo " width="64" height="64"> 
							</div>
							
							<div class="app-info">
							<h3 class="h5 font-weight-semibold w-100 app-title"><?php echo $GP_['title']; ?></h3>
							<div class="text-truncate text-muted app-desc">			
							<?php if($GP_['version']){ ?><span class="clamp-1 w-100"><svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"></path>
							</svg> <?php echo $GP_['version']; ?></span>
							<?php } ?>		
							</div>
							</div>
							 
							<div class="app-get">
							
							<form method="POST">
							<input style="display:none" type="text" name="wp_url" value="https://apkmody.io<?php echo $GP_['url']; ?>">
							<input type="submit" id="submit_<?php echo $count; ?>" name="wp_sb" class="get-button" value="<?php echo postnow; ?>" />
							</form>
							
							<!--
							<span class="get-button"><?php echo postnow; ?></span>
							<span class="app-version text-truncate"> <svg class="mr-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"></path>
							</svg><?php echo $GP_['versi']; ?></span>
							-->
							</div>
							 
							</span>
					</div>					 			 
					<?php $count++; }} ?>
					</div>
			</section>
				
            </div>
			 
            <div id="menu2" class="tab-pane fade">
                <div class="play_menu" style="text-transform:uppercase">
                    <b>Latest Post Apps</b>
                </div>
					
			<section>
				<div class="row play_menu">
					&nbsp;&nbsp;<b><?php echo $sources; ?> <u style="color: <?php echo colors; ?>;">something working and not working </u> </b>&nbsp;&nbsp;&nbsp; <i>because <?php echo $sources; ?> its blocked by cloudflare</i> &nbsp;&nbsp;&nbsp; but you can add using manuals
				</div>
			</section>	
                 
            </div> 
			 
           
        </div>
    </div>
    <div style="clear:both"></div>




<?php 
get_template_part(footerx);
}