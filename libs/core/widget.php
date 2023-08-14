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

require EX_THEMES_DIR.'/libs/core/widget-intros.php';
require EX_THEMES_DIR.'/libs/core/widget-recomended.php';
require EX_THEMES_DIR.'/libs/core/widget-categorie.php';
require EX_THEMES_DIR.'/libs/core/widget-news.php';
require EX_THEMES_DIR.'/libs/core/widget-comments.php';

/*-----------------------------------------------------------------------------------*/
/*  Home Categories Widget
/*-----------------------------------------------------------------------------------*/
class widget_categorie_homes_modified_ extends WP_Widget {
    /**
     * Sets up a Most view Posts widget instance.
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'categorie-home-modified-widgets',
            'description' => __( EX_THEMES_NAMES_.' Home Categorie by Modified Widget.', THEMES_NAMES ),
        );
        parent::__construct( 'categorie-home-modified-widgets', __( EX_THEMES_NAMES_.' Categorie by Modified Widget', THEMES_NAMES ), $widget_ops );
    }
    /**
     * Outputs the content for most view widget.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for most view widget.
     */
    public function widget( $args, $instance ) {
        /* Base Id Widget */
        $widget_id = $this->id_base . '-' . $this->number;
        /* Category ID */
        $category_ids = ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
        /* Excerpt Length */
        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );
        /* Title Length */ 
        $layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        // Link Title.
        $link_title = ( ! empty( $instance['link_title'] ) ) ? esc_url( $instance['link_title'] ) : '';
        /* Popular by date */ 
		$colors_svg			= ( isset( $instance['color_svg'] ) ) ? esc_attr( $instance['color_svg'] ) : esc_attr( 's-blue' ); 
	 
         
        /* Title */
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $title2 = ( ! empty( $instance['title2'] ) ) ?  $instance['title2'] : '';
        $icons = ( ! empty( $instance['icon'] ) ) ?  $instance['icon'] : '';
		$layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        echo $args['before_widget'];  
		if ( $title ) {
		if ( ! empty( $link_title ) ) { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__<?php echo $icons; ?>"></use></svg></i>
		<?php echo $title; ?>
		</h3>	
		<a class="btn s-green btn-all" href="<?php echo $link_title; ?>" aria-label="<?php echo $title2; ?>">
		<span><?php echo $title2; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		</div>
		<?php } else { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__<?php echo $icons; ?>"></use></svg></i>
		<?php echo $title; ?>
		</h3>
		<noscript>		
		<a class="btn s-green btn-all" href="<?php echo $link_title; ?>">
		<span><?php echo $title2; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		</noscript>
		</div>
		<?php }
        } 
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        /* filter the arguments for the Most view widget: */
        /* standard params */
        $query_args = array(
            'posts_per_page'         => $number_posts,
            'no_found_rows'          => true,
            'post_status'            => 'publish',
			'orderby'				 => 'modified',
            /**
             * Make it fast withour update term cache and cache results
             * https://thomasgriffin.io/optimize-wordpress-queries/
             */
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
        );
        $query_args['ignore_sticky_posts'] = true;
         
        /* add categories param only if 'all categories' was not selected */
        if ( ! in_array( 0, $category_ids, true ) ) {
            $query_args['category__in'] = $category_ids;
        }
        /* exclude current displayed post */
        
        /* run the query: get the latest posts */
        $rp = new WP_Query( apply_filters( 'widget_categorie_homes__widget_posts_args', $query_args ) );
        if ( 'style_2' === $layout_style ) : ?>
        <?php elseif ( 'style_3' === $layout_style ) : ?>
        <?php elseif ( 'style_4' === $layout_style ) : ?>
        <?php else : ?>
		<div class="entry-list list-c6">
            <?php while ( $rp->have_posts() ) : $rp->the_post(); global $opt_themes,$wpdb, $post, $wp_query; ?>
             <?php get_template_part('template/loop/loop.item.home'); ?>
			<?php  endwhile; ?>
            <?php wp_reset_postdata(); ?>
		</div> 
        <?php
        endif;
        echo $args['after_widget'];  
    } 
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args(
            (array) $new_instance,
            array(
                'title'             => '',
                'title2'			=> '',
                'icon'				=> '',
                'link_title'        => '',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 3,  
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['title2'] = sanitize_text_field( $new_instance['title2'] );
        $instance['icon'] = sanitize_text_field( $new_instance['icon'] );
        // Link Title.
        $instance['link_title'] = esc_url( $new_instance['link_title'] );
        /* Category IDs */
        $instance['category_ids'] = array_map( 'absint', $new_instance['category_ids'] );
        /* Style */
        //$instance['layout_style'] = wp_strip_all_tags( $new_instance['layout_style'] );
        /* Number posts */
        $instance['number_posts'] = absint( $new_instance['number_posts'] );
        /* Title Length */ 
        $instance['color_svg'] = esc_attr( $new_instance['color_svg'] );
        /* Show element */ 
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $instance['category_ids'], true ) ) {
            $instance['category_ids'] = array( 0 );
        }
        return $instance;
    }
    /**
     * Outputs the settings form for the most view widget.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'             => __( 'Popular Games', THEMES_NAMES ),
                'title2'			=> __( 'Get More....', THEMES_NAMES ),
                'icon'    		    => 'apps',
                'link_title'        => 'https://yoursites.com/categories',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 4, 
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $title = sanitize_text_field( $instance['title'] );
		$title2 = sanitize_text_field( $instance['title2'] );
		$icon = sanitize_text_field( $instance['icon'] );
        // Link Title.
        $link_title = esc_url( $instance['link_title'] );
        /* Category ID */
        $category_ids = array_map( 'absint', $instance['category_ids'] );
        /* Style */
        //$layout_style = wp_strip_all_tags( $instance['layout_style'] );
        /* Number posts */
        $number_posts = absint( $instance['number_posts'] ); 
		$colors_svg			= esc_attr( $instance['color_svg'] ); 
        /* Show element */ 
        /* get categories */
        $categories     = get_categories(
            array(
                'hide_empty'   => 0,
                'hierarchical' => 1,
            )
        );
        $number_of_cats = count( $categories );
        /* get size (number of rows to display) of selection box: not more than 10 */
        $number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        /* start selection box */
        $selection_category  = sprintf(
            '<select name="%s[]" id="%s" class="cat-select widefat" multiple size="%d">',
            $this->get_field_name( 'category_ids' ),
            $this->get_field_id( 'category_ids' ),
            $number_of_rows
        );
        $selection_category .= "\n";
        /* make selection box entries */
        $cat_list = array();
        if ( 0 < $number_of_cats ) {
            /* make a hierarchical list of categories */
            while ( $categories ) {
                /* if there is no parent */
                if ( 0 === $categories[0]->parent ) {
                    /* get and remove it from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append the current entry to the new list */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => 0,
                    );
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent:
                 * try to find parent in new list and get its array index
                 */
                $parent_index = $this->get_cat_parent_index( $cat_list, $categories[0]->parent );
                /* if parent is not yet in the new list: try to find the parent later in the loop */
                if ( false === $parent_index ) {
                    /* get and remove current entry from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append it at the end of the categories list */
                    $categories[] = $current_entry;
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent and parent is in new list:
                 * set depth of current item: +1 of parent's depth
                 */
                $depth = $cat_list[ $parent_index ]['depth'] + 1;
                /* set new index as next to parent index */
                $new_index = $parent_index + 1;
                /* find the correct index where to insert the current item */
                foreach ( $cat_list as $entry ) {
                    /* if there are items with same or higher depth than current item */
                    if ( $depth <= $entry['depth'] ) {
                        /* increase new index */
                        $new_index = $new_index++;
                        /* go on looping in foreach() */
                        continue;
                    }
                    /**
                     * If the correct index is found:
                     * get current entry and remove it from the categories list
                     */
                    $current_entry = array_shift( $categories );
                    /* insert current item into the new list at correct index */
                    $end_array  = array_splice( $cat_list, $new_index ); /* $cat_list is changed, too */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => $depth,
                    );
                    $cat_list   = array_merge( $cat_list, $end_array );
                    /* quit foreach(), go on while-looping */
                    break;
                } /* End foreach( cat_list ) */
            } /* End while( categories ) */
            /* make HTML of selection box */
            $selected            = ( in_array( 0, $category_ids, true ) ) ? ' selected="selected"' : '';
            $selection_category .= "\t";
            $selection_category .= '<option value="0"' . $selected . '>' . __( 'All Categories', THEMES_NAMES ) . '</option>';
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
        /* close selection box */
        $selection_category .= "</select>\n";
        ?>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', THEMES_NAMES ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title2' ) ); ?>"><?php esc_html_e( 'Title Alt:', THEMES_NAMES ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title2' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title2' ) ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>"><?php esc_html_e( 'Link Title:', THEMES_NAMES ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'link_title' ) ); ?>" type="url" value="<?php echo esc_attr( $link_title ); ?>" />           
            <small><?php esc_html_e( 'Target url for title (example: https://yoursites.com/categories), leave blank if you want using title without link.', THEMES_NAMES ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'icon' ) ); ?>"><?php esc_html_e( 'Icons:', THEMES_NAMES ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'icon' ) ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />			
            <small>Use <b style="color: blue;">gamepad</b> for Categories Games Icons </small>
			<br />
            <small>Use <b style="color: blue;">apps</b> for Categories Apps Icons </small>
        </p>

        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'color_svg' ) ); ?>"><?php esc_html_e( 'Color Svg Icons:', THEMES_NAMES ); ?></label>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'color_svg', THEMES_NAMES ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_svg' ) ); ?>">
			<option value="s-yellow" <?php selected( $instance['color_svg'], 's-yellow' ); ?>><?php esc_html_e( 'YELLOW', THEMES_NAMES ); ?></option>
			<option value="s-green" <?php selected( $instance['color_svg'], 's-green' ); ?>><?php esc_html_e( 'GREEN', THEMES_NAMES ); ?></option>
			<option value="s-purple" <?php selected( $instance['color_svg'], 's-purple' ); ?>><?php esc_html_e( 'PURPLE', THEMES_NAMES ); ?></option>
			<option value="s-red" <?php selected( $instance['color_svg'], 's-red' ); ?>><?php esc_html_e( 'RED', THEMES_NAMES ); ?></option>
			<option value="s-blue" <?php selected( $instance['color_svg'], 's-blue' ); ?>><?php esc_html_e( 'BLUE', THEMES_NAMES ); ?></option>
            </select> 
            <small><?php esc_html_e( 'Select color svg icons.', THEMES_NAMES ); ?></small>
        </p> 
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'category_ids' ) ); ?>"><?php esc_html_e( 'Selected categories', THEMES_NAMES ); ?></label>
            <?php echo $selection_category; ?> 
            <small><?php esc_html_e( 'Click on the categories with pressed CTRL key to select multiple categories. If All Categories was selected then other selections will be ignored.', THEMES_NAMES ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>"><?php esc_html_e( 'Number post', THEMES_NAMES ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p>  
        <?php
    }
    /**
     * Return the array index of a given ID
     *
     * @since 1.0.0
     * @param array $arr Array.
     * @param int   $id Post ID.
     * @access private
     */
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
/* add_action(
    'widgets_init',
    function() {
        register_widget( 'widget_categorie_homes_modified_' );
    }
); */


