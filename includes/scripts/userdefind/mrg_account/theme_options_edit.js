$(document).ready(function(){
    $("#butt_create_add_ani").hide();
    $("#butt_edit_1").click(function(){
    var bperson_name = $("#txt_bperson_name"), bperson_dob = $("#bperson_dob"), bperson_dob_count = $("#txt_bperson_dob_count"),hoster_name = $("#txt_hoster_name"), hoster_num = $("#txt_hoster_num"), invite_title = $("#txt_invite_title");
            allFields = $([]).add(bperson_name).add(bperson_dob).add(bperson_dob_count).add(hoster_name).add(hoster_num).add(invite_title),
            tips = $("#validateTips");
            var bValid = true;
            allFields.removeClass('ui-state-error');
            bValid = bValid && checkLengthminmax(bperson_name,"Person name",3,30,tips);
            bValid = bValid && checkLengthminmax(bperson_dob,"Person DOB",3,30,tips);
            bValid = bValid && checkEmpty(bperson_dob_count,"Person DOB count",3,30,tips);
            bValid = bValid && checkLengthminmax(hoster_name,"Hoster name",3,30,tips);
            bValid = bValid && checkLengthminmax(hoster_num,"Hoster number",3,30,tips);
            bValid = bValid && checkLengthminmax(invite_title,"Invitation title",3,30,tips);
                if (bValid)
                    return true;
                else
                    return false;
    });
    $("#butt_invit_step2").click(function(){
        var birth_title = $("#txt_birth_title"), event_date = $("#bperson_event_date");
        allFields = $([]).add(birth_title).add(event_date), tips = $("#validateTips");
        var bValid = true;
        allFields.removeClass('ui-state-error');
        bValid = bValid && checkLengthminmax(birth_title,"Event title",3,30,tips);
        bValid = bValid && checkLengthminmax(event_date,"Event title",3,30,tips);
        if (bValid)
            return true;
        else
            return false;
    });
    $("#butt_create_web_invit_edit").click(function(){
            var home_imagessts = $('input[name=home_images_sts]:checked', '#wed_account_create').val();
            var imag_status = $('#imag_status_double').val();
            var grooms_name = $("#txt_grooms_name"), brides_name = $("#txt_brides_name"), male_img = $("#uploaded_homeimage_male"),female_img = $("#uploaded_homeimage_fmale"),
            allFields = $([]).add(grooms_name).add(brides_name).add(male_img).add(female_img),
            tips = $("#validateTips");
            var bValid = true;
            allFields.removeClass('ui-state-error');
            bValid = bValid && checkLengthminmax(grooms_name,"Groom's name",3,30,tips);
            bValid = bValid && checkLengthminmax(brides_name,"Bride's name",3,30,tips);

            if(home_imagessts == 2 && imag_status == 'no')
            {
                bValid = bValid && checkEmpty(male_img,"Groom's Photos",tips);
                bValid = bValid && checkEmpty(female_img,"Bride's Photos",tips);
            }
                if (bValid)
                    return true;
                else
                    return false;
    });
$("#butt_website_settings").click(function(){
    var home_imagessts = $('input[name=home_images_sts]:checked', '#wed_account_create').val();
    var imag_status = $('#imag_status_double').val();
    var male_img = $("#uploaded_homeimage_male"),female_img = $("#uploaded_homeimage_fmale"),weddate = $("#weddate"),allFields = $([]).add(male_img).add(female_img),tips = $("#validateTips");
    var bValid = true;
    var weddate = $("#weddate");
    allFields.removeClass('ui-state-error');
    bValid = bValid && checkEmpty(weddate,"Reception Date/Time",tips);
    if (bValid)
        return true;
    else
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

    $("#add_add_albums").click(function(){
        var wed_accid = $("#theme_id").val();
        var urli = "wedsettings.php?wedid="+wed_accid+"&do=manph&from=frmg";
        window.location.href =urli;
    });

    $("#skip_later").click(function(){
        var urli = "/e-wedding.php";
        window.location.href =urli;
    });

    $("#show_weddate_help").click(function(){
    $("#wed_help").show("fast");
    $("#rec_help").hide("fast")
    });
    $("#show_rec_help").click(function(){
    $("#wed_help").hide("fast")
    $("#rec_help").show("fast")
    });

    $("#reception_status").is(":checked") ? $("#reception_infos").show("slow") : $("#reception_infos").hide("slow") ;
    $("#rec_wed_addr_same").is(":checked") ? $("#rec_address_infos").hide("slow") : $("#rec_address_infos").show("slow") ;

// Control Wedding Animations scripts
$('body').on('click', '#butt_create_add_ani', function(){
	var glb_site_url = $("#glb_site_url").val();
	var theme_id = $("#theme_id").val();
	var img_id = $("#img_id").val();
	var headdiv =$(".validateTips");
	$.post("ajaxfiles/ajax_wish.php",{themeid:theme_id, imgid: img_id, chk_action:'update_ani'},function(result){
		headdiv.show("fast");
		headdiv.html(result);
	});
});

$('body').on('click', '#butt_create_rem_ani', function(){
	var headdiv =$(".validateTips");
	var theme_id = $("#theme_id").val();
	$.post("ajaxfiles/ajax_wish.php",{themeid:theme_id, chk_action:'remove_ani'},function(result){
		headdiv.show("fast");
		headdiv.html(result);
	});
});

$('body').on('click', '.ani_lists', function(){
$("#butt_create_add_ani").show();
var ID = $(this).attr("id");
$("#img_id").val(ID);
var glb_site_url = $("#glb_site_url").val();
var imgsrc= "<img src="+glb_site_url+"/images/"+ID+".jpg>";
$("#img_preview").html(imgsrc);
 });



     $(function() {
        $("button, input:submit, a", ".demo").button();
        $("a", ".demo").click(function() { return false; });
        //$('.datepicker').datepicker({});
        //$('.datepicker').datetimepicker();
        //$('.datepicker').datetimepicker({ampm: true});
        $('.example-container > pre').each(function(i){ eval($(this).text()); });
     });

	 });