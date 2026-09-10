$(document).ready(function() {
    $("#msg_login").click(function(){
    var uname = $('#guest_name').val();
    var mmsg = $('#guest_msg').val();
    var guest_email = $("#guest_email").val();
    var ud = $('#uid').val();
    var gift_id = $('#theme_gift_id').val();
    var guest_loc = $('#guest_loc').val();
    var theme_owner_id = $('#theme_owner_id').val();
    var glb_url = $('#glb_site_url').val();
    url=glb_url+"ajax_wish.php";
    var page_url = $('#glb_page_url').val();
    url=glb_url+"ajax_wish.php";
    var regexp=/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
    if(!uname.length){
        $('#guest_msg').removeClass('error-ind');
        $('#guest_name').addClass('error-ind');
        $('#guest_name').val("");
        $('#validateBlessing').addClass('ui-state-error');
        $('#validateBlessing').html("Please enter name.");
    } else if (!guest_email.length) {
        $('#guest_name').removeClass('error-ind');
        $('#guest_email').addClass('error-ind');
        $('#guest_email').val("");
        $('#validateBlessing').addClass('ui-state-error');
        $('#validateBlessing').html("Please enter email.");
    } else if ( !( regexp.test( guest_email ) ) ) {
        $('#guest_name').removeClass('error-ind');
        $('#guest_email').addClass('error-ind');
        $('#guest_email').val("");
        $('#validateBlessing').addClass('ui-state-error');
        $('#validateBlessing').html("Please enter valid email.");
    } else if(!mmsg.length) {
        $('#guest_name').removeClass('error-ind');
        $('#guest_email').removeClass('error-ind');
        //$("#alert-text").parent().css('display','block');
        $('#guest_msg').addClass('error-ind');
        $('#guest_msg').val("");
        $('#validateBlessing').addClass('ui-state-error');
        $('#validateBlessing').html("Please enter your blessing messages.");
    } else if(mmsg.length > 650) {
        $('#guest_name').removeClass('error-ind');
        $('#guest_email').removeClass('error-ind');
        //$("#alert-text").parent().css('display','block');
        $('#guest_msg').addClass('error-ind');
        $('#validateBlessing').addClass('ui-state-error');
        $('#validateBlessing').html("Your blessing messages should be lessthen 650 charactors.");
    } else {
        $.post(url,{ uid:ud,uname:uname,wmsg:mmsg,owner_id:theme_owner_id,guestemail:guest_email,giftid:gift_id,guestloc:guest_loc,chk_action:'wedmsgadd' } ,function(res) {
        if(!res) {
            $("#alert-text").parent().css('display','block');
            $("#alert-text").html("Sorry, please try again").fadeIn(3000);
            $("#alert-text").fadeOut(5000);
            $('#guest_name').val("");
            $('#guest_msg').val("");
            $('#guest_msg').removeClass('error-ind');
            $('#guest_name').removeClass('error-ind');
            return false;
            } else {
            window.location.href =page_url+"?status=2";
            }
        });
        }
    });
    $("#butt_clear").click(function(){
        $('#guest_name').val("");
        $('#guest_msg').val("");
        $('#guest_email').val("");
        $('#guest_loc').val("");
        return false;
    });
});