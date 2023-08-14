<?php 
global $wpdb, $post, $opt_themes, $wp_query; 
$image_id_alt					= get_post_thumbnail_id($post->ID); 
$image_idx						= get_post_thumbnail_id(); 
$fullx							= 'thumbnails-featured'; 
$full_alt						= 'thumbnails-featured-alt'; 
$image_urlx						= wp_get_attachment_image_src($image_idx, $full_alt, true); 
$imagesx						= $image_urlx[0]; 			 
$appname_on						= $opt_themes['title_app_name_active_'];  
$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt						= get_the_title();
?>
<div class="img"><img src="<?php echo $imagesx; ?>" alt="<?php the_title(); ?>"></div>
<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span class="truncate"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
<span class="recom-post-vers"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?><?php } ?></span>