<?php
ini_set('display_errors',ERRORS);
function wp_docs() {  get_template_part(addscriptx); ?>
    <div class="wrap">
        <div class="play_fixedx play_menu" id="play_fixed" style="margin-bottom: 10px;">
            <div class="play_search"></div>
            <ul class="play_menus" style="text-transform:capitalize!important">
                <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-home"></i> Home</a></li>
                 <!--<li><a href='admin.php?page=wp_apk_googleplay'><i class="fa fa-rss"></i> play.google.com</a></li>
                <li><a href='admin.php?page=wp_apk_happymod'><i class="fa fa-rss"></i> happymod.com</a></li>
               <li><a href='admin.php?page=wp_apk_apkhome'><i class="fa fa-rss"></i> apkhome.net</a></li>
                <li><a href='admin.php?page=wp_apk_apkdownload'><i class="fa fa-rss"></i> apkdownload.cc</a></li>
                <li><a href='admin.php?page=wp_apk_rexdl'><i class="fa fa-rss"></i> rexdl.com</a></li>-->

                <li><a href='admin.php?page=<?php echo options_setting; ?>'><i class="fa fa-cogs"></i> Setting</a></li>
            </ul>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="play_menu" style="text-transform:uppercase">
        <h4 style="text-transform:uppercase!important;color:#00a0d2">How to Post new apk</h4>
    </div>
    <p class="play_menu" ><iframe width="100%" height="400" src="https://www.youtube.com/embed/39ng7njysXU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></p>
<?php get_template_part(footerx); ?>

<?php } 