<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
// My custom comments output html
function better_comments( $comment, $args, $depth ) { ?>
	<li class="comments-tree-item" id="comments-tree-item-<?php comment_ID() ?>">
    <?php
    // Switch between different comment types
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
	<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', '5play' ); ?></span> <?php comment_author_link(); ?></div>
	<?php break; default : if ( 'div' != $args['style'] ) { ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<div id="comment-id-<?php comment_ID() ?>">
	<div class="comment ">
	<div class="comment-head">
	<div class="avatar-status"> 
	<i class="avatar fit-cover"><?php echo get_avatar( $comment, 32 ); ?></i>
	</div>
	<span class="name truncate"><a><?php $cID = $comment->comment_ID; printf( __( '%2$s', '5play' ), get_comment_author_url($cID), get_comment_author($cID), get_comment_link($cID), get_comment_date('',$cID) ); ?></a></span>
	<div class="comment-meta">
	<time class="date c-muted" datetime="<?php printf(  __( '%1$sT%2$s', '5play' ), get_comment_date(), get_comment_time() ); ?>"><?php printf(  __( '%1$s', '5play' ), get_comment_date(), get_comment_time() ); ?></time>
	</div> 
	</div> 
	<div class="comment-text"><div id="comm-id-<?php comment_ID() ?>"><?php comment_text(); ?></div></div> 
	<div class="comment-foot">
	<ul class="comment-tools">
	<li class="com__reply"> <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>  </li>
	</ul>
	</div>
	</div>
    <?php } ?>
        <?php if ( 'div' != $args['style'] ) { ?>
        <?php }
        break;
    endswitch; // End comment_type check.
}