<?php 
global $opt_themes;
$fav_on						= $opt_themes['aktif_favicon']; 
$fav						= $opt_themes['favicon']['url']; 
$scroll_up					= $opt_themes['exthemes_Scroll_up']; 
if (is_home() || is_front_page()) { 
if (function_exists('is_dynamic_sidebar') && is_active_sidebar('home-footers')){ ?>
	<div class="dark-foot dark-section"><?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-footers')): endif; ?>    
	<footer class="footer">
        <div class="wrp-min">
            <div class="footer-panel">
                <a class="logotype scrollup" style="display:none;" href="#" title="<?php echo get_option("blogname") ?>">
                    <span class="sr-only"><?php echo get_option("blogname") ?></span>
                    <i class="logo-icon"><img src="<?php global $opt_themes; if($fav_on) { ?><?php echo $fav; ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/assets/img/logo_footer.png<?php } ?>"  width="36" height="36" alt="<?php echo get_option("blogname") ?>"></i>
				</a>
                <a class="upper scrollup" href="#" title="<?php echo get_option("blogname") ?>"><span class="sr-only"><?php if($scroll_up) { ?><?php echo $scroll_up; ?><?php } ?></span><svg width="24" height="24"><use xlink:href="#i__scrollup"></use></svg></a>
                <div class="footer-cont">
                    <div class="copyright"><?php ex_themes_copyright_(); ?></div>
                    <?php ex_themes_footers_social_media_(); ?>
                </div>
            </div>
        </div>
    </footer>
	<div class="background" style="display:none;">
        <i class="bg-circle-green"></i>
        <i class="bg-clouds"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2550 700" width="2550" height="700"><path fill="#142636" d="M554,600h-4a50,50,0,0,0,0,100h4a50,50,0,0,0,0-100ZM802,0H50a50,50,0,0,0,0,100h78.08a50,50,0,0,1,.11,100H98a50,50,0,0,0,0,100H238a50,50,0,1,1,0,100H194a50,50,0,0,0,0,100h56a50,50,0,0,1,.3,100H238a50,50,0,0,0,0,100H430a50,50,0,0,0,0-100H413.55a50,50,0,0,1,.05-100H630a50,50,0,0,0,0-100H521.55a50,50,0,0,1,0-100H526a50,50,0,0,0,0-100H445.55a50,50,0,0,1,.08-100H802A50,50,0,0,0,802,0Z" /><path fill="#142636" d="M2073,500a50,50,0,0,1,0-100h16.43a50,50,0,0,0,0-100H1901a50,50,0,0,1,0-100h216.42a49.92,49.92,0,0,0,34.94-14.64,50,50,0,0,0-34.9-85.36H2097a50,50,0,0,1-50-50h0a50,50,0,0,1,50-50h252a50,50,0,0,1,0,100h-28a50,50,0,1,0,0,100h24a50,50,0,0,1,0,100h-24a50,50,0,1,0,0,100h179a50,50,0,0,1,0,100Z" /></svg></i>
    </div>
</div>
<?php 
ex_themes_footer_on_sections_(); 
} else { 
?>
<footer class="footer">
        <div class="wrp-min">
            <div class="footer-panel">
                <a class="logotype scrollup" style="display:none;" href="#" title="<?php echo get_option("blogname") ?>">
                    <span class="sr-only"><?php echo get_option("blogname") ?></span>
                    <i class="logo-icon"><img alt="<?php echo get_option("blogname") ?>" src="<?php if($fav_on) { ?><?php echo $fav; ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/assets/img/logo_footer.png<?php } ?>" width="36" height="36"></i>
				</a>
                <a class="upper scrollup" href="#" title="<?php echo get_option("blogname") ?>"><span class="sr-only"><?php if($scroll_up) { ?><?php echo $scroll_up; ?><?php } ?></span><svg width="24" height="24"><use xlink:href="#i__scrollup"></use></svg></a>
                <div class="footer-cont">
                    <div class="copyright"><?php ex_themes_copyright_(); ?></div>
                    <?php ex_themes_footers_social_media_(); ?>
                </div>
            </div>
        </div>
    </footer>
<?php 
ex_themes_footer_on_sections_(); 
}  } elseif (is_single() || is_page() || is_search() || is_archive() || is_404() || is_tag()) { 
?> 
<footer class="footer">
        <div class="wrp-min">
            <div class="footer-panel">
                <a class="logotype scrollup" style="display:none;" href="#" title="<?php echo get_option("blogname") ?>">
                    <span class="sr-only"><?php echo get_option("blogname") ?></span>
                    <i class="logo-icon"><img alt="<?php echo get_option("blogname") ?>" src="<?php if($fav_on) { ?><?php echo $fav; ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/assets/img/logo_footer.png<?php } ?>"  width="36" height="36"></i>
				</a>
                <a class="upper scrollup" href="#" title="<?php echo get_option("blogname") ?>"><span class="sr-only"><?php if($scroll_up) { ?><?php echo $scroll_up; ?><?php } ?></span><svg width="24" height="24"><use xlink:href="#i__scrollup"></use></svg></a>
                <div class="footer-cont">
                    <div class="copyright"><?php ex_themes_copyright_(); ?></div>
                    <?php ex_themes_footers_social_media_(); ?>
                </div>
            </div>
        </div>
    </footer>
<?php 
ex_themes_footer_on_sections_(); 
} 
wp_footer(); 
maintenances_notices();
?>


</body>
</html>