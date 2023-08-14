<?php
global $wpdb, $post, $opt_themes, $wp_query; 
$appname_on						= $opt_themes['title_app_name_active_'];  
$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt						= get_the_title();
$image_id_alt					= get_post_thumbnail_id($post->ID); 
$image_idx						= get_post_thumbnail_id(); 
$fullx							= 'thumbnails-homes'; 
$fullx_alt						= 'thumbnails-homes-alt'; 
$image_urlx						= wp_get_attachment_image_src($image_idx, $fullx_alt, true); 
$imagesx						= $image_urlx[0]; 
$labels							= get_post_meta( $post->ID, 'wp_newupdates', true ); 
$labelx							= strtolower(esc_html( get_post_meta( $post->ID, 'wp_newupdates', true ) )); 
?>
<style>.label-<?php echo $labels; ?>{color: var(--colorsvg)}.label-<?php echo $labels; ?>::before{box-shadow:0 .25rem .5rem 0 var(--rgbacolor)}</style>

<div class="entry entry-app">
	<div class="item">
	<?php if ($labels) { ?>
	<span class="label label-<?php echo $labelx; ?>"><?php echo $labels; ?></span><?php } else { ?><?php } ?>
		<figure class="img">
		<img src="<?php echo $imagesx; ?>" alt="<?php the_title(); ?>" >
		<?php if (get_post_meta( $post->ID, 'wp_mods', true )) { ?><span class="post__modpaid"><?php global $opt_themes; if($opt_themes['exthemes_mods_info']) { ?><?php echo $opt_themes['exthemes_mods_info']; ?><?php } ?></span>  <?php } else { ?><?php } ?>
        <?php if ( is_user_logged_in() ) { ?>
        <span class="post__edit"><a href="<?php echo get_edit_post_link(); ?>" title="Edit this post" aria-label="Edit this post" ><span class="dashicons dashicons-edit"></span></a></span>
        <?php } ?>         
		</figure>
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span>
		<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
		<?php
		$i = 0;
		foreach((get_the_category()) as $cat) {
		echo '<span class="genre truncate">' . $cat->cat_name . '</span>';
		if (++$i == 1) break;
		}
		?>
		<?php
		$requires = get_post_meta($post->ID, "wp_requires_GP", true);
		$requiresX = str_replace('and up', '', $requires);
		?>
		<ul class="entry-app-info">
		<li><svg width="24" height="24"><use xlink:href="#i__android"></use></svg>
		<span class="truncate"><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if ($requires) { ?><?php echo RTL_Nums($requires); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if ($requires) { ?><?php echo $requires; ?><?php } else { ?>4.5<?php } ?><?php } ?></span></li>
		<li><svg width="24" height="24"><use xlink:href="#i__vers"></use></svg>
		<span class="truncate"><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_version', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_version', true ) ); ?><?php } else { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_version_GP', true ) ); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_version', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_version', true ) ); ?><?php } else { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_version_GP', true ) ); ?><?php } ?><?php } ?></span></li>
		</ul>
	</div>
</div>
