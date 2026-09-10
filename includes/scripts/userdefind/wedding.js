$(document).ready(function()
{

$("#msg_login").click(function(){

						
var uname = $('#guest_name').val();
var mmsg = $('#guest_msg').val();
var ud = $('#uid').val();

var glb_url = $('#glb_site_url').val();
url=glb_url+"ajax_wish.php";
 
if(!uname.length)
{
                //$("#alert-text").parent().css('display','block');
                $('#guest_msg').removeClass('ui-state-error');
                $('#guest_name').addClass('ui-state-error');
                $('#guest_name').val("");return false;
}else if(!mmsg.length)
{
                $('#guest_name').removeClass('ui-state-error');
                //$("#alert-text").parent().css('display','block');
                $('#guest_msg').addClass('ui-state-error');                
                $('#guest_msg').val("");
}
else
{
$.post(url,{ uid:ud,uname:uname,wmsg:mmsg,chk_action:'wedmsgadd' } ,function(res)
        { 
		 
		  if(!res)
		  {
		$("#alert-text").parent().css('display','block');
                $("#alert-text").html("Sorry, please try again").fadeIn(3000);
                $("#alert-text").fadeOut(5000);
                $('#guest_name').val("");
                $('#guest_msg').val("");
                $('#guest_msg').removeClass('ui-state-error');
                $('#guest_name').removeClass('ui-state-error');
		  }
		  else 
		  {             $('#guest_msg').removeClass('ui-state-error');
                                $('#guest_name').removeClass('ui-state-error');
			 	$("#alert-text").parent().css('display','block');
                                $("#alert-text").html("Thank you very much for your valuable wishes...").fadeIn(3000);
                                $("#alert-text").fadeOut(5000);
                                $('#guest_name').val("");
                                $('#guest_msg').val("");
                                $('#success_msgs').html(res);

                                // document.location.reload();
                                // 'secure.php';
			   
		  	
          }
				
        });
 
 
	}
 
 $(function() {
		$("button, input:submit, a", ".demo").button();

		$("a", ".demo").click(function() { return false; });
	});
		
	});

 $('.left-nav a').click(function(ev) {

			$('.left-nav a.selected').removeClass('selected');
			$(this).addClass('selected');

		});
$("#butt_clear").click(function(){
									$('#guest_name').val("");
                                $('#guest_msg').val("");
									return false;
									});
 


  

	
	 


$(function() {
$("#d+0ialog").dialog("destroy");
    $('#create-user1').click(function() {
				$('#dialog-form').dialog('open');
			});

        $("#dialog-form").dialog({


			autoOpen: false,
			height: 560,
			width: 720,
			modal: true,
			buttons: {
				Cancel: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				$('.left-nav a.selected').removeClass('selected');
			}
		});
              });
         });