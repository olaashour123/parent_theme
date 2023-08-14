<?php
/**
 * Template Name: Template - Profile Page 
 */  
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
/* Get user info. */
global $current_user, $wp_roles;
get_currentuserinfo();
/* Load the registration file. */
require_once( ABSPATH . WPINC . '/registration.php' );
$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
    }
    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
       wp_update_user( array ('ID' => $current_user->ID, 'user_url' => esc_attr( $_POST['url'] )));
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }
    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( !empty( $_POST['display_name'] ) )
        wp_update_user(array('ID' => $current_user->ID, 'display_name' => esc_attr( $_POST['display_name'] )));
      update_user_meta($current_user->ID, 'display_name' , esc_attr( $_POST['display_name'] ));
    if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink().'?updated=true' ); exit;
    }       
}
if ( !defined('ABSPATH')) exit;
get_header(); 
/*
Display user registration date
https://wordpress.stackexchange.com/a/386814
*/
global $wpdb, $post, $wp_query, $opt_themes, $the_query;
$post_author_id		= get_post_field( 'post_author', $post->ID );
$registered_date	= get_the_author_meta( 'user_registered', $post_author_id );
$registered			= date( 'j F Y, H:i', strtotime($registered_date));
$passthis_id		= $current_user->ID;
?>
<?php if ( !is_user_logged_in() ) { ?>
<div class="wrp-min speedbar" >
        <div class="speedbar-panel">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div>
    <div class="page-head-cat">
        <div class="wrp-min">
            <div class="head-cat-title">
                <h1 class="title" style="display: none;"><?php the_title(); ?></h1>
            </div>
        </div>
        <i class="bg-clouds"></i>
    </div>
<?php } ?>
	
<div class="page-sys page-user">
	<section class="section">	
	<?php if ( is_user_logged_in() ) { ?>
	<form method="post" name="userinfo" id="userinfo" enctype="multipart/form-data" action="">
		
		<div class="wrp-min block-list">
		<div class="block">
		<div class="userpage_head <?php if(is_user_online($passthis_id)){ echo 'online'; } else { echo 'offline'; } ?>">
		<div class="userpage-main-info">
		<div class="userpage-status"><?php echo get_user_role(); ?></div>		
		<div class="userpage-main-circle">
		
		<i class="avatar fit-cover">
		<img src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt="<?php echo $current_user->user_login; ?>"></i>
		<button class="user_edit btn c-icon s-green" type="button" data-toggle="modal" data-target="#userset">
		<svg width="24" height="24"><use xlink:href="#i__edit"></use></svg></button>
		<div class="user_status"><span class="c-muted uppercase small"><?php if(is_user_online($passthis_id)){ echo 'Online'; } else { echo 'Offline'; } ?></span></div>
		<svg version="1.1" viewBox="0 0 640 640" width="640" height="640">
		<style type="text/css">.st0{ animation: circle_rotate 12s infinite linear; transform-origin: 50% 50%; fill:none;stroke:#4CCB70;stroke-width:1;stroke-linecap:round;stroke-miterlimit:10;stroke-dasharray:358.478,200.7477; }.st1{ animation: circle_rotate 18s infinite linear; transform-origin: 50% 50%; fill:none;stroke:#4CCB70;stroke-width:1;stroke-linecap:round;stroke-miterlimit:10;stroke-dasharray:428.294,239.8446; }@keyframes circle_rotate { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } } </style>
		<circle class="st0" cx="320" cy="320" r="178"></circle>
		<circle class="st1" cx="320" cy="320" r="319"></circle>
		</svg>
		</div>
		<div class="userpage-main-names">
		<h1 class="title"><?php echo $current_user->user_login; ?></h1>
		<div class="fullname"><?php echo $current_user->display_name; ?></div>
		</div>
		</div>
		</div>
		<div class="b-cont">
		<ul class="userpage-addon">
		<li>
		<div class="item">
		<span class="uppercase muted small">Registered</span>
		<div class="fw-b"><?php echo $registered; ?></div>
		
		</div>
		</li>
		<li>
		<div class="item">
		<span class="uppercase muted small">Last Activity</span>
		<div class="fw-b"> 
		
		<?php
        global $userdata;
        get_currentuserinfo(); 
        get_last_login($userdata->ID); 
		?>
		<noscript>
		<?php
		// how many days since last login
		global $current_user;
		get_currentuserinfo();		 
		$now = time();
		$last_login = iiwp_get_last_login($current_user->ID,true);
		$datediff = $now - $last_login;		 
		echo '<p> (' . floor($datediff/(60*60*24)) . ') </p>';
		?>
		<?php		
		$userMeta = get_user_meta( $current_user->ID, '_last_login', false );
		$lastLogin = $userMeta[0];
		echo date('j F Y, H:i', $lastLogin);		 
		?>
		</noscript>
		</div>
		</div>
		</li>
		<li>
		<div class="item">
		<span class="uppercase muted small">Published by</span>
		<div class="fw-b"><?php echo count_user_posts( $current_user->ID, 'post', false ); ?></div>
		</div>
		</li>
		<li>
		<div class="item">
		<span class="uppercase muted small">Comments</span>
		<div class="fw-b"><?php echo get_user_comment_counts( $current_user->ID ); ?></div>
		</div>
		</li>
		</ul>
		<div class="userpage-addon-foot">
		 
		</div>
		</div>
		</div>
		</div>

				<div class="modal fade" id="userset" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<svg width="24" height="24"><use xlink:href="#i__close"></use></svg>
				</button>
				<h3 class="modal-title">Settings account</h3>
				</div>
				<div class="modal-body" id="options">
				<div class="form-group">
				<label class="c-muted" for="fullname">Username</label>
				<input class="form-control" type="text" maxlength="50" name="account" id="account" value="<?php echo $current_user->user_login ?>" readonly="">
				</div>
				<div class="form-group">
				<label class="c-muted" for="first-name"><?php _e('First Name', 'profile'); ?></label>
				<input class="form-control" type="text" maxlength="50" name="first-name" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" required="">
				</div>
				<div class="form-group">
				<label class="c-muted" for="last-name"><?php _e('Last Name', 'profile'); ?></label>
				<input class="form-control" type="text" maxlength="50" name="last-name" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" required="">
				</div>

					
				<div class="form-group">
				<label class="c-muted" for="display_name"><?php _e('Display Nickname Publicly') ?></label>
				<div class="bf-inline-items">  
				<select class="item" name="display_name" id="display_name"><br/>
				<?php
					$public_display = array();
					$public_display['display_nickname']  = $current_user->nickname;
					$public_display['display_username']  = $current_user->user_login;
					if ( !empty($current_user->first_name) )
						$public_display['display_firstname'] = $current_user->first_name;
					if ( !empty($current_user->last_name) )
						$public_display['display_lastname'] = $current_user->last_name;
					if ( !empty($current_user->first_name) && !empty($current_user->last_name) ) {
						$public_display['display_firstlast'] = $current_user->first_name . ' ' . $current_user->last_name;
						$public_display['display_lastfirst'] = $current_user->last_name . ' ' . $current_user->first_name;
					}
					if ( ! in_array( $current_user->display_name, $public_display ) ) // Only add this if it isn't duplicated elsewhere
						$public_display = array( 'display_displayname' => $current_user->display_name ) + $public_display;
					$public_display = array_map( 'trim', $public_display );
					$public_display = array_unique( $public_display );
					foreach ( $public_display as $id => $item ) {
				?>
					<option <?php selected( $current_user->display_name, $item ); ?>><?php echo $item; ?></option>
				<?php
					}
				?>
				</select> 
				</div>
				</div>
								
				<hr class="my-4">
				<div class="form-group">
				<label class="c-muted" for="email">E-Mail</label>
				<input class="form-control" type="email" maxlength="50" name="email" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" required="">
				</div>
				<hr class="my-4"> 
				<div class="form-group">
				<label class="c-muted" for="pass1">New Password</label>
				<input class="form-control" type="password" name="pass1" id="pass1">
				</div>
				<div class="form-group">
				<label class="c-muted" for="pass2">Repeat new password</label>
				<input class="form-control" type="password" name="pass2" id="pass2">
				</div>
				<noscript>
				<hr class="my-4">
				<div class="form-group">
				<label class="c-muted" for="image">Upload your avatar</label>
				<input type="file" id="image" name="image" class="form-control">
				</div>
				<div class="form-group">
				<label class="c-muted" for="image">Used Gravatar</label>
				<input type="text" name="gravatar" id="gravatar" value="" class="form-control">
				</div>
				<div class="custom-control custom-checkbox">
				<input type="checkbox" name="del_foto" class="custom-control-input" value="yes" id="del_foto">
				<label class="custom-control-label" for="del_foto">Delete avatar</label>
				</div>
				</noscript>
				 
				</div>
				<div class="modal-footer btn-group">
				<button class="btn btn-block s-green" type="submit" name="submit">Save</button>
				<button type="button" class="btn btn-block s-yellow" data-dismiss="modal">Cancel</button>
				<?php do_action('edit_user_profile',$current_user);  ?>
                <?php wp_nonce_field( 'update-user_'. $current_user->ID ) ?>
                <input name="action" type="hidden" id="action" value="update-user" />
						
				</div>
				</div>
				</div>
				</div>
				
						 

	</form>
	
	
	<?php } else { ?>
	
    <div class="page-cat-bg">
        <div class="wrp page-cat-cont">
            <div class="alert wrp-min">
                <div class="alert_in">
                    <div class="alert-title" style="text-align: center;display: none;">
                        <i class="i__info"><svg width="24" height="24"><use xlink:href="#i__info"></use></svg></i>
                        Oops! you not allowed to view this page.
                    </div>
                    <div class="alert-cont" style="text-align: center;font-size: x-large;text-transform: uppercase;">
					only user login can access this page, please <a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" alt="<?php esc_attr_e( 'Login', '5play' ); ?>"><?php _e( 'Login', '5play' ); ?></a>
                    </div>
                </div>
            </div>
            <div class="entry-listpage list-c6"> <?php ex_themes_adv_homes_(); ?><div id="dle-content"></div></div>
        </div>
    </div>
	<?php } ?>
	</section>
</div>



<svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>   
<symbol id="i__stats" viewBox="0 0 24 24">
<path fill="currentColor" d="M12 20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2s-2 .9-2 2v12c0 1.1.9 2 2 2zm-6 0c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2s-2 .9-2 2v4c0 1.1.9 2 2 2zm10-9v7c0 1.1.9 2 2 2s2-.9 2-2v-7c0-1.1-.9-2-2-2s-2 .9-2 2z" />
</symbol> 
<symbol id="i__edit" viewBox="0 0 24 24">
<path fill="currentColor" d="M3 17.46v3.04c0 .28.22.5.5.5h3.04c.13 0 .26-.05.35-.15L17.81 9.94l-3.75-3.75L3.15 17.1c-.1.1-.15.22-.15.36zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
</symbol>
<symbol id="i__fav" viewBox="0 0 24 24">
<path fill="currentColor" d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2zm0 15l-5-2.18L7 18V6c0-.55.45-1 1-1h8c.55 0 1 .45 1 1v12z" />
</symbol>
<symbol id="i__favfull" viewBox="0 0 24 24">
<path fill="currentColor" d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z" />
</symbol>
<symbol id="i__del" viewBox="0 0 24 24">
<path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v10zM18 4h-2.5l-.71-.71c-.18-.18-.44-.29-.7-.29H9.91c-.26 0-.52.11-.7.29L8.5 4H6c-.55 0-1 .45-1 1s.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1z" />
</symbol>
<symbol id="i__flag" viewBox="0 0 24 24">
<path fill="currentColor" d="M14.4 6l-.24-1.2c-.09-.46-.5-.8-.98-.8H6c-.55 0-1 .45-1 1v15c0 .55.45 1 1 1s1-.45 1-1v-6h5.6l.24 1.2c.09.47.5.8.98.8H19c.55 0 1-.45 1-1V7c0-.55-.45-1-1-1h-4.6z" />
</symbol>
<symbol id="i__report" viewBox="0 0 24 24">
<path fill="currentColor" d="M15.32 3H8.68c-.26 0-.52.11-.7.29L3.29 7.98c-.18.18-.29.44-.29.7v6.63c0 .27.11.52.29.71l4.68 4.68c.19.19.45.3.71.3h6.63c.27 0 .52-.11.71-.29l4.68-4.68c.19-.19.29-.44.29-.71V8.68c0-.27-.11-.52-.29-.71l-4.68-4.68c-.18-.18-.44-.29-.7-.29zM12 17.3c-.72 0-1.3-.58-1.3-1.3s.58-1.3 1.3-1.3 1.3.58 1.3 1.3-.58 1.3-1.3 1.3zm0-4.3c-.55 0-1-.45-1-1V8c0-.55.45-1 1-1s1 .45 1 1v4c0 .55-.45 1-1 1z" />
</symbol>
<symbol id="i__check" viewBox="0 0 24 24">
<path fill="currentColor" d="M9 16.2l-3.5-3.5c-.39-.39-1.01-.39-1.4 0-.39.39-.39 1.01 0 1.4l4.19 4.19c.39.39 1.02.39 1.41 0L20.3 7.7c.39-.39.39-1.01 0-1.4-.39-.39-1.01-.39-1.4 0L9 16.2z" />
</symbol>
<symbol id="i__telegram" viewBox="0 0 40 40">
<path fill="#c8daea" d="M14.87,32.83c-.91,0-.76-.34-1.07-1.2l-2.67-8.78L31.67,10.67Z" /><path fill="#a9c9dd" d="M14.87,32.83a1.77,1.77,0,0,0,1.4-.7L20,28.5l-4.66-2.8Z" /><path fill="#eff7fc" d="M15.34,25.7,26.63,34c1.28.71,2.21.35,2.53-1.2l4.6-21.64C34.23,9.31,33,8.45,31.81,9l-27,10.4C3,20.15,3,21.18,4.5,21.63l6.92,2.16,16-10.1c.75-.46,1.45-.22.88.29Z" />
</symbol>
<symbol id="i__hot" viewBox="0 0 24 24">
<path fill="currentColor" d="M19.48,12.35c-1.57-4.08-7.16-4.3-5.81-10.23c0.1-0.44-0.37-0.78-0.75-0.55C9.29,3.71,6.68,8,8.87,13.62 c0.18,0.46-0.36,0.89-0.75,0.59c-1.81-1.37-2-3.34-1.84-4.75c0.06-0.52-0.62-0.77-0.91-0.34C4.69,10.16,4,11.84,4,14.37 c0.38,5.6,5.11,7.32,6.81,7.54c2.43,0.31,5.06-0.14,6.95-1.87C19.84,18.11,20.6,15.03,19.48,12.35z M10.2,17.38 c1.44-0.35,2.18-1.39,2.38-2.31c0.33-1.43-0.96-2.83-0.09-5.09c0.33,1.87,3.27,3.04,3.27,5.08C15.84,17.59,13.1,19.76,10.2,17.38z" />
</symbol>
</defs>
</svg>

<?php
get_footer();		