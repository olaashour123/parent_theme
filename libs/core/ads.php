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
add_shortcode('ex_themes_adv_single_page_', 'ex_themes_adv_single_page_');
function ex_themes_adv_single_page_() { ?>
    <?php global $opt_themes; if($opt_themes['ex_themes_adv_single_page_active_']) { ?>
        <center><?php echo $opt_themes['ex_themes_adv_single_page_code_']; ?><div class="clearfix"></div></center>
    <?php } ?>
<?php }
add_shortcode('ex_themes_adv_single_page_2', 'ex_themes_adv_single_page_2');
function ex_themes_adv_single_page_2() { ?>
    <?php global $opt_themes; if($opt_themes['ex_themes_adv_single_page_active_2']) { ?>
        <center><?php echo $opt_themes['ex_themes_adv_single_page_code_2']; ?><div class="clearfix"></div></center>
    <?php } ?>
<?php }
add_shortcode('ex_themes_adv_download_page_', 'ex_themes_adv_download_page_');
function ex_themes_adv_download_page_() { ?>
    <?php global $opt_themes; if($opt_themes['ex_themes_adv_download_page_active_']) { ?>
        <center><?php echo $opt_themes['ex_themes_adv_download_page_code_']; ?><div class="clearfix"></div></center>
    <?php } ?>
<?php }
add_shortcode('ex_themes_adv_download_page_2', 'ex_themes_adv_download_page_2');
function ex_themes_adv_download_page_2() { ?>
    <?php global $opt_themes; if($opt_themes['ex_themes_adv_download_page_active_2']) { ?>
        <center><?php echo $opt_themes['ex_themes_adv_download_page_code_2']; ?><div class="clearfix"></div></center>
    <?php } ?>
<?php }
add_shortcode('ex_themes_adv_homes_', 'ex_themes_adv_homes_');
function ex_themes_adv_homes_() { ?>
    <?php global $opt_themes; if($opt_themes['ex_themes_adv_homes_active_']) { ?>
        <center><?php echo $opt_themes['ex_themes_adv_homes_code_']; ?><div class="clearfix"></div></center>
    <?php } ?>
<?php }
add_shortcode('ex_themes_adv_homes_2', 'ex_themes_adv_homes_2');
function ex_themes_adv_homes_2() { ?>
    <?php global $opt_themes; if($opt_themes['ex_themes_adv_homes_active_2']) { ?>
        <center><?php echo $opt_themes['ex_themes_adv_homes_code_2']; ?><div class="clearfix"></div></center>
    <?php } ?>
<?php }
