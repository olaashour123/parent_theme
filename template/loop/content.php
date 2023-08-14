		<?php
		global $wpdb, $post, $wp_query, $opt_themes;
		$whatnews_GP		= get_post_meta( $post->ID, 'wp_whatnews_GP', true );
		$judul				= get_post_meta( $post->ID, 'wp_title_GP',  true );
		$youtube			= get_post_meta( $post->ID, 'wp_youtube_GP', true );
		$modfeatures		= get_post_meta( $post->ID, 'wp_mods', true );  
		$modfeatures2		= get_post_meta( $post->ID, 'wp_mods2', true );
		?>
	<div class="block b-add-info">
    <div class="b-tabs" role="tablist">
        <a class="tab-item active" href="#app_description"><?php global $opt_themes; if($opt_themes['exthemes_content_Description']) { ?><?php echo $opt_themes['exthemes_content_Description']; ?><?php } ?></a>
		<?php global $wpdb, $post, $wp_query; if (get_post_meta( $post->ID, 'wp_whatnews_GP', true )) { ?>
		<a class="tab-item" href="#whatnews"><?php global $opt_themes; if($opt_themes['exthemes_content_Whats_News']) { ?><?php echo $opt_themes['exthemes_content_Whats_News']; ?><?php } ?></a>
		<?php } ?>
		<noscript>
		<?php if ($youtube) { ?>
		<a class="tab-item" href="#youtubes">Youtube</a>
		<?php } ?>
		<?php if ($modfeatures) { ?>
		<a class="tab-item" href="#modded"><?php echo $opt_themes['exthemes_content_Mod_info']; ?></a>
		<?php } ?>
		</noscript>
        <?php global $opt_themes; if($opt_themes['ex_themes_help_single_post_active_']) { ?>
		<a class="tab-item" href="#app_faq"><?php global $opt_themes; if($opt_themes['exthemes_content_Help']) { ?><?php echo $opt_themes['exthemes_content_Help']; ?><?php } ?></a>
		<?php } ?>
    </div>
    <div class="b-cont tab-content">
        <div class="tab-pane text" id="app_description" style="display: block;">
		<?php the_content(); ?>	
        </div>
		<?php if (get_post_meta( $post->ID, 'wp_whatnews_GP', true )) { ?>		
		<div class="tab-pane text" id="whatnews" >
		<?php echo $whatnews_GP; ?>
        </div>
		<?php } ?>
		<?php if ($youtube) { ?>		
		<div class="tab-pane text" id="youtubes" >		
		<iframe loading="lazy" title="<?php echo $judul; ?>" src="https://www.youtube.com/embed/<?php echo $youtube; ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" width="100%" height="350" frameborder="0"></iframe>
        </div>
		<?php } ?>
		<?php if($modfeatures) { ?>
        <div class="tab-pane" id="modded" >
        <?php echo $modfeatures; ?> 
		<?php if($modfeatures2) { ?>
		<div class="showH">		
			<details class="ac alt">
				<summary><?php echo $opt_themes['exthemes_content_Mod_info']; ?></summary>
				<div class="aC">
				<p><?php echo $modfeatures2; ?></p>
				</div>
			</details>
		</div>
		<?php } ?>  

        </div>
		<?php } ?>
		<?php if($opt_themes['ex_themes_help_single_post_active_']) { ?>
        <div class="tab-pane" id="app_faq" >
        <?php echo $opt_themes['ex_themes_help_single_post_']; ?>
        </div>
		<?php } ?>
    </div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js" ></script>
<script type="text/javascript">
    $(function () {
        var tabContainers = $('div.tab-content > div.tab-pane');
        $('.b-tabs a').click(function () {
            tabContainers.hide().filter(this.hash).show();
            $('.b-tabs a').parent().removeClass('active');
            $(this).parent().addClass('active');
            return false;
        }).filter(':first').click();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.b-tabs a').on('click', function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
 