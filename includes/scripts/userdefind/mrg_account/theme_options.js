$(document).ready(function(){

$(".inv_type").click(function(){
var u, k, v, upurl, type_id;
type_id = $(this).val();
u = window.location.href;
k = 'type';
if(type_id == 'w') {
v = 1;
} else if(type_id == 'b') {
v = 2;
}
upurl = setQueryParameter(u, k, v);
window.location.href = upurl;
});

function setQueryParameter(uri, key, value) {
  var re = new RegExp("([?&])("+ key + "=)[^&#]*", "g");
  if (uri.match(re)) 
    return uri.replace(re, '$1$2' + value);
  // need to add parameter to URI
  var paramString = (uri.indexOf('?') < 0 ? "?" : "&") + key + "=" + value;
  var hashIndex = uri.indexOf('#');
  if (hashIndex < 0)
    return uri + paramString;
  else
    return uri.substring(0, hashIndex) + paramString + uri.substring(hashIndex);
}

    function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
    
    $("#check_avilable").click(function(){
        checkURL_status();
        return false;
    }); 
$(".home_image_1").click(function(){            
        
        $('#home_double_img').hide("slow");
        $('#home_single_img').show("slow");     
    });     
$(".home_image_2").click(function(){
        
        $('#home_single_img').hide("slow");     
        $('#home_double_img').show("slow");
    }); 
        $('#default_desc_box').show("slow");
        $('#own_desc_box').hide("slow");
        $('#create_own_box').hide("slow");
    

    $('#wed_url').blur(function() {
        checkURL_status();
        return false;
    });
    
    $("#butt_create_web_invit").click(function(){
         if (createWedForm())
            return false;
         else
            {
            var home_imagessts = $('input[name=home_images_sts]:checked', '#wed_account_create').val();
            var wed_url = $("#wed_url"), grooms_name = $("#txt_grooms_name"), brides_name = $("#txt_brides_name"),male_img = $("#uploaded_homeimage_male"),female_img = $("#uploaded_homeimage_fmale"),
            allFields = $([]).add(wed_url).add(grooms_name).add(brides_name).add(male_img).add(female_img),
            tips = $("#validateTips");
            var bValid = true;
            allFields.removeClass('ui-state-error');
            bValid = bValid && checkLengthminmax(grooms_name,"groom's name",3,30,tips);
            bValid = bValid && checkLengthminmax(brides_name,"bride's name",3,30,tips);
            bValid = bValid && checkEmpty(wed_url,"your website url",tips);
            bValid = bValid && checkRegexp(wed_url,/^[a-z]([0-9a-z_-])+$/i,"Wedding URL may consist of a-z, 0-9, underscores, begin with a letter.",tips);
            
            if(home_imagessts == 2)
            {
                bValid = bValid && checkEmpty(male_img,"Groom's Photos",tips);
                bValid = bValid && checkEmpty(female_img,"Bride's Photos",tips);
            }   
                if (bValid)
                    return true;
                else
                    return false;
                 
            }           
    });

        $("#butt_create_web_invit_step2").click(function(){      
            //var wed_date = $("#marriage_date"), rec_status = $("#reception_status"), rec_date = $("#reception_date"),
            var rec_status = $("#reception_status"), rec_date = $("#reception_date"),
            //allFields = $([]).add(wed_date).add(rec_status).add(rec_date),
            allFields = $([]).add(rec_status).add(rec_date),
            tips = $("#validateTips");
            var bValid = true;
            allFields.removeClass('ui-state-error');
            //bValid = bValid && checkEmpty(wed_date,"Wedding Date/Time",tips);
            if($("#reception_status").is(":checked"))
            {
            //bValid = bValid && checkEmpty(rec_date,"Reception Date/Time",tips);   
            }
            var weddate = $("#weddate");
            bValid = bValid && checkEmpty(weddate,"Reception Date/Time",tips);
                if (bValid)
                    return true;
                else
                    return false;
    });

    $("#reception_status").click(function(){ 
        $(this).is(":checked") ? $("#reception_infos").show("slow") : $("#reception_infos").hide("slow") ;
        /* if($(this).is(":checked")) 
        { 
            $("#reception_infos").show("slow") ;                
        }
        else
        { 
            $("#reception_infos").hide("slow") ;
            $("#reception_date").val("");           
        } */
    });

    $("#rec_wed_addr_same").click(function(){ 
        $(this).is(":checked") ? $("#rec_address_infos").hide("slow") : $("#rec_address_infos").show("slow") ;
    });

    $("#reception_status").is(":checked") ? $("#reception_infos").show("slow") : $("#reception_infos").hide("slow") ;
    $("#rec_wed_addr_same").is(":checked") ? $("#rec_address_infos").hide("slow") : $("#rec_address_infos").show("slow") ;

    $(".select_page_head").click(function(){ 
        var headmsg_id = $(this).attr('id');        
        var glb_theme_id = $('#glb_theme_id').val();
                $.post("dboper.php",{do: 'update_theme', might: 'soon', theme_id: glb_theme_id, head_msg_id: headmsg_id},function(result) 
                {                
                if(result)
                    $("#succval").show("slow");
                });

    });
    $("#butt_close_head_msg").click(function(){ 
         opener.location.href = opener.location.href;
         self.close();
    });
                                    
    $(".select_page_desc").click(function(){ 
        var headmsg_id = $(this).attr('id');        
        var glb_theme_id = $('#glb_theme_id').val();
                $.post("dboper.php",{do: 'update_desc_msg', might: 'soon_desc', theme_id: glb_theme_id, head_msg_id: headmsg_id},function(result) 
                {                
                if(result)
                    $("#succval").show("slow");
                });

    });
    $("#butt_close_desc_msg").click(function(){ 
         opener.location.href = opener.location.href;
         self.close();
    });
     
      $("#add_own_head_des").click(function(){
            if (confirm('Note: We are replaced your names with help of "%replace_names%", So Please add this Word.')){
                return true;
            }else{
               return false;
            }
    
     });

  $(".edit_wed_frm_change_theme").click(function(){          
        var wed_id = $(this).attr('id');    
        var url="wedding-secure.php?wed_id="+wed_id+"&do=b12d";
        window.location.href =url;
     });
    $("#show_weddate_help").click(function(){ 
    $("#wed_help").show("fast");
    $("#rec_help").hide("fast")
    });
    $("#show_rec_help").click(function(){ 
    $("#wed_help").hide("fast")
    $("#rec_help").show("fast")
    });
    });



                
     $(function() {
        //$("button, input:submit, a", ".demo").button();     
        //$("a", ".demo").click(function() { return false; });
        //$('.datepicker').datepicker({});
        //$('.datepicker').datetimepicker();
        //$('.datepicker').datetimepicker({ampm: true});
        $('.example-container > pre').each(function(i){ eval($(this).text()); });
     });

    function checkURL_status()
    {
        var wed_url = $("#wed_url"),
        allFields = $([]).add(wed_url),
        tips = $("#validateTips");      
        var url="ajax_createwed.php";       
        var bValid = true;
        allFields.removeClass('ui-state-error');        
        bValid = bValid && checkRegexp(wed_url,/^[a-z]([0-9a-z_-])+$/i,"Wedding URL may consist only a-z, 0-9, underscores, hyphen and should start with Alphabets.", tips);
        if (bValid) {
        var loadimg = "<img src='images/loading.gif' align='center'>";
        $("#wed_url_status").html(loadimg);
        $.post("ajaxfiles/ajax_createwed.php",{wed_url: wed_url.val(), chk_action:'create_wed'},function(result) 
                {
                if(result == 'no')
                    {
                    $("#wed_url_status").html("Someone already has that domain name. Please try another?");
                    $("#wed_url_status").addClass('ui-state-error');
                    tips.html('').removeClass('ui-state-error');
                    }
                else
                    {
                    $("#wed_url_status").removeClass('ui-state-error');
                    $("#wed_url_status").html("Yes! Your domain is available. Use it before someone else does.");
                    $("#wed_url_status").addClass('ui-state-highlight');
                    tips.html('').removeClass('ui-state-error');

                    }
            
                });
        }       
    }

 

    function createWedForm()
    {
        
            var yourClass = $('#wed_url_status').hasClass('ui-state-error');
            return yourClass;
    }
 