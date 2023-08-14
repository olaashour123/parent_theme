<?php

class Pathrika_Pop_Widget extends WP_Widget {
    /**
     * Widget constructor.
     *
     * @since  1.0
     *
     * @access public
     */
     function __construct() {
        parent::__construct(
            'pathrika_pop_widget', // Base ID
            __( 'Pathrika Pop Anything', 'pathrika' ), // Name
            array( 'description' => __( 'Pops shortcodes, html and custom text', 'pathrika' ), ) // Args
        );
        //For Color Picker
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'wp_head', array( $this, 'widget_frontend_css' ) );
        add_action( 'admin_footer-widgets.php', array( $this, 'print_scripts' ), 9999 );
     }
     /**
     * Enqueue scripts.
     *
     * @since 1.0
     *
     * @param string $hook_suffix
     */
    public function enqueue_scripts( $hook_suffix ) {
        if ( 'widgets.php' !== $hook_suffix ) {
            return;
        }

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script( 'underscore' );
    }

    /**
     * Print scripts.
     *
     * @since 1.0
     */
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
    /**
     * Widget Frontend Css.
     *
     * @since 1.0
     */
    public function widget_frontend_css($instance) {
        ?>
<!-- Pop Widget Css --> 
<style type="text/css">
    .pop-link{
        color:<?php echo $instance['poplink_color']; ?>;
    }
    @media only screen and (max-width:960px){
        .pop-link{
            color:<?php echo $instance['poplink_mobile_color']; ?>;
        }
    }   
</style>
        <?php
    }
     /**
     * Widget output.
     *
     * @since  1.0
     *
     * @access public
     * @param  array $args
     * @param  array $instance
     */
     function widget( $args,$instance ){
        extract( $args );

        // Colors
        $poplink_color              = isset( $instance['poplink_color'] ) ? $instance['poplink_color'] : '';
        $poplink_hover_color        = isset( $instance['poplink_hover_color'] ) ? $instance['poplink_hover_color'] : '';
        $poplink_mobile_color       = isset( $instance['poplink_mobile_color'] ) ? $instance['poplink_mobile_color'] : '';
        $poplink_mobile_focus_color = isset( $instance['poplink_mobile_focus_color'] ) ? $instance['poplink_mobile_focus_color'] : '';

        $poplink_name_1             = isset( $instance['poplink_name_1'] ) ? $instance['poplink_name_1'] : '';
        $poplink_icon_1             = isset( $instance['poplink_icon_1'] ) ? $instance['poplink_icon_1'] : '';
        $pop_sc_1                   = isset( $instance['pop_sc_1'] ) ? $instance['pop_sc_1'] : '';
        $pop_type_1                 = isset( $instance['pop_type_1'] ) ? $instance['pop_type_1'] : 'nf-popup';
        $only_icon_1                = isset( $instance['only_icon_1'] ) ? $instance['only_icon_1'] : '';

        echo $before_widget;
        ?>
        <?php // mfp-zoom-in,mfp-zoom-out,mfp-newspaper,mfp-move-horizontal,mfp-move-from-top,mfp-3d-unfold,?>
        <?php $popup_animation = 'mfp-zoom-in'; ?>
        <?php if ( ! empty( $pop_sc_1) or !empty( $pop_sc_2) or !empty( $pop_sc_3) or !empty( $pop_sc_4 ) ) : ?>
                <ul class="magnific-collection">
                    <?php if ( ! empty( $pop_sc_1 ) ) : ?>
                        <li>
                            <a href="#pop_sc_1" data-effect="<?php echo $popup_animation; ?>" class="pop-link <?php echo $pop_type_1; ?>">
                                <?php if ( ! empty( $poplink_icon_1 ) ) : ?><span class="pop-icon <?php echo $poplink_icon_1; ?>" aria-hidden="true"></span><?php endif;?><?php if ( ! empty( $poplink_icon_1 ) ) : ?><span <?php if ( "yes" == $only_icon_1 ) : ?> class="accessibility" <?php endif; ?>><?php echo $poplink_name_1; ?></span><?php endif; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if ( ! empty( $pop_sc_1 ) ) : ?>
                    <div id="pop_sc_1" role="dialog" class="white popup-block mfp-hide mfp-with-anim">
                        <?php echo do_shortcode( $pop_sc_1 ); ?>
                        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                    </div>
                <?php endif; ?>
        <?php endif; ?>
        <?php echo $after_widget; ?>

    <?php  }

    /**
     * Saves widget settings.
     *
     * @since  1.0
     *
     * @access public
     * @param  array $new_instance
     * @param  array $old_instance
     * @return array
     */

    function update( $new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['poplink_color']              = strip_tags( $new_instance['poplink_color'] );
        $instance['poplink_hover_color']        = strip_tags( $new_instance['poplink_hover_color'] );
        $instance['poplink_mobile_color']       = strip_tags( $new_instance['poplink_mobile_color'] );
        $instance['poplink_mobile_focus_color'] = strip_tags( $new_instance['poplink_mobile_focus_color'] );

        $instance['poplink_name_1']             = strip_tags( $new_instance['poplink_name_1'] );
        $instance['poplink_icon_1']             = strip_tags( $new_instance['poplink_icon_1'] );
        $instance['pop_sc_1']                   = strip_tags( $new_instance['pop_sc_1'] );
        $instance['pop_type_1']                 = $new_instance['pop_type_1'];
        $instance['only_icon_1']                = strip_tags( $new_instance['only_icon_1'] );

        return $instance;
    }

   /**
     * Prints the settings form.
     *
     * @since  1.0
     *
     * @access public
     * @param  array $instance
     */
     function form( $instance ){
        // Colors
        $poplink_color              = isset( $instance['poplink_color'] ) ? esc_attr( $instance['poplink_color'] ) : '';
        $poplink_hover_color        = isset( $instance['poplink_hover_color'] ) ? esc_attr( $instance['poplink_hover_color'] ) : '';
        $poplink_mobile_color       = isset( $instance['poplink_mobile_color'] ) ? esc_attr( $instance['poplink_mobile_color'] ) : '';
        $poplink_mobile_focus_color = isset( $instance['poplink_mobile_focus_color'] ) ? esc_attr( $instance['poplink_mobile_focus_color'] ) : '';
        $poplink_name_1             = isset( $instance['poplink_name_1'] ) ? esc_attr( $instance['poplink_name_1'] ) : '';
        $poplink_icon_1             = isset( $instance['poplink_icon_1'] ) ? esc_attr( $instance['poplink_icon_1'] ) : '';
        $pop_sc_1                   = isset( $instance['pop_sc_1'] ) ? esc_attr( $instance['pop_sc_1'] ) : '';
        $pop_type_1                 = isset( $instance['pop_type_1'] ) ? esc_attr( $instance['pop_type_1'] ) : 'nf-popup';
        $only_icon_1                = isset( $instance['only_icon_1'] ) ? esc_attr( $instance['only_icon_1'] ) : 'yes';
     ?>
    <h3><?php _e( 'Color: Large screens','pathrika' ); ?></h3>
    <p>
        <label for="<?php echo $this->get_field_id( 'poplink_color' ); ?>"><?php _e( 'Pop Link Color:' ); ?></label><br>
        <input type="text" name="<?php echo $this->get_field_name( 'poplink_color' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'poplink_color' ); ?>" value="<?php echo $poplink_color; ?>" data-default-color="" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'poplink_hover_color' ); ?>"><?php _e( 'Pop Link Hover Color:','pathrika' ); ?></label><br>
        <input type="text" name="<?php echo $this->get_field_name( 'poplink_hover_color' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'poplink_hover_color' ); ?>" value="<?php echo $poplink_hover_color; ?>" data-default-color="" />
    </p>
    <h3><?php _e( 'Color: Mobile & Small screens','pathrika' ); ?></h3>
    <p>
        <label for="<?php echo $this->get_field_id( 'poplink_mobile_color' ); ?>"><?php _e( 'Pop Link Mobile Color:' ); ?></label><br>
        <input type="text" name="<?php echo $this->get_field_name( 'poplink_color' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'poplink_mobile_color' ); ?>" value="<?php echo $poplink_mobile_color; ?>" data-default-color="" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'poplink_mobile_focus_color' ); ?>"><?php _e( 'Pop Link Mobile focus Color:','pathrika' ); ?></label><br>
        <input type="text" name="<?php echo $this->get_field_name( 'poplink_mobile_focus_color' ); ?>" class="color-picker" id="<?php echo $this->get_field_id( 'poplink_mobile_focus_color' ); ?>" value="<?php echo $poplink_mobile_focus_color; ?>" data-default-color="" />
    </p>

    <h3><?php _e( 'Pop 1 Configuration','pathrika' ); ?></h3> 
    <p>
      <label for="<?php echo $this->get_field_id( 'poplink_name_1' ); ?>">
        <?php _e( 'Pop Link Name', 'pathrika' ); ?>:
      </label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'poplink_name_1' ); ?>" name="<?php echo $this->get_field_name( 'poplink_name_1' ); ?>" value="<?php echo $poplink_name_1; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'poplink_icon_1' ); ?>">
        <?php _e( 'Pop Link Icon', 'pathrika' ); ?>:
      </label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'poplink_icon_1' ); ?>" name="<?php echo $this->get_field_name( 'poplink_icon_1' ); ?>" value="<?php echo $poplink_icon_1; ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'pop_sc_1' ); ?>">
        <?php _e( 'Shortcode to Pop', 'pathrika' ); ?>:
      </label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'pop_sc_1' ); ?>" name="<?php echo $this->get_field_name( 'pop_sc_1' ); ?>" value="<?php echo $pop_sc_1; ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'pop_type_1' ); ?>"><?php _e( 'Select Pop Type: ','pathrika' ); ?></label>
        <select id="<?php echo $this->get_field_id( 'pop_type_1' ); ?>" name="<?php echo $this->get_field_name( 'pop_type_1' ); ?>">
            <option value="nf-popover" <?php selected( $pop_type,'nf-popover' ); ?>><?php _e( 'Pop Over','pathrika' ); ?></option>
            <option value="nf-popup" <?php selected( $pop_type,'nf-popup' ); ?>><?php _e( 'Pop Up','pathrika' ); ?></option>
        </select>
    </p>
    <div class="boolean-icon">
         <p>
            <label for="<?php echo $this->get_field_id( 'only_icon_1' ); ?>"><?php _e( 'Only icon, hide link text: ', 'pathrika' ); ?></label>
            <select id="<?php echo $this->get_field_id( 'only_icon_1' ); ?>" name="<?php echo $this->get_field_name( 'only_icon_1' ); ?>">
                <option value="yes" <?php selected( $only_icon_1, 'yes' ); ?>><?php _e( 'Yes', 'pathrika' ); ?></option>
                <option value="no" <?php selected( $only_icon_1, 'no' ); ?>><?php _e( 'No', 'pathrika' ); ?></option>
            </select>
        </p>
    </div>
     <?php  
     }
 }
 
add_action(	'widgets_init',	function(){
	register_widget( 'Pathrika_Pop_Widget' );
	}
);
