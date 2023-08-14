<?php
/*-----------------------------------------------------------------------------------*/
/*  Home Comments Widget
/*-----------------------------------------------------------------------------------*/
class widget_comments_homes_ extends WP_Widget { 
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'comments-home-widgets',
            'description' => __( EX_THEMES_NAMES_.' Showing All Comments on Home pages.', THEMES_NAMES ),
        );
        parent::__construct( 'comments-home-widgets', __( '(5Play) Comments Home Widget', THEMES_NAMES ), $widget_ops );
    } 
    public function widget( $args, $instance ) {
        $widget_id = $this->id_base . '-' . $this->number;       
		$colors_svg			= ( isset( $instance['color_svg'] ) ) ? esc_attr( $instance['color_svg'] ) : esc_attr( 's-blue' );
        $title				= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        ?>
		<section class="wrp section section-comments">
		<?php if ( $title ) { ?>
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__coms"></use></svg></i><?php echo $title; ?></h3>	 
		<?php } ?>
		
		<div class="scroll-entry-list">
            <div class="entry-list list-c3">
                <?php bg_recent_comments(); ?>
            </div>
        </div>
		
		</section>
		
	<?php } 
	
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args(
            (array) $new_instance,
            array(
                'title'             => '',
                'color_svg'   		=> 's-blue', 
            )
        );
        $instance['title']			= sanitize_text_field( $new_instance['title'] ); 
        $instance['color_svg']		= esc_attr( $new_instance['color_svg'] );
          
        return $instance;
    }

    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'             => __( 'Latest comments ', THEMES_NAMES ), 
                'color_svg'   		=> 's-blue', 
            )
        );
        $title				= sanitize_text_field( $instance['title'] ); 
		$colors_svg			= esc_attr( $instance['color_svg'] ); 
         
        ?>
		<p style="text-align: center;font-weight: bold;">Home Comments Widget </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', THEMES_NAMES ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'color_svg' ) ); ?>"><?php esc_html_e( 'Color Svg Icons:', THEMES_NAMES ); ?></label>
        </p>
        <p>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'color_svg', THEMES_NAMES ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_svg' ) ); ?>">
			<option value="s-yellow" <?php selected( $instance['color_svg'], 's-yellow' ); ?>><?php esc_html_e( 'YELLOW', THEMES_NAMES ); ?></option>
			<option value="s-green" <?php selected( $instance['color_svg'], 's-green' ); ?>><?php esc_html_e( 'GREEN', THEMES_NAMES ); ?></option>
			<option value="s-purple" <?php selected( $instance['color_svg'], 's-purple' ); ?>><?php esc_html_e( 'PURPLE', THEMES_NAMES ); ?></option>
			<option value="s-red" <?php selected( $instance['color_svg'], 's-red' ); ?>><?php esc_html_e( 'RED', THEMES_NAMES ); ?></option>
			<option value="s-blue" <?php selected( $instance['color_svg'], 's-blue' ); ?>><?php esc_html_e( 'BLUE', THEMES_NAMES ); ?></option>
            </select> 
        </p>
        <p>
            <small><?php esc_html_e( 'Select color svg icons.', THEMES_NAMES ); ?></small>
        </p> 
        <?php
    } 
     
}
add_action(
    'widgets_init',
    function() {
        register_widget( 'widget_comments_homes_' );
    }
);

