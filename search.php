<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
    <div class="wrp-min speedbar" style='display:none'>
        <div class="speedbar-panel">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div>
    <div class="page-head-cat darkmod">
        <div class="wrp-min">
            <div class="head-cat-title">
                <h1 class="title">Search results for: <?php echo get_search_query(); ?></h1>
            </div>
        </div>
        <i class="bg-clouds"></i>
    </div>
<?php if ( have_posts() ) : ?>
    <div class="page-cat-bg page-search-bg">
        <div class="wrp page-cat-cont">
            <div class="entry-listpage list-c6">
						<?php ex_themes_adv_homes_(); ?>

                <div id='dle-content'>
                    <?php $postcounter = 1; if (have_posts()) : ?>
                        <form name="fullsearch" id="fullsearch" action="<?php echo esc_url(home_url('/')); ?>" method="GET">
                            <div class="wrp-min">
                                <div class="search-box s-green">
                                    <div class="search-box-field">
                                        <input type="text" name="s" id="searchinput" value="" placeholder="Search for Apps &amp; Games" onchange="document.getElementById('result_from').value = 1">
                                        <button class="search-box-btn" type="submit" onclick="javascript:list_submit(-1); return false;"><svg width="24" height="24"><use xlink:href="#i__search"></use></svg></button>
                                    </div>
                                    <div class="search_result_num" >Found <?php echo $postcounter ?> responses (Query results <?php echo get_search_query(); ?>) :</div>
                                </div>
                            </div>
                        </form>
                        <?php while (have_posts()) : $postcounter = $postcounter + 1; the_post(); $do_not_duplicate = $post->ID; $the_post_ids = get_the_ID(); ?>
                           <?php get_template_part('template/loop/loop.item.home'); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
				 
            </div>
			<?php get_template_part('template/navy'); ?>
        </div>
    </div>
<?php else : ?>
    <div class="alert wrp-min">
        <div class="alert_in">
            <div class="alert-title">
                <i class="i__info"><svg width="24" height="24"><use xlink:href="#i__info"></use></svg></i>
                Error 404 - Page Not Found
            </div>
            <div class="alert-cont">
                It seems that page you are looking for no longer exists. Try to search again or explore more Android Games and Apps below!
            </div>
        </div>
    </div>
	 <?php ex_themes_adv_homes_(); ?>
<?php endif; ?>
<?php get_footer(); ?>