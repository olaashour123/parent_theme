<?php
if ( ! defined( 'ABSPATH' ) ) exit;
ini_set('display_errors','on');
include_once 'dom.php';
function wp_rajaapk() {
    ?>
    <div class="play_menu" style="text-transform:uppercase">
        <b>Add sources from rajaapk</b>
    </div>
    <?php
    if(isset($_POST['wp_sb'])) {
        if(isset($_POST['wp_url'])) {
            $url = trim(strip_tags($_POST['wp_url']));
            if(stristr($url, 'rajaapk.com')) {
                require_once 'rajaapk.class.php';
                $getslinks = new getslinks;
                $gets_data = $getslinks->scrape_web_info($url, false);
                $title = wp_strip_all_tags($gets_data['title']);
                $title = str_replace('Games for Free', '',  $title);
                $title = str_replace('', '',  $title);
                $title = str_replace(':', '',  $title);
                $title2 = sanitize_title_with_dashes(ex_themes_clean($gets_data['title']));
                $title22 = sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP']));
                $judul = $gets_data['title_GP'];
                $title_id = $gets_data['title_id'];
                $title_GP_ID = $gets_data['GPS_ID'];
                $version_GP_ID = $gets_data['version_GP'];
                $linkX = get_bloginfo('url'); $parse = parse_url($linkX); $watermark1 = $parse['host'];
                $intro1 = $gets_data['intro'];
                $intro2 = ''.$title.' is the most famous version in the <b><i>'.$gets_data['title'].'</i></b> series of publisher '.$gets_data['developers_GP'].'. What you would expect in a '.$gets_data['genres_GP'].' is available in this. In this mod, <span style="color: #FF0000;text-transform: capitalize!important;">'.trim(strip_tags($gets_data['mods'])).'</span>. With this mod, this '.$judul.' will be easy for you. Enjoy playing the <i>'.$gets_data['title'].'</i> <b><u><i>Download '.$judul.' Hack Apk Mod</i></u></b> now on <a href="'.$linkX.'">'.$watermark1.'</a>';
                $title_sources = ex_themes_clean($gets_data['title']);
                $title_gp = ex_themes_clean($gets_data['title_GP']);
                $post_status = get_option('wp_post_status', 'draft');
                global $opt_themes;
                $post_statusX = $opt_themes['ex_themes_extractor_apk_status_post_'];
                $post_titlee = $opt_themes['ex_themes_extractor_apk_title_'];
                $permalink_titlee = $opt_themes['ex_themes_extractor_apk_permalink_'];
                if(count($gets_data) AND !isset($gets_data['error'])) {
                    $idX = $post->ID;
                    global $opt_themes;
                    ##########   Create post object
                    $my_post = array(
                        'post_title'    => ''.$gets_data[$post_titlee].'',
                        'post_name' => ''.sanitize_title_with_dashes(ex_themes_clean($gets_data[$permalink_titlee])).'',
                        /*'post_content'  => ''.$intro1.'<br><br>'.$gets_data['articlebody_GP'].'',*/
                        'post_content'  => ''.$gets_data['articlebody_GP'].'',
                        'post_status'   => $post_statusX, /* publish or draft */
                        'post_author'   => 1,
                        'post_category' => array($new_cat_ID),
                        'post_type' 	  => 'post'
                    );
                    ##########   Insert the post into the database
                    $post_id = wp_insert_post( $my_post );
                    ##########   Create genres
                    /**/
                    $genresapkgk = $gets_data['genres_GP'];
                    $terms = array();
                    foreach($genresapkgk as $term):
                        $t_exists = term_exists( $term, 'category' );
                        if( !$t_exists ):
                            $t = wp_insert_term( $term, 'category' );
                            $terms[] = $t['term_id'];
                        else:
                            $terms[] = $t_exists['term_id'];
                        endif;
                    endforeach;
                    //wp_set_post_terms( $post_id, $terms, 'genre' );
                    wp_set_post_terms( $post_id, $terms, 'category' );
					
                    ##########   add wp_GP_ID
                    $title_id = $gets_data['GP_ID'];
                    add_post_meta( $post_id, 'wp_GP_ID', $title_id );
                    add_post_meta( $post_id, 'DLPRO_playstoreID', $title_id );
					
                    ##########   add wp_GP_ID
                    $GP_ID = $gets_data['GP_ID'];
                    add_post_meta( $post_id, 'wp_GP_ID', $GP_ID );
                    $GPS_ID = $gets_data['GPS_ID'];
                    add_post_meta( $post_id, 'wp_GPS_ID', $GPS_ID );
					
                    ##########   add wp_title_GP
                    $name = $gets_data['title_GP'];
                    add_post_meta( $post_id, 'wp_title_GP', $name );
                    add_post_meta( $post_id, 'DLPRO_AppName', $name );
					
                    ##########   add images
                    $gambarX21 = $gets_data['images_GP'];
                    add_post_meta( $post_id, 'wp_images_GP', $gambarX21 );
					
                    ##########   add poster_GP
                    $postergp = $gets_data['poster_GP'];
                    add_post_meta( $post_id, 'wp_poster_GP', $postergp );
                    add_post_meta( $post_id, 'DLPRO_Posters', $postergp );
					
                    ##########   add youtube_GP
                    $youtube = $gets_data['youtube_GP'];
                    add_post_meta( $post_id, 'wp_youtube_GP', $youtube );
                    add_post_meta( $post_id, 'DLPRO_youtubes_ID', $youtube ); 
					
                    ##########   add genres_GP
                    $categorie = $gets_data['genres_GP'];
                    add_post_meta( $post_id, 'wp_genres_GP', $categorie );
					add_post_meta( $post_id, 'DLPRO_genres', $categorie );
                    /*
                    $categorie = $gets_data['kategori1'];
                    add_post_meta( $post_id, 'wp_categorie', $categorie );
                    wp_set_object_terms( $post_id, $categorie, 'category', true );
                    */
					
                    ##########   add genres_GP
                    $genres = $gets_data['genres_GP'];
                    $paid1 = $gets_data['paid_GP2'];
                    add_post_meta( $post_id, 'wp_genres_GP', $genres );
                    wp_set_object_terms( $post_id, $genres, 'category', true );
                    wp_set_object_terms( $post_id, $paid1, 'category', true );
					
                    ##########   add wp_source_url
                    add_post_meta( $post_id, 'wp_source_url', $url );
					
                    ##########   add downloadlink
                    $download = $gets_data['downloadlink'];
                    add_post_meta( $post_id, 'wp_downloadlink', $download );
					
                    ##########   add namedownloadlink
                    $namedownload = $gets_data['namedownloadlink'];
                    add_post_meta( $post_id, 'wp_namedownloadlink', $namedownload );
					
                    ##########   add downloadlink2
                    $download2 = $gets_data['downloadlink2'];
                    add_post_meta( $post_id, 'wp_downloadlink2', $download2 );
                    add_post_meta( $post_id, 'wp_downloadlink2', $download2 );
					
                    ##########   add namedownloadlink2
                    $namedownload2 = $gets_data['namedownloadlink2'];
                    add_post_meta( $post_id, 'wp_namedownloadlink2', $namedownload2 );
					
                    ##########   add title_GP
                    $judul = $gets_data['title_GP'];
                    add_post_meta( $post_id, 'wp_title_GP', $judul );
					
                    ##########   add version
                    $version = $gets_data['version'];
                    add_post_meta( $post_id, 'wp_version', $version );
                    add_post_meta( $post_id, 'DLPRO_Version', $version );
                    wp_set_object_terms( $post_id, $version, 'wp_version_GP', true );
                    
                    $version = $gets_data['version_GP'];
                    add_post_meta( $post_id, 'wp_version_GP', $version );
                    wp_set_object_terms( $post_id, $version, 'wp_version_GP', true );
					
                    ##########   add sizes
                    $sizes = $gets_data['sizes'];
                    add_post_meta( $post_id, 'wp_sizes', $sizes );
					add_post_meta( $post_id, 'DLPRO_Filesize', $sizes );					
                    wp_set_object_terms( $post_id, $sizes, 'wp_sizes', true );
					
                    ##########   add sizes_GP
                    $sizes_GP = $gets_data['sizes_GP'];
                    add_post_meta( $post_id, 'wp_sizes_GP', $sizes_GP );
					add_post_meta( $post_id, 'DLPRO_Filesize', $sizes_GP );					
                    wp_set_object_terms( $post_id, $sizes_GP, 'wp_sizes_GP', true );
					
                    #########   add whatnews_GP
                    $whatnews = $gets_data['whatnews_GP'];
                    add_post_meta( $post_id, 'wp_whatnews_GP', $whatnews );
					add_post_meta( $post_id, 'DLPRO_Whatsnews', $whatnews );
					
                    ##########   add developers_GP
                    $developers = $gets_data['developers_GP'];
                    add_post_meta( $post_id, 'wp_developers_GP', $developers );
					add_post_meta( $post_id, 'DLPRO_Developer', $developers );
                    wp_set_post_terms( $post_id, $developers, 'developer' );
                    wp_set_object_terms( $post_id, $developers, 'developer', true );
					
                    ##########   add developers2_GP
                    $developers2 = $gets_data['developers2_GP'];
                    add_post_meta( $post_id, 'wp_developers2_GP', $developers2, true );
					
                    ##########   add installs_GP
                    $installs = $gets_data['installs_GP'];
                    add_post_meta( $post_id, 'wp_installs_GP', $installs );
                    add_post_meta( $post_id, 'DLPRO_totalinstalls', $installs );

                    ##########   add requires_GP
                    $requires = $gets_data['requires_GP'];
                    add_post_meta( $post_id, 'wp_requires_GP', $requires );
					add_post_meta( $post_id, 'DLPRO_Requires', $requires );
					
                    ##########   add updates_GP
                    $updates = $gets_data['updates_GP'];
                    add_post_meta( $post_id, 'wp_updates_GP', $updates );
					add_post_meta( $post_id, 'DLPRO_Updated', $updates );
					
                    ##########   add ratings_GP
                    $ratings = $gets_data['ratings_GP'];
                    add_post_meta( $post_id, 'wp_ratings_GP', $ratings );
                    add_post_meta( $post_id, 'DLPRO_totalrating', $ratings );

                    ##########   add rated_GP
                    $rated = $gets_data['rated_GP'];
                    add_post_meta( $post_id, 'wp_rated_GP', $rated );
					add_post_meta( $post_id, 'input[id=rmp-avg]', $rated );
                    wp_set_object_terms( $post_id, $rated, 'input[id=rmp-avg]', true );
                    add_post_meta( $post_id, 'DLPRO_voted', $rated );

                    ##########   add contentrated_GP
                    $contentrated = $gets_data['contentrated_GP'];
                    add_post_meta( $post_id, 'wp_contentrated_GP', $contentrated );
                    add_post_meta( $post_id, 'DLPRO_contentrated', $contentrated );

                    ##########   add desck_GP
                    $desck = $gets_data['desck_GP'];
                    add_post_meta( $post_id, 'wp_desck_GP', $desck );
					add_post_meta( $post_id, 'DLPRO_deskbeforepost', $desck );
					
                    ##########   add comments1
                    $comments = $gets_data['comments1'];
                    add_post_meta( $post_id, 'wp_comments1', $comments );
					
                    ##########   add articlebody_GP
                    $articlebody = $gets_data['articlebody_GP'];
                    add_post_meta( $post_id, 'wp_articlebody_GP', $articlebody );
					
					##########   add mods
                    $modfeatures = $gets_data['mods'];
                    add_post_meta( $post_id, 'wp_mods', $modfeatures );
					add_post_meta( $post_id, 'DLPRO_mods', $modfeatures );
					
                    ##########   add mods2
                    $modfeatures2 = strip_tags($gets_data['mods2']);
                    add_post_meta( $post_id, 'wp_mods2', $modfeatures2 );
					//add_post_meta( $post_id, 'DLPRO_mods2', $modfeatures2 );
					 
                    ##########   add poster
                    $poster1 = $gets_data['poster3'];
                    $poster2 = $gets_data['posterx1'];
                    $poster3 = $gets_data['poster3'];
                    $poster = $poster1;
                    add_post_meta( $post_id, 'wp_poster', $poster );
                    add_post_meta( $post_id, 'wp_poster3', $poster3 );
                    add_post_meta( $post_id, 'wp_posterx1', $poster2 );
					
					
					$opt_themes; if($opt_themes['ex_themes_save_apk_']) {  					
					//$urlapk = $gets_data['downloadlink2'][0];
					$urlapk1 = $gets_data['downloadlink2'];
                    $urlapk = array();
                    foreach($urlapk1 as $term):
                        $urlapk_exists = $gets_data['downloadlink2'];                         
                    endforeach;

					$nameapk = sanitize_title_with_dashes(ex_themes_clean($gets_data['namedownloadlink2'][0]));
					$uploaddirapk = wp_upload_dir();
                    $full = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					$domen = str_replace(['https://','http://'],'',home_url());
					$domen = explode('/',$domen)[0];
					$domen2 = str_replace(['https://','http://'],'',get_the_permalink($post->ID)); 
					$filenameapk = $nameapk.'_'.$domen.'.apk';
 					$uploadfileapk = $uploaddirapk['path'] . '/' . $filenameapk;
					if( !file_exists($uploadfileapk) ) {
						$contentsapk= file_get_contents($urlapk);
						$savefileapk = fopen($uploadfileapk, 'w');
						fwrite($savefileapk, $contentsapk);
						fclose($savefileapk);
					}
					$wp_filetypeapk = wp_check_filetype(basename($filenameapk), null );
					$attachmentapk = array(
						'post_mime_type' => $wp_filetypeapk['type'],
						'post_title' => $filenameapk,
						'post_content' => '',
						'post_status' => 'inherit'
					);
					wp_insert_attachment( $attachmentapk, $uploadfileapk, $post_id );
					$wp_downloadlink = get_post_meta( $post_id, 'wp_downloadlink2', true );
					$wp_downloadlink2 = $uploaddirapk['url']."/".$filenameapk;
                    /*
					$datos_download = get_post_meta( $post_id, 'datos_download', true );
					$datos_download = ( !empty($datos_download) ) ? $datos_download : array(); 
					$datos_download['option'] = 'direct-download';
					$datos_download['direct-download'] = $uploaddirapk['url']."/".$filenameapk;
					*/
					$datos_downloadX = $uploaddirapk['url']."/".$filenameapk;
					add_post_meta( $post_id, 'wp_downloadlink2', $wp_downloadlink2 );
					update_post_meta( $post_id, 'wp_downloadlink2', $wp_downloadlink2 ); 
					}
					
                    ##########   Upload poster
                    $image_url = $gets_data['poster_GP'];
                    $image = $gets_data['poster_GP'];
                    $title_PS = sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP']));
                    $title_Sources = sanitize_title_with_dashes(ex_themes_clean($gets_data['title']));
                    $uploaddir = wp_upload_dir();
                    $filename = "download-{$title_PS}.png";
                    $uploadfile = $uploaddir['path'] . '/' . $filename;
                    $contents= file_get_contents($image);
                    $savefile = fopen($uploadfile, 'w');
                    fwrite($savefile, $contents);
                    fclose($savefile);
                    $wp_filetype = wp_check_filetype(basename($filename), null );
                    $attachment = array(
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title' => $filename,
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );
                    $attach_id = wp_insert_attachment( $attachment, $uploadfile );
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data = wp_generate_attachment_metadata( $attach_id, $uploadfile );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $post_id, $attach_id );

                    $modsX = $gets_data['mods'];
                    $modsX = str_replace('/', ',', $modsX);
                    $modsX = str_replace('(', '', $modsX);
                    $modsX = str_replace(')', '', $modsX);
                    $mods = implode(", ", $modsX );
                    add_post_meta( $post_id, 'wp_mods', implode(", ", $modsX ) );
                    add_post_meta( $post_id, 'wp_title2', implode(", ", $gets_data['title2'] ) );
                    ##########   add tag  $gets_data['version_GP']
                    $tags = array(''.$gets_data['title_GP'].' '.$gets_data['version_GP'].',');
                    wp_set_object_terms( $post_id, $gets_data['genres_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['title_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['developers_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $modsX, 'post_tag', true );
                    wp_set_object_terms( $post_id, $mods, 'post_tag', true );
                    wp_set_object_terms( $post_id, $tags, 'post_tag', true );
										if ($post_id)
											$urlX = get_post_permalink( $post_id, $leavename, $sample );
										require_once 'result.php';
										require_once 'debug.php';
                }
            }else{
                echo '<div class="play_menu" style="text-transform:uppercase!important;color:#00a0d2"><h3 style="color:#00a0d2">Please check your link.. your link is <b style="color:red">'.$url.'</b></h3></div>';
            }
        }
    }
    ?>
    <?php get_template_part('libs/inc/ReduxCore/admin/libs/addscript'); ?>
    <div style="clear:both"></div>
    <div class="wrap">
        <div class="play_fixedx play_menu" id="play_fixed" style="margin-bottom: 10px;">
            <div class="play_search">
                &nbsp;  &nbsp;
                &nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;
            </div>
            <ul class="play_menus" style="text-transform:capitalize">
                <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-home"></i> Home</a></li>
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-rss"></i> Latest Upload Games</a></li>
                <li><a data-toggle="tab" href="#menu2"><i class="fa fa-rss"></i> Latest Upload Apps</a></li>
                <li><a data-toggle="tab" href="#menu3"><i class="fa fa-rss"></i> Add Manual</a></li>
                <li><a href='admin.php?page=<?php echo ''.setting_opt.'' ?>'><i class="fa fa-cogs"></i> Setting</a></li>
                
            </ul>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="containerX">
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <ul class="play_menu">
                    <li> <?php global $opt_themes;
                        $post_statusX = $opt_themes['ex_themes_extractor_apk_status_post_']; ?>
                        Your Status Post is <?php global $opt_themes; $wp_post_status12 = $opt_themes['ex_themes_extractor_apk_status_post_']; if($wp_post_status12 != 'draft') { ?>
                            <blink><strong class="blink blink-one" style="color:green"><?php echo $wp_post_status12; ?></strong></blink> You ready to Make auto posting now
                        <?php } else { ?><blink><strong class="blink blink-one" style="color:red"><?php echo $wp_post_status12; ?></strong></blink>. Please Change to <blink><strong class="blink" style="color:green">publish</strong></blink>
                            to make Auto Posting,  you can go to Setting Page <?php } ?>
                    </li>
                </ul>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="play_menu" style="text-transform:uppercase">
                    <b>Latest Upload Game</b>
                </div>
                <p>
                    <?php
                    function apk_games() {
                        // create HTML DOM
                        $html = file_get_html('https://rajaapk.com/games/', LIBXML_NOERROR);
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($curl, CURLOPT_URL, $html);
                        curl_setopt($curl, CURLOPT_REFERER, $html);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                        $str = curl_exec($curl);
                        curl_close($curl);      
                        
                        foreach($html->find('//div[@class=\'inner-box\']') as $article) {
                            $item['title'] = trim($article->find('img', 0)->{'alt'});
                            $item['url']  = trim($article->find('a', 0)->href);
                            $item['img'] = str_replace(array('-64x64', '', '', ''), '', trim($article->find('noscript img', 0)->{'src'}));
                            $item['noimg'] = ''.get_bloginfo('template_directory') . '/assets/images/lazy.png';
							if ( $item['img'] === FALSE or $item['img'] == '' ) $item['img'] = $item['noimg'] = $item['noimg'];
                            $ret[] = $item;
                        }                      
                        $html->clear();
                        unset($html);
                        return $ret;
                    }
                    // -----------------------------------------------------------------------------
                    // test it!
                    $ret = apk_games();
                    foreach($ret as $GP_) {
                        echo '<div class="play_list" >';
                        echo '<div class="play_lists " >';
                        echo '<img src="'.$GP_['img'].'" title="'.$GP_['title'].'" class="play_thumb" width="">';
                        echo '<div class="play_detail">';
                        echo '<h4>'.$GP_['title'].'</h4>';
                        echo '<span class="play_rating"><i class="fa fa-star"></i> '. mt_rand(3, 5).'.'. mt_rand(0, 9).'</span>';
                        echo '<span class="play_rating" style="float:right;"><a href="'.$GP_['url'].'"><i class="fa fa-eye"></i> view</a></span>';
                        echo '</div>';
                        echo '<form name="myForm" id="myForm" method="POST"><input style="display:none" type="text" name="wp_url" value="'.$GP_['url'].'"  /><input type="submit" id="Submit" name="wp_sb" class="button-primary abe2" value="Add Post" /></form>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </p>
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="play_menu" style="text-transform:uppercase">
                    <b>Latest Upload Apps</b>
                </div>
                <p>
                    <?php
                    function apk_apps() {
                        $html = file_get_html('https://rajaapk.com/apps/', LIBXML_NOERROR);
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($curl, CURLOPT_URL, $html);
                        curl_setopt($curl, CURLOPT_REFERER, $html);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                        $str = curl_exec($curl);
                        curl_close($curl);      
                        
                          foreach($html->find('//div[@class=\'inner-box\']') as $article) {
                            $item['title'] = trim($article->find('img', 0)->{'alt'});
                            $item['url']  = trim($article->find('a', 0)->href);
                            $item['img'] = str_replace(array('-64x64', '', '', ''), '', trim($article->find('noscript img', 0)->{'src'}));
                            $item['noimg'] = ''.get_bloginfo('template_directory') . '/assets/images/lazy.png';
							if ( $item['img'] === FALSE or $item['img'] == '' ) $item['img'] = $item['noimg'] = $item['noimg'];
                            $ret[] = $item;
                        }              
                        // clean up memory apk-32x32
                        $html->clear();
                        unset($html);
                        return $ret;
                    }
                    // -----------------------------------------------------------------------------
                    // test it!
                    $ret = apk_apps();
                    foreach($ret as $GP_) {
                        echo '<div class="play_list" >';
                        echo '<div class="play_lists " >';
                        echo '<img src="'.$GP_['img'].'" title="'.$GP_['title'].'" class="play_thumb" width="">';
                        echo '<div class="play_detail">';
                        echo '<h4>'.$GP_['title'].'</h4>';
                        echo '<span class="play_rating"><i class="fa fa-star"></i> '. mt_rand(3, 5).'.'. mt_rand(0, 9).'</span>';
                        echo '<span class="play_rating" style="float:right;"><a href="'.$GP_['url'].'"><i class="fa fa-eye"></i> view</a></span>';
                        echo '</div>';
                        echo '<form name="myForm" id="myForm" method="POST"><input style="display:none" type="text" name="wp_url" value="'.$GP_['url'].'"  /><input type="submit" id="Submit" name="wp_sb" class="button-primary abe2" value="Add Post" /></form>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </p>
            </div>
            <div id="menu3" class="tab-pane fade">
                <div class="play_menu" style="text-transform:uppercase">
                    <b>Add manual</b>
                </div>
                <div class="play_menu" style="text-transform:uppercase">
                <ol style="paddiing-right: 20px !important;margin: 20px;">
				 
				<li>Open website <a style="color:#1e73be" href="https://rajaapk.com/" target="_blank">rajaapk.com</a></li>
				<li>Copy link post and paste to form</li>
				<li>use the url into this format: <strong style="color:#1e73be;text-transform:lowercase!important">https://rajaapk.com/among-us-mod-apk/</strong> </li>
                </ol>
				</div>
				<div class="play_menu" >
				<b>Paste your link post here</b>
				</div>
				<div class="play_menu" >
                <form name="myForm" id="myForm" method="POST">
                    <input class="apkextractor" type="text" name="wp_url"  placeholder="example : https://rajaapk.com/among-us-mod-apk/" onkeypress="this.style.width =((this.value.length + 1) * 8) + 'px';" >
                    <input type="submit" id="Submit" name="wp_sb" class="button-primary" value="Posting Now" />
                </form>
                </div>
            </div>
        </div>
    </div>
    <div style="clear:both"></div> 
    <?php get_template_part('libs/inc/ReduxCore/admin/libs/footer'); ?>
<?php }