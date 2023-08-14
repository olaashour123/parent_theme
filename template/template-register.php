<?php
/* 
Template Name: Template - Register
*/ 
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" <?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?> dir="rtl" lang="<?php echo $opt_themes['Languange_rtl']; ?>"<?php } else{ ?><?php language_attributes(); ?><?php } ?>  id="h" class="load">
<head>
<meta charset="utf-8">
<title><?php global $opt_themes; if($opt_themes['exthemes_registration_']) { ?><?php echo $opt_themes['exthemes_registration_']; ?><?php } ?></title>
<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
<link id="core-rtl-style-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>" href="<?php echo EX_THEMES_URI; ?>/assets/css.rtl/core.css" type="text/css" rel="stylesheet">
<link id="styles-rtl-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>" href="<?php echo EX_THEMES_URI; ?>/assets/css.rtl/styles.css" type="text/css" rel="stylesheet">
<link id="short-rtl-style-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>" href="<?php echo EX_THEMES_URI; ?>/assets/css.rtl/short.css" type="text/css" rel="stylesheet">
<link id="fullstory-rtl-style-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>" href="<?php echo EX_THEMES_URI; ?>/assets/css.rtl/fullstory.css" type="text/css" rel="stylesheet">
<link id="comments-rtl-style-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>" href="<?php echo EX_THEMES_URI; ?>/assets/css.rtl/comments.css" type="text/css" rel="stylesheet">
<link id="other-rtl-style-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>" href="<?php echo EX_THEMES_URI; ?>/assets/css.rtl/other.css" type="text/css" rel="stylesheet">
<?php if ( is_user_logged_in() ) { ?>
<link id="user-style-<?php echo EX_THEMES_NAMES_; ?>-v.<?php echo EXTHEMES_VERSION; ?>" href="<?php echo EX_THEMES_URI; ?>/assets/css/user.styles.css" type="text/css" rel="stylesheet">
<?php }?>
<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/fonts/manrope-v3-cyrillic-700.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/fonts/manrope-v3-cyrillic-regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/css/cores.styles.css" as="style">
<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/css/styles.css" as="style">
<?php } ?> 
<meta name="viewport" content="initial-scale=1.0, maximum-scale=5.0, width=device-width"> 
<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/fonts/manrope-v3-cyrillic-700.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/fonts/manrope-v3-cyrillic-regular.woff2" as="font" type="font/woff2" crossorigin>
<?php get_template_part( '/assets/css/root.styles' ); ?>
<?php get_template_part( '/assets/css/custom.styles' ); ?>
<link rel="preload" href="<?php echo EX_THEMES_URI; ?>/assets/css/core.styles.css" as="style">
<link href="<?php echo EX_THEMES_URI; ?>/assets/css/cores.styles.css" type="text/css" rel="stylesheet">
<link href="<?php echo EX_THEMES_URI; ?>/assets/css/form.styles.css" type="text/css" rel="stylesheet">
<?php 
wp_head();
?>
</head>
<body>
<div class="toolbar">
<button class="sel-dark-toggle" id="toggle-darkmod"><svg class="i__moon" width="24" height="24"><use xlink:href="#i__moon"></use></svg><svg class="i__sun" width="24" height="24" style="display:none;"><use xlink:href="#i__sun"></use></svg></button>
</div>
<script>
  const
  	g=i=>document.getElementById(i),
    classes=g('h').classList,
    cl="darktheme";
  if(localStorage.getItem("toggled-ttl")>Date.now())
    classes.toggle(cl,localStorage.getItem("toggled"));
  g("toggle-darkmod").addEventListener("click",function(e){
    e.preventDefault();
    if(classes.contains(cl)) {
      localStorage.removeItem("toggled");
      localStorage.removeItem("toggled-ttl");
      classes.remove(cl);
    }
    else {
      localStorage.setItem("toggled",1);
      localStorage.setItem("toggled-ttl",Date.now() + 60*86400000);
      classes.add(cl);
    }
  });
</script>
<?php
	$error= '';
	$success = ''; 
	global $wpdb, $PasswordHash, $current_user, $user_ID;
	if(isset($_POST['task']) && $_POST['task'] == 'register' ) {		
		$password1 = $wpdb->escape(trim($_POST['password1']));
		$password2 = $wpdb->escape(trim($_POST['password2']));
		$first_name = $wpdb->escape(trim($_POST['first_name']));
		$last_name = $wpdb->escape(trim($_POST['last_name']));
		$email = $wpdb->escape(trim($_POST['email']));
		$username = $wpdb->escape(trim($_POST['username']));
		if( $email == "" || $password1 == "" || $password2 == "" || $username == "" || $first_name == "" || $last_name == "") {
			$error= 'Please don\'t leave the required fields.';
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error= 'Invalid email address.';
		} else if(email_exists($email) ) {
			$error= 'Email already exist.';
		} else if($password1 <> $password2 ){
			$error= 'Password do not match.';		
		} else { 
			$user_id = wp_insert_user( array (
			'first_name' => apply_filters('pre_user_first_name', $first_name), 
			'last_name' => apply_filters('pre_user_last_name', $last_name), 
			'user_pass' => apply_filters('pre_user_user_pass', $password1), 
			'user_login' => apply_filters('pre_user_user_login', $username), 
			'user_email' => apply_filters('pre_user_user_email', $email), 
			'role' => 'subscriber' 
			) );
			if( is_wp_error($user_id) ) {
				$error= 'Error on user creation.';
			} else {
				do_action('user_register', $user_id);				
				$success = 'You\'re successfully register.. You can login now';
			}
		}
	}
	?>
<section class="page-form">
<header class="page-form-left">
<div class="page-form-head">
<a class="logotype" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_option("blogname") ?>"><?php ex_themes_logo_headers_(); ?></a>
<h1 class="title"><?php echo get_option("blogname") ?></h1>
</div>
<i class="page-form-bg"></i>
</header>
<div class="page-form-right">
<div class="page-form-right-in">
<div class="pag-form_head">
<a class="back_to_main" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><svg width="24" height="24"><path fill="currentColor" d="M5 13h11.17l-4.88 4.88c-.39.39-.39 1.03 0 1.42.39.39 1.02.39 1.41 0l6.59-6.59c.39-.39.39-1.02 0-1.41l-6.58-6.6c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41L16.17 11H5c-.55 0-1 .45-1 1s.45 1 1 1z"></path></svg><?php } else { ?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24" width="24"><path fill="currentColor" d="M20 11H6.83l2.88-2.88c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0L3.71 11.3c-.39.39-.39 1.02 0 1.41L8.3 17.3c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L6.83 13H20c.55 0 1-.45 1-1s-.45-1-1-1z" /></svg><?php } ?>Back to the main page</a>
</div>
<main class="page-form-cont">
					<?php 
                    if ($success) {   ?>
					<div class="wrp-form-min">
					<div class="alert wrp-min">
					<div class="alert_in">
					<div class="alert-title">
					<i class="i__info"><svg width="24" height="24"><use xlink:href="#i__info"></use></svg></i>
					<?php global $opt_themes; if($opt_themes['exthemes_registration_1']) { ?><?php echo $opt_themes['exthemes_registration_1']; ?><?php } ?>
					</div>
					<div class="alert-cont">
					<?php echo $success ?>
					</div>
					</div>
					</div>
					<div id="dle-content"></div>
					<div>
					</div>
					</div>
					<?php }  else { ?>
					 <div class="wrp-form-min">
					<div id='dle-content'> 
					<form method="post" >
					<h2 class="heading"><?php global $opt_themes; if($opt_themes['exthemes_registration_']) { ?><?php echo $opt_themes['exthemes_registration_']; ?><?php } ?></h2>
					<div class="form-group">
					<label class="c-muted" ><?php global $opt_themes; if($opt_themes['exthemes_registration_2']) { ?><?php echo $opt_themes['exthemes_registration_2']; ?><?php } ?></label>
					<input class="form-control" type="text" value="" name="first_name" id="first_name" >
					</div>
					<div class="form-group">
					<label class="c-muted" ><?php global $opt_themes; if($opt_themes['exthemes_registration_3']) { ?><?php echo $opt_themes['exthemes_registration_3']; ?><?php } ?></label>
					<input class="form-control" type="text" value="" name="last_name" id="last_name" >
					</div>
					<div class="form-group">
					<label class="c-muted" ><?php global $opt_themes; if($opt_themes['exthemes_registration_4']) { ?><?php echo $opt_themes['exthemes_registration_4']; ?><?php } ?></label>
					<input type="text" class="form-control" type="text" name="username" id="username" required>
					</div>
					<div class="form-group">
					<label class="c-muted" ><?php global $opt_themes; if($opt_themes['exthemes_registration_5']) { ?><?php echo $opt_themes['exthemes_registration_5']; ?><?php } ?></label>
					<input class="form-control" type="password" name="password1" id="password1" required>
					</div>
					<div class="form-group">
					<label class="c-muted"  ><?php global $opt_themes; if($opt_themes['exthemes_registration_6']) { ?><?php echo $opt_themes['exthemes_registration_6']; ?><?php } ?></label>
					<input class="form-control" type="password" name="password2" id="password2" required>
					</div>
					<div class="form-group">
					<label class="c-muted" ><?php global $opt_themes; if($opt_themes['exthemes_registration_7']) { ?><?php echo $opt_themes['exthemes_registration_7']; ?><?php } ?></label>
					<input class="form-control" type="email" name="email" id="email" required>
					</div>
					<div class="form-submit">
					<p><?php if($success != "") { echo $success; } ?> <?php if($error!= "") { echo $error; } ?></p>
					<button class="btn s-green btn-block" type="submit" ><?php global $opt_themes; if($opt_themes['exthemes_registration_8']) { ?><?php echo $opt_themes['exthemes_registration_8']; ?><?php } ?></button>
					</div>
					<input type="hidden" name="task" value="register" />
					</form>
					</div>
					 </div>
					<div>
					<?php } ?>
</main>
<div class="page-form_foot c-muted">
<div class="copyright"><?php ex_themes_copyright_(); ?></div>
</div>
</div>
</section>
<svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="i__moon" viewBox="0 0 24 24">
<path fill="currentColor" d="M12,2.73a.5.5,0,0,0-.26-.66.49.49,0,0,0-.24,0A10,10,0,1,0,20.2,17.71a.51.51,0,0,0-.11-.7.43.43,0,0,0-.22-.09A10,10,0,0,1,12,2.73Z" />
</symbol>
<symbol id="i__sun" viewBox="0 0 24 24">
<path fill="currentColor" d="M6.06,4.64l-.39-.39a1,1,0,0,0-1.4,0h0a1,1,0,0,0,0,1.4l.38.39a1,1,0,0,0,1.41,0h0A1,1,0,0,0,6.06,4.64ZM3,11H2a1,1,0,0,0-1,1H1a1,1,0,0,0,1,1H3a1,1,0,0,0,1-1H4A1,1,0,0,0,3,11Zm9-9.95h0a1,1,0,0,0-1,1V3a1,1,0,0,0,1,1h0a1,1,0,0,0,1-1V2A1,1,0,0,0,12,1.05Zm7.74,3.21a1,1,0,0,0-1.41,0L18,4.64A1,1,0,0,0,18,6h0a1,1,0,0,0,1.4,0l.39-.39A1,1,0,0,0,19.76,4.26ZM18,19.36l.39.39a1,1,0,0,0,1.4,0,1,1,0,0,0,0-1.41L19.36,18A1,1,0,0,0,18,19.36ZM20,12h0a1,1,0,0,0,1,1h1a1,1,0,0,0,1-1h0a1,1,0,0,0-1-1H21A1,1,0,0,0,20,12ZM12,6a6,6,0,1,0,6,6A6,6,0,0,0,12,6Zm0,17h0a1,1,0,0,0,1-1V21a1,1,0,0,0-1-1h0a1,1,0,0,0-1,1v1A1,1,0,0,0,12,23ZM4.26,19.74a1,1,0,0,0,1.4,0l.39-.39a1,1,0,0,0,0-1.4H6a1,1,0,0,0-1.41,0l-.39.39A1,1,0,0,0,4.26,19.74Z" />
</symbol>
 <symbol id="i__info" viewBox="0 0 24 24">
<path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 15c-.55 0-1-.45-1-1v-4c0-.55.45-1 1-1s1 .45 1 1v4c0 .55-.45 1-1 1zm1-8h-2V7h2v2z"></path>
</symbol>
</defs>
</svg>

<?php 
wp_footer(); 
?>

</body>
</html>