
<script>
var scrollBottom=$(window).scrollTop()+$(window).height(),pt=(pt=$("#play_fixed_bottom").offset().top)-35;$(window).scroll((function(e){$(this).scrollBottom()>pt?($("#play_fixed_bottom").addClass("play_fixed_bottom"),$("#play_fixed_bottom").css({"margin-bottom":"75px"})):($("#play_fixed_bottom").removeClass("play_fixed_bottom"),$("#play_fixed_bottom").css({"margin-bottom":"10px"}))}));pt=(pt=$("#play_fixed").offset().top)-35;function selectone(e){if($("#id"+e).is(":checked"))$("#id"+e).prop("checked",!1),$("#div"+e).removeClass("play_chosed"),$("#selectAll").removeClass("button-primary"),$("#selectAll").addClass("button"),$("#selectAll").html("Select All");else{$("#id"+e).prop("checked",!0),$("#div"+e).addClass("play_chosed");var l=0;$(".checkSingle").each((function(){this.checked||(l=1)})),0==l&&($("#selectAll").removeClass("button"),$("#selectAll").addClass("button-primary"),$("#selectAll").html("Deselect All"))}}function close_pop(e){return $("#play_notif").removeClass("play_warning"),$("#play_notif").removeClass("play_success"),$("#play_notif").removeClass("play_error"),$(".play_overlay").hide(),$("#"+e).hide(),!1}$(window).scroll((function(e){$(this).scrollTop()>pt?($("#play_fixed").addClass("play_fixed"),$("#play_menu1").css({"margin-bottom":"75px"})):($("#play_fixed").removeClass("play_fixed"),$("#play_menu1").css({"margin-bottom":"10px"}))})),$(document).ready((function(){$(".play_listss").click((function(){var e=$(this).attr("id"),l=$("#id"+e).is(":checked");if(alert(e),l)$("#id"+e).prop("checked",!1),$(this).removeClass("play_chosed"),$("#selectAll").removeClass("button-primary"),$("#selectAll").addClass("button"),$("#selectAll").html("Select All");else{$("#id"+e).prop("checked",!0),$(this).addClass("play_chosed");var t=0;$(".checkSingle").each((function(){this.checked||(t=1)})),0==t&&($("#selectAll").removeClass("button"),$("#selectAll").addClass("button-primary"),$("#selectAll").html("Deselect All"))}})),$("#selectAll").click((function(){"button"==$(this).attr("class")?($(this).removeClass("button"),$(this).addClass("button-primary"),$(this).html("Deselect All"),$(".checkSingle").each((function(e){this.checked=!0,$("div#div"+e).addClass("play_chosed")}))):($(this).removeClass("button-primary"),$(this).addClass("button"),$(this).html("Select All"),$(".checkSingle").each((function(e){this.checked=!1,$("div#div"+e).removeClass("play_chosed")})))})),$(".checkSingle").click((function(){if($(this).is(":checked")){var e=0;$(".checkSingle").each((function(){this.checked||(e=1)})),0==e&&($("#selectAll").removeClass("button"),$("#selectAll").addClass("button-primary"),$("#selectAll").html("Deselect All"))}else $("#selectAll").removeClass("button-primary"),$("#selectAll").addClass("button"),$("#selectAll").html("Select All")})),$("#getID").click((function(){$(".checkSingle").each((function(e){if(0==e&&$("#play_textID").html(""),this.checked){var l=$("#id"+e).attr("value");$("#play_textID").append(l+"\n")}})),$(".play_overlay").show(),$("#play_getID").show()})),$("#toCampaign").click((function(){$(".checkSingle").each((function(e){if(0==e&&$("#play_textID").html(""),this.checked){var l=$("#id"+e).attr("value");$("#play_textID").append(l+"\n")}})),$(".play_overlay").show(),$("#play_toCampaign").show()})),$("#Publish").click((function(){$(".checkSingle").each((function(e){if(0==e&&$("#play_textID").html(""),this.checked){var l=$("#id"+e).attr("value");$("#play_textID").append(l+"\n")}})),$(".play_overlay").show(),$("#play_Publish").show()}))}));
</script>