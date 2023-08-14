<?php 
/*-----------------------------------------------------------------------------------*/
/*  Recommend Widget
/*-----------------------------------------------------------------------------------*/
class recommend_widget extends WP_Widget {
	function __construct(){
		$widget_ops = array(
				'classname'		=> 'widget_posts', 
				'description'	=> __( EX_THEMES_NAMES_.' Display Selected Featured From Post ID&#8217;s')
				);
		parent::__construct('posts_widget', __( '(5Play) Featured Home'), $widget_ops);
	}
	
	function widget( $args, $instance ){
		$cache					= wp_cache_get( 'Posts_Widget', 'widget' );
		if( !is_array( $cache ) )
		$cache					= array();
		if( ! isset( $args['widget_id'] ) )
		$args['widget_id']		= null;
		if( isset( $cache[$args['widget_id']] ) ){
			echo $cache[$args['widget_id']];
			return;
		}
		ob_start();
		extract( $args, EXTR_SKIP );
		ob_start();
		extract( $args );
		$title				= apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Important Posts' ) : $instance['title'], $instance, $this->id_base );
		$ids				= empty( $instance['postids'] ) ? '' : $instance['postids'];
		$array_ids			= array_map('intval', explode(',', $ids));
		echo $args['before_widget']; 
		if( $title ){ ?>
		
		<h2 class="section-title"><i class="s-green c-icon"><svg width="24" height="24"><use xlink:href="#i__hot"></use></svg></i><?php echo $title; ?></h2>	
		
		<?php }		 
		$ppp			= count($array_ids);
		$pa				= array(
				'post__in'				=> $array_ids,
				'posts_per_page'		=> $ppp,
				'ignore_sticky_posts'	=> 1
		);
		$recom_postx	= new WP_Query( $pa );
		if( $recom_postx->have_posts() ) :	
		
		?>
		<div class="scroll-entry-list">
            <div class="entry-list recom-list list-c4">
				<?php
				$count			= 0;
				while( $recom_postx->have_posts() ) :
				$recom_postx->the_post();			
				$count++;				
				if ($count == 1) { ?>
				<div class="entry">
				<div class="item recom-post recom-blue">
				<?php get_template_part('template/loop/loop.featured'); ?>
				<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 596 300" width="596" height="300" style="min-width: 596px;"><circle fill="#37b3e5" cx="120" cy="172" r="120"></circle><circle fill="#c74425" style="opacity:0.5" cx="324" cy="120" r="120"></circle><circle fill="#fede4a" style="opacity:0.66" cx="476" cy="180" r="120"></circle></svg></i>
				</div>
				</div>
				<?php } elseif ($count == 2) { ?>
				<div class="entry">
				<div class="item recom-post recom-green">
				<?php get_template_part('template/loop/loop.featured'); ?>
				<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 688 316" width="688" height="316" style="min-width: 688px;"><circle fill="#4ccb70" cx="320" cy="172" r="120"></circle><circle fill="#fede4a" style="opacity:0.66" cx="136" cy="148" r="136"></circle><circle fill="#4afec0" style="opacity:0.66" cx="530" cy="158" r="158"></circle></svg></i>
				</div>
				</div>
				<?php } elseif ($count == 3) { ?>
				<div class="entry">
				<div class="item recom-post recom-purple">
				<?php get_template_part('template/loop/loop.featured'); ?>
				<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 680 333" width="680" height="333" style="min-width: 680px;"><circle fill="#784ccb" cx="312" cy="142.63" r="142.63"></circle><circle fill="#f7c76f" style="opacity:0.62" cx="111.36" cy="285.26" r="41.65"></circle><circle fill="#fe814a" style="opacity:0.66;" cx="136" cy="149.26" r="136"></circle><circle fill="#d693aa" style="opacity:0.66;" cx="522" cy="175" r="158"></circle></svg></i>
				</div>
				</div>
				<?php } elseif ($count == 4) { ?>
				<div class="entry">
				<div class="item recom-post recom-yellow">
				<?php get_template_part('template/loop/loop.featured'); ?>
				<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 688 364" width="688" height="364" style="min-width: 688px;"><circle fill="#fede4a" cx="356" cy="200" r="140"></circle><circle fill="#cc6040" style="opacity:0.66;" cx="136" cy="228" r="136"></circle><circle fill="#ffb100" style="opacity:0.66;" cx="530" cy="158" r="158"></circle></svg></i>
				</div>
				</div>
				<?php }
				endwhile;
				wp_reset_postdata();
				?>	
			</div>
		</div> 
		<?php 
		echo $args['after_widget'];
		//wp_reset_postdata();
		endif;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'Posts_Widget', $cache, 'widget' );
	}
	
	function update( $new_instance, $old_instance ){
		$instance				= $old_instance;
		$instance['title']		= strip_tags($new_instance['title']);
		$instance['postids']	= strip_tags( $new_instance['postids'] );
		return $instance;
	}
	
	function form( $instance ){
		$instance				= wp_parse_args( (array) 
				$instance, array( 
						'title'			=> 'Recommend', 
						'postids'		=> ''
						) );
		$title					= esc_attr( $instance['title'] );
		$ids					= esc_attr( $instance['postids'] );
		?>
		<p style="text-align: center;font-weight: bold;">Recommend Widgets </p>
		<hr />
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<hr />
		<p>
		<label for="<?php echo $this->get_field_id('postids'); ?>"><?php _e( 'Post ID&#8217;s:' ); ?></label>
		<input type="text" value="<?php echo $ids; ?>" name="<?php echo $this->get_field_name('postids'); ?>" id="<?php echo $this->get_field_id('postids'); ?>" class="widefat" />
		<br />
		<pre><?php _e( 'Post IDs, Separated by Commas. <br>Only Limit 4 Post' ); ?></pre>
		</p>
		<hr />
		<?php
	}
} 
add_action( 'widgets_init', function(){
		register_widget( 'recommend_widget' );
});
/*-----------------------------------------------------------------------------------*/
/*  Other widget
/*-----------------------------------------------------------------------------------*/  