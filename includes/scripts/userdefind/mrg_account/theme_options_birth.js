$(document).ready(function(){
    $("#check_avilable").click(function(){
        checkURL_status();
        return false;
    });

    $('#wed_url').blur(function() {
        checkURL_status();
        return false;
    });

    $("#butt_create_web_invit").click(function(){
         if (createWedForm())
            return false;
         else
            {
            var bperson_name = $("#txt_bperson_name"), bperson_dob = $("#bperson_dob"), birth_url = $("#birth_url"),invite_title = $("#txt_invite_title"),
            allFields = $([]).add(bperson_name).add(bperson_dob).add(birth_url).add(invite_title),
            tips = $("#validateTips");
            var bValid = true;
            allFields.removeClass('ui-state-error');
            bValid = bValid && checkLengthminmax(bperson_name,"Birthday person name",3,30,tips);
            bValid = bValid && checkLengthminmax(bperson_dob,"Bride's name",3,30,tips);
            bValid = bValid && checkLengthminmax(invite_title,"Invitation title",3,30,tips);
            bValid = bValid && checkEmpty(birth_url,"your website url",tips);
            bValid = bValid && checkRegexp(birth_url,/^[a-z]([0-9a-z_-])+$/i,"Wedding URL may consist of a-z, 0-9, underscores, begin with a letter.",tips);
            if (bValid)
                    return true;
                else
                    return false;
            }
    });

        $("#butt_create_web_invit_step2").click(function(){
            //var wed_date = $("#marriage_date"), rec_status = $("#reception_status"), rec_date = $("#reception_date"),
            var event_date = $("#bperson_event_date"), security_code = $("#security_code"),
            //allFields = $([]).add(wed_date).add(rec_status).add(rec_date),
            allFields = $([]).add(event_date).add(security_code),
            tips = $("#validateTips");
            var bValid = true;
            allFields.removeClass('ui-state-error');
            var weddate = $("#weddate");
            bValid = bValid && checkEmpty(event_date,"Event date",tips);
            bValid = bValid && checkEmpty(security_code,"Security Code",tips);
                if (bValid)
                    return true;
                else
                    return false;
    });


    });




     $(function() {
        $("button, input:submit, a", ".demo").button();
        $("a", ".demo").click(function() { return false; });
        //$('.datepicker').datepicker({});
        //$('.datepicker').datetimepicker();
        //$('.datepicker').datetimepicker({ampm: true});
        //$('.example-container > pre').each(function(i){ eval($(this).text()); });
     });

    function checkURL_status()
    {
        var birth_url = $("#birth_url"),
        allFields = $([]).add(birth_url),
        tips = $("#validateTips");
        var url="ajax_createwed.php";
        var bValid = true;
        allFields.removeClass('ui-state-error');
        bValid = bValid && checkRegexp(birth_url,/^[a-z]([0-9a-z_-])+$/i,"Birthday URL may consist only a-z, 0-9, underscores, hyphen and should start with Alphabets.", tips);
        if (bValid) {
        var loadimg = "<img src='images/loading.gif' align='center'>";
        $("#wed_url_status").html(loadimg);
        $.post("ajaxfiles/ajax_createwed.php",{birth_url: birth_url.val(), chk_action:'create_birth'},function(result)
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
