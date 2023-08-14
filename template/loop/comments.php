<?php
$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
if ( comments_open() ) {
    if ( $num_comments == 0 ) {
        $comments = __('');
    } elseif ( $num_comments > 1 ) {
        $comments = $num_comments . __('');
    } else {
        $comments = __('(1)');
    }
    $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
} else {
    $write_comments =  __('Comments are off for this post.');
}
?>
<?php
$num_comments1 = get_comments_number(); // get_comments_number returns only a numeric value
if ( comments_open() ) {
    if ( $num_comments1 == 0 ) {
        $comments1 = __(' ');
    } elseif ( $num_comments1 > 1 ) {
        $comments1 = $num_comments1 . __('');
    } else {
        $comments1 = __('1');
    }
    $write_comments1 = '<a href="' . get_comments_link() .'">'. $comments1.'</a>';
} else {
    $write_comments1 =  __('Comments are off for this post.');
}
?>
<div class="clearfix">
</div>
<div class="post-comment">
    <div class="block-title">
        <div class="atitle">
            <p>Comments <?php echo $comments; ?></p>
        </div>
    </div>
    <?php
    if ( get_comments_number() ) { ?>
        <h3 id="comments"> <?php echo $comments1; ?> responses to “<?php echo get_the_title(); ?>”</h3>
    <?php } ?>
  
    <?php
    // Display comments
    wp_list_comments( array(
        'callback' => 'better_comments'
    ) ); ?>
    <?php comment_form( $args, $postid ); ?>
</div>