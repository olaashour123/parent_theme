<?php
function wpwm_settings() { ?>
    <?php get_template_part('libs/inc/ReduxCore/admin/libs/addscript'); ?>
    <?php
    if(isset($_POST['sb_wpwm'])) {
        $title_sources = ex_themes_clean($gets_data['title']);
        $title_gp = ex_themes_clean($gets_data['title_GP']);
        update_option('wpwm_movies_per_page', abs(intval($_POST['wpwm_movies_per_page'])));
        update_option('wpwm_movies_per_row', abs(intval($_POST['wpwm_movies_per_row'])));
        update_option('wpwm_homepage_items', abs(intval($_POST['wpwm_homepage_items'])));
        update_option('wp_debug_on', $_POST['wp_debug_on']);
        update_option('wp_post_status', $_POST['wp_post_status']);
        update_option('wp_titles_post', $_POST['wp_titles_post']);
        update_option('wp_permalink_post', $_POST['wp_permalink_post']);
        ?>
        <div class="play_menu" style="text-transform:uppercase!important;">
            <h2>Setting Updated</h2>
        </div>
    <?php }
    $wpwm_movies_per_page = get_option('wpwm_movies_per_page', 10);
    $wpwm_movies_per_row = get_option('wpwm_movies_per_row', 5);
    $wpwm_homepage_items = get_option('wpwm_homepage_items', 5);
    $wpwm_post_status = get_option('wp_post_status', 'draft');
    $wp_debug_on = get_option('wp_debug_on', 'off');
    $wp_debug_on1 = get_option('wp_debug_on');
    //$wp_titles_post = get_option('wp_titles_post', $title_sources);
    $wp_permalink_post = get_option('wp_permalink_post', 'permalink_title_sources');

    ?>
    <div class="wrap" style="text-transform:capitalize!important">
        <div class="play_fixedx play_menu" id="play_fixed" style="margin-bottom: 10px;">
            <div class="play_search"></div>
            <ul class="play_menus" style="text-transform:capitalize!important">
                <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-home"></i> Home</a></li>
                <li><a href='admin.php?page=wp_apk_googleplay'><i class="fa fa-rss"></i> play.google.com</a></li>
                <li><a href='admin.php?page=wp_apk_happymod'><i class="fa fa-rss"></i> happymod.com</a></li>
                <li><a href='admin.php?page=wp_apk_apkhome'><i class="fa fa-rss"></i> apkhome.net</a></li>
                <li><a href='admin.php?page=wp_apk_apkdownload'><i class="fa fa-rss"></i> apkdownload.cc</a></li>
                <li><a href='admin.php?page=wp_apk_mod_menu'><i class="fa fa-rss"></i> How to post</a></li>
            </ul>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="containerX">
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="play_menu" style="text-transform:uppercase!important;">
                    <b style="text-transform:uppercase!important;color:#00a0d2"><?php echo ''.ex_themes_name_extractor_.'' ?> Setting Page</b>
                    Your Status Post is <?php $wp_post_status12 = get_option('wp_post_status'); if($wp_post_status12 != 'draft') { ?><blink><strong class="blink blink-one" style="color:green"><?php echo $wp_post_status12; ?></strong></blink><?php } ?><?php $wp_post_status13 = get_option('wp_post_status'); if($wp_post_status13 != 'publish') { ?><blink><strong class="blink blink-one" style="color:red"><?php echo $wp_post_status13; ?></strong></blink>
                    <?php } ?>. <?php $wp_post_status1 = get_option('wp_post_status'); if($wp_post_status1 != 'draft') { ?>You ready to Make auto posting now<?php } else { ?>Please Change to <blink><strong class="blink" style="color:green">publish</strong></blink> to make Auto Posting<?php } ?>
                </div>
                <div class="play_menu" style="">
                    <form method="POST">
                        <table width="100%" style="text-transform:uppercase;">
                            <tbody>
                            <tr>
                                <td><b>Post Status</b></td>
                                <td><select name="wp_post_status">
                                        <option value="draft">Draft</option>
                                        <option value="publish">Publish</option>
                                    </select></td>
                                <td>(default is <b style="color:red">draft</b>) Select : <b style="color:green">publish</b>&nbsp;or&nbsp;<b style="color:red">draft</b></td>
                            </tr>
                            <tr>
                                <td><b>Debug Show</b></td>
                                <td><select name="wp_debug_on">
                                        <option value="off">off</option>
                                        <option value="on">on</option>
                                    </select>
                                </td>
                                <td>Select : <b style="color:green">on</b>&nbsp;or&nbsp;<b style="color:red">off</b></td>
                            </tr>

                            </tbody>
                        </table>
                        <input type="submit" name="sb_wpwm" value="Save" class="button-primary" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php global $opt_themes; if($opt_themes['ex_themes_extractor_apk_title_']) {

        ?>

        aaa
        <?php echo $opt_themes['ex_themes_extractor_apk_title_']; ?>



    <?php } ?>
    <?php get_template_part('libs/inc/ReduxCore/admin/libs/footer'); ?>
<?php } 