<?php
global $wpdb, $post, $opt_themes, $wp_query; 
$image_id_alt					= get_post_thumbnail_id($post->ID); 
$image_idx						= get_post_thumbnail_id(); 
$fullx							= 'thumbnails-post'; 
$image_urlx						= wp_get_attachment_image_src($image_idx, $fullx, true); 
$imagex							= $image_urlx[0];
?>
<div class="view-app-img ">
	<figure class="img">
		<img src="<?php echo $imagex; ?>" alt="<?php the_title(); ?>" >
	</figure> 
</div>
