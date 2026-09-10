$(document).ready(function()
{

$("#comments_save").click(function(){
var uname = $('#comm_name').val();
var mmsg = $('#comm_msg').val();
var ud = $('#uid').val();
var img_id = $('#img_id').val();

var glb_url = $('#glb_site_url').val();
url=glb_url+"ajax_wish.php";
 
if(!uname.length)
{
                //$("#alert-text").parent().css('display','block');
                $('#comm_msg').removeClass('error-ind');
                $('#comm_name').addClass('error-ind');
                $('#comm_name').val("");
}else if(!mmsg.length)
{
                $('#comm_name').removeClass('error-ind');
                //$("#alert-text").parent().css('display','block');
                $('#comm_msg').addClass('error-ind');                
                $('#comm_msg').val("");
}
else
{
$.post(url,{ uid:ud,uname:uname,wmsg:mmsg,imgid:img_id,chk_action:'wedcommadd' } ,function(res)
        {
		if(!res)
		{
		$("#alert-text").parent().css('display','block');
                $("#alert-text").html("Sorry, please try again").fadeIn(3000);
                $("#alert-text").fadeOut(5000);
                $('#comm_name').val("");
                $('#comm_msg').val("");
                $('#comm_msg').removeClass('error-ind');
                $('#comm_name').removeClass('error-ind');
		  }
		  else 
		  {             		$('#comm_msg').removeClass('error-ind');
                                $('#comm_name').removeClass('error-ind');
								$("#alert-text").parent().css('display','block');
                                $("#alert-text").html("Thank you very much for your valuable wishes...").fadeIn(3000);
                                $("#alert-text").fadeOut(5000);
                                $('#comm_name').val("");
                                $('#comm_msg').val("");
                                $('#listcomment').html(res);

                                // document.location.reload();
                                // 'secure.php';
			   
		  	
          }
				
        });
 
 
	}
 

		
	});


$('.datepicker').datepicker();
$("#comments_clear").click(function(){
	 $('#comm_name').val("");
	 $('#comm_msg').val("");
});

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
if(!uname.length)
{
                $('#guest_msg').removeClass('error-ind');
                $('#guest_name').addClass('error-ind');
                $('#guest_name').val("");
				$('#validateBlessing').addClass('ui-state-error');
				$('#validateBlessing').html("Please enter name.");
				
}else if(!guest_email.length)
{
                $('#guest_name').removeClass('error-ind');
                //$("#alert-text").parent().css('display','block');
                $('#guest_email').addClass('error-ind');                
                $('#guest_email').val("");
				$('#validateBlessing').addClass('ui-state-error');
				$('#validateBlessing').html("Please enter email.");
}
else if ( !( regexp.test( guest_email ) ) ) {
				$('#guest_name').removeClass('error-ind');
                //$("#alert-text").parent().css('display','block');
                $('#guest_email').addClass('error-ind');                
                $('#guest_email').val("");
				$('#validateBlessing').addClass('ui-state-error');
				$('#validateBlessing').html("Please enter valid email.");
}
else if(!mmsg.length)
{
                $('#guest_name').removeClass('error-ind');
				$('#guest_email').removeClass('error-ind');
                //$("#alert-text").parent().css('display','block');
                $('#guest_msg').addClass('error-ind');                
                $('#guest_msg').val("");
				$('#validateBlessing').addClass('ui-state-error');
				$('#validateBlessing').html("Please enter your blessing messages.");
}
else if(mmsg.length > 650)
{
                $('#guest_name').removeClass('error-ind');
				$('#guest_email').removeClass('error-ind');
                //$("#alert-text").parent().css('display','block');
                $('#guest_msg').addClass('error-ind');                                
				$('#validateBlessing').addClass('ui-state-error');
				$('#validateBlessing').html("Your blessing messages should be lessthen 650 charactors.");
}

else
{
$.post(url,{ uid:ud,uname:uname,wmsg:mmsg,owner_id:theme_owner_id,guestemail:guest_email,giftid:gift_id,guestloc:guest_loc,chk_action:'wedmsgadd' } ,function(res)
        { 
		if(!res)
		{
		$("#alert-text").parent().css('display','block');
                $("#alert-text").html("Sorry, please try again").fadeIn(3000);
                $("#alert-text").fadeOut(5000);
                $('#guest_name').val("");
                $('#guest_msg').val("");
                $('#guest_msg').removeClass('error-ind');
                $('#guest_name').removeClass('error-ind');
				return false;
		  }
		  else 
		  { 
				 
                // document.location.reload();
                // 'secure.php';
				
				window.location.href =page_url+"?status=2";
			   
		  	
          }
				
        });
 
 
	}
 

		
	});

 $('.left-nav a').click(function(ev) {

			$('.left-nav a.selected').removeClass('selected');
			$(this).addClass('selected');

		});
$("#butt_clear").click(function(){
									$('#guest_name').val("");
                                $('#guest_msg').val("");
								$('#guest_email').val("");
                                $('#guest_loc').val("");
									return false;
									});
 


  

	//$("#change_bg_color_on_mouse").mouseover(function(){
									$("#change_bg_color_on_mouse").css('border', 'solid 2px #ff9900');
									$(".admin_alert").css('display','block');
									//});

		//$("#change_bg_color_on_mouse_for_desc").mouseover(function(){
									$("#change_bg_color_on_mouse_for_desc").css('border', 'solid 2px #ff9900');
									$(".admin_alert_des").css('display','block');
									//});

	$("#change_head_yes").click(function(){
									var glb_url = $('#glb_site_url').val();
									var glb_theme_id = $('#glb_theme_id').val();	
									var suburl	= glb_url+'dboper.php?do=up89head&theme_id='+glb_theme_id+'&might=uph';
									//window.open(suburl,'mywindow','width=750,height=620,toolbar=no,scrollbars=yes');

									window.open(suburl,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=750,height=650,screenX=150,screenY=150,top=100,left=150')
									});

	
	$("#change_head_des_yes").click(function(){
									var glb_url = $('#glb_site_url').val();
									var glb_theme_id = $('#glb_theme_id').val();	
									var suburl	= glb_url+'dboper.php?do=up89des&theme_id='+glb_theme_id+'&might=uphdes';
									//window.open(suburl,'mywindow','width=750,height=620,toolbar=no,scrollbars=yes');

									window.open(suburl,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=750,height=650,screenX=150,screenY=150,top=100,left=150')
									});

	
	 

 
         });