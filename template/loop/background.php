<?php 
global $wpdb, $post, $opt_themes; 
$post_id				= get_the_ID();
$image_id				= get_post_thumbnail_id(); 
$image_url				= wp_get_attachment_image_src($image_id,'full', true); 
$random					= mt_rand(1, 3);
$thumbnails_bg 			= wp_get_attachment_image_src(get_post_meta( $post_id, 'background_images', true),'full');
$thumbnails_bg_alt		= get_post_meta( $post->ID, 'wp_images_GP', true ); 
?>
<div class="background" style="display:none;">
    <div class="bg-img-blur"><i class="fit-cover">
	<img src="<?php if ($thumbnails_bg) { echo $thumbnails_bg[0]; } else { if ($thumbnails_bg_alt) { echo $thumbnails_bg_alt[$random]; } else { echo $image_url[0]; } } ?>" alt="<?php the_title(); ?>" width="10" height="10"></i></div>
    <i class="bg-circle-green"></i>
    <i class="bg-clouds"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2550 700" width="2550" height="700"><path fill="#142636" d="M554,100h-4A50,50,0,0,1,550,0h4a50,50,0,0,1,0,100Zm25,600H50a50,50,0,0,1,0-100h78.08a50,50,0,1,0,.11-100H98a50,50,0,0,1,0-100H238a50,50,0,0,0,0-100H194a50,50,0,0,1,0-100h56a50,50,0,0,0,.3-100H238A50,50,0,0,1,238,0H430a50,50,0,0,1,0,100H413.55a50,50,0,1,0,.05,100H630a50,50,0,0,1,0,100H521.55a50,50,0,1,0,0,100H526a50,50,0,0,1,0,100H445.55a50,50,0,0,0,.08,100H579a50,50,0,0,1,0,100Z"></path><path fill="#142636" d="M2073,700a50,50,0,0,1,0-100h16.43a50,50,0,0,0,0-100H1901a50,50,0,0,1,0-100h216.42a50,50,0,0,0,0-100H2097a50,50,0,0,1-50-50h0a50,50,0,0,1,50-50h252a50,50,0,0,1,0,100h-28a50,50,0,0,0,0,100h24a50,50,0,0,1,0,100h-24a50,50,0,0,0,0,100h179a50,50,0,0,1,0,100Z"></path></svg></i>
</div>

