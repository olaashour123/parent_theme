<?php 
/*-----------------------------------------------------------------------------------*/
/*  Home Rekomended Widget
/*-----------------------------------------------------------------------------------*/
class rekomended_widget extends WP_Widget {
	function __construct(){
		$widget_ops = array('classname' => 'widget_posts', 'description' => __( EX_THEMES_NAMES_.' Display selected Featured from post ID&#8217;s') );
		parent::__construct('posts_widget', __(EX_THEMES_NAMES_. ' Featured Home by ID&#8217;s'), $widget_ops);
	}
	function widget( $args, $instance ){
		$cache = wp_cache_get( 'Posts_Widget', 'widget' );
		if( !is_array( $cache ) )
		$cache = array();
		if( ! isset( $args['widget_id'] ) )
		$args['widget_id'] = null;
		if( isset( $cache[$args['widget_id']] ) ){
			echo $cache[$args['widget_id']];
			return;
		}
		ob_start();
		extract( $args, EXTR_SKIP );
		ob_start();
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Important Posts' ) : $instance['title'], $instance, $this->id_base );
		$ids = empty( $instance['postids'] ) ? '' : $instance['postids'];
		$array_ids = array_map('intval', explode(',', $ids));
		echo $args['before_widget']; 
		if( $title ){
			if( ! empty( $link_title ) ){
				echo $args['before_title']; 
				echo '<a href="' . esc_url( $link_title ) . '" title="' . esc_html__( 'Permalink to: ', THEMES_NAMES ) . esc_html( $title ) . '">';
				echo $title; 
				echo '</a>';
				echo $args['after_title'];  
			} else{ ?>
			<h2 class="section-title"><i class="s-green c-icon"><svg width="24" height="24"><use xlink:href="#i__hot"></use></svg></i>
			<?php echo $title;  ?>
			</h2>
			<?php }
		}
		$ppp = count($array_ids);
		$pa = array(
			'post__in' => $array_ids,
			'posts_per_page' => $ppp,
			'ignore_sticky_posts' => 1
		);
		$widget_posts = new WP_Query( $pa );
		if( $widget_posts->have_posts() ) :	
		?>
		<div class="scroll-entry-list">
            <div class="entry-list recom-list list-c4">
		<?php while( $widget_posts->have_posts() ) : $widget_posts->the_post();		
		$count++;
		  		 
		global $wpdb, $post, $opt_themes, $wp_query; 
		$image_idX						= get_post_thumbnail_id($post->ID); 
		$image_id						= get_post_thumbnail_id(); 
		$full							= 'thumbnails-homes'; 
		$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
		$image_url_default				= $image_url[0];
		$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
		
		global $wpdb, $post, $opt_themes;
		$appname_on						= $opt_themes['title_app_name_active_'];  
		$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
		$title_alt						= get_the_title();
		?>
		<?php if ($count == 1) : ?>
		<div class="entry">
		<div class="item recom-post recom-blue">
		<div class="img"> 
		<img src="<?php echo $image_url_default; ?>" alt="<?php the_title(); ?>" >			 
		</div>
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span class="truncate"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
		<span class="recom-post-vers"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?><?php } ?></span>
		<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 596 300" width="596" height="300" style="min-width: 596px;"><circle fill="#37b3e5" cx="120" cy="172" r="120"></circle><circle fill="#c74425" style="opacity:0.5" cx="324" cy="120" r="120"></circle><circle fill="#fede4a" style="opacity:0.66" cx="476" cy="180" r="120"></circle></svg></i>
		</div>
		</div>
		<?php elseif ($count == 2) : ?>
		<div class="entry">
		<div class="item recom-post recom-green">
		<div class="img"> 
		<img src="<?php echo $image_url_default; ?>" alt="<?php the_title(); ?>" >			 
		</div>
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span class="truncate"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
		<span class="recom-post-vers"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?><?php } ?></span>
		<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 688 316" width="688" height="316" style="min-width: 688px;"><circle fill="#4ccb70" cx="320" cy="172" r="120"></circle><circle fill="#fede4a" style="opacity:0.66" cx="136" cy="148" r="136"></circle><circle fill="#4afec0" style="opacity:0.66" cx="530" cy="158" r="158"></circle></svg></i>
		</div>
		</div>
		<?php elseif ($count == 3) : ?>
		<div class="entry">
		<div class="item recom-post recom-purple">
		<div class="img"> 
		<img src="<?php echo $image_url_default; ?>" alt="<?php the_title(); ?>" >			 
		</div>
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span class="truncate"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
		<span class="recom-post-vers"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?><?php } ?></span>
		<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 680 333" width="680" height="333" style="min-width: 680px;"><circle fill="#784ccb" cx="312" cy="142.63" r="142.63"></circle><circle fill="#f7c76f" style="opacity:0.62" cx="111.36" cy="285.26" r="41.65"></circle><circle fill="#fe814a" style="opacity:0.66;" cx="136" cy="149.26" r="136"></circle><circle fill="#d693aa" style="opacity:0.66;" cx="522" cy="175" r="158"></circle></svg></i>
		</div>
		</div>
		<?php elseif ($count == 4) : ?>
		<div class="entry">
		<div class="item recom-post recom-yellow">
		<div class="img"> 
		<img src="<?php echo $image_url_default; ?>" alt="<?php the_title(); ?>" >			 
		</div>
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span class="truncate"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
		<span class="recom-post-vers"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?><?php } ?></span>
		<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 688 364" width="688" height="364" style="min-width: 688px;"><circle fill="#fede4a" cx="356" cy="200" r="140"></circle><circle fill="#cc6040" style="opacity:0.66;" cx="136" cy="228" r="136"></circle><circle fill="#ffb100" style="opacity:0.66;" cx="530" cy="158" r="158"></circle></svg></i>
		</div>
		</div>
		<?php else : ?>
		<?php endif; ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>	
		</div>
		</div>
		</div>
		<?php echo $args['after_widget'];
		wp_reset_postdata();
		endif;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'Posts_Widget', $cache, 'widget' );
	}
	function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['postids'] = strip_tags( $new_instance['postids'] );
		return $instance;
	}
	function form( $instance ){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Recommend', 'postids' => '') );
		$title = esc_attr( $instance['title'] );
		$ids = esc_attr( $instance['postids'] );
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('postids'); ?>"><?php _e( 'Post ID&#8217;s:' ); ?></label> <input type="text" value="<?php echo $ids; ?>" name="<?php echo $this->get_field_name('postids'); ?>" id="<?php echo $this->get_field_id('postids'); ?>" class="widefat" />
			<br />
			<small><?php _e( 'Post IDs, separated by commas. <br>Only Limit 4 Post' ); ?></small>
		</p>
		<?php
	}
} 
add_action( 'widgets_init', function(){
		register_widget( 'rekomended' );
});
	