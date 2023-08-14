<?php 

/*-----------------------------------------------------------------------------------*/
/*  Home Categories Widget
/*-----------------------------------------------------------------------------------*/
class widget_categorie_homes_ extends WP_Widget {
	
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'categorie-home-widgets',
            'description' => __( EX_THEMES_NAMES_.' Display Post by Selected Categorie Widget.', THEMES_NAMES  ),
        );
        parent::__construct( 'categorie-home-widgets', __( '(5Play) Categorie Widget', THEMES_NAMES  ), $widget_ops );
    }
    
    public function widget( $args, $instance ) {
        $widget_id				= $this->id_base . '-' . $this->number;
        $category_ids			= ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
        $number_posts			= ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );
        $link_title				= ( ! empty( $instance['link_title'] ) ) ? esc_url( $instance['link_title'] ) : '';
		$colors_svg				= ( isset( $instance['color_svg'] ) ) ? esc_attr( $instance['color_svg'] ) : esc_attr( 's-blue' );
        $title					= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $readmores				= ( ! empty( $instance['readmores'] ) ) ?  $instance['readmores'] : '';
        $icons					= ( ! empty( $instance['icon'] ) ) ?  $instance['icon'] : '';
        ?>
		<section class="wrp section">
		<?php
		if ( $title ) {
		if ( ! empty( $link_title ) ) { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__<?php echo $icons; ?>"></use></svg></i><?php echo $title; ?></h3>	
		<a class="btn s-green btn-all" href="<?php echo $link_title; ?>" aria-label="<?php echo $readmores; ?>">
		<span><?php echo $readmores; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		</div>
		<?php } else { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__<?php echo $icons; ?>"></use></svg></i><?php echo $title; ?></h3>
		</div>
		<?php }
        } 
        
		if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
		}
		
		$args = array(
				'posts_per_page'			=> $number_posts,
				'post_type'					=> 'post',
				'no_found_rows'				=> true,
				'post_status'				=> 'publish', 
				'orderby'					=> $instance['orderby'],
				'update_post_term_cache'	=> false,
				'update_post_meta_cache'	=> false,
		);

		if ( ! in_array( 0, $category_ids, true ) ) {
			$args['category__in'] = $category_ids;
		} 
			
		if( $instance['orderby'] == 'views' ){
			$args = array(
				'posts_per_page'	=> $instance['number_posts'],
				'post_type'			=> 'post',
				'order'				=> 'DESC',
				'orderby'			=> 'meta_value_num',
				'meta_key'			=> 'post_views_count',
				'ignore_sticky_posts' => true
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

        $rp = new WP_Query( apply_filters( 'widget_categorie_homes__widget_posts_args', $args ) );
        ?>
		<div class="entry-list list-c6">
		<?php
		while ( $rp->have_posts() ) : 
		$rp->the_post();
		get_template_part('template/loop/loop.item.home');
		endwhile;
		wp_reset_postdata();
		?>
		</div> 
		</section> 
        <?php 
    } 
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args(
            (array) $new_instance,
            array(
                'title'             => '',
                'readmores'			=> '',
                'icon'				=> '',
                'link_title'        => '',
                'category_ids'      => array( 0 ),
                'number_posts'      => 3, 
                'color_svg'   		=> 's-blue', 
				'orderby'			=> 'date',
				'orderdate'			=> 'alltime',
				'days_amount'		=> 30 
            )
        ); 
		
        $instance['title']				= sanitize_text_field( $new_instance['title'] );
        $instance['readmores']			= sanitize_text_field( $new_instance['readmores'] );
        $instance['icon']				= sanitize_text_field( $new_instance['icon'] ); 
        $instance['link_title']			= esc_url( $new_instance['link_title'] ); 
        $instance['category_ids']		= array_map( 'absint', $new_instance['category_ids'] ); 
        $instance['number_posts']		= absint( $new_instance['number_posts'] );
         
        $instance['color_svg']			= esc_attr( $new_instance['color_svg'] );
		$instance['orderby']			= $new_instance['orderby'];
		$instance['orderdate']			= $new_instance['orderdate'];
		$instance['days_amount']		= (int) $new_instance['days_amount'];
        
        if ( in_array( 0, $instance['category_ids'], true ) ) {
            $instance['category_ids'] = array( 0 );
        }
        return $instance;
    }
    
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'             => __( 'Popular Games', THEMES_NAMES  ),
                'readmores'			=> __( 'Get More....', THEMES_NAMES  ),
                'icon'    		    => 'apps',
                'link_title'        => home_url( '/categories' ),
                'category_ids'      => array( 0 ),
                'number_posts'      => 4,  
                'color_svg'   		=> 's-blue', 
				'orderby'			=> 'date',
				'orderdate'			=> 'alltime',
				'days_amount'		=> 30,
            )
        );
		
        $title				= sanitize_text_field( $instance['title'] );
		$readmores			= sanitize_text_field( $instance['readmores'] );
		$icon				= sanitize_text_field( $instance['icon'] );
        $link_title			= esc_url( $instance['link_title'] );
        $category_ids		= array_map( 'absint', $instance['category_ids'] );
        $number_posts		= absint( $instance['number_posts'] ); 
		$colors_svg			= esc_attr( $instance['color_svg'] ); 
		$days_amount		= isset( $instance['days_amount'] ) ? absint( $instance['days_amount'] ) : 30;
        
        $categories     = get_categories(
            array(
                'hide_empty'   => 0,
                'hierarchical' => 1,
            )
        );
        $number_of_cats = count( $categories );
        $number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
		
        $selection_category  = sprintf(
            '<select name="%s[]" id="%s" class="cat-select widefat" multiple size="%d">',
            $this->get_field_name( 'category_ids' ),
            $this->get_field_id( 'category_ids' ),
            $number_of_rows
        );
        $selection_category .= "\n";
		
        $cat_list = array();
        if ( 0 < $number_of_cats ) {
			
            while ( $categories ) {
				
                if ( 0 === $categories[0]->parent ) {
					
                    $current_entry = array_shift( $categories );
					
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => 0,
                    );
                    continue;
                }
                
                $parent_index = $this->get_cat_parent_index( $cat_list, $categories[0]->parent );
                if ( false === $parent_index ) {
                    $current_entry = array_shift( $categories );
                    $categories[] = $current_entry;
                    continue;
                }

                $depth = $cat_list[ $parent_index ]['depth'] + 1;
                $new_index = $parent_index + 1;
                foreach ( $cat_list as $entry ) {
                    if ( $depth <= $entry['depth'] ) {
                        $new_index = $new_index++;
                        continue;
                    }
					
                    $current_entry = array_shift( $categories );
                    $end_array  = array_splice( $cat_list, $new_index );
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => $depth,
                    );
                    $cat_list   = array_merge( $cat_list, $end_array );                   
                    break;
                }
            }
           
            $selected            = ( in_array( 0, $category_ids, true ) ) ? ' selected="selected"' : '';
            $selection_category .= "\t";
            $selection_category .= '<option value="0"' . $selected . '>' . __( 'All Categories', THEMES_NAMES  ) . '</option>';
            $selection_category .= "\n";
            foreach ( $cat_list as $category ) {
                $cat_name            = apply_filters( 'gmr_list_cats', $category['name'], $category );
                $pad                 = ( 0 < $category['depth'] ) ? str_repeat( '&ndash;&nbsp;', $category['depth'] ) : '';
                $selection_category .= "\t";
                $selection_category .= '<option value="' . $category['id'] . '"';
                $selection_category .= ( in_array( $category['id'], $category_ids, true ) ) ? ' selected="selected"' : '';
                $selection_category .= '>' . $pad . $cat_name . '</option>';
                $selection_category .= "\n";
            }
        }
        
        $selection_category .= "</select>\n";
        ?>
		<p style="text-align: center;font-weight: bold;">Post by Selected Categorie Widget </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', THEMES_NAMES  ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'readmores' ) ); ?>"><?php esc_html_e( 'Title Alt:', THEMES_NAMES  ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'readmores' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'readmores' ) ); ?>" type="text" value="<?php echo esc_attr( $readmores ); ?>" />
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>"><?php esc_html_e( 'Link Title:', THEMES_NAMES  ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'link_title' ) ); ?>" type="url" value="<?php echo esc_attr( $link_title ); ?>" />  
        </p>
        <p>         
            <small><?php esc_html_e( 'Target url for title (example: '.home_url( '/' ).' ) , leave blank if you want using title without link.', THEMES_NAMES  ); ?></small>
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'icon' ) ); ?>"><?php esc_html_e( 'Icons:', THEMES_NAMES  ); ?></label>
        </p>
        <p>
			<select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'icon', THEMES_NAMES  ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'icon' ) ); ?>">
				<option value="gamepad" <?php selected( $instance['icon'], 'gamepad' ); ?>><?php esc_html_e( 'Games', THEMES_NAMES  ); ?></option>
				<option value="apps" <?php selected( $instance['icon'], 'apps' ); ?>><?php esc_html_e( 'Apps', THEMES_NAMES  ); ?></option>
            </select> 
		 
		 </p>
            <p><small>Use <b style="color: blue;">Games</b> for Categories Games Icons </small></p>
			<p><small>Use <b style="color: blue;">Apps</b> for Categories Apps Icons </small></p>
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'color_svg' ) ); ?>"><?php esc_html_e( 'Color Svg Icons:', THEMES_NAMES  ); ?></label>
        </p>
        <p>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'color_svg', THEMES_NAMES  ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_svg' ) ); ?>">
			<option value="s-yellow" <?php selected( $instance['color_svg'], 's-yellow' ); ?>><?php esc_html_e( 'YELLOW', THEMES_NAMES  ); ?></option>
			<option value="s-green" <?php selected( $instance['color_svg'], 's-green' ); ?>><?php esc_html_e( 'GREEN', THEMES_NAMES  ); ?></option>
			<option value="s-purple" <?php selected( $instance['color_svg'], 's-purple' ); ?>><?php esc_html_e( 'PURPLE', THEMES_NAMES  ); ?></option>
			<option value="s-red" <?php selected( $instance['color_svg'], 's-red' ); ?>><?php esc_html_e( 'RED', THEMES_NAMES  ); ?></option>
			<option value="s-blue" <?php selected( $instance['color_svg'], 's-blue' ); ?>><?php esc_html_e( 'BLUE', THEMES_NAMES  ); ?></option>
            </select> 
        </p>
        <p>
            <small><?php esc_html_e( 'Select color svg icons.', THEMES_NAMES  ); ?></small>
        </p> 
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'category_ids' ) ); ?>"><?php esc_html_e( 'Selected categories', THEMES_NAMES  ); ?></label>
        </p>
        <p>
            <?php echo $selection_category; ?> 
        </p>
        <p>
            <small><?php esc_html_e( 'Click on the categories with pressed CTRL key to select multiple categories. If All Categories was selected then other selections will be ignored.', THEMES_NAMES  ); ?></small>
        </p>
		<hr />
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>"><?php esc_html_e( 'Number post', THEMES_NAMES  ); ?></label>
        </p>
        <p>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p>         
		<hr />
		<p>
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php echo esc_html_x('Mode:', 'admin', THEMES_NAMES ) ?> </label>
        </p>
        <p>
			<select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
			<option <?php if ($instance['orderby'] == 'date') echo 'selected="selected"'; ?> value="date"><?php echo esc_html_x('Recent Posts', 'admin', THEMES_NAMES ); ?></option>
			<option <?php if ($instance['orderby'] == 'rand') echo 'selected="selected"'; ?> value="rand"><?php echo esc_html_x('Random Posts', 'admin', THEMES_NAMES ); ?></option>
			<option <?php if ($instance['orderby'] == 'modified') echo 'selected="selected"'; ?> value="modified"><?php echo esc_html_x('Recent Modified Post', 'admin', THEMES_NAMES ); ?></option>			
			<option <?php if ($instance['orderby'] == 'views') echo 'selected="selected"'; ?> value="views"><?php echo esc_html_x('Post views', 'admin', THEMES_NAMES ); ?></option>			
			</select>
		</p>
		<hr />
		<div class="mdn-select-day">
		<p>
			<label for="<?php echo $this->get_field_id('orderdate'); ?>"><?php echo esc_html_x('Date:', 'admin', THEMES_NAMES ) ?> </label>
        </p>
        <p>
				<select id="<?php echo $this->get_field_id('orderdate'); ?>" name="<?php echo $this->get_field_name('orderdate'); ?>">
				<option <?php if ($instance['orderdate'] == 'alltime') echo 'selected="selected"'; ?> value="alltime"><?php echo esc_html_x('All Time', 'admin', THEMES_NAMES ); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastyear') echo 'selected="selected"'; ?> value="pastyear"><?php echo esc_html_x('Past Year', 'admin', THEMES_NAMES ); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastmonth') echo 'selected="selected"'; ?> value="pastmonth"><?php echo esc_html_x('Past Month', 'admin', THEMES_NAMES ); ?></option>
				<option <?php if ($instance['orderdate'] == 'pastweek') echo 'selected="selected"'; ?> value="pastweek"><?php echo esc_html_x('Past Week', 'admin', THEMES_NAMES ); ?></option>
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
    private function get_cat_parent_index( $arr, $id ) {
        $len = count( $arr );
        if ( 0 === $len ) {
            return false;
        }
        $id = absint( $id );
        for ( $i = 0; $i < $len; $i++ ) {
            if ( $id === $arr[ $i ]['id'] ) {
                return $i;
            }
        }
        return false;
    }	
} 
add_action(
    'widgets_init',
    function() {
        register_widget( 'widget_categorie_homes_' );
    }
);
/*-----------------------------------------------------------------------------------*/
/*  Other widget
/*-----------------------------------------------------------------------------------*/  