<?php
/*-----------------------------------------------------------------------------------*/
/*  Home News Widget
/*-----------------------------------------------------------------------------------*/
class widget_news_homes_ extends WP_Widget { 

    public function __construct() {
        $widget_ops = array(
            'classname'   => 'news-home-widgets',
            'description' => __( EX_THEMES_NAMES_.' Display all post News on home pages.', EX_THEMES_NAMES_ ),
        );
        parent::__construct( 'news-home-widgets', __( '(5Play) News Homes Widget', EX_THEMES_NAMES_ ), $widget_ops );
    } 
	
    public function widget( $args, $instance ) {
		global $wpdb, $post, $opt_themes, $wp_query; 
        $widget_id					= $this->id_base . '-' . $this->number;
        $link_title					= ( ! empty( $instance['link_title'] ) ) ? esc_url( $instance['link_title'] ) : '';
		$colors_svg					= ( isset( $instance['color_svg'] ) ) ? esc_attr( $instance['color_svg'] ) : esc_attr( 's-blue' ); 
        $title						= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $readmores					= ( ! empty( $instance['readmores'] ) ) ?  $instance['readmores'] : '';
		$show_date       			= ( isset( $instance['show_date'] ) ) ? (bool) $instance['show_date'] : false;
		$show_view       			= ( isset( $instance['show_view'] ) ) ? (bool) $instance['show_view'] : false;
		$show_link       			= ( isset( $instance['show_link'] ) ) ? (bool) $instance['show_link'] : false;
		$desc_length				= ( ! empty( $instance['desc_length'] ) ) ? absint( $instance['desc_length'] ) : absint( 75 );
        $icons						= ( ! empty( $instance['icon'] ) ) ?  $instance['icon'] : '';
        $formatdate					= ( ! empty( $instance['formatdate'] ) ) ?  $instance['formatdate'] : '';
        $selengkapnya				= ( ! empty( $instance['selengkapnya'] ) ) ?  $instance['selengkapnya'] : '';
		?>
		<section class="wrp section section-news">		
		<?php	   
		if ( $title ) {
		if ( ! empty( $link_title ) ) { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__flash"></use></svg></i><?php echo $title; ?></h3>	
		<a class="btn s-green btn-all" href="<?php echo $link_title; ?>" aria-label="<?php echo $readmores; ?>">
		<span><?php echo $readmores; ?></span><svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg></a>
		</div>
		<?php } else { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__flash"></use></svg></i><?php echo $title; ?></h3>		 
		<a class="btn s-green btn-all" href="<?php echo esc_url( home_url( '/news' ) ); ?>" aria-label="<?php echo $readmores; ?>"><span><?php echo $readmores; ?></span><svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg></a>		 
		</div>
		<?php }
        } 

		$args = array(
				'posts_per_page'			=> 2,
				'post_type'					=> 'news',
				'no_found_rows'				=> true,
				'post_status'				=> 'publish', 
				'orderby'					=> $instance['orderby'],
				'update_post_term_cache'	=> false,
				'update_post_meta_cache'	=> false,
		);


		if( $instance['orderby'] == 'views' ){
			$args = array(
				'posts_per_page'		=> $instance['number_posts'],
				'post_type'				=> 'news',
				'order'					=> 'DESC',
				'orderby'				=> 'meta_value_num',
				'meta_key'				=> 'post_views_count',
				'ignore_sticky_posts'	=> true
			);
		}

		if( isset($instance['orderdate']) && $instance['orderdate'] != 'alltime' ){
				$year		= date('Y');
				$month		= absint( date('m') );
				$week		= absint( date('W') );
				
				$args['year']	= $year;

				if( $instance['orderdate'] == 'pastmonth' ){
					$args['monthnum'] = $month - 1;
				}
				if( $instance['orderdate'] == 'pastweek' ){
					$args['w'] = $week - 1;
				}
				if( $instance['orderdate'] == 'pastyear' ){
					unset( $args['year'] );
					$today = getdate();
					$args['date_query'] = array(
						array(
							'after' => $today[ 'month' ] . ' 1st, ' . ($today[ 'year' ] - 2)
						)
					);
				}
		}

		if( isset($instance['orderdate']) && $instance['orderdate'] == 'bydays' && isset($instance['days_amount']) ){
			$args['year'] = '';
			$days_amount = absint( $instance['days_amount'] ); 
			if( $days_amount > 0 ){
			$days_string = "-$days_amount days";
				$args['date_query'] = array(
					'after'		=> date('Y-m-d', strtotime( $days_string ) ),
					'inclusive'	=> true,
					'column'	=> 'post_date'
				);
			}
		}
		$rp = new WP_Query( apply_filters( 'moddroid_homes_widget__widget_posts_args', $args ) );
		?>
		
		<div class="entry-list list-c2">
		<?php
			while ( $rp->have_posts() ) :
			$rp->the_post(); ?>
			<div class="entry entry-news">
			<div class="item">
			<?php get_template_part('template/loop/loop.item.news'); ?>			
			<div class="cont">
				<div class="meta muted">
				<?php if ( $show_date ) { ?>
				<time class="meta-date" datetime="<?php echo get_the_time('c')?>"><?php echo get_the_time($formatdate)?></time>
				<?php } if ( $show_view ) { ?>
				<div class="meta-view"><svg width="24" height="24"><use xlink:href="#i__stats"></use></svg><?= ex_themes_get_post_view_(); ?></div>
				<?php } ?>
				</div>
				<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span><?php the_title(); ?></span></a></h2>
				<div class="description" ><?php echo get_excerpt($desc_length); ?></div>
				<?php if ( $show_link ) { ?>
				<div class="read-more"><a href="<?php the_permalink() ?>" aria-label="<?php echo $selengkapnya; ?>"><?php echo $selengkapnya; ?></a></div>
				<?php } ?>
			</div>
			</div>
			</div>   
			<?php
			endwhile;
			wp_reset_postdata();
		?>
		
		</div> 
		
		</section>
	<?php } 
	
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args(
            (array) $new_instance,
            array(
                'title'             => '',
                'readmores'			=> '',
                'icon'				=> '',
                'link_title'        => '',
                'color_svg'   		=> 's-blue', 
				'orderby'			=> 'date',
				'orderdate'			=> 'alltime',
				'days_amount'		=> 30,
				'show_date'         => false,
				'show_view'         => false,
				'show_link'         => false,
				'desc_length'		=> 75,
                'formatdate'        => '',
                'selengkapnya'		=> '',
            )
        );
		
        $instance['title']				= sanitize_text_field( $new_instance['title'] );
        $instance['readmores']			= sanitize_text_field( $new_instance['readmores'] );
        $instance['icon']				= sanitize_text_field( $new_instance['icon'] ); 
        $instance['link_title']			= esc_url( $new_instance['link_title'] );          
        $instance['color_svg']			= esc_attr( $new_instance['color_svg'] );
		$instance['orderby']			= $new_instance['orderby'];
		$instance['orderdate']			= $new_instance['orderdate'];
		$instance['days_amount']		= (int) $new_instance['days_amount'];
		$instance['show_date']			= (bool) $new_instance['show_date'];
		$instance['show_view']			= (bool) $new_instance['show_view'];
		$instance['show_link']			= (bool) $new_instance['show_link'];
		$instance['desc_length']		= absint( $new_instance['desc_length'] );
        $instance['formatdate']			= sanitize_text_field( $new_instance['formatdate'] );
        $instance['selengkapnya']		= sanitize_text_field( $new_instance['selengkapnya'] );
          
        return $instance;
    }
	
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'             => __( 'Last news', EX_THEMES_NAMES_ ),
                'readmores'			=> __( 'All news', EX_THEMES_NAMES_ ),
                'icon'    		    => 'apps',
                'link_title'        => home_url( '/news' ),
                'color_svg'   		=> 's-blue', 
				'orderby'			=> 'date',
				'orderdate'			=> 'alltime',
				'days_amount'		=> 30,
				'show_date'         => true,
				'show_view'         => true,
				'show_link'         => false,
				'desc_length'		=> 75,
                'formatdate'		=> 'F j, Y ',
                'selengkapnya'		=> 'Read more...',
            )
        );
		
        $title						= sanitize_text_field( $instance['title'] );
		$readmores					= sanitize_text_field( $instance['readmores'] );
		$icon						= sanitize_text_field( $instance['icon'] );
        $link_title					= esc_url( $instance['link_title'] );
		$colors_svg					= esc_attr( $instance['color_svg'] );
		$days_amount				= isset( $instance['days_amount'] ) ? absint( $instance['days_amount'] ) : 30; 
		$show_date					= (bool) $instance['show_date'];
		$show_view					= (bool) $instance['show_view'];
		$show_link					= (bool) $instance['show_link'];
		$desc_length				= absint( $instance['desc_length'] );
        $formatdate					= sanitize_text_field( $instance['formatdate'] );
        $selengkapnya				= sanitize_text_field( $instance['selengkapnya'] );
        ?>
		<p style="text-align: center;font-weight: bold;">News Homes Widget </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', EX_THEMES_NAMES_ ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'readmores' ) ); ?>"><?php esc_html_e( 'Title Button:', EX_THEMES_NAMES_ ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'readmores' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'readmores' ) ); ?>" type="text" value="<?php echo esc_attr( $readmores ); ?>" />
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>"><?php esc_html_e( 'Link Title & Button:', EX_THEMES_NAMES_ ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'link_title' ) ); ?>" type="url" value="<?php echo esc_attr( $link_title ); ?>" />  
        </p>
        <p>         
            <small><?php esc_html_e( 'Target url for title (example: '.home_url( '/' ).' ) , leave blank if you want using title without link.', EX_THEMES_NAMES_ ); ?></small>
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'color_svg' ) ); ?>"><?php esc_html_e( 'Color Svg Icons:', EX_THEMES_NAMES_ ); ?></label>
        </p>
        <p>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'color_svg', EX_THEMES_NAMES_ ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_svg' ) ); ?>">
			<option value="s-yellow" <?php selected( $instance['color_svg'], 's-yellow' ); ?>><?php esc_html_e( 'YELLOW', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-green" <?php selected( $instance['color_svg'], 's-green' ); ?>><?php esc_html_e( 'GREEN', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-purple" <?php selected( $instance['color_svg'], 's-purple' ); ?>><?php esc_html_e( 'PURPLE', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-red" <?php selected( $instance['color_svg'], 's-red' ); ?>><?php esc_html_e( 'RED', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-blue" <?php selected( $instance['color_svg'], 's-blue' ); ?>><?php esc_html_e( 'BLUE', EX_THEMES_NAMES_ ); ?></option>
            </select> 
        </p>
        <p>
            <small><?php esc_html_e( 'Select color svg icons.', EX_THEMES_NAMES_ ); ?></small>
        </p> 
		<hr />		
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_html( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'show_date' ) ); ?>" /><label for="<?php echo esc_html( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Show Post Dates?', EX_THEMES_NAMES_ ); ?></label>
		</p>
		<hr />	
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $show_view ); ?> id="<?php echo esc_html( $this->get_field_id( 'show_view' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'show_view' ) ); ?>" /><label for="<?php echo esc_html( $this->get_field_id( 'show_view' ) ); ?>"><?php esc_html_e( 'Show Post Views?', EX_THEMES_NAMES_ ); ?></label>
		</p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'formatdate' ) ); ?>"><?php esc_html_e( 'Format Date:', EX_THEMES_NAMES_ ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'formatdate' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'formatdate' ) ); ?>" type="text" value="<?php echo esc_attr( $formatdate ); ?>" />
        </p>
        <p>
            <small>Default is : <b>F j, Y </b> , <br> to know format dates, check here <br> https://wordpress.org/support/article/formatting-date-and-time/ </small>
        </p> 
		<hr />	
		<p>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'selengkapnya' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'selengkapnya' ) ); ?>" type="text" value="<?php echo esc_attr( $selengkapnya ); ?>" /><br>
			<input class="checkbox" type="checkbox" <?php checked( $show_link ); ?> id="<?php echo esc_html( $this->get_field_id( 'show_link' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'show_link' ) ); ?>" /><label for="<?php echo esc_html( $this->get_field_id( 'show_link' ) ); ?>"><?php esc_html_e( 'Show Read Mores?', EX_THEMES_NAMES_ ); ?></label>
		</p>
		<hr />
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'desc_length' ) ); ?>"><?php esc_html_e( 'Maximum length of description', EX_THEMES_NAMES_ ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'desc_length' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'desc_length' ) ); ?>" type="number" value="<?php echo esc_attr( $desc_length ); ?>" />
		</p>
		<hr />
		<p>
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo esc_html_x('Mode:', 'admin', THEMES_NAMES) ?> </label>
			<select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
			<option <?php if ($instance['orderby'] == 'date') echo 'selected="selected"'; ?> value="date"><?php echo esc_html_x('Recent Posts', 'admin', THEMES_NAMES); ?></option>
			<option <?php if ($instance['orderby'] == 'rand') echo 'selected="selected"'; ?> value="rand"><?php echo esc_html_x('Random Posts', 'admin', THEMES_NAMES); ?></option>
			<option <?php if ($instance['orderby'] == 'modified') echo 'selected="selected"'; ?> value="modified"><?php echo esc_html_x('Recent Modified Post', 'admin', THEMES_NAMES); ?></option>			 
			<option <?php if ($instance['orderby'] == 'views') echo 'selected="selected"'; ?> value="views"><?php echo esc_html_x('Post views', 'admin', THEMES_NAMES); ?></option>			 
			</select>
		</p>
		<hr />
		<div class="mdn-select-day">
		<p>
			<label for="<?php echo $this->get_field_id('orderdate'); ?>"><?php echo esc_html_x('Date:', 'admin', THEMES_NAMES) ?> </label>
				<select id="<?php echo $this->get_field_id('orderdate'); ?>" name="<?php echo $this->get_field_name('orderdate'); ?>">
				<option <?php if ($instance['orderdate'] == 'alltime') echo 'selected="selected"'; ?> value="alltime"><?php echo esc_html_x('All Time', 'admin', THEMES_NAMES); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastyear') echo 'selected="selected"'; ?> value="pastyear"><?php echo esc_html_x('Past Year', 'admin', THEMES_NAMES); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastmonth') echo 'selected="selected"'; ?> value="pastmonth"><?php echo esc_html_x('Past Month', 'admin', THEMES_NAMES); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastweek') echo 'selected="selected"'; ?> value="pastweek"><?php echo esc_html_x('Past Week', 'admin', THEMES_NAMES); ?></option>
				<option <?php if ($instance['orderdate'] == 'bydays') echo 'selected="selected"'; ?> value="bydays"><?php esc_html_e('Last "X" days', 'epcl_framework'); ?></option>
				</select>
		</p>
		<p class="mdn-days <?php echo $this->get_field_id('orderdate'); ?> <?php if ($instance['orderdate'] != 'bydays') echo 'hidden'; ?>">
			<label for="<?php echo $this->get_field_id('days_amount'); ?>"><?php esc_html_e( 'Number of last days to filter:', 'epcl_framework'); ?></label>
			<input id="<?php echo $this->get_field_id('days_amount'); ?>" name="<?php echo $this->get_field_name('days_amount'); ?>" type="text" value="<?php echo $days_amount; ?>" size="1" />
		</p>
		</div>
		<script>
			(function($){
			$(document).ready(function(){
				$('.mdn-select-day').each(function(){
					var container = $(this);
					container.find('select').on('change', function(){
						var value = $(this).val();
						if( value == 'bydays' ){
							container.find('.mdn-days').show();
						}else{
							container.find('.mdn-days').hide();
						}
					});
				});
			});
		})(jQuery);
		</script>
        
        <?php
    }    
}
add_action(
    'widgets_init',
    function() {
        register_widget( 'widget_news_homes_' );
    }
);
/*-----------------------------------------------------------------------------------*/
/*  Other widget
/*-----------------------------------------------------------------------------------*/  