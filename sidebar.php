<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) : endif;  ?>
<?php global $opt_themes; if($opt_themes['aktif_categorie_sidebar_1']) { ?>
    <hr>
    <?php global $opt_themes; if($opt_themes['categorie_sidebar_1']) { ?>
        <?php echo $opt_themes['categorie_sidebar_1']; ?>
    <?php } ?>
<?php } else { ?><?php } ?>
<?php global $opt_themes; if($opt_themes['aktif_categorie_sidebar_2']) { ?>
    <hr>
    <?php global $opt_themes; if($opt_themes['categorie_sidebar_2']) { ?>
        <?php echo $opt_themes['categorie_sidebar_2']; ?>
    <?php } ?>
<?php } else { ?><?php } ?>