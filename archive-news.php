<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
global $wpdb, $post, $opt_themes, $wp_query;

?>
    <div class="wrp-min speedbar">
        <div class="speedbar-panel">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div>
    <div class="page-head-cat">
        <div class="wrp-min">
            <div class="head-cat-title">
              <h1 class="title"><?php echo $opt_themes['exthemes_All_news']; ?></h1> 
            </div>
        </div>
        <i class="bg-clouds"></i>
    </div>
    <div class="page-cat-bg">
        <div class="wrp-min page-cat-cont page-news">
			<?php ex_themes_adv_homes_(); ?>

                <?php
                global $wpdb, $post, $opt_themes, $wp_query;
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                query_posts( array(
                        'post_type' => 'news',
                        'paged' => $paged,
                        'post_status' => 'publish',
                        'orderby' => 'modified',
                        'order' => 'ASC'
                    )
                );
                
                if (have_posts()) : while (have_posts()) : the_post();                 
                global $wpdb, $post, $opt_themes, $wp_query; 
                $image_idXX						= get_post_thumbnail_id($post->ID); 
                $image_idx						= get_post_thumbnail_id(); 
                $fullx							= 'thumbnails-news-archives'; 
                $image_urlx						= wp_get_attachment_image_src($image_idx, $fullx, true); 
                $image_url_defaultx				= $image_urlx[0];
                ?>
                    <div class="entry entry-news">
                        <div class="item">
                            <div class="pic">
                                <figure class="fit-cover">
								<img src="<?php echo $image_url_defaultx; ?>" alt="<?php the_title(); ?>" >
                                </figure>
                            </div>
                            <div class="cont">
                                <div class="meta muted">
                                    <time class="meta-date" datetime="<?php echo get_the_time('F j, Y ')?>"><?php echo get_the_time('F j, Y ')?></time>
                                    <div class="meta-view"><svg width="24" height="24"><use xlink:href="#i__stats"></use></svg><?= ex_themes_get_post_view_(); ?></div>
                                </div>
                                <h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span><?php the_title(); ?></span></a></h2>
                                <div class="description" style="display: none;"><?php echo get_excerpt(75); ?></div>
                                <div class="read-more"><a href="<?php the_permalink() ?>"><?php echo $opt_themes['exthemes_Read_more']; ?></a></div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
			
		<?php get_template_part('template/navy'); ?>
 
        </div>
        <div class="background bg-style-1" style="display:none;">
            <i class="bg-circle-purple"></i>
            <i class="bg-circle-yellow bgc-1"></i>
            <i class="bg-circle-yellow bgc-2"></i>
            <i class="bg-circle-green"></i>
            <i class="bg-clouds"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2808 800" width="2808" height="800"><path class="cloud-c1" d="M2066,300h-2a50,50,0,0,0,0,100h2a50,50,0,0,0,0-100Zm459.27-100H2758a50,50,0,0,0,0-100H2577.58a50,50,0,0,1,0-100H2126.45a50,50,0,0,1-.06,100H1970a50,50,0,0,0,0,100h232.45a50,50,0,0,1-.08,100H2186a50,50,0,0,0,0,100h104.46a50,50,0,0,1,0,100H2282a50,50,0,0,0,0,100h428a50,50,0,0,0,0-100H2601.55a50,50,0,0,1-.3-100H2606a50,50,0,0,0,0-100h-80.45a50,50,0,1,1-.28-100Z"></path><path class="cloud-c2" d="M2142,324H1969.55a50,50,0,0,1,0-100H1998a50,50,0,0,0,0-100H1770a50,50,0,0,0,0,100h14.26a50,50,0,1,1,0,100H1718a50,50,0,0,0,0,100h424a50,50,0,0,0,0-100Zm132-200H2170a50,50,0,0,0,0,100h104a50,50,0,0,0,0-100Z"></path><path class="cloud-c1" d="M962,100H781.58a50,50,0,0,1,0-100H206.45a50,50,0,0,1-.06,100H50a50,50,0,0,0,0,100H282.45a50,50,0,0,1-.08,100H266a50,50,0,0,0,0,100H370.46a50,50,0,1,1,0,100H362a50,50,0,0,0,0,100h8.46a50,50,0,1,1,0,100h-24a50,50,0,0,0,0,100H590a50,50,0,0,0,0-100H509.55a50,50,0,1,1,.08-100H790a50,50,0,0,0,0-100H681.55a50,50,0,0,1-.3-100H686a50,50,0,0,0,0-100H605.55a50,50,0,1,1-.28-100H962a50,50,0,0,0,0-100Zm168,0h-28a50,50,0,0,0,0,100h28a50,50,0,0,0,0-100Z"></path><path class="cloud-c2" d="M1086,244H913.57a50,50,0,0,1,0-100H962a50,50,0,0,0,0-100H654a50,50,0,0,0,0,100h28a50,50,0,0,1,0,100H642a50,50,0,0,0,0,100h444a50,50,0,0,0,0-100Z"></path></svg></i>
        </div>
    </div>
<?php get_footer(); 