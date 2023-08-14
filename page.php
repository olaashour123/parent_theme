<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
    <div class="wrp-min speedbar">
        <div class="speedbar-panel">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div>
    <div id="dle-content">
        <div class="wrp-min block-list">
            <div class="block static-page">
                <div class="b-cont">
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="text">
                        <?php
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php get_footer(); 