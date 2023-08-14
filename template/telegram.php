<?php 
global $opt_themes; 
$telegram_on	= $opt_themes['ex_themes_social_media_sidebar_active_'];
$url			= $opt_themes['telegram_url'];
if($telegram_on) { ?> 
<br>
<nav class="tele-join">
<a href="<?php echo $url; ?>" rel="nofollow" target="_blank" title="join our telegram"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z"></path></svg> Join our Telegram</a>
</nav>

<style>
.tele-join a{
    color: #fff;
    background: #1682FB;
    padding: 10px;
    font-size: 15px;
    border-radius: 25px;
    width: 40%;
    display: block;
    margin: 0 auto;
    margin-bottom: 10px;
	text-align:center;
}
.tele-join a svg{
	width: 1em;
    height: 1em;
    top: 3px;
    position: relative;
    fill: #fff ;
	stroke:none;
}
</style>
<?php }