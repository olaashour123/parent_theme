<?php
global $wpdb, $post, $opt_themes, $wp_query; 
$image_id_alt					= get_post_thumbnail_id($post->ID); 
$image_idx						= get_post_thumbnail_id(); 
$fullx							= 'thumbnails-news-homes'; 
$image_urlx						= wp_get_attachment_image_src($image_idx, $fullx, true); 
$imagex							= $image_urlx[0];
?>

<div class="pic">
	<figure class="fit-cover">
		<img src="<?php echo $imagex; ?>" alt="<?php the_title(); ?>" >		
        <?php if ( is_user_logged_in() ) { ?>
        <span class="post__edit"><a href="<?php echo get_edit_post_link(); ?>" title="Edit this post" aria-label="Edit this post" ><span class="dashicons dashicons-edit"></span></a></span>
        <?php } ?>   
	</figure>
</div>
