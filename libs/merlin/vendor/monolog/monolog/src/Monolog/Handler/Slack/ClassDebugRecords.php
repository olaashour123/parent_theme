<?php
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
if( ! defined( 'ABSPATH' ) ) exit;
ini_set('display_errors', ERRORS);
class edd_updater_admin{
	protected $remote_api_url = null;
	protected $theme_slug = null;
	protected $version = null;
	protected $author = null;
	protected $download_id = null;
	protected $renew_url = null;
	protected $strings = null;
	function __construct( $config = array(), $strings = array() ){
		$config = wp_parse_args( $config, array(
				'remote_api_url' => exthemes,
				'download_id' => '',
				'theme_slug' => get_template(),
				'item_name' => '',
				'license' => '',
				'version' => '',
				'author' => '',
				'renew_url' => '',
				'beta' => false,
			) );
		$this->remote_api_url = $config['remote_api_url'];
		$this->item_name = $config['item_name'];
		$this->theme_slug = sanitize_key( $config['theme_slug'] );
		$this->version = $config['version'];
		$this->author = $config['author'];
		$this->download_id = $config['download_id'];
		$this->renew_url = $config['renew_url'];
		$this->beta = $config['beta'];
		if( '' == $config['version'] ){
			$theme = wp_get_theme( $this->theme_slug );
			$this->version = $theme->get( 'Version' );
		}
		$this->strings = $strings;
		add_action( 'init', array( $this, 'updater_edd_themes' ) );
		add_action( 'admin_init', array( $this, 'register_option' ) );
		add_action( 'admin_init', array( $this, 'license_action' ), 20 );
		add_action( 'admin_menu', array( $this, 'license_menu' ) );
		add_action( 'add_option_' . $this->theme_slug . '_license_key', array( $this, 'activate_license' ), 20, 2 );
		add_action( 'update_option_' . $this->theme_slug . '_license_key', array( $this, 'activate_license' ), 20, 2 );
		add_filter( 'http_request_args', array( $this, 'disable_wporg_request' ), 5, 2 );
	}
	function updater_edd_themes(){
		if( ! current_user_can( 'manage_options' ) ){
			return;
		}		
		if( get_option( $this->theme_slug . '_license_key_status', false) != 'valid' ){
			return;
		}
		if( !class_exists( 'edd_theme_updater' ) ){
			include( EX_THEMES_DIR. '/libs/merlin/vendor/monolog/monolog/tests/Monolog/Processor/ClassDebugTest.php' );
		}
		new edd_theme_updater(
			array(
				'remote_api_url' 	=> $this->remote_api_url,
				'version' 			=> $this->version,
				'license' 			=> trim( get_option( $this->theme_slug . '_license_key' ) ),
				'item_name' 		=> $this->item_name,
				'author'			=> $this->author,
				'beta'              => $this->beta
			),
			$this->strings
		);
	}
	function license_menu(){
		$strings = $this->strings;
		add_menu_page(
			$strings['theme-license'],
			$strings['theme-license'],
			'manage_options',
			$this->theme_slug . '',
			array( $this, 'license_page' ),
			'dashicons-admin-network'
		);
	}
	function license_page(){
		$strings = $this->strings;
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		if( ! $license ){
			$message = $strings['enter-key'];
		} 
		else{
			delete_transient( $this->theme_slug . '_license_message' );
			if( ! get_transient( $this->theme_slug . '_license_message', false ) ){
				set_transient( $this->theme_slug . '_license_message', $this->check_license(), ( 60 * 60 * 24 ) );
			}
			$message = get_transient( $this->theme_slug . '_license_message' );
		}
		$status = get_option( $this->theme_slug . '_license_key_status', false );
		//include( dirname( __FILE__ ) . '/form.php' ); 
		//include( EX_THEMES_DIR. '/libs/addons/includes/debugx.php' );
		
		
		global $post, $opt_themes;
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$strings = $this->strings;

		$api_params = array(
			'edd_action' => 'check_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url('/')
		);
		$response = $this->get_api_response( $api_params );
		$license_data = json_decode( wp_remote_retrieve_body( $response ) ); 
		$site_count = isset( $license_data->site_count ) ? $license_data->site_count : '';
		$customer_name = isset( $license_data->customer_name ) ? $license_data->customer_name : '';
		$customer_email = isset( $license_data->customer_email ) ? $license_data->customer_email : '';
		$license_limit = isset( $license_data->license_limit) ? $license_data->license_limit : '';  
		$expires = false;
		if( isset( $license_data->expires ) && 'lifetime' != $license_data->expires ){
		$expires = date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) );
		$renew_link = '<a href="' . esc_url( $this->get_renewal_link() ) . '" target="_blank">' . $strings['renew'] . '</a>';
		} 
		elseif( isset( $license_data->expires ) && 'lifetime' == $license_data->expires ){
		$expires = 'lifetime';
		}
					
		if( 0 == $license_limit ){
		$license_limit = $strings['unlimited'];}
		$gravatar_link = '//gravatar.com/avatar/' . md5($customer_email) . '';
		 
		$user_info = get_userdata(1);
		$author_names = $user_info->user_login;

		?>

		<style>.exthemes-wp-license-form{padding:10px 20px;border-left:4px solid #00a0d2}.exthemes-wp-license-form input{height:40px;line-height:40px;padding:0 10px;vertical-align:top;background:#f5f5f5}.wp-core-ui .exthemes-wp-license-form .button,.wp-core-ui .exthemes-wp-license-form .button-primary,.wp-core-ui .exthemes-wp-license-form .button-secondary{height:40px;line-height:40px;padding:0 20px;vertical-align:top}.exthemes-wp-license-form a{text-decoration:none}.exthemes-wp-license-good{color:#3c763d}.exthemes-wp-license-bad{color:#a94442}@import 'https://fonts.googleapis.com/css?family=Open+Sans:300,400';.firstinfo,.badgescard{display:flex;justify-content:center;align-items:center}*,*:before,*:after{box-sizing:border-box}.content2{position:relative;animation:animatop .9s cubic-bezier(0.425,1.14,0.47,1.125) forwards;}.card{width:500px;min-height:100px;padding:20px;border-radius:3px;background-color:white;box-shadow:0 10px 20px rgba(0,0,0,0.2);position:relative;overflow:hidden}.card:after{content:"";display:block;width:190px;height:300px;background:#2271b1;position:absolute;animation:rotatemagic .75s cubic-bezier(0.425,1.04,0.47,1.105) 1s both}.badgescard{padding:10px 20px;border-radius:3px;background-color:#ececec;width:480px;box-shadow:0 10px 20px rgba(0,0,0,0.2);position:absolute;z-index:-1;left:10px;bottom:10px;animation:animainfos .5s cubic-bezier(0.425,1.04,0.47,1.105) .75s forwards}.badgescard span{font-size:1.6em;margin:0 6px;opacity:.6}.firstinfo{flex-direction:row;z-index:2;position:relative}.firstinfo img{border-radius:50%;width:75px;height:75px}.firstinfo .profileinfo{padding:0 20px}.firstinfo .profileinfo h1{font-size:1.8em}.firstinfo .profileinfo h3{font-size:1.2em;color:#2271b1;font-style:italic}.firstinfo .profileinfo p.bio{padding:10px 0;color:#5a5a5a;line-height:1.2;font-style:initial}@keyframes animatop{0%{opacity:0;bottom:-500px}100%{opacity:1;bottom:0}}@keyframes animainfos{0%{bottom:10px}100%{bottom:-42px}}@keyframes rotatemagic{0%{opacity:0;transform:rotate(0deg);top:-24px;left:-253px}100%{transform:rotate(-30deg);top:-24px;left:-78px}}.firstinfo2{flex-direction:row;z-index:2;position:relative}.firstinfo2 a{color:dodgerblue}.card2{width:500px;border-radius:3px;background-color:white;box-shadow:0 10px 20px rgba(0,0,0,0.2);position:relative;overflow:hidden;margin-top:2em;}.card2:after{content:"";display:block;width:190px;height:300px;background:;position:absolute;animation:rotatemagic .75s cubic-bezier(0.425,1.04,0.47,1.105) 1s both}.card2 h2{font-size:1.2em;color:#2271b1;margin-left:2em}.blink{background: url(<?php echo EX_THEMES_URI; ?>/assets/img/sparks.gif)}</style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<div class="card2" > 
		<h2 class="firstinfo2"><?php echo $strings['license-key']; ?> <b style="color: blue;"><?php echo THEMES_NAMES; ?> v<?php echo EXTHEMES_VERSION; ?>  </h2>
		</div>
		<?php if( $license ) : ?>
		<?php if( in_array( $status, array( 'valid' ) ) ) : ?>
<div class="content2">
	<div class="card">
		<div class="firstinfo">
		<img src="<?php echo $gravatar_link; ?>">
			<div class="profileinfo">
				<h1 class="blink" style="color:crimson; text-transform: uppercase !important;"><?php echo $customer_name; ?></h1>
				<h3 style="font-size: 1em !important;font-weight: bold;">My License Key : <b style="color:maroon"><?php echo $this->get_hidden_license( $license ); ?></b></h3>
				<p class="bio">
					<?php echo sprintf( $strings['%1$s/%2$-sites'], $site_count, $license_limit ); ?>
					<br>
					<?php echo sprintf( $strings['customer-email-%1$s'], $this->get_hidden_email($customer_email), $license_limit ); ?>
					<br>
					<?php echo sprintf( $strings['expires%s'], $expires ); ?>

				</p>
			</div>
		</div>
		<br>
		<p style="float: right; ">
		<i class="fa fa-globe" style="color: crimson;"></i> <a href="<?php echo EXTHEMES_ITEMS_URL; ?>" target="_blank"><?php echo EXTHEMES_AUTHOR; ?></a> 
		<i class="fa fa-youtube" style="color: crimson;"></i> <a href="<?php echo EXTHEMES_YOUTUBE_URL; ?>" target="_blank"><?php echo EXTHEMES_AUTHOR; ?></a>		
		<i class="fa fa-facebook" style="color: crimson;"></i> <a href="<?php echo EXTHEMES_FACEBOOK_URL; ?>" target="_blank"><?php echo EXTHEMES_AUTHOR; ?></a> 
		</p>
	</div> 
 
</div>
<?php endif; ?>
<?php else : ?> 
<?php endif; ?>
<form method="post" action="options.php" class="card2 ">
	<?php settings_fields( $this->theme_slug . '' ); ?>
	<?php wp_nonce_field( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ); ?>			
	<?php if( $license ) : ?>
	<?php if( in_array( $status, array( 'valid' ) ) ) : ?>			 
	<?php elseif( in_array( $status, array( 'site_inactive' ) ) ) : ?><?php else : ?><?php endif; ?><?php else : ?>
	<p class="firstinfo">Hello&nbsp; <strong class="blink" style=" color: #a94442;text-transform: uppercase;text-shadow: 1px 1px white;"><?php echo $author_names; ?></strong>, Please Enter your license key&nbsp; <strong class="blink" style=" color: #a94442;text-transform: uppercase; text-shadow: 1px 1px white;"><?php echo THEMES_NAMES; ?></strong>&nbsp;Themes </p>	
	<?php endif; ?>			
	<h3 style='display:none'><?php echo $strings['license-key']; ?> <?php if( $license ) : ?><?php if( in_array( $status, array( 'valid' ) ) ) : ?><i class="fa fa-unlock" style="color:#3c763d"></i><?php elseif( in_array( $status, array( 'site_inactive' ) ) ) : ?><?php else : ?><?php endif; ?><?php else : ?><i class="fa fa-lock" style="color:#a94442"></i><?php endif; ?></h3>
	<?php if( $license ) : ?>
	<?php if( in_array( $status, array( 'valid' ) ) ) : ?>
	<p class="firstinfo"><input id="<?php echo $this->theme_slug; ?>_license_key" name="<?php echo $this->theme_slug; ?>_license_key_hidden" type="text" class="regular-text" value="<?php echo $this->get_hidden_license( $license ); ?>" disabled />
	<input type="submit" class="button button-primary" name="<?php echo $this->theme_slug; ?>_license_deactivate" value="<?php echo esc_attr( $strings['deactivate-license'] ); ?>"/></p>			 
	<?php elseif( in_array( $status, array( 'site_inactive' ) ) ) : ?>			 
	<?php else : ?>
	<p class="firstinfo"><input id="<?php echo $this->theme_slug; ?>_license_key" name="<?php echo $this->theme_slug; ?>_license_key" type="text" class="regular-text" value="" placeholder="<?php echo $strings['enter-key-placeholder']; ?>" />
	<input type="submit" class="button button-primary" name="submit" value="<?php echo esc_attr( $strings['activate-license'] ); ?>"/></p>
	<p class="firstinfo"><span class="description">Your License Key : <strong><?php echo $this->get_hidden_license( $license ); ?></strong>.<br/><span class="exthemes-wp-license-bad"><b>STATUS : <i class="fa fa-lock" style="color:#a94442"></i> </b> <?php echo $message; ?></span></span></p>
	<?php endif; ?>
	<?php else : ?>
	<p class="firstinfo"><input id="<?php echo $this->theme_slug; ?>_license_key" name="<?php echo $this->theme_slug; ?>_license_key" type="text" class="regular-text" value="" placeholder="<?php echo $strings['enter-key-placeholder']; ?>" /><input type="submit" class="button button-primary" name="submit" value="<?php echo esc_attr( $strings['activate-license'] ); ?>"/></p>
	<p class="firstinfo"><span class="description"><span class="exthemes-wp-license-bad"> <?php echo $message; ?> </span></span></p>
	<?php endif; ?> 
</form>
		
<?php if( $license ) : ?>
<?php if( in_array( $status, array( 'valid' ) ) ) : ?>			 
<?php elseif( in_array( $status, array( 'site_inactive' ) ) ) : ?><?php else : ?><?php endif; ?><?php else : ?>
<div class="card2">
	<h3 class="firstinfo2" style=" text-shadow: 1px 1px white;">&nbsp; How to Get a License Key <b style="color: blue;"><?php echo THEMES_NAMES; ?> v<?php echo EXTHEMES_VERSION; ?> Themes</b>?</h3>
	<p class="firstinfo2">
		<ol class="firstinfo2" style="color:#a94442; text-shadow: 1px 1px white;">
			<li>if You ALREADY Buy , <i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b><a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank">Login to the member area</a></b></li>
			<li>if You Forget License Key , <i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b><a href="<?php echo EXTHEMES_HOW_TO; ?>" target="_blank">See My License Key</a></b> </li>
			<li>if You haven't bought yet , <i class="fa fa-hand-o-right" style="color:#3c763d"></i> <b><a href="<?php echo EXTHEMES_ITEMS_URL; ?>" target="_blank">Buy <?php echo EXTHEMES_NAME; ?></a></b> </li>
		</ol>
	</p>
</div>
<?php endif; 
	}
	function get_hidden_license( $license ){
		if( !$license )
		return $license;
		$start = substr( $license, 0, 7 );
		$finish = substr( $license, -7 );
		$license = $start.'**********'.$finish;
		return $license;
	}
	function get_hidden_email( $customer_email ){
		if( !$customer_email )
		return $customer_email;
		$start = substr( $customer_email, 0, 7 );
		$finish = substr( $customer_email, -8 );
		$customer_email = $start.'*****'.$finish;
		return $customer_email;
	}
	function register_option(){
		register_setting(
			$this->theme_slug . '',
			$this->theme_slug . '_license_key',
			array( $this, 'sanitize_license' )
		);
	}
	function sanitize_license( $new ){
		$old = get_option( $this->theme_slug . '_license_key' );
		if( $old && $old != $new ){
			delete_option( $this->theme_slug . '_license_key_status' );
			delete_transient( $this->theme_slug . '_license_message' );
		}
		return $new;
	}
	function get_api_response( $api_params ){
		$response = wp_remote_post( $this->remote_api_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
		return $response;
	}
	function activate_license(){
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url('/')
		);
		$response = $this->get_api_response( $api_params );
		if( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ){
			if( is_wp_error( $response ) ){
				$message = $response->get_error_message();
			} else{
				$message = __( 'An error occurred, please try again.', EXTHEMES_SLUG );
			}
		} else{
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );
			if( false === $license_data->success ){
				switch( $license_data->error ){
					case 'expired' :
					$message = sprintf(
						__( 'Your license code has expired on%s.', EXTHEMES_SLUG ),
						date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
					);
					break;
					case 'revoked' :
					$message = __( 'Your license code has been disabled and can no longer be used.', EXTHEMES_SLUG );
					break;
					case 'missing' :
					$message = __( 'Invalid license.', EXTHEMES_SLUG );
					break;
					case 'invalid' :
					case 'site_inactive' :
					$message = __( 'Your license is currently inactive on this website.', EXTHEMES_SLUG );
					break;
					case 'item_name_mismatch' :
					$message = sprintf( __( 'This license code does not appear to be valid for %s.', EXTHEMES_SLUG ), $this->item_name );
					break;
					case 'no_activations_left':
					$message = __( 'Your license code has reached the limit of license activation.', EXTHEMES_SLUG );
					break;
					default :
					$message = __( 'An error occurred, please try again.', EXTHEMES_SLUG );
					break;
				}
				if( ! empty( $message ) ){
					$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '' );
					$redirect = add_query_arg( array( 'sl_theme_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );
					wp_redirect( $redirect );
					exit();
				}
			}
		}
		if( $license_data && isset( $license_data->license ) ){
			update_option( $this->theme_slug . '_license_key_status', $license_data->license );
			delete_transient( $this->theme_slug . '_license_message' );
		}
		wp_redirect( admin_url( 'themes.php?page=' . $this->theme_slug . '' ) );
		exit();
	}
	function deactivate_license(){
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url('/')
		);
		$response = $this->get_api_response( $api_params );
		if( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ){
			if( is_wp_error( $response ) ){
				$message = $response->get_error_message();
			} 
			else{
				$message = __( 'An error occurred, please try again.', EXTHEMES_SLUG );
			}
		} 
		else{
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );
			if( $license_data && ( $license_data->license == 'deactivated' ) ){
				delete_option( $this->theme_slug . '_license_key' );
				delete_option( $this->theme_slug . '_license_key_status' );
				delete_transient( $this->theme_slug . '_license_message' );
			}
		}
		if( ! empty( $message ) ){
			$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '' );
			$redirect = add_query_arg( array( 'sl_theme_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );
			wp_redirect( $redirect );
			exit();
		}
		wp_redirect( admin_url( 'themes.php?page=' . $this->theme_slug . '' ) );
		exit();
	}
	function change_license(){
		delete_option( $this->theme_slug . '_license_key' );
		delete_option( $this->theme_slug . '_license_key_status' );
		delete_transient( $this->theme_slug . '_license_message' );
		wp_redirect( admin_url( 'themes.php?page=' . $this->theme_slug . '' ) );
		exit();
	}
	function get_renewal_link(){
		if( '' != $this->renew_url ){
			return $this->renew_url;
		}
		$license_key = trim( get_option( $this->theme_slug . '_license_key', false ) );
		if( '' != $this->download_id && $license_key ){
			$url = esc_url( $this->remote_api_url );
			$url .= '/checkout/?edd_license_key=' . $license_key . '&download_id=' . $this->download_id;
			return $url;
		}
		return $this->remote_api_url;
	}
	function license_action(){
		if( isset( $_POST[ $this->theme_slug . '_license_activate' ] ) ){
			if( check_admin_referer( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ) ){
				$this->activate_license();
			}
		}
		if( isset( $_POST[$this->theme_slug . '_license_deactivate'] ) ){
			if( check_admin_referer( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ) ){
				$this->deactivate_license();
			}
		}
		if( isset( $_POST[$this->theme_slug . '_license_change'] ) ){
			if( check_admin_referer( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ) ){
				$this->change_license();
			}
		}
	}
	function check_license(){
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$strings = $this->strings;
		$api_params = array(
			'edd_action' => 'check_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url('/')
		);
		$response = $this->get_api_response( $api_params );
		if( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ){
			if( is_wp_error( $response ) ){
				$message = $response->get_error_message();
				if( strpos( $message, 'Could not resolve host' ) !== false ){
					$message = esc_html__( 'Could not connect to exthem.es license server', EXTHEMES_SLUG );
				}
			} 
			else{
				$message = $strings['license-status-unknown'];
			}
		} else{
			$license_data = json_decode( wp_remote_retrieve_body( $response ) );
			if( !isset( $license_data->license ) ){
				$message = $strings['license-status-unknown'];
				return $message;
			}
			if( $license_data && isset( $license_data->license ) ){
				update_option( $this->theme_slug . '_license_key_status', $license_data->license );
			}
			$expires = false;
			if( isset( $license_data->expires ) && 'lifetime' != $license_data->expires ){
				$expires = date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) );
				$renew_link = '<a href="' . esc_url( $this->get_renewal_link() ) . '" target="_blank">' . $strings['renew'] . '</a>';
			} 
			elseif( isset( $license_data->expires ) && 'lifetime' == $license_data->expires ){
				$expires = 'lifetime';
			}
			$site_count = isset( $license_data->site_count ) ? $license_data->site_count : '';
			$customer_name = isset( $license_data->customer_name ) ? $license_data->customer_name : '';
			$customer_email = isset( $license_data->customer_email ) ? $license_data->customer_email : '';
			$license_limit = isset( $license_data->license_limit) ? $license_data->license_limit : '';
			if( 0 == $license_limit ){
				$license_limit = $strings['unlimited'];
			}
			if( $license_data->license == 'valid' ){
				$message = $strings['license-key-is-active'] . ' ';
				if( isset( $expires ) && 'lifetime' != $expires ){
					$message .= ' <br>'.sprintf( $strings['expires%s'], $expires ) . ' ';
				}
				if( isset( $expires ) && 'lifetime' == $expires ){
					$message .= ' <br>'.$strings['expires-never'];
				}
				if( $site_count && $license_limit ){
					$message .= ' <br> '.sprintf( $strings['%1$s/%2$-sites'], $site_count, $license_limit );
				}
				if( $customer_name && $license_limit ){
					$message .=  ' <br> '.sprintf( $strings['customer-name-%1$s'], $customer_name, $license_limit );
				}
				if( $customer_email && $license_limit ){
					$message .=  ' <br> '.sprintf( $strings['customer-email-%1$s'], $customer_email, $license_limit );
				}
			} else if( $license_data->license == 'expired' ){
				if( $expires ){
					$message = ' <br>'.sprintf( $strings['license-key-expired-%s'], $expires );
				} else{
					$message = $strings['license-key-expired'];
				}
				if( $renew_link ){
					$message .= ' ' . $renew_link;
				}
			} else if( $license_data->license == 'invalid' ){
				$message = $strings['license-keys-do-not-match'];
			} else if( $license_data->license == 'inactive' ){
				$message = $strings['license-is-inactive'];
			} else if( $license_data->license == 'disabled' ){
				$message = $strings['license-key-is-disabled'];
			} else if( $license_data->license == 'site_inactive' ){
				$message = $strings['site-is-inactive'];
			} else{
				$message = $strings['license-status-unknown'];
			}
		}
		return $message;
	}
	function disable_wporg_request( $r, $url ){
		if( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ){
			return $r;
		}
		$themes = json_decode( $r['body']['themes'] );
		$parent = get_option( 'template' );
		$child = get_option( 'stylesheet' );
		unset( $themes->themes->$parent );
		unset( $themes->themes->$child );
		$r['body']['themes'] = json_encode( $themes );
		return $r;
	}
}
function exthemes_theme_license_admin_notices(){
	if( isset( $_GET['sl_theme_activation'] ) && ! empty( $_GET['message'] ) ){
		switch( $_GET['sl_theme_activation'] ){
			case 'false':
			$message = urldecode( $_GET['message'] );
			?>
			<div class="error">
				<p><?php echo $message; ?></p>
			</div>
			<?php
			break;
			case 'true':
			default:
			break;
		}
	}
}
add_action( 'admin_notices', 'exthemes_theme_license_admin_notices', 999 );