$(document).ready(function(){
var glb_url;
    // Guest signup message - Start
    $("#Guest_Msg_Up").click(function(){
    var uname, guest_email, guest_loc, mmsg, ud, gift_id, theme_owner_id, regexp;
    uname = $('#guest_name').val();
    guest_email = $("#guest_email").val();
    guest_loc = $('#guest_loc').val();
    mmsg = $('#guest_msg').val();
    ud = $('#uid').val();
    gift_id = $('#theme_gift_id').val();
    glb_url = $('#glb_site_url').val();
    url=glb_url+"ajax_birthday.php";
    regexp=/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
    if(!uname.length){
        $('#guest_msg').removeClass('error-ind');
        $('#guest_name').addClass('error-ind');
        $('#guest_name').val("");
        $('#validateBlessing').addClass('ui-state-error');
        $('#validateBlessing').html("Please enter your name.");
    } else if (!guest_email.length) {
        $('#guest_name').removeClass('error-ind');
        $('#guest_email').addClass('error-ind');
        $('#guest_email').val("");
        $('#validateBlessing').addClass('ui-state-error');
        $('#validateBlessing').html("Please enter your email.");
    } else if ( !( regexp.test( guest_email ) ) ) {
        $('#guest_name').removeClass('error-ind');
        //$("#alert-text").parent().css('display','block');
        $('#guest_email').addClass('error-ind');
        $('#guest_email').val("");
        $('#validateBlessing').addClass('ui-state-error');
        $('#validateBlessing').html("Please enter your valid email.");
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
            $.post(url,{ uid:ud,uname:uname,wmsg:mmsg,owner_id:theme_owner_id,guestemail:guest_email,giftid:gift_id,guestloc:guest_loc,chk_action:'birthmsgadd' } ,function(res) {
                alert (res);
            });
    }
    });
    // Guest signup message - End
});