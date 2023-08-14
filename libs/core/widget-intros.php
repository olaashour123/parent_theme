<?php 
/*-----------------------------------------------------------------------------------*/ 
/*  Intro widget 
/*-----------------------------------------------------------------------------------*/
class intro_widgets extends WP_Widget {
	public function __construct(){
		$widget_ops = array(
			'classname'   => 'intro-widgets',
			'description' => __( EX_THEMES_NAMES_.' Widget for Showing Intro On Home', THEMES_NAMES ),
		);
		parent::__construct( 'intro-widgets', __( '( 5play ) Intro Widget', THEMES_NAMES ), $widget_ops );
        //For Color Picker
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) ); 
        add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
	} 
	
    public function enqueue_scripts( $hook_suffix ) {
        if ( 'widgets.php' !== $hook_suffix ) {
            return;
        }
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'underscore' );
    }
	
    public function print_scripts() {
        ?>
        <script>
            ( function( $ ){
                function initColorPicker( widget ) {
                    widget.find( '.color-picker' ).wpColorPicker( {
                        change: _.throttle( function() { // For Customizer
                            $(this).trigger( 'change' );
                        }, 3000 )
                    });
                }

                function onFormUpdate( event, widget ) {
                    initColorPicker( widget );
                }

                $( document ).on( 'widget-added widget-updated', onFormUpdate );

                $( document ).ready( function() {
                    $( '#widgets-right .widget:has(.color-picker)' ).each( function () {
                        initColorPicker( $( this ) );
                    } );
                } );
            }( jQuery ) );
        </script>
        <?php
    }
     
	public function widget( $args, $instance ){  
		$before_widget		= '<div class="page-head-main">';
		$after_widget		= '</div> ';
		
		$widget_id			= $this->id_base . '-' . $this->number;		
		
		$title				= ( ! empty( $instance['title'] ) ) ?  $instance['title'] : '';	 	 
        $h_color			= isset( $instance['h_color'] ) ? $instance['h_color'] : '';
        $h_dark_color		= isset( $instance['h_dark_color'] ) ? $instance['h_dark_color'] : '';
		
		echo $before_widget;		  
		?>  
		 
		<h1 class="title" style='text-transform: capitalize;'><?php echo $title; ?></h1>
		<img src="<?php if ($instance['image_uri']){ echo esc_url($instance['image_uri']); } else { ?><?php echo EX_THEMES_URI; ?>/assets/img/main_illustration.png<?php } ?>" alt="<?php echo $title; ?>">
		<style><?php if($h_color){ ?>div.page-head-main h1.title {color: <?php echo $h_color; ?>!important;}<?php } if($h_dark_color){ ?>.darktheme div.page-head-main h1.title {color: <?php echo $h_dark_color; ?>!important;}<?php } ?></style>
	 <?php  
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance ){
		$instance     = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance,
			array(
				'title'				=> '', 
				'h_color'			=> '', 
				'h_dark_color'		=> '', 
				'image_uri'			=> '', 
			)
		);
		$instance['title']				= $new_instance['title'];  		
        $instance['image_uri']			= strip_tags( $new_instance['image_uri'] );
        $instance['h_color']			= strip_tags( $new_instance['h_color'] );
        $instance['h_dark_color']		= strip_tags( $new_instance['h_dark_color'] );
		return $instance;
	}
	
	public function form( $instance ){
		$linkX = get_bloginfo('url'); 
		$parse = parse_url($linkX); 
		$sitex = $parse['host'];
		$instance = wp_parse_args( (array) $instance,
			array(
				'title'				=> __( 'Games and apps for Android', THEMES_NAMES ), 
				'h_color'			=> __( '#4CCB70', THEMES_NAMES ), 
				'h_dark_color'		=> __( '#ffffff', THEMES_NAMES ), 
			)
		);
		$title					= $instance['title']; 
        $h_color				= isset( $instance['h_color'] ) ? esc_attr( $instance['h_color'] ) : '';
        $h_dark_color			= isset( $instance['h_dark_color'] ) ? esc_attr( $instance['h_dark_color'] ) : '';
		?>
		<p style="text-align: center;font-weight: bold;">Intro Widget </p>
		<hr />
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title :', THEMES_NAMES ); ?></label>
		</p> 
        <p>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" />
		</p> 
		<hr />	
		<?php if($instance['image_uri']){ ?>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'image_uri' ) ); ?>"><?php esc_html_e( 'BACKGROUND :', THEMES_NAMES ); ?></label>
		</p>		
		<p>
			<img class="<?= $this->id ?>_img" src="<?= (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
		</p>
		<?php } if(!$instance['image_uri']){ ?>
		<p>Default Background is : </p>
		<p>
		<img class="default_bg" src="<?php echo EX_THEMES_URI; ?>/assets/img/main_illustration.png" style="margin:0;padding:0;max-width:100%;display:block"/>
		</p>
		<?php } ?>
		<p>
            <input type="text" class="widefat <?= $this->id ?>_url" name="<?= $this->get_field_name( 'image_uri' ); ?>" value="<?= $instance['image_uri'] ?? ''; ?>" style="margin-top:5px;" />
		</p>
		<p>
			<input type="button" id="<?= $this->id ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />
			<?php if(!$instance['image_uri']){ ?>
			<p>
			* Upload your Background. if not upload, Backgrounds using by default, <br>
			* Delete Url if you want use by default
			</p> 
			<?php } ?>
		<hr />	
		<p>
			<label for="<?php echo $this->get_field_id( 'h_color' ); ?>"><?php _e( 'Color Heading ', THEMES_NAMES ); ?></label>
		</p> 
        <p>
			<input type="text" name="<?php echo $this->get_field_name( 'h_color' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'h_color' ); ?>" value="<?php echo $h_color; ?>" data-default-color="" />
		</p>
		<hr />		
		<p>
			<label for="<?php echo $this->get_field_id( 'h_dark_color' ); ?>"><?php _e( 'Color Heading (Dark) ', THEMES_NAMES ); ?></label>
		</p> 
        <p>
			<input type="text" name="<?php echo $this->get_field_name( 'h_dark_color' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'h_dark_color' ); ?>" value="<?php echo $h_dark_color; ?>" data-default-color="" />
		</p>
<script>
jQuery(document).ready(function ($) {
  function media_upload(button_selector) {
    var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
    $('body').on('click', button_selector, function () {
      var button_id = $(this).attr('id');
      wp.media.editor.send.attachment = function (props, attachment) {
        if (_custom_media) {
          $('.' + button_id + '_img').attr('src', attachment.url);
          $('.' + button_id + '_url').val(attachment.url);
        } else {
          return _orig_send_attachment.apply($('#' + button_id), [props, attachment]);
        }
      }
      wp.media.editor.open($('#' + button_id));
      return false;
    });
  }
  media_upload('.js_custom_upload_media');
});
</script>
		<?php
	}
	
}

add_action(	'widgets_init',	function(){
	register_widget( 'intro_widgets' );
	}
);
