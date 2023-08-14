






<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
 
	<div class="navigation">
		<span class="page_prev" title="Previous">
			<?php if(previous_posts_link( '<svg width="24" height="24"><use xlink:href="#i__arrowright"></use><use xlink:href="#i__arrowright"></use></svg><span class="sr-only">Previous</span>' )) { ?>		
			<?php previous_posts_link( '<svg width="24" height="24"><use xlink:href="#i__arrowright"></use><use xlink:href="#i__arrowright"></use></svg><span class="sr-only">Previous</span>' ); ?> 
			<?php } ?>
		</span>
		<div class="pages">
			<nav class="pages-list"><?php ex_themes_page_navy_(); ?></nav>
		</div>
		<span class="page_next" title="Next">
			<?php if(next_posts_link( '<svg width="24" height="24"><use xlink:href="#i__arrowleft"></use></svg><span class="sr-only">Next</span>'  )) { ?>	
             <?php next_posts_link( '<svg width="24" height="24"><use xlink:href="#i__arrowleft"></use></svg><span class="sr-only">Next</span>'  ); ?> 
			<?php } ?>
		</span>
	</div>
 
			
<?php } else { ?>
 
	<div class="navigation">
		<span class="page_prev" title="Previous">
			<?php if(previous_posts_link( '<svg width="24" height="24"><use xlink:href="#i__arrowleft"></use><use xlink:href="#i__arrowleft"></use></svg><span class="sr-only">Previous</span>' )) { ?>		
			<?php previous_posts_link( '<svg width="24" height="24"><use xlink:href="#i__arrowleft"></use><use xlink:href="#i__arrowleft"></use></svg><span class="sr-only">Previous</span>' ); ?> 
			<?php } ?>
		</span>
		<div class="pages">
			<nav class="pages-list"><?php ex_themes_page_navy_(); ?></nav>
		</div>
		<span class="page_next" title="Next">
			<?php if(next_posts_link( '<svg width="24" height="24"><use xlink:href="#i__arrowright"></use></svg><span class="sr-only">Next</span>'  )) { ?>	
             <?php next_posts_link( '<svg width="24" height="24"><use xlink:href="#i__arrowright"></use></svg><span class="sr-only">Next</span>'  ); ?> 
			<?php } ?>
		</span>
	</div>
 
<?php } ?>
			
 