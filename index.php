<?php 
global $opt_themes;  
$latest_post_on		= $opt_themes['latest_post_homes'];
$latest_post_title	= $opt_themes['exthemes_latest_post_index'];
get_header();

if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('intros-homes') ) : endif; 
if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('recommend-homes') ) : endif; 
if($latest_post_on) { ?>
<section class="wrp section">
		<div class="section-head">
			<h3 class="section-title"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__apps"/></svg></i><?php if($latest_post_title) { ?><?php echo $latest_post_title; ?><?php } ?></h3>
		</div>
		<?php $postcounter = 1; if(have_posts()) : ?>
		<div class="entry-list list-c6">
		<?php 
		while(have_posts()) : 
		$postcounter		= $postcounter + 1; 
		the_post(); 
		$do_not_duplicate	= $post->ID; 
		$the_post_ids		= get_the_ID(); 
		get_template_part('template/loop/loop.item.home'); 
		endwhile;  
		else : ?>
		<p style="text-align:center;padding:10px;">Ready to publish your first post? <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>">Get started here</a></p>
		</div>
		<?php endif; 
		get_template_part('template/navy');
		?>
	</section>
	<?php } 
	ex_themes_adv_homes_();  
	if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('home-popular') ) : endif; 
	ex_themes_adv_homes_2();
	?>
	<div style="clear:both;margin-bottom: 20px;"></div>
<?php 
get_footer();  