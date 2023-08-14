<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
    <div class="wrp-min speedbar">
        <div class="speedbar-panel">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div>
    
    <div class="page-head-cat">
        <div class="wrp-min">
            <div class="head-cat-title">
                <h1 class="title"><?php printf( __( '%s', THEMES_NAMES ), '' . single_cat_title( '', false ) . '' ); ?></h1>                
            </div>            
        </div> 
    </div>
    
    
    <div class="page-cat-bg">
        <div class="wrp page-cat-cont">
            <div class="entry-listpage list-c6">	 
			<?php ex_themes_adv_homes_(); ?>
                 
                    <?php $postcounter = 1; if (have_posts()) : ?>
                        <?php while (have_posts()) : $postcounter = $postcounter + 1; the_post(); $do_not_duplicate = $post->ID; $the_post_ids = get_the_ID(); ?>
                           <?php get_template_part('template/loop/loop.item.home'); ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                    <?php endif; ?>
                
			</div>
				<?php get_template_part('template/navy'); ?>
        </div>
    </div> 
<?php get_footer(); 