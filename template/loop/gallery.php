<?php
global $wpdb, $post;
$thumbnails = get_post_meta( $post->ID, 'wp_poster_GP', true );
?>
    <article class="single-header is-large" style="background-image:url('<?php global $opt_themes; if($opt_themes['ex_themes_thumbnails_gpstore_active_']) { ?><?php echo $thumbnails; ?>=w64-rw<?php } else { ?><?php if (has_post_thumbnail()) { ?><?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'64', true); echo $image_url[0]; ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/assetss/img/lazy.png<?php } ?><?php } ?>');">
        <?php
        $post_id = get_the_ID();
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), '64' );
        $thumb_id = get_post_thumbnail_id( $id );
        if ( '' != $thumb_id ) {
            $thumb_url  = wp_get_attachment_image_src( $thumb_id, '64', true );
            $image      = $thumb_url[0];
        }   else {
            $image = get_template_directory_uri() . '/assetss/img/lazy.png';
        }
        $urlimages2 = $image;
        $img = file_get_contents(''.$urlimages2.'');
        $images = base64_encode($img);
        ?>
        <?php global $opt_themes; if($opt_themes['ex_themes_thumbnails_gpstore_active_']) { ?>
            <img alt="<?php echo get_the_title(); ?>" data-spai="1" class="lzl" src="<?php echo $thumbnails; ?>=w64-rw"  data-spai-upd="64"/>
        <?php } else { ?>
            <?php if (has_post_thumbnail()) { ?>
                <img alt="<?php echo get_the_title(); ?>" data-spai="1" class="lzl" data-src="<?php echo $url; ?>" src="data:image/gif;base64,<?php echo $images; ?>"   data-spai-upd="64"/>
            <?php } else { ?>
                <img alt="<?php echo get_the_title(); ?>" data-spai="1" class="lzl" src="<?php echo get_template_directory_uri(); ?>/assetss/img/lazy.png"  data-spai-upd="64"/>
            <?php } ?>
        <?php } ?>
        <h1 itemprop="name" ><?php echo get_the_title(); ?></h1>
        <div class="bg">        </div>
        <span itemprop="description" style='display:none'> <?php echo esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) ); ?> is the most famous version in the <?php echo esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) ); ?> series of publisher <?php echo esc_html( get_post_meta( $post->ID, 'wp_developers_GP', true ) ); ?></span>
    </article>
<?php if (get_post_meta( get_the_ID(), 'gallery_data', true )) { ?>
    <div class="gallery beauty-scroll mb-14" id="gallery-screenshots1">
        <?php
        if ( '' != get_post_meta( get_the_ID(), 'gallery_data', true ) ) { $gallery = get_post_meta( get_the_ID(), 'gallery_data', true ); }
        if ( isset( $gallery['image_id'] ) ) :
            for( $i = 0; $i < count( $gallery['image_id'] ); $i++ ) {
                if ( '' != $gallery['image_id'][$i] ) { ?>
                    <a href="<?php echo wp_get_attachment_image_url( $gallery['image_id'][$i], 'gallery_large' ); ?>" title="<?php echo esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) ); ?> poster <?php echo $i; ?>" alt="<?php echo esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) ); ?> poster <?php echo $i; ?>">
                        <img src="<?php echo wp_get_attachment_image_url( $gallery['image_id'][$i], 'gallery_large' ); ?>" title="<?php echo esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) ); ?> <?php echo esc_html( get_post_meta( $post->ID, 'wp_version_GP', true ) ); ?>  screenshots <?php echo $i; ?>" alt="<?php echo esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) ); ?> <?php echo esc_html( get_post_meta( $post->ID, 'wp_version_GP', true ) ); ?>  poster <?php echo $i; ?>" data-src="<?php echo wp_get_attachment_image_url( $gallery['image_id'][$i], 'gallery_large' ); ?>" >
                    </a>
                <?php } } endif; ?>
    </div>
<?php } else { ?>
    <?php ex_themes_gallery_images_gpstore_(); ?>
<?php } ?>