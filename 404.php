<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
$search_term    = substr($_SERVER['REQUEST_URI'], 1);
$search_term    = urldecode(stripslashes($search_term));
$search_term    = rtrim($search_term, "/");
$find           = array("'.html'", "'.+/'", "'[-/_]'");
$replace        = " ";
$search_term    = trim(preg_replace($find, $replace, $search_term));
$search_term    = str_replace("%20", $replace, $search_term);
$search_term    = preg_replace('!\s+!', ' ', $search_term);
?>
    <div class="wrp-min speedbar" style='display:none'>
        <div class="speedbar-panel">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div>
    <div class="page-head-cat">
        <div class="wrp-min">
            <div class="head-cat-title">
                <h1 class="title">Search results for: <?php echo $search_term; ?></h1>
            </div>
        </div>
        <i class="bg-clouds"></i>
    </div>
    <div class="page-cat-bg">
        <div class="wrp page-cat-cont">
            <div class="alert wrp-min">
                <div class="alert_in">
                    <div class="alert-title">
                        <i class="i__info"><svg width="24" height="24"><use xlink:href="#i__info"></use></svg></i>
                        Oops! That page can&rsquo;t be found.
                    </div>
                    <div class="alert-cont">
                        It seems that page for <b><i><?php echo $search_term; ?></i></b> you are looking for no longer exists. Try to search again or explore more Android Games and Apps below!
                    </div>
                </div>
            </div>
            <div class="entry-listpage list-c6"> <?php ex_themes_adv_homes_(); ?><div id="dle-content"></div></div>
        </div>
    </div>
<?php get_footer(); 