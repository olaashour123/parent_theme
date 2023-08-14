<?php
if ( ! defined( 'ABSPATH' ) ) exit;
 
include_once 'dom.php';
function wp_apkdownload() {
$sources = 'apkmod.cc';
$demos = 'https://apkmod.cc/lifesim-2-mod-apk/';
    ?>
    <div class="play_menu" style="text-transform:uppercase">
        <b>Add sources from <?php echo $sources; ?></b>
    </div>
    <?php
    if(isset($_POST['wp_sb'])) {
        if(isset($_POST['wp_url'])) {
            $url = trim(strip_tags($_POST['wp_url']));
            if(stristr($url, $sources)) {
                require_once 'apkdownload.class.php';
                $getslinks = new starting_now;
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
                        /* 'post_author'   => 1, */
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
                    ##########   add wp_GP_ID
                    $GP_ID = $gets_data['GP_ID'];
                    add_post_meta( $post_id, 'wp_GP_ID', $GP_ID );
                    $GPS_ID = $gets_data['GPS_ID'];
                    add_post_meta( $post_id, 'wp_GPS_ID', $GPS_ID );
                    ##########   add wp_title_GP
                    $name = $gets_data['title_GP'];
                    add_post_meta( $post_id, 'wp_title_GP', $name );
                    ##########   add images
                    $gambarX21 = $gets_data['images_GP'];
                    add_post_meta( $post_id, 'wp_images_GP', $gambarX21 );
                    ##########   add images
                    $backgrounds_GP = $gets_data['backgrounds_GP'][0];
                    add_post_meta( $post_id, 'wp_backgrounds_GP', $backgrounds_GP );
                    ##########   add images
                    $postergp = $gets_data['poster_GP'];
                    add_post_meta( $post_id, 'wp_poster_GP', $postergp );
                    ##########   add youtube gambarX21
                    $youtube = $gets_data['youtube_GP'];
                    add_post_meta( $post_id, 'wp_youtube_GP', $youtube );
                    ##########   add categorie1
                    $categorie = $gets_data['genres_GP'];
                    add_post_meta( $post_id, 'wp_genres_GP', $categorie );
                    /*
                    $categorie = $gets_data['kategori1'];
                    add_post_meta( $post_id, 'wp_categorie', $categorie );
                    wp_set_object_terms( $post_id, $categorie, 'category', true );
                    */
                    ##########   add genres
                    $genres = $gets_data['genres_GP'];
                    $paid1 = $gets_data['paid_GP2'];
                    add_post_meta( $post_id, 'wp_genres_GP', $genres );
                    wp_set_object_terms( $post_id, $genres, 'category', true );
                    wp_set_object_terms( $post_id, $paid1, 'category', true );
                    ##########   add wp_source_url
                    add_post_meta( $post_id, 'wp_source_url', $url );
                    ##########   add wp_title
                    $download = $gets_data['downloadlink'];
                    add_post_meta( $post_id, 'wp_downloadlink', $download );
                    ##########   add wp_title
                    $namedownload = $gets_data['namedownloadlink'];
                    add_post_meta( $post_id, 'wp_namedownloadlink', $namedownload );
                    ##########   add wp_title
                    $download2 = $gets_data['downloadlink2'];
                    add_post_meta( $post_id, 'wp_downloadlink2', $download2 );
                    ##########   add wp_title
                    $namedownload2 = $gets_data['namedownloadlink2'];
                    add_post_meta( $post_id, 'wp_namedownloadlink2', $namedownload2 );
                    ##########   add wp_title
                    $judul = $gets_data['title_GP'];
                    add_post_meta( $post_id, 'wp_title_GP', $judul );
                    ##########   add wp_title datos_informacion[version]
                    $version = $gets_data['version'];
                    $version_GP = $gets_data['version_GP'];
                    add_post_meta( $post_id, 'wp_version', $version );
                    add_post_meta( $post_id, 'wp_version_GP', $version_GP );
                    wp_set_object_terms( $post_id, $version, 'wp_version', true );
                    wp_set_object_terms( $post_id, $version_GP, 'wp_version_GP', true );
                    ##########   add wp_title datos_informacion[version]
                    $sizes = $gets_data['sizes_apkdownload'];
                    add_post_meta( $post_id, 'wp_sizes_apkdownload', $sizes );
                    wp_set_object_terms( $post_id, $sizes, 'wp_sizes_apkdownload', true );
                    ##########   add wp_title datos_informacion[version]
                    $sizes_GP = $gets_data['sizes_GP'];
                    add_post_meta( $post_id, 'wp_sizes_GP', $sizes_GP );
                    wp_set_object_terms( $post_id, $sizes_GP, 'wp_sizes_GP', true );
                    #########   add whatnews
                    $whatnews = $gets_data['whatnews_GP'];
                    add_post_meta( $post_id, 'wp_whatnews_GP', $whatnews );
                    #########   add whatnews
					
					$downloadapkgk = $gets_data['downloadapkgk'];
                    add_post_meta( $post_id, 'wp_downloadapkxapkg', $downloadapkgk );
                    wp_set_object_terms( $post_id, $downloadapkgk, 'wp_downloadapkxapkg', true );
                    $downloadapkxapkpremiers = $gets_data['downloadapkxapkpremier'];
                    add_post_meta( $post_id, 'wp_downloadapkxapkpremier', $downloadapkxapkpremiers );
                    wp_set_object_terms( $post_id, $downloadapkxapkpremiers, 'wp_downloadapkxapkpremier', true );
					
					##########   add developers

					$developers = str_replace(array('.', ',' ), ' ', $gets_data['developers_GP']);

					add_post_meta( $post_id, 'wp_developers_GP', $developers );
					wp_set_post_terms( $post_id, $developers, 'developer' );
					wp_set_object_terms( $post_id, $developers, 'developer', true );
					##########   add developers
					$developers2 = str_replace(array('.', ',' ), ' ', $gets_data['developers2_GP']);
                    add_post_meta( $post_id, 'wp_developers2_GP', $developers2, true );
                    ##########   add installs
                    $installs = $gets_data['installs_GP'];
                    add_post_meta( $post_id, 'wp_installs_GP', $installs );
                    ##########   add requires
                    $requires = $gets_data['requires_GP'];
                    add_post_meta( $post_id, 'wp_requires_GP', $requires );
                    ##########   add updates
                    $updates = $gets_data['updates_GP'];
                    add_post_meta( $post_id, 'wp_updates_GP', $updates );
                    ##########   add ratings
                    $ratings = $gets_data['ratings_GP'];
                    add_post_meta( $post_id, 'wp_ratings_GP', $ratings );
                    ##########   add rated
                    $rated = $gets_data['rated_GP'];
                    add_post_meta( $post_id, 'wp_rated_GP', $rated );
                    ##########   add contentrated
                    $contentrated = $gets_data['contentrated_GP'];
                    add_post_meta( $post_id, 'wp_contentrated_GP', $contentrated );
                    ##########   add desck
                    $desck = $gets_data['desck_GP'];
                    add_post_meta( $post_id, 'wp_desck_GP', $desck );
                    ##########   add comments
                    $comments = $gets_data['comments1'];
                    add_post_meta( $post_id, 'wp_comments1', $comments );
                    ##########   add articlebody
                    $articlebody = $gets_data['articlebody_GP'];
                    add_post_meta( $post_id, 'wp_articlebody_GP', $articlebody );
                    ##########   add modfeatures2
                    $modfeatures2 = $gets_data['mods'];
                    add_post_meta( $post_id, 'wp_mods', $modfeatures2 );
                    ##########   add poster
                    $poster1 = $gets_data['poster3'];
                    $poster2 = $gets_data['posterx1'];
                    $poster3 = $gets_data['poster3'];
                    $poster = $poster1;
                    add_post_meta( $post_id, 'wp_poster', $poster );
                    add_post_meta( $post_id, 'wp_poster3', $poster3 );
                    add_post_meta( $post_id, 'wp_posterx1', $poster2 );
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
					
                    $mods_alt_title = $gets_data['mods_alt_title'];
                    add_post_meta( $post_id, 'wp_title_wp_mods', $mods_alt_title );
					
                    $mods_alt_desc = $gets_data['mods_alt_desc'];
                    add_post_meta( $post_id, 'wp_mods_post', $mods_alt_desc );
                    /* $mods = implode(", ", $modsX );
                    add_post_meta( $post_id, 'wp_mods', implode(", ", $modsX ) );
					
                    add_post_meta( $post_id, 'wp_title2', implode(", ", $gets_data['title2'] ) );
					 */
                    ##########   add tag  $gets_data['version_GP']
                    $tags = array(''.$gets_data['title_GP'].' '.$gets_data['version_GP'].',');
                    wp_set_object_terms( $post_id, $gets_data['genres_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['title_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['developers_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $modsX, 'post_tag', true );
                    wp_set_object_terms( $post_id, $mods, 'post_tag', true );
                    wp_set_object_terms( $post_id, $tags, 'post_tag', true );
                    if($post_id)
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
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-rss"></i> Latest Uploads</a></li>
                <li><a data-toggle="tab" href="#menu4"><i class="fa fa-rss"></i> Latest Uploads Games</a></li>
                <li><a data-toggle="tab" href="#menu2"><i class="fa fa-rss"></i> Latest Uploads Apps</a></li>
                <li class="active"><a data-toggle="tab" href="#menu3"><i class="fa fa-rss"></i> Add Manual</a></li>
                <li><a href='admin.php?page=<?php echo options_setting; ?>'><i class="fa fa-cogs"></i> Setting</a></li>
					 
            </ul>
            <div style="clear:both"></div>
        </div>
    </div>
	
    <div class="containerX">
        <div class="tab-content">
            <div id="home" class="tab-pane fade">            
                <ul class="play_menu" >
				 <li> <?php global $opt_themes;  $post_statusX = $opt_themes['ex_themes_extractor_apk_status_post_']; ?> Your Status Post is <?php global $opt_themes; $wp_post_status12 = $opt_themes['ex_themes_extractor_apk_status_post_']; if($wp_post_status12 != 'draft') { ?> <blink><strong class="blink blink-one" style="color:green"><?php echo $wp_post_status12; ?></strong></blink> You ready to Make auto posting now <?php } else { ?><blink><strong class="blink blink-one" style="color:red"><?php echo $wp_post_status12; ?></strong></blink>. Please Change to <blink><strong class="blink" style="color:green">publish</strong></blink> to make Auto Posting,  you can go to Setting Page <?php } ?> </li>
                </ul>
            </div>            
            
            <div id="menu1" class="tab-pane fade">
			<div class="play_menu" style="text-transform:uppercase"><b>Latest Uploads </b></div>               
					<?php
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');                        
                    $host = ''.$_SERVER['HTTP_HOST'].'';
                    $host2 = $host;
                    $host3 = $host;
                    $sumbers = 'https://apkmod.cc/'; 
                    $target1 = 'https://apkmod.cc';
                    $target2 = 'apkmod.cc';

                    $apkdownload_games =  file_get_contents($sumbers, false, stream_context_create($ssl)); 
                    $idapkdownload_games =  file_get_contents($sumbers, false, stream_context_create($ssl)); 

					 
                    $apkdownload_games =  preg_replace('#<link rel="alternate".*?>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='dns-prefetch'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<script.*?>.*?</script>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<meta.*?>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<style type="text/css">.*?</style>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<link rel=".*?icon.*?".*?>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<svg.*?>.*?</svg>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<div id="mobile-slide-menu">.*?<div id="main" class="content">#si', '<div id="main" class="content">', $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='wp-block-library-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='wp-pagenavi-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    /* $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='APKMirror-Bootstrap-css-css'.*?>#si", PHP_EOL, $apkdownload_games); */
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='material-ripples-style-css-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='material-style-css-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='googleFonts-css-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<div id="sidebar".*?<div class="footer".*?>#si', '</div></div><div class="footer" role="contentinfo">', $apkdownload_games);
					$apkdownload_games =  str_ireplace('<div id="cover-screen"></div>', PHP_EOL, $apkdownload_games); 
                    $apkdownload_games =  preg_replace('#<div class="footer" role="contentinfo">.*?</body>#si', '</div></body>', $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<div class="appRow center">.*?</aside>#si', '</div></aside>', $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<div class="appRowVariantTag wrapText">.*?</div>#si', PHP_EOL, $apkdownload_games);
					$apkdownload_games =  str_ireplace('<div id="primary" class="col-md-8 content-area">', '<div id="primary" class="col-md  content-area">', $apkdownload_games); 
                    $apkdownload_games =  preg_replace('#<div class="infoIconPositioning">.*?<div class="downloadIconPositioning">#si', '<div class="downloadIconPositioning">', $apkdownload_games);
					$apkdownload_games =  str_ireplace('<div class="iconsBox ">', '<div class="iconsBox " style="width: 300px !important;top: 10% !important;">', $apkdownload_games); 
                    $apkdownload_games =  preg_replace('#<a class="fontBlack".*?>(.*?)</a>#si', '$1', $apkdownload_games);
                    /* $apkdownload_games =  preg_replace('#<div.*?class="infoSlide">.*?<div class="appRow">#si', '<div class="appRow">', $apkdownload_games); */
					$apkdownload_games =  str_ireplace('<!doctype.*?>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<html.*?>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<head>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('</head>', PHP_EOL, $apkdownload_games); 
                    $apkdownload_games =  preg_replace('#<title>.*?</title>#si', PHP_EOL, $apkdownload_games);
					$apkdownload_games =  str_ireplace('<body.*?>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<div id="wrap">', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('</body>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('</html>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('</div></div></div>', '</div></div>', $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<div id="primary"', '<div ', $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<div class="container-fluid set-max-width">', '<div >', $apkdownload_games); 

                    $apkdownload_games =  preg_replace('#<div class="downloadIconPositioning">.*?<a class="downloadLink iconColor" href="(.*?)">.*?</a>.*?</div>#si', '<div class="downloadIconPositioning" style="width: 300px !important;"><form name="myForm" id="myForm" method="POST"><input style="display:none" type="text" name="wp_url" value="$1"  /><input type="submit" id="Submit" name="wp_sb" class="button-primary abe2" value="'.postnow.'" /></form></div>', $apkdownload_games);   
					echo $apkdownload_games; ?>
            </div>
			
			
            <div id="menu2" class="tab-pane fade">
			<div class="play_menu" style="text-transform:uppercase"><b>Latest Uploads Apps</b></div>                 
					<?php
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');                        
                    $host = ''.$_SERVER['HTTP_HOST'].'';
                    $host2 = $host;
                    $host3 = $host;
                    $sumbers = 'https://apkmod.cc/apps-android/'; 
                    $target1 = 'https://apkmod.cc';
                    $target2 = 'apkmod.cc';

                    $apkdownload_apps =  file_get_contents($sumbers, false, stream_context_create($ssl)); 
                    $idapkdownload_apps =  file_get_contents($sumbers, false, stream_context_create($ssl)); 

					 
                    $apkdownload_apps =  preg_replace('#<link rel="alternate".*?>#si', PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace("#<link rel='dns-prefetch'.*?>#si", PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace('#<script.*?>.*?</script>#si', PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace('#<meta.*?>#si', PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace('#<style type="text/css">.*?</style>#si', PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace('#<link rel=".*?icon.*?".*?>#si', PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace('#<svg.*?>.*?</svg>#si', PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace('#<div id="mobile-slide-menu">.*?<div id="main" class="content">#si', '<div id="main" class="content">', $apkdownload_apps);
                    $apkdownload_apps =  preg_replace("#<link rel='stylesheet' id='wp-block-library-css'.*?>#si", PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace("#<link rel='stylesheet' id='wp-pagenavi-css'.*?>#si", PHP_EOL, $apkdownload_apps);
                    /* $apkdownload_apps =  preg_replace("#<link rel='stylesheet' id='APKMirror-Bootstrap-css-css'.*?>#si", PHP_EOL, $apkdownload_apps); */
                    $apkdownload_apps =  preg_replace("#<link rel='stylesheet' id='material-ripples-style-css-css'.*?>#si", PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace("#<link rel='stylesheet' id='material-style-css-css'.*?>#si", PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace("#<link rel='stylesheet' id='googleFonts-css-css'.*?>#si", PHP_EOL, $apkdownload_apps);
                    $apkdownload_apps =  preg_replace('#<div id="sidebar".*?<div class="footer".*?>#si', '</div></div><div class="footer" role="contentinfo">', $apkdownload_apps);
					$apkdownload_apps =  str_ireplace('<div id="cover-screen"></div>', PHP_EOL, $apkdownload_apps); 
                    $apkdownload_apps =  preg_replace('#<div class="footer" role="contentinfo">.*?</body>#si', '</div></body>', $apkdownload_apps);
                    $apkdownload_apps =  preg_replace('#<div class="appRow center">.*?</aside>#si', '</div></aside>', $apkdownload_apps);
                    $apkdownload_apps =  preg_replace('#<div class="appRowVariantTag wrapText">.*?</div>#si', PHP_EOL, $apkdownload_apps);
					$apkdownload_apps =  str_ireplace('<div id="primary" class="col-md-8 content-area">', '<div id="primary" class="col-md  content-area">', $apkdownload_apps); 
                    $apkdownload_apps =  preg_replace('#<div class="infoIconPositioning">.*?<div class="downloadIconPositioning">#si', '<div class="downloadIconPositioning">', $apkdownload_apps);
					$apkdownload_apps =  str_ireplace('<div class="iconsBox ">', '<div class="iconsBox " style="width: 300px !important;top: 10% !important;">', $apkdownload_apps); 
                    $apkdownload_apps =  preg_replace('#<a class="fontBlack".*?>(.*?)</a>#si', '$1', $apkdownload_apps);
                    /* $apkdownload_apps =  preg_replace('#<div.*?class="infoSlide">.*?<div class="appRow">#si', '<div class="appRow">', $apkdownload_apps); */
					$apkdownload_apps =  str_ireplace('<!doctype.*?>', PHP_EOL, $apkdownload_apps); 
					$apkdownload_apps =  str_ireplace('<html.*?>', PHP_EOL, $apkdownload_apps); 
					$apkdownload_apps =  str_ireplace('<head>', PHP_EOL, $apkdownload_apps); 
					$apkdownload_apps =  str_ireplace('</head>', PHP_EOL, $apkdownload_apps); 
                    $apkdownload_apps =  preg_replace('#<title>.*?</title>#si', PHP_EOL, $apkdownload_apps);
					$apkdownload_apps =  str_ireplace('<body.*?>', PHP_EOL, $apkdownload_apps); 
					$apkdownload_apps =  str_ireplace('<div id="wrap">', PHP_EOL, $apkdownload_apps); 
					$apkdownload_apps =  str_ireplace('</body>', PHP_EOL, $apkdownload_apps); 
					$apkdownload_apps =  str_ireplace('</html>', PHP_EOL, $apkdownload_apps); 
					$apkdownload_apps =  str_ireplace('</div></div></div>', '</div></div>', $apkdownload_apps); 
					$apkdownload_apps =  str_ireplace('<div id="primary"', '<div ', $apkdownload_apps); 
					$apkdownload_apps =  str_ireplace('<div class="container-fluid set-max-width">', '<div >', $apkdownload_apps); 


                    $apkdownload_apps =  preg_replace('#<div class="downloadIconPositioning">.*?<a class="downloadLink iconColor" href="(.*?)">.*?</a>.*?</div>#si', '<div class="downloadIconPositioning" style="width: 300px !important;"><form name="myForm" id="myForm" method="POST"><input style="display:none" type="text" name="wp_url" value="$1"  /><input type="submit" id="Submit" name="wp_sb" class="button-primary abe2" value="'.postnow.'" /></form></div>', $apkdownload_apps);   
					
					echo $apkdownload_apps; ?>
            </div>
			
            <div id="menu4" class="tab-pane fade">
			<div class="play_menu" style="text-transform:uppercase"><b>Latest Uploads Games </b></div>
               
					<?php
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');                        
                    $host = ''.$_SERVER['HTTP_HOST'].'';
                    $host2 = $host;
                    $host3 = $host;
                    $sumbers = 'https://apkmod.cc/games-android/'; 
                    $target1 = 'https://apkmod.cc';
                    $target2 = 'apkmod.cc';

                    $apkdownload_games =  file_get_contents($sumbers, false, stream_context_create($ssl)); 
                    $idapkdownload_games =  file_get_contents($sumbers, false, stream_context_create($ssl)); 
 
                    $apkdownload_games =  preg_replace('#<link rel="alternate".*?>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='dns-prefetch'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<script.*?>.*?</script>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<meta.*?>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<style type="text/css">.*?</style>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<link rel=".*?icon.*?".*?>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<svg.*?>.*?</svg>#si', PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<div id="mobile-slide-menu">.*?<div id="main" class="content">#si', '<div id="main" class="content">', $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='wp-block-library-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='wp-pagenavi-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    /* $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='APKMirror-Bootstrap-css-css'.*?>#si", PHP_EOL, $apkdownload_games); */
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='material-ripples-style-css-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='material-style-css-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace("#<link rel='stylesheet' id='googleFonts-css-css'.*?>#si", PHP_EOL, $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<div id="sidebar".*?<div class="footer".*?>#si', '</div></div><div class="footer" role="contentinfo">', $apkdownload_games);
					$apkdownload_games =  str_ireplace('<div id="cover-screen"></div>', PHP_EOL, $apkdownload_games); 
                    $apkdownload_games =  preg_replace('#<div class="footer" role="contentinfo">.*?</body>#si', '</div></body>', $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<div class="appRow center">.*?</aside>#si', '</div></aside>', $apkdownload_games);
                    $apkdownload_games =  preg_replace('#<div class="appRowVariantTag wrapText">.*?</div>#si', PHP_EOL, $apkdownload_games);
					$apkdownload_games =  str_ireplace('<div id="primary" class="col-md-8 content-area">', '<div id="primary" class="col-md  content-area">', $apkdownload_games); 
                    $apkdownload_games =  preg_replace('#<div class="infoIconPositioning">.*?<div class="downloadIconPositioning">#si', '<div class="downloadIconPositioning">', $apkdownload_games);
					$apkdownload_games =  str_ireplace('<div class="iconsBox ">', '<div class="iconsBox " style="width: 300px !important;top: 10% !important;">', $apkdownload_games); 
                    $apkdownload_games =  preg_replace('#<a class="fontBlack".*?>(.*?)</a>#si', '$1', $apkdownload_games);
                    /* $apkdownload_games =  preg_replace('#<div.*?class="infoSlide">.*?<div class="appRow">#si', '<div class="appRow">', $apkdownload_games); */
					$apkdownload_games =  str_ireplace('<!doctype.*?>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<html.*?>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<head>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('</head>', PHP_EOL, $apkdownload_games); 
                    $apkdownload_games =  preg_replace('#<title>.*?</title>#si', PHP_EOL, $apkdownload_games);
					$apkdownload_games =  str_ireplace('<body.*?>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<div id="wrap">', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('</body>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('</html>', PHP_EOL, $apkdownload_games); 
					$apkdownload_games =  str_ireplace('</div></div></div>', '</div></div>', $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<div id="primary"', '<div ', $apkdownload_games); 
					$apkdownload_games =  str_ireplace('<div class="container-fluid set-max-width">', '<div >', $apkdownload_games); 


                    $apkdownload_games =  preg_replace('#<div class="downloadIconPositioning">.*?<a class="downloadLink iconColor" href="(.*?)">.*?</a>.*?</div>#si', '<div class="downloadIconPositioning" style="width: 300px !important;"><form name="myForm" id="myForm" method="POST"><input style="display:none" type="text" name="wp_url" value="$1"  /><input type="submit" id="Submit" name="wp_sb" class="button-primary abe2" value="'.postnow.'" /></form></div>', $apkdownload_games);   
					
                    echo $apkdownload_games; ?>
            </div>
			
			
            <div id="menu3" class="tab-pane fade in active">
			<div class="play_menu" style="text-transform:uppercase"><b>Add manual</b></div>

			<div class="play_menu" style="text-transform:uppercase">
			<ol style="paddiing-right: 20px !important;margin: 20px;">
			<li>Open website <a style="color:#1e73be" href="https://<?php echo $sources; ?>" target="_blank"><?php echo $sources; ?></a></li>
			<li>Copy link post and paste to form</li>
			<li>use the url into this format:  <strong style="color:#1e73be;text-transform:lowercase!important"><?php echo $demos; ?></strong> </li>
			</ol>				
			</div>
			
			<div class="play_menu" ><b>Paste your link post here</b></div>

			<div class="play_menu" >				 
			<form name="myForm" id="myForm" method="POST">
			<input class="apkextractor" type="text" name="wp_url" placeholder="example : <?php echo $demos; ?>"  >
			<input type="submit" id="Submit" name="wp_sb" class="button-primary" value="<?php echo ''.postnow2.'' ?>" />
			</form>
			</div> 
            </div>
			
        </div>
    </div>
    <div style="clear:both"></div>


<?php get_template_part(footerx); ?>
<?php }