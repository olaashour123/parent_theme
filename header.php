<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 
ini_set('display_errors', ERRORS);
global $opt_themes; 
$rtl_on						= $opt_themes['ex_themes_rtl_activate_'];
$rtl_lang					= $opt_themes['Languange_rtl'];
$header_menu				= $opt_themes['ex_themes_menu_header_'];
$header_submenu				= $opt_themes['ex_themes_submenu_header_'];
$text_search				= $opt_themes['exthemes_Search_2'];
$text_search_2				= $opt_themes['exthemes_Search'];
$text_find					= $opt_themes['exthemes_Find'];
$text_new_post				= $opt_themes['exthemes_Add_new_post'];
$text_logout				= $opt_themes['exthemes_Logout'];
$text_auth					= $opt_themes['exthemes_Authorization'];
$login_on					= $opt_themes['ex_themes_login_active_'];

$author_id						= $post->post_author;
$author_link					= get_author_posts_url( $author_id );
$author_avatar					= get_avatar_url( $author_id );
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" <?php if($rtl_on) { ?> class="rtl load" dir="rtl" lang="<?php echo $rtl_lang; ?>"<?php } else{ ?><?php language_attributes(); ?><?php } ?> id="h" class="load" style="margin-top: 0px !important;">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
<meta content='yes' name='apple-mobile-web-app-capable' />
<?php 
wp_head();
ex_themes_head_on_sections_();
?>
</head>
<body>
<header class="header">
    <div class="wrp-min">
        <div class="header-panel">
            <a class="logotype" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_option("blogname") ?>"><?php ex_themes_logo_headers_(); ?></a>
            <div id="mobilemenu" class="head-tools" style="display: none;">
                <div class="head-tools-panel">
                    <nav class="hmenu" itemscope="" itemtype="http://schema.org/SiteNavigationElement">
                        <?php echo $header_menu; ?>
                        <div class="hmenu-more dropdown">
                            <button class="hmenu-more-btn" aria-label="Subs Menu" ><span class="hmenu-more-dots"><i></i><i></i><i></i></span></button>
                            <div style="display: none;" class="dropdown-menu">
                                <nav class="hmenu-sub">
                                    <?php echo $header_submenu; ?>
                                </nav>
                            </div>
                        </div>
                    </nav>
                    <form class="q-search" style="display: none;" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">
                        <div class="q-search-box">
                            <label class="q-search-label" for="story"><?php if($text_search) { ?><?php echo $text_search; ?><?php } ?></label>
                            <input class="q-search-text" id="story" name="s" placeholder="<?php if($text_search_2) { ?><?php echo $text_search_2; ?><?php } ?>" type="search" autocomplete="off">
                            <button class="q-search-btn" type="submit" title="<?php if($text_find) { ?><?php echo $text_find; ?><?php } ?>">
                                <span class="sr-only"><?php if($text_find) { ?><?php echo $text_find; ?><?php } ?></span>
                                <svg width="24" height="24"><use xlink:href="#i__search"></use></svg>
                            </button>
                        </div>
                    </form>
                    <button class="menu-toggle menu-close bbcodes" aria-label="Menu Close" style="display: none;">
                        <svg width="24" height="24"><use xlink:href="#i__close"></use></svg>
                    </button>
                </div>
                <div class="menu-toggle mm-overlay" style="display: none;"></div>
            </div>
            <div class="head-right">
                <?php if($login_on){ if ( is_user_logged_in() ) { ?>
                    <div class="dropdown userpanel">
                        <button class="dropdown-btn" data-toggle="dropdown" id="login_drop" aria-haspopup="true" aria-expanded="false"><i class="avatar fit-cover"><?php global $current_user; get_currentuserinfo(); ?><?php echo get_avatar( $current_user->ID, 50 ); ?></i></button>
                        <div class="dropdown-menu dropdown-form dropdown-menu-right" aria-labelledby="login_drop" style="display:none;">
                            <div class="login-pane__info">
                                <a class="avatar fit-cover"><?php global $current_user; get_currentuserinfo(); ?><?php echo get_avatar( $current_user->ID, 50 ); ?></a>
                                <div class="title"><a href="<?php echo $author_link; ?>"  > <?php  global $current_user; get_currentuserinfo(); echo $current_user->display_name ; ?></div>
                            </div>
                            <ul class="login-pane__menu">
								<li><a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>"><?php if($text_new_post) { ?><?php echo $text_new_post; ?><?php } ?></li> 
                                <li><a href="<?php echo wp_logout_url(); ?>"><?php if($text_logout) { ?><?php echo $text_logout; ?><?php } ?></a></li>
                            </ul>
                        </div>
                    </div>
                <?php } else { ?>
                    <button data-toggle="modal" data-target="#login" class="log-in" aria-label="login">
                        <span class="sr-only"><?php if($text_auth) { ?><?php echo $text_auth; ?><?php } ?></span>
                        <svg width="24" height="24"><use xlink:href="#i__user"></use></svg>
                    </button>
                <?php }}?>
                <button style="display: none;" class="q-search-call" aria-label="Find">
                    <span class="sr-only"><?php if($text_find) { ?><?php echo $text_find; ?><?php } ?></span>
                    <svg class="qs-1" width="24" height="24"><use xlink:href="#i__search"></use></svg>
                    <svg class="qs-2" width="24" height="24"><use xlink:href="#i__close"></use></svg>
                </button>
            </div>
            <button class="menu-toggle menu-butter" aria-label="Mobile Menu" style="display: none;">
                <span class="butterbrod"><i></i><i></i><i></i></span></button>
        </div>
    </div>
</header>
<div class="toolbar">
	<div class="sel-lang">
	</div>
    <button class="sel-dark-toggle" id="toggle-darkmod" aria-label="Dark Modes" ><svg class="i__moon" width="24" height="24"><use xlink:href="#i__moon"></use></svg><svg class="i__sun" width="24" height="24" style="display:none;"><use xlink:href="#i__sun"></use></svg></button>
</div>
<script>const g=e=>document.getElementById(e),classes=g("h").classList,cl="darktheme";localStorage.getItem("toggled-ttl")>Date.now()&&classes.toggle(cl,localStorage.getItem("toggled")),g("toggle-darkmod").addEventListener("click",function(e){e.preventDefault(),classes.contains(cl)?(localStorage.removeItem("toggled"),localStorage.removeItem("toggled-ttl"),classes.remove(cl)):(localStorage.setItem("toggled",1),localStorage.setItem("toggled-ttl",Date.now()+5184e6),classes.add(cl))});</script>

