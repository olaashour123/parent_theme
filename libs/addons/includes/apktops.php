<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
include_once 'dom.php';
function wp_apktops() {
$types			= 'post';
$sources		= 'apktops.ir';
$demos			= 'https://www.apktops.ir/app/roblox/'; 
?>
    <div class="play_menu" style="text-transform:uppercase">
        <b>Add sources from <?php echo $sources; ?></b>
    </div>
    <?php 
    if(isset($_POST['wp_sb'])) {
		ini_set('display_errors', ERRORS);
        if(isset($_POST['wp_url'])) {
            $url				= trim(strip_tags($_POST['wp_url']));
            if(stristr($url, $sources)) {
                require_once 'apktops.class.php';
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
                    add_post_meta( $post_id, 'wp_sizes', $gets_data['sizes_GP'] );
                    wp_set_object_terms( $post_id, $gets_data['sizes_GP'], 'wp_sizes', true );
                    add_post_meta( $post_id, 'wp_whatnews_GP', $gets_data['whatnews_GP'] );
                    add_post_meta( $post_id, 'wp_downloadapkxapkg', $gets_data['downloadapkgk'] );
                    wp_set_object_terms( $post_id, $gets_data['downloadapkgk'], 'wp_downloadapkxapkg', true );
                    add_post_meta( $post_id, 'wp_downloadapkxapkpremier', $gets_data['downloadapkxapkpremier'] );
                    wp_set_object_terms( $post_id, $gets_data['downloadapkxapkpremier'], 'wp_downloadapkxapkpremier', true );
					
                    add_post_meta( $post_id, 'downloadlink_gma', $gets_data['downloadlink_gma'] );	
                    add_post_meta( $post_id, 'downloadlink_gma_1', $gets_data['downloadlink_gma_1'] );
                    add_post_meta( $post_id, 'downloadlink_gma_2', $gets_data['downloadlink_gma_2'] );
                    add_post_meta( $post_id, 'downloadlink_gma_3', $gets_data['downloadlink_gma_3'] );
                    add_post_meta( $post_id, 'downloadlink_gma_4', $gets_data['downloadlink_gma_4'] );
                    add_post_meta( $post_id, 'downloadlink_gma_5',  $gets_data['downloadlink_gma_5'] );
                     
                    add_post_meta( $post_id, 'name_downloadlinks_gma', $gets_data['name_downloadlinks_gma'][0] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_1', $gets_data['name_downloadlinks_gma'][1] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_2', $gets_data['name_downloadlinks_gma'][2] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_3', $gets_data['name_downloadlinks_gma'][3] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_4', $gets_data['name_downloadlinks_gma'][4] );
                    add_post_meta( $post_id, 'name_downloadlinks_gma_5', $gets_data['name_downloadlinks_gma'][5] );
					
                    add_post_meta( $post_id, 'size_downloadlinks_gma', $gets_data['size_downloadlinks_gma'][0] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_1', $gets_data['size_downloadlinks_gma'][1] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_2', $gets_data['size_downloadlinks_gma'][2] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_3', $gets_data['size_downloadlinks_gma'][3] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_4', $gets_data['size_downloadlinks_gma'][4] );
                    add_post_meta( $post_id, 'size_downloadlinks_gma_5', $gets_data['size_downloadlinks_gma'][5] );
					
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
					
                    
					########## 
                    $image_url					= $gets_data['poster_GP'];
                    $image						= $gets_data['poster_GP'];
                    $title_PS					= sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP']));
                    $title_Sources				= sanitize_title_with_dashes(ex_themes_clean($gets_data['title']));
                    $uploaddir					= wp_upload_dir();
                    $filename					= "{$title_PS}.png";
                    $uploadfile					= $uploaddir['path'] . '/' . $filename;
                    $contents					= file_get_contents($image);
                    $savefile					= fopen($uploadfile, 'w');
                    fwrite($savefile, $contents);
                    fclose($savefile);
                    $wp_filetype				= wp_check_filetype(basename($filename), null );
                    $attachment					= array(
												'post_mime_type'	=> $wp_filetype['type'],
												'post_title'		=> $filename,
												'post_content'		=> '',
												'post_status'		=> 'inherit'
                    );
                    $attach_id					= wp_insert_attachment( $attachment, $uploadfile );
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data				= wp_generate_attachment_metadata( $attach_id, $uploadfile );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $post_id, $attach_id );
                    
					########## 
                    $modsX						= $gets_data['mods'];
                    $modsX						= str_replace('/', ',', $modsX);
                    $modsX						= str_replace('(', '', $modsX);
                    $modsX						= str_replace(')', '', $modsX);
                    
					 
                    
					########## 
                    $tags						= array(''.$gets_data['title_GP'].' '.$gets_data['version_GP'].',');
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
                <li><a data-toggle="tab" href="#menu2"><i class="fa fa-rss"></i> Latest Games</a></li>
                <li><a data-toggle="tab" href="#menu3"><i class="fa fa-rss"></i> Latest Apps</a></li>
                <li class="active"><a data-toggle="tab" href="#menu4"><i class="fa fa-rss"></i> Add Manual</a></li>
                <li><a href='admin.php?page=<?php echo options_setting; ?>'><i class="fa fa-cogs"></i> Setting</a></li>
					 
            </ul>
            <div style="clear:both"></div>
        </div>
    </div>
 
        <div class="tab-content">
            <div id="home" class="tab-pane fade">            
                <ul class="play_menu" >
				<li><?php global $opt_themes; $post_statusX = $opt_themes['ex_themes_extractor_apk_status_post_']; ?> Your Status Post is <?php global $opt_themes; $wp_post_status12 = $opt_themes['ex_themes_extractor_apk_status_post_']; if($wp_post_status12 != 'draft') { ?> <blink><strong class="blink blink-one" style="color:green"><?php echo $wp_post_status12; ?></strong></blink> You ready to Make auto posting now <?php } else { ?><blink><strong class="blink blink-one" style="color:red"><?php echo $wp_post_status12; ?></strong></blink>. Please Change to <blink><strong class="blink" style="color:green">publish</strong></blink> to make Auto Posting,  you can go to Setting Page <?php } ?> </li>
                </ul>
            </div>
             
			
            <div id="menu2" class="tab-pane fade">
			    <div class="play_menu" style="text-transform:uppercase">
				<b>Latest Uploads Games </b>
				</div>					         
					<?php ini_set('display_errors', 'off');
                    function latest_games() {
						$target1	= 'https://getmodsapk.com/games'; 
                        // create HTML DOM
                        $html		= file_get_html($target1, LIBXML_NOERROR);
                        // get article block //a/dl/dd[@class='new-games']/text() dd class="d1"
                        foreach($html->find("div.flex") as $article) {
						// get title
						$item['title']		= trim($article->find('h3', 0)->{'plaintext'});
						$item['url']		= trim($article->find('h3 a', 0)->href) ;
						$item['version']	= trim($article->find('span.text-gray-500', 0)->{'plaintext'});
						$item['mod']		= trim($article->find('div.label.absolute', 0)->{'plaintext'});
						 
						$item['img']		= trim($article->find('img', 0)->src) ;
						//$item['img']		= trim($article->find('img', 0)->{'data-original'}); 
					 
						$ret[]				= $item;
						}
                        // clean up memory
                        $html->clear();
                        unset($html);
                        return $ret;
                    } 
                    $ret		= latest_games(); ?>
					
					
					<ul class="responsive-table"> 
					<?php 
					$count		= 1;
					foreach($ret as $GP_) { if ($GP_['url']) { ?>					
					<li class="table-row"> 
						<div class="col col-1" data-label="Image"><img style="width:50px; height:50px;" src="<?php echo $GP_['img']; ?>"></div>
						<div class="col col-2" data-label="Title"><h3 style="font-size: 1.7rem;"><?php echo $GP_['title']; ?> - <?php echo $GP_['version']; ?></h3></div>
						<div class="col col-3" data-label="Submit"><form name="myForm" id="myForm" method="POST" class="sidebar" style=""><input style="display:none" type="text" name="wp_url" value="<?php echo $GP_['url']; ?>"><input type="submit" id="submit_<?php echo $count; ?>" name="wp_sb" class="button-primary abe2" value="<?php echo postnow; ?>"></form></div>
					</li>
					<?php $count++; }} ?>	
					</ul>
			
            </div> 

            <div id="menu3" class="tab-pane fade">
			   <div class="play_menu" style="text-transform:uppercase">
				<b>Latest Post Apps</b>
				</div>
					<?php					
                    function latest_apps() {
						$target1	= 'https://getmodsapk.com/apps'; 
                        // create HTML DOM
                        $html		= file_get_html($target1, LIBXML_NOERROR);
                        // get article block //a/dl/dd[@class='new-games']/text() dd class="d1"
                        foreach($html->find("div.flex") as $article) {
						// get title
						$item['title']		= trim($article->find('h3', 0)->{'plaintext'});
						$item['url']		= trim($article->find('h3 a', 0)->href) ;
						$item['version']	= trim($article->find('span.text-gray-500', 0)->{'plaintext'});
						$item['mod']		= trim($article->find('div.label.absolute', 0)->{'plaintext'});
						 
						$item['img']		= trim($article->find('img', 0)->src) ;
						//$item['img']		= trim($article->find('img', 0)->{'data-original'}); 
					 
						$ret[]				= $item;
						}
                        // clean up memory
                        $html->clear();
                        unset($html);
                        return $ret;
                    } 
                    $ret		= latest_apps(); ?>
					
					
					<ul class="responsive-table"> 
					<?php 
					$count		= 1;
					foreach($ret as $GP_) { if ($GP_['url']) { ?>					
					<li class="table-row"> 
						<div class="col col-1" data-label="Image"><img style="width:50px; height:50px;" src="<?php echo $GP_['img']; ?>"></div>
						<div class="col col-2" data-label="Title"><h3 style="font-size: 1.7rem;"><?php echo $GP_['title']; ?> - <?php echo $GP_['version']; ?></h3></div>
						<div class="col col-3" data-label="Submit"><form name="myForm" id="myForm" method="POST" class="sidebar" style=""><input style="display:none" type="text" name="wp_url" value="<?php echo $GP_['url']; ?>"><input type="submit" id="submit_<?php echo $count; ?>" name="wp_sb" class="button-primary abe2" value="<?php echo postnow; ?>"></form></div>
					</li>
					<?php $count++; }} ?>	
					</ul>
				 
            </div> 
            <div id="menu4" class="tab-pane fade in active">
                <div class="play_menu" style="text-transform:uppercase">
				<b>Add manual</b>
				</div>
              <div class="play_menu" style="text-transform:uppercase">
                <ol style="paddiing-right: 20px !important;margin: 20px;">
                    <li>Open website <a style="color:#1e73be" href="https://<?php echo $sources; ?>" target="_blank"><?php echo $sources; ?></a></li>
                    <li>Copy link post and paste to form</li>
                    <li>use the url into this format:  <strong style="color:#1e73be;text-transform:lowercase!important"><?php echo $demos; ?></strong> </li>
                </ol>				
				</div>
				<div class="play_menu" >
				<b>Paste your link post here</b>
				</div>
				<div class="play_menu" >
				 
                <form name="myForm" id="myForm" method="POST">
				<input class="apkextractor" type="text" name="wp_url" placeholder="example : <?php echo $demos; ?>" onkeypress="this.style.width =((this.value.length + 1) * 8) + 'px';" >
				<input type="submit" id="Submit" name="wp_sb" class="button-primary" value="<?php echo postnow; ?>" />
				</form>
				</div> 
				
            </div>
        </div>
 
    <div style="clear:both"></div>
 
<?php
get_template_part(footerx);
}